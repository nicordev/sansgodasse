/*
	newBlogPost.js
	--------------

	Convertit le contenu écrit en markdown en html avant la sauvegarde en bdd
*/

/**
 *	Convertit le contenu écrit en markdown en html
 */
function convertMarkdown() {

	var contentElt = document.getElementById('newBlogPostBody');
	contentElt.value = marked(contentElt.value);
}

// Conversion du contenu markdown avant envoi
var newBlogPostFormElt = document.getElementById('newBlogPost');
newBlogPostFormElt.addEventListener('submit', function(evt) {
	evt.preventDefault();
	convertMarkdown();
	newBlogPostFormElt.submit();
});

// Prévisualisation du post
var newBlogPostPreviewElt = document.getElementById('newBlogPostPreview');
var contentElt = document.getElementById('newBlogPostBody');
contentElt.addEventListener('keyup', function() {
	newBlogPostPreviewElt.innerHTML = marked(contentElt.value);
});