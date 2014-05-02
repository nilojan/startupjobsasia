doccy
=====

  Doccy is a Yii Extension / Behavior which adds docx rendering options to a controller.
 
  It uses the docxgen library (bundled with phpdocx) to create the docx, so docxgen must be
  installed (see https://github.com/djpate/docxgen/).
 
  To attach this behavior to a controller, add it through a behaviors() method:
 
 <pre><code>
   public function behaviors()
   {
       return array(
           'doccy' => array(
               'class' => 'ext.doccy.Doccy',
           ),
       );
   }
 </code></pre>
  See below for more configuration options.
 
  To render single page docx from a template file you just call renderDocx() instead
  of render. 
  
  Usage Example (Controller "Report"):
  
First add behaviour to the controller:

<pre><code>
  	public function behaviors()
	{
		return array(
            'doccy'=>array(                                                                                                
                'class' => 'application.extensions.doccy.Doccy',   
				'options' => array(
		                   //'templatePath' => 'path/to/template',  // Path where docx templates are stored. Default value is controller`s view folder 
							//'outputPath' => 'path/to/output',  // Path where output files should be stored. Default value is application runtime folder 
							//'docxgenFolder' => 'docxgen-master',  // Name of the folder which holds docxgen library (must be in the extension folder). Default value is 'docxgen-master' 
				),
			),
		);
	}
</code></pre>

Second, add an action which will be used to download parsed docx document:

<pre><code>	
	public function actionDownload()
	{
		$this->doccy->newFile('template.docx'); // template.docx must be located in protected/views/report/template.docx  where "report" is the name of the curren controller view folder (alternatively you must configure option "templatePath")
		$this->doccy->phpdocx->assignToHeader("#HEADER1#","HRADIeader 1"); // basic field mapping to header
		$this->doccy->phpdocx->assignToFooter("#FOOTER1#","Footer 1"); // basic field mapping to footer
		$this->doccy->phpdocx->assign("#TITLE1#","Pet shop BOYS list"); // basic field mapping
		$this->doccy->phpdocx->assignBlock("members",array(array("#NAME#"=>"John","#SURNAME#"=>"DOE"),array("#NAME#"=>"Jane","#SURNAME#"=>"DOE"))); // this would replicate two members block with the associated values
		$this->doccy->phpdocx->assignNestedBlock("pets",array(array("#PETNAME#"=>"Rex")),array("members"=>1)); // would create a block pets for john doe with the name rex
		$this->doccy->phpdocx->assignNestedBlock("pets",array(array("#PETNAME#"=>"Rox")),array("members"=>2)); // would create a block pets for jane doe with the name rox
		$this->doccy->phpdocx->assignNestedBlock("toys",array(array("#TOYNAME#"=>"Ball"),array("#TOYNAME#"=>"Frisbee"),array("#TOYNAME#"=>"Box")),array("members"=>1,"pets"=>1)); // would create a block toy for rex
		$this->doccy->phpdocx->assignNestedBlock("toys",array(array("#TOYNAME#"=>"Frisbee")),array("members"=>2,"pets"=>1)); // would create a block toy for rox
		$this->renderDocx("ExampleReport.docx", true); // use $forceDownload=false in order to (just) store file in the outputPath folder.
	}
</code></pre>