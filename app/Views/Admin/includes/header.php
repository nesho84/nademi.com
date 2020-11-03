<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title><?php echo $data[0]['title'] ?? "NADEMI - Administration"; ?></title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="<?php echo APPURL; ?>/public/css/bootstrap.min.css" />
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="<?php echo APPURL; ?>/public/css/adm.css" />
</head>

<body>

    <!-- Main Wrapper START -->
    <div id="mainWrapper">

        <!-- Sidebar left START -->
        <?php require_once VIEWS_PATH . "/Admin/includes/nav_left.php"; ?>
        <!-- Sidebar left END -->

        <!-- Content Wrapper START -->
        <div id="contentWrapper">

            <!-- Sidebar top toggle Buttons START -->
            <?php require_once VIEWS_PATH . "/Admin/includes/nav_top.php"; ?>
            <!-- Sidebar top END -->

            <!-- Dynamic Content START -->
            <div id="content">