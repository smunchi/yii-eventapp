<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class EventController extends Controller {

    public function actionEventList() {
        $dataProvider = new CActiveDataProvider('SystemEvent');
        $popularKeyword = Yii::app()->params['eventKeyword']['School Based'];

        $this->render('eventList', array('dataProvider' => $dataProvider, 'popularKeyword' => $popularKeyword));
    }

    public function actionEventFilter() {
        $criteria = new CDbCriteria();
        $criteria->select = '*';
        $criteria->alias = 'E';

        if ($q = $_GET['q']) {
            $criteria->compare('title', $q, true, 'OR');
            $criteria->compare('description', $q, true, 'OR');
        }

        if ($keyword = $_GET['keyword']) {
            foreach ($keyword as $key) {
                $content[] = ' keyword.name="' . $key . '" ';
            }
            $condition = implode('AND', $content);
            $criteria->join = 'inner join keyword on keyword.eventId = E.id';
            $criteria->condition = $condition;
        }

        $dataProvider = new CActiveDataProvider('SystemEvent', array('criteria' => $criteria));
        $popularKeyword = Yii::app()->params['eventKeyword']['School Based'];
        $this->render('eventList', array('dataProvider' => $dataProvider, 'popularKeyword' => $popularKeyword));
    }

    public function actionCreate() {
        if (isset($_POST['create'])) {
            $event = new Event($_POST);
            $event->save();
            $obj = new UploadHandler();
            $this->redirect(array('/event/eventList'));
        }

        if (isset($_POST['preview'])) {
            Yii::app()->session['eventData'] = $_POST;
            $this->redirect(array('/event/addKeyword'));
        }

        $this->render('create');
    }

    public function actionAddKeyword() {
        $eventKeyword = Yii::app()->params['eventKeyword'];
        $eventData = Yii::app()->session['eventData'];
        $existingKeyword = !empty($eventData['keyword']) ? $eventData['keyword'] : [];

        if (isset($_REQUEST['keyword'])) {
            foreach ($_REQUEST['keyword'] as $keyword) {
                if (!in_array($keyword, $existingKeyword)) {
                    array_push($existingKeyword, $keyword);
                }
            }
        }

        $eventData['keyword'] = $existingKeyword;
        Yii::app()->session['eventData'] = $eventData;
        $this->render('addKeyword', array('eventKeyword' => $eventKeyword, 'existingKeyword' => $eventData['keyword']));
    }

    public function actionPreview() {
        $eventData = Yii::app()->session['eventData'];
        $this->render('view', array('eventData' => $eventData));
    }

    public function actionView() {
        $eventId = Yii::app()->request->getParam('id');
        $event = new Event($eventId);
        $eventData = $event->findById();
        $this->render('view', array('eventData' => $eventData));
    }

    public function actionSave() {
        $eventData = Yii::app()->session['eventData'];
        $event = new Event($eventData);
        $event->save();
        Yii::app()->session->remove('eventData');
        $this->redirect(array('/event/eventList'));
    }

    public function actionUpload() {        
        $obj = new UploadHandler();
    }
}
