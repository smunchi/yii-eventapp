<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class SaveSearch {
    private $id;
    private $name;
    private $request_param;
    
    public function __construct($data = array()) {
        if(count($data)>0) {
            foreach ($data as $key=>$value) {
                $this->$key = $value;
            }
        }
    }

    public function addSaveSearch() {
        $qry = "INSERT INTO saved_search SET name =:name, request_param =:request_param";
        $cmd = Yii::app()->db->createCommand($qry);
        $cmd->bindParam(":name", $this->name);
        $cmd->bindParam(":request_param", $this->request_param);
       
        if($cmd->execute()) {
            return Yii::app()->db->lastInsertID;
        }
    }
}

?>
