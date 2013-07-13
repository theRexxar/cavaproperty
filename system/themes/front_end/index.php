<?php include("include/html_head.php"); ?>

<?php include("include/header.php"); ?>


<?php
	echo Template::message();
	echo isset($content) ? $content : Template::yield();
?>

    
<?php include("include/footer.php"); ?>

<?php include("include/html_foot.php"); ?>
  