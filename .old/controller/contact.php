<?php

$contactMsgManager = new ContactMsgManager($db);

if (isset($_POST['contactAuthor'])) {
	
	// Message en cas de mauvaise saisie
	$warningAttributes = array("class" => "warning bad");
	$warning = new HtmlBasicBrick("", "p", $warningAttributes);

	// Message indiquant que le message a été envoyé
	$messageSentAttributes = array("class" => "warning good");
	$messageSent = new HtmlBasicBrick("", "p", $messageSentAttributes);

	if (empty($_POST['contactAuthor'])) {
		$warning->add('Vous devez entrer un nom, un prénom ou un pseudonyme');
	}
	if (empty($_POST['contactEmail'])) {
		$warning->add('Vous devez entrer une adresse email');
	}
	if (empty($_POST['contactMsgTitle'])) {
		$warning->add('Il manque le titre de votre message');
	}
	if (empty($_POST['contactMessage'])) {
		$warning->add('Vous avez oublié de taper votre message !');
	}
	if (!$warning->text()) {
		$dataMsg = array();
		$dataMsg['author'] = htmlspecialchars($_POST['contactAuthor']);
		$dataMsg['email'] = htmlspecialchars($_POST['contactEmail']);
		$dataMsg['website'] = htmlspecialchars($_POST['contactWebsite']);
		$dataMsg['title'] = htmlspecialchars($_POST['contactMsgTitle']);
		$dataMsg['message'] = htmlspecialchars($_POST['contactMessage']);

		$contactMsg = new ContactMsg($dataMsg);

		// Envoi d'un email
		$contactMsg->sendByMail("sansgodasse@gmail.com");

		// Enregistrement du message dans la base de données
		$contactMsgManager->add($contactMsg);

		// On indique que tout va bien
		$messageSent->add('Votre message a bien été envoyé !');
	}
}

require (ROOT . '/view/contactView.php');
