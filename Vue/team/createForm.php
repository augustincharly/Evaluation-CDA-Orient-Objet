<html>
<head>

</head>

<body>
<div class="container">
    <h3 class="mb-3">Création d'une équipe</h3>
    <form class="form" method="post" action="/cda/augustin_charly_POO/index.php?controller=team&action=createTeam" enctype="multipart/form-data">
        <div class="form-group">
            <label>nom de l'équipe</label>
            <input class="form-control" autofocus type="text" placeholder="Nom de l'équipe" name="name">
        </div>
        <div class="form-group"><label>points</label>
            <input class="form-control" type="number" name="points">
        </div>
        <div class="form-group">
            <label>but pris</label>
            <input class="form-control" type="number" name="goals_taken" >
        </div>
        <div class="form-group">
            <label>but inscrits</label>
            <input class="form-control" type="number" name="goals_scored" >
        </div>
        <div class="form-group">
            <label>logo</label>
            <input class="form-control" type="file" name="picture" >
        </div>
        <input class="btn btn-success my-3" type="submit" value="Créer l'équipe">
</div>

</form>



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
