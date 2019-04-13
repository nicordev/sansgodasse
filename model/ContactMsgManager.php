<?php

class ContactMsgManager {

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
	 *	Ajoute un message à la base de données
	 *	@param un objet ContactMsg contenant les infos à stocker
	 */
	public function add(ContactMsg $msg) {
		$reqSQL = 'INSERT INTO contact_messages(author, email, website, title, message, creationDate)
			VALUES (:author, :email, :website, :title, :message, NOW())';
		$q = $this->db->prepare($reqSQL);
		$q->execute(array(
			'author' => $msg->author(),
			'email' => $msg->email(),
			'website' => $msg->website(),
			'title' => $msg->title(),
			'message' => $msg->message()
		));
	}

	/**
	 *	Retourne un tableau contenant tous les messages enregistrés
	 *	@return un tableau contenant tous les messages enregistrés
	 */
	public function getAllMsg() {
		$msg = array();
		$i = 0;
		$reqSQL = 'SELECT *
			FROM contact_messages';
		$q = $this->db->query($reqSQL);
		while ($data = $q->fetch()) {
			$msg[$i] = new ContactMsg($data);
			$i++;
		}
		return $msg;
	}

	/**
	 *	Retourne un parcours à partir de son id
	 *	@return le parcours
	 */
	public function getAMsg($id) {
		$reqSQL = 'SELECT *
			FROM contact_messages
			WHERE id = ?';
		$q = $this->db->prepare($reqSQL);
		$q->execute(array($id));
		$data = $q->fetch();
		$msg = new ContactMsg($data);
		return $msg;
	}
}