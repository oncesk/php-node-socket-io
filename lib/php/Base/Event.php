<?php
namespace PhpNodeSocketIO\Base;

use PhpNodeSocketIO\Traits\GenericEventName;
use PhpNodeSocketIO\Traits\ObjectUtils;

/**
 * Class Event
 * @package PhpNodeSocketIO\Base
 */
class Event extends EventAbstract {

	use GenericEventName;
	use ObjectUtils;

	/**
	 * @param Object $sender
	 * @param null   $name
	 */
	public function __construct($sender, $name = null) {
		parent::__construct($sender, $name ? $name : $this->getEventName());
	}

	/**
	 * @return string
	 */
	public function getEventNamePrefix() {
		return $this->getClass($this->sender);
	}
}