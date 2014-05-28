<?php
namespace PhpNodeSocketIO\Configuration;

use PhpNodeSocketIO\Configuration\AddressInterface;
use PhpNodeSocketIO\Configuration\SecureInterface;

interface ConfigInterface extends AddressInterface, SecureInterface {}