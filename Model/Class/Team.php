<?php


class Team
{
    private $id;
    private $name;
    private $points;
    private $goalsTaken;
    private $goalsScored;
    private $url;

    /**
     * Team constructor.
     * @param $id
     * @param $name
     * @param $points
     * @param $goalsTaken
     * @param $goalsScored
     * @param $url
     */
    public function __construct($id =null, $name =null, $points= null, $goalsTaken = null, $goalsScored = null, $url =null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->points = $points;
        $this->goalsTaken = $goalsTaken;
        $this->goalsScored = $goalsScored;
        $this->url = $url;
    }

    /**
     * @return null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param null $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return null
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param null $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return null
     */
    public function getPoints()
    {
        return $this->points;
    }

    /**
     * @param null $points
     */
    public function setPoints($points)
    {
        $this->points = $points;
    }

    /**
     * @return null
     */
    public function getGoalsTaken()
    {
        return $this->goalsTaken;
    }

    /**
     * @param null $goalsTaken
     */
    public function setGoalsTaken($goalsTaken)
    {
        $this->goalsTaken = $goalsTaken;
    }

    /**
     * @return null
     */
    public function getGoalsScored()
    {
        return $this->goalsScored;
    }

    /**
     * @param null $goalsScored
     */
    public function setGoalsScored($goalsScored)
    {
        $this->goalsScored = $goalsScored;
    }

    /**
     * @return null
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param null $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }



}
