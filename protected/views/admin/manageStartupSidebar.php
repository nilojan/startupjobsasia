	<div class="well" style="padding: 8px 0px;">
		<ul id="yw18" class="nav nav-list">
		<li class="nav-header"></li>
		<li class="active">
		<form class="form-search" id="JobSearchForm" action="<?php echo Yii::app()->request->baseUrl ?>/admin/startupsearch" method="get">
			<div class="input-prepend">
				<span class="add-on"><i class="icon-search"></i></span>
				<input class="input-medium" placeholder="Keywords" name="q" type="text" />
			</div>
			<button type="submit" class="btn btn-success">Go</button>
		</form>
		</li>
		<li data-toggle="collapse" data-target="#test"><b><i class="icon-plus"></i>Filter</b></li>
			<ul class="nav nav-list collapse" id="test">
				<li class="divider"></li>
				<li><?php echo CHtml::link('Inactive Startups', 'inactivestartups', array('class'=>'link'))?></li>
			</ul>
		<li class="divider"></li>
		<li data-toggle="collapse" data-target="#testb"><b><i class="icon-plus"></i>Sort</b></li>
			<ul class="nav nav-list collapse" id="testb">
				<li><div id="Sortable"></div></li>
			</ul>			
		</ul>
	</div>