<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class LoginForm extends CFormModel
{
	public $username;
	public $password;
	public $rememberMe;

	private $_identity;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// username and password are required
			array('username, password', 'required'),
			// rememberMe needs to be a boolean
			array('rememberMe', 'boolean'),
			// password needs to be authenticated
			array('password', 'authenticate'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'rememberMe'=>'Remember me next time',
		);
	}

	/**
	 * Authenticates the password.
	 * This is the 'authenticate' validator as declared in rules().
	 */
	public function authenticate($attribute,$params)
	{
		if(!$this->hasErrors())
		{
                    $key = 'AG*@#(129)!@K.><>]{[|sd`rjenfla0847&($#)!$Masdc$#@';
                    $pwd = hash('sha512', $key . ($this->password));
                    $pwd = substr($pwd,0,100);
			$this->_identity=new UserIdentity($this->username,$pwd);
			if(!$this->_identity->authenticate())
				$this->addError('password','Incorrect username or password.');
		}
	}

	/**
	 * Logs in the user using the given username and password in the model.
	 * @return boolean whether login is successful
	 */
	public function login()
	{
		if($this->_identity===null)
		{
			$this->_identity=new UserIdentity($this->username,$this->password);
			$this->_identity->authenticate();
		}
		if($this->_identity->errorCode===UserIdentity::ERROR_NONE)
		{
			$duration=$this->rememberMe ? 3600*24*30 : 0; // 30 days
			Yii::app()->user->login($this->_identity,$duration);
			return true;
		}
		else
			return false;
	}
}
<meta content="abcdasfsasdf We bring great talents to great startups. StartUp Jobs Asia | Startup Hire | Startup Hiring | Startup Recruiting | Startup Jobs | Starup Careers | Startup Career" name="description">
<meta content="blog" property="og:type" >
<meta content="asdfasdfasdfasdfasd asdfasStartUp Jobs Asia | Startup Hire | Startup Hiring | Startup Recruiting | Startup Jobs | VC Hire | VC Jobs | Work In Startups" property="og:title">
<meta content="asfdsafsdfas We bring great talents to great startups." property="og:description">
<meta content="<?php Yii::app()->request->baseUrl;?>" property="og:url">
<meta content="SasfsafasfsdafsdtartUp Jobs Asia | Startup Hire | Startup Hiring | Startup Recruiting | Startup Jobs | VC Hire | VC Jobs | Work In Startups" property="og:site_name">
<meta content="summary" name="twitter:card">
<title>StartUp Hire: <?php echo "{$job->title} {$company->cname} {$job->location}"?></title>
<?php $this->setPageTitle("{$job->title} {$company->cname} {$job->location}");?>
<head>    
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="language" content="en" />   
