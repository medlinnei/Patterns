<?php
/*
 * Паттерн Prototype - это шаблон проектирования,
 * который позволяет создавать новые объекты,
 * используя уже существующий объект в качестве прототипа.
 */

/*
 * Вместо того, чтобы создавать новый объект с нуля и устанавливать
 * все его свойства и методы, как в случае с конструктором или фабричным методом,
 * Prototype использует уже существующий объект в качестве основы для создания нового объекта.
 */
abstract class WorkerPrototype
{
    protected string $name;
    protected string $position;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getPosition(): string
    {
        return $this->position;
    }

    /**
     * @param string $position
     */
    public function setPosition(string $position): void
    {
        $this->position = $position;
    }
}

class Developer extends WorkerPrototype
{
    protected string $position = "Developer";
}

$developer = new Developer();
$developer2 = clone $developer;
$developer2->setName("Ivan");

var_dump($developer2->getName());