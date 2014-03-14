<?php
namespace PhpNodeSocketIO\Console;

/**
 * Class PlatformResolver
 * @package PhpNodeSocketIO\Console
 */
class PlatformResolver implements PlatformResolverInterface {

	/**
	 * Should return platform which defined in Platform class
	 *
	 * @return int const
	 */
	public function resolve() {
		if (strpos(PHP_OS, 'WIN') !== false) {
			return Platform::WINDOWS;
		} else {
			return Platform::UNIX;
		}
	}
}