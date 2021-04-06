<?php


class TeamManager extends DbManager
{
    function __construct()
    {
        parent::__construct();
    }

    public function insert(Team $team) {
        $name = $team->getName();
        $points = $team->getPoints();
        $goalsTaken = $team->getGoalsTaken();
        $goalsScored = $team->getGoalsScored();
        $url = $team->getUrl();

        try {
            $requete = $this->bdd->prepare(
                "INSERT INTO team (name, points, goals_taken, goals_scored, url) 
                          VALUES (?,?,?,?,?)");

            $requete->bindParam(1, $name);
            $requete->bindParam(2, $points);
            $requete->bindParam(3, $goalsTaken);
            $requete->bindParam(4, $goalsScored);
            $requete->bindParam(5, $url);


            $error = null;

            $requete->execute();


        } catch (\PDOException $e) {

            $error = 'Oups ! Erreur inconnu bonne journée ! ';

        }



        return ['erreur'=> $error];

    }

    public function update(Team $team) {
        $name = $team->getName();
        $points = $team->getPoints();
        $goalsTaken = $team->getGoalsTaken();
        $goalsScored = $team->getGoalsScored();
        $url = $team->getUrl();
        $id = $team->getId();

        try {
            $requete = $this->bdd->prepare(
                "UPDATE team
                          SET name = ?, points = ?, goals_taken = ?, goals_scored = ?, url = ? 
                          WHERE  id = ?;");

            $requete->bindParam(1, $name);
            $requete->bindParam(2, $points);
            $requete->bindParam(3, $goalsTaken);
            $requete->bindParam(4, $goalsScored);
            $requete->bindParam(5, $url);
            $requete->bindParam(6, $id);


            $error = null;

            $requete->execute();


        } catch (\PDOException $e) {

            $error = 'Oups ! Erreur inconnu bonne journée ! ';

        }



        return ['erreur'=> $error];

    }

    public function readAll($ordered = false) {

        try {
            $requete =
                $this->bdd->prepare( ($ordered) ?
                    "SELECT * FROM team ORDER BY points DESC, goals_taken ASC, goals_scored DESC;"
                        : "SELECT * FROM team");
            $teams = [];

            $error = null;

            $requete->execute();
            $res = $requete->fetchAll();

            foreach ($res as $row){
                $teams[] = new Team(
                        $row['id'],
                        $row['name'],
                        $row['points'],
                        $row['goals_taken'],
                        $row['goals_scored'],
                        $row['url']);
            }



        } catch (\PDOException $e) {

            $error = 'erreur pendant le traitement de la requête';
        }



        return ['erreur'=> $error, 'teams' => $teams];

    }

    public function readOne($id){

        try {
            $requete = $this->bdd->prepare("SELECT * FROM team WHERE id = ?;");
            $team = null;

            $error = null;

            $requete->bindParam(1,$id);

            $requete->execute();
            $res = $requete->fetch();


            $team = new Team(
                $res['id'],
                $res['name'],
                $res['points'],
                $res['goals_taken'],
                $res['goals_scored'],
                $res['url']);



        } catch (\PDOException $e) {

            $error = 'erreur pendant le traitement de la requête';
        }



        return ['erreur'=> $error, 'team' => $team];

    }

    public function delete($id){

        try {
            $requete = $this->bdd->prepare("DELETE FROM team WHERE id = ?;");

            $error = null;

            $requete->bindParam(1,$id);

            $requete->execute();


        } catch (\PDOException $e) {

            $error = 'erreur pendant le traitement de la requête';
        }

    }
}
