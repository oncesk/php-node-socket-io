<?php
namespace PhpNodeSocketIO\Frame;

/**
 * Class FrameInterface
 * @package PhpNodeSocketIO\Frame
 */
interface FrameInterface {

	/**
	 * @return string
	 */
	public function getId();

	/**
	 * @return integer
	 */
	public function getType();

	/**
	 * @return string
	 */
	public function getEndPoint();

	/**
	 * @return string
	 */
	public function getData();
}