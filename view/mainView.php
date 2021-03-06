<?php
$title = "SansGodasse";
ob_start();
?>

<div id="titleDiv">
	<div id="titleWrapper">
		<h1>SANSGODASSE</h1>
		<h2>Vivre heureux, sans godasse.</h2>
	</div>
	<img src="images/main_img.jpg" alt="Paysage">
</div>

<section class="content">
	<section id="welcome">
		<h3>Bienvenue !</h3>

		<p>Si vous cherchez des informations sur la course pieds nus ou minimaliste, vous êtes au bon endroit !</p>
		<p>Vous trouverez une méthode pour vous mettre à la course pieds nus sur la page <a href="/?page=learn">"Apprendre à courir pieds nus"</a>.</p>
		<p>Je vous parle de mon expérience sur la page <a href="/?page=about">"A propos"</a>.</p>
		<p>Vous pourrez partager vos exploits ou poser vos questions dans la rubrique <a href="/?page=help">"Entraide"</a>.</p>
		<p>Enfin vous pouvez suivre quelques actualités sur <a href="/?page=blog">le blog</a>.</p>
		<p>Bonne visite !</p>
	</section>

	<div id="news">
		<h3>Actualités</h3>
		<ul>
			<li>20/09/2018 Création d'un formulaire de contact et création de la rubrique "blog"</li>
			<li>24/08/2018 Remise en service de la page "à propos" et "apprendre à courir pieds nus"</li>
			<li>23/08/2018 Site en cours de reconstruction suite à un incident technique... J'abandonne wordpress et je fais tout à la main !</li>
		</ul>
	</div>
</section>

<?php
$content = ob_get_clean();

require (ROOT . '/view/template.php');
?>
