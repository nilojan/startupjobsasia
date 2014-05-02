<?php
class ApplyJobForm extends CFormModel
{
    public $resume;

    public $coverLetter;
	//public $agree;



    /**
     * Declares the validation rules.
     */
    //to be changed

    public function rules() {
		return array(

		//array('agree', 'required','message'=>'You must agree the agreement.'),
        array('coverLetter,resume', 'safe'),
		array('resume', 'required','on'=>'update'),
		array('resume', 'file', 'types'=>'pdf,doc,docx','safe'=>true, 'allowEmpty'=>true,'wrongType'=>'Only pdf/doc/docx allowed.'),
        array('resume,coverLetter', 'safe', 'on'=>'search'),

		);
	}


    /*
     * Declares customized attribute labels.
     * If not declared here, an attribute would have a label that is
     * the same as its name with the first letter in upper case.
     */

    public function attributeLabels() {
        return array(
            'coverLetter'=>'Achievements / Summary',

        );
    }

}
?>