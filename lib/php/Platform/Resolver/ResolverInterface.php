<?php
namespace PhpNodeSocketIO\Platform\Resolver;

/**
 * Interface PlatformResolverInterface
 * @package PhpNodeSocketIO\Platform
 */
interface ResolverInterface {

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