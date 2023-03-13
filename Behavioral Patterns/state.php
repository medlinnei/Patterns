<?php
/*
 * Паттерн State - это шаблон проектирования,
 * который позволяет объекту изменять свое поведение в зависимости от своего состояния.
 */

/*
 * Представьте, что у вас есть объект, который может находиться в разных состояниях,
 * и каждое состояние предполагает выполнение разных действий.
 * Вместо того, чтобы включать проверки состояний в каждый метод объекта,
 * мы создаем отдельный класс для каждого состояния и делегируем выполнение методов этим классам.
 */
interface State
{
    public function ToNext(Task $task);
    public function GetStatus();
}

class Task
{
    private State $state;

    /**
     * @return State
     */
    public function getState(): State
    {
        return $this->state;
    }

    /**
     * @param State $state
     */
    public function setState(State $state): void
    {
        $this->state = $state;
    }

    public static function make()
    {
        $self = new self();
        $self->setState(new Created());
        return $self;
    }

    public function proceedToNext()
    {
        $this->state->ToNext($this);
    }
}

class Created implements State
{
    public function ToNext(Task $task)
    {
        $task->setState(new Process());
    }

    public function GetStatus()
    {
        return "Created";
    }
}

class Process implements State
{
    public function ToNext(Task $task)
    {
        $task->setState(new Test());
    }

    public function GetStatus()
    {
        return "Process";
    }
}

class Test implements State
{
    public function ToNext(Task $task)
    {
        $task->setState(new Done());
    }

    public function GetStatus()
    {
        return "Test";
    }
}

class Done implements State
{
    public function ToNext(Task $task)
    {
        // TODO: Implement ToNext() method.
    }

    public function GetStatus()
    {
        return "Done";
    }
}

$task = Task::make();
$task->proceedToNext();
var_dump($task->getState()->GetStatus());