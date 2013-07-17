<?php
$this->breadcrumbs = array(
    'Company' => array('/Update'),
    'Update',);
$this->pageTitle = 'Update Company | '.Yii::app()->params['pageTitle'];
?>

<h1>Update Company</h1>
<br>

        <?php /** @var BootActiveForm $form */
            $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                                                                                'id'=>'horizontalForm',
                                                                                'type'=>'horizontal',
                                                                                'enableClientValidation'=>true,
                                                                                'clientOptions'=>array('validateOnSubmit'=>true,),
                                                                                'htmlOptions' => array('enctype' => 'multipart/form-data'),
                                                                                )); ?>
               
                  
            <?php echo $form->errorSummary($CForm); ?>
            <?php echo $form->textFieldRow($CForm, 'cname', array('class' =>'span5')); ?>
            <?php echo $form->fileFieldRow($CForm, 'image'); ?>  
            <?php echo $form->fileFieldRow($CForm, 'coverpicture'); ?>  
            <?php echo $form->textFieldRow($CForm, 'website', array('class' =>'span5')); ?>
            <?php echo $form->textFieldRow($CForm, 'facebook', array('class' =>'span5')); ?>
            <?php echo $form->textFieldRow($CForm, 'contact'); ?>
            
            <?php echo $form->textAreaRow($CForm, 'address', array('class' => 'span8', 'rows' => 3)); ?>
			<?php echo $form->textAreaRow($CForm, 'summary', array('class' => 'span8', 'rows' => 3)); ?>
            <?php echo $form->textAreaRow($CForm, 'mission', array('class' => 'span8', 'rows' => 5)); ?>
            <?php echo $form->textAreaRow($CForm, 'culture', array('class' => 'span8', 'rows' => 5)); ?>
            <?php echo $form->textAreaRow($CForm, 'benefits', array('class' => 'span8', 'rows' => 5)); ?>
            <?php echo $form->textAreaRow($CForm, 'awards', array('class' => 'span8', 'rows' => 3)); ?>
            
            <div class="form-actions">
                <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary','label'=>'Submit')); ?>
            </div>
            
    <?php $this->endWidget(); ?>
            