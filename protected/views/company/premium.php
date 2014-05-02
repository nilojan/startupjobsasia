<?php
$this->breadcrumbs = array(
    'Company' => array('/company/premium'),
    'Premium-Features',);
$this->pageTitle = 'Premium-Features | '.Yii::app()->params['pageTitle'];
?>

<h1>Premium-Feature</h1>
<h2>Make Your startup Premium</h2>
<?php 
	$normal='normal';
	$enterprise='enterprise';
	$addons='addons';
	
?>


<div class="span4">
	<h4> Normal Plan type </h4>
	
	<?php 

	$company = company::model()->find('ID=:CID',array(':CID'=>Yii::app()->user->getID()));

	if($company->premium == 1){
	
		$jobs=$company->job_post_balance-3;
		echo 'you already register with this Premium Plan Your remaining job post count is '.$jobs.'';
	}else{

		echo CHtml::link('Normal',array('Pay/Buy?type='.$normal)); echo ':-&nbsp;&nbsp;&nbsp;&nbsp; SGD 9.99' ;
	}
	?>
</div>


<div class="span4">
	<h4> Enterprise Plan type </h4>
	<?php
	if($company->premium == 2){
	
		$jobs ='unlimited';
		echo 'you already register with this Premium Plan Your remaining job post count is '.$jobs.'';
	}else{

		echo CHtml::link('Enterprise',array('Pay/Buy?type='.$enterprise)); echo ':-&nbsp;&nbsp;&nbsp;&nbsp;SGD 30.00';
	}


	?>
</div>
<?php
if($company->addons == 1)
{	
if(($company->premium ==1 || $company->premium == 2))
	{
			echo '<div class="span4">';
			echo '<h4> Add-ons For premium Features </h4>';
			echo 'you already register with this Add-ons Plan ';
			echo '</div>';
	}
}else{
			echo '<div class="span4">';
			echo '<h4> Add-ons For premium Features </h4>';
			echo CHtml::link('Add-ons',array('Pay/Buy?type='.$addons)); echo ':-&nbsp;&nbsp;&nbsp;&nbsp;SGD 100.00';
			echo '</div>';
	}
?>




            