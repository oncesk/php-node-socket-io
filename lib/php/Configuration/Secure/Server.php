<?php
namespace PhpNodeSocketIO\Configuration\Secure;

/**
 * Class Server
 *
 * @see http://nodejs.org/api/https.html
 * @see http://nodejs.org/api/tls.html#tls_tls_createserver_options_secureconnectionlistener
 *
 * @package PhpNodeSocketIO\Configuration\Secure
 */
class Server {

	/**
	 * @var array
	 */
	private static $validOptions = array(
		'pfx',
		'key',
		'passphrase',
		'cert',
		'ca',
		'crl',
		'ciphers',
		'handshakeTimeout',
		'honorCipherOrder',
		'requestCert',
		'rejectUnauthorized',
		'NPNProtocols',
		'SNICallback',
		'sessionIdContext',
		'secureProtocol'
	);

	/**
	 * @var array
	 */
	private $options = array();

	/**
	 * @see http://nodejs.org/api/tls.html#tls_tls_createserver_options_secureconnectionlistener
	 * @param $key
	 *
	 * @return $this
	 * @throws \Exception
	 */
	public function setKey($key) {
		if (!file_exists($key)) {
			throw new \Exception('Key file not exists!');
		}
		return $this->setOption('key', $key);
	}

	/**
	 * A string of passphrase for the private key or pfx.
	 *
	 * @see http://nodejs.org/api/tls.html#tls_tls_createserver_options_secureconnectionlistener
	 * @param string $passphrase
	 *
	 * @return $this
	 */
	public function setPassphrase($passphrase) {
		return $this->setOption('passphrase', $passphrase);
	}

	/**
	 * @param $cert
	 *
	 * @return $this
	 * @throws \Exception
	 */
	public function setCert($cert) {
		if (!file_exists($cert)) {
			throw new \Exception('Cert file not exists!');
		}
		return $this->setOption('cert', $cert);
	}

	/**
	 * Path to file which contains trusted certificates in PEM format.
	 * If this is omitted several well known "root" CAs will be used, like VeriSign.
	 * These are used to authorize connections.
	 *
	 * @param string $ca
	 * @return $this
	 *
	 * @throws \Exception
	 */
	public function setCA($ca) {
		if (!file_exists($ca)) {
			throw new \Exception('CA certificate not exists in ' . $ca);
		}
		return $this->setOption('ca', $ca);
	}

	/**
	 * @param string $key
	 * @param mixed $value
	 *
	 * @return $this
	 */
	public function setOption($key, $value) {
		if (in_array($key, self::$validOptions)) {
			$this->options[$key] = $value;
		}
		return $this;
	}

	/**
	 * In array format
	 *
	 * @return array
	 */
	public function toArray() {
		return $this->options;
	}

	/**
	 * In JSON format
	 *
	 * @return string
	 */
	public function toJSON() {
		return json_encode($this->toArray());
	}
}