<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2021/4/6
 * Time: 8:49 PM
 */

/**
 * 单例模式
 * Class Single
 */
class Single
{

    //条件
    //所有的单例模式至少拥有以下三个必须和一个必要元素：
    //1：必须拥有一个private的构造函数
    //2：必须拥有一个保存类的实例的静态成员变量
    //3：必须拥有一个访问这个实例的公共的静态方法


    /**
     * 声明一个私有的实例变量
     * @var
     */
    private $name;

    /**
     * 声明私有构造方法为了防止外部代码使用 new 来创建对象
     * Single constructor.
     */
    private function __construct()
    {

    }

    /**
     * 声明一个静态变量（保存在类中唯一的一个实例）
     * @var
     */
    static public $instance;

    /**
     *  用于检测是否有实例对象 通过懒加载获得实例（在第一次使用的时候创建）
     * @return Single
     */
    static public function checkInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * 设置名称
     * @param $n
     */
    public function setName($n)
    {
        $this->name = $n;
    }

    /**
     * 获取名称
     * @return mixed
     */
    public function geName()
    {
        return $this->name;
    }

}

//目的，在应用程序调用的时候，只能获得一个对象实例。
//场景，应用程序与数据库打交道的场景，一个应用中会存在大量的数据库的操作，针对数据库句柄连接数据库的行为。
//优点，避免大量new的操作，每一次new操作都会消耗系统和内存的资源

$oa = \Single::checkInstance();
$ob = \Single::checkInstance();
$name_a = 'hello world';
$name_b = 'good morning';
$oa->setName($name_a);
$ob->setName($name_b);

echo $oa->geName();