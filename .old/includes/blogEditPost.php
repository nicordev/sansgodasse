<form method="post" action=<?= '"/?page=blog&amp;action=save&amp;blogPostId=' . $blogPost->id() . '"' ?>>

	<label for="editBlogPostTitle">Titre du billet</label><br/>
	<input type="text" name="editBlogPostTitle" id="editBlogPostTitle" value=<?= '"' . $blogPost->title() . '"' ?> /><br /><br />

	<label for="editBlogPostBody">Insérez le nouveau contenu du billet</label><br/>
	<textarea id="editBlogPostBody" name="editBlogPostBody"><?= htmlspecialchars_decode($blogPost->body()) ?></textarea><br /><br />

	<input type="submit" value="Enregistrer les modifications" />
</form>
