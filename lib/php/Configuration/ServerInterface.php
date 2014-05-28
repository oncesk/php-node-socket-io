<?php
namespace PhpNodeSocketIO\Configuration;

use PhpNodeSocketIO\Configuration\ProcessInterface;

/**
 * Class ServerInterface
 * @package PhpNodeSocketIO\Configuration
 */
interface ServerInterface extends SecureInterface, ProcessInterface {

	/**
	 * @return mixed
	 */
	public function hasServerConfiguration();
}