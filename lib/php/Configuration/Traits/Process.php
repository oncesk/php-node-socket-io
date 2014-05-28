<?php
namespace PhpNodeSocketIO\Configuration\Traits;

/**
 * Class Process
 * @package PhpNodeSocketIO\Configuration\Traits
 */
trait Process {

	/**
	 * @var string
	 */
	public $pidFile;

	/**
	 * @var string
	 */
	public $PHPLogFile;

	/**
	 * @var string
	 */
	public $NODELogFile;

	/**
	 * @param $file
	 *
	 * @return $this
	 */
	public function setPidFile($file) {
		$this->pidFile = $file;
		return $this;
	}

	public function getPidFile() {
		return $this->pidFile;
	}

	/**
	 * @param $file
	 *
	 * @return $this
	 */
	public function setPHPLogFile($file) {
		$this->PHPLogFile = $file;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getPHPLogFile() {
		return $this->PHPLogFile;
	}

	/**
	 * @param $file
	 *
	 * @return $this
	 */
	public function setNODELogFile($file) {
		$this->NODELogFile = $file;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getNODELogFile() {
		return $this->NODELogFile;
	}
}