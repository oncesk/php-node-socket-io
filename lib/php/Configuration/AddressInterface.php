<?php
namespace PhpNodeSocketIO\Configuration;

/**
 * Class AddressInterface
 * @package PhpNodeSocketIO\Configuration
 */
interface AddressInterface {

	/**
	 * @return string
	 */
	public function getHost();

	/**
	 * @return int
	 */
	public function getPort();

	/**
	 * @param string $host
	 *
	 * @return AddressInterface
	 */
	public function setHost($host);

	/**
	 * @param int $port
	 *
	 * @return AddressInterface
	 */
	public function setPort($port);
}