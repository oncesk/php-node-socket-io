<?php
namespace PhpNodeSocketIO\Frame;

use PhpNodeSocketIO\Traits\EndPointTrait;
use PhpNodeSocketIO\Traits\IdTrait;

/**
 * Class Message
 * @package PhpNodeSocketIO\Frame
 */
class Message implements FrameInterface {

	use EndPointTrait;
	use IdTrait { setId as public; }

	/**
	 * @var string
	 */
	protected $data = '';

	public function __construct($data = null) {
		$this->setData($data);
	}

	/**
	 * @param $data
	 *
	 * @return $this
	 */
	public function setData($data) {
		if (is_string($data) || is_numeric($data)) {
			$this->data = (string) $data;
		} else if (is_array($data)) {
			$this->data = json_encode($data);
		}
		return $this;
	}

	/**
	 * @return string
	 */
	public function getData() {
		return $this->data;
	}

	/**
	 * @return integer
	 */
	public function getType() {
		return Type::MESSAGE;
	}
}