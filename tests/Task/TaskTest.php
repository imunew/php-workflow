<?php

namespace PhpWorkflow\Task;


class TaskTest extends \PHPUnit_Framework_TestCase
{

    public function testTaskDone()
    {
        $task = new Task();

        $parameters = ['runner' => __METHOD__];
        $task->run(new Context($parameters));

        $this->assertEquals(TaskInterface::STATUS_DONE, $task->getStatus());
    }

    public function testTaskCancelled()
    {
        $task = new Task();

        $parameters = ['runner' => __METHOD__, 'stop' => true];
        $task->run(new Context($parameters));

        $this->assertEquals(TaskInterface::STATUS_CANCELLED, $task->getStatus());
    }

}
