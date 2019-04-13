<?php
$title = "Apprendre à courir pieds nus";
ob_start();
?>

<h2 class="pageTitle">Apprendre à courir pieds nus</h2>

<?php include('includes/learnNav.php') ?>

<section class="content">
	<h3>Avant-propos</h3>
	
	<article>
		<figure id="learn0_feetImg" class="rightFloat">
			<div class="superimposed">
				<img src="images/learn0_feet.jpg" alt="Pieds nus" />
			</div>
		</figure>

		<p>
			Mon but est de vous apporter les connaissances et les astuces que j'aurais souhaité avoir quand j'ai débuté, afin de vous apprendre comment on peut marcher et même courir pieds nus sans se blesser.
		</p>
		<p>
			Vous pouvez tenter l’expérience même en ayant des problèmes articulaires, ce qui fut d’ailleurs mon cas quand j’ai commencé (pour en savoir plus, allez sur la page <a href="index.php?page=about">à propos</a>). Soyez juste intransigeant vis-à-vis de votre sécurité.
		</p>
		<p>
			Quelques points importants avant de commencer :
		</p>
		<ul>
			<li>Tous les exercices présentés sont à réaliser sans chaussures, même minimalistes.</li>
			<li>Votre santé avant tout. En cas de doute, rappelez-vous qu'il vaut mieux écourter ou annuler une sortie que de vous blesser.</li>
			<li>Vous êtes votre propre entraîneur, ce qui signifie que vous seul pouvez juger de vos capacités. Ne faites les exercices proposés que si vous vous en sentez capable.</li>
			<li>Ne jamais forcer !</li>
		</ul>

		<p>
			Rappelez-vous bien de ces points. Ils vous éviteront bien des soucis.
		</p>
		<p>
			Pour vous rassurez si vous ne savez pas comment réagir en cas de douleur, voici quelques tuyaux :
		</p>
		<ul>
			<li>
				Vous sentez une sensation de brûlure sous la plante des pieds en marchant ou en courant sur du bitume : n’ayez crainte, il y a fort à parier que ce n'est que votre cerveau qui n’est pas habitué à sentir le sol aussi directement. Vous pouvez regarder sous vos pieds, vous ne verrez rien d’anormal. Pourtant la sensation de brûlure est bien là et vous indique que vous n’êtes pour l’instant pas capable d’en faire plus. Arrêtez-vous un moment pour récupérer, la sensation partira d’elle-même, puis reprenez votre balade. Avec le temps, vous vous habituerez, la sensation sera de moins en moins forte et vous pourrez courir plus longtemps sans avoir à vous arrêter. Cette sensation, bien que désagréable, est un atout pour vous empêcher de sauter les étapes ou de vous blesser réellement. C’est votre filet de sauvegarde !
			</li>
			<li>
				Vous sentez une douleur musculaire (notamment aux mollets) : c’est peut-être que votre foulée n’est pas correcte ou que vous en avez fait trop par rapport à votre niveau. Dans tous les cas, il est préférable de rentrer en marchant et d’y aller plus molo la prochaine fois, ou même de prendre quelques jours de repos.
			</li>
			<li>
				Vous sentez une douleur articulaire : arrêtez-vous, identifiez où vous avez mal et comment vous pourriez y remédier (en corrigeant votre posture par exemple), puis faites quelques pas et voyez si la douleur persiste. Si c’est le cas, arrêtez de courir et marchez tranquillement.
			</li>
		</ul>

		<div class="note">
			<p>
				Note : ne soyez pas effrayés par cette liste, si vous ne forcez pas et restez à l’écoute de vos sensations, vous devriez vous en sortir sans problème. Après tout, si j’y suis arrivé alors que j’étais mal en point, alors pourquoi pas vous ?
			</p>
		</div>
		
		<p>
			Maintenant, en avant vers la première étape : <a href="index.php?page=learn&part=1">le choix du terrain de jeu !</a>
		</p>

		<figure class="center">
			<div class="superimposed">
				<a href="index.php?page=learn&part=1"><img src="images/learn0_go.jpg" alt="Photo de moi" /></a>
				<figcaption>C'est parti !</figcaption>
			</div>
		</figure>
	</article>

	<footer class="contentFooter">
		<p>
			La suite : <a href="index.php?page=learn&part=1">Les surfaces idéales pour débuter</a>
		</p>
	</footer>
</section>

<?php
$content = ob_get_clean();

require ('template.php');
?>