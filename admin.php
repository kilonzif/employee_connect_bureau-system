<?php
include_once "header.php";
?>
<div class="jumbotron">
	<div class="alert alert-success" role="alert">
		<?php echo "Welcome " . get_name($_SESSION['email']); ?>
	</div>
	<h1 class="text-center"> Admin </h1>
</div>




<?php
include_once "footer.php";
?>