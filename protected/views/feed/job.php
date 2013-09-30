<?php header("Content-type: text/xml"); ?>
<item>
<?php
$length = sizeof($model);
for ($i=0; $i<$length; $i++)
{
 ?> <job>
              <title>
            <?php echo CHtml::encode($model[$i]->title); ?>
            </title>
            <description>
            <?php echo CHtml::encode($model[$i]->description); ?>
            </description>
            <responsibility>
             <?php echo CHtml::encode($model[$i]->responsibility); ?>     
            </responsibility>
            <requirement>
            <?php echo CHtml::encode($model[$i]->requirement); ?>
            </requirement>
            <location>
                <?php echo CHtml::encode($model[$i]->location); ?>
            </location>
            <salary>
                <?php echo CHtml::encode($model[$i]->salary); ?>
            </salary>
      </job>
<?php
}
?> 
</item>