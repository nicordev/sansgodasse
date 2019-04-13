<?php
$title = "Blog";
ob_start();
?>

<h2 class="pageTitle">Blog</h2>

<!-- Affichage du billet sélectionné -->
<?php
if (isset($blogPost)) {
?>
<section class="content">
	<header>
		<h3 class="blogPostTitle"><?= $blogPost->title() ?></h3>
		<p class="blogPostWrittenBy">Ecrit le <?= $blogPost->creationDate() ?> par <?= $blogPost->author() ?></p>
		<!-- Lien pour l'édition du billet -->
		<?php
		if (isset($_SESSION['memberFunction']) AND $_SESSION['memberFunction'] === 'admin') {
			if (isset($_GET['action']) AND $_GET['action'] === "edit") {
			?>
			<p><a href=<?= '"index.php?page=blog&amp;blogPostId=' . $blogPost->id() . '"' ?>>Annuler l'édition</a></p>
			<?php
			} else {
			?>
			<p><a href=<?= '"index.php?page=blog&amp;action=edit&amp;blogPostId=' . $blogPost->id() . '"' ?>>Editer le billet</a></p>
			<?php
			}
		}
		?>
	</header>

	<!-- Edition du billet -->
	<?php
	// Message d'info
	if (isset($editBlogPostMsg)) {
		echo $editBlogPostMsg;
	}

	// Formulaire de modification du billet
	if (isset($_GET['action']) AND $_GET['action'] === "edit") {
		include("includes/blogEditPost.php");
	}
	?>

	<!-- Contenu du billet -->
	<article class="blogPostBody">
		<?= htmlspecialchars_decode($blogPost->body()) ?>
	</article>

	<!-- Commentaires -->
	<?php
	// Ajout d'un commentaire
	include("includes/blogNewComment.php");

	// Nombre de commentaires
	if (empty($blogPostComments))
		echo '<p class="blogCommentWrapper">0 commentaire</p>';
	elseif (sizeof($blogPostComments) === 1)
		echo '<p class="blogCommentWrapper">1 commentaire</p>';
	else
		echo '<p class="blogCommentWrapper">' . sizeof($blogPostComments) . ' commentaires</p>';

	// Affichage des commentaires
	if (!empty($blogPostComments)) {
		foreach ($blogPostComments as $comment) {
			$comment->show();
		}
	}
	?>

	<!-- L'id du post pour permettre l'édition ultérieure avec JS -->
	<div style="display: none;"><?= $blogPost->id() ?></div>
</section>
<?php
}
?>

<!-- Affichage des billets raccourcis du blog -->
<?php
if (!empty($shortBlogPosts)) {
	foreach ($shortBlogPosts as $shortBlogPost) {
		if (isset($blogPost) AND $shortBlogPost->id() === $blogPost->id()) {
			// Ba on fait rien en fait... On va quand même pas afficher la version raccourcie du billet ouvert !
		} else {
?>
<section class="content">
	<header>
		<h3 class="blogPostTitle"><?= $shortBlogPost->title() ?></h3>
		<p class="blogPostWrittenBy">Ecrit le <?= $shortBlogPost->creationDate() ?> par <?= $shortBlogPost->author() ?></p>
	</header>

	<article class="blogPostBody">
		<?= $shortBlogPost->body() ?>
		<p class="readMore"><a href=<?= '"' . 'index.php?page=blog&amp;blogPostId=' . $shortBlogPost->id() . '"' ?>>Lire la suite...</a></p>
	</article>

	<!-- L'id du post pour permettre l'édition ultérieure avec JS -->
	<div style="display: none;"><?= $shortBlogPost->id() ?></div>
</section>
<?php
		}
	}
}
?>

<!-- Enregistrement d'un billet de blog -->
<?php
// Message d'info
if (isset($newBlogPostMsg)) {
	echo $newBlogPostMsg;
}

// Formulaire d'ajout de billet
if (isset($_SESSION['memberFunction']) AND $_SESSION['memberFunction'] === 'admin' AND !checkDisconnected()) {
	include('includes/blogNewPost.php');
}
?>

<!-- Connexion -->
<?php
// Message d'info
if (isset($connexionMsg))
		if (isset($_SESSION['login']))
			echo '<p class="warning good">' . $connexionMsg . '</p>';
		else
			echo '<p class="warning bad">' . $connexionMsg . '</p>';

// Connexion / Déconnexion
echo '<footer id="blogFooter">';
if (isset($connected) AND $connected OR isset($_SESSION['memberFunction']) AND !checkDisconnected()) {
	include('includes/disconnexionForm.php');
} else {
	include('includes/connexionForm.php');
}
echo '</footer>';

$content = ob_get_clean();


require ('template.php');
?>