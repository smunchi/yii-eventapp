<p>Title : <?php echo $eventData['title']; ?></p>
<p>Description: <?php echo $eventData['description']; ?></p>
<p class="keywordList">
    Keywords:<br/>
<?php if($eventData['keyword']) : ?>
        <?php foreach($eventData['keyword'] as $value) : ?>   
                <a href="javascript:void(0);"><?php echo $value; ?></a>
            <?php endforeach; ?>
<?php endif; ?>
</p>

<input type="button" onclick="history.go(-1)" value="Back"/>
<a style="margin-left: 15px;" href="<?php echo Yii::app()->createUrl('/event/save') ?>">Save</a>

