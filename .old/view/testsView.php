<?php
$title = "Tests";
ob_start();
?>

<h2 class="pageTitle">Expérimentations</h2>

<p id="showTests1"></p>
<p id="showTests2"></p>

<script type="text/javascript">
	var showWindow1Elt = document.getElementById('showTests1');
	var showWindow2Elt = document.getElementById('showTests2');
	
	if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {

		showWindow1Elt.textContent = "Vous êtes sur " + navigator.userAgent;

		function handleStart(evt) {

			evt.preventDefault();
			var touches = evt.changedTouches;
			for (var i = 0; i < touches.length; i++) {
				fingerPosition.x = touches[i].pageX;
				fingerPosition.y = touches[i].pageY;
			}
		}

		function handleMove(evt) {
			var touches = evt.changedTouches;
			for (var i = 0; i < touches.length; i++) {
				fingerPosition.x = touches[i].pageX;
				fingerPosition.y = touches[i].pageY;
			}
		}

		function showFingerPosition() {

			showWindow2Elt.innerHTML = "Votre doigt est ici :<br />" +
				"x : " + fingerPosition.x + "<br />" +
				"y : " + fingerPosition.y;
		}

		var watch = setInterval(showFingerPosition, 500);
		var fingerPosition = {x:0, y:0};
		document.addEventListener('touchstart', handleStart);
		document.addEventListener('touchmove', handleMove);
	}
</script>
<?php
$content = ob_get_clean();

require (ROOT . '/view/template.php');
?>
