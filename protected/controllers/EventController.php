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
        if ($_POST['create']) {
            $event = new Event($_POST);
            $event->save();
            $this->redirect(array('/event/eventList'));
        }
        
        if($_POST['preview']) {
            Yii::app()->session['eventData'] = $_POST;
            $this->redirect(array('/event/addKeyword'));
        }        
        
        $this->render('create');
    }
    
    public function actionAddKeyword() {
       $eventKeyword = Yii::app()->params['eventKeyword'];      
       $this->render('addKeyword', array('eventKeyword'=>$eventKeyword)); 
    }    
}
