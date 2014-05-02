Visit http://www.thomdowning.com/ if you get bored :)


Changelog:
 - 12/22/2010 Initial Release

Requirements:
  This extension has been tested with Yii Framework 1.1.5

Usage:
  Place the extension in your protected\extensions directory and add it to your model like the following:

/**
 * ShareReportForm class.
 */
class ShareReportForm extends CFormModel
{
  public $emails;
 
  /**
   * Declares the validation rules.
   */
  public function rules()
  {
    return array(
        array('emails', 'required'),
        array('emails', 'ext.multiEmailValidator', 'delimiter'=>',', 'min'=>1, 'max'=>5),
    );
  }
 
  /**
   * Declares customized attribute labels.
   * If not declared here, an attribute would have a label that is
   * the same as its name with the first letter in upper case.
   */
  public function attributeLabels()
  {
    return array(
        'emails'=>'Email To',
    );
  }
}