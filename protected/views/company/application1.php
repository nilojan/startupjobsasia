<?php
$this->breadcrumbs = array(
    'Applications');
$this->pageTitle = 'Application | '.Yii::app()->params['pageTitle'];
?>
<h1>Job Applications</h1><br />
<div id='suc_msg'  style="display:none;" class="alert out alert-block fade alert-success"><strong>Success!!</strong> Job Status Updated Successfully.</div>
  
 <div class ="row-fluid">         
         
        <div class="span3">

		<div class="well" style="padding: 8px 0px;">
<ul id="yw18" class="nav nav-list">
<li class="nav-header">Search</li>
<li class="active">
<?php $this->widget('bootstrap.widgets.TbTabs', array(
    'type'=>'tabs', // 'tabs' or 'pills'
    'tabs'=>array(
        array('label'=>'Advance Search', 'items'=>array(
            array('label'=>'Keywords', 'content'=>'<h5>Search by Keywords</h5><br /><form action="'.Yii::app()->request->baseUrl.'/company/applicationsearch" method = "get">
<input type="text" class="span10" name="q" class="search-query span12" placeholder="Keywords"><button type="submit" class="btn btn-success">Search</button></form>','active'=>true),
            array('label'=>'by Age', 'content'=>'<h5>Search by Age</h5><br /><input type="text" class="span5" placeholder="start age"> - <input type="text" class="span5" placeholder="end age"><br /><button class="btn btn-success">Search</button>'),
			array('label'=>'by Location', 'content'=>'<h5>Search by Location</h5><br /><select name="location" id="location">
					<option value="Singapore">Singapore</option>
					<option value="Malaysia">Malaysia</option>
					<option value="Thailand">Thailand</option>
					<option value="Indonesia">Indonesia</option>
					<option value="China">China</option>
					<option value="Hong Kong">Hong Kong</option>
					<option value="Taiwan">Taiwan</option>
					<option value="Japan">Japan</option>
					<option value="Korea">Korea</option>
					<option value="Vietnam">Vietnam</option>
					<option value="Philippines">Philippines</option>
					<option value="India">India</option>
					<option value="Nepal">Nepal</option>
					</select><br /><button class="btn btn-success">Search</button>'),
        )),
    ),
	)); 
?>
</li>

<li class="nav-header">Filter</li>
<?php echo CHtml::link('Last One Month Applicants', 'applicationlastonemonth', array('class'=>'link'))?><br />
<?php echo CHtml::link('Last Three Month Applicants', 'applicationlastthreemonth', array('class'=>'link'))?><br />
<?php echo CHtml::link('Last Six Month Applicants', 'applicationlastsixmonth', array('class'=>'link'))?><br />
<?php echo CHtml::link('Last One Year Applicants', 'applicationlastoneyear', array('class'=>'link'))?><br /><br />
</ul>
</div>
	
	<?php
	$dataProvider=new CActiveDataProvider('Application', array( 'criteria'=>array(
                                                                    //'order'=>'applied DESC',
                                                                    //'with' =>array('JID','CID'),
                                                                   'condition'=>'applied >= :today AND CID=:CID',  
                                                                    'params'=>array('today'=>date('Y-m-d H:i:s', strtotime("- 365 day")),':CID'=>$company->CID),
                                                                    ),
																	'sort'=>array(
																		'defaultOrder'=>'applied DESC',
																	),
                                                                    'pagination'=>array('pageSize'=>9),
                                                ));
												?>

<div class="alert in alert-block fade alert-info">
<a class="close" data-dismiss="alert">x</a>
<strong>Total <?php echo $dataProvider->totalItemCount; ?> Records Found</strong>
</div>
        </div>
         <div class="span9">
		 <div class="span5" style="display: none;"></div>
	<?php 
             //var_dump($dataProvider); die; 
        
     $this->widget('bootstrap.widgets.TbListView', array(
            'dataProvider'=>$dataProvider,
		   'id'=>'PRofile',
		   'template'=>'{summary}{sorter}{items}{pager}',
		   'summaryText' => 'Showing {start} - {end} of {count} Records',
            'itemView'=>'_applicationView',   // refers to the partial view named '_post'
			'itemsTagName'=>'ul',
			//'value'=>'++$idd',
           // 'ajaxUpdate'=>true,
			'emptyText'=>'<b> Sorry, there are no applications to display</b>',
            //'htmlOptions' => array('style'=>'margin-top:-20px;padding:0;'), 
			//'viewData'=>array('page'=>$page),			
            'sortableAttributes'=>array(
              'JID'=>'Job Applied',
			  'applied'=>'Date Applied',
			  //'applied >= today'=>'Last Month',
		),
		));
		?>
         </div>   
</div>

 