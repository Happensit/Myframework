<?php

/**
 * Created by PhpStorm.
 * User: Happensit
 * Date: 24.02.2015
 * Time: 14:05
 */
class Model
{

  private $db;
  public $variables;

  public function __construct($data = array()) {
    $this->db = new Db();
    $this->variables = $data;
  }

  public function __set($name, $value) {
    if (strtolower($name) === $this->pk) {
      $this->variables[$this->pk] = $value;
    }
    else {
      $this->variables[$name] = $value;
    }
  }

  public function __get($name) {
    if (is_array($this->variables)) {
      if (array_key_exists($name, $this->variables)) {
        return $this->variables[$name];
      }
    }
    $trace = debug_backtrace();
    trigger_error(
      'Undefined property via __get(): ' . $name .
      ' in ' . $trace[0]['file'] .
      ' on line ' . $trace[0]['line'],
      E_USER_NOTICE);
    return NULL;
  }

  public function save($id = "0") {
    $this->variables[$this->pk] = (empty($this->variables[$this->pk])) ? $id : $this->variables[$this->pk];
    $fieldsvals = '';
    $columns = array_keys($this->variables);
    foreach($columns as $column)
    {
      if($column !== $this->pk)
        $fieldsvals .= $column . " = :". $column . ",";
    }
    $fieldsvals = substr_replace($fieldsvals , '', -1);
    if(count($columns) > 1 ) {
      $sql = "UPDATE " . $this->table . " SET " . $fieldsvals . " WHERE " . $this->pk . "= :" . $this->pk;
      return $this->db->query($sql,$this->variables);
    }
  }

  public function create() {
    $bindings = $this->variables;
    if(!empty($bindings)) {
      $fields = array_keys($bindings);
      $fieldsvals = array(implode(",",$fields),":" . implode(",:",$fields));
      $sql = "INSERT INTO ".$this->table." (".$fieldsvals[0].") VALUES (".$fieldsvals[1].")";
    }
    else {
      $sql = "INSERT INTO ".$this->table." () VALUES ()";
    }
    return $this->db->query($sql,$bindings);
  }

  public function delete($id = "") {
    $id = (empty($this->variables[$this->pk])) ? $id : $this->variables[$this->pk];
    if(!empty($id)) {
      $sql = "DELETE FROM " . $this->table . " WHERE " . $this->pk . "= :" . $this->pk. " LIMIT 1" ;
      return $this->db->query($sql,array($this->pk=>$id));
    }
  }

  public function findByid($id = "") {
    $id = (empty($this->variables[$this->pk])) ? $id : $this->variables[$this->pk];
    if(!empty($id)) {
      $sql = "SELECT * FROM " . $this->table ." WHERE " . $this->pk . "= :" . $this->pk . " LIMIT 1";
      return $this->db->row($sql,array($this->pk=>$id));
    }
  }

  public function findAll(){
    $query = "SELECT * FROM " . $this->table;
    return $this->db->query($query, array(':limit' => 0, ':offset' => 10));
  }

  public function min($field) {
    if($field)
      return $this->db->single("SELECT min(" . $field . ")" . " FROM " . $this->table);
  }

  public function max($field) {
    if($field)
      return $this->db->single("SELECT max(" . $field . ")" . " FROM " . $this->table);
  }

  public function avg($field) {
    if($field)
      return $this->db->single("SELECT avg(" . $field . ")" . " FROM " . $this->table);
  }

  public function sum($field) {
    if($field)
      return $this->db->single("SELECT sum(" . $field . ")" . " FROM " . $this->table);
  }

  public function count($field) {
    if($field)
      return $this->db->single("SELECT count(" . $field . ")" . " FROM " . $this->table);
  }
}