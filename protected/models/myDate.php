<?php


class myDate extends CFormModel
{
    public $day;
    public $month;
    public $year;
<<<<<<< HEAD
=======
    public $country_code;
>>>>>>> viv_changes

   
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

<<<<<<< HEAD
    
=======
    public function getCountryList()
    {
      return array(
          'afghan'=>'Afghan',
          'albanian'=>'Albanian',
          'algerian'=>'Algerian',
          'american'=>'American',
          'andorran'=>'Andorran',
          'angolan'=>'Angolan',
          'antiguans'=>'Antiguans',
          'argentinean'=>'Argentinean',
          'armenian'=>'Armenian',
          'australian'=>'Australian',
          'austrian'=>'Austrian',
          'azerbaijani'=>'Azerbaijani',
          'bahamian'=>'Bahamian',
          'bahraini'=>'Bahraini',
          'bangladeshi'=>'Bangladeshi',
          'barbadian'=>'Barbadian',
          'barbudans'=>'Barbudans',
          'batswana'=>'Batswana',
          'belarusian'=>'Belarusian',
          'belgian'=>'Belgian',
          'belizean'=>'Belizean',
          'beninese'=>'Beninese',
          'bhutanese'=>'Bhutanese',
          'bolivian'=>'Bolivian',
          'bosnian'=>'Bosnian',
          'brazilian'=>'Brazilian',
          'british'=>'British',
          'bruneian'=>'Bruneian',
          'bulgarian'=>'Bulgarian',
          'burkinabe'=>'Burkinabe',
          'burmese'=>'Burmese',
          'burundian'=>'Burundian',
          'cambodian'=>'Cambodian',
          'cameroonian'=>'Cameroonian',
          'canadian'=>'Canadian',
          'cape verdean'=>'Cape Verdean',
          'central african'=>'Central African',
          'chadian'=>'Chadian',
          'chilean'=>'Chilean',
          'chinese'=>'Chinese',
          'colombian'=>'Colombian',
          'comoran'=>'Comoran',
          'congolese'=>'Congolese',
          'costa rican'=>'Costa Rican',
          'croatian'=>'Croatian',
          'cuban'=>'Cuban',
          'cypriot'=>'Cypriot',
          'czech'=>'Czech',
          'danish'=>'Danish',
          'djibouti'=>'Djibouti',
          'dominican'=>'Dominican',
          'dutch'=>'Dutch',
          'east timorese'=>'East Timorese',
          'ecuadorean'=>'Ecuadorean',
          'egyptian'=>'Egyptian',
          'emirian'=>'Emirian',
          'equatorial guinean'=>'Equatorial Guinean',
          'eritrean'=>'Eritrean',
          'estonian'=>'Estonian',
          'ethiopian'=>'Ethiopian',
          'fijian'=>'Fijian',
          'filipino'=>'Filipino',
          'finnish'=>'Finnish',
          'french'=>'French',
          'gabonese'=>'Gabonese',
          'gambian'=>'Gambian',
          'georgian'=>'Georgian',
          'german'=>'German',
          'ghanaian'=>'Ghanaian',
          'greek'=>'Greek',
          'grenadian'=>'Grenadian',
          'guatemalan'=>'Guatemalan',
          'guinea-bissauan'=>'Guinea-Bissauan',
          'guinean'=>'Guinean',
          'guyanese'=>'Guyanese',
          'haitian'=>'Haitian',
          'herzegovinian'=>'Herzegovinian',
          'honduran'=>'Honduran',
          'hungarian'=>'Hungarian',
          'icelander'=>'Icelander',
          'indian'=>'Indian',
          'indonesian'=>'Indonesian',
          'iranian'=>'Iranian',
          'iraqi'=>'Iraqi',
          'irish'=>'Irish',
          'israeli'=>'Israeli',
          'italian'=>'Italian',
          'ivorian'=>'Ivorian',
          'jamaican'=>'Jamaican',
          'japanese'=>'Japanese',
          'jordanian'=>'Jordanian',
          'kazakhstani'=>'Kazakhstani',
          'kenyan'=>'Kenyan',
          'kittian and nevisian'=>'Kittian and Nevisian',
          'kuwaiti'=>'Kuwaiti',
          'kyrgyz'=>'Kyrgyz',
          'laotian'=>'Laotian',
          'latvian'=>'Latvian',
          'lebanese'=>'Lebanese',
          'liberian'=>'Liberian',
          'libyan'=>'Libyan',
          'liechtensteiner'=>'Liechtensteiner',
          'lithuanian'=>'Lithuanian',
          'luxembourger'=>'Luxembourger',
          'macedonian'=>'Macedonian',
          'malagasy'=>'Malagasy',
          'malawian'=>'Malawian',
          'malaysian'=>'Malaysian',
          'maldivan'=>'Maldivan',
          'malian'=>'Malian',
          'maltese'=>'Maltese',
          'marshallese'=>'Marshallese',
          'mauritanian'=>'Mauritanian',
          'mauritian'=>'Mauritian',
          'mexican'=>'Mexican',
          'micronesian'=>'Micronesian',
          'moldovan'=>'Moldovan',
          'monacan'=>'Monacan',
          'mongolian'=>'Mongolian',
          'moroccan'=>'Moroccan',
          'mosotho'=>'Mosotho',
          'motswana'=>'Motswana',
          'mozambican'=>'Mozambican',
          'namibian'=>'Namibian',
          'nauruan'=>'Nauruan',
          'nepalese'=>'Nepalese',
          'new zealander'=>'New Zealander',
          'ni-vanuatu'=>'Ni-Vanuatu',
          'nicaraguan'=>'Nicaraguan',
          'nigerien'=>'Nigerien',
          'north korean'=>'North Korean',
          'northern irish'=>'Northern Irish',
          'norwegian'=>'Norwegian',
          'omani'=>'Omani',
          'pakistani'=>'Pakistani',
          'palauan'=>'Palauan',
          'panamanian'=>'Panamanian',
          'papua new guinean'=>'Papua New Guinean',
          'paraguayan'=>'Paraguayan',
          'peruvian'=>'Peruvian',
          'polish'=>'Polish',
          'portuguese'=>'Portuguese',
          'qatari'=>'Qatari',
          'romanian'=>'Romanian',
          'russian'=>'Russian',
          'rwandan'=>'Rwandan',
          'saint lucian'=>'Saint Lucian',
          'salvadoran'=>'Salvadoran',
          'samoan'=>'Samoan',
          'san marinese'=>'San Marinese',
          'sao tomean'=>'Sao Tomean',
          'saudi'=>'Saudi',
          'scottish'=>'Scottish',
          'senegalese'=>'Senegalese',
          'serbian'=>'Serbian',
          'seychellois'=>'Seychellois',
          'sierra leonean'=>'Sierra Leonean',
          'singaporean'=>'Singaporean',
          'slovakian'=>'Slovakian',
          'slovenian'=>'Slovenian',
          'solomon islander'=>'Solomon Islander',
          'somali'=>'Somali',
          'south african'=>'South African',
          'south korean'=>'South Korean',
          'spanish'=>'Spanish',
          'sri lankan'=>'Sri Lankan',
          'sudanese'=>'Sudanese',
          'surinamer'=>'Surinamer',
          'swazi'=>'Swazi',
          'swedish'=>'Swedish',
          'swiss'=>'Swiss',
          'syrian'=>'Syrian',
          'taiwanese'=>'Taiwanese',
          'tajik'=>'Tajik',
          'tanzanian'=>'Tanzanian',
          'thai'=>'Thai',
          'togolese'=>'Togolese',
          'tongan'=>'Tongan',
          'trinidadian or tobagonian'=>'Trinidadian or Tobagonian',
          'tunisian'=>'Tunisian',
          'turkish'=>'Turkish',
          'tuvaluan'=>'Tuvaluan',
          'ugandan'=>'Ugandan',
          'ukrainian'=>'Ukrainian',
          'uruguayan'=>'Uruguayan',
          'uzbekistani'=>'Uzbekistani',
          'venezuelan'=>'Venezuelan',
          'vietnamese'=>'Vietnamese',
          'welsh'=>'Welsh',
          'yemenite'=>'Yemenite',
          'zambian'=>'Zambian',
          'zimbabwean'=>'Zimbabwean',
      );
    }

