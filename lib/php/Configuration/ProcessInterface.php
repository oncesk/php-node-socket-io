<?php
namespace PhpNodeSocketIO\Configuration;

/**
 * Class ProcessInterface
 * @package PhpNodeSocketIO\Configuration\Traits
 */
interface ProcessInterface {

	/**
	 * Pid file
	 *
	 * @return string
	 */
	public function getPidFile();

	/**
	 * @param string $file
	 *
	 * @return $this
	 */
	public function setPidFile($file);

	/**
	 * @return string
	 */
	public function getPHPLogFile();

	/**
	 * @param string $file
	 *
	 * @return $this
	 */
	public function setPHPLogFile($file);

	/**
	 * @param string $file
	 *
	 * @return $this
	 */
	public function setNODELogFile($file);

	/**
	 * @return string
	 */
	public function getNODELogFile();
}