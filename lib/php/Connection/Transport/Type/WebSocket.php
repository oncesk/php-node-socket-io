<?php
namespace PhpNodeSocketIO\Connection\Transport\Type;

use PhpNodeSocketIO\Connection\Transport\Exception\ConnectException;
use PhpNodeSocketIO\Connection\Transport\Transport;

/**
 * Class WebSocket
 * @package PhpNodeSocketIO\Connection\Transport\Type
 */
class WebSocket extends Transport {

	/**
	 * @return boolean
	 */
	public function isAlive() {
		// TODO: Implement isAlive() method.
	}

	/**
	 * @param string $data
	 *
	 * @return mixed
	 */
	public function send($data) {

	}

	/**
	 * @return mixed
	 * @throws ConnectException
	 */
	public function connect() {
		// TODO: Implement connect() method.
	}

	/**
	 * @return mixed
	 */
	public function close() {
		// TODO: Implement close() method.
	}
}