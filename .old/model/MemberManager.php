<?php

class MemberManager {
	
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
	 *	Ajoute un post à la base de données
	 *	@param $member un objet Member contenant les infos à stocker
	 */
	public function add(Member $member) {
		$reqSQL = 'INSERT INTO members(alias, password, registrationDate, memberFunction)
			VALUES (:alias, :password, NOW(), :memberFunction)';
		$q = $this->db->prepare($reqSQL);
		$q->execute(array(
			'alias' => $member->alias(),
			'password' => $member->password(),
			'memberFunction' => $member->memberFunction()
		));
	}

	/**
	 *	Retourne un tableau contenant tous les membres enregistrés
	 *	@return un tableau contenant tous les membres enregistrés
	 */
	public function getAllMembers() {
		$members = array();
		$i = 0;
		$reqSQL = 'SELECT *
			FROM members';
		$q = $this->db->query($reqSQL);
		while ($data = $q->fetch()) {
			$members[$i] = new Member($data);
			$i++;
		}
		return $members;
	}

	/**
	 *	Retourne un membre à partir de son id
	 *	@param $memberId l'id du membre à charger
	 *	@return le membre
	 */
	public function getAMemberFromId($memberId) {
		$reqSQL = 'SELECT *
			FROM members
			WHERE id = ?';
		$q = $this->db->prepare($reqSQL);
		$q->execute(array($postId));
		$data = $q->fetch();
		$member = new Member($data);
		return $member;
	}

	/**
	 *	Connecte un membre
	 *	@param $login l'alias du membre
	 *	@param $password le mot de passe du membre
	 *	@return un objet Membre ou false si le login ou le mot de passe est faux
	 */
	public function connectAMember($login, $password) {
		$members = $this->getAllMembers();

		foreach ($members as $member) {
			if ($login === $member->alias()) {
				if (password_verify($password, $member->password())) {
					return $member;
				}
				break;
			}
		}
		return false;
	}
}