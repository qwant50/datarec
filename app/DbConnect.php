<?

namespace Qwant;

class DbConnect
{
    private $params;
    private $connection;
    private static $instance;


    private function __construct()
    {
        try {
            $this->params = require_once dirname(__DIR__) . '/configs/db.php';
            $this->connection = new \PDO(
                "mysql:host={$this->params['host']};dbname={$this->params['dbname']};charset={$this->params['charset']}",
                $this->params['username'],
                $this->params['password']
            );
            $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            die(__CLASS__ . ' ' . $e->getMessage());
        }
    }

    public static function getInstance()
    {
        return self::$instance ?: self::$instance = new self();
    }

    public function getConnection()
    {
        return $this->connection;
    }
}