    public function getCountryCodes()
    {
      return array(
        '213'=>'Algeria (+213) ',
      '376'=>'Andorra (+376)',
      '244'=>'Angola (+244)',
      '1264'=>'Anguilla (+1264)',
      '1268'=>'Antigua & Barbuda (+1268)',
      '599'=>'Antilles (Dutch) (+599)',
      '54'=>'Argentina (+54) ',
      '374'=>'Armenia (+374)',
      '297'=>'Aruba (+297)',
      '247'=>'Ascension Island (+247)',
      '61'=>'Australia (+61)',
      '43'=>'Austria (+43)',
      '994'=>'Azerbaijan (+994)',
      '1242'=>'Bahamas (+1242)',
      '973'=>'Bahrain (+973)',
      '880'=>'Bangladesh (+880) ',
      '1246'=>'Barbados (+1246)',
      '375'=>'Belarus (+375)',
      '32'=>'Belgium (+32)',
      '501'=>'Belize (+501)',
      '229'=>'Benin (+229)',
      '1441'=>'Bermuda (+1441)',
      '975'=>'Bhutan (+975)',
      '591'=>'Bolivia (+591)',
      '387'=>'Bosnia Herzegovina (+387)',
      '267'=>'Botswana (+267)',
      '55'=>'Brazil (+55)',
      '673'=>'Brunei (+673)',
      '359'=>'Bulgaria (+359)',
      '226'=>'Burkina Faso (+226)',
      '257'=>'Burundi (+257)',
      '855'=>'Cambodia (+855) ',
      '237'=>'Cameroon (+237)',
      '1'=>'Canada (+1)',
      '238'=>'Cape Verde Islands (+238)',
      '1345'=>'Cayman Islands (+1345)',
      '236'=>'Central African Republic (+236)',
      '56'=>'Chile (+56)',
      '86'=>'China (+86)',
      '57'=>'Colombia (+57)',
      '269'=>'Comoros (+269)',
      '242'=>'Congo (+242)',
      '682'=>'Cook Islands (+682) ',
      '506'=>'Costa Rica (+506)',
      '385'=>'Croatia (+385)',
      '53'=>'Cuba (+53)',
      '90392'=>'Cyprus North (+90392)',
      '357'=>'Cyprus South (+357)',
      '42'=>'Czech Republic (+42)',
      '45'=>'Denmark (+45)',
      '2463'=>'Diego Garcia (+2463)',
      '253'=>'Djibouti (+253)',
      '1809'=>'Dominica (+1809)',
      '1809'=>'Dominican Republic (+1809)',
      '593'=>'Ecuador (+593)',
      '20'=>'Egypt (+20)',
      '353'=>'Eire (+353)',
      '503'=>'El Salvador (+503)',
      '240'=>'Equatorial Guinea (+240)',
      '291'=>'Eritrea (+291)',
      '372'=>'Estonia (+372)',
      '251'=>'Ethiopia (+251)',
      '500'=>'Falkland Islands (+500)',
      '298'=>'Faroe Islands (+298)',
      '679'=>'Fiji (+679)',
      '358'=>'Finland (+358)',
      '33'=>'France (+33)',
      '594'=>'French Guiana (+594)',
      '689'=>'French Polynesia (+689)',
      '241'=>'Gabon (+241)',
      '220'=>'Gambia (+220)',
      '7880'=>'Georgia (+7880)',
      '49'=>'Germany (+49)',
      '233'=>'Ghana (+233)',
      '350'=>'Gibraltar (+350)',
      '30'=>'Greece (+30)',
      '299'=>'Greenland (+299)',
      '1473'=>'Grenada (+1473)',
      '590'=>'Guadeloupe (+590)',
      '671'=>'Guam (+671)',
      '502'=>'Guatemala (+502)',
      '224'=>'Guinea (+224)',
      '245'=>'Guinea - Bissau (+245)',
      '592'=>'Guyana (+592)',
      '509'=>'Haiti (+509)',
      '504'=>'Honduras (+504)',
      '852'=>'Hong Kong (+852)',
      '36'=>'Hungary (+36)',
      '354'=>'Iceland (+354)',
      '91'=>'India (+91)',
      '62'=>'Indonesia (+62)',
      '98'=>'Iran (+98)',
      '964'=>'Iraq (+964)',
      '972'=>'Israel (+972)',
      '39'=>'Italy (+39)',
      '225'=>'Ivory Coast (+225)',
      '1876'=>'Jamaica (+1876)',
      '81'=>'Japan (+81)',
      '962'=>'Jordan (+962)',
      '7'=>'Kazakhstan (+7)',
      '254'=>'Kenya (+254)',
      '686'=>'Kiribati (+686)',
      '850'=>'Korea North (+850)',
      '82'=>'Korea South (+82)',
      '965'=>'Kuwait (+965)',
      '996'=>'Kyrgyzstan (+996)',
      '856'=>'Laos (+856)',
      '371'=>'Latvia (+371)',
      '961'=>'Lebanon (+961)',
      '266'=>'Lesotho (+266)',
      '231'=>'Liberia (+231)',
      '218'=>'Libya (+218)',
      '417'=>'Liechtenstein (+417)',
      '370'=>'Lithuania (+370)',
      '352'=>'Luxembourg (+352)',
      '853'=>'Macao (+853)',
      '389'=>'Macedonia (+389)',
      '261'=>'Madagascar (+261)',
      '265'=>'Malawi (+265)',
      '60'=>'Malaysia (+60)',
      '960'=>'Maldives (+960)',
      '223'=>'Mali (+223)',
      '356'=>'Malta (+356)',
      '692'=>'Marshall Islands (+692)',
      '596'=>'Martinique (+596)',
      '222'=>'Mauritania (+222)',
      '269'=>'Mayotte (+269)',
      '52'=>'Mexico (+52)',
      '691'=>'Micronesia (+691)',
      '373'=>'Moldova (+373)',
      '377'=>'Monaco (+377)',
      '976'=>'Mongolia (+976)',
      '1664'=>'Montserrat (+1664)',
      '212'=>'Morocco (+212)',
      '258'=>'Mozambique (+258)',
      '95'=>'Myanmar (+95)',
      '264'=>'Namibia (+264)',
      '674'=>'Nauru (+674)',
      '977'=>'Nepal (+977)',
      '31'=>'Netherlands (+31)',
      '687'=>'New Caledonia (+687)',
      '64'=>'New Zealand (+64)',
      '505'=>'Nicaragua (+505)',
      '227'=>'Niger (+227)',
      '234'=>'Nigeria (+234)',
      '683'=>'Niue (+683)',
      '672'=>'Norfolk Islands (+672)',
      '670'=>'Northern Marianas (+670)',
      '47'=>'Norway (+47)',
      '968'=>'Oman (+968)',
      '680'=>'Palau (+680)',
      '507'=>'Panama (+507)',
      '675'=>'Papua New Guinea (+675)',
      '595'=>'Paraguay (+595)',
      '51'=>'Peru (+51)',
      '63'=>'Philippines (+63)',
      '48'=>'Poland (+48)',
      '351'=>'Portugal (+351)',
      '1787'=>'Puerto Rico (+1787)',
      '974'=>'Qatar (+974)',
      '262'=>'Reunion (+262)',
      '40'=>'Romania (+40)',
      '7'=>'Russia (+7)',
      '250'=>'Rwanda (+250)',
      '378'=>'San Marino (+378)',
      '239'=>'Sao Tome & Principe (+239)',
      '966'=>'Saudi Arabia (+966)',
      '221'=>'Senegal (+221)',
      '381'=>'Serbia (+381)',
      '248'=>'Seychelles (+248)',
      '232'=>'Sierra Leone (+232)',
      '65" selected="'=>'Singapore (+65)',
      '421'=>'Slovak Republic (+421)',
      '386'=>'Slovenia (+386)',
      '677'=>'Solomon Islands (+677)',
      '252'=>'Somalia (+252)',
      '27'=>'South Africa (+27)',
      '34'=>'Spain (+34)',
      '94'=>'Sri Lanka (+94)',
      '290'=>'St. Helena (+290)',
      '1869'=>'St. Kitts (+1869)',
      '1758'=>'St. Lucia (+1758)',
      '249'=>'Sudan (+249)',
      '597'=>'Suriname (+597)',
      '268'=>'Swaziland (+268)',
      '46'=>'Sweden (+46)',
      '41'=>'Switzerland (+41)',
      '963'=>'Syria (+963)',
      '886'=>'Taiwan (+886)',
      '7'=>'Tajikstan (+7)',
      '66'=>'Thailand (+66)',
      '228'=>'Togo (+228)',
      '676'=>'Tonga (+676)',
      '1868'=>'Trinidad & Tobago (+1868)',
      '216'=>'Tunisia (+216)',
      '90'=>'Turkey (+90)',
      '7'=>'Turkmenistan (+7)',
      '993'=>'Turkmenistan (+993)',
      '1649'=>'Turks & Caicos Islands (+1649)',
      '688'=>'Tuvalu (+688) ',
      '256'=>'Uganda (+256)',
      '44'=>'UK (+44)',
      '380'=>'Ukraine (+380)',
      '971'=>'United Arab Emirates (+971)',
      '598'=>'Uruguay (+598)',
      '1'=>'USA (+1)',
      '7'=>'Uzbekistan (+7)',
      '678'=>'Vanuatu (+678)',
      '379'=>'Vatican City (+379)',
      '58'=>'Venezuela (+58)',
      '84'=>'Vietnam (+84)',
      '84'=>'Virgin Islands - British (+1284)',
      '84'=>'Virgin Islands - US (+1340) ',
      '681'=>'Wallis & Futuna (+681) ',
      '969'=>'Yemen (North) (+969) ',
      '967'=>'Yemen (South) (+967)',
      '381'=>'Yugoslavia (+381)',
      '243'=>'Zaire (+243)',
      '260'=>'Zambia (+260)',
      '263'=>'Zimbabwe (+263)',
      );
    }
>>>>>>> viv_changes
    

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