<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2021/4/28
 * Time: 11:17 AM
 */

/**
 * 工厂模式
 */
interface Comput
{
    function getResult();
}


//操作类
class Operation
{
    protected $number_a = 0;
    protected $number_b = 0;
    protected $result = 0;

    /**
     * 设置
     * @param $number_a
     * @param $number_b
     */
    function setNumber($number_a, $number_b)
    {
        $this->number_a = $number_a;
        $this->number_b = $number_b;
    }

    /**
     * 清除结果
     */
    function clearResult()
    {
        $this->result = 0;
    }
}


//加法
class OperationAdd extends Operation implements Comput
{
    /**
     * 重写
     * @return int
     */
    function getResult()
    {
        return $this->result = $this->number_a + $this->number_b;
    }
}


//减法
class OperationSub extends Operation implements Comput
{
    /**
     * 重写
     * @return int
     */
    function getResult()
    {
        return $this->result = $this->number_a - $this->number_b;
    }
}

//乘法
class OperationMul extends Operation implements Comput
{
    /**
     * 重写
     * @return float|int
     */
    function getResult()
    {
        return $this->result = $this->number_a * $this->number_b;
    }
}

//除法

class OperationDiv extends Operation implements Comput
{
    /**
     * 重写
     * @return float|int|string
     */
    function getResult()
    {

        if (0 == $this->number_b) {
            return 'Error: Division by zero';
        }

        return $this->result = $this->number_a / $this->number_b;
    }
}

//工厂类
class OperationFactory
{
    private static $obj;

    /**
     * 动态创建类
     * @param $type
     * @return OperationAdd|OperationDiv|OperationMul|OperationSub
     */
    static function createOperation($type)
    {

        switch ($type) {
            case '+':
                self::$obj = new OperationAdd();
                break;
            case'-' :
                self::$obj = new OperationSub();
                break;
            case '*':
                self::$obj = new OperationMul();
                break;
            case '/':
                self::$obj = new OperationDiv();
                break;
        }

        return self::$obj;
    }
}

//工厂创建实例
$type = '+';
$obj = OperationFactory::createOperation($type);
$obj->setNumber(8, 24);
echo $obj->getResult();



interface People
{
    function say();

}

class Man implements People
{

    function say()
    {
        echo '男';
    }

}

class Woman implements People
{

    function say()
    {
        echo '女';
    }

}

class SimpleFactory extends Man
{

    /**
     * 动态创建类
     * @return man
     */
    static function createMan()
    {
        return new man();
    }
}

class SimpleFactory1 extends Woman
{
    /**
     * 创建女
     * @return woman
     */
    static function createWoman()
    {
        return new woman();
    }
}


/**
 * 具体实现
 */
$man = \SimpleFactory::createMan();
$man->say();
$woman = \SimpleFactory1::createWoman();
$woman->say();