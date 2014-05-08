<?php
namespace PhpNodeSocketIO\Connection;

use PhpNodeSocketIO\Configuration\Config;
use PhpNodeSocketIO\Connection\Transport\TransportInterface;
use PhpNodeSocketIO\Frame\FrameInterface;

/**
 * Class ConnectionInterface
 * @package PhpNodeSocketIO\Connection
 */
interface ConnectionInterface {

	/**
	 * @return bool
	 */
	public function connect();

	/**
	 * @return bool
	 */
	public function disconnect();

	/**
	 * @param FrameInterface $frame
	 *
	 * @return mixed
	 */
	public function sendFrame(FrameInterface $frame);

	/**
	 * @return Config
	 */
	public function getConfig();
}