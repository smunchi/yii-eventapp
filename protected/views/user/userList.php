<?php 
$this->pageTitle = CHtml::encode(Yii::app()->name) . ' - User';
$this->breadcrumbs = array(
        'People',
); 
?>
<h3>Find people by name</h3>
<div>
<form method="get" action="<?php echo Yii::app()->createUrl('/user/userFilter')  ?>">
    <input type="search" autocomplete="off" name='q' size='30' value="<?php echo isset($_GET['q']) ? $_GET['q'] : ''; ?>" placeholder="Search people by name or email"/>
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
    'itemView' => '_singleUserView',
    'enablePagination' => false,
    'summaryText' => ''
));
?>
