<?php
namespace PhpNodeSocketIO\Configuration;

use PhpNodeSocketIO\Configuration\Traits\Https\Server;
use PhpNodeSocketIO\Configuration\Traits\Https\Client;
use PhpNodeSocketIO\Traits\IdTrait;

/**
 * Class Config
 * @package PhpNodeSocketIO\Configuration
 */
class Config implements ConfigInterface {

	use IdTrait;
	use Client;
	use Server;

	/**
	 * @var Config[]
	 */
	protected static $configs = array();

	/**
	 * @var bool
	 */
	private $isSecure = false;

	/**
	 * @param      $id
	 * @param bool $isSecure
	 *
	 * @return Config
	 */
	public static function create($id, $isSecure = false) {
		$config = new self($id, $isSecure);
		self::$configs[$config->getId()] = $config;
		return $config;
	}

	/**
	 * @param $id
	 *
	 * @return Config|null
	 */
	public static function get($id) {
		return array_key_exists($id, self::$configs) ? self::$configs[$id] : null;
	}

	/**
	 * @param      $id
	 * @param bool $isSecure
	 */
	public function __construct($id, $isSecure = false) {
		$this->setId($id);
		$this->isSecure = (bool) $isSecure;
	}

	/**
	 * @return bool
	 */
	public function isSecure() {
		return $this->isSecure;
	}
}