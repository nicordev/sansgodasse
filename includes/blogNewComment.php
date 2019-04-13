<div id="newBlogCommentWrapper">
	<h4>Laisser un commentaire</h4>

	<!-- Message d'info -->
	<?php
	if (isset($newBlogCommentMsg))
		echo $newBlogCommentMsg
	?>

	<!-- Formulaire d'ajout d'un commentaire -->
	<form id="newBlogComment" method="post" action=<?= '"index.php?page=blog&amp;blogPostId=' . $blogPost->id() . '&amp;scroll="' ?>>
		<label for="newBlogCommentBody">Commentaire <span class="formMandatory">*</span></label><br />
		<textarea id="newBlogCommentBody" name="newBlogCommentBody" cols="45" rows="8"></textarea><br /><br />

		<label for="newBlogCommentAuthor">Nom <span class="formMandatory">*</span></label><br />
		<input type="text" name="newBlogCommentAuthor" id="newBlogCommentAuthor" class="textForm" /><br /><br />

		<label for="newBlogCommentEmail" class="optional">Email (si vous voulez que je vous réponde par mail)</label><br />
		<input type="email" name="newBlogCommentEmail" id="newBlogCommentEmail" class="textForm" /><br /><br />

		<label for="newBlogCommentWebsite" class="optional">Votre site web</label><br />
		<input type="url" name="newBlogCommentWebsite" id="newBlogCommentWebsite" class="textForm" /><br /><br />
			
		<input class="niceButton" type="submit" value="Laisser un commentaire" />
	</form>
</div>

<?php
if (isset($_POST['newBlogCommentBody'])) {
?>
<!-- Scroll jusqu'au formulaire d'ajout de commentaire -->
<script type="text/javascript">
	var newCommElt = document.getElementById("newBlogComment");
	newCommElt.scrollIntoView();
</script>
<?php
}