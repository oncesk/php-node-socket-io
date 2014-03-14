<?php
namespace PhpNodeSocketIO\Console\Resolver;

use PhpNodeSocketIO\Console\PlatformResolverInterface;

/**
 * Class Windows
 * @package PhpNodeSocketIO\Console\Resolver
 */
class Windows implements PlatformResolverInterface {

	/**
	 * Should return true if current resolver can create console
	 *
	 * @return int const
	 */
	public function resolve() {
		return strpos(PHP_OS, 'WIN') !== false;
	}


}