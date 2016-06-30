<?php
    if($eventKeyword) : ?>
        <?php foreach($eventKeyword as $key =>$eachArray) : ?>
            <h3><?php echo $key; ?></h3>
            <p class="keywordList">
            <?php foreach ($eachArray as $value) : 
                $url = parse_url($_SERVER['REQUEST_URI']);
                $queryParts = $url['query'] == NULL ? '?keyword[]=' . $value : '?' . $url['query'] . '&keyword[]=' . $value;                
                ?>
                <a href="<?php echo Yii::app()->createUrl('event/addKeyword').$queryParts ?>"><?php echo $value; ?><span style="display: inline-block; text-align: center; width: 20px; margin-left: 15px; border-left: 1px solid lightgreen; float: right;">+</span></a>
            <?php endforeach; ?>
            </p>
        <?php endforeach; ?>
    <?php endif; ?>
 
 <h3 style="background-color: #EFF4FA; border: 1px solid #69A8CD; color: #060; font-size: 15px; padding: 5px; text-align: center;">Keyword Added by you:</h3>
 <p class="keywordList">
<?php
    if($existingKeyword) : ?>
        <?php foreach($existingKeyword as $value) : ?>   
                <a href="<?php echo Yii::app()->createUrl('event/addKeyword', array('removedkeyword'=>$value)) ?>"><?php echo $value; ?><span style="display: inline-block; text-align: center; width: 20px; margin-left: 15px; border-left: 1px solid lightgreen; float: right;">-</span></a>
            <?php endforeach; ?>
<?php endif; ?>
  </p>
<input type="button" onclick="history.go(-1)" value="Back"/>
<a style="margin-left: 15px;" href="<?php echo Yii::app()->createUrl('/event/preview') ?>">Next</a>
