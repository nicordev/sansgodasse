<form id="newBlogPost" method="post" action="index.php?page=blog">
	<label for="newBlogPostTitle">Titre du billet</label><br />
	<input type="text" name="newBlogPostTitle" id="newBlogPostTitle" /><br /><br />

	<label for="newBlogPostBody">Corps du billet</label><br />
	<textarea id="newBlogPostBody" name="newBlogPostBody"></textarea><br /><br />
	
	<input type="submit" value="Enregistrer le billet" />
</form>

<h4>Aperçu</h4>
<div id="newBlogPostPreviewWrapper">
	<div id="newBlogPostPreview"></div>
</div>

<!-- Conversion du contenu markdown en HTML -->
<script type="text/javascript" src="js/marked.js"></script>
<script type="text/javascript" src="js/newBlogPost.js"></script>