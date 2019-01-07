<?php

    if(!isset($this->session->firstname) && !isset($this->session->password) && !isset($this->session->qualification)){
		redirect(base_url()."public/index.php/main");	
	}

?>
<!doctype html>
<html lang="en">

<head>
	<title>BUDGET TRACKING SYSTEM</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="<?php echo asset_url() ?>vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo asset_url() ?>vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo asset_url() ?>vendor/linearicons/style.css">
	<link rel="stylesheet" href="<?php echo asset_url() ?>vendor/chartist/css/chartist-custom.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="<?php echo asset_url() ?>css/main.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo asset_url() ?>img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?php echo asset_url() ?>img/favicon.png">
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">


    