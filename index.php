<?php
    require 'include.php';

    $userController = new UserController();
    $dashboardController = new DashboardController();

    if($_GET['controller'] == 'dashboard'){
        if(empty($_SESSION)){
            header('Location: index.php?controller=user&action=login');
        }
    }

    if(empty($_GET)){
        header('Location: index.php?controller=user&action=login');
    }

    if($_GET['controller'] == 'user' && $_GET['action'] == 'login'){
        $userController->displayLoginForm();
    } elseif ($_GET['controller'] == 'user' && $_GET['action'] == 'loginForm'){
        $userController->logUser();
    }  elseif ($_GET['controller'] == 'user' && $_GET['action'] == 'register'){
        $userController->displayRegisterForm();
    } elseif($_GET['controller'] == 'user' && $_GET['action'] == 'registerForm'){
       $userController->registerUser();
    } elseif($_GET['controller'] == 'dashboard' && $_GET['action'] == 'home') {
        $dashboardController->displayHome();
    }

    else {
        throw new Exception('Page introuvable', 404);
    }
?>