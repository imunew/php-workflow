<?php

namespace PhpWorkflow\Task;


interface ContextInterface
{
    /**
     * getItem
     * @param string $name
     * @return mixed
     */
    public function getItem($name);

    /**
     * setItem
     * @param string $name
     * @param mixed $value
     * @return ContextInterface
     */
    public function setItem($name, $value);

    /**
     * requestToCancel
     * @return void
     */
    public function requestToCancel();

    /**
     * isRequestedToCancel
     * @return bool
     */
    public function isRequestedToCancel();
}
