<?php declare(strict_types=1);


namespace cjh\Rabbitmq\Listener;


use ReflectionException;
use Swoft\Bean\BeanFactory;
use Swoft\Bean\Exception\ContainerException;
use Swoft\Event\Annotation\Mapping\Listener;
use Swoft\Event\EventHandlerInterface;
use Swoft\Event\EventInterface;
use Swoft\SwoftEvent;
use cjh\Rabbitmq\ConnectionManager;

/**
 * Class CoroutineDeferListener
 *
 * @since 2.0
 *
 * @Listener(event=SwoftEvent::COROUTINE_DEFER)
 */
class CoroutineDeferListener implements EventHandlerInterface
{
    /**
     * @param EventInterface $event
     *
     * @throws ReflectionException
     * @throws ContainerException
     */
    public function handle(EventInterface $event): void
    {

        /* @var ConnectionManager $conManager */

       $conManager = BeanFactory::getBean(ConnectionManager::class);
       $conManager->release();

    }
}