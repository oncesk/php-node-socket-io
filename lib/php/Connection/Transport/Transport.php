<?php
namespace PhpNodeSocketIO\Connection\Transport;

use PhpNodeSocketIO\Base\Object;
use PhpNodeSocketIO\Connection\ConnectionInterface;
use PhpNodeSocketIO\Connection\Transport\Exception\HandshakeException;

/**
 * Class Transport
 * @package PhpNodeSocketIO\Connection\Transport
 */
abstract class Transport extends Object implements TransportInterface {

	const EVENT_BEFORE_CONNECT = 'Transport.BeforeConnect';
	const EVENT_BEFORE_CLOSE = 'Transport.BeforeClose';
	const EVENT_BEFORE_SEND = 'Transport.BeforeSend';
	const EVENT_BEFORE_HANDSHAKE = 'Transport.BeforeHandshake';

	const EVENT_AFTER_CONNECT = 'Transport.AfterConnect';
	const EVENT_AFTER_HANDSHAKE = 'Transport.AfterHandshake';
	const EVENT_AFTER_CLOSE = 'Transport.AfterClose';

	/**
	 * @var array
	 */
	public $cookies = array();

	/**
	 * @var ConnectionInterface
	 */
	private $connection;

	/**
	 * @param ConnectionInterface $connection
	 *
	 * @return $this
	 */
	public function setConnection(ConnectionInterface $connection) {
		$this->connection = $connection;
		return $this;
	}

	/**
	 * @return ConnectionInterface
	 */
	public function getConnection() {
		return $this->connection;
	}

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
	 * @return \PhpNodeSocketIO\Configuration\Config
	 */
	protected function getConfig() {
		return $this->getConnection()->getConfig();
	}

	/**
	 * @return string
	 */
	protected function getHandshakeUrl() {
		return sprintf(
			$this->getConfig()->getTransport()->handshakeUrl,
			$this->getConfig()->getSecureClient() ? 'https' : 'http',
			$this->getConfig()->host,
			$this->getConfig()->port,
			$this->getConfig()->getTransport()->protocol
		);
	}
}