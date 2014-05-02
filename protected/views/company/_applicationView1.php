<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
//var_dump($data->Employee); die;

?>
<li class ="span4 <?php echo $data->JID%2 ? "bgone":"bgtwo"; ?>" style="margin:0 10px 10px 0">
<div class="profileImage">
<?php
$data->Employee->photo = ($data->Employee->photo == '') ? "profile_default.png" : $data->Employee->photo;

echo '<img src='.Yii::app()->request->baseUrl.'/images/profile/'. $data->Employee->photo.' align="middle" style= "width:70px; float:left; border:1px solid #F89406;" >';
?>
</div>
<div class="profileInfo">
	<div class ="span m_title">
        <?php echo CHtml::link($data->Employee->fname." ".$data->Employee->lname, array('user/profile/'.$data->Employee->UID), array('target'=>'_blank')) ;
					//echo $data->Employee->fname." ".$data->Employee->lname; ?> 					
    </div>
	<div class ="span m_title">
        <?php echo $data->Employee->gender; ?> , 
		<small><?php	
		$from = new DateTime($data->Employee->dob);
$to   = new DateTime('today');
echo "Age ".$from->diff($to)->y;
?></small>
    </div>
	<div class ="span m_title">
        <?php echo $data->Employee->edu; ?>
    </div>
	<div class ="span m_title">
        <?php echo $data->Employee->country; ?>
	
    </div>
</div>	
    <div class ="span7">
        <?php 
			if($data->Employee->resume!=NULL){
				$resume = $data->Employee->EID.'-'.$data->Employee->resume;
					echo CHtml::link(CHtml::encode('Download Resume'),array('company/downloadResume?filename='.$resume));    
            }else{
                    echo CHtml::encode('No resume Available');
            }
        ?>
    </div>

    <div class ="span">
        <small>Applied on <?php echo $data->applied; ?></small>
<?php //echo CHtml::link(CHtml::encode('Resume'),Yii::app()->baseUrl . '/resume/'.$data->user->resume,array('target'=>'_blank'));?>
    </div>
	<div class ="span">          
        <small>Applied for <?php echo CHtml::link($data->job->title, array('job/job/JID/'.$data->JID), array('target'=>'_blank')) ; ?></small>
    </div>
	    <div class ="span8">
		<?php  
			echo CHtml::dropDownList(
			$data->AID,
			$data->jobstatus,
				array('Pending' => 'Pending', 'Offered' => 'Offer', 'Shortlisted' => 'Shortlist', 'Onhold' => 'On hold', 'Rejected' => 'Reject'),
				array('class'=>'span9','onChange'=>'$.post(\''.Yii::app()->request->baseUrl.'/Application/updateJob\',{ jobstatus:$(this).val(), AID:"'.$data->AID
              .'" });'
               )
			);
		?>
    </div>
		<script>
		$(document).ready(function(){
			function addremove(){
				//alert('hi');
				$("#suc_msg").removeClass("out");
				$("#suc_msg").addClass("in");
			}
		});
		</script>
</li>