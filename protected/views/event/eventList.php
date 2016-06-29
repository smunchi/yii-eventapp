<?php 
$this->pageTitle = CHtml::encode(Yii::app()->name) . ' - Event';
$this->breadcrumbs = array(
        'Event',
); 
?>
<p>
    <a style="font-size: 16px;" href="<?php echo Yii::app()->createUrl('/event/create') ?>" title="Create a new event from here">Create a new event</a>
</p>
<h3>Find event by text</h3>
<div>
<form method="get" action="<?php echo Yii::app()->createUrl('/event/eventFilter')  ?>">
    <input type="search" autocomplete="off" name='q' size='30' value="<?php echo isset($_GET['q']) ? $_GET['q'] : ''; ?>" placeholder="Search event by title or description"/>
    <input type="submit" value="search"/>
</form>
</div><br/>
<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_singleEventView',
    'enablePagination' => false,
    'summaryText' => ''
));
?>