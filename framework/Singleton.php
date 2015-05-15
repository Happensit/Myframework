<?php

/**
 * Created by PhpStorm.
 * User: Happensit
 * Date: 24.02.2015
 * Time: 14:12
 */

abstract class Singleton{
	/**
	 * @return Singleton
	 */

	final public static function getInstance()	{ // Возвращает единственный экземпляр класса. @return Singleton
		static $instance = null;

		if (null === $instance) {
			$instance = new static();
		}

		return $instance;
	}

	final protected function __clone() {} // Защищаем от создания через клонирование
	protected function __construct() {} // Защищаем от создания через new Singleton
  	protected function __wakeup() {}
}
