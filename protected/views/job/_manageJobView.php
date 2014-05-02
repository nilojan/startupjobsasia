<?php
date_default_timezone_set('Asia/Singapore');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>   

<div class ="span6 bgtwo" style="margin:0 11px 10px 0;min-height:250px;">
         <div class ="span">
             <strong><?php echo CHtml::link($data->title, array('job/job/JID/'.$data->JID), array('target'=>'_blank')) ; ?></strong>
         </div>
           <div class ="span m_title type">
		   <ul>
					<?php 
						if ($data->full_time != '' && $data->full_time != '0'){	echo "<li>".$data->full_time."</li>"; }
					if ($data->part_time != '' && $data->part_time != '0'){ echo "<li>".$data->part_time."</li>"; } 
					 if ($data->freelance != '' && $data->freelance != '0'){ echo "<li>".$data->freelance."</li>"; }   
					 if ($data->internship != '' && $data->internship != '0'){ echo "<li>".$data->internship."</li>"; }  
					 if ($data->temporary != '' && $data->temporary != '0'){ echo "<li>".$data->temporary."</li>"; }  
					 if ($data->co_founder != '' && $data->co_founder != '0'){ echo "<li>".$data->co_founder."</li>"; } 
					 if ($data->contract != '' && $data->contract != '0'){ echo "<li>".$data->contract."</li>"; } 
					 ?>
			</ul>
         </div>
		<div class ="span">
            <div class ="span4">
				<strong>Location</strong>
			</div>
			<div class ="span5 m_title">:
				<?php echo $data->location; ?>
			</div>
        </div>
		
<?php if($data->min_salary != '' && $data->max_salary != '') { ?>		
		<div class ="span">
            <div class ="span4">
				<strong>Salary Range</strong>
			</div>
			<div class ="span5 m_title">:
				<?php 	 $salary = $data->min_salary."-".$data->max_salary;
						echo substr($salary,0,9); ?> <?php echo $data->currency; ?>
			</div>
        </div>	
<?php } ?>


<?php if($data->min_salary == '' && $data->max_salary == '' && $data->no_salary != '') { ?>
		<div class ="span">
            <div class ="span4">
				<strong>Instead of salary</strong>
			</div>
			<div class ="span5 m_title">:
				<?php echo $data->no_salary_options; ?>
			</div>
        </div>		
<?php } ?>
		 
		<div class ="span">
            <div class ="span4">
				<strong>Posted on</strong>
			</div>
			<div class ="span5 m_title">:
				<?php                    
					$date = date('Y-m-d H:i:s');
                    //$days = Yii::app()->user->dateDiff($date,$data->created);
                    //echo $days." days ago";
					  $cre_date = substr($data->created,0,10); 
						echo date("d F Y",strtotime($cre_date)); 
                    ?>
			</div>
        </div>


 		<div class ="span">
            <div class ="span4">
				<strong>Expire on</strong>
			</div>
			<div class ="span5 m_title">:
				<?php 
					$exp_date = substr($data->expire,0,10); 
					echo date("d F Y",strtotime($exp_date)); 
				?>
			</div>
        </div>

  		<div class ="span">
            <div class ="span4">
				<strong>Status</strong>
			</div>
			<div class ="span5 m_title">:
				<?php $toDay = date('Y-m-d H:i:s');
                    if($toDay > $data->expire){
						echo "Expired";
					}
					else
					{
						if($data->status == 1)
						{
							echo "Published";
						}else{
						echo "Private";
						}
					}
                    ?>
			</div>
        </div>

 
         <div class ="span">
      
					<?php $this->widget('bootstrap.widgets.TbButton', array(
                                                                            'label'=>'Modify Job',
                                                                            'type'=>'inverse', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
																			'size'=>'mini',
                                                                            //array('job/update'),    
                                                                            'url'=>Yii::app()->createUrl("job/update", array("JID"=>$data->JID )),)); ?>
                    <?php /*$this->widget('bootstrap.widgets.TbButton', array(
                                                                            'label'=>'Delete',
                                                                            'type'=>'danger', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                                                                            //array('job/update'),    
                                                                            'url'=>Yii::app()->createUrl("job/delete", array("JID"=>$data->JID )),));*/ ?>

                   
             
					<?php 
					$New_date = strtotime("$data->created +3 week");
					$Threeweek_date = date('Y-m-d H:i:s',$New_date);
					$Created_date = $data->created;
					$today_date = date('Y-m-d H:i:s');
					?>
					
					<?php if((($data->status != 1) && ($today_date >= $Threeweek_date)) || ($today_date > $data->expire)){
              		 $this->widget('bootstrap.widgets.TbButton', array(
                                                                            'label'=>'Re-Post Job',
                                                                            'type'=>'success', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
																			'size'=>'mini',
                                                                            //array('job/update'),    
                                                                            'url'=>Yii::app()->createUrl("job/repost", array("JID"=>$data->JID )))); ?>

                   
                 	
					<?php } ?>									
																			
																			
					<?php 
                    if($data->status == 1 && $today_date < $data->expire)
                    {
                        $this->widget('bootstrap.widgets.TbButton', array(
                                                            'label'=>'De-Activate Job',
                                                            'type'=>'danger', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
															'size'=>'mini',
															'htmlOptions'=>array(
																'onclick'=>'return confirm("Are you sure want to De-Activate the job?");',
															),
                                                            //array('job/update'),    
                                                            'url'=>Yii::app()->createUrl("job/editjobstatus", array("JID"=>$data->JID ))));
                    }
                    else if($data->status == 0 && $today_date < $data->expire)
                    {
                        $this->widget('bootstrap.widgets.TbButton', array(
                                                            'label'=>'Activate Job',
                                                            'type'=>'info', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
															'size'=>'mini',
															'htmlOptions'=>array(
																'onclick'=>'return confirm("Are you sure want to Activate the job?");',
															),
                                                             
                                                            'url'=>Yii::app()->createUrl("job/editjobstatus", array("JID"=>$data->JID ))));
                    }
                                                             ?>
			
					<?php 
                    if($data->premium == 0 && $today_date < $data->expire)
                    {
                        $this->widget('bootstrap.widgets.TbButton', array(
                                                            'label'=>'Add to Featured Jobs',
                                                            'type'=>'warning', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
															'size'=>'mini',
                                                            //array('job/update'),    
                                                            'url'=>Yii::app()->createUrl("pay/buy", array("JID"=>$data->JID )),));
                    }
                    else if($data->premium == 1)
                    {
                        $this->widget('bootstrap.widgets.TbButton', array(
                                                            'label'=>'Featured Job',
                                                            'type'=>'success', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
															'size'=>'mini',
                                                            'disabled' => true, 
                                                            'url'=>'#',));
                    }
                 if($data->premium == 0 && $today_date < $data->expire){
echo "<p class='success'><span class='label label-success'>All featured jobs will be share through various social channels</span></p>";
}
				 ?>
				
        </div>
   </div> 

