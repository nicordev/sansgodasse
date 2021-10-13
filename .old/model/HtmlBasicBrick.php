<?php
class HtmlBasicBrick {

	private $_text;
	private $_startTag;
	private $_endTag;

	/**
	 *	Ajoute du texte à la suite
	 *	@param 	str $text le texte à ajouter
	 *	@param 	bool $nextLine pour ajouter le texte à la ligne avec une balise <br />
	 */
	public function add($text, $nextLine = true) {
		if ($nextLine AND $this->text() !== "") {
			$this->setText($this->text() . '<br />' . $text);
		} else {
			$this->setText($this->text() . $text);
		}
	}

	/**
	 *	Assemble le texte avec ses balises
	 *	@return str une chaîne contenant les balises et le texte
	 */
	public function build() {
		return $this->startTag() . $this->text() . $this->endTag();
	}

	/**
	 *	Affiche le texte avec ses balises
	 */
	public function insert() {
		echo $this->build();
	}

	/**
	 *	Constructeur
	 *	@param str $text le texte à afficher
	 *	@param str $tag le nom de la paire de balise HTML
	 *	@param array str $attributes un tableau associatif contenant les noms et les valeurs des attributs
	 */
	public function __construct($text = "", $tag = "div", $attributes = false) {
		$this->setText($text);
		$this->setTag($tag, $attributes);
	}

	// Setters
	public function setText($text) {
		$this->_text = $text;
	}

	public function setTag($tag, $attributes) {
		$attr = "";
		if ($attributes) {
			foreach ($attributes as $attrName => $attrValue) {
				$attr = $attr . self::buildHtmlAttribute($attrName, $attrValue);
			}
		}
		$this->_startTag = '<' . $tag . $attr . '>';
		$this->_endTag = '</' . $tag . '>';
	}


	// Getters
	public function text() { return $this->_text; }
	public function startTag() { return $this->_startTag; }
	public function endTag() { return $this->_endTag; }

	/**
	 *	Renvoie la valeur de l'attribut précédé de son nom sous la forme d'un attribut html (ex : class="zog")
	 *	@param str $attrName le nom de l'attribut
	 *	@param str $attrValue la valeur de l'attribut
	 *	@return l'attribut html précédé d'un espace
	 */
	private static function buildHtmlAttribute($attrName, $attrValue) {
		if ($attrValue === "") {
			return "";
		} else {
			return ' ' . $attrName . '="' . $attrValue . '"';
		}
	}
}