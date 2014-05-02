<?php

/**
 * This is the model class for table "stats".
 *
 * The followings are the available columns in table 'stats':
 * @property integer $ID
 * @property integer $JID
 * @property string $IP
 * @property integer $visits
 * @property string $last_visit
 */
class Searchstats extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Stats the static model class
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
		return 'searchstats';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('JID, IP, last_visit', 'required'),
			array('SID', 'numerical', 'integerOnly'=>true),
			array('IP', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('SID, searchterm, location, IP, cur_date', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'SID' => 'SID',
			'searchterm' => 'searchterm',
			'location' => 'location',
			'IP' => 'IP',
			'cur_date' => 'cur_date',
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

		$criteria->compare('SID',$this->SID);
		$criteria->compare('searchterm',$this->searchterm);
		$criteria->compare('location',$this->location);
		$criteria->compare('IP',$this->IP,true);
		$criteria->compare('cur_date',$this->cur_date);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}