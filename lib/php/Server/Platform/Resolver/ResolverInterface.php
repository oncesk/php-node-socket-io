<?php
namespace PhpNodeSocketIO\Server\Platform\Resolver;

/**
 * Interface PlatformResolverInterface
 * @package PhpNodeSocketIO\Server\Platform
 */
interface ResolverInterface {

	/**
	 * Should return true if current resolver can create console
	 *
	 * @return boolean
	 */
	public function resolve();

	/**
	 * @return \PhpNodeSocketIO\Server\Console\ConsoleInterface
	 */
	public function createConsole();
}