<?php

class Member {
	protected $id;
	protected $alias;
	protected $password;
	protected $memberFunction;
	
	/**
	 *	Constructeur
	 *	@param array $data tableau associatif contenant l'alias, le mot de passe et la fonction
	 */
	public function __construct(array $data) {
		$this->hydrate($data);
	}

	/**
	 *	Hydratation
	 *	@param array $data tableau associatif contenant l'alias, le mot de passe et la fonction
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
	public function alias() { return $this->alias; }
	public function password() { return $this->password; }
	public function memberFunction() { return $this->memberFunction; }

	// Setters
	public function setId($id) {
		$this->id = $id;
	}
	public function setAlias($alias) {
		$this->alias = $alias;
	}
	public function setPassword($password) {
		$this->password = $password;
	}
	public function setMemberFunction($memberFunction) {
		$this->memberFunction = $memberFunction;
	}
}