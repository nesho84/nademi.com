<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="title" content="<?php echo $title ?? 'Neshat Ademi - Portfolio'; ?>">
	<meta name=" description" content="A portfolio created by Neshat Ademi - Software Developer, Web Developer">
	<meta name="keywords" content="Portfolio, Neshat Ademi, Software Developer, Web Developer, Bachelor of Computer Science">
	<meta name="robots" content="index, follow">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="English">
	<meta name="author" content="Neshat Ademi">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title><?php echo isset($data['title']) ? "NADEMI - " . $data['title'] : "NADEMI - Portfolio"; ?></title>
	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
	<!-- Font Awesome Icons -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="<?php echo APPURL; ?>/public/css/bootstrap.min.css">
	<!-- Custom styles for this template -->
	<link rel="stylesheet" href="<?php echo APPURL; ?>/public/css/style.css">
	<!-- Favicon for All Devices -->
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo APPURL; ?>/public/favicon/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo APPURL; ?>/public/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo APPURL; ?>/public/favicon/favicon-16x16.png">
	<link rel="manifest" href="<?php echo APPURL; ?>/public/favicon/site.webmanifest">
</head>

<body>

	<div class="main">
		<!-- Main div START -->

		<nav class="navbar sticky-top navbar-expand-sm navbar-light bg-light p-3 px-md-4 mb-3 border-bottom shadow-sm">
			<div class="container">
				<a class="navbar-brand" id="homepage" href="<?php echo APPURL; ?>/">
					<img src="<?php echo APPURL; ?>/public/img/logo2.png" height="50" alt="NADEMI Logo">
					<span class="align-middle mx-auto">NADEMI</span>
				</a>
				<hr>
				<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#menu" aria-controls="menu" aria-expanded="false" aria-label="Toggle navigation">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="sr-only">Toggle navigation</span>
				</button>

				<div class="collapse navbar-collapse" id="menu">
					<hr id="hr-divider">
					<ul class="navbar-nav h5 ml-auto">
						<li class="nav-item <?php activePage('/'); ?>">
							<a class="nav-link" id="home" href="<?php echo APPURL; ?>/"><i class="fas fa-home"></i> Home</a>
						</li>
						<li class="nav-item <?php activePage('/projects'); ?>">
							<a class="nav-link" id="projects" href="<?php echo APPURL . '/projects'; ?>"><i class="fas fa-archive"></i> Projects</a>
						</li>
						<li class="nav-item <?php activePage('/about'); ?>">
							<a class="nav-link" id="about" href="<?php echo APPURL . '/about'; ?>"><i class="fas fa-info-circle"></i> About</a>
						</li>
						<li class="nav-item <?php activePage('/contact'); ?>">
							<a class="nav-link" id="contact" href="<?php echo APPURL . '/contact'; ?>"><i class="fas fa-address-book"></i> Contact</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>

		<!-- Dynamic Content container START -->
		<div id="content" class="container">