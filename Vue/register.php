<html>
<head>

</head>

<body>
<form method="post" action="/cda/augustin_charly_POO/index.php?controller=user&action=registerForm">
    <label>Username</label>
    <input autofocus type="text" placeholder="Nom d'utilisateur" name="username">

    <label>Password</label>
    <input type="password" name="password" placeholder="password">

    <label>Confirm password</label>
    <input type="password" name="password_confirm" placeholder="Resaisissez le mot de passe !">

    <input type="submit" value="envoyer">
</form>
<div>
    <a href="index.php?controller=user&action=login">J'ai un compte !</a>
</div>

<div class="my-2">
    <a href="index.php?controller=team&action=list">Retour au classement </a>
</div>

<?php
if(isset($errorsForm)){
    echo('<ul>');
    foreach ($errorsForm as $error){

        echo('<li>'.$error.'</li>');
    }

    echo('</ul>');
}
?>

</body>
</html>
