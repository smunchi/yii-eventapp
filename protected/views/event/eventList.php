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
<form name="eventForm" id="eventForm" method="get" action="<?php echo Yii::app()->createUrl('/event/eventFilter') ?>">
    <input type="search" autocomplete="off" name='q' size='30' value="<?php echo isset($_GET['q']) ? $_GET['q'] : ''; ?>" placeholder="Search event by title or description"/>   
    <br/>
    <p class="keywordList">
        <?php if (count($popularKeyword) > 0): ?>
            <?php foreach ($popularKeyword as $key): ?>
                <a href="javascript:void(0)" onclick="addKeyword('<?php echo $key; ?>')"><?php echo $key; ?></a>
            <?php endforeach; ?>        
        <?php endif; ?>            
    </p>

    <?php if (isset($_GET['keyword'])) : ?>
        <?php if (is_array($_GET['keyword'])) : ?>
            <?php foreach ($_GET['keyword'] as $key => $data) : ?>
                <input type="hidden" name="keyword[]" value="<?php echo $data ?>"/>
                <a href="javascript:void(0)" onclick="removeKeyword($(this))"><?php echo $data; ?><span style="color: red;font-size: 25px;">-</span></a>
            <?php endforeach; ?>
        <?php else: ?>
                <input type="hidden" name="keyword[]" value="<?php echo $_GET['keyword'] ?>"/>
                <a href="javascript:void(0)" onclick="removeKeyword($(this))"><?php echo $_GET['keyword']; ?><span style="color: red;font-size: 25px;">-</span></a>
        <?php endif; ?>
    <?php endif; ?>
</form>
<p>
    <a href="javascript:void(0)" onclick="openCommonDialog()">Already Saved Search</a>
</p>
<?php if ((isset($_GET['q']) || isset($_GET['keyword'])) && $dataProvider->getTotalItemCount()) : ?>
    <p>
        <a href="javascript:void(0)" onclick="openCommonDialog('showdialog', 
                                       '<?php echo http_build_query(array('viewFile'=>'application.views.event.dialog_save_search'))?>')">Save this Search</a>
    </p>
<?php endif; ?>
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
<?php //$this->renderPartial('dialog_save_search'); ?>
    
<div class="dialog_content"></div>

<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/js/jqueryui/jquery-ui.css">
<script src="<?php echo Yii::app()->request->baseUrl ?>/js/jqueryui/jquery-ui.js" type="text/javascript"></script>