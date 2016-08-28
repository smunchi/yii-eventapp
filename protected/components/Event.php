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
    private $id;
    private $title;
    private $description;
    private $keyword;
    
    public function __construct($_post) {
      
       if(is_numeric($_post)) {
           $this->id = $_post;
           return;    
       }
            
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
        
        $eventId = Yii::app()->db->getLastInsertID();
        
        if(!empty($this->keyword)) {            
            $this->saveKeyword($eventId);
        }
        
        return $eventId;
    }
    
    public function saveKeyword($eventId) {
        $data = array();
        foreach ($this->keyword as $keywordValue) {
            $data[] = '("' . $keywordValue . '", "' . $eventId . '")';
        }
        
        $values = join(',', $data);
        
        $sql = "INSERT INTO keyword (name, eventId) VALUES $values";
        $cmd = Yii::app()->db->createCommand($sql);      
        $cmd->execute();  
        
        return true;
    }
    
    public function findById() {
        $sql = "SELECT E.*, group_concat(K.name SEPARATOR  '##$$' ) as keyword FROM event as E LEFT JOIN keyword as K on (E.id = K.eventId) WHERE E.id = :id GROUP BY E.id";
        $cmd = Yii::app()->db->createCommand($sql);
        $cmd->bindValue(":id", $this->id);
    
        return $cmd->queryRow();
    }
    
    public static function updateEventPhotoId($eventId, $photoId) {
        $sql = "UPDATE event SET event_photo_id = :event_photo_id WHERE id = :event_id";
        $cmd = Yii::app()->db->createCommand($sql);
        $cmd->bindParam(":event_id", $eventId);
        $cmd->bindParam(":event_photo_id", $photoId);
        $cmd->execute();
    }
    
    public static function getLatestEvent() {
        $sql = "SELECT E.*, P.* FROM event as E LEFT JOIN photo as P on (P.id = E.event_photo_id) 
                WHERE P.name IS NOT NULL ORDER BY E.created_at desc limit 15";
        $cmd = Yii::app()->db->createCommand($sql);
    
        return $cmd->queryAll();
    }
}
