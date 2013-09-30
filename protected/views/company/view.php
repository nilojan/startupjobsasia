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
<script>

   $(document).ready(function(){

        $("#full").spectrum({
            color: "#f89406",
            showInput: true,
            
            showInitial: true,
            showPalette: true,
            showSelectionPalette: true,
            maxPaletteSize: 10,
            preferredFormat: "hex",
            localStorageKey: "spectrum.demo",
           
            change: function(color) {
                
              var bgc=   color.toHexString();
                
                $(".nav > li > a").css("color",bgc);
                $(".breadcrumb > li >a").css("color",bgc);
                $(".span5").css("background-color",bgc);
                $(".SearchForm input[type='text']").css("border-color",bgc);
                $(".span11").css("border-color",bgc);
                $("#bgchange").css("background-color",bgc);
                $(".nav-pills > .active > a").css("background-color",bgc);
                $(".nav-pills > .active > a").css("color","");
                 $(".topHeader").css("border-bottom-color",bgc);
                 $(".abc").css("border-top-color",bgc);
                 $(".span6").css("border-color",bgc);
                 $('textarea, input[type="text"], input[type="password"], input[type="datetime"], input[type="datetime-local"], input[type="date"], input[type="month"], input[type="time"], input[type="week"], input[type="number"], input[type="email"], input[type="url"], input[type="search"], input[type="tel"], input[type="color"], .uneditable-input').css("border-color",bgc);
                 

                 

                
            },
            palette: [
                ["rgb(0, 0, 0)", "rgb(67, 67, 67)", "rgb(102, 102, 102)",
                "rgb(204, 204, 204)", "rgb(217, 217, 217)","rgb(255, 255, 255)"],
                ["rgb(152, 0, 0)", "rgb(255, 0, 0)", "rgb(255, 153, 0)", "rgb(255, 255, 0)", "rgb(0, 255, 0)",
                "rgb(0, 255, 255)", "rgb(74, 134, 232)", "rgb(0, 0, 255)", "rgb(153, 0, 255)", "rgb(255, 0, 255)"], 
                ["rgb(230, 184, 175)", "rgb(244, 204, 204)", "rgb(252, 229, 205)", "rgb(255, 242, 204)", "rgb(217, 234, 211)", 
                "rgb(208, 224, 227)", "rgb(201, 218, 248)", "rgb(207, 226, 243)", "rgb(217, 210, 233)", "rgb(234, 209, 220)", 
                "rgb(221, 126, 107)", "rgb(234, 153, 153)", "rgb(249, 203, 156)", "rgb(255, 229, 153)", "rgb(182, 215, 168)", 
                "rgb(162, 196, 201)", "rgb(164, 194, 244)", "rgb(159, 197, 232)", "rgb(180, 167, 214)", "rgb(213, 166, 189)", 
                "rgb(204, 65, 37)", "rgb(224, 102, 102)", "rgb(246, 178, 107)", "rgb(255, 217, 102)", "rgb(147, 196, 125)", 
                "rgb(118, 165, 175)", "rgb(109, 158, 235)", "rgb(111, 168, 220)", "rgb(142, 124, 195)", "rgb(194, 123, 160)",
                "rgb(166, 28, 0)", "rgb(204, 0, 0)", "rgb(230, 145, 56)", "rgb(241, 194, 50)", "rgb(106, 168, 79)",
                "rgb(69, 129, 142)", "rgb(60, 120, 216)", "rgb(61, 133, 198)", "rgb(103, 78, 167)", "rgb(166, 77, 121)",
                "rgb(91, 15, 0)", "rgb(102, 0, 0)", "rgb(120, 63, 4)", "rgb(127, 96, 0)", "rgb(39, 78, 19)", 
                "rgb(12, 52, 61)", "rgb(28, 69, 135)", "rgb(7, 55, 99)", "rgb(32, 18, 77)", "rgb(76, 17, 48)"]
            ]
        });


    });
</script>

<input type='text' id='full' />

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
	 <div id='bgchange' style="text-align:left;background:#F97C30;color:#fff;padding:10px;"><h1 style="margin:0px;"></h1></div>
	 
	   
												
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
			
			<?php if($company->privacy == 0) { ?>
            <p style="text-align:justify;font-family: 'FrutigerLT';">tel : <a href="tel:<?php echo CHtml::encode($company->contact) ?>"><?php echo CHtml::encode($company->contact) ?></a></p>
			
			<p style="text-align:justify;font-family: 'FrutigerLT';">email : <a href="mailto:<?php echo CHtml::encode($company->cemail) ?>"><?php echo CHtml::encode($company->cemail) ?></a></p>
			<?php } ?>
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


