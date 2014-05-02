<?php
//$this->breadcrumbs=array('Register / Success',);
$this->pageTitle = 'Success | '.Yii::app()->params['pageTitle'];

?>
<h4>Thank you for applying for a job with Startup Jobs Asia,</h4>
<br />
<img src ="<?php echo Yii::app()->request->baseUrl?>/images/suj.jpg" style="width:100px; height:100px; float:left;">
<br />
<p><br/>
<h4>
<span class="label label-important">you shall receive an email notification regarding your application and user information on Startup Joba Asia.</span>
</h4>
</p>
<?php
if(isset(Yii::app()->session['startup_name'])){
$startup_name = Yii::app()->session['startup_name'];
$candidate_email = Yii::app()->session['candidate_email'];

?>	
<!-- for first time applicants -->

<?php $this->beginWidget('bootstrap.widgets.TbModal', array('id'=>'FirstTime')); ?>
 
<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4>Notice</h4>
</div>

<div class="modal-body">
	<p>Your profile and resume has been sent to <b><?php echo $startup_name ?></b> and will be included in our database. <br /><br />

A job seeker account has been created for you and verification email have been sent to <b><?php echo $candidate_email ?></b> .<br /> 
You can now log in to <u>quick apply for jobs</u> listed in Startup Jobs Asia and help you to keep track of jobs that you have applied for.<br /><br />

Companies registered with us has the access to our database for Talent Acquisition and contact job seekers from our database for employment opportunities. <br />
If you do not wish to have your profile and resume accessible to Startup Companies other than the ones you applied for, kindly login to your job seeker account to configure this setting in your account</p>

</div>
 
<div class="modal-footer">
    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'label'=>'Close',
        'url'=>'#',
        'htmlOptions'=>array('data-dismiss'=>'modal'),
    )); ?>
</div>
 
<?php $this->endWidget(); ?>

<?php
}
unset(Yii::app()->session['startup_name']);
unset(Yii::app()->session['candidate_email']);
?>