<?php

namespace PhpWorkflow\Task\Handler;


use PhpWorkflow\Task\ContextInterface;

class ExecuteHandler implements HandlerInterface
{

    /**
     * handle
     * @param ContextInterface $context
     */
    public function handle(ContextInterface $context)
    {
        echo '['. __METHOD__. '] from: '. $context->getItem('runner'). PHP_EOL;

        if ($context->getItem('stop')) {
            $context->requestToCancel();
        }
    }
}
