<html>
<head>

</head>
<body>

<div class="container text-center">
    <h3 class="my-4">Bienvenue dans l'administration, <?= $_SESSION['username'] ?></h3>
    <table class="table table-bordered table-striped text-center">
        <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>Equipe</th>
            <th>Points obtenus</th>
            <th>But pris</th>
            <th>But inscrits</th>
            <th>Logo</th>
            <th >actions</th>
        </tr>
        </thead>

        <tbody>

        <div>
            <a href="index.php?controller=team&action=createTeamForm" class="btn btn-info mb-3 ">Créer une équipe</a>
        </div>
        <?php
        if (isset($teams)) {
            foreach ($teams as $index => $team) { ?>

                <tr>
                    <td><?= $index +1 ?></td>
                    <td><?= $team->getName()?></td>
                    <td><?= $team->getPoints()?></td>
                    <td><?= $team->getGoalsTaken()?></td>
                    <td><?= $team->getGoalsScored()?></td>
                    <td><img src="<?= $team->getUrl()?>" alt="logo de l'équipe"></td>
                    <td>
                        <a href="index.php?controller=team&action=updateTeamForm&id=<?= $team->getId()?>" class="btn btn-warning mx-2">modifier</a>
                        <a class="btn btn-danger" href="index.php?controller=team&action=delete&id=<?= $team->getId() ?>">supprimer</a>
                    </td>
                </tr>
            <?php }

        }?>
        </tbody>


    </table>
    <div>
        <a href="index.php?controller=user&action=logout">Se déconnecter </a>
    </div>

</div>

</body>
</html>
