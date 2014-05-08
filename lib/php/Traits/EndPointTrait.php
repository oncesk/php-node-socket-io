<?php
namespace PhpNodeSocketIO\Traits;

/**
 * Class EndPointTrait
 * @package PhpNodeSocketIO\Traits
 */
trait EndPointTrait {

	/**
	 * @var string
	 */
	protected $endPoint = '';

	/**
	 * @param string $endPoint
	 *
	 * @return $this
	 */
	public function setEndPoint($endPoint) {
		if (is_string($endPoint) || is_numeric($endPoint)) {
			$this->endPoint = $endPoint;
		}
		return $this;
	}

	/**
	 * @return string
	 */
	public function getEndPoint() {
		return $this->endPoint;
	}
}