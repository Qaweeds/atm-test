<?php
class DataBase
{
    const PARAM_NULL = 0;

    const PARAM_INT = 1;

    const PARAM_STR = 2;

    const PARAM_BOOL = 5;

    /**
     * @var PDO
     */
    public static $db = null;

    /**
     * @var PDOStatement|false
     */
    public static $stmt;

    public function  __construct()
    {
        self::$db = MyiDB::getInstance()->getConnection();
    }

    public function getInsertId()
    {
        return self::$db->insert_id;
    }

    public function prepare($sql)
    {
        self::$stmt = self::$db->prepare($sql);

        return $this;
    }

    public function exec($sql)
    {
        try {
            self::$db->exec($sql);
        } catch (PDOException $exception) {
            die($exception->getMessage());
        }
    }

    public function query($sql)
    {
        self::$stmt = self::$db->query($sql);

        if (self::$db->errorCode() != 0000) {
            die(self::$db->errorInfo());
        }
    }

    public function bindParameter($alias, $value)
    {
        self::$stmt->bindParam($alias, $value);

        return $this;
    }

    public function bindValue($alias, $value, $dataType = self::PARAM_STR)
    {
        self::$stmt->bindValue($alias, $value, $dataType);

        return $this;
    }

    public function execute($parameters = null)
    {
        self::$stmt->execute($parameters);
    }

    public function fetchRow()
    {
        return self::$stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function fetchAll()
    {
        return self::$stmt->fetchAll();
    }

    public function escape($value)
    {
        return trim(strip_tags($value));
    }

    public function quote($value)
    {
        return self::$db->quote($value);
    }

    public function numRows()
    {
        return self::$stmt->rowCount();
    }
}
