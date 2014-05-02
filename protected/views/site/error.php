<?php
$this->breadcrumbs=array(
	'Error',
);
$this->pageTitle = 'Error '.$code." | ".Yii::app()->params['pageTitle'];
?>



<h2>Error <?php echo $code; ?></h2>
<div style="font-size:35px;text-align:center;line-height: 36px;">
ARE YOU SURE <br />
YOU GOT THE<br />
CORRECT PAGE?<br /><br />
</div>
<div style="font-size:22px;text-align:center;line-height: 22px;">
We cannot find the page you are looking for,<br />
please make sure that you have the correct<br />
link or go back to our <a href="<?php echo Yii::app()->request->baseUrl;?>">homepage</a>
</div>

<div class="error">
<?php echo CHtml::encode($message); ?>
</div>

 
                    