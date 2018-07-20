<!doctype html>
<html class="no-js" lang="fr">
	<head>
		<meta charset="UTF-8">
		<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
		<title><?php echo $title; ?></title>

		<?php echo $meta;?>
		<?php echo favicons();?>
		<?php echo chrome_frame();?>
		<?php echo view_port();?>
		<?php echo apple_mobile('black-translucent');?>
		<?php echo $css;?>

		<link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,700,700i" rel="stylesheet" />

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

		<base href="<?php echo site_url(); ?>" />
	</head>

	<body>
		<div class="body mw1000p center">
