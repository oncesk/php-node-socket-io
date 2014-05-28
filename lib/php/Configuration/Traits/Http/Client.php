<?php
namespace PhpNodeSocketIO\Configuration\Traits\Http;

use PhpNodeSocketIO\Base\GlobalEventEmitter;
use PhpNodeSocketIO\Configuration\Traits\Client AS BaseClient;

/**
 * Class HttpClient
 * @package PhpNodeSocketIO\Configuration\Traits\Http
 */
trait Client {

	use BaseClient;

	/**
	 * @return bool
	 */
	public function isSecure() {
		return false;
	}
}