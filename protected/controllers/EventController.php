<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class EventController extends Controller {

    public function actionEventList() {
        $dataProvider = new CActiveDataProvider('SystemEvent');
        $this->render('eventList', array('dataProvider' => $dataProvider));
    }

    public function actionEventFilter() {
        $criteria = new CDbCriteria();

        if ($q = $_GET['q']) {
            $criteria->compare('title', $q, true, 'OR');
            $criteria->compare('description', $q, true, 'OR');
        }

        $dataProvider = new CActiveDataProvider('SystemEvent', array('criteria' => $criteria));
        $this->render('eventList', array('dataProvider' => $dataProvider));
    }

    public function actionCreate() {
        if (isset($_POST['create'])) {
            $event = new Event($_POST);
            $event->save();
            $this->redirect(array('/event/eventList'));
        }
        
        if(isset($_POST['preview'])) {
            Yii::app()->session['eventData'] = $_POST;
            $this->redirect(array('/event/addKeyword'));
        }        
        
        $this->render('create');
    }
    
    public function actionAddKeyword() {
       $eventKeyword = Yii::app()->params['eventKeyword'];
       $eventData = Yii::app()->session['eventData'];      
       $existingKeyword = !empty($eventData['keyword']) ? $eventData['keyword']: [];
       
       if(isset($_REQUEST['keyword'])){
           foreach($_REQUEST['keyword'] as $keyword) {
               if(!in_array($keyword, $existingKeyword)) {
                   array_push($existingKeyword, $keyword);
               }
           }
       }
       
       $eventData['keyword'] = $existingKeyword;          
       $this->render('addKeyword', array('eventKeyword'=>$eventKeyword, 'existingKeyword'=>$eventData['keyword'])); 
    }    
}
