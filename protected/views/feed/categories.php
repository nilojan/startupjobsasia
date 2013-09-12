<?php header("Content-type: text/xml"); ?>
<item>
<?php
$length = sizeof($model);
for ($i=0; $i<$length; $i++)
{
 ?> 
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
                <?php echo CHtml::encode($model[$i]->salary); ?>
            </salary>
   

<?php
}
?> 
</item>