<?php
namespace PhpNodeSocketIO\Base;

/**
 * Class GlobalEventEmitter
 * @package PhpNodeSocketIO\Base
 */
class GlobalEventEmitter extends GenericEventEmitter {

	/**
	 * @var GlobalEventEmitter
	 */
	private static $instance;

	private function __construct() {}
	private function __clone() {}

	/**
	 * @return GlobalEventEmitter
	 */
	public static function getInstance() {
		if (self::$instance) {
			return self::$instance;
		}
		return self::$instance = new self();
	}
}