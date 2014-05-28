<?php
namespace PhpNodeSocketIO\Connection;

use PhpNodeSocketIO\Base\Event;
use PhpNodeSocketIO\Connection\Transport\Exception\ConnectException;
use PhpNodeSocketIO\Connection\Transport\Exception\HandshakeException;
use PhpNodeSocketIO\Connection\Transport\TransportInterface;
use PhpNodeSocketIO\Frame\FrameInterface;
use PhpNodeSocketIO\Traits\EventEmitter;

/**
 * Class EventDecorator
 * @package PhpNodeSocketIO\Connection
 */
class EventDecorator implements ConnectionInterface {

	use EventEmitter;

	/**
	 * @var ConnectionInterface
	 */
	private $connection;

	public function __construct(ConnectionInterface $connection) {
		$this->connection = $connection;
	}

	/**
	 * @return TransportInterface
	 */
	public function getTransport() {
		return $this->connection->getTransport();
	}

	/**
	 *
	 * @throws HandshakeException
	 * @throws ConnectException
	 *
	 * @return bool
	 */
	public function connect() {
		$this->emitEvent('BeforeConnect');

		$this->connection->connect();

		$this->emitEvent('AfterConnect');
	}

	/**
	 * @return bool
	 */
	public function disconnect() {
		$this->emitEvent('BeforeDisconnect');

		$return = $this->connection->disconnect();

		$this->emitEvent('AfterDisconnect');
		return $return;
	}

	/**
	 * @return boolean
	 */
	public function isAlive() {
		return $this->connection->isAlive();
	}

	/**
	 * @param FrameInterface $frame
	 *
	 * @return mixed
	 */
	public function sendFrame(FrameInterface $frame) {
		$this->emitEvent('BeforeSendFrame', $frame);

		$return = $this->connection->sendFrame($frame);

		$this->emitEvent('AfterSendFrame', $frame);
		return $return;
	}

	/**
	 * @return Config
	 */
	public function getConfig() {
		return $this->connection->getConfig();
	}


	/**
	 * @param string $name
	 * @param null   $data
	 */
	private function emitEvent($name, $data = null) {
		$event = new Event($this->connection, 'Connection.' . $name);
		if ($data) {
			$event->setData($data);
		}
		$this->emit($event)->emitGlobal($event);
	}
}