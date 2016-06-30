<p>Title : <?php echo $eventData['title']; ?></p>
<p>Description: <?php echo $eventData['description']; ?></p>
<?php if(Yii::app()->controller->action->id == 'view') :     
    $eventData['keyword'] = strpos($eventData['keyword'], "##$$") ? explode("##$$", $eventData['keyword']) : $eventData['keyword'];
endif;
?>
<?php
if($eventData['keyword']) : ?>
<p class="keywordList">
Keywords:<br/>
        <?php foreach($eventData['keyword'] as $value) : ?>   
                <a href="javascript:void(0);"><?php echo $value; ?></a>
            <?php endforeach; ?>
</p>
<?php endif; ?>

<input type="button" onclick="history.go(-1)" value="Back"/>

<?php if(Yii::app()->controller->action->id == 'preview') : ?>
    <a style="margin-left: 15px;" href="<?php echo Yii::app()->createUrl('/event/save') ?>">Save</a>
<?php endif; ?>

