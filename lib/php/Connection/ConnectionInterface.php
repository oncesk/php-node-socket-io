<?php
namespace PhpNodeSocketIO\Connection;

use PhpNodeSocketIO\Configuration\Config;
use PhpNodeSocketIO\Connection\Transport\Exception\ConnectException;
use PhpNodeSocketIO\Connection\Transport\Exception\HandshakeException;
use PhpNodeSocketIO\Connection\Transport\TransportInterface;
use PhpNodeSocketIO\Frame\FrameInterface;

/**
 * Class ConnectionInterface
 * @package PhpNodeSocketIO\Connection
 */
interface ConnectionInterface {

	/**
	 * @return TransportInterface
	 */
	public function getTransport();

	/**
	 *
	 * @throws HandshakeException
	 * @throws ConnectException
	 *
	 * @return bool
	 */
	public function connect();

	/**
	 * @return bool
	 */
	public function disconnect();

	/**
	 * @return boolean
	 */
	public function isAlive();

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