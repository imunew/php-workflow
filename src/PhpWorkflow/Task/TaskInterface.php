<?php

namespace PhpWorkflow\Task;


use PhpWorkflow\Task\Handler\HandlerInterface;

interface TaskInterface
{
    const STATUS_DEFAULT = 'default';
    const STATUS_RUNNING = 'running';
    const STATUS_CANCELLED = 'cancelled';
    const STATUS_DONE = 'done';

    /**
     * setHandler
     * @param int $order
     * @param HandlerInterface $handler
     * @return TaskInterface
     */
    public function setHandler($order, HandlerInterface $handler);

    /**
     * @param ContextInterface $context
     * @return void
     */
    public function run(ContextInterface $context);

    /**
     * getStatus
     * @return string
     */
    public function getStatus();
}
