<html>
<head>

</head>

<body>
<div class="container">
    <h3 class="mb-3">Mise à jour d'une équipe</h3>
    <form class="form" method="post" action="/cda/augustin_charly_POO/index.php?controller=team&action=updateTeam&id=<?= $id ?>" enctype="multipart/form-data">
        <div class="form-group">
            <label>nom de l'équipe</label>
            <input  value="<?= $team->getName() ?>" class="form-control" autofocus type="text" placeholder="Nom de l'équipe" name="name">
        </div>
        <div class="form-group"><label>points</label>
            <input  value="<?= $team->getPoints() ?>" class="form-control" type="number" name="points">
        </div>
        <div class="form-group">
            <label>but pris</label>
            <input value="<?= $team->getGoalsTaken() ?>" class="form-control" type="number" name="goals_taken" >
        </div>
        <div class="form-group">
            <label>but inscrits</label>
            <input  value="<?= $team->getGoalsScored() ?>" class="form-control" type="number" name="goals_scored" >
        </div>
        <div class="form-group">
            <label>logo</label>
            <input class="form-control" type="file" name="picture" >
        </div>
        <input class="btn btn-success my-3" type="submit" value="Mettre à jour l'équipe">
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
