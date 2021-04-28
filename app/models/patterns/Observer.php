<?php
/**
 * 观察者模式
 * Created by PhpStorm.
 * User: admin
 * Date: 2021/4/19
 * Time: 9:37 PM
 */

/**
 * 定义观察者、被观察者接口
 * 观察者接口(通知接口)
 *
 */
interface ITicketObserver //观察者接口
{
    /**
     * 得到通知后调用的方法
     * @param $sender
     * @param $args
     * @return mixed
     */
    function onBuyTicketOver($sender, $args);
}

/**
 *
 * 主题接口
 *
 */
interface ITicketObservable //被观察对象接口
{
    /**
     * 提供注册观察者方法
     * @param $observer
     * @return mixed
     */
    function addObserver($observer);
}

/**
 *
 * 主题类实现
 * 主题类（购票）
 *
 */
class HipiaoBuy implements ITicketObservable
{
    //实现主题接口（被观察者）
    private $_observers = array(); //通知数组（观察者）

    /**
     * 购票核心类，处理购票流程
     * @param $ticket
     */
    public function buyTicket($ticket)
    {
        // TODO 购票逻辑
        //循环通知，调用其onBuyTicketOver实现不同业务逻辑
        foreach ($this->_observers as $obs) {

            $obs->onBuyTicketOver($this, $ticket); //$this 可用来获取主题类句柄，在通知中使用
        }
    }

    /**
     * 添加通知
     * @param $observer
     * @return mixed|void
     */
    public function addObserver($observer) //添加N个通知
    {
        $this->_observers [] = $observer;
    }
}

//定义多个通知
//短信日志通知
class HipiaoMSM implements ITicketObserver
{
    /**
     * @param $sender
     * @param $ticket
     * @return mixed|void
     */
    public function onBuyTicketOver($sender, $ticket)
    {
        echo(date('Y-m-d H:i:s') . " 短信日志记录：购票成功:$ticket<br>");
    }
}

//文本日志通知
class HipiaoTxt implements ITicketObserver
{
    /**
     * @param $sender
     * @param $ticket
     * @return mixed|void
     */
    public function onBuyTicketOver($sender, $ticket)
    {
        echo(date('Y-m-d H:i:s') . " 文本日志记录：购票成功:$ticket<br>");
    }
}

//抵扣卷赠送通知
class HipiaoDiKou implements ITicketObserver
{
    /**
     * @param $sender
     * @param $ticket
     * @return mixed|void
     */
    public function onBuyTicketOver($sender, $ticket)
    {
        echo(date('Y-m-d H:i:s') . " 赠送抵扣卷：购票成功:$ticket 赠送10元抵扣卷1张。<br>");
    }
}

#============================用户购票====================
$buy = new HipiaoBuy ();
$buy->addObserver(new HipiaoMSM ()); //根据不同业务逻辑加入各种通知
$buy->addObserver(new HipiaoTxt ());
$buy->addObserver(new HipiaoDiKou ());
//购票
$buy->buyTicket("一排一号");