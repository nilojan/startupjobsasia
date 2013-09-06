<?php if(Yii::app()->user->isCompany())
{ ?>
<div class="clear">
	<div class="span12">
		<a href ="<?php echo Yii::app()->request->baseUrl?>/job/submitJob">
			<div class="span3 dashboard-a">
				<i class="icon-large icon-cloud"></i>Post Job			
			</div>
		</a>
		<a href ="<?php echo Yii::app()->request->baseUrl?>/job/manageJobs">
			<div class="span3 dashboard-b">
				<i class=" icon-largeicon-cloud"></i>Manage Jobs
			</div>
		</a>
		<a href ="<?php echo Yii::app()->request->baseUrl?>/company/application">
			<div class="span3 dashboard-c">
				<i class="icon-large icon-cloud"></i>Applications
			</div>
		</a>
		<a href ="<?php echo Yii::app()->request->baseUrl?>/company/company">
			<div class="span3 dashboard-d">
				<i class="icon-large icon-cloud"></i>Profile
			</div>
		</a>
		<a href ="<?php echo Yii::app()->request->baseUrl?>/company/update">
			<div class="span3 dashboard-e">
				<i class="icon-large icon-cloud"></i>Update Profile
			</div>	
		</a>
		<a href ="<?php echo Yii::app()->request->baseUrl?>/company/premium">
			<div class="span3 dashboard-f">
				<i class="icon-large icon-cloud"></i>Premium
			</div>
		</a>		
	</div>
</div>
<?php } ?>
<?php if(Yii::app()->user->isMember())
{ ?>
<div class="clear">
	<div class="span12">
		<a href ="<?php echo Yii::app()->request->baseUrl?>/user/edit">
			<div class="span3 dashboard-a">
				<i class="icon-large icon-cloud"></i>Edit Profile
			</div>
		</a>
		<a href ="<?php echo Yii::app()->request->baseUrl?>/user/application">
			<div class="span3 dashboard-c">
				<i class="icon-large icon-cloud"></i>Applications
			</div>
		</a>
		<a href ="<?php echo Yii::app()->request->baseUrl?>/user/profile/<?php Yii::app()->user->getId(); ?>">
			<div class="span3 dashboard-d">
				<i class="icon-large icon-cloud"></i>Profile
			</div>
		</a>
	</div>
</div>
<?php } ?>