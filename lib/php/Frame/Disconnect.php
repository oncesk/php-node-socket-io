<?php
namespace PhpNodeSocketIO\Frame;

use PhpNodeSocketIO\Traits\EndPointTrait;

/**
 * Class Disconnect
 * @package PhpNodeSocketIO\Frame
 */
class Disconnect implements FrameInterface {

	use EndPointTrait;

	/**
	 * @return string
	 */
	public function getId() {
		return '';
	}

	/**
	 * @return integer
	 */
	public function getType() {
		return Type::DISCONNECT;
	}

	/**
	 * @return string
	 */
	public function getData() {
		return '';
	}
}