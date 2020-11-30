<?php 
include_once 'config.php'; 
session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
<title><?php $page = htmlspecialchars($_GET['page']);
		switch ($page) {
		 	case 'send':
		 		echo "Send";
		 		break;
		 	
		 	default:
		 		echo "Home ";
		 		break;
		 }  ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Minimal Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<link href="<?= BASE_URL ?>/css/style.css" rel='stylesheet' type='text/css' />
<link href="<?= BASE_URL ?>/css/font-awesome.css" rel="stylesheet"> 
<script src="<?= BASE_URL ?>/js/jquery.min.js"> </script>
<script src="<?= BASE_URL ?>/js/bootstrap.min.js"> </script>
  
<!-- Mainly scripts -->
<script src="<?= BASE_URL ?>/js/jquery.metisMenu.js"></script>
<script src="<?= BASE_URL ?>/js/jquery.slimscroll.min.js"></script>
<!-- Custom and plugin javascript -->
<link href="<?= BASE_URL ?>/css/custom.css" rel="stylesheet">
<script src="<?= BASE_URL ?>/js/custom.js"></script>
<script src="<?= BASE_URL ?>/js/screenfull.js"></script>
<script src="<?= BASE_URL ?>/js/pie-chart.js" type="text/javascript"></script>
<script src="<?= BASE_URL ?>/js/Chart.js" type="text/javascript"></script>
		<script>
		$(function () {
			$('#supported').text('Supported/allowed: ' + !!screenfull.enabled);

			if (!screenfull.enabled) {
				return false;
			}

			

			$('#toggle').click(function () {
				screenfull.toggle($('#container')[0]);
			});
			

			
		});
		</script>
		<style>
			.hide{
				display: none;
				transition: 1s;
			}
			.btn__close{
				transform: rotate(40deg);
				transition: 0.5s;
			}
			.loader{
				transition: 1s;
				animation: loader 1s infinite;
			}
			@keyframes loader{
				0%{
					transform: rotate(0deg);
				}
				100%{
					transform: rotate(360deg);
				}
			}
			.lorem{
				height: 0;
				width: 0;
				overflow: hidden;
			}
			.lorem + .btn-1{
				padding: auto;
				margin: auto;
				overflow: hidden;
				outline: none;
				position: relative;
				font-size: inherit;
				display: flex;
				font-weight: 600;
				padding: 5px;
				justify-content: center;
				align-items: center;


			}
			.btn-1{
				border-radius: 5px;
				width: auto;
				height: 30px;
				color: #333;
				background: #17e689;
				overflow: hidden;
				width: 35px;
				height: 35px;
				font-size: 20px;
				display: flex;
				justify-content: center;
				align-items: center;
				font-family: sans-serif;
    			box-shadow: 0 6px darken(#f79159, 10%);
    			transition: all 0.2s;
    			cursor: pointer;
    			transition: 0.2s;
			}
			.btn-1:before{
				content: attr(data-title);
				position: absolute;
				overflow: hidden;
				transform: translate(50px);
				transition: all 1s;
				display: flex;
				justify-content: center;
				align-items: center;
			}
			.btn-1:hover:before{
				content: attr(data-title);
				transform: translate(100%,0);
				overflow: hidden;
				transition: 0.2s;
			}
			.btn-1:hover{
				width: 30%;
				transition:all 0.2s;
				display: inline-block;
				opacity: 0.9;

			}
			.btn__generate{
				width: 35px;
				height: 35px;
				margin: auto;
				border-radius: 5px;
				background: #f5af00;
				outline:none;
				border: none;
				display: flex;
				justify-content: center;
				align-items: center;
				position: relative;
				overflow: hidden;
				transition: 0.2s;
			}
			.btn__generate:after{
				content: 'Generated';
				color: #333;
				position: absolute;
				transform: translate(60px,0px);
				transition: 0.1s;
			}
			.btn__generate:hover{
				width: 120px;
				transition: all 0.3s;
				display: flex;
				justify-content: space-between;
				opacity: 0.8;

			}
			.btn__generate:hover:after{
				transition: all 0.3s;
				transform: translate(20%,0);

			}
			.sending__animate{
				animation: sending 1.5s infinite;
				padding-right:15px; 
			}
			@keyframes sending{
				0%{
					transform: translate(0);
					opacity: 0;

				}
				20%{
					transform: rotate(40deg);
				}
				50%{
					transform: translate(0);
					transform: rotate(90deg);
				}
				100%{
					opacity: 0.8;
					transform: translate(120px);
				}
			}
			.rec__sending{
				animation: rec_send 1.6s infinite;
			}
			@keyframes rec_send{
				0%{
					font-size: 10px;
				}
				100%{
					font-size: 20px;
				}
			}
			.btn__upload__mes{
				width: 35px;
				height: 35px;
				margin: auto;
				border-radius: 5px;
				background: #f5af00;
				outline:none;
				border: none;
				display: flex;
				justify-content: center;
				align-items: center;
				position: relative;
				overflow: hidden;
				transition: 0.2s;
			}
			.btn__upload__mes:after{
				content: 'Message';
				color: #333;
				position: absolute;
				transform: translate(60px,0px);
				transition: 0.1s;
			}
			.btn__upload__mes:hover{
				width: 120px;
				transition: all 0.3s;
				display: inline-block;
				opacity: 0.8;
				padding: 5px;
				margin: auto;

			}
			.btn__upload__mes:hover:after{
				transition: all 0.3s;
				transform: translate(20%,0);

			}
			.import{
				height: 0;
				width: 0;
				overflow: hidden;
			}
			.import + .btn__upload__mes{
				padding: auto;
				margin: auto;
				overflow: hidden;
				outline: none;
				position: relative;
				font-size: inherit;
				display: flex;
				font-weight: 600;
				padding: 5px;
				justify-content: center;
				align-items: center;


			}
		</style>



</head>
<body>
<div id="wrapper">
       <!----->
        <nav class="navbar-default navbar-static-top" role="navigation">
             <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
               <h1> <a class="navbar-brand" href="./">SM BULK MAIL</a></h1>         
			   </div>
			 <div class=" border-bottom">
        	<div class="full-left">
        	  <section class="full-top">
				<button id="toggle"><i class="fa fa-arrows-alt"></i></button>	
			</section>
			<form class=" navbar-left-right">
              <input type="text"  value="Search..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search...';}">
              <input type="submit" value="" class="fa fa-search">
            </form>
            <div class="clearfix"> </div>
           </div>
			<div class="clearfix">
       
     </div>
	  
		    	<?php include_once 'nav.php'; ?>
			</div>
        </nav>