<?php date_default_timezone_set('Asia/Singapore');
$queryy = str_replace("+"," ",$query);
$CurDate = date('Y-m-d H:i:s');
$OneDay = date('Y-m-d H:i:s', strtotime("-1 day"));

$this->pageTitle = $queryy." ".$location.' - Jobs | Startup Jobs Asia';
$this->pageDesc = $queryy." ".$location.' - Jobs startup recruiting and hiring in Singapore, Malaysia and Hong Kong. We bring great talents to great company';
$this->pageOgTitle = $queryy." ".$location.' - Jobs | Startup Jobs Asia';
$this->pageOgDesc= $queryy." ".$location.' - Jobs startup recruiting and hiring in Singapore, Malaysia and Hong Kong. We bring great talents to great company';
$this->pageOgImage='https://farm4.staticflickr.com/3763/13373992133_9c0bc5e376_o_d.jpg';
//$this->addMetaProperty('fb:app_id',Yii::app()->params['fbAppId']);
$this->pageCanonical = "http://".$_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; // canonical URLs should always be absolute
$this->pagePublishedTime = "".$OneDay."";
$this->pageModifiedTime = "".$CurDate."";
$this->pageSiteName = "Start up Jobs Asia";
$this->pageAuthor = "Start up Jobs Asia";

$this->breadcrumbs = array(
    'Search Jobs',
);

?>
<div class="row-fluid">
<div class="span9">
<div class="clear">
<h1 class="HomeLatestJobs">Search for <?php echo $query; ?> <?php echo $type; ?> <?php echo $what; ?> in <?php echo $location; ?> </h1>
</div>
<?php
												
												
        $this->widget('bootstrap.widgets.TbListView', array(
            'dataProvider'=>$dataProvider,
            //'cssFile' => Yii::app()->baseUrl . '/css/gridView.css',
            'itemView'=>'_jobView',   // refers to the partial view named '_post'
            'sortableAttributes'=>array(
           // 'title',
           // 'type' => 'Type',    
           // 'created'=>'Created',
    ),
));

?>
</div>
<div class="span3"><?php include(Yii::app()->basePath . '/views/sidebar.php'); ?></div>
</div>