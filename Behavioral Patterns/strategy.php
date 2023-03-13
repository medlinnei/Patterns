<?php
/*
 * Паттерн Strategy - это шаблон проектирования, который позволяет объекту
 * выбирать алгоритм выполнения задачи во время выполнения программы.
 */

/*
 * Представьте, что у нас есть объект, который может выполнять задачу,
 * например, сортировку данных. Вместо того, чтобы включать алгоритм сортировки внутрь объекта,
 * мы создаем отдельный класс для каждого алгоритма и передаем нужный класс объекту,
 * который будет выполнять сортировку.
 */
interface Definer
{
    public function define($arg): string;
}

class Data
{
    private Definer $definer;
    private int|string|bool $arg;

    /**
     * @param bool|int|string $arg
     */
    public function setArg(bool|int|string $arg): void
    {
        $this->arg = $arg;
    }

    /**
     * @param Definer $definer
     */
    public function __construct(Definer $definer)
    {
        $this->definer = $definer;
    }

    public function executeStrategy(): string
    {
       return $this->definer->define($this->arg);
    }
}

class IntDefiner implements Definer
{

    public function define($arg): string
    {
        return $arg . " from int strategy";
    }
}

class StringDefiner implements  Definer
{
    public function define($arg): string
    {
        return $arg . " from string strategy";
    }
}

class BooleanDefiner implements  Definer
{
    public function define($arg): string
    {
        return $arg . " from boolean strategy";
    }
}

$data = new Data(new IntDefiner());
$data->setArg("some arg for first");

var_dump($data->executeStrategy());