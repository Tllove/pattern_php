<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2021/4/6
 * Time: 9:35 PM
 */

//注册模式
class Register
{
    protected static $objects;

    function set($alias, $object)//将对象注册到全局的树上
    {
        self::$objects[$alias] = $object;//将对象放到树上
    }

    static function get($name)
    {
        return self::$objects[$name];//获取某个注册到树上的对象
    }

    function _unset($alias)
    {
        unset(self::$objects[$alias]);//移除某个注册到树上的对象。
    }
}

/**
 * PHP设计模式之注册模式实例
 *
 */
class  Registry
{


    //首先我们需要一个作为注册树的类，这毋庸置疑。所有的对象“插入”到注册树上。
    //这个注册树应该由一个静态变量来充当。而且这个注册树应该是一个二维数组。
    //这个类应该有一个插入对象实例的方法（set()），
    //当让相对应的就应该有一个撤销对象实例的方法（_unset()）。
    //当然最重要的是还需要有一个读取对象的方法（get()）
    protected static $store = array();

    private static $instance;

    public static function instance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function get($key)
    {
        if (array_key_exists($key, Registry::$store))
            return Registry::$store[$key];
    }

    public function set($key, $obj)
    {
        Registry::$store[$key] = $obj;
    }
}


class ConnectDB
{

    private $host;
    private $username;
    private $password;

    private $conn;


    public function __construct($host, $username, $password)
    {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
    }

    public function getConnect()
    {
        return mysql_connect($this->host, $this->username, $this->password);
    }

}

//使用测试
$reg = Registry::instance();
$reg->set('db1', new ConnectDB('localhost', 'root', 'mckee'));
$reg->set('db2', new ConnectDB('192.168.1.198', 'test', '0K5Dt@2jdc8#x@'));
print_r($reg->get('db1'));
print_r($reg->get('db2'));