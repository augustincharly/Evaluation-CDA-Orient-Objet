<?php


class TeamController
{
    private $teamManager;

    public function __construct()
    {
        $this->teamManager = new TeamManager();
    }

    public function displayList(){
        if (empty($this->teamManager->readAll()['teams'])){
            $teamsToAdd = $teams[] = new Team(
                '1',
                'OM',
                10,
                10,
                10,
                'https://upload.wikimedia.org/wikipedia/fr/thumb/4/43/Logo_Olympique_de_Marseille.svg/langfr-800px-Logo_Olympique_de_Marseille.svg.png');
            $teams[] = new Team(
                '2',
                'PSG',
                10,
                9,
                10,
                'https://cdn.1min30.com/wp-content/uploads/2017/09/nouveau-logo-psg.jpeg');

            $teams[] = new Team(
                '3',
                'Juventus',
                10,
                9,
                11,
                'https://i.f1g.fr/media/figaro/805x453_crop/2017/01/17/XVM5dfc613a-dccc-11e6-9c25-97836c8a1e43.jpg');
        foreach ($teams as $team){
            $this->teamManager->insert($team);
        }
        }
        $teams = $this->teamManager->readAll(true)['teams'];
        require 'Vue/team/list.php';
    }

    public function displayCreateTeamForm(){
        require 'Vue/team/createForm.php';
    }

    public function displayUpdateTeamForm($id){
        if ($this->teamManager->readOne($id)['team'] !== null){
            $team = $this->teamManager->readOne($id)['team'];
            require 'Vue/team/updateForm.php';
        } else {
            header('location: index.php?controller=dashboard&action=home');
        }

    }

    public function createTeam(){
        $errorsForm = [];

        if(empty($_POST['name'])){
            $errorsForm[] = 'Veuillez saisir un name';
        }

        if(empty($_POST['points'])){
            $errorsForm[] = 'Veuillez saisir un nombre de points';
        }

        if(empty($_POST['goals_taken'])){
            $errorsForm[] = 'Veuillez saisir un nombre de buts pris';
        }

        if(empty($_POST['goals_scored'])){
            $errorsForm[] = 'Veuillez saisir un nombre de buts inscrits';
        }

        if (isset($_FILES['picture']) && $_FILES['picture']['error'] == 0){
            if($_FILES['picture']['size'] >= 1000000000){
                $errors[] = "Fichier trop lourd !!";
            } else {
                $extension_upload = $_FILES['picture']['type'];

                $extension = explode("/", $extension_upload)[1];


                $fileName = 'uploads/'.uniqid().'.'.$extension;



                move_uploaded_file($_FILES['picture']['tmp_name'], $fileName);
            }

        } else {
            $errorsForm[] = 'Erreur lors de l\'upload de l\'image !!';
        }
        if(count($errorsForm) == 0) {
            $name = $_POST['name'];
            $points = $_POST['points'];
            $goalsTaken = $_POST['goals_taken'];
            $goalsScored = $_POST['goals_scored'];
            $url = $fileName;
            $team = new Team(null,$name,$points,$goalsTaken,$goalsScored,$url);
            $this->teamManager->insert($team);
            header('Location: index.php?controller=dashboard&action=home');
        } else {
            require 'Vue/team/createForm.php';
        }


    }

    public function updateTeam($id){
        $errorsForm = [];

        if (empty($this->teamManager->readOne($id)['team'])){
            $errorsForm[] = 'mauvais id';
        }

        if(empty($_POST['name'])){
            $errorsForm[] = 'Veuillez saisir un name';
        }

        if(empty($_POST['points'])){
            $errorsForm[] = 'Veuillez saisir un nombre de points';
        }

        if(empty($_POST['goals_taken'])){
            $errorsForm[] = 'Veuillez saisir un nombre de buts pris';
        }

        if(empty($_POST['goals_scored'])){
            $errorsForm[] = 'Veuillez saisir un nombre de buts inscrits';
        }

        if (isset($_FILES['picture']) && $_FILES['picture']['error'] == 0){
            if($_FILES['picture']['size'] >= 1000000000){
                $errors[] = "Fichier trop lourd !!";
            } else {
                $extension_upload = $_FILES['picture']['type'];

                $extension = explode("/", $extension_upload)[1];


                $fileName = 'uploads/'.uniqid().'.'.$extension;



                move_uploaded_file($_FILES['picture']['tmp_name'], $fileName);
            }

        }
        if(count($errorsForm) == 0) {
            $name = $_POST['name'];
            $points = $_POST['points'];
            $goalsTaken = $_POST['goals_taken'];
            $goalsScored = $_POST['goals_scored'];
            $url = isset($fileName) ? $fileName : $this->teamManager->readOne($id)['team']->getUrl();
            $team = new Team($id,$name,$points,$goalsTaken,$goalsScored,$url);
            $this->teamManager->update($team);
            header('Location: index.php?controller=dashboard&action=home');
        } else {
            $team = $this->teamManager->readOne($id)['team'];
            require 'Vue/team/updateForm.php';
        }
    }

    public function deleteTeam($id){

        if($this->teamManager->readOne($id)['error'] == null){
            $this->teamManager->delete($id);
        }
        header('Location: index.php?controller=dashboard&action=home');

    }

}
