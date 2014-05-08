<?php
namespace PhpNodeSocketIO\Frame;

/**
 * Class JSONMessage
 * @package PhpNodeSocketIO\Frame
 */
class JSONMessage extends Message {

	/**
	 * @return int
	 */
	public function getType() {
		return Type::JSON_MESSAGE;
	}
}