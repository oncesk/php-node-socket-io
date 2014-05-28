<?php
namespace PhpNodeSocketIO\Configuration\Traits;


/**
 * Class Cookie
 * @package PhpNodeSocketIO\Configuration\Traits
 */
trait Cookie {

	/**
	 * @var int
	 */
	protected $cookieLifeTime = 2592000;

	/**
	 * @var string
	 */
	protected $sessionVarName = 'PHPSESSID';

	/**
	 * @return int
	 */
	public function getCookieLifeTime() {
		return $this->cookieLifeTime;
	}

	/**
	 * @param integer $lifeTime
	 *
	 * @return $this
	 */
	public function setCookieLifeTime($lifeTime) {
		if (is_numeric($lifeTime)) {
			$this->cookieLifeTime = $lifeTime;
		}
		return $this;
	}

	/**
	 * @return string
	 */
	public function getPHPSessionVarName() {
		return $this->sessionVarName;
	}

	/**
	 * @param string $name
	 *
	 * @return $this
	 */
	public function setPHPSessionVarName($name) {
		if (is_string($name) && !empty($name)) {
			$this->sessionVarName = $name;
		}
		return $this;
	}
}