<?php
if (isset($_GET['part'])) {
	switch ($_GET['part']) {
		case 1:
			$learnNav = '<li><a class="pageLink" href="index.php?page=learn">Avant-propos</a></li>
				<li class="currentPageLink">Choix du terrain</li>
				<li><a class="pageLink" href="index.php?page=learn&part=2">Foulée</a></li>';
			require ('view/learnView1.php');
			break;
		case 2:
			$learnNav = '<li><a class="pageLink" href="index.php?page=learn">Avant-propos</a></li>
				<li><a class="pageLink" href="index.php?page=learn&part=1">Choix du terrain</a></li>
				<li class="currentPageLink">Foulée</li>';
			require ('view/learnView2.php');
			break;
		default:
			$learnNav = '<li class="currentPageLink">Avant-propos</li>
				<li><a class="pageLink" href="index.php?page=learn&part=1">Choix du terrain</a></li>
				<li><a class="pageLink" href="index.php?page=learn&part=2">Foulée</a></li>';
			require ('view/learnView0.php');
			break;
	}
} else {
	$learnNav = '<li class="currentPageLink">Avant-propos</li>
		<li><a class="pageLink" href="index.php?page=learn&part=1">Choix du terrain</a></li>
		<li><a class="pageLink" href="index.php?page=learn&part=2">Foulée</a></li>';
	require ('view/learnView0.php');
}

