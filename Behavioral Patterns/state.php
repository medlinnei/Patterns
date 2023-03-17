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

interface StateCRUD
{
    public function toNext(Task $task);
    public function getStatus();
}

class Task
{
    public StateCRUD $stateCRUD;

    /**
     * @param StateCRUD $stateCRUD
     */
    public function __construct(StateCRUD $stateCRUD)
    {
        $this->stateCRUD = $stateCRUD;
    }

    public function nextState()
    {
        $this->stateCRUD->toNext($this);
    }

    public function getStatus()
    {
        $this->stateCRUD->getStatus();
    }


}
class Created implements StateCRUD
{

    public function toNext(Task $task)
    {
        $task->stateCRUD = new Read();
    }

    public function getStatus()
    {
        echo "Created". PHP_EOL;
    }
}
class Read implements StateCRUD
{

    public function toNext(Task $task)
    {
        $task->stateCRUD = new Update();
    }

    public function getStatus()
    {
        echo "Read". PHP_EOL;

    }
}
class Update implements StateCRUD
{

    public function toNext(Task $task)
    {
        $task->stateCRUD = new Delete();
    }

    public function getStatus()
    {
        echo "Update". PHP_EOL;
    }
}
class Delete implements StateCRUD
{

    public function toNext(Task $task)
    {
        echo "Cannot transition from Delete" . PHP_EOL;
    }

    public function getStatus()
    {
        echo "Delete". PHP_EOL;
    }
}

$stateCRUD = new Task(new Created());
$stateCRUD->nextState();
$stateCRUD->nextState();
$stateCRUD->getStatus();
