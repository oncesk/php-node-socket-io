<?php
namespace PhpNodeSocketIO\Configuration\Traits\Https;

use PhpNodeSocketIO\Configuration\Traits\Client AS BaseClient;

/**
 * Class HttpsClient
 * @package PhpNodeSocketIO\Configuration\Traits\Https
 */
trait Client {

	use BaseClient;

	/**
	 * @return bool
	 */
	public function isSecure() {
		return true;
	}
}