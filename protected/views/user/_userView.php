<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$timestamp = strtotime($data->last_modified);
$last_update = date('d-M-Y', $timestamp);


$bday = new DateTime($data->dob);
$today = new DateTime(date("Y-m-d"));
$age = $today->diff($bday)->y;
$extt = substr(strrchr($data->resume,'.'),1);
   
?> 
      
<div class ="span4 bgtwo" style="margin:0 14px 10px 0">
	<div class="profileImage">
	<?php
	$data->photo = ($data->photo == '') ? "profile_default.png" : $data->photo;

	echo '<img src='.Yii::app()->request->baseUrl.'/images/profile/'. $data->photo.' align="middle" style= "width:70px; float:left; border:1px solid #F89406;" >';
	?>
	</div>

	<div class="profileInfo">
		<div class ="span m_title">
			<strong>
			<?php echo CHtml::link($data->fname." ".$data->lname, array('user/profile/'.$data->UID), array('target'=>'_blank')) ; ?></strong>			
		</div>
		<div class ="span m_title">
			Contact No : <?php echo $data->contact; ?><br />
			Email : <a href="<?php echo $data->email; ?>"><?php echo $data->email; ?></a><br />
			Date of Birth : <?php echo $data->dob; ?> - <?php echo $age.' Years Old'; ?><br />
			Gender : <?php echo $data->gender; ?><br />
			Nationality :<?php echo $data->country; ?><br />
			Last Update: <?php echo $last_update; ?>
			<div>		          
				<?php if($extt == 'doc' or $extt == 'docx'){
					echo CHtml::link(CHtml::image(Yii::app()->baseUrl.'/images/icons/doc_icon_small.png'),array('company/downloadResume?filename='.$data->resume)); 
					}
					if($extt == 'pdf') {
					echo CHtml::link(CHtml::image(Yii::app()->baseUrl.'/images/icons/pdf_icon_small.png'),array('company/downloadResume?filename='.$data->resume)); 
					}
				?>

			</div>
			
		</div>

	</div>
</div>