<?php
namespace PhpNodeSocketIO\Console;

/**
 * Interface PlatformResolverInterface
 * @package PhpNodeSocketIO\Console
 */
interface PlatformResolverInterface {

	/**
	 * Should return true if current resolver can create console
	 *
	 * @return int const
	 */
	public function resolve();

	/**
	 * @return ConsoleInterface
	 */
	public function createConsole();
}