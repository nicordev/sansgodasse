/**
 * 	goUp.js
 * 	-------
 *
 * Affiche une flèche pour remonter en haut de la page
 */

 // IIFE
(function() {
	window.addEventListener('scroll', goUp);

	var goUpBtnElt = document.getElementById('upBtn');

	/**
	 * Teste la position de la fenêtre et fait apparaître un bouton si besoin
	 */
	function goUp() {
		if (window.scrollY > 0) {
			goUpBtnElt.style.display = 'block';
		} else {
			goUpBtnElt.style.display = 'none';
		}
	}
})();
