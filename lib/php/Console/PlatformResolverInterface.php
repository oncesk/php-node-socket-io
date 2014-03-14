<?php
namespace PhpNodeSocketIO\Console;

/**
 * Interface PlatformResolverInterface
 * @package PhpNodeSocketIO\Console
 */
interface PlatformResolverInterface {

	/**
	 * Should return platform which defined in Platform class
	 *
	 * @return int const
	 */
	public function resolve();
}