<?php
/**
 * Created by JetBrains PhpStorm.
 * User: once
 * Date: 4/30/14
 * Time: 12:38 AM
 * To change this template use File | Settings | File Templates.
 */

namespace PhpNodeSocketIO\Frame;

/**
 * Class Type
 *
 * @see https://github.com/LearnBoost/socket.io-spec
 * @package PhpNodeSocketIO\Frame
 */
class Type {

	/**
	 * Only used for multiple sockets. Signals a connection to the endpoint. Once the server receives it, it's echoed back to the client.
	 *
	 * Example, if the client is trying to connect to the endpoint /test, a message like this will be delivered:
	 * '1::' [path] [query]
	 *
	 * 1::/test?my=param
	 */
	const CONNECT = 1;

	/**
	 * Signals disconnection. If no endpoint is specified, disconnects the entire socket.
	 *
	 * 0::/test - Disconnect a socket connected to the /test endpoint.
	 * 0 - Disconnect the whole socket
	 */
	const DISCONNECT = 0;

	/**
	 *
	 */
	const HEARTBEAT = 2;

	/**
	 *
	 */
	const MESSAGE = 3;

	/**
	 * JSON Message
	 * '4:' [message id ('+')] ':' [message endpoint] ':' [json]
	 *
	 * A JSON encoded message.
	 * 4:1::{"a":"b"}
	 */
	const JSON_MESSAGE = 4;

	/**
	 * Event
	 *
	 * '5:' [message id ('+')] ':' [message endpoint] ':' [json encoded event]
	 *
	 * An event is like a json message, but has mandatory name and args fields. name is a string and args an array.
	 */
	const EVENT = 5;

	/**
	 *
	 */
	const ACK = 6;

	/**
	 * '7::' [endpoint] ':' [reason] '+' [advice]
	 *
	 * For example, if a connection to a sub-socket is unauthorized.
	 */
	const ERROR = 7;

	/**
	 * No operation. Used for example to close a poll after the polling duration times out.
	 */
	const NOOP = 8;
}