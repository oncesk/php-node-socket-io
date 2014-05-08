<?php
namespace PhpNodeSocketIO\Frame;

use PhpNodeSocketIO\Traits\EndPointTrait;
use PhpNodeSocketIO\Traits\IdTrait;

/**
 * Class Event
 * @package PhpNodeSocketIO\Frame
 */
class Event implements FrameInterface {

	use EndPointTrait;
	use IdTrait { setId as public; }

	/**
	 * @var string
	 */
	protected $event;

	/**
	 * @var array
	 */
	protected $arguments = array();

	/**
	 * @param string $event
	 * @param array  $arguments
	 */
	public function __construct($event = '', array $arguments = array()) {
		$this->setEvent($event);
		$this->setArguments($arguments);
	}

	/**
	 * @param string $event
	 *
	 * @return $this
	 */
	public function setEvent($event) {
		if (is_string($event) || is_numeric($event)) {
			$this->event = (string) $event;
		}
		return $this;
	}

	/**
	 * @param array $arguments
	 *
	 * @return $this
	 */
	public function setArguments(array $arguments) {
		$this->arguments = $arguments;
		return $this;
	}

	/**
	 * @return integer
	 */
	public function getType() {
		return Type::EVENT;
	}

	/**
	 * @return string
	 */
	public function getData() {
		return json_encode(array(
			'name' => $this->event,
			'args' => $this->arguments
		));
	}
}