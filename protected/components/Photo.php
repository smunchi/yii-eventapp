<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Photo {
    private $fileName;
    
    public function setFileName($fileName) {
        $this->fileName = $fileName;
    }
    
    public function save() {
        $sql = 'INSERT INTO photo SET name = :name, created_by = :created_by, created_at = :created_at';
        $cmd = Yii::app()->db->createCommand($sql);
        $cmd->bindValue(":name", $this->fileName);
        $cmd->bindValue(":created_by", Yii::app()->session['user_id']);
        $cmd->bindValue(":created_at", date("Y-m-d H:m:s"));
        $cmd->execute();   
        
        return Yii::app()->db->lastInsertID;
    }
}
?>
