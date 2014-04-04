<?php
namespace PhpNodeSocketIO\Server\Platform\Resolver;

/**
 * Class Unix
 * @package PhpNodeSocketIO\Server\Platform\Resolver
 */
class Unix implements ResolverInterface {

	/**
	 * Should return true if current resolver can create console
	 *
	 * @return boolean
	 */
	public function resolve() {
		return !(strpos(PHP_OS, 'WIN') !== false);
	}

	/**
	 * @return \PhpNodeSocketIO\Server\Console\ConsoleInterface
	 */
	public function createConsole() {
		return new \PhpNodeSocketIO\Server\Console\Unix();
	}
}