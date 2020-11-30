	<?php include_once 'layouts/header.php'; ?>
    <div id="page-wrapper" class="gray-bg dashbard-1">
  	 <div class="content-main">

		<!--banner-->	
	    <div class="banner">
	   
			<h2>
			<a href="./">Home</a>
			<i class="fa fa-angle-right"></i>
			<span><?php $x = explode('/', $_SERVER['REQUEST_URI']);
				echo end($x);
			 ?></span>
			</h2>
	    </div>
	<!--//banner-->
	<!-- content -->
	<?php 	
		$page = htmlspecialchars($_GET['page']);
		switch ($page) {
		 	case 'send':
		 		include_once 'send.php';
		 		break;
		 	
		 	default:
		 		include_once 'home.php';
		 		break;
		 } 



		?>
	<!--//content-->
	<?php include_once 'layouts/footer.php'; ?>