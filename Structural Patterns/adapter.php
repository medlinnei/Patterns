<?php
/*
 * Шаблон Adapter используется для связывания двух несовместимых классов,
 * чтобы они могли взаимодействовать между собой. Он позволяет использовать один класс,
 * как если бы он был другим классом, что может быть полезно, когда требуется совместить код,
 * который не был разработан для совместного использования.
 */

interface WorkerNative
{
    public function countSalary(): int;
}
interface OutserceWorker
{
    public function countSalaryHours($hours): int;
}

class DeveloperNative implements WorkerNative
{

    public function countSalary(): int
    {
        return 1000 * 15;
    }
}
class DeveloperOutserce implements OutserceWorker
{
    public function countSalaryHours($hours): int
    {
        return $hours;
    }
}

class AdapterDeveloperNative implements OutserceWorker
{
    protected WorkerNative $workerNative;

    /**
     * @param WorkerNative $workerNative
     */
    public function __construct(WorkerNative $workerNative)
    {
        $this->workerNative = $workerNative;
    }

    public function countSalaryHours($hours): int
    {
        return $hours * 100;
    }
}

$developerNative = new DeveloperNative();
$outserceWorker = new DeveloperOutserce();
$adapter = new AdapterDeveloperNative($developerNative);
echo $adapter->countSalaryHours(6);
