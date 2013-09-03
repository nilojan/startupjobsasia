<?php if(Yii::app()->user->isCompany())
{ ?>
<div class="clear">
	<div class="span12">
		<div class="span3 dashboard-a">
			<i class="icon-large icon-cloud"></i>Post Job
			
		</div>
		<div class="span3 dashboard-b">
			<i class=" icon-largeicon-cloud"></i>Applications
		</div>
		<div class="span3 dashboard-c">
			<i class="icon-large icon-cloud"></i>Profile
		</div>
		<div class="span3 dashboard-d">
			<i class="icon-large icon-cloud"></i>Profile
		</div>		
	</div>
</div>
<?php } ?>
<?php if(Yii::app()->user->isMember())
{ ?>
<div class="clear">
	<div class="span12">
		<div class="span3 dashboard-a">
			<i class="icon-large icon-cloud"></i>Edit Profile
		</div>
		<div class="span3 dashboard-c">
			<i class="icon-large icon-cloud"></i>Applications
		</div>
		<div class="span3 dashboard-d">
			<i class="icon-large icon-cloud"></i>Profile
		</div>
	</div>
</div>
<?php } ?>