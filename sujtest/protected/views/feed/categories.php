<?php header("Content-type: text/xml"); ?>
<item>
<?php
$length = sizeof($model);
for ($i=0; $i<$length; $i++)
{
 ?> 
 <job>
           <title>
            <?php echo CHtml::encode($model[$i]->title); ?>
            </title>
            <description>
            <?php echo CHtml::encode($model[$i]->description); ?>
            </description>
            <location>
                <?php echo CHtml::encode($model[$i]->location); ?>
            </location>
           <salary>
                <?php $salary =$model[$i]->min_salary."-".$model[$i]->max_salary;
                 echo CHtml::encode($salary); ?>
            </salary>
   
   
</job>
<?php
}
?> 
</item>
