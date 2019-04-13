<?php

class BlogPostManager {

	protected $db; // Un objet PDO

	// Constantes
	const SHORT_POST_LENGTH = 240; // Nombre de caractères d'un billet raccourcis

	// Constructeur
	public function __construct($db) {

		$this->setDb($db);
	}

	// Setter
	public function setDb($db) {

		$this->db = $db;
	}

	/**
	 *	Ajoute un post à la base de données
	 *	@param $blogPost un objet BlogPost contenant les infos à stocker
	 */
	public function add(BlogPost $blogPost) {

		$reqSQL = 'INSERT INTO blog_posts(author, title, body, creationDate)
			VALUES (:author, :title, :body, NOW())';
		$q = $this->db->prepare($reqSQL);
		$q->execute(array(
			'author' => $blogPost->author(),
			'title' => $blogPost->title(),
			'body' => $blogPost->body()
		));
	}

	/**
	 *	Modifie un post dans la base de données
	 *	@param $blogPost un objet BlogPost contenant les infos à modifier
	 */
	public function edit(BlogPost $blogPost) {

		$reqSQL = 'UPDATE blog_posts
			SET title = :newTitle, body = :newBody
			WHERE id = :id';
		$q = $this->db->prepare($reqSQL);
		$q->execute(array(
			'newTitle' => $blogPost->title(),
			'newBody' => $blogPost->body(),
			'id' => $blogPost->id()
		));
	}

	/**
	 *	Retourne un post à partir de son id
	 *	@param $postId l'id du post à charger
	 *	@return le post
	 */
	public function getAPost($postId) {

		$reqSQL = 'SELECT *
			FROM blog_posts
			WHERE id = ?';
		$q = $this->db->prepare($reqSQL);
		$q->execute(array($postId));
		$data = $q->fetch();
		$post = new BlogPost($data);
		return $post;
	}

	/**
	 *	Retourne un tableau contenant tous les posts enregistrés
	 *	@return un tableau contenant tous les posts enregistrés
	 */
	public function getAllPosts() {

		$posts = array();
		$i = 0;
		$reqSQL = 'SELECT *
			FROM blog_posts';
		$q = $this->db->query($reqSQL);
		while ($data = $q->fetch()) {
			$posts[$i] = new BlogPost($data);
			$i++;
		}
		return $posts;
	}

	/**
	 *	Retourne un tableau contenant tous les posts enregistrés mais avec un contenu raccourcis
	 *	@return un tableau contenant tous les posts enregistrés mais avec un contenu raccourcis
	 */
	public function getAllShortPosts() {

		$posts = array();
		$i = 0;
		$reqSQL = 'SELECT id, author, title, body, DATE_FORMAT(creationDate, \'%d/%m/%Y à %Hh%i\') AS creationDate
			FROM blog_posts
			ORDER BY id DESC';
		$q = $this->db->query($reqSQL);
		while ($data = $q->fetch()) {
			$posts[$i] = new BlogPost($data);
			$posts[$i]->setBody($this->shortenAPost($posts[$i]->body()));
			$i++;
		}
		return $posts;
	}

	/**
	 *	Lit le corps d'un billet et retourne une version abrégée
	 *	@param $postBody le contenu du billet à traiter
	 *	@return une verson abrégée du contenu du billet
	 */
	private function shortenAPost($postBody) {

		$startTag = '<p class="shortPostBody">';
		$endTag = '</p>';
		$postBody = htmlspecialchars_decode($postBody);
		$postBody = strip_tags($postBody);
		if (strlen($postBody) > self::SHORT_POST_LENGTH) {
			$shortPostBody = substr($postBody, 0, self::SHORT_POST_LENGTH);
			return "{$startTag}{$shortPostBody}...{$endTag}";
		} else {
			return "{$startTag}{$postBody}{$endTag}";
		}
	}
}