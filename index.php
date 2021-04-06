<?php
    session_start();
    require 'include.php';
    ?>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/style.css">
    </head>
    <nav class="navbar navbar-dark bg-dark mb-4">
        <a class="navbar-brand mx-4" href="#">Gestion d'Equipes</a>
    </nav>


    <?php

    $userController = new UserController();
    $dashboardController = new DashboardController();
    $teamController = new TeamController();

    if($_GET['controller'] == 'dashboard' ||
        ($_GET['controller'] == 'team' && $_GET['action'] !== 'list'))
        {
            if(empty($_SESSION)){
                header('Location: index.php?controller=user&action=login');
        }
    }

    if(empty($_GET)){
        header('Location: index.php?controller=team&action=list');
    }

    if($_GET['controller'] == 'user' && $_GET['action'] == 'login'){
        $userController->displayLoginForm();
    } elseif ($_GET['controller'] == 'user' && $_GET['action'] == 'loginForm'){
        $userController->logUser();
    }  elseif ($_GET['controller'] == 'user' && $_GET['action'] == 'register'){
        $userController->displayRegisterForm();
    } elseif($_GET['controller'] == 'user' && $_GET['action'] == 'registerForm'){
       $userController->registerUser();
    } elseif($_GET['controller'] == 'user' && $_GET['action'] == 'logout') {
        $userController->logoutUser();
    } elseif($_GET['controller'] == 'dashboard' && $_GET['action'] == 'home') {
        $dashboardController->displayHome();
    } elseif($_GET['controller'] == 'team' && $_GET['action'] == 'list') {
        $teamController->displayList();
    } elseif($_GET['controller'] == 'team' && $_GET['action'] == 'createTeamForm') {
        $teamController->displayCreateTeamForm();
    } elseif($_GET['controller'] == 'team' && $_GET['action'] == 'createTeam') {
        $teamController->createTeam();
    } elseif($_GET['controller'] == 'team' && $_GET['action'] == 'delete' && isset($_GET['id'])) {
        $teamController->deleteTeam($_GET['id']);
    } elseif($_GET['controller'] == 'team' && $_GET['action'] == 'updateTeamForm' && isset($_GET['id'])) {
        $teamController->displayUpdateTeamForm($_GET['id']);
    } elseif($_GET['controller'] == 'team' && $_GET['action'] == 'updateTeam' && isset($_GET['id'])) {
        $teamController->updateTeam($_GET['id']);
    }

    else {
        throw new Exception('Page introuvable', 404);
    }
?>
