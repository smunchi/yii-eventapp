<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Event
 *
 * @author Salahuddin
 */
class Event {
    private $title;
    private $description;
    
    public function __construct($_post) {
       $this->title = $_post['title'];
       $this->description =  $_post['description'];
    }  
       
    public function save() {
        $sql = "INSERT INTO event SET title = :title, description = :description";
        $cmd = Yii::app()->db->createCommand($sql);
        $cmd->bindParam(":title", $this->title);
        $cmd->bindParam(":description", $this->description);
        $cmd->execute();
        
        return true;
    }
}
