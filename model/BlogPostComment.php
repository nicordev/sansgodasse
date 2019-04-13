<?php

class BlogPostComment {
	protected $id;
	protected $postId;
	protected $author;
	protected $email;
	protected $website;
	protected $comment;
	protected $creationDate;
	
	/**
	 *	Constructeur
	 *	@param array $data tableau associatif contenant les infos de l'auteur, le commentaire et tout le bazar
	 */
	public function __construct(array $data) {
		$this->hydrate($data);
	}

	/**
	 *	Hydratation
	 *	@param array $data tableau associatif contenant les infos de l'auteur, le commentaire et tout le bazar
	 */
	public function hydrate(array $data) {
		foreach ($data as $key => $value) {
			$method = 'set' . ucfirst($key);
			if (method_exists($this, $method)) {
				$this->$method($value);
			}
		}
	}

	/**
	 *	Affiche le commentaire
	 */
	public function show() {
		?>
		<div class="blogCommentWrapper">
			<p class="blogCommentAuthor"><?= $this->author() ?> <span class="blogCommentDate"><?= $this->creationDate() ?></span></p>
		<?php
		if (!empty($this->website()))
			echo '<p class="blogCommentWebsite"><a href="' . $this->website() . '">Site web</a></p>';
		?>
			<p class="blogCommentBody"><?= $this->comment() ?></p>
		</div>
		<?php
	}

	// Getters
	public function id() { return $this->id; }
	public function postId() { return $this->postId; }
	public function author() { return $this->author; }
	public function email() { return $this->email; }
	public function website() { return $this->website; }
	public function comment() { return $this->comment; }
	public function creationDate() { return $this->creationDate; }

	// Setters
	public function setId($id) {
		$this->id = $id;
	}
	public function setPostId($postId) {
		$this->postId = $postId;
	}
	public function setAuthor($author) {
		$this->author = $author;
	}
	public function setEmail($email) {
		$this->email = $email;
	}
	public function setWebsite($website) {
		$this->website = $website;
	}
	public function setComment($comment) {
		$this->comment = $comment;
	}
	public function setCreationDate($creationDate) {
		$this->creationDate = $creationDate;
	}
}