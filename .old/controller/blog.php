<?php

/**
 *	Vérifie que l'on est bien déconnecté
 */
function checkDisconnected() {
	if (isset($_GET['action']) AND $_GET['action'] === 'disconnect')
		return true;
	return false;
}

// Managers
$memberManager = new MemberManager($db);
$blogPostManager = new BlogPostManager($db);
$blogPostCommentManager = new BlogPostCommentManager($db);

// Connexion
if (isset($_POST['blogLogin'])) {
	$login = htmlspecialchars($_POST['blogLogin']);
	$password = htmlspecialchars($_POST['blogPwd']);
	if (!empty($login) && !empty($password)) {
		$member = $memberManager->connectAMember($login, $password);
		if ($member !== false) {
			$connected = true;
			$_SESSION['memberFunction'] = $member->memberFunction();
			$_SESSION['login'] = $login;
		} else {
			$connected = false;
			$connexionMsg = "Vous vous êtes plantés dans le login ou le mot de passe... Boulet.";
		}
	}
}

if (isset($_SESSION['login']) AND !checkDisconnected()) {
	$connexionMsg = 'Vous êtes connectés en tant que ' . $_SESSION['login'] . ' et vous êtes ' . $_SESSION['memberFunction'];
}

// Ajout d'un billet
if (isset($_POST['newBlogPostTitle'])) {
	$newBlogPostAuthor = $_SESSION['login'];
	$newBlogPostTitle = htmlspecialchars($_POST['newBlogPostTitle']);
	$newBlogPostBody = htmlspecialchars($_POST['newBlogPostBody']);
	if (empty($newBlogPostTitle) OR empty($newBlogPostBody)) {
		$newBlogPostMsg = '<p class="warning bad">Il manque le titre et/ou le contenu du billet de blog... Faisan.</p>';
	} else {
		$newBlogPost = new BlogPost(array(
			'title' => $newBlogPostTitle,
			'body' => $newBlogPostBody,
			'author' => $newBlogPostAuthor
		));
		$blogPostManager->add($newBlogPost);
	}
}

// Enregistrement des modifications d'un billet
if (isset($_GET['action']) AND $_GET['action'] === "save" AND $_GET['blogPostId']) { // Modification
	$editBlogPostTitle = htmlspecialchars($_POST['editBlogPostTitle']);
	$editBlogPostBody = htmlspecialchars($_POST['editBlogPostBody']);
	if (empty($editBlogPostTitle) OR empty($editBlogPostBody)) {
		$editBlogPostMsg = '<p class="warning bad">Il manque le titre et/ou le contenu du billet de blog... Ragondin.</p>';
	} else {
		$editBlogPost = new BlogPost(array(
			'title' => $editBlogPostTitle,
			'body' => $editBlogPostBody,
			'id' => $_GET['blogPostId']
		));
		$blogPostManager->edit($editBlogPost);
	}
}

// Ajout d'un commentaire
if (isset($_POST['newBlogCommentBody'])) {
	if (empty($_POST['newBlogCommentBody']) OR empty($_POST['newBlogCommentAuthor'])) {
		$newBlogCommentMsg = '<p class="warning bad">Vous avez omis de taper votre commentaire ou votre nom.</p>';
	} else {
		$commentData = array ();
		$commentData['author'] = htmlspecialchars($_POST['newBlogCommentBody']);
		$commentData['comment'] = htmlspecialchars($_POST['newBlogCommentAuthor']);
		$commentData['email'] = htmlspecialchars($_POST['newBlogCommentEmail']);
		$commentData['website'] = htmlspecialchars($_POST['newBlogCommentWebsite']);
		$commentData['postId'] = htmlspecialchars($_GET['blogPostId']);
		$newComment = new BlogPostComment($commentData);
		$blogPostCommentManager->add($newComment);
		$newBlogCommentMsg = '<p class="warning good">Merci pour votre commentaire !</p>';
	}
}

// Récupération des billets raccourcis du blog
$shortBlogPosts = $blogPostManager->getAllShortPosts();

// Récupération d'un billet en particulier et de ses commentaires
if (isset($_GET['blogPostId'])) {
	$blogPost = $blogPostManager->getAPost($_GET['blogPostId']);
	$blogPostComments = $blogPostCommentManager->getAllPostComments($blogPost->id());
}

// On demande la vue svp !
require (ROOT . '/view/blogView.php');
