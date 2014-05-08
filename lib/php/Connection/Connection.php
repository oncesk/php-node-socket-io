<?php
namespace PhpNodeSocketIO\Connection;

use PhpNodeSocketIO\Connection\Transport\Exception\ConnectException;
use PhpNodeSocketIO\Connection\Transport\Exception\HandshakeException;
use PhpNodeSocketIO\Connection\Transport\TransportInterface;
use PhpNodeSocketIO\Frame\FrameInterface;

/**
 * Class Connection
 * @package PhpNodeSocketIO\Connection
 */
class Connection extends ConnectionAbstract {

	/**
	 * @var TransportInterface
	 */
	private $transport;

	public function __construct(TransportInterface $transport) {
		$this->transport = $transport;
	}

	/**
	 * @return bool
	 */
	public function connect() {
		if ($this->transport->isAlive()) {
			return true;
		}
		try {
			$this->transport->handshake();
			$this->transport->connect();
		} catch (HandshakeException $e) {
			return false;
		} catch (ConnectException $e) {
			return false;
		}
		return true;
	}

	/**
	 * @return bool
	 */
	public function disconnect() {
		return $this->transport->close();
	}

	/**
	 * @param FrameInterface $frame
	 *
	 * @return mixed
	 * @throws \RuntimeException
	 */
	public function sendFrame(FrameInterface $frame) {
		if ($this->connect()) {
			return $this->transport->send($this->formatFrame($frame));
		}
		throw new \RuntimeException('Can not connect to server with transport: ' . get_class($this->transport));
	}

	/**
	 * @param FrameInterface $frame
	 *
	 * @return string
	 */
	protected function formatFrame(FrameInterface $frame) {
		return sprintf(
			'%s:%s:%s:%s',
			$frame->getType(),
			$frame->getId(),
			$frame->getEndPoint(),
			$frame->getData()
		);
	}
}