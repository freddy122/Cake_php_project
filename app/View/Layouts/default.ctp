
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	<link rel="stylesheet/css" href="<?php echo $this->Html->url('/css/bootstrap.css');?>">
	<link rel="stylesheet/css" href="<?php echo $this->Html->url('/css/bootstrap-responsive.css');?>">
	<?php echo $this->Html->charset(); ?>
	
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('bootstrap.css');
		echo $this->Html->css('bootstrap-responsive.css');
		echo $this->Html->css('bootstrap.min.css');
		echo $this->Html->css('bootstrap-responsive.min.css');
		echo $this->Html->css('styles.css');
		echo $this->Html->css('DT_bootstrap.css');
		
		
		echo $this->Html->script('jquery-1.9.1.js');
		echo $this->Html->script('bootstrap.min.js');
		echo $this->Html->script('jquery.dataTables.min.js');
		echo $this->Html->script('scripts.js');
		echo $this->Html->script('DT_bootstrap.js');
		echo $this->Html->script('modernizr-2.6.2-respond-1.1.0.min.js');


		echo $this->fetch('meta');
		
		echo $this->fetch('script');
	?>
	<script>
        $(function() {
            
        });
        </script>
	<style type="text/css">
      body {
        padding-top: 20px;
        padding-bottom: 60px;
      }

      /* Custom container */
      .container {
        margin: 0 auto;
        max-width: 1000px;
      }
      .container > hr {
        margin: 60px 0;
      }

      /* Main marketing message and sign up button */
      .jumbotron {
        margin: 80px 0;
        text-align: center;
      }
      .jumbotron h1 {
        font-size: 100px;
        line-height: 1;
      }
      .jumbotron .lead {
        font-size: 24px;
        line-height: 1.25;
      }
      .jumbotron .btn {
        font-size: 21px;
        padding: 14px 24px;
      }

      /* Supporting marketing content */
      .marketing {
        margin: 60px 0;
      }
      .marketing p + h4 {
        margin-top: 28px;
      }


      /* Customize the navbar links to be fill the entire space of the .navbar */
      .navbar .navbar-inner {
        padding: 0;
      }
      .navbar .nav {
        margin: 0;
        display: table;
        width: 100%;
      }
      .navbar .nav li {
        display: table-cell;
        width: 1%;
        float: none;
      }
      .navbar .nav li a {
        font-weight: bold;
        text-align: center;
        border-left: 1px solid rgba(255,255,255,.75);
        border-right: 1px solid rgba(0,0,0,.1);
      }
      .navbar .nav li:first-child a {
        border-left: 0;
        border-radius: 3px 0 0 3px;
      }
      .navbar .nav li:last-child a {
        border-right: 0;
        border-radius: 0 3px 3px 0;
      }
    </style>
	
</head>
<body>

	<div class="container">
		<div class="masthead">
        
		<img src="img/ss.jpg"/>
        <div class="navbar">
          <div class="navbar-inner">
            <div class="container">
              <ul class="nav">
                <li ><?php 
	echo $this->Html->link('VENDEUR',array('controller'=>'vendeurs','action'=>'index'));
?></li>
                <li><?php 
	echo $this->Html->link('RECETTE',array('controller'=>'recettes','action'=>'index'));
?></li>
                <li><?php 
	echo $this->Html->link('AUDIT VENDEUR',array('controller'=>'auditvendeurs','action'=>'index'));
?></li>
                <li><?php 
	echo $this->Html->link('JOURNALIERE',array('controller'=>'recettejours','action'=>'index'));
?></li>
                <li><?php 
	echo $this->Html->link('MENSUEL',array('controller'=>'recettemois','action'=>'index'));
?></li>
             
<li><?php 
	echo $this->Html->link('A PROPOS',array('controller'=>'apropos','action'=>'index'));
?></li>
              </ul>
            </div>
          </div>
        </div><!-- /.navbar -->
      </div>
		<div id="content">

			

			<?php echo $this->fetch('content'); ?>
		</div>
		
</div>
	
</body>
</html>
