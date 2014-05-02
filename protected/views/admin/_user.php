<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>   
<div class ="span4 bgtwo" style="margin:0 10px 10px 0;min-height:200px;">
	<div class="profileImage">
	<?php
	$data->photo = ($data->photo == '') ? "profile_default.png" : $data->photo;

	echo '<img src='.Yii::app()->request->baseUrl.'/images/profile/400/'. $data->photo.' align="middle" style= "width:70px; float:left; border:1px solid #F89406;" >';
	?>
	</div>

	<div class="profileInfo">
		<div class ="span m_title">
			<strong>
			<?php echo CHtml::link($data->fname." ".$data->lname, array('user/profile/'.$data->UID), array('target'=>'_blank')) ; ?></strong>			
		</div>
		<div class ="span m_title">
		<?php if($data->contact!=''): ?>
		<?php echo $data->contact; ?><br />
		<?php endif; ?>
		<?php if($data->email!=''): ?>
			<a href="mailto:<?php echo $data->email; ?>"><?php echo $data->email; ?></a><br />
		<?php endif; ?>
		<?php if($data->dob!=''): ?>
			DoB : <?php echo $data->dob; ?><br />
		<?php endif; ?>
		<?php if($data->gender!=''): ?>			
			 <?php echo $data->gender; ?><br />
		<?php endif; ?>
		<?php if($data->country!=''): ?>			
			<?php echo $data->country; ?>
		<?php endif; ?>			
		</div>
			<div class="span">
                     <?php $this->widget('bootstrap.widgets.TbButton', array(
                                                                            'label'=>'Edit',
                                                                            'type'=>'warning', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                                                                            //array('job/update'), 
																			'size'=>'mini',
																			'htmlOptions'=>array(
																'onclick'=>'return confirm("Are you sure want to Edit?");',
																			),
		
                                                                            'url'=>Yii::app()->createUrl("user/edit/".$data->UID),)); ?>   
		</div>
	</div>
</div>