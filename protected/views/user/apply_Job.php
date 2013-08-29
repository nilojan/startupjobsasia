<?php
if($action=='applyjob')
{
    $this->breadcrumbs=array(
    	'Apply Job',
    );
}
else if($action=='depositResume')
{
    $this->breadcrumbs=array(
        'Deposit Resume',
    );
}




if($action=='applyjob')
{ 
  ?>
    <h1>Apply for this Job</h1>
  <?php 
}
else if($action=='depositResume')
{
   ?>
    <h1>Deposit Resume</h1>
  <?php
}
?>  
<?php  $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                                                                                'id'=>'horizontalForm',
                                                                                'type'=>'horizontal',
                                                                                'enableClientValidation'=>true,
                                                                                'clientOptions'=>array('validateOnSubmit'=>true,),
                                                                                'htmlOptions' => array('enctype' => 'multipart/form-data'),
                                                                                )); ?>
    <?php echo $form->errorSummary($model); ?> 
       

    <?php echo $form->textFieldRow($model,'fname',array('class'=>'span9', 'rows'=>10)); ?>
    <?php echo $form->textFieldRow($model,'lname',array('class'=>'span9', 'rows'=>10)); ?>
    <?php echo $form->textFieldRow($model,'email',array('class'=>'span9', 'rows'=>10)); ?>
    <?php echo $form->textFieldRow($model,'contact',array('class'=>'span9', 'rows'=>10)); ?>
    <?php echo $form->textFieldRow($model,'dob',array('class'=>'span9', 'rows'=>10)); ?>
	<?php echo $form->dropDownListRow($model, 'gender', array(''=>'Gender', 'Male'=>'Male', 'Female'=>'Female'), 
                                                                 array('options' => array('M' => array('selected' => true)))); ?>
	<?php echo $form->dropDownListRow($model, 'edu', array(	''=>'Highest Education',
															'Doctorate'=>'Doctorate (PHD)',
															'Master'=>'Master',
															'Bachelor'=>'Bachelor Degree',
															'Diploma'=>'High School / Diploma',
															'Cert'=>'Cert',
															'Others'=>'Others'), 
                                                                 array('options' => array('M' => array('selected' => true)))); ?>
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
    <?php echo $form->textAreaRow($model,'coverLetter', array('class'=>'span9', 'rows'=>10)); ?>
=======
    <?php echo $form->textFieldRow($model,'fname',array('class'=>'span3', 'rows'=>10)); ?>
    <?php echo $form->textFieldRow($model,'lname',array('class'=>'span3', 'rows'=>10)); ?>
    <?php echo $form->textFieldRow($model,'email',array('class'=>'span3', 'rows'=>10)); ?>

	
	<?php echo $form->dropDownListRow($myDate,'country_code', $myDate->getCountryCodes(), array('select'=>$myDate->country_code)); ?>
	<?php echo $form->textField($model,'contact',array('class'=>'span2','maxlength'=>10)); ?><span id="errmsg"></span>
	
    <?php /* echo $form->textFieldRow($model,'dob',array('class'=>'span3', 'rows'=>10)); 
       
        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
        'model' => $model,
       // 'name'=>'bdate',  
        'attribute'=>'dob', 
        // additional javascript options for the date picker plugin
        'options'=>array(
            'showAnim'=>'fold',
            'changeYear'=>'true',
            'changeMonth'=>'true',
            'yearRange'=> '1940:2013',
        ),
        'htmlOptions'=>array(
            'style'=>'height:20px;display:none;'
        ),
        ));
		*/
    ?>
	
		<br><?php echo CHtml::encode($model->getAttributeLabel('dob')); ?>
	
	    <?php echo $form->dropDownListRow($myDate,'day', $myDate->getDates(), array('select'=>$myDate->day,'class'=>'span1')); ?>
   
    
        <?php echo $form->dropDownList($myDate,'month', $myDate->getMonths(), array('select'=>$myDate->month,'class'=>'span2')); ?>
   
   
        <?php echo $form->dropDownList($myDate,'year', $myDate->getYears(), array('select'=>$myDate->year,'class'=>'span1')); ?>
	
    <?php echo $form->dropDownListRow($model,'location',$myDate->getCountryList(), array('select'=>$model->location, 'prompt'=>'Select'), array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->dropDownListRow($model,'country',$myDate->getCountryList(), array('select'=>$model->country, 'prompt'=>'Select'), array('class'=>'span5','maxlength'=>50)); ?>

	
    <?php echo $form->radioButtonListRow($model, 'gender', array(
        'Male' => 'Male',
        'Female' => 'Female'
    )); ?>
   
    

	<?php echo $form->dropDownListRow($model, 'edu', array(''=>'Education', 
															'Doctorate'=>'Doctorate (PHD)',
															'Master'=>'Master Degree',
															'Bachelor'=>'Bachelor Degree',
															'Diploma'=>'High School / Diploma',
															'Cert'=>'Professional Certification',
															'Others'=>'Others')); ?>
															

	
    <?php echo $form->textAreaRow($model,'coverLetter', array('class'=>'span5', 'rows'=>5)); ?>
>>>>>>> viv_changes
    <?php echo $form->fileFieldRow($model,'resume'); ?>


<div id="job" class="apply-instructions">
    <h3>Are you sure you want to submit this? </h3>
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary','label'=>'Submit')); ?>

</div>
            
<?php $this->endWidget(); ?>

