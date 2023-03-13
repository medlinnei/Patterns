<?php
/*
 * Паттерн посредник (Mediator) - это способ организации взаимодействия между
 * объектами таким образом, чтобы они не зависели друг от друга напрямую.
 * Вместо этого, объекты общаются через специальный объект-посредник,
 * который контролирует и регулирует их взаимодействие.
 */
/*
 * Паттерн посредник позволяет разделить сложную систему на более простые компоненты,
 * которые легче понимать и поддерживать.
 * Объекты не знают друг о друге напрямую и не могут вызывать методы друг друга,
 * а только сообщают о своих действиях посреднику. Посредник же, в свою очередь,
 * реагирует на эти сообщения и управляет взаимодействием между объектами.
 */
interface Mediator
{
    public function getWorker();
}

abstract class Worker
{
    private string $name;

    /**
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function seyHello()
    {
        printf("Hello");
    }

    public function work(): string
    {
        return $this->name. " is working";
    }
}

class InfoBase
{
    public function printInfo(Worker $worker)
    {
        printf($worker->work());
    }
}

class WorkerInfoBaseMediator implements Mediator
{
    private Worker $worker;
    private InfoBase $infoBase;

    /**
     * @param Worker $worker
     * @param InfoBase $infoBase
     */
    public function __construct(Worker $worker, InfoBase $infoBase)
    {
        $this->worker = $worker;
        $this->infoBase = $infoBase;
    }

    public function getWorker()
    {
        $this->infoBase->printInfo($this->worker);
    }
}

class Developer extends Worker
{

}

class Designer extends Worker
{

}


$developer = new Developer("Developer");
$designer = new Developer("Designer");
$infoBase = new InfoBase();
$workerInfoBaseMediator = new WorkerInfoBaseMediator($designer, $infoBase);

$workerInfoBaseMediator->getWorker();