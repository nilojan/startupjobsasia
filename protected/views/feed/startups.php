<?php header("Content-type: text/xml"); ?>
<item>
<?php
$length = sizeof($model);
for ($i=0; $i<$length; $i++)
{
 ?> 
           <name>
            <?php echo CHtml::encode($model[$i]->cname); ?>
            </name>
            <email>
            <?php echo CHtml::encode($model[$i]->cemail); ?>
            </email>
            <address>
             <?php echo CHtml::encode($model[$i]->address); ?>
            </address>
            
            <image>
            <?php echo $imgpath.$model[$i]->image;?>
            </image>
            <contact>
            <?php echo CHtml::encode($model[$i]->contact); ?>
            </contact>
            <mission> 
            <?php echo CHtml::encode($model[$i]->mission); ?>  
            </mission>
            <culture>
            <?php echo CHtml::encode($model[$i]->culture); ?>
            </culture>
            <benefits>
            <?php echo CHtml::encode($model[$i]->benefits); ?>
            </benefits>
            <location>
            <?php echo CHtml::encode($model[$i]->location); ?>
            </location>
<?php
}
?> 
</item>