<?php

/*
 * Паттерн "Facade" - это паттерн проектирования, который позволяет
 * скрыть сложную логику и детали реализации системы за простым интерфейсом.
 * То есть, фасад (facade) представляет собой удобный интерфейс для работы с системой,
 * который скрывает сложность ее внутренней структуры и
 * предоставляет пользователю простые методы для выполнения задач
 */

/*
 * Например, если у вас есть сложная система, состоящая из нескольких классов,
 * которые нужно использовать вместе, то можно создать фасад,
 * который будет представлять собой единую точку входа для работы с этой системой.
 * Фасад будет предоставлять пользователю простые методы для выполнения задач,
 * а внутри себя будет использовать сложную логику и вызывать методы других классов, чтобы выполнить задачу пользователя.
 */
class WorkerFacade
{
    private Developer $developer;
    private Designer $designer;

    /**
     * @param Developer $developer
     * @param Designer $designer
     */
    public function __construct(Developer $developer, Designer $designer)
    {
        $this->developer = $developer;
        $this->designer = $designer;
    }
    public function startWork()
    {
        $this->developer->startDevelop();
        $this->designer->startDesigner();
    }

    public function stopWork()
    {
        $this->developer->stopDevelop();
        $this->designer->stopDesigner();
    }
}

class Developer
{
    public function startDevelop()
    {
        print_r("start Develop" . PHP_EOL);
    }

    public function stopDevelop()
    {
        print_r("stop Develop". PHP_EOL);
    }
}

class Designer
{
    public function startDesigner()
    {
        print_r("start Designer". PHP_EOL);
    }

    public function stopDesigner()
    {
        print_r("stop Designer". PHP_EOL);
    }
}

$developer = new Developer();
$designer = new Designer();
$workerFacade = new WorkerFacade($developer, $designer);

$workerFacade->startWork();