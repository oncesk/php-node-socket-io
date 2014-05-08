<?php
namespace PhpNodeSocketIO\Configuration\Secure;

/**
 * Class Client
 * @package PhpNodeSocketIO\Configuration\Secure
 */
class Client {

	/**
	 * @var \Closure|callable
	 */
	private $callback;

	/**
	 * @param $curlConfigurationCallback
	 * @throws \Exception
	 */
	public function __construct($curlConfigurationCallback) {
		if (is_callable($curlConfigurationCallback) || $curlConfigurationCallback instanceof \Closure) {
			$this->callback = $curlConfigurationCallback;
		} else {
			throw new \Exception('Invalid callable');
		}
	}

	/**
	 * @param resource $curlResource
	 */
	public function invoke($curlResource) {
		if (is_resource($curlResource)) {
			call_user_func($this->callback, $curlResource, $this);
		}
	}
}