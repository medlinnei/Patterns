<?php
/*
 * Паттерн Chain of Responsibility (Цепочка обязанностей) позволяет передавать
 * запросы по цепочке объектов, пока один из них не обработает запрос.
 * Каждый объект в цепочке имеет возможность обработать запрос или передать его
 * дальше по цепочке. Таким образом, паттерн позволяет динамически определять,
 * какой объект будет обрабатывать запрос в зависимости от его характеристик.
 * Это может быть полезно, например, для обработки ошибок в программе,
 * когда необходимо найти объект, который может обработать конкретную ошибку.
 */
abstract class Handler
{
    private ?Handler $successor;

    /**
     * @param Handler $successor
     */
    public function __construct(?Handler $successor)
    {
        $this->successor = $successor;
    }
    final public function handle(TaskInterface $task)
    {
        $proceed = $this->processing($task);
        if($proceed === null and $this->successor){
            $proceed = $this->successor->handle($task);
        }
        return $proceed;
    }

    abstract public function processing(TaskInterface $task): ?array;
}

interface TaskInterface
{
    public function getArray(): array;
}

class DevTask implements TaskInterface
{
    private array $arr = [1, 2, 3];
    public function getArray(): array
    {
        return $this->arr;
    }
}

class Junior extends Handler
{

    public function processing(TaskInterface $task): ?array
    {
        return $task->getArray();
    }
}

class Middle extends Handler
{

    public function processing(TaskInterface $task): ?array
    {
        return null;
    }
}

class Senior extends Handler
{

    public function processing(TaskInterface $task): ?array
    {
        return null;
    }
}

$task = new DevTask();

$senior = new Senior(null);
$middle = new Middle($senior);
$junior = new Junior($middle);

var_dump($junior->handle($task));