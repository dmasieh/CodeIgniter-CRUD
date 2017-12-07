<!DOCTYPE html>
<html>
<head>
	<title>AlfreCation Vacation Reviews</title>

	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/materialize.css">

	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css">

	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

	<link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/images/vacation.png" />

	<script src="https://cdn.ckeditor.com/4.7.3/basic/ckeditor.js"></script>
</head>
<body>	
	<nav>
    	<div class="nav-wrapper container">
      		<a href="<?php echo base_url(); ?>posts" class="brand-logo left">AlfreCation</a>
      		<a href="#" data-activates="slide-out" class="button-collapse right"><i class="material-icons">menu</i></a>
      		<ul class="right hide-on-med-and-down">
      			<li><a href="<?php echo base_url(); ?>about">About</a></li>
			    <li><a href="<?php echo base_url(); ?>categories">Categories</a></li>
        		<?php if($this->session->userdata('logged_in')) : ?>
			      	<li><a href="<?php echo base_url(); ?>posts/create">Write Review</a></li>
			      	<li><a href="<?php echo base_url(); ?>users/logout">Log Out</a></li>
			      	<?php endif;?>

			      	<?php if(!$this->session->userdata('logged_in')) : ?>
			      	<li><a href="<?php echo base_url(); ?>users/register">Sign Up</a></li>
			      	<li><a href="<?php echo base_url(); ?>users/login">Log In</a></li>
			    <?php endif;?>
      		</ul>
      		<ul class="side-nav" id="slide-out">
      			<li><a href="<?php echo base_url(); ?>about">About</a></li>
			    <li><a href="<?php echo base_url(); ?>categories">Categories</a></li>
        		<?php if($this->session->userdata('logged_in')) : ?>
			      	<li><a href="<?php echo base_url(); ?>posts/create">Write Review</a></li>
			      	<li><a href="<?php echo base_url(); ?>users/logout">Log Out</a></li>
			      	<?php endif;?>

			      	<?php if(!$this->session->userdata('logged_in')) : ?>
			      	<li><a href="<?php echo base_url(); ?>users/register">Sign Up</a></li>
			      	<li><a href="<?php echo base_url(); ?>users/login">Log In</a></li>
			    <?php endif;?>
      		</ul>
    	</div>
  	</nav>

	<div class="container">
		<!-- Flash Messages -->
		<?php if($this->session->flashdata('user_registered')): ?>
			<?php echo '<br>'.$this->session->flashdata('user_registered'); ?>
		<?php endif; ?>

		<?php if($this->session->flashdata('post_created')): ?>
			<?php echo '<br>'.$this->session->flashdata('post_created'); ?>
		<?php endif; ?>

		<?php if($this->session->flashdata('post_updated')): ?>
			<?php echo '<br>'.$this->session->flashdata('post_updated'); ?>
		<?php endif; ?>

		<?php if($this->session->flashdata('post_deleted')): ?>
			<?php echo '<br>'.$this->session->flashdata('post_deleted'); ?>
		<?php endif; ?>

		<?php if($this->session->flashdata('login_failed')): ?>
			<?php echo '<br>'.$this->session->flashdata('login_failed'); ?>
		<?php endif; ?>

		<?php if($this->session->flashdata('user_loggedin')): ?>
			<?php echo '<br>'.$this->session->flashdata('user_loggedin'); ?>
		<?php endif; ?>

		<?php if($this->session->flashdata('user_loggedout')): ?>
			<?php echo '<br>'.$this->session->flashdata('user_loggedout'); ?>
		<?php endif; ?>