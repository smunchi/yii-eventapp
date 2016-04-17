<?php
/* @var $this SiteController */

$this->pageTitle = 'Yes it is event based Web Application';
?>

<h1>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>
<p>Search through 5000 people or browse 2000 events.</p>
<p>You may find the content of more interesting page by the following links:</p>
<ul>
    <li>About</li>
    <li>Find People</li>
</ul>
<p>For more details on how yii-eventapp works and features the application, please read
    the <a href="<?php echo Yii::app()->createUrl('site/page', array('view'=>'about')); ?>">about page</a>.
    Feel free to ask in the <a href="<?php echo Yii::app()->createUrl('site/contact') ?>">contact</a>,
should you have any questions.</p>
