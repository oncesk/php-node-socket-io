<?php
namespace PhpNodeSocketIO\Traits;

/**
 * Class IdTrait
 * @package PhpNodeSocketIO\Traits
 */
trait IdTrait {

	/**
	 * @var string|integer
	 */
	protected $id;

	/**
	 * @return int|string
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @param $id
	 *
	 * @return $this
	 */
	protected function setId($id) {
		$this->id = $id;
		return $this;
	}
}