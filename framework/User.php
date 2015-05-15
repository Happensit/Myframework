<?php
/**
 * Created by PhpStorm.
 * User: Happensit
 * Date: 24.02.2015
 * Time: 14:18
 */

class User extends Singleton{

  private $auth = array();
  static $accessStatus = array(0 => 'Разрешен', 1 => 'Заблокирован');
  static $groupName = array(1 => 'Администратор', 2 => 'Пользователь', 3 => 'Менеджер', 4 => 'Модератор');

  public function __construct() {
	// Если пользователь был авторизован, то присваиваем сохраненные данные.
	if (isset($_SESSION['user'])) {
	  if ($_SESSION['userAuthDomain'] == $_SERVER['SERVER_NAME']) {
		$this->auth = $_SESSION['user'];
	  }
	}
  }

  /**
   * Инициализирует объект данного класса User.
   * @return void
   */
  public static function init() {
	self::getInstance();
  }

  /**
   * Возвращает авторизированнго пользователя.
   * @return void
   */
//  public static function getUser() {
//	return self::$_instance->auth;
//  }

  /**
   * Получает все данные пользователя из БД по ID.
   * @param $id - пользователя.
   * @return void
   */
//  public static function getUserById($id) {
//	$result = false;
//	$res = DB::query('SELECT * FROM `'.PREFIX.'user` WHERE id = "%s"', $id);
//  }

}