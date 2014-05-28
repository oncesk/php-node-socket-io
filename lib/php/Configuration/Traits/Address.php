<?php
namespace PhpNodeSocketIO\Configuration\Traits;

/**
 * Class Address
 * @package PhpNodeSocketIO\Configuration\Traits
 */
trait Address {

	/**
	 * @var string
	 */
	protected $host;

	/**
	 * @var int
	 */
	protected $port;

	/**
	 * @return string
	 */
	public function getHost() {
		return $this->host;
	}

	/**
	 * @param string $host
	 *
	 * @return $this
	 */
	public function setHost($host) {
		if (is_string($host) && !empty($host)) {
			$this->host = $host;
		}
		return $this;
	}

	/**
	 * @return int
	 */
	public function getPort() {
		return $this->port;
	}

	/**
	 * @param int|string $port
	 *
	 * @return $this
	 */
	public function setPort($port) {
		if (!empty($port) && is_numeric($port)) {
			$this->port = (int) $port;
		}
		return $this;
	}
}