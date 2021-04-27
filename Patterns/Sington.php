<?php
/**
 * 单例模式
 * Created by PhpStorm.
 * User: admin
 * Date: 2021/4/26
 * Time: 9:14 PM
 */

namespace Pattern;

class Single
{

    /**
     * 声明一个私有的实例变量
     * @var
     */
    private $name;

    /**
     * 私有构造函数，防止外部使用new对象
     * Single constructor.
     */
    private function __construct()
    {

    }

    /**
     * 保持类中只有一个实例
     * @var
     */
    static $instance;


    /**
     * 检测是否有实例对象 通过懒加载获得实例（在第一次使用的时候创建）
     * @return Single
     */
    static function checkInstance()
    {

        if (self::$instance) {
            return self::$instance;
        }

        self::$instance = new self();

        return self::$instance;
    }

    /**
     * 设置名称
     * @param $name
     */
    function setName($name)
    {

        $this->name = $name;
    }

    /**
     * 获取名称
     * @return mixed
     */
    function getName()
    {
        return $this->name;
    }

}


//目的,在应用程序调用的时候，只能获得一个实例对象。
//场景，应用程序与数据库打交道的场景，一个应用中会存在大量的数据库的操作，针对数据库语柄连接数据库的行为。
//优点，避免大量new的操作，每一次new操作都会消耗系统和内存的资源

$a = \Single::checkInstance();
$b = \Single::checkInstance();
$a_name = 'php';
$b_name = 'php_pattern';

$a->setName($a_name);
$b->setName($b_name);

echo $a->geName();
echo $b->geName();