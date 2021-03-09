<?php
trait DB
{
    /**
     * @var PDO PDO entity.
     */
    private $connection;

    /**
     * @var DB
     */
    private static $instance;

    private function __construct()
    {
        try {
            $config = Config::getConfig();

            $opt = array(
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            );
            $dbPDO = new PDO(
                'mysql:host=' . $config['host'] . ';dbname=' . $config['database'] . ';charset=utf8',
                $config['username'],
                $config['password'],
                $opt
            );
            $this->connection = $dbPDO;

        } catch (Exception $exception) {
            die($exception->getMessage());
        }
    }

    private function __clone() {}

    public function __sleep() {
        throw new Exception("It is not possible to create double DB class");
    }

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new static();
        }
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->connection;
    }

    public function reConnect()
    {

    }
}