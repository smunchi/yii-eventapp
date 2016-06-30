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
       
       if(isset($_post['keyword'])) {
           $this->keyword = $_post['keyword'];
       }
    }  
       
    public function save() {
        $sql = "INSERT INTO event SET title = :title, description = :description";
        $cmd = Yii::app()->db->createCommand($sql);
        $cmd->bindParam(":title", $this->title);
        $cmd->bindParam(":description", $this->description);
        $cmd->execute();
        
        if(!empty($this->keyword)) {
            $this->saveKeyword();
        }
        
        return true;
    }
    
    public function saveKeyword() {
        $data = array();
        foreach ($this->keyword as $keywordValue) {
            $data[] = '("' . $keywordValue . '")';
        }
        
        $values = join(',', $data);
        
        $sql = "INSERT INTO keyword (name) VALUES $values";
        $cmd = Yii::app()->db->createCommand($sql);      
        $cmd->execute();  
        
        return true;
    }
}
