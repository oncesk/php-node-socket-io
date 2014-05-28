<?php
namespace PhpNodeSocketIO\Connection\Transport;

use PhpNodeSocketIO\Base\Event;
use PhpNodeSocketIO\Base\GlobalEventEmitter;
use PhpNodeSocketIO\Connection\ConnectionInterface;
use PhpNodeSocketIO\Connection\Transport\Exception\ConnectException;
use PhpNodeSocketIO\Connection\Transport\Exception\HandshakeException;
use PhpNodeSocketIO\Traits\EventEmitter;

/**
 * Class EventDecorator
 * @package PhpNodeSocketIO\Connection\Transport
 */
class EventDecorator implements TransportInterface {

	use EventEmitter;

	/**
	 * @var Transport
	 */
	private $transport;

	/**
	 * @param Transport $transport
	 */
	public function __construct(Transport $transport) {
		$this->transport = $transport;
	}

	/**
	 * @return boolean
	 */
	public function isAlive() {
		return $this->transport->isAlive();
	}

	/**
	 * @param string $data
	 *
	 * @return mixed
	 */
	public function send($data) {
		$this->emitEvent('BeforeSend', $data);

		return $this->transport->send($data);
	}

	/**
	 * @return mixed
	 * @throws ConnectException
	 */
	public function connect() {
		$this->emitEvent('BeforeConnect');

		$this->transport->connect();

		$this->emitEvent('AfterConnect');
	}


	/**
	 * @return mixed
	 */
	public function close() {
		$this->emitEvent('BeforeClose');

		$this->transport->close();

		$this->emitEvent('AfterClose');
	}

	/**
	 * @return mixed
	 * @throws HandshakeException
	 */
	public function handshake() {
		$this->emitEvent('BeforeHandshake');

		$this->transport->handshake();

		$this->emitEvent('AfterHandshake');
	}

	/**
	 * @return ConnectionInterface
	 */
	public function getConnection() {
		return $this->transport->getConnection();
	}

	/**
	 * @param ConnectionInterface $connection
	 *
	 * @return $this
	 */
	public function setConnection(ConnectionInterface $connection) {
		$this->transport->setConnection($connection);
		return $this;
	}

	/**
	 * @param string $name
	 * @param null   $data
	 */
	private function emitEvent($name, $data = null) {
		$event = new Event($this->transport, 'Transport.' . $name);
		if ($data) {
			$event->setData($data);
		}
		$this->emit($event)->emitGlobal($event);
	}
}