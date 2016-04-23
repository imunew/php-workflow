<?php

namespace PhpWorkflow\Task;


use PhpWorkflow\Task\Handler\AfterHandler;
use PhpWorkflow\Task\Handler\BeforeHandler;
use PhpWorkflow\Task\Handler\ExecuteHandler;

class Task extends AbstractTask
{
    const BEFORE_HANDLER_ORDER = 10;
    const EXECUTE_HANDLER_ORDER = 20;
    const AFTER_HANDLER_ORDER = 30;

    protected function buildTask()
    {
        $this
            ->setHandler(self::AFTER_HANDLER_ORDER, new AfterHandler())
            ->setHandler(self::BEFORE_HANDLER_ORDER, new BeforeHandler())
            ->setHandler(self::EXECUTE_HANDLER_ORDER, new ExecuteHandler())
            ;
    }

}