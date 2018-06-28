<?php
session_start();
require_once 'src/require.php';
?>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Geobik</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="public/css/geobik.css">
</head>
<body>

<nav class="navbar navbar-dark bg-dark">
  <a href="index.php" class="navbar-brand">Geobik</a>
</nav>

<?php
$db=connect($config);
if($db==NULL){
	echo 'Problème.';
}else{
  $contenu=getPage();
  $contenu($db);
}
?>

</body>
</html>