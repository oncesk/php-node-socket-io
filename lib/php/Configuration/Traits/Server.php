<?php
namespace PhpNodeSocketIO\Configuration\Traits;

/**
 * Class Server
 * @package PhpNodeSocketIO\Configuration\Traits
 */
trait Server {

	use Address;
	use Process;
	use Cookie;

	/**
	 * @return bool
	 */
	public function hasServerConfiguration() {
		return true;
	}

	/**
	 * @return bool
	 */
	abstract public function isSecure();
}