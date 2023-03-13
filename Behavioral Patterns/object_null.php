<?php
/*
 * Паттерн Object Null - это шаблон проектирования, который используется для обработки случаев,
 * когда объект не имеет значения или не был инициализирован.
 */

/*
 * Когда мы работаем с объектами, иногда бывает,
 * что мы не можем или не хотим инициализировать объект,
 * или мы получаем значение null, когда пытаемся получить объект.
 * Вместо того, чтобы включать проверки на null в каждый метод объекта,
 * мы создаем отдельный класс-заглушку, который ведет себя как объект,
 * но не имеет никаких действительных данных или поведения.
 */

interface Worker
{
    public function work();
}

class ObjectManager
{
    private Worker $worker;

    /**
     * @param Worker $worker
     */
    public function __construct(Worker $worker)
    {
        $this->worker = $worker;
    }

    public function goWork()
    {
        $this->worker->work();
    }
}

class Developer implements Worker
{

    public function work()
    {
        printf("Developer is working");
    }
}

class NullWorker implements Worker
{

    public function work()
    {
        // TODO: Implement work() method.
    }
}

$developerWorker = new Developer();
$nullableWorker = new NullWorker();

$objectManager = new ObjectManager($developerWorker);

$objectManager->goWork();