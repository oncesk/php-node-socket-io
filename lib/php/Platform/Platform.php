<?php
namespace PhpNodeSocketIO;

use PhpNodeSocketIO\Exception\InvalidConsoleException;
use PhpNodeSocketIO\Exception\UndefinedPlatformException;
use PhpNodeSocketIO\Platform\Resolver\ResolverInterface;

/**
 * Class Platform
 * @package PhpNodeSocketIO\Console
 */
class Platform {

	/**
	 * @var ResolverInterface[]
	 */
	private static $_availableResolvers = array();

	/**
	 * @var Console\ConsoleInterface
	 */
	private static $_console;

	/**
	 * @param ResolverInterface $resolver
	 */
	public static function addResolver(ResolverInterface $resolver) {
		self::$_availableResolvers[] = $resolver;
	}

	/**
	 * @return Console\ConsoleInterface
	 *
	 * @throws \PhpNodeSocketIO\Exception\InvalidConsoleException
	 * @throws \PhpNodeSocketIO\Exception\UndefinedPlatformException
	 */
	public static function getConsole() {
		if (self::$_console) {
			return self::$_console;
		}
		return self::$_console = self::_createConsole();
	}

	/**
	 * @return Console\ConsoleInterface
	 * @throws \PhpNodeSocketIO\Exception\InvalidConsoleException
	 * @throws \PhpNodeSocketIO\Exception\UndefinedPlatformException
	 */
	private static function _createConsole() {
		foreach (self::$_availableResolvers as $resolver) {
			if ($resolver->resolve()) {
				$console = $resolver->createConsole();
				if ($console instanceof Console\ConsoleInterface) {
					return $console;
				}
				throw new InvalidConsoleException('Console should be instance of ConsoleInterface');
			}
		}
		throw new UndefinedPlatformException('Platform is undefined, can not create console!');
	}
}