<?php
/**
 * 适配器模式
 * Created by PhpStorm.
 * User: admin
 * Date: 2021/4/19
 * Time: 9:37 PM
 */

namespace Pattern;

interface IDatabase
{
    function connect($host, $user, $passwd, $dbname);

    function query($sql);

    function close();
}


namespace Test\Database;

use Pattern\IDatabase;

class MySQL implements IDatabase
{
    protected $conn;

    function connect($host, $user, $passwd, $dbname)
    {
        $conn = mysql_connect($host, $user, $passwd);
        mysql_select_db($dbname, $conn);
        $this->conn = $conn;
    }

    function query($sql)
    {
        $res = mysql_query($sql, $this->conn);
        return $res;
    }

    function close()
    {
        mysql_close($this->conn);
    }
}

class MySQLi implements IDatabase
{
    protected $conn;

    function connect($host, $user, $passwd, $dbname)
    {
        $conn = mysqli_connect($host, $user, $passwd, $dbname);
        $this->conn = $conn;
    }

    function query($sql)
    {
        return mysqli_query($this->conn, $sql);
    }

    function close()
    {
        mysqli_close($this->conn);
    }
}