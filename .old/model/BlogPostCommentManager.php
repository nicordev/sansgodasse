<?php

class BlogPostCommentManager {

	protected $db; // Un objet PDO

	// Constructeur
	public function __construct($db) {

		$this->setDb($db);
	}

	// Setter
	public function setDb($db) {

		$this->db = $db;
	}

	/**
	 *	Ajoute un commentaire de billet à la base de données
	 *	@param $blogPostComment un objet BlogPostComment contenant les infos à stocker
	 */
	public function add(BlogPostComment $blogPostComment) {

		$reqSQL = 'INSERT INTO blog_comments(author, email, website, comment, postId, creationDate)
			VALUES (:author, :email, :website, :comment, :postId, NOW())';
		$q = $this->db->prepare($reqSQL);
		$q->execute(array(
			'author' => $blogPostComment->author(),
			'email' => $blogPostComment->email(),
			'website' => $blogPostComment->website(),
			'comment' => $blogPostComment->comment(),
			'postId' => $blogPostComment->postId()
		));
	}

	/**
	 *	Modifie un post dans la base de données
	 *	@param $blogPostComment un objet BlogPostComment contenant les infos à modifier
	 */
	public function edit(BlogPostComment $blogPostComment) {

		$reqSQL = 'UPDATE blo.0
			SET title = :newTitle, comment = :newComment
			WHERE id = :id';
		$q = $this->db->prepare($reqSQL);
		$q->execute(array(
			'newTitle' => $blogPostComment->title(),
			'newComment' => $blogPostComment->comment(),
			'id' => $blogPostComment->id()
		));
	}

	/**
	 *	Retourne un commentaire à partir de son id
	 *	@param $commentId l'id du commentaire à charger
	 *	@return le commentaire
	 */
	public function getAComment($commentId) {

		$reqSQL = 'SELECT *
			FROM blog_comments
			WHERE id = ?';
		$q = $this->db->prepare($reqSQL);
		$q->execute(array($commentId));
		$data = $q->fetch();
		$comment = new BlogPostComment($data);
		return $comment;
	}

	/**
	 *	Retourne un tableau contenant tous les commentaires enregistrés pour un billet donné
	 *	@param $postId l'id du billet
	 *	@return un tableau contenant tous les commentaires enregistrés pour le billet donné
	 */
	public function getAllPostComments($postId) {

		$comments = array();
		$i = 0;
		$reqSQL = 'SELECT id, postId, author, email, website, comment, DATE_FORMAT(creationDate, \'%d/%m/%Y à %Hh%i\') AS creationDate
			FROM blog_comments
			WHERE postId = ' . $postId . '
			ORDER BY id DESC';
		$q = $this->db->query($reqSQL);
		while ($data = $q->fetch()) {
			$comments[$i] = new BlogPostComment($data);
			$i++;
		}
		return $comments;
	}
}