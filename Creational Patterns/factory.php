<?php

/*
 * Factory - это паттерн проектирования, который позволяет создавать объекты без явного указания их классов.
 * Вместо того, чтобы явно создавать объекты, вы делегируете эту работу фабрике,
 * которая на основе входных параметров определяет какой тип объекта нужно создать и создает его.
 */

/*
 * Фабрика может быть полезна в тех случаях,
 * когда вы хотите сократить количество зависимостей в коде и
 * обеспечить более гибкую архитектуру приложения.
 */
class Worker
{
    private string $name;

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
}

class WorkerFactory {
    public static function make():Worker{
        return new Worker();
    }

}

$worker = WorkerFactory::make();

$worker->setName("Ivan");
var_dump($worker->getName());