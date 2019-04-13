<?php
$title = "A propos";
ob_start();
?>

<h2 class="pageTitle">A propos</h2>

<section class="content">
	<article>
		<h3>
			Bonjour à vous !
		</h3>

		<p>
			Bienvenue sur le site, je m'appelle Nicolas Renvoisé, alias "sans godasse", et je suis heureux de vous faire partager mon expérience de la course pieds nus, une activité qui me permet de soigner mes problèmes articulaires et de prendre plaisir à courir !
		</p>

		<figure class="center">
			<div class="superimposed">
				<img src="images/about_coucou.jpg" alt="Photo de moi" />
				<figcaption>Coucou !</figcaption>
			</div>
		</figure>
	</article>
	
	<article>
		<h3>A propos de moi</h3>

		<div class="articleTextAndPictures">
			<div>
				<figure class="rightFloat">
					<div class="superimposed">
						<img id="aboutPhotoOfMe" src="images/about_moi.jpg" alt="Photo de moi" />
						<figcaption>C'est moi !</figcaption>
					</div>
				</figure>
				
				<p>
					Coureur amateur, je me suis blessé au genou en 2012 alors que je portais des chaussures de course classiques (des asics gel si je me souviens bien) et des semelles orthopédiques.<br />
					Mon médecin ne savait pas ce que j'avais et m'a mis au repos avec anti-inflammatoires et séances de kiné.<br />
					Résultat : j'avais de plus en plus mal et ma jambe gauche s'affaiblissait rapidement.
				</p>

				<p>
					J'ai changé plusieurs fois de médecin, de podologue et de kiné pour trouver une solution à mon problème, mais en vain.
					Finalement, 1 an plus tard, un chirurgien spécialiste du genou identifie mon problème : un syndrome rotulien.
					Il me prescrit de nouvelles semelles orthopédiques et des séances de rééducation.<br />
					Une semaine plus tard, mon genou droit se joint à la rébellion et me fait lui aussi souffrir. J'étais dépité. Je ne voyais pas d'issue à mon problème.
				</p>

				<p>
					Heureusement pour moi, un collègue de travail nouvellement affecté dans mon service me dit qu'un certain Barefoot Ted est parvenu à soigner ses problèmes de dos en courant pieds nus.<br />
					N'ayant plus rien à perdre, je me suis lancé dans la course pieds nus, même si tout mon entourage, médecins compris, me disaient que je faisais une grosse bêtise.<br />
					Ce fut une excellente décision, car non seulement je suis parvenu à me soigner, mais en 2015 j'ai pu faire un trail de 33 km pieds nus et sans me blesser !
					Jamais je ne pensais que je pourrais faire ça un jour, même avant d'avoir des problèmes de genoux !
				</p>

				<p>
					Cerise sur le gâteau, cette façon de courir m'éclate !
				</p>
			</div>
		</div>
		<figure class="center">
			<div class="superimposed">
				<img src="images/about_finnish.jpg" alt="A l'arrivée du trail" />
				<figcaption>Juste après la ligne d'arrivée !</figcaption>
			</div>
		</figure>
	</article>

	<article>
		<h3>Pourquoi ce site ?</h3>

		<p>
			Ce site a pour but de vous faire découvrir la course pieds nus (ou minimaliste, ou naturelle) et de vous aider si vous souhaitez vous y mettre, que vous soyez ou non en bonne santé.
		</p>
	</article>

	<article>
		<h3>Quelles sont les raisons qui m'ont amené à créer ce site ?</h3>

		<p>
			J'ai créé ce site pour 3 raisons :
			<ol>
				<li>Pouvoir aider ceux qui, comme moi, ont des problèmes articulaires et n'arrivent pas à s'en défaire</li>
				<li>Partager les connaissances que j'aurais aimé avoir quand j'ai débuté</li>
				<li>Faire connaître la course pieds nus !</li>
			</ol>
		</p>
	</article>

	<article>
		<h3>Qu'allez-vous trouver sur ce site ?</h3>

		<p>
			Vous trouverez des informations sur les thêmes suivants :<br />
			<ul>
				<li>Pourquoi courir pieds nus</li>
				<li>Comment courir pieds nus</li>
				<li>Comment débuter</li>
				<li>Quels sont les pièges à éviter</li>
				<li>Astuces et matériels optionnels</li>
				<li>Exercices de renforcement musculaire</li>
				<li>Mon expérience personnelle</li>
			</ul>
		</p>
	</article>
	
	<article>
		<h3>Un dernier point</h3>

		<p>
			Il s'agit là de mon premier site web, soyez indulgent si certains aspects ne sont pas très aboutis, ça ira mieux dans quelques temps. ;)
		</p>

		<figure class="center">
			<div class="superimposed">
				<img src="images/about_footer.jpg" alt="Photo de moi" />
				<figcaption>Une belle balade</figcaption>
			</div>
		</figure>
	</article>
</section>

<?php
$content = ob_get_clean();

require ('template.php');
?>