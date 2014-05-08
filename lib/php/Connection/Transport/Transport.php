<?php
namespace PhpNodeSocketIO\Connection\Transport;

use PhpNodeSocketIO\Connection\ConnectionInterface;

/**
 * Class Transport
 * @package PhpNodeSocketIO\Connection\Transport
 */
abstract class Transport implements TransportInterface {

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