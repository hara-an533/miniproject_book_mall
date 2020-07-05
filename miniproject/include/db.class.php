<?php

    //引入数据库配置
    require_once('db.config.php');

    class DB {

        //构造函数中，配置数据库连接
        function __construct($dbhost,$dbuser,$dbpwd,$dbname){

            //数据库连接
           $this->conn = mysqli_connect($dbhost,$dbuser,$dbpwd,$dbname);

           //数据库读写编码
           mysqli_query($this->conn,'set NAMES utf8');

        }

        //执行操作
        function execute($sql,$tag='i'){
           $this->result[$tag] = mysqli_query($this->conn,$sql);
        }

        //从结果记录集中抓取数据
        function fetch($tag='i'){
            return mysqli_fetch_array($this->result[$tag],MYSQLI_ASSOC);
        }

        //影响的行数
        function affectedRows(){

            return mysqli_affected_rows($this->conn);

        }

        //获取刚刚插入的记录的ID
        function insertId(){
            return mysqli_insert_id($this->conn);

        }

        //获取最近一次的数据库执行错误信息
        function error(){

            echo mysqli_error($this->conn);

        }
       

    }

    //创建实例对象
    $msql = new DB($dbhost,$dbuser,$dbpwd,$dbname);

?>