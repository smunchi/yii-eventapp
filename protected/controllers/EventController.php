<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class EventController extends Controller {
    
    public function actionEventList() {
        $dataProvider = new CActiveDataProvider('Event');
        $this->render('eventList', array('dataProvider'=>$dataProvider));
    }
    
    public function actionEventFilter() {
        $criteria = new CDbCriteria();

        if ($q = $_GET['q']) {
            $criteria->compare('title', $q, true, 'OR');
            $criteria->compare('description', $q, true, 'OR');
        }

        $dataProvider = new CActiveDataProvider('Event', array('criteria' => $criteria));
        $this->render('eventList', array('dataProvider' => $dataProvider));
    }
}