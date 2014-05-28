<?php
namespace PhpNodeSocketIO\Traits;

use PhpNodeSocketIO\Base\EventAbstract;
use PhpNodeSocketIO\Base\GlobalEventEmitter;

/**
 * Class EventEmitter
 * @package PhpNodeSocketIO\Traits
 */
trait EventEmitter {

	/**
	 * @var EventAbstract[]
	 */
	protected $events = array();

	/**
	 * @param string $event
	 * @param callable|\Closure $callback
	 * @param mixed|null $context
	 *
	 * @return $this
	 */
	public function on($event, $callback, $context = null) {
		return $this->attachEventListener($event, $callback, $context);
	}

	/**
	 * @param string $event
	 * @param callable|\Closure $callback
	 * @param mixed|null $context
	 *
	 * @return $this
	 */
	public function attachEventListener($event, $callback, $context = null) {
		if (!array_key_exists($event, $this->events)) {
			$this->events[$event] = array();
		}
		if ($callback instanceof \Closure || is_callable($callback)) {
			$this->events[$event][] = array(
				'cb' => $callback,
				'context' => $context
			);
		}
		return $this;
	}

	/**
	 * @param string $event
	 *
	 * @return bool
	 */
	public function hasEvent($event) {
		return array_key_exists($event, $this->events);
	}

	/**
	 * @param $event
	 *
	 * @return array|EventAbstract
	 */
	public function getListeners($event) {
		if ($this->hasEvent($event)) {
			return $this->events[$event];
		}
		return array();
	}

	/**
	 * @param EventAbstract $event
	 *
	 * @return $this
	 */
	protected function emit(EventAbstract $event) {
		if ($this->hasEvent($event->getName())) {
			foreach ($this->getListeners($event->getName()) as $ev) {
				call_user_func($ev['cb'], $event, $ev['context'], $this);
				if ($event->isPropagationStopped()) {
					break;
				}
			}
			$event->setAsSent();
		}
		return $this;
	}

	/**
	 * @param EventAbstract $event
	 *
	 * @return $this
	 */
	protected function emitGlobal(EventAbstract $event) {
		if ($event->isSent() || $event->isPropagationStopped()) {
			$event = clone $event;
		}
		GlobalEventEmitter::getInstance()->emit($event);
		return $this;
	}
}