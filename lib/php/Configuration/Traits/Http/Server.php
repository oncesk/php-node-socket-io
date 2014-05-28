<?php
namespace PhpNodeSocketIO\Configuration\Traits\Http;

use PhpNodeSocketIO\Configuration\Traits\Server AS BaseServer;

/**
 * Class HttpServer
 * @package PhpNodeSocketIO\Configuration\Traits\Http
 */
trait Server {

	use BaseServer;

	/**
	 * @return bool
	 */
	public function isSecure() {
		return false;
	}
}