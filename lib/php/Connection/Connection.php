<?php
namespace PhpNodeSocketIO\Connection;

use PhpNodeSocketIO\Frame\FrameInterface;

/**
 * Class Connection
 * @package PhpNodeSocketIO\Connection
 */
class Connection extends ConnectionAbstract {

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