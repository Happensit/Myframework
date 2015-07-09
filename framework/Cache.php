<?php

/**
 * Created by PhpStorm.
 * User: Happensit
 * Date: 24.02.2015
 * Time: 18:31
 */



class Cache {
	/**
	 * Directory to use for cache.
	 */
	public $dir = 'assets/cache';
	/**
	 * Constructor method creates the directory if it's missing.
	 */
	public function __construct ($dir = 'static/cache') {
		$this->dir = $dir;
		if (! file_exists ($this->dir)) {
			mkdir ($this->dir);
			chmod ($this->dir, 0777);
		}
	}

	public static function init ($dir) {
		return new Cache($dir);
	}

	private function _set_timeout ($key, $timeout) {
		if (file_put_contents ($this->dir . '/.' . md5 ($key), $timeout)) {
			chmod ($this->dir . '/.' . md5 ($key), 0777);
			return true;
		}
		return false;
	}

	/**
	 * Checks whether a key's timeout has expired. If it has, it
	 * also deletes the timeout dot-file.
	 */
	private function _has_timed_out ($key) {
		$timeout_file = $this->dir . '/.' . md5 ($key);
		if (! file_exists ($timeout_file)) {
			return false;
		}
		$timeout = file_get_contents ($timeout_file);
		$mtime = filemtime ($timeout_file);
		if ($mtime < time () - $timeout) {
			unlink ($timeout_file);
			return true;
		}
		return false;
	}


	public function cache ($key, $timeout, $function) {
		if (($val = $this->get ($key)) === false) {
			$val = $function ();
			$this->set ($key, $val, 0, $timeout);
		}
		return $val;
	}

	public function get ($key) {
		if (file_exists ($this->dir . '/' . md5 ($key))) {
			if ($this->_has_timed_out ($key)) {
				return false;
			}
			$val = file_get_contents ($this->dir . '/' . md5 ($key));
			if (preg_match ('/^(a|O):[0-9]+:/', $val)) {
				return unserialize ($val);
			}
			return $val;
		}
		return false;
	}

	public function add ($key, $val, $flags = 0, $timeout = false) {
		if (is_array ($val) || is_object ($val)) {
			$val = serialize ($val);
		}
		if (file_exists ($this->dir . '/' . md5 ($key))) {
			return false;
		}
		if (! file_put_contents ($this->dir . '/' . md5 ($key), $val)) {
			return false;
		}
		chmod ($this->dir . '/' . md5 ($key), 0777);
		if ($timeout) {
			$this->_set_timeout ($key, $timeout);
		}
		return true;
	}

	public function replace ($key, $val, $flags = 0, $timeout = false) {
		if (is_array ($val) || is_object ($val)) {
			$val = serialize ($val);
		}
		if (! file_put_contents ($this->dir . '/' . md5 ($key), $val)) {
			return false;
		}
		chmod ($this->dir . '/' . md5 ($key), 0777);
		if ($timeout) {
			$this->_set_timeout ($key, $timeout);
		}
		return true;
	}

	public function set ($key, $val, $flags = 0, $timeout = false) {
		if (is_array ($val) || is_object ($val)) {
			$val = serialize ($val);
		}
		if (! file_put_contents ($this->dir . '/' . md5 ($key), $val)) {
			return false;
		}
		chmod ($this->dir . '/' . md5 ($key), 0777);
		if ($timeout) {
			$this->_set_timeout ($key, $timeout);
		}
		return true;
	}

	public function increment ($key, $value = 1) {
		if (file_exists ($this->dir . '/' . md5 ($key))) {
			$val = file_get_contents ($this->dir . '/' . md5 ($key));
		} else {
			$val = 0;
		}
		$val += $value;
		if (! file_put_contents ($this->dir . '/' . md5 ($key), $val)) {
			return false;
		}
		chmod ($this->dir . '/' . md5 ($key), 0777);
		return $val;
	}

	public function decrement ($key, $value = 1) {
		if (file_exists ($this->dir . '/' . md5 ($key))) {
			$val = file_get_contents ($this->dir . '/' . md5 ($key));
		} else {
			$val = 0;
		}
		$val -= $value;
		if (! file_put_contents ($this->dir . '/' . md5 ($key), $val)) {
			return false;
		}
		chmod ($this->dir . '/' . md5 ($key), 0777);
		return $val;
	}

	public function flush () {
		$files = glob ($this->dir . '/{,.}*', GLOB_BRACE);
		foreach ($files as $file) {
			if (preg_match ('/\/\.+$/', $file)) {
				// Skip . and ..
				continue;
			}
			unlink ($file);
		}
		return true;
	}

	public function delete ($key) {
		$file = $this->dir . '/' . md5 ($key);
		if (file_exists ($file)) {
			return unlink ($this->dir . '/' . md5 ($key));
		}
		return true;
	}


}