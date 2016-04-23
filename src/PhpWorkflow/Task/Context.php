<?php

namespace PhpWorkflow\Task;


class Context implements ContextInterface
{
    /** @var array */
    private $items;

    /** @var bool */
    private $isRequestedToCancel;

    /**
     * Context constructor.
     * @param array $items
     */
    public function __construct(array $items = [])
    {
        $this->items = $items;
        $this->isRequestedToCancel = false;
    }

    /**
     * getItem
     * @param string $name
     * @return mixed
     */
    public function getItem($name)
    {
        if (isset($this->items[$name])) {
            return $this->items[$name];
        }
        return null;
    }

    /**
     * setItem
     * @param string $name
     * @param mixed $value
     * @return ContextInterface
     */
    public function setItem($name, $value)
    {
        $this->items[$name] = $value;
        return $this;
    }

    /**
     * requestToStop
     * @return void
     */
    public function requestToCancel()
    {
        $this->isRequestedToCancel = true;
    }

    /**
     * isRequestedToStop
     * @return bool
     */
    public function isRequestedToCancel()
    {
        return $this->isRequestedToCancel;
    }
}