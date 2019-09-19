<?php
/**
 * Created by PhpStorm.
 * User: chenjiahao
 * Date: 2019-09-19
 * Time: 10:25
 */

namespace cjh\Rabbitmq\Listener;



class Rabbitmq
{
    /**
     * @var string
     */
    private $host = '127.0.0.1';


    /**
     * @var int
     */
    private $port = 5672;


    /**
     * @var string
     */
    private $vhost = '/';


    /**
     * @var string
     */
    private $username = 'guest';


    /**
     * @var string
     */
    private $password = 'guest';


}