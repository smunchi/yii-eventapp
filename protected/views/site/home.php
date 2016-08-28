<h1>Let's create an event</h1>
<div>
<img style="vertical-align: middle; float: left" src="<?php echo Yii::app()->baseurl ?>/images/people_group.png" alt="People Group Photo" width="100"/>
<span style="float: left; width: 80%; padding: 30px 15px;">It helps to connect with a specific group of people for a particular event. For example, you have an upcoming event in your school and you want a platform so that people can join and communicate with each others.</span>
</div>

<div style="clear:both; padding-top: 30px;">
<?php if(count($latestEvent)>0) : ?>
    <?php foreach($latestEvent as $arrayKey => $arrayData) : ?>
    <p style="color: wheat; background-color: #95181A; padding: 10px; font-size: 20px;">
        <span style="display:block"><img width="700" src="<?php echo Yii::app()->request->baseUrl . "/files/" . $arrayData['name'] ?>"/></span>
        <span style="display:block"><?php echo $arrayData['title'] ?></span>
        <span><?php echo $arrayData['description'] ?></span>
    </p>
    <?php endforeach; ?>
<?php endif; ?>
</div>