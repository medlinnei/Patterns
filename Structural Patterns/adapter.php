<?php
/*
 * Шаблон Adapter используется для связывания двух несовместимых классов,
 * чтобы они могли взаимодействовать между собой. Он позволяет использовать один класс,
 * как если бы он был другим классом, что может быть полезно, когда требуется совместить код,
 * который не был разработан для совместного использования.
 */

interface NativeWorker
{
    public function countSalary(): int;
}

interface OutsourceWorker
{
    public function countSalaryByHour($hours): int;
}

class NativeDeveloper implements NativeWorker
{

    public function countSalary(): int
    {
        return 3000 * 20;
    }
}
class OutsourceDeveloper implements OutsourceWorker
{

    public function countSalaryByHour($hours): int
    {
        return $hours * 100;
    }
}

class OutsourceWorkerAdapter implements NativeWorker
{
    private OutsourceWorker $outsourceWorker;

    /**
     * @param OutsourceWorker $outsourceWorker
     */
    public function __construct(OutsourceWorker $outsourceWorker)
    {
        $this->outsourceWorker = $outsourceWorker;
    }

    public function countSalary(): int
    {
        return $this->outsourceWorker->countSalaryByHour(80);
    }
}

$nativeDeveloper = new NativeDeveloper();
$outsourceDeveloper = new OutsourceDeveloper();

$outsourceWorkerAdapter = new OutsourceWorkerAdapter($outsourceDeveloper);

var_dump($outsourceWorkerAdapter->countSalary());

