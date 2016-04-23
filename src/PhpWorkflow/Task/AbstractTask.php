<?php

namespace PhpWorkflow\Task;


use PhpWorkflow\Task\Handler\HandlerInterface;

abstract class AbstractTask implements TaskInterface
{
    /** @var HandlerInterface[] */
    protected $handlers;

    /** @var string */
    private $status;


    /**
     * AbstractTask constructor.
     */
    public function __construct()
    {
        $this->buildTask();
        $this->status = self::STATUS_DEFAULT;
    }

    /**
     * @param int $order
     * @param HandlerInterface $handler
     * @return $this
     */
    public function setHandler($order, HandlerInterface $handler)
    {
        $this->handlers[$order] = $handler;
        ksort($this->handlers);

        return $this;
    }

    /**
     * run
     * @param ContextInterface $context
     */
    public function run(ContextInterface $context)
    {
        $this->status = self::STATUS_RUNNING;

        foreach ($this->handlers as $handler) {

            $handler->handle($context);

            if ($context->isRequestedToCancel()) {
                $this->status = self::STATUS_CANCELLED;
                return;
            }
        }

        $this->status = self::STATUS_DONE;
    }

    /**
     * getStatus
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * buildTask
     * @return void
     */
    abstract protected function buildTask();
}
