<?php
/**
 * Doccy
 *
 * Doccy is a behavior which adds docx rendering options to a controller.
 *
 * It uses the docxgen library (bundled with phpdocx) to create the docx, so docxgen must be
 * installed (see https://github.com/djpate/docxgen/).
 *
 * To attach this behavior to a controller, add it through a behaviors() method:
 *
 *  public function behaviors()
 *  {
 *      return array(
 *          'doccy' => array(
 *              'class' => 'ext.doccy.Doccy',
 *          ),
 *      );
 *  }
 *
 * See below for more configuration options.
 *
 * To render single page docx from a template file you just call renderDocx() instead
 * of render. 
 * 
 * Usage Example (Controller "Report"):
 * 
 * public function behaviors()
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
	
public function actionDownload()
{
	$this->doccy->newFile('template.docx'); // template.docx must be located in protected/views/report/template.docx  (alternatively you must configure option "templatePath")
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
 *
 * @author Dino Osmanovic <dosmanovic@devlogic.eu>
 * @version 1.0
 * @license http://www.opensource.org/licenses/MIT
 */

class Doccy extends CBehavior
{
    /**
     * @var array default docx options
     */
    public $defaultDocxOptions;

    /**
     * @var array default docx page options
     */
    public $defaultDocxPageOptions;
    
     /**
     * @var object default phpdocx object
     */
    public $phpdocx;

    /**
     * @var mixed path alias of temp directory. Default is 'application.runtime'.
     */
    public $tmpAlias='application.runtime';

    private $_options = array();
	private $_tmp;
    private $_path=null;

    
    /**
     * @return string the full path to the extension directory
     */
    public function getPath(){
    	if (is_null($this->_path)){
    		$this->_path = dirname(__FILE__);
    	}
    	return $this->_path;
    }
    
    /**
     * @return array global docx options options for docxgen
     */
    public function getOptions()
    {
        if(!isset($this->_options['templatePath']))
            $this->_options['templatePath'] = $this->owner->viewPath;
		
        if(!isset($this->_options['outputPath']))
            $this->_options['outputPath'] = Yii::getPathOfAlias('application.runtime');
		
        if(!isset($this->_options['docxgenFolder']))
            $this->_options['docxgenFolder'] = 'docxgen-master';
		
    	$this->_options['extensionPath'] = $this->path;
    	
        if(!isset($this->_options['tmp']))
            $this->_options['tmp'] = $this->getTmpDir();
		
        return $this->_options;
    }

    /**
     * @param array $value global options for the extension.
     */
    public function setOptions($value)
    {
        $this->_options = $value;
    }

    /**
     * @return string the full path to the temp directory
     */
    private function getTmpDir()
    {
        if($this->_tmp===null)
            $this->_tmp = Yii::getPathOfAlias($this->tmpAlias);

        return $this->_tmp;
    }
    
    /**
     *  @param string $filename name of the template file (file must exist)
     */
    public function newFile($filename){
    	require_once($this->path.DIRECTORY_SEPARATOR.$this->options['docxgenFolder'].DIRECTORY_SEPARATOR."phpDocx.php");    
    	$this->phpdocx =  new phpdocx($this->options['templatePath'].DIRECTORY_SEPARATOR.$filename); 
    }
    
    /**
     *  @param string $filename name of the output file
     *  @param bool $forceDownload download should be forced. default value is true.
     */
    public function renderDocx($filename, $forceDownload=true){
    	if ($forceDownload){
    		$file_name=$this->options['tmp'].DIRECTORY_SEPARATOR.uniqid().$filename;
    		$mime = 'application/msword';
    		$this->phpdocx->save($file_name);
    		header('Pragma: public');
			header('Expires: 0');
			header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
			header('Last-Modified: '.gmdate ('D, d M Y H:i:s', filemtime ($file_name)).' GMT');
			header('Cache-Control: private',false);
			header('Content-Type: '.$mime);
			header('Content-Disposition: attachment; filename="'.basename($filename).'"');
			header('Content-Transfer-Encoding: binary');
			header('Content-Length: '.filesize($file_name));
			header('Connection: close');
			readfile($file_name);
			unlink($file_name);
			Yii::app()->end();
    	}else{
    		$this->phpdocx->save($this->options['outputPath'].DIRECTORY_SEPARATOR.$filename);
    	}
    }
}
