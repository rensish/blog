<?
/**单例模式
* @param:config array数据库配置
* @return object
**/
class Mysql
{

    private static $pdo;
    private static $conn;
    private $sql;

    private function __construct($config){
        self::$conn = new PDO("mysql:dbname={$config['database']};host={$config['host']};port={$config['port']}",$config['user'],$config['pass']);
    }

    public static function getInstance($config){
        if(!(self::$pdo instanceof self)){
            self::$pdo = new self($config);
        }
        return self::$pdo;
    }

     public function __clone(){
        exit('clone is not allowed!');
    }

    private function query($sql){
        $this->sql  = $sql;
        $pstmt      = self::$conn->prepare($sql);
        $pstmt->execute();
        return $pstmt;
    }

    public function get_rows($sql){
        $pstmt  = $this->query($sql);
        $pstmt->setFetchMode(PDO::FETCH_ASSOC);
        $all    = $pstmt->fetchAll();
        return $all;
    }
}

$pdo = Mysql::getInstance($config);`
