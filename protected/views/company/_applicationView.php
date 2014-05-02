<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
//var_dump($data->Employee); die;

?>
<li class ="span4 bgtwo" style="margin:0 12px 15px 0;min-height:180px;">
<div class="span">
<small>Applied for </small><?php echo CHtml::link(substr($data->job->title,0,26)."...", array('job/job/JID/'.$data->JID), array('target'=>'_blank')) ; ?><br />
<small>Applied on </small><?php echo substr($data->applied,0,10); ?>
</div>

<div class="profileImage">
<?php
$data->Employee->photo = ($data->Employee->photo == '') ? "profile_default.png" : $data->Employee->photo;

echo '<img src='.Yii::app()->request->baseUrl.'/images/profile/'. $data->Employee->photo.' align="middle" style= "width:70px; float:left; border:1px solid #F89406;" >';
?>
</div>

<div class="profileInfo">
	<div class ="span m_title">
        <strong><?php echo CHtml::link($data->Employee->fname." ".$data->Employee->lname, array('user/profile/'.$data->Employee->UID), array('target'=>'_blank')) ;
					//echo $data->Employee->fname." ".$data->Employee->lname; ?></strong>			
    </div>
	<div class ="span m_title">          
        <small><?php echo $data->Employee->country; ?><br />
		<?php echo $data->Employee->dob; ?><br />
		<a href="/company/downloadResume?filename=<?php echo $data->Employee->resume; ?>">Resume</a><br />
		</small>
    </div>

</div>

	<div class="span">
		<?php  
			echo CHtml::dropDownList(
			$data->AID,
			$data->jobstatus,
				array(	'Pending' => 'New Application', 
						'Offered' => 'Hired', 
						'Shortlisted' => 'Short-listed For Interview', 
						'Onhold' => 'Short-listed For Job', 
						'Rejected' => 'Rejected'),
				array(	'class'=>'span10',
						'onChange'=>'$.post(\''.Yii::app()->request->baseUrl.'/Application/updatejob\',{ jobstatus:$(this).val(), AID:"'.$data->AID
              .'" },function() { $(".saved-'.$data->Employee->UID.'").slideDown("slow"); });'
               )
			);
		?>
		<span class="alert alert-success hide saved-<?php echo $data->Employee->UID; ?>"><a class="close" data-dismiss="alert">×</a>Saved</span>
    </div>
</li>