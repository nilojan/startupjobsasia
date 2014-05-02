<?php

/**
 * Smartter Captcha behavior for CModel
 *
 * @package application.components
 * @author hightman
 * @version 1.0
 */
class SmartCaptchaBehavior extends CModelBehavior
{
	/**
	 * @var integer the number of errors allowed before first to show captcha.
	 */
	public $numErrorBefore = 2;

	/**
	 * @var integer the number of errors allowed once pass captcha validation.
	 */
	public $numErrorAfter = 5;

	/**
	 * @var array list of attributes whose error affects to show captcha. Defaults to null for all attributes.
	 */
	public $attributes;

	/**
	 * @var string session name.
	 */
	public $sessionKey = 'Captcha.numErrorLeft';
	private $captchaAttribute;

	/**
	 * @return boolean whether to show captcha
	 */
	public function getIsNeedCaptcha()
	{
		return $this->getNumErrorLeft() > 0 ? false : CCaptcha::checkRequirements();
	}

	/**
	 * Handle the case does not require captcha
	 * @param CEvent $event 
	 */
	public function beforeValidate($event)
	{
		$this->captchaAttribute = null;
		foreach ($this->getOwner()->getValidators() as $validator)
		{
			if ($validator instanceof CCaptchaValidator)
			{
				if (!$this->getIsNeedCaptcha())
					$validator->allowEmpty = true;
				$this->captchaAttribute = $validator->attributes[0];
				break;
			}
		}
	}

	/**
	 * Handle validation results
	 * @param CEvent $event 
	 */
	public function afterValidate($event)
	{
		$owner = $this->getOwner(); /* @var $owner CModel */
		if ($this->captchaAttribute && $this->getIsNeedCaptcha() && !$owner->hasErrors($this->captchaAttribute))
			$this->setNumErrorLeft($this->numErrorAfter);
		else
		{
			if ($this->attributes === null)
				$hasError = $owner->hasErrors();
			else if (is_string($this->attributes))
				$hasError = $owner->hasErrors($this->attributes);
			else
			{
				$hasError = false;
				foreach ($this->attributes as $attribute)
				{
					if ($owner->hasErrors($attribute))
					{
						$hasError = true;
						break;
					}
				}
			}
			if ($hasError)
				$this->setNumErrorLeft($this->getNumErrorLeft() - 1);
		}
	}

	protected function getNumErrorLeft()
	{
		$num = Yii::app()->user->getState($this->sessionKey);
		if ($num === null)
			$num = $this->numErrorBefore;
		return $num;
	}

	protected function setNumErrorLeft($num)
	{
		Yii::app()->user->setState($this->sessionKey, $num);
	}
}