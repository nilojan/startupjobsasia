<?php


$this->pageTitle=Yii::app()->name . ' - Set Admin';
$this->breadcrumbs=array(
	'Set Admin',
);
?>
<title>StartUp Jobs Asia | Startup Hire | Startup Hiring | Startup Recruiting | Startup Jobs | VC Hire | VC Jobs | Work In Startups</title>

<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/inspired_style.css" rel="stylesheet" type="text/css" />

<div id="inspired_wrapper">    
    <div id="inspired_content_top"></div>
    
    <div id="inspired_content">
    	<div id="inspired_main_content">
        	<div class="content_box">
                    <h1> Change Member Status </h1>
				<div class="row">
                            <?php echo CHtml::encode($model->username); ?>        
                                    
                            <?php echo CHtml::encode($model->name); ?>        


                                 <?php $form = $this->beginWidget('CActiveForm', array(
                                'id' => 'contact-form',
                                'enableClientValidation' => false,
                                'clientOptions' => array(
                                    'validateOnSubmit' => true,
                                ),
                                    )); ?>
                            
                            <?php echo $form->labelEx($model, 'role'); ?>
                                <?php echo $form->dropDownList($model, 'role', array('0' => 'Member', '1' => 'Admin'), array('options' => array('0' => array('selected' => true)))); ?>
                            <div class="row">
                             <?php echo CHtml::submitButton('Submit'); ?>
                            </div>

                            <?php $this->endWidget(); ?>
                            </div>
				</div>
			</div>
		

		<div class="cleaner"></div>
	</div>
	<div id="inspired_content_bottom"></div>
</div> <!-- end of wrapper -->



