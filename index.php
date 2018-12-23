<!DOCTYPE html>
<html>
<head>
<?php 
$title = "ALL NEWS";
 require_once "blocks/head.php";
 require_once "functions/functions.php";
  $news = getNews (3);
  ?>
</head>
<body>
<?php require_once "blocks/header.php"  ?>

<div id="wrapper">

<div id="leftCol">
<?php
 for($i = 0; $i< count($news);$i++){
 	if($i == 0)
	echo "<div id=\"bigArticle\">";
	else
	echo "<div class = \"article\">";
	echo '<img src="/img/article/'.$news[$i]["id"].'.jpg" alt="Article '.$news[$i]["id"].'" title="Article '.$news[$i]["id"].'">
<h2>'.$news[$i]["title"].'</h2>
<p>'.$news[$i]["intro_text"].'
</p> 
<a href="/article.php"><div>Contiuoe</div></a>
</div>';
if($i == 0)
echo "<div class=\"clear\"><br></div>";
	 }


?>


</div>

<?php require_once "blocks/rightCol.php"  ?>
</div>

<?php require_once "blocks/footer.php"  ?>


</body>
</html>