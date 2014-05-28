<?php
namespace PhpNodeSocketIO\Traits;

/**
 * Class GenericEventName
 * @package PhpNodeSocketIO\Traits
 */
trait GenericEventName {

	use ObjectUtils;

	/**
	 * @return mixed
	 */
	public function getEventNamePrefix() {
		return '';
	}

	/**
	 * @return string
	 */
	protected function getEventName() {
		return $this->getEventNamePrefix() . $this->getClassName();
	}
}