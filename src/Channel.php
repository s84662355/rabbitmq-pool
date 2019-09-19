<?php
/**
 * Created by PhpStorm.
 * User: chenjiahao
 * Date: 2019-09-19
 * Time: 10:36
 */

namespace cjh\Rabbitmq;
use Swoft\Connection\Pool\AbstractConnection;

class Channel extends AbstractConnection
{
    private $channel = null;

    public function __construct($channel)
    {
        $this->channel = $channel;
    }

    /**
     * @param Pool    $pool
     * @param RedisDb $redisDb
     */
    public function initialize(Pool $pool, RedisDb $redisDb)
    {
        $this->pool     = $pool;
        $this->redisDb  = $redisDb;
        $this->lastTime = time();

        $this->id = $this->pool->getConnectionId();
    }




    public function create(): void
    {

    }

    /**
     * @return bool
     */
    public function reconnect(): bool
    {
        return true;
    }

    /**
     * @param bool $force
     *
     * @throws ReflectionException
     * @throws ContainerException
     */
    public function release(bool $force = false): void
    {
        /* @var ConnectionManager $conManager */
        $conManager = BeanFactory::getBean(ConnectionManager::class);
        $conManager->releaseConnection($this->id);

        parent::release($force);
    }



}