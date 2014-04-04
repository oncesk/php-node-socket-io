<?php
namespace PhpNodeSocketIO\Server\Console;

/**
 * Class ConsoleInterface
 * @package PhpNodeSocketIO\Server\Console
 */
interface ConsoleInterface {

	/**
	 * Check if process with pid in progress
	 *
	 * @param $pid
	 *
	 * @return boolean
	 */
	public function isInProgress($pid);

	/**
	 * We need start server and write server logs into $logFile
	 *
	 * @param string $command
	 * @param string $logFile
	 *
	 * @return integer pid
	 */
	public function startServer($command, $logFile);

	/**
	 * We need to stop server
	 *
	 * @param integer|string $pid
	 */
	public function stopServer($pid);
}