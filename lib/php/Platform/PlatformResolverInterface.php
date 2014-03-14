<?php
namespace PhpNodeSocketIO\Platform;

/**
 * Interface PlatformResolverInterface
 * @package PhpNodeSocketIO\Platform
 */
interface PlatformResolverInterface {

	/**
	 * Should return true if current resolver can create console
	 *
	 * @return boolean
	 */
	public function resolve();

	/**
	 * @return \PhpNodeSocketIO\Console\ConsoleInterface
	 */
	public function createConsole();
}