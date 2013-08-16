<style type="text/css">
.abc
{
	/*<?php if(isset($company->coverpicture)){  ?>*/
    height: 250px;
	background-image:url("<?php echo Yii::app()->request->baseUrl.'/images/cover/'.$company->coverpicture; ?>");	
	/*<?php }else{  ?>
	height: 0px;
	<?php } ?>*/
    background-color: transparent;
    background-position: center center;
    background-repeat: no-repeat;
    margin-top: 0;
	border-top:2px solid #F97C30;
}
</style>

<?php
$this->breadcrumbs = array(
    "{$company->cname} {$company->location}",
);
$this->pageTitle = "Startup Company: {$company->cname} {$company->location}";
$this->pageDesc = $company->mission;
$this->pageOgTitle = "Startup Company: {$company->cname} {$company->location}";
$this->pageOgDesc= $company->mission;
$this->pageOgImage='/images/company/180/'.$company->image;
?>

<div class ="abc"></div>

<div class="row-fluid">
	<div class="span6" style="text-align:right;margin-top:-40px;">
	<div class="span5" style="float:right;background:#F97C30;color:#fff;padding:10px;margin-left:15px;">
	 <?php $dataProvider=new CActiveDataProvider('job', array( 'criteria'=>array(
                                                                   'order'=>'t.created DESC',
                                                                   // show all jobs that are not expired
                                                                   //'condition'=>'expire >=today',
                                                                   //'params'=>array('today'=>date('Y-m-d H:i:s')),
                                                                    'with'=>array('company'),
																	'condition'=>'company.CID=:CID',
                                                                    'params'=>array(':CID'=>$company->CID),    
                                                                    ),
                                                                    'pagination'=>array(
                                                                                        'pageSize'=>15,),
                                                )); ?>

            <div style="font-size: 190px;line-height: 147px;text-align: center;"><?php echo $dataProvider->totalItemCount ?></div>
	 <div style="text-align:center;">OPPORTUNITIES</div>
	 </div>
	 
	<div class="span6" style="float:right;border:3px solid #F97C30;background:#fff;">
	 <?php
        $default_image = 'startup_default.jpg';
        $img_url = Yii::app()->getBaseUrl(true).'/images/company/'. $company->image; 
         $file_headers = @get_headers($img_url);
        if(($file_headers[0] == 'HTTP/1.1 404 Not Found') || ($file_headers[0] == 'HTTP/1.0 404 Not Found') || ($company->image == '')) {
            $img_url = Yii::app()->request->baseUrl.'/images/company/'. $default_image; 
            echo '<img src="'.$img_url.'" style="width:92%;padding:4%;" >';
        }
        else {
            echo '<img src="'.$img_url.'" style="width:92%;padding:4%;" >';
        }

     ?>
	 </div>
	 <div class="span11" id="clear" style="text-align:right;border:3px solid #F97C30;float:right;margin-top:15px;">
	 <div style="text-align:left;background:#F97C30;color:#fff;padding:10px;"><h1 style="margin:0px;"></h1></div>
	 
	   
												
		<?php     
             $this->widget('bootstrap.widgets.TbListView', array(
            'dataProvider'=>$dataProvider,
            //'cssFile' => Yii::app()->baseUrl . '/css/gridView.css',
            'itemView'=>'_jobView',   // refers to the partial view named '_post'
            //'ajaxUpdate'=>false,
            //'htmlOptions' => array("class"=>"table table-striped"),   
            //'sortableAttributes'=>array(
              //'job.title'=>'Title',
            
           // 'created'=>'Created',
   // ),
));
 ?>
        
        <!--<h1><?php echo CHtml::encode($company->cname); ?></h1> --> 

	</div>
	</div>
        <div class="span6">
			
			<p style="text-align:justify;font-family: 'FrutigerLT';"><?php echo str_replace('</br>',"",$company->address); ?></p>
			
			<p style="text-align:justify;font-family: 'FrutigerLT';">tel : <a href="tel:<?php echo CHtml::encode($company->contact) ?>"><?php echo CHtml::encode($company->contact) ?></a></p>
			
			<p style="text-align:justify;font-family: 'FrutigerLT';">email : <a href="mailto:<?php echo CHtml::encode($company->cemail) ?>"><?php echo CHtml::encode($company->cemail) ?></a></p>
			
                <h3> Our Mission </h3>
				<p style="text-align:justify;font-family: 'FrutigerLT';">
                <?php //   echo count($job);
                        echo str_replace('</br>',"",$company->mission); ?></p>
                        <h3> Our Culture </h3>
                
                <p style="text-align:justify;font-family: 'FrutigerLT';"><?php echo str_replace('</br>',"",$company->culture); ?></p>
                        <h3> Benefits </h3>
                
                 <p style="text-align:justify;font-family: 'FrutigerLT';"><?php echo str_replace('</br>',"",$company->benefits); ?></p>
                        
                 <?php       //echo CHtml::encode($company->about) ?>     
     

		</div>
</div>

