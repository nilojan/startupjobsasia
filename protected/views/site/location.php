<?php date_default_timezone_set('Asia/Singapore');

$Loc = Yii::app()->getRequest()->getQuery('location');


$CurDate = date('Y-m-d H:i:s');
$OneDay = date('Y-m-d H:i:s', strtotime("-1 day"));

$this->pageTitle = 'Startup Jobs in '.$Loc.' | Startup Jobs Asia';
$this->pageDesc = 'Startup Jobs in '.$Loc.' - Jobs startup recruiting and hiring in Singapore, Malaysia and Hong Kong. We bring great talents to great company';
$this->pageOgTitle = 'Startup Jobs in '.$Loc.' | Startup Jobs Asia';
$this->pageOgDesc= 'Startup Jobs in '.$Loc.' - Jobs startup recruiting and hiring in Singapore, Malaysia and Hong Kong. We bring great talents to great company';
$this->pageOgImage='https://farm4.staticflickr.com/3763/13373992133_9c0bc5e376_o_d.jpg';
//$this->addMetaProperty('fb:app_id',Yii::app()->params['fbAppId']);
$this->pageCanonical = "http://".$_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; // canonical URLs should always be absolute
$this->pagePublishedTime = "".$OneDay."";
$this->pageModifiedTime = "".$CurDate."";
$this->pageSiteName = "Start up Jobs Asia";
$this->pageAuthor = "Start up Jobs Asia";


$loc = 'Jobs';
if($location != ''){
    $loc =   $location.' Jobs';  
}
$this->breadcrumbs = array(
    $loc,
);

?>
<div class="row-fluid">
<div class="span9">
<div class="clear">
	<h1 class="HomeLatestJobs"><?php echo $location; ?> Jobs</h1>
</div>
<?php
        $dataProvider=new CActiveDataProvider('job', array( 'criteria'=>array(
                                                                    'order'=>'created DESC',
                                                                    'condition'=>'expire >= :today AND status=1 AND location=:location',
                                                                    'params'=>array('today'=>date('Y-m-d H:i:s'),':location'=>$location),
                                                                    ),
                                                                    'pagination'=>array('pageSize'=>30),
                                                ));
        $this->widget('bootstrap.widgets.TbListView', array(
            'dataProvider'=>$dataProvider,
            //'cssFile' => Yii::app()->baseUrl . '/css/gridView.css',
            'itemView'=>'_jobView',   // refers to the partial view named '_post'
			'pager' => array(
				'maxButtonCount'=>4,
				'hiddenPageCssClass' => 'disabled',
			    'selectedPageCssClass' => 'active',  
				'firstPageLabel' => '&laquo;',
				'lastPageLabel' => '&raquo;',
				'nextPageLabel' => '&rsaquo;',
				'prevPageLabel' => '&lsaquo;',
				'header' => '',
				'htmlOptions' => array(
					'class' => 'pagination',
					),		
                ),
));
?>
</div>
<div class="span3" id="Sidebar"><?php include(Yii::app()->basePath . '/views/sidebar.php'); ?></div>
</div>