<?php
namespace PhpNodeSocketIO\Connection;

use PhpNodeSocketIO\Configuration\Config;

/**
 * Class ConnectionAbstract
 * @package PhpNodeSocketIO\Connection
 */
abstract class ConnectionAbstract implements ConnectionInterface {

	/**
	 * @var Config
	 */
	private $config;

	/**
	 * @param Config $config
	 *
	 * @return $this
	 */
	final public function setConfig(Config $config) {
		$this->config = $config;
		return $this;
	}

	/**
	 * @return Config
	 */
	public function getConfig() {
		return $this->config;
	}
}