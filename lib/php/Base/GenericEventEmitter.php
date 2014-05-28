<?php
namespace PhpNodeSocketIO\Base;

use PhpNodeSocketIO\Traits\EventEmitter;

/**
 * Class GenericEventEmitter
 * @package PhpNodeSocketIO\Base
 */
class GenericEventEmitter {

	use EventEmitter {emit as public;}
}