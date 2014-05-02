<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
 
$url1 = "{$data->cname}"-"{$data->location}";
$url2 = str_replace('/', '-', $url1);
 $url1 = str_replace(' ', '-', $url2);
?>   

<div class ="span6 bgone" style="margin:0 10px 10px 0;min-height:250px;">
	
	<div class="profileImage">
			<?php
        $default_image = 'startup_default.jpg';
        $img_url = Yii::app()->getBaseUrl(true).'/images/company/400/'. $data->image; 
         $file_headers = @get_headers($img_url);
        if(($file_headers[0] == 'HTTP/1.1 404 Not Found') || ($file_headers[0] == 'HTTP/1.0 404 Not Found') || ($data->image == '')) {
            $img_url = Yii::app()->request->baseUrl.'/images/company/'. $default_image; 
            $image = '<img src="'.$img_url.'" align="middle" style= "width:120px; float:left; border:1px solid #F89406;" >';
        }
        else {
            $image = '<img src="'.$img_url.'" align="middle" style= "width:120px; float:left; border:1px solid #F89406;" >';
        }
		echo CHtml::link($image, array('company/view/CID/'.$data->CID, 'Start-up'=>$url1), array('target'=>'_blank'));

				?>
	</div>

	<div class="profileInfo">
		<div class ="span">
				<?php echo CHtml::link($data->cname, array('company/company/'.$data->ID), array('target'=>'_blank')); ?>
		</div>	
		<div class ="span">
				<div class ="span4">
					<strong>Incorporated</strong>
				</div>
				<div class ="span5">:
					<?php echo $data->incorporated; ?>
				</div>
		</div>
		<div class ="span">
				<div class ="span4">
					<strong>Registered with us</strong>
				</div>
				<div class ="span5">:
					<?php echo substr($data->created,0,10); ?>
				</div>
		</div>
		<div class ="span">
				<div class ="span4">
					<strong>Contact Info</strong>
				</div>
				<div class ="span5">:
					<?php if($data->contact!=''){ ?>
					<?php echo $data->contact; ?><br />
					<?php } ?>
					

					<?php if($data->cemail!=''){ ?>
					<a href="mailto:<?php echo $data->cemail; ?>"><?php echo $data->cemail; ?></a><br />
					<?php } ?>
					
					<?php if($data->website!=''){ 
					
						if (preg_match("#https?://#", $data->website) === 0) {
						$data->website = 'http://'.$data->website;
						}
					?>
					<a href="<?php echo $data->website; ?>" target="_blank"><?php echo $data->website; ?></a><br />
					<?php } ?>

				</div>
		</div>
	</div> 
	
    <div class="span">
                    <?php $this->widget('bootstrap.widgets.TbButton', array(
                                                                            'label'=>'Modify',
                                                                            'type'=>'inverse', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
																			'size'=>'mini',
                                                                            //array('job/update'),    
                                                                            'url'=>Yii::app()->createUrl("company/update/".$data->ID),)); ?>
				
				
				
         <?php 
                    if($data->registered == 1)
                    {
                        $this->widget('bootstrap.widgets.TbButton', array(
                                                                            'label'=>'Disable',
                                                                            'type'=>'danger', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                                                                            //array('job/update'), 
																			'size'=>'mini',
																			'htmlOptions'=>array(
																'onclick'=>'return confirm("Are you sure want to Disable?");',
																			),																			
                                                                            'url'=>Yii::app()->createUrl("admin/EditCompanyStatus/".$data->ID),)); 
                    }
                    else
                    {
                        $this->widget('bootstrap.widgets.TbButton', array(
                                                                            'label'=>'Approve',
                                                                            'type'=>'success', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
																			'size'=>'mini',
																			'htmlOptions'=>array(
																'onclick'=>'return confirm("Are you sure want to Approve?");',
																			),
                                                                            //array('job/update'),    
                                                                            'url'=>Yii::app()->createUrl("admin/EditCompanyStatus/".$data->ID),)); 

                    }

                    ?>                      
	</div>
</div> 
