<?php
namespace PhpNodeSocketIO\Traits;

/**
 * Class ObjectUtils
 * @package PhpNodeSocketIO\Traits
 */
trait ObjectUtils {

	/**
	 * Return current class short name, without namespaces
	 *
	 * @return string
	 */
	public function getClassName() {
		return $this->getClass($this);
	}

	/**
	 * @param $obj
	 *
	 * @return string
	 */
	public function getClass($obj) {
		if (is_object($obj)) {
			$class = explode('\\', get_class($obj));
			return array_pop($class);
		}
		return '';
	}
}