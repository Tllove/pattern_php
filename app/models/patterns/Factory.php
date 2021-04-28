<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2021/4/28
 * Time: 11:17 AM
 */


###简单工厂模式

interface Comput
{
    function getResult();
}


//运算类
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


###工厂方法模式


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


###抽象工厂模式

//产品族

/**
 * 抽象父类,用于规范子类实现
 */
abstract class Driver
{
    abstract function driverOneCar();

    abstract function driverTwoCar();
}


/**
 * 抽象父类,用于规范子类实现
 */
abstract class OneCar
{
    abstract function drive();
}


/**
 * 具体实现类
 */
class OneBigCar extends OneCar
{
    function drive()
    {
        return '开一辆大车';
    }
}

/**
 * 具体实现类
 */
class OneSmallCar extends OneCar
{
    function drive()
    {
        return '开一辆小车';
    }
}


/**
 * 抽象父类,用于规范子类实现
 */
abstract class TwoCar
{
    abstract function drive();
}

/**
 * 具体实现类
 */
class TwoBigCar extends TwoCar
{
    function drive()
    {
        return '开二辆大车';
    }
}

/**
 * 具体实现类
 */
class TwoSmallCar extends TwoCar
{
    function drive()
    {
        return '开二辆小车';
    }
}

/**
 * 具体大车实现类
 */
class BigDriver extends Driver
{

    function driverOneCar()
    {
        return new OneBigCar();
    }

    function driverTwoCar()
    {
        return new TwoBigCar();
    }
}

/**
 * 具体小车实现类
 */
class SmallDriver extends Driver
{

    function driverOneCar()
    {
        return new OneSmallCar();
    }

    function driverTwoCar()
    {
        return new TwoSmallCar();
    }
}

/**
 * 具体实现
 */
$small_type = new SmallDriver();
$car = $small_type->driverOneCar();
$string = $car->drive();
