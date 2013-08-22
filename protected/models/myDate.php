<?php


class myDate extends CFormModel
{
    public $day;
    public $month;
    public $year;

   
    /**
     * Declares the validation rules.
     */
    //to be changed
    
    public function rules() {
        return array(
            array('coverLetter', 'safe'),
            array('resume', 'file',
                  'types'=>'pdf,doc,docx',
                  'maxSize' => 1024 * 1024 * 2, 
                  'allowEmpty'=>true,),
            array('photo', 'file',
                  'types'=>'jpg, png,jpeg, gif',
                  'maxSize' => 1024 * 1024 * 2,   
                  'allowEmpty'=>true, ),

           );
    }

    public function getDates()
    {
         return array(
          1=>1,2=>2,3=>3,4=>4,5=>5,6=>6,7=>7,8=>8,9=>9,10=>10,
          11=>11,12=>12,13=>13,14=>14,15=>15,16=>16,17=>17,18=>18,19=>19,20=>20,
          21=>21,22=>22,23=>23,24=>24,25=>25,26=>26,27=>27,28=>28,29=>29,30=>30,31=>31,
        );
    }
    public function getMonths()
    {
         return array(
           '01'=>'January','02'=>'February','03'=>'March','04'=>'April','05'=>'May','06'=>'June','07'=>'July','08'=>'August','09'=>'September','10'=>'October','11'=>'November','12'=>'December',
        );
    }

    
    public function getYears()
    {
         return array(
           
            1950=>1950,1951=>1951,1952=>1952,1953=>1953,1954=>1954,
            1955=>1955,1956=>1956,1957=>1957,1958=>1958,1959=>1959,
            1960=>1960,1961=>1961,1962=>1962,1963=>1963,1964=>1964,
            1965=>1965,1966=>1966,1967=>1967,1968=>1968,1969=>1969,
            1970=>1970,1971=>1971,1972=>1972,1973=>1973,1974=>1974,
            1975=>1975,1976=>1976,1977=>1977,1978=>1978,1979=>1979,
            1980=>1980,1981=>1981,1982=>1982,1983=>1983,1984=>1984,
            1985=>1985,1986=>1986,1987=>1987,1988=>1988,1989=>1989,
            1990=>1990,1991=>1991,1992=>1992,1993=>1993,1994=>1994,
            1995=>1995,1996=>1996,1997=>1997,1998=>1998,1999=>1999,
            2000=>2000,2001=>2001,2002=>2002,2003=>2003,2004=>2004,
            2005=>2005,
          
        );
    }

    
    

    /*
     * Declares customized attribute labels.
     * If not declared here, an attribute would have a label that is
     * the same as its name with the first letter in upper case.
     */

    public function attributeLabels() {
        return array(
            'day'=>'',
            'month'=> '',
            'year' => '',
        );
    }

}
?>