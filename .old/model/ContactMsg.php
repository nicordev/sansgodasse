<?php
class ContactMsg {
	private $_author;
	private $_email;
	private $_website;
	private $_title;
	private $_message;

	/**
	 *	Envoi le message par mail
	 *	@param str $destinationEmail l'adresse de destination
	 */
	function sendByMail($destinationEmail) {
		$newLine = "\r\n\r\n";
		$message = 'Auteur : ' . $this->author() . ' / ' . $this->email() . ' / ' . $this->website() . $newLine;
		$message .= 'Message : ' . $this->title() . $newLine . $this->message();
		mail($destinationEmail, $this->title(), $message);
	}

	/**
	 *	Constructeur
	 *	@param array $data tableau associatif contenant l'auteur, l'adresse mail, le site web et le message
	 */
	public function __construct(array $data) {
		$this->hydrate($data);
	}

	/**
	 *	Hydratation
	 *	@param array $data tableau associatif contenant l'auteur, l'adresse mail, le site web et le message
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
	public function author() {return htmlspecialchars($this->_author);}
	public function email() {return htmlspecialchars($this->_email);}
	public function website() {return htmlspecialchars($this->_website);}
	public function title() {return htmlspecialchars($this->_title);}
	public function message() {return htmlspecialchars($this->_message);}

	// Setters
	public function setAuthor($author) {
		$this->_author = htmlspecialchars($author);
	}
	public function setEmail($email) {
		$this->_email = htmlspecialchars($email);
	}
	public function setWebsite($website) {
		$this->_website = htmlspecialchars($website);
	}
	public function setTitle($title) {
		$this->_title = htmlspecialchars($title);
	}
	public function setMessage($message) {
		$this->_message = htmlspecialchars($message);
	}
}