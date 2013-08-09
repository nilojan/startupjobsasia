<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('AID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->AID),array('view','id'=>$data->AID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EID')); ?>:</b>
	<?php echo CHtml::encode($data->EID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('JID')); ?>:</b>
	<?php echo CHtml::encode($data->JID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CID')); ?>:</b>
	<?php echo CHtml::encode($data->CID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jobstatus')); ?>:</b>
	<?php echo CHtml::encode($data->jobstatus); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('offered')); ?>:</b>
	<?php echo CHtml::encode($data->offered); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('shortlist')); ?>:</b>
	<?php echo CHtml::encode($data->shortlist); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('onhold')); ?>:</b>
	<?php echo CHtml::encode($data->onhold); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('applied')); ?>:</b>
	<?php echo CHtml::encode($data->applied); ?>
	<br />

	*/ ?>

</div>