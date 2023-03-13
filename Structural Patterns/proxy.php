<?php
/*
 * Паттерн Proxy - это шаблон проектирования,
 * который используется для создания объекта-заместителя,
 * который может контролировать доступ к другому объекту.
 */

/*
 * Представьте, что у нас есть объект, к которому нужен доступ,
 * но мы хотим добавить дополнительную логику до или после выполнения операций с этим объектом,
 * например, проверку прав доступа или логирование. Вместо того,
 * чтобы напрямую получать доступ к этому объекту, мы создаем прокси-объект,
 * который делает то же самое, что и наш объект, но дополнительно выполняет дополнительную логику.
 */
interface Worker
{
    public function slosedHours($hours);

    public function countSalary(): int;
}

class WorkOutSourceTime implements Worker
{
    private array $hours = [];
    public function slosedHours($hours)
    {
        $this->hours[] = $hours;
    }
    public function countSalary(): int
    {
        return array_sum($this->hours) * 100;
    }
}

class WorkerProxy extends WorkOutSourceTime implements Worker
{
    private int $selery = 0;

    public function countSalary(): int
    {
        if($this->selery === 0){
            $this->selery = parent::countSalary();
        }
        return $this->selery;
    }
}

$workerProxy = new WorkerProxy();
$workerProxy->slosedHours(10);

var_dump($workerProxy->countSalary());