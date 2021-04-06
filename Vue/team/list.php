
<div class="container text-center">
    <h3 class="my-4">Bienvenue sur le classement des équipes</h3>
    <table class="table table-bordered table-striped text-center">
        <thead class="table-dark">
        <tr>
            <th>Classement</th>
            <th>Equipe</th>
            <th>Points obtenus</th>
            <th>But pris</th>
            <th>But inscrits</th>
            <th>Logo</th>
        </tr>
        </thead>

        <tbody>
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
                </tr>
            <?php }

        }?>
        </tbody>


    </table>
    <div>
        <a href="index.php?controller=user&action=login">Se connecter </a>
    </div>
    <div class="my-2">
        <a href="index.php?controller=user&action=register">Créer un compte  </a>
    </div>

</div>
