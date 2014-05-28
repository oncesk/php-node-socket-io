<?php
namespace PhpNodeSocketIO\Base;

/**
 * Class EventAbstract
 * @package PhpNodeSocketIO\Base
 */
abstract class EventAbstract extends Object {

	/**
	 * @var mixed
	 */
	protected $sender;

	/**
	 * @var string
	 */
	protected $name;

	/**
	 * @var bool
	 */
	protected $isPropagationStopped = false;

	/**
	 * @var bool
	 */
	protected $isSent = false;

	/**
	 * @var mixed
	 */
	protected $data;

	/**
	 * @var GenericEventEmitter
	 */
	protected static $globalEventEmitter;

	/**
	 * @param string $event
	 * @param callable|\Closure $callback
	 *
	 * @return GenericEventEmitter
	 */
	public static function on($event, $callback) {
		return self::getEventEmitter()->on($event, $callback);
	}

	/**
	 * @param EventAbstract $event
	 */
	public static function emit(EventAbstract $event) {
		self::getEventEmitter()->emit($event);
	}

	/**
	 * @return GenericEventEmitter
	 */
	protected static function getEventEmitter() {
		if (self::$globalEventEmitter) {
			return self::$globalEventEmitter;
		}
		return self::$globalEventEmitter = new GenericEventEmitter();
	}

	public function __construct($sender, $name = null) {
		$this->sender = $sender;
		$this->setName($name);
	}

	/**
	 * @return mixed
	 */
	public function getSender() {
		return $this->sender;
	}

	/**
	 * @param string $name
	 *
	 * @return $this
	 */
	public function setName($name) {
		if ($name !== null) {
			$this->name = $name;
		}
		return $this;
	}

	/**
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * @param $data
	 *
	 * @return $this
	 */
	public function setData($data) {
		$this->data = $data;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getData() {
		return $this->data;
	}

	/**
	 * Stop propagation
	 */
	public function stopPropagation() {
		$this->isPropagationStopped = true;
	}

	/**
	 * @return bool
	 */
	public function isPropagationStopped() {
		return $this->isPropagationStopped;
	}

	/**
	 * @return $this
	 */
	public function setAsSent() {
		$this->isSent = true;
		return $this;
	}

	/**
	 * @return bool
	 */
	public function isSent() {
		return $this->isSent;
	}

	public function __clone() {
		$this->isPropagationStopped = false;
		$this->isSent = false;
	}
}