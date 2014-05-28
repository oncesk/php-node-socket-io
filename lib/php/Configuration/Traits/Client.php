<?php
namespace PhpNodeSocketIO\Configuration\Traits;

use PhpNodeSocketIO\Base\GlobalEventEmitter;
use PhpNodeSocketIO\Connection\Connection;

/**
 * Class Client
 * @package PhpNodeSocketIO\Configuration\Traits
 */
trait Client {

	use Cookie;
	use Connection;

	/**
	 * @return bool
	 */
	abstract public function isSecure();

	public function hasClientConfiguration() {
		return true;
	}

	/**
	 * @param callable|\Closure $callback
	 *
	 * @return $this
	 */
	public function onBeforeHandshake($callback) {
		GlobalEventEmitter::getInstance()->on(Connection::EVENT_BEFORE_HANDSHAKE, $callback);
		return $this;
	}
}