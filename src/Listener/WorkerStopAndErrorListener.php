<?php declare(strict_types=1);


namespace cjh\Rabbitmq\Listener;


use ReflectionException;
use Swoft\Bean\BeanFactory;
use Swoft\Bean\Exception\ContainerException;
use Swoft\Event\Annotation\Mapping\Subscriber;
use Swoft\Event\EventInterface;
use Swoft\Event\EventSubscriberInterface;
use Swoft\Log\Helper\CLog;
use Swoft\Server\SwooleEvent;
use Swoft\SwoftEvent;
use cjh\Rabbitmq\ConnectionManager;
use cjh\Rabbitmq\Pool;
/**
 * Class WorkerStopAndErrorListener
 *
 * @since 2.0
 *
 * @Subscriber()
 */
class WorkerStopAndErrorListener implements EventSubscriberInterface
{
    /**
     * @return array
     */
    public static function getSubscribedEvents(): array
    {
        return [
            SwooleEvent::WORKER_STOP    => 'handle',
            SwoftEvent::WORKER_SHUTDOWN => 'handle',
        ];
    }

    /**
     * @param EventInterface $event
     *
     * @throws ReflectionException
     * @throws ContainerException
     */
    public function handle(EventInterface $event): void
    {
        $pools = BeanFactory::getBeans(Pool::class);

        /* @var Pool $pool */
       foreach ($pools as $pool) {
            $count = $pool->close();

            CLog::info('Close %d redis connection on %s!', $count, $event->getName());
       }
    }
}
