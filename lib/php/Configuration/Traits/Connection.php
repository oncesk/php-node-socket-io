<?php
namespace PhpNodeSocketIO\Configuration\Traits;

trait Connection {

	/**
	 * @var int 1 second
	 */
	public $handshakeTimeout = 1000;

	/**
	 * @var null|string
	 */
	public $origin = null;
}