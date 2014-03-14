<?php
namespace PhpNodeSocketIO\Platform\Resolver;

use PhpNodeSocketIO\Platform\PlatformResolverInterface;

/**
 * Class Unix
 * @package PhpNodeSocketIO\Platform\Resolver
 */
class Unix implements PlatformResolverInterface {

	/**
	 * Should return true if current resolver can create console
	 *
	 * @return boolean
	 */
	public function resolve() {
		return !(strpos(PHP_OS, 'WIN') !== false);
	}

	/**
	 * @return \PhpNodeSocketIO\Console\ConsoleInterface
	 */
	public function createConsole() {
		return new \PhpNodeSocketIO\Console\Unix();
	}


}