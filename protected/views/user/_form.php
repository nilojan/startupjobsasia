<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'employee-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php //echo $form->textFieldRow($model,'UID',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'registered',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'fname',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->textFieldRow($model,'lname',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->textFieldRow($model,'contact',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'email',array('class'=>'span5','maxlength'=>100)); ?>

	<?php // echo $form->textFieldRow($model,'photo',array('class'=>'span5','maxlength'=>100)); ?>	  
    <?php echo $form->fileFieldRow($model, 'photo');  
    if($model->photo != '')
    	echo '<input type="hidden" name="old_pic" value="'.$model->photo.'" />';        
    ?> 
    

	<?php echo $form->textAreaRow($model,'coverLetter',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

<<<<<<< HEAD
	
	<?php echo $form->dropDownListRow($model, 'gender', array(''=>'Gender', 'Male'=>'Male', 'Female'=>'Female'), 
                                                                 array('options' => array('M' => array('selected' => true)))); ?>
																 
	<?php echo $form->textFieldRow($model,'dob',array('class'=>'span5')); ?>
=======
	<?php echo $form->dropDownListRow($model,'gender',array('Male'=>'Male', 'Female'=>'Female'), array('class'=>'span5','maxlength'=>10)); ?>

	<br><?php echo CHtml::encode($model->getAttributeLabel('dob')); ?>
	
	    <?php echo $form->dropDownListRow($myDate,'day', $myDate->getDates(), array('select'=>$myDate->day)); ?>
   
    
        <?php echo $form->dropDownListRow($myDate,'month', $myDate->getMonths(), array('select'=>$myDate->month)); ?>
   
   
        <?php echo $form->dropDownListRow($myDate,'year', $myDate->getYears(), array('select'=>$myDate->year)); ?>

>>>>>>> viv_changes

    <?php echo $form->dropDownListRow($model,'location',$model->getCountryList(), array('select'=>$model->location, 'prompt'=>'Select'), array('class'=>'span5','maxlength'=>255)); ?>

<<<<<<< HEAD
	<?php echo $form->dropDownListRow($model, 'country', array(	''=>'Nationality',
															'Afghan'=>'Afghan',
															'Albanian'=>'Albanian',
															'Algerian'=>'Algerian',
															'American'=>'American',
															'Andorran'=>'Andorran',
															'Angolan'=>'Angolan',
															'Antiguans'=>'Antiguans',
															'Argentinean'=>'Argentinean',
															'Australian'=>'Australian',
															'Austrian'=>'Austrian',
															'Azerbaijani'=>'Azerbaijani',
															'Bahamian'=>'Bahamian',
															'Bahraini'=>'Bahraini',
															'Bangladeshi'=>'Bangladeshi',
															'Barbadian'=>'Barbadian',
															'Barbudans'=>'Barbudans',
															'Batswana'=>'Batswana',
															'Belarusian'=>'Belarusian',
															'Belgian'=>'Belgian',
															'Belizean'=>'Belizean',
															'Beninese'=>'Beninese',
															'Bhutanese'=>'Bhutanese',
															'Bolivian'=>'Bolivian',
															'Bosnian'=>'Bosnian',
															'Brazilian'=>'Brazilian',
															'British'=>'British',
															'Bruneian'=>'Bruneian',
															'Bulgarian'=>'Bulgarian',
															'Burkinabe'=>'Burkinabe',
															'Burmese'=>'Burmese',
															'Burundian'=>'Burundian',
															'Cambodian'=>'Cambodian',
															'Cameroonian'=>'Cameroonian',
															'Cape Verdean'=>'Cape Verdean',
															'Central-African'=>'Central African',
															'Chadian'=>'Chadian',
															'Chilean'=>'Chilean',
															'Chinese'=>'Chinese',
															'Colombian'=>'Colombian',
															'Comoran'=>'Comoran',
															'Congolese'=>'Congolese',
															'Costa-Rican'=>'Costa Rican',
															'Croatian'=>'Croatian',
															'Cuban'=>'Cuban',
															'Cypriot'=>'Cypriot',
															'Czech'=>'Czech',
															'Danish'=>'Danish',
															'Djibouti'=>'Djibouti',
															'Dominican'=>'Dominican',
															'Dutch'=>'Dutch',
															'East Timorese'=>'East Timorese',
															'Ecuadorean'=>'Ecuadorean',
															'Egyptian'=>'Egyptian',
															'Emirian'=>'Emirian',
															'Equatorial Guinean'=>'Equatorial Guinean',
															'Eritrean'=>'Eritrean',
															'Estonian'=>'Estonian',
															'Ethiopian'=>'Ethiopian',
															'Fijian'=>'Fijian',
															'Filipino'=>'Filipino',
															'Finnish'=>'Finnish',
															'French'=>'French',
															'Gabonese'=>'Gabonese',
															'Gambian'=>'Gambian',
															'Georgian'=>'Georgian',
															'German'=>'German',
															'Ghanaian'=>'Ghanaian',
															'Greek'=>'Greek',
															'Grenadian'=>'Grenadian',
															'Guatemalan'=>'Guatemalan',
															'Guinea-Bissauan'=>'Guinea-Bissauan',
															'Guinean'=>'Guinean',
															'Guyanese'=>'Guyanese',
															'Haitian'=>'Haitian',
															'Herzegovinian'=>'Herzegovinian',
															'Honduran'=>'Honduran',
															'Hungarian'=>'Hungarian',
															'Hungarian'=>'Hungarian',
															'Icelander'=>'Icelander',
															'Indian'=>'Indian',
															'Indonesian'=>'Indonesian',
															'Iranian'=>'Iranian',
															'Iraqi'=>'Iraqi',
															'Irish'=>'Irish',
															'Israeli'=>'Israeli',
															'Italian'=>'Italian',
															'Ivorian'=>'Ivorian',
															'Jamaican'=>'Jamaican',
															'Japanese'=>'Japanese',
															'Jordanian'=>'Jordanian',
															'Kazakhstani'=>'Kazakhstani',
															'Kenyan'=>'Kenyan',
															'Kittian and Nevisian'=>'Kittian and Nevisian',
															'Kuwaiti'=>'Kuwaiti',
															'Kyrgyz'=>'Kyrgyz',
															'Laotian'=>'Laotian',
															'Latvian'=>'Latvian',
															'Lebanese'=>'Lebanese',
															'Liberian'=>'Liberian',
															'Libyan'=>'Libyan',
															'Liechtensteiner'=>'Liechtensteiner',
															'Lithuanian'=>'Lithuanian',
															'Luxembourger'=>'Luxembourger',
															'Macedonian'=>'Macedonian',
															'Malagasy'=>'Malagasy',
															'Malawian'=>'Malawian',
															'Malaysian'=>'Malaysian',
															'Maldivan'=>'Maldivan',
															'Malian'=>'Malian',
															'Maltese'=>'Maltese',
															'Marshallese'=>'Marshallese',
															'Mauritanian'=>'Mauritanian',
															'Mauritian'=>'Mauritian',
															'Mexican'=>'Mexican',
															'Micronesian'=>'Micronesian',	
															'Moldovan'=>'Moldovan',
															'Monacan'=>'Monacan',
															'Mongolian'=>'Mongolian',
															'Moroccan'=>'Moroccan',
															'Mosotho'=>'Mosotho',
															'Motswana'=>'Motswana',
															'Mozambican'=>'Mozambican',
															'Namibian'=>'Namibian',
															'Nauruan'=>'Nauruan',
															'Nepalese'=>'Nepalese',
															'New Zealander'=>'New Zealander',
															'Ni-Vanuatu'=>'Ni-Vanuatu',	
															'Nicaraguan'=>'Nicaraguan',
															'Nigerien'=>'Nigerien',
															'North-Korean'=>'North Korean',
															'Northern-Irish'=>'Northern Irish',
															'Norwegian'=>'Norwegian',
															'Omani'=>'Omani',
															'Pakistani'=>'Pakistani',
															'Palauan'=>'Palauan',
															'Panamanian'=>'Panamanian',
															'Papua New Guinean'=>'Papua New Guinean',
															'Paraguayan'=>'Paraguayan',
															'Peruvian'=>'Peruvian',	
															'Polish'=>'Polish',
															'Portuguese'=>'Portuguese',
															'Qatari'=>'Qatari',
															'Romanian'=>'Romanian',
															'Russian'=>'Russian',
															'Rwandan'=>'Rwandan',	
															'Saint-Lucian'=>'Saint Lucian',
															'Salvadoran'=>'Salvadoran',
															'Samoan'=>'Samoan',
															'San Marinese'=>'San Marinese',
															'Sao Tomean'=>'Sao Tomean',
															'Saudi'=>'Saudi',
															'Senegalese'=>'Senegalese',
															'Serbian'=>'Serbian',
															'Seychellois'=>'Seychellois',
															'Sierra Leonean'=>'Sierra Leonean',
															'Singaporean'=>'Singaporean',
															'Solomon Islander'=>'Solomon Islander',	
															'Slovenian'=>'Slovenian',
															'Somali'=>'Somali',
															'South-African'=>'South African',
															'Spanish'=>'Spanish',
															'Sri Lankan'=>'Sri Lankan',
															'Sudanese'=>'Sudanese',	
															'Surinamer'=>'Surinamer',
															'Swazi'=>'Swazi',
															'Swedish'=>'Swedish',
															'Swiss'=>'Swiss',
															'Syrian'=>'Syrian',
															'Taiwanese'=>'Taiwanese',
															'Tajik'=>'Tajik',
															'Tanzanian'=>'Tanzanian',
															'Thai'=>'Thai',
															'Togolese'=>'Togolese',
															'Tongan'=>'Tongan',
															'Trinidadian or Tobagonian'=>'Trinidadian or Tobagonian',	
															'Tunisian'=>'Tunisian',
															'Turkish'=>'Turkish',
															'Tuvaluan'=>'Tuvaluan',
															'Ugandan'=>'Ugandan',
															'Ukrainian'=>'Ukrainian',
															'Uruguayan'=>'Uruguayan',	
															'Uzbekistani'=>'Uzbekistani',
															'Venezuelan'=>'Venezuelan',
															'Vietnamese'=>'Vietnamese',
															'Welsh'=>'Welsh',
															'Yemenite'=>'Yemenite',
															'Zambian'=>'Zambian',
															'Zimbabwean'=>'Zimbabwean',													
															'Others'=>'Others'), 
                                                                 array('options' => array('M' => array('selected' => true)))); ?>
																 
=======
	<?php echo $form->dropDownListRow($model,'country',$model->getCountryList(), array('select'=>$model->country, 'prompt'=>'Select'), array('class'=>'span5','maxlength'=>50)); ?>
>>>>>>> viv_changes

	<?php echo $form->textFieldRow($model,'lastjob',array('class'=>'span5','maxlength'=>250)); ?>

	<?php echo $form->dropDownListRow($model, 'edu', array(	''=>'Highest Education',
															'Doctorate'=>'Doctorate (PHD)',
															'Master'=>'Master',
															'Bachelor'=>'Bachelor Degree',
															'Diploma'=>'High School / Diploma',
															'Cert'=>'Cert',
															'Others'=>'Others'), 
                                                                 array('options' => array('M' => array('selected' => true)))); ?>

	<?php echo $form->textFieldRow($model,'work_exp',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'curr_salary',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'exp_salary',array('class'=>'span5')); ?>


	<?php echo $form->dropDownListRow($model, 'availability', array(''=>'Availability',
																	'Immediately'=>'Immediately',
																	'1 week'=>'1 Week',
																	'2 Week'=>'2 Week',
																	'1 Month'=>'1 Month'), 
                                                                 array('options' => array('M' => array('selected' => true)))); ?>
																 

	<?php //echo $form->textFieldRow($model,'resume',array('class'=>'span5','maxlength'=>256)); ?>
	 <?php //echo   '<H2>' .CHtml::link(CHtml::encode('Resume'),Yii::app()->baseUrl . '/resume/'.$model->resume, array('target'=>'_blank') );?></H2>
	<?php echo $form->fileFieldRow($model, 'resume');
	if($model->resume != '')
    	echo '<input type="hidden" name="old_resume" value="'.$model->resume.'" />';     ?> 

	<?php //echo $form->textFieldRow($model,'source',array('class'=>'span5','maxlength'=>255)); ?>

	<?php //echo $form->textFieldRow($model,'ip',array('class'=>'span5','maxlength'=>255)); ?>

	<?php //echo $form->textFieldRow($model,'acc_status',array('class'=>'span5','maxlength'=>20)); ?>

	<?php //echo $form->textFieldRow($model,'views',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'last_modified',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
