<?php
namespace PhpNodeSocketIO\Configuration;

/**
 * Class Config
 * @package PhpNodeSocketIO\Configuration
 */
class Config {

	/**
	 * Configuration id
	 *
	 * @var string
	 */
	private $id;

	/**
	 * @var string
	 */
	public $host;

	/**
	 * @var int
	 */
	public $port = 3001;

	/**
	 * File which will be contains process pid
	 *
	 * @var string
	 */
	public $pidFile;

	/**
	 * File which will be contains logs
	 *
	 * @var string
	 */
	public $logFile;

	/**
	 * @var Secure\Server
	 */
	protected $secureServer;

	/**
	 * @var Secure\Client
	 */
	protected $secureClient;

	/**
	 * @var Transport
	 */
	protected $transport;

	public function __construct($id) {
		if (!is_string($id) && !is_numeric($id)) {
			throw new \Exception('Configuration id should be string or integer');
		}
		$this->id = $id;
	}

	/**
	 * @return int|string
	 */
	final public function getId() {
		return $this->id;
	}

	/**
	 * Load config from configuration file in php format
	 *
	 * @param string $file
	 */
	final public function loadFromFile($file) {
		if (file_exists($file)) {
			include $file;
		}
	}

	/**
	 * @param Secure\Server $server
	 *
	 * @return $this
	 */
	public function setSecureServer(Secure\Server $server) {
		$this->secureServer = $server;
		return $this;
	}

	/**
	 * @return Secure\Server
	 */
	public function getSecureServer() {
		return $this->secureServer;
	}

	/**
	 * @param Secure\Client $client
	 *
	 * @return $this
	 */
	public function setSecureClient(Secure\Client $client) {
		$this->secureClient = $client;
		return $this;
	}

	/**
	 * @return Secure\Client
	 */
	public function getSecureClient() {
		return $this->secureClient;
	}

	/**
	 * @param Transport $transport
	 *
	 * @return $this
	 */
	public function setTransport(Transport $transport) {
		$this->transport = $transport;
		return $this;
	}

	/**
	 * @return Transport
	 */
	public function getTransport() {
		if ($this->transport === null) {
			$this->transport = new Transport();
		}
		return $this->transport;
	}
}