<?php
namespace PhpNodeSocketIO\Configuration;

/**
 * Class Transport
 * @package PhpNodeSocketIO\Configuration
 */
class Transport {

	const TYPE_WS = 'websocket';
	const TYPE_FLASHSOCKET = 'flashsocket';
	const TYPE_HTMLFILE = 'htmlfile';
	const TYPE_XHR_POLLING = 'xhr-polling';
	const TYPE_JSONP_POLLING = 'jsonp-polling';

	/**
	 * @var int
	 */
	public $protocol = 1;

	/**
	 * @var string
	 */
	public $handshakeUrl = '%s://%s:%s/socket.io/%s';

	/**
	 * @var int miliseconds
	 */
	public $handshakeTimeout = 2000;

	/**
	 * @var array
	 */
	public static $classMap = array(
		self::TYPE_WS => '\PhpNodeSocketIO\Connection\Transport\WebSocket',
		self::TYPE_FLASHSOCKET => '\PhpNodeSocketIO\Connection\Transport\FlashSocket',
		self::TYPE_HTMLFILE => '\PhpNodeSocketIO\Connection\Transport\HtmlFile',
		self::TYPE_XHR_POLLING => '\PhpNodeSocketIO\Connection\Transport\XhrPolling',
		self::TYPE_JSONP_POLLING => '\PhpNodeSocketIO\Connection\Transport\JsonPPolling',
	);

	/**
	 * @var array
	 */
	protected $transports = array(
		self::TYPE_WS,
		self::TYPE_XHR_POLLING,
		self::TYPE_FLASHSOCKET,
		self::TYPE_HTMLFILE,
		self::TYPE_JSONP_POLLING
	);

	/**
	 * @param array $transports
	 *
	 * @return $this
	 */
	public function setTransports(array $transports) {
		$this->transports = $transports;
		return $this;
	}

	/**
	 * @return array
	 */
	public function getTransportList() {
		return $this->transports;
	}
}