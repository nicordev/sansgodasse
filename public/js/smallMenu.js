/*
	Permet d'afficher un menu quand on clique sur une image
*/

// IIFE
(function () {

	smallMenu = {
		iconElt: document.getElementById("iconMenu"),
		visible: false,
		initialised: false,
		index: 0,
		listElt: document.createElement("ul"),

		/**
		 *	Ajoute un élément au menu
		 *	@param content le contenu de l'élément. Peut contenir des balises HTML
		 */
		add: function(content) {
			if (this.initialised) {
				var addedElt = document.createElement("li");
				addedElt.innerHTML = content;
				addedElt.id = "smallMenuItem" + this.index;
				addedElt.classList.add('smallMenuItem');
				this.listElt.appendChild(addedElt);
				this.index++;
			} else {
				console.warn("L'objet smallMenu n'a pas été initialisé");
			}
		},

		/**
		 *	Initialise le menu
		 *	@param refId l'id de l'élément devant contenir le menu
		 */
		init: function(refId) {
			document.getElementById(refId).appendChild(this.listElt);
			this.listElt.style.display = 'none';
			this.listElt.id = "smallMenuList";
			if (this.iconElt !== null) {
				this.iconElt.addEventListener('click', this.showHideMenu);
			} else {
				console.error('Il manque un id iconMenu');
			}
			this.initialised = true;
		},

		/**
		 *	Affiche ou masque le menu
		 */
		showHideMenu: function() {
			if (!smallMenu.visible) {
				smallMenu.listElt.style.display = "block";
				smallMenu.visible = true;
			} else {
				smallMenu.listElt.style.display = "none";
				smallMenu.visible = false;
			}
		},
	};
})();