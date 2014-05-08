<?php
namespace PhpNodeSocketIO\Connection\Transport;

use PhpNodeSocketIO\Connection\Transport\Exception\HandshakeException;
use PhpNodeSocketIO\Connection\Transport\Exception\ConnectException;

/**
 * Class WebSocket
 * @package PhpNodeSocketIO\Connection\Transport
 */
class WebSocket extends Transport {

	/**
	 * @return mixed
	 * @throws HandshakeException
	 */
	public function handshake() {
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, $this->getHandshakeUrl());
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT_MS, $this->getConfig()->getTransport()->handshakeTimeout);
		curl_setopt($ch, CURLOPT_TIMEOUT_MS, $this->getConfig()->getTransport()->handshakeTimeout);
	}

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