<?php

/**
 * @Database.php
 * Created by happensit for MyFramework.
 * Date: 24.03.15
 * Time: 1:48
 */
class Db
{
    private $pdo;
    private $sQuery;
    private $bConnected = false;
    private $parameters;

    /**
     * Default Constructor
     *
     * 1. Instantiate Log class.
     * 2. Connect to database.
     * 3. Creates the parameter array.
     */
    public function __construct()
    {
        $this->Connect();
        $this->parameters = array();
    }

    /**
     * This method makes connection to the database.
     *
     * 1. Reads the database settings from a ini file.
     * 2. Puts the ini content into the settings array.
     * 3. Tries to connect to the database.
     * 4. If connection failed, exception is displayed and a log file gets created.
     */
    private function Connect()
    {
        $dsn = 'mysql:dbname='.Config::get('DbName').';host='.Config::get('DbHost').'';
        try {
            $this->pdo = new PDO($dsn,
              Config::get('DbUser'),
              Config::get('DbPass'),
              array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
            );
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $this->bConnected = true;
        } catch (PDOException $e) {
            exit('Database connection could not be established. ;(');
        }
    }

    /*
  * You can use this little method if you want to close the PDO connection
  *
  */
    public function CloseConnection()
    {
# Set the PDO object to null to close the connection
# http://www.php.net/manual/en/pdo.connections.php
        $this->pdo = null;
    }

    /**
     * Every method which needs to execute a SQL query uses this method.
     *
     * 1. If not connected, connect to the database.
     * 2. Prepare Query.
     * 3. Parameterize Query.
     * 4. Execute Query.
     * 5. On exception : Write Exception into the log + SQL query.
     * 6. Reset the Parameters.
     */
    private function Init($query, $parameters = "")
    {
# Connect to database
        if (!$this->bConnected) {
            $this->Connect();
        }
        try {
# Prepare query
            $this->sQuery = $this->pdo->prepare($query);
# Add parameters to the parameter array
            $this->bindMore($parameters);
# Bind parameters
            if (!empty($this->parameters)) {
                foreach ($this->parameters as $param) {
                    $parameters = explode("\x7F", $param);
                    $this->sQuery->bindParam($parameters[0], $parameters[1]);
                }
            }
# Execute SQL
            $this->succes = $this->sQuery->execute();
        } catch (PDOException $e) {
# Write into log and display Exception
            echo $e->getMessage();
            die();
        }
# Reset the parameters
        $this->parameters = array();
    }

    /**
     * @void
     *
     * Add the parameter to the parameter array
     * @param string $para
     * @param string $value
     */
    public function bind($para, $value)
    {
        $this->parameters[sizeof(
          $this->parameters
        )] = ":".$para."\x7F".utf8_encode($value);
    }

    /**
     * @void
     *
     * Add more parameters to the parameter array
     * @param array $parray
     */
    public function bindMore($parray)
    {
        if (empty($this->parameters) && is_array($parray)) {
            $columns = array_keys($parray);
            foreach ($columns as $i => &$column) {
                $this->bind($column, $parray[$column]);
            }
        }
    }

    /**
     * If the SQL query contains a SELECT or SHOW statement it returns an array containing all of the result set row
     * If the SQL statement is a DELETE, INSERT, or UPDATE statement it returns the number of affected rows
     *
     * @param string $query
     * @param array $params
     * @param int $fetchmode
     * @return mixed
     */
    public function query($query, $params = null, $fetchmode = PDO::FETCH_ASSOC)
    {
        $query = trim($query);
        $this->Init($query, $params);
        $rawStatement = explode(" ", $query);
        $statement = strtolower($rawStatement[0]);
        if ($statement === 'select' || $statement === 'show') {
            return $this->sQuery->fetchAll($fetchmode);
        } elseif ($statement === 'insert' || $statement === 'update' || $statement === 'delete') {
            return $this->sQuery->rowCount();
        } else {
            return null;
        }
    }

    /**
     * Returns the last inserted id.
     * @return string
     */
    public function lastInsertId()
    {
        return $this->pdo->lastInsertId();
    }

    /**
     * Returns an array which represents a column from the result set
     *
     * @param string $query
     * @param array $params
     * @return array
     */
    public function column($query, $params = null)
    {
        $this->Init($query, $params);
        $Columns = $this->sQuery->fetchAll(PDO::FETCH_NUM);
        $column = null;
        foreach ($Columns as $cells) {
            $column[] = $cells[0];
        }

        return $column;
    }

    /**
     * Returns an array which represents a row from the result set
     *
     * @param string $query
     * @param array $params
     * @param int $fetchmode
     * @return array
     */
    public function row($query, $params = null, $fetchmode = PDO::FETCH_ASSOC)
    {
        $this->Init($query, $params);

        return $this->sQuery->fetch($fetchmode);
    }

    /**
     * Returns the value of one single field/column
     *
     * @param string $query
     * @param array $params
     * @return string
     */
    public function single($query, $params = null)
    {
        $this->Init($query, $params);

        return $this->sQuery->fetchColumn();
    }

}