<!DOCTYPE html>
<html lang="en">
	<body class="nav-md">
	<div class="container body">
	  <div class="main_container">
	  	<?php include 'header_view.php';?>
        <!-- page content -->
        <div class="right_col" role="main">
          <?=$content?>
        </div>
        <?php include 'footer_view.php'?>
	  </div>
	</div>
	<?php include 'javascript.php'?>

	<?php
		if(isset($js)){
			echo $js;
		}
	?>
	</body>
</html>