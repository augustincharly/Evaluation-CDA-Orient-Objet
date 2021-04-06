<?php
class UtilisateurManager extends DbManager {

    function __construct()
    {
        parent::__construct();
    }

    public function insert(Utilisateur $utilisateur) {
        $username = $utilisateur->getUsername();
        $password = hash('sha256',$utilisateur->getPassword());

        try {
            $requete = $this->bdd->prepare("INSERT INTO user (username, password) VALUES (?,?)");

            $requete->bindParam(1, $username);
            $requete->bindParam(2, $password);


            $error = null;

            $requete->execute();


        } catch (\PDOException $e) {

            if($e->getCode() == '23000'){
                $error = 'Cet utilisateur existe déjà veuillez vous connecter avec votre mot de passe';
            } else {
                $error = 'Oups ! Erreur inconnu bonne journée ! ';
            }
        }



        return ['erreur'=> $error];

    }

    public function testLogin($username, $password) {
        $requete = $this->bdd->prepare("SELECT * FROM user WHERE username = ? AND password = ?");
        $hashedPässword = hash('sha256',$password);
        $requete->bindParam(1, $username);
        $requete->bindParam(2, $hashedPässword);

        $requete->execute();
        $res = $requete->fetch();

        $erreur = null;
        $utilisateur = null;

        if($res === false) {
            $erreur = 'Identifiant incorrecte !';
        } else {
            $utilisateur = new Utilisateur($res['id'], $res['username'], $res['password']);
        }

        return ['error'=> $erreur, 'utilisateur'=> $utilisateur];
    }
}
?>
