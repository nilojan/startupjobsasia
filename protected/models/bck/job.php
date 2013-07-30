<?php

class job extends CActiveRecord {
    
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }
    
  /*  public function relations() {
    return array(
      // other relations
      array('company', self::BELONGS_TO, 'company', 'CID'),
    );
    }
    */
    public function scopes()
    {
        return array(
            'Internship'=>array(
                'condition'=>'type="Internship"',
            ),
             'Fulltime'=>array(
                'condition'=>'type="Full-time"',
            ),
            'Part-time'=>array(
                'condition'=>'type="Part-time"',
            ),
            'Freelance'=>array(
                'condition'=>'type="Freelance"',
            ),
            'Temporary'=>array(
                'condition'=>'type="Temporary"',
            ),
           
            'recent'=>array(
                'order'=>'create_time DESC',
                'limit'=>5,
            ),
        );
    }
    public function relations()
    {
        return array(
            'company'=>array(self::BELONGS_TO, 'company', 'CID'),
            'application'=>array(self::HAS_MANY, 'application', 'JID'),
            
        );
    }
    public function rules() {
   
        return array(
            
        );
    }
    public function beforeSave() {
        date_default_timezone_set('Asia/Singapore');
        $date = date('Y-m-d H:i:s');
        if ($this->isNewRecord) {
                $this->created = $date;
                $date2 = date_create();
                $date2->add(new DateInterval('P'.Yii::app()->params['job_expire'].'D'));
                $date2 = $date2->format('Y-m-d H:i:s');
                $this->expire = $date2;
        }
        $this->modified = $date;
 
    return parent::beforeSave();
}
    
    
}



?>
