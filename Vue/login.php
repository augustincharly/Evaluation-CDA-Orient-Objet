<html>
    <head>

    </head>

    <body>
        <form method="post" action="/cda/mvcProject/index.php?controller=user&action=loginForm">
            <label>Username</label>
            <input type="text" placeholder="Nom d'utilisateur" name="username">

            <label>Password</label>
            <input type="password" name="password" placeholder="password">

            <input type="submit" value="envoyer">
        </form>

        <a href="index.php?controller=user&action=register">Je n'ai pas encore de compte ! </a>

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