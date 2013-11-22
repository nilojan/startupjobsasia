<style type="text/css">
.abc
{
	<?php if($company->coverpicture != '') { ?>
    height: 250px;
	background-image:url("<?php echo Yii::app()->request->baseUrl.'/images/cover/'.$company->coverpicture; ?>");	
	<?php }else{  ?>
	height: 50px;
	<?php } ?>
    background-color: transparent;
    background-position: center center;
    background-repeat: no-repeat;
    margin-top: 0;
	border-top:2px solid #F97C30;
	background-size: 100%;
}
</style>

<?php
 /*echo $company->themecolor;
 die;*/

$this->breadcrumbs = array(
    "{$company->cname} {$company->location}",
);
$this->pageTitle = "Startup Company: {$company->cname} {$company->location}";
$this->pageDesc = $company->mission;
$this->pageOgTitle = "Startup Company: {$company->cname} {$company->location}";
$this->pageOgDesc= $company->mission;
$this->pageOgImage='/images/company/'.$company->image;
?>

<script>
<?php if($company->coverpicture != ''):  ?>
$(window).load(function() {
	$("html, body").animate({ scrollTop: 350 }, 500);
});
<?php endif; ?>
var suj_url = '<?php echo $this->createUrl('company/color'); ?>';
var c_colorr = '<?php echo $company->themecolor; ?>';

</script>

<?php if((Yii::app()->user->isCompany()) &&  (Yii::app()->user->getID())): ?>
<div id="style-switcher">
    <div class="theme_select">
        <div id='btn' class="close_btn">&nbsp;</div>
        <div class="content_box">
            <h3>Style Switcher</h3>
            <input class="input" type='text' id='full' />
        </div>
    </div>
</div>
<?php endif; ?>

</div>
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
	 <div id='bgchange' style="text-align:left;background:#F97C30;color:#fff;padding:10px;"></div>
	 
	   
												
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
        
        <h1 style="display:none;"><?php echo CHtml::encode($company->cname); ?> on Startup Jobs Asia</h1>

	</div>
	</div>

        <div class="span6">
			
			<p style="text-align:justify;font-family: 'FrutigerLT';"><?php echo str_replace('</br>',"",$company->address); ?></p>
			
			<?php if($company->privacy == 0) { ?>
			<div style="display:none;">
            <p style="text-align:justify;font-family: 'FrutigerLT';">tel : <a href="tel:<?php echo CHtml::encode($company->contact) ?>"><?php echo CHtml::encode($company->contact) ?></a></p>
			
			<p style="text-align:justify;font-family: 'FrutigerLT';">email : <a href="mailto:<?php echo CHtml::encode($company->cemail) ?>"><?php echo CHtml::encode($company->cemail) ?></a></p>
			</div>
			<?php } ?>


                        
				<?php if($company->mission != '') { ?>
				<h3>Our Mission </h3>
                <?php echo nl2br($company->mission) ?>
				<?php } ?>


				<?php if($company->culture != '') { ?>
				<h3>Our Culture </h3>
                <?php echo nl2br($company->culture) ?>
				<?php } ?>


				<?php if($company->benefits != '') { ?>
				<h3>Benefits </h3>
                <?php echo nl2br($company->benefits) ?>
				<?php } ?>



				<?php if($company->awards != '') { ?>
				<h3>Awards </h3>
                <?php echo nl2br($company->awards) ?>
				<?php } ?>



		</div>
</div>


