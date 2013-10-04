<h1>Advance Job Search</h1>
<div>
	 <?php /** @var BootActiveForm $form */
            $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array('id'=>'verticalForm',
                                                                                'type'=>'horizontal',
                                                                                'enableClientValidation'=>true,
                                                                                'clientOptions'=>array('validateOnSubmit'=>true,),
                                                                                )); ?>

	<?php echo $form->errorSummary($model); ?>
       <?php echo CHtml::textField('keywords', '', array('class' => 'span6', 'placeholder'=>'Enter job title,company name,skill etc...'));?>
  <div>
  Search within :<?php echo CHtml::radioButtonList('search_type','0',array('0'=>'Entire Job Advertise','1'=>'Job Title','2'=>'Company Name'),array(
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
                                                                                'enableClientValidation'=>true,
                                                                                'clientOptions'=>array('validateOnSubmit'=>true,),
                                                                                )); ?>

		<?php echo $form->errorSummary($model); ?>
	       
<?php echo CHtml::textField('keywords'); ?>


       <div class="form-actions">
      <?php $this->widget('bootstrap.widgets.TbButton', array(
    'buttonType'=>'submit',
    'type'=>'primary',
    'url'=>'JobSearch',
    'label'=>'Search Job',
    'loadingText'=>'Searching...',
    'htmlOptions'=>array('id'=>'buttonStateful'),
)); ?>

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