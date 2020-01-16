<?php
$title = "Entraide";
ob_start();
?>

<h2 class="pageTitle">Entraide</h2>

<p>Pour l'instant c'est vide. Pour participer, <a href="/?page=contact&action=contact">cliquez ici</a>.</p>

<?php
$content = ob_get_clean();

require (ROOT . '/view/template.php');
?>
