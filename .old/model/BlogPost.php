<?php

class BlogPost {
	protected $id;
	protected $author;
	protected $title;
	protected $body;
	protected $creationDate;
	
	/**
	 *	Constructeur
	 *	@param array $data tableau associatif contenant l'auteur, l'adresse mail, le site web et le message
	 */
	public function __construct(array $data) {
		$this->hydrate($data);
	}

	/**
	 *	Hydratation
	 *	@param array $data tableau associatif contenant l'auteur, le titre et le contenu
	 */
	public function hydrate(array $data) {
		foreach ($data as $key => $value) {
			$method = 'set' . ucfirst($key);
			if (method_exists($this, $method)) {
				$this->$method($value);
			}
		}
	}

	// Getters
	public function id() { return $this->id; }
	public function author() { return $this->author; }
	public function title() { return $this->title; }
	public function body() { return $this->body; }
	public function creationDate() { return $this->creationDate; }

	// Setters
	public function setId($id) {
		$this->id = $id;
	}
	public function setAuthor($author) {
		$this->author = $author;
	}
	public function setTitle($title) {
		$this->title = $title;
	}
	public function setBody($body) {
		$this->body = $body;
	}
	public function setCreationDate($creationDate) {
		$this->creationDate = $creationDate;
	}
}