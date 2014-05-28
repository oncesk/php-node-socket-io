<?php
namespace PhpNodeSocketIO\Connection;

use PhpNodeSocketIO\Base\GlobalEventEmitter;
use PhpNodeSocketIO\Base\Object;
use PhpNodeSocketIO\Configuration\Config;
use PhpNodeSocketIO\Connection\Transport\TransportInterface;
use PhpNodeSocketIO\Frame\Event;
use PhpNodeSocketIO\Traits\EventEmitter;

/**
 * Class ConnectionAbstract
 * @package PhpNodeSocketIO\Connection
 */
abstract class ConnectionAbstract extends Object implements ConnectionInterface {

	use EventEmitter;

	const EVENT_BEFORE_HANDSHAKE = 'Connection.BeforeHandshake';
	const EVENT_BEFORE_CONNECT = 'Connection.BeforeConnect';
	const EVENT_BEFORE_SEND_FRAME = 'Connection.BeforeSendFrame';

	const EVENT_AFTER_HANDSHAKE = 'Connection.AfterHandshake';

	/**
	 * @var Config
	 */
	private $config;

	/**
	 * @var TransportInterface
	 */
	protected $transport;

	/**
	 * @param TransportInterface $transport
	 */
	public function __construct(TransportInterface $transport) {
		$this->transport = $transport;
	}

	/**
	 * @return TransportInterface
	 */
	public function getTransport() {
		return $this->transport;
	}

	/**
	 * @return bool
	 */
	public function connect() {
		if ($this->isAlive()) {
			return true;
		}
		$this->transport->handshake();
		$this->transport->connect();
		return true;
	}

	/**
	 * @return bool
	 */
	public function disconnect() {
		return $this->transport->close();
	}


	/**
	 * @return boolean
	 */
	public function isAlive() {
		return $this->transport->isAlive();
	}


	/**
	 * @param Config $config
	 *
	 * @return $this
	 */
	final public function setConfig(Config $config) {
		$this->config = $config;
		return $this;
	}

	/**
	 * @return Config
	 */
	public function getConfig() {
		return $this->config;
	}
}