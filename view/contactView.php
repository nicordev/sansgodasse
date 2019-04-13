<?php
$title = "Contact";
ob_start();
?>

<h2 class="pageTitle">Contact</h2>

<!-- Formulaire de contact -->
<div id="contactForm">

	<h4>Me contacter, poster un témoignage ou poser une question</h4>

	<p>
		Le formulaire de contact est HS... C'est triste. En attendant, vous pouvez me contacter à cette adresse :
		<blockquote>sansgodasse(a)gmail.com</blockquote>
	</p>
	<p class="note">
		N'hésitez pas à me recontacter via cette adresse si vous aviez utilisé le formulaire et que je ne vous ai pas répondu
	</p>

	<!-- HS... Snif... :(
	<form id="contactForm" method="post" action="index.php?page=contact&action=contact">

		<?php
		// Message d'erreur
		if (isset($warning))
			if ($warning->text())
				$warning->insert();
		// Message d'envoi de message
		if (isset($messageSent))
			if ($messageSent->text())
				$messageSent->insert();
		?>

		<div class="formComponent">
			<label for="contactAuthor">Nom, prénom ou pseudonyme <span class="formMandatory">*</span></label>
			<input type="text" id="contactAuthor" name="contactAuthor" />
		</div>

		<div class="formComponent">
			<label for="contactEmail">e-mail <span class="formMandatory">*</span></label>
			<input type="email" id="contactEmail" name="contactEmail" />
		</div>

		<div class="formComponent">
			<label for="contactWebsite">Site web (optionnel)</label>
			<input type="url" id="contactWebsite" name="contactWebsite" placeholder="http://" />
		</div>

		<div class="formComponent">
			<label for="contactMsgTitle">Titre du message <span class="formMandatory">*</span></label>
			<input type="text" id="contactMsgTitle" name="contactMsgTitle" />
		</div>

		<div class="formComponent">
			<label for="contactMessage">Votre message, question ou témoignage <span class="formMandatory">*</span></label>
			<textarea id="contactMessage" name="contactMessage"></textarea>
		</div>

		<div class="formComponent">
			<div id="formShow">
				<label for="contactShowMsg">Je veux que mon message apparaîsse sur le site</label>
				<input type="checkbox" id="contactShowMsg" name="contactShowMsg" checked />
			</div>
		</div>

		<div class="formComponent">
			<input class="niceButton" type="submit" />
		</div>
	</form>
	 -->
</div>

<?php
$content = ob_get_clean();

require ('template.php');
?>