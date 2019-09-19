<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: chenjiahao
 * Date: 2019-09-18
 * Time: 15:26
 */
namespace  cjh\Rabbitmq;

use cjh\Rabbitmq\Listener\Rabbitmq;
use ReflectionException;
use Swoft\Bean\BeanFactory;
use Swoft\Bean\Exception\ContainerException;
use Swoft\Connection\Pool\AbstractPool;
use Swoft\Connection\Pool\Contract\ConnectionInterface;
use Swoft\Redis\Connection\Connection;
use Swoft\Redis\Connection\ConnectionManager;
use Swoft\Redis\Exception\RedisException;
use Throwable;

/**
 * Class Pool
 *
 * @since 2.0
 */
class Pool extends AbstractPool
{
    /**
     * Default pool
     */
    const DEFAULT_POOL = 'rabbitmq.pool';


    /**
     * @var Rabbitmq
     */
    protected $rabbitmq;


    /**
     * @return ConnectionInterface
     * @throws ReflectionException
     * @throws ContainerException
     */
    public function createConnection(): ConnectionInterface
    {
       /// return $this->redisDb->createConnection($this);
        return $this->rabbitmq->createChannel();
    }

    /**
     * call magic method
     *
     * @param string $name
     * @param array  $arguments
     *
     * @return Connection
     */
    public function __call(string $name, array $arguments)
    {

       // try {
            /* @var ConnectionManager $conManager */
       //     $conManager = BeanFactory::getBean(ConnectionManager::class);

         //   $connection = $this->getConnection();

         //   $connection->setRelease(true);
         //   $conManager->setConnection($connection);
      //  } catch (Throwable $e) {
         //   throw new RedisException(
         //       sprintf('Pool error is %s file=%s line=%d', $e->getMessage(), $e->getFile(), $e->getLine())
          //  );
       // }

        // Not instanceof Connection
      //  if (!$connection instanceof Connection) {
         //   throw new RedisException(
          //      sprintf('%s is not instanceof %s', get_class($connection), Connection::class)
          //  );
     //   }

      ///  return $connection->{$name}(...$arguments);
    }


}
