<?php 
$this->pageTitle = CHtml::encode(Yii::app()->name) . ' - Event';
$this->breadcrumbs = array(
        'Event',
); 
?>
<p><input style="font-size:15px;" type="button" value="Create a new event"/></p>
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