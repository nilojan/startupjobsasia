
<h1>Advance Job Search</h1>
<div>
	 <?php /** @var BootActiveForm $form */
            $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array('id'=>'verticalForm',
                                                                                'type'=>'horizontal',
                                                                                'enableClientValidation'=>true,
                                                                                'clientOptions'=>array('validateOnSubmit'=>true,),
                                                                                )); ?>

	
  <?php echo CHtml::textField('keywords', '', array('class' => 'span6', 'placeholder'=>'Enter job title,company name,skill etc...'));?>
  <div>
  Search within :<?php echo CHtml::radioButtonList('search_type','entireJob',array('entireJob'=>'Entire Job Advertise','jobTitle'=>'Job Title','companyName'=>'Company Name'),array(
    'labelOptions'=>array('style'=>'display:inline'), // add this code
    'separator'=>'',
)); ?></div><br />


<div>
    <?php $this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'submit',
		'type'=>'primary',
		'url'=>'JobSearch',
		'label'=>'Search Job',
		'loadingText'=>'Searching...',
		'htmlOptions'=>array('id'=>'buttonStateful'),
	)); ?>
</div>    <?php $this->endWidget(); ?>
</div>
<hr>
<div>
	 <?php /** @var BootActiveForm $form */
            $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array('id'=>'verticalForm',
                                                                                'type'=>'horizontal',
                                                                                'action'=>Yii::app()->createUrl("job/Quicksearch"),
                                                                                'enableClientValidation'=>true,
                                                                                'clientOptions'=>array('validateOnSubmit'=>true,),
                                                                                )); ?>

		<?php echo $form->errorSummary($model); ?>
	     <?php echo '<b>Monthly Salary</b> ' ?><br />
(SGD) MIN
<?php 
echo CHtml::dropDownList('Min_salary',"",array('1'=>'1','1001'=>'1001','2001'=>'2001','3001'=>'3001'),
              array('empty' => 'Select Minimum Salary'));?>
&nbsp; MAX &nbsp;
<?php
//echo CHtml::textField('Max_salary'); 
echo CHtml::dropDownList('Max_salary',"",array('1000'=>'1000','2000'=>'2000','3000'=>'3000','4000'=>'4000'),
              array('empty' => 'Select Maximum Salary'));?><br />
  <?php echo CHtml::CheckBox('salary_option',true, array (
                                        'value'=>'on',
                                        )); ?>  Include Jobs with Unspecified Salary
<hr>

<?php echo '<b>Position Level</b> ' ?><br />
<span>
<?php echo CHtml::CheckBox('senior_manager',false, array (
                                        'value'=>'on',
                                        )); ?>  Senior Manager
<?php echo CHtml::CheckBox('senior_executive',false, array (
                                        'value'=>'on',
                                        )); ?>  Senior Executive                                      
<?php echo CHtml::CheckBox('Fresh/Entry',false, array (
                                        'value'=>'on',
                                        )); ?>  Fresh/Entry Level
</span>
<span>
<br />
<?php echo CHtml::CheckBox('Manager',false, array (
                                        'value'=>'on',
                                        )); ?>  Manager
<?php echo CHtml::CheckBox('Junior_executive',false, array (
                                        'value'=>'on',
                                        )); ?>  Junior Executive                                       
<?php echo CHtml::CheckBox('Nonexecutive',false, array (
                                        'value'=>'on',
                                        )); ?>  Non-Executive
<br />
</span>
<hr>
<?php echo '<b>Job Type</b> ' ?><br />
<span>
<?php echo CHtml::CheckBox('full_time',false, array ('value'=>'on',)); ?>Full Time
<?php echo CHtml::CheckBox('part_time',false, array ('value'=>'on',)); ?> Part Time                                     
<?php echo CHtml::CheckBox('internship',false, array ('value'=>'on',)); ?> Internship
 <?php echo CHtml::CheckBox('temporary',false, array ('value'=>'on',)); ?>Temporary                                    
<?php echo CHtml::CheckBox('freelance',false, array ('value'=>'on',)); ?> Freelance
</span>
<hr>
<?php echo '<b>Job Posted Since</b> ' ?><br />
<?php echo CHtml::radioButtonList('job_posted','all',array('all'=>'All','1'=>'1 day ago','3'=>'3 days ago','7'=>'7 days ago','14'=>'14 days ago'),array(
    'labelOptions'=>array('style'=>'display:inline'), // add this code
    'separator'=>'',
)); ?>
<hr>
<?php echo '<b>Location</b>- Where do you want to work ? ' ?><br />

<?php
$models = job::model()->findAll(
                 array('order' => 'location'));
 $list = CHtml::listData($models, 
                'location', 'location');


echo CHtml::dropDownList('location',"", 
              $list,
              array('empty' => 'Select preffered Location'));
              ?>

    <div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'submit',
		'type'=>'primary',
		'url'=>'JobSearch',
		'label'=>'Search Job',
		'loadingText'=>'Searching...',
		'htmlOptions'=>array('id'=>'buttonStateful'),
		)); 
	?>

	</div>
	<script>
	$('#buttonStateful').click(function() {
		var btn = $(this);
		btn.button('loading'); // call the loading function
		setTimeout(function() {
			btn.button('reset'); // call the reset function
		}, 3000);
	});
	</script>
    <?php $this->endWidget(); ?>
</div>
<?php

/*$this->widget('zii.widgets.CListView', array(
            'dataProvider'=>$dataProvider,
            'itemView'=>'_jobView',   // refers to the partial view named '_post'
            'sortableAttributes'=>array(
           
    ),
));*/
?>


</div>