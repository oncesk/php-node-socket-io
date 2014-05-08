<?php
namespace PhpNodeSocketIO\Connection\Transport;

use \PhpNodeSocketIO\Connection\Transport\Exception\HandshakeException;
use \PhpNodeSocketIO\Connection\Transport\Exception\ConnectException;
use PhpNodeSocketIO\Connection\ConnectionInterface;

/**
 * Class TransportInterface
 * @package PhpNodeSocketIO\Connection\Transport
 */
interface TransportInterface {

	/**
	 * @param ConnectionInterface $connection
	 *
	 * @return $this
	 */
	public function setConnection(ConnectionInterface $connection);

	/**
	 * @return ConnectionInterface
	 */
	public function getConnection();

	/**
	 * @return mixed
	 * @throws HandshakeException
	 */
	public function handshake();

	/**
	 * @return boolean
	 */
	public function isAlive();

	/**
	 * @return mixed
	 * @throws ConnectException
	 */
	public function connect();

	/**
	 * @return mixed
	 */
	public function close();

	/**
	 * @param string $data
	 *
	 * @return mixed
	 */
	public function send($data);
}