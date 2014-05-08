<?php
namespace PhpNodeSocketIO\Frame;

use PhpNodeSocketIO\Traits\EndPointTrait;

/**
 * Class Connect
 * @package PhpNodeSocketIO\Frame
 */
class Connect implements FrameInterface {

	use EndPointTrait;

	/**
	 * @var array
	 */
	public $query = array();

	/**
	 * @param string $endPoint
	 * @param array  $query
	 */
	public function __construct($endPoint = '', array $query = array()) {
		$this->setEndPoint($endPoint);
		$this->query = $query;
	}

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
		return Type::CONNECT;
	}

	/**
	 * @return string
	 */
	public function getEndPoint() {
		return '';
	}

	/**
	 * @return string
	 */
	public function getData() {
		if ($this->endPoint) {
			return '/' . $this->endPoint . (!empty($this->query) ? '?' . http_build_query($this->query) : '');
		}
		return '';
	}
}