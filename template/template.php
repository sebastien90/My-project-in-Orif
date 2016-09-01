<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" value="text/html; charset=UTF-8" />
	<link rel="stylesheet" type="text/css" href="template/style.css">
	<title>Model-view-controller light système</title>
</head>
<body>
<div id="main">
<div id="banner">Ceci est une bannière ultra-conceptuelle<span class="controlNote">
<?php
	//le bouton pour une nouvelle insertion d'une note et situé dans la bannière, ceci est un exception gérer dans le template.
	if(!isset($_GET['v']) OR $_GET['v'] == 'note'){
		print('<a href="?v=note&m=1"><div class="btnAdd">&nbsp;</div></a></span>');
	}
?>

</div>

<?php print $html; ?>

</div>
</body>
</html>