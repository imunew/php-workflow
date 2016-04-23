<?php

namespace PhpWorkflow\Task\Handler;


use PhpWorkflow\Task\ContextInterface;

interface HandlerInterface
{
    /**
     * @param ContextInterface $context
     * @return void
     */
    public function handle(ContextInterface $context);
}
