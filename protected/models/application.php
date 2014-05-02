<?php

/**
 * This is the model class for table "application1".
 *
 * The followings are the available columns in table 'application1':
 * @property integer $AID
 * @property integer $EID
 * @property integer $JID
 * @property integer $CID
 * @property integer $offered
 * @property integer $shortlist
 * @property integer $onhold
 * @property string $applied
 */
class Application extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Application1 the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'application';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('EID, JID, CID', 'numerical', 'integerOnly'=>true),
			array('jobstatus', 'safe'),	
			array('jobstatus', 'required'),	
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('AID, EID, JID, CID, jobstatus ', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'job'=> array(self::BELONGS_TO, 'job', 'JID'),
            'company'=> array(self::BELONGS_TO, 'company', 'CID'),
           // 'user'=> array(self::BELONGS_TO, 'user', 'ID'),
            'Employee'=> array(self::BELONGS_TO, 'Employee', 'EID'),
	);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'AID' => 'Aid',
			'EID' => 'Eid',
			'JID' => 'Jid',
			'CID' => 'Cid',
			'jobstatus' => 'Job Status',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('AID',$this->AID);
		$criteria->compare('EID',$this->EID);
		$criteria->compare('JID',$this->JID);
		$criteria->compare('CID',$this->CID);
		$criteria->compare('jobstatus',$this->jobstatus);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}