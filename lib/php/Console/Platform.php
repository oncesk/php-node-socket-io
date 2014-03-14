<?php
namespace PhpNodeSocketIO\Console;

/**
 * Class Platform
 * @package PhpNodeSocketIO\Console
 */
class Platform {

	/**
	 * @var PlatformResolverInterface[]
	 */
	private static $_availableResolvers = array();

	/**
	 * @var ConsoleInterface
	 */
	private static $_console;

	/**
	 * @param PlatformResolverInterface $resolver
	 */
	public static function addResolver(PlatformResolverInterface $resolver) {
		self::$_availableResolvers[] = $resolver;
	}

	public static function getConsole() {
		if (self::$_console) {
			return self::$_console;
		}
		foreach (self::$_availableResolvers as $resolver) {

		}
	}
}