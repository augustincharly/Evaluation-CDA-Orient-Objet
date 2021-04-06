<?php
class DashboardController {

    private $teamManager;

    public  function  __construct()
    {
        $this->teamManager = new TeamManager();
    }

    function displayHome(){
        $teams = $this->teamManager->readAll()['teams'];
        require 'Vue/dashboard.php';
    }
}
?>
