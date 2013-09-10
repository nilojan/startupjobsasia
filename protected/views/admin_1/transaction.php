<?php
$this->pageTitle = Yii::app()->name . ' - Transactions';
$this->breadcrumbs = array(
    'Transactions',
);
?>
<title>StartUp Jobs Asia | Startup Hire | Startup Hiring | Startup Recruiting | Startup Jobs | VC Hire | VC Jobs | Work In Startups</title>

<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/inspired_style.css" rel="stylesheet" type="text/css" />
<div id="inspired_wrapper">    

    <div id="inspired_content_top"></div>

    <div id="inspired_content">
        <div id="inspired_big_content">

            <div class="content_box">
                <h1>Transactions</h1>


                <?php
                $dataProvider = new CActiveDataProvider('transaction');
                $this->widget('zii.widgets.grid.CGridView', array(
                    'dataProvider' => $dataProvider,
                    'pager' => array('cssFile' => Yii::app()->baseUrl . '/css/gridView.css'),
                    'cssFile' => Yii::app()->baseUrl . '/css/gridView.css',
                    'htmlOptions' => array('class' => 'grid-view rounded'),
                    'columns' => array(
                        'transactionID', // display the 'title' attribute
                        'profileID', // display the 'name' attribute of the 'category' relation
                        'sProductID',
                        'time' //// display the 'content' attribute as purified HTML
                    )
                        )
                );
                ?>
            </div>
        </div>	


        <div class="cleaner"></div>
    </div>
    <div id="inspired_content_bottom"></div>
</div> <!-- end of wrapper -->



