<?php
namespace PhpNodeSocketIO\Platform\Resolver;

/**
 * Class Windows
 * @package PhpNodeSocketIO\Console\Resolver
 */
class Windows implements ResolverInterface {

	/**
	 * Should return true if current resolver can create console
	 *
	 * @return boolean
	 */
	public function resolve() {
		return strpos(PHP_OS, 'WIN') !== false;
	}

	/**
	 * @return \PhpNodeSocketIO\Console\ConsoleInterface
	 */
	public function createConsole() {
		return new \PhpNodeSocketIO\Console\Windows();
	}
}