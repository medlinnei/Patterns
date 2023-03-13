<?php
/*
 * Паттерн pool - это паттерн проектирования,
 * который используется для управления набором объектов,
 * которые могут быть переиспользованы.
 */

/*
 * Он работает так: вместо создания нового объекта каждый раз,
 * когда он нужен, мы создаем заранее заданное количество объектов
 * и помещаем их в "бассейн" (или "пул") объектов. Когда нам нужен объект,
 * мы берем его из пула, используем его и потом возвращаем обратно в пул.
 */
class WorkerPool
{
    private array $freeWorkers = [];
    private array $busyWorkers = [];

    /**
     * @return array
     */
    public function getFreeWorkers(): array
    {
        return $this->freeWorkers;
    }

    /**
     * @param array $freeWorkers
     */
    public function setFreeWorkers(array $freeWorkers): void
    {
        $this->freeWorkers = $freeWorkers;
    }

    /**
     * @return array
     */
    public function getBusyWorkers(): array
    {
        return $this->busyWorkers;
    }

    /**
     * @param array $busyWorkers
     */
    public function setBusyWorkers(array $busyWorkers): void
    {
        $this->busyWorkers = $busyWorkers;
    }

    public function getWorker(): Worker
    {
        if(count($this->freeWorkers) == 0)
        {
            $worker = new Worker;
        }else{
            $worker = array_pop($this->freeWorkers);
        }

        $this->busyWorkers[spl_object_hash($worker)] = $worker;
        return $worker;
    }

    public function realese(Worker $worker)
    {
        $key = spl_object_hash($worker);

        if(isset($this->busyWorkers[$key])){
            unset($this->busyWorkers[$key]);
            $this->freeWorkers[$key] = $worker;
        }
    }
}

class Worker
{
    public function work()
    {
        printf("I`m working");
    }
}

$pool = new WorkerPool();
$worker = $pool->getWorker();

$worker->work();
