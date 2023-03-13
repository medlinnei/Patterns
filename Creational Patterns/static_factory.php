<?php
/*
 * Паттерн static_factory — это способ создания объектов,
 * при котором не нужно вызывать конструктор напрямую.
 * Вместо этого, используется статический метод (метод класса),
 * который создает и возвращает экземпляр объекта.
 */

/*
 * Этот метод может быть написан таким образом,
 * чтобы возвращать различные типы объектов,
 * в зависимости от переданных параметров или условий.
 * Таким образом, вы можете использовать паттерн static_factory,
 * чтобы создавать объекты с более гибкими и удобными методами и контролировать их создание.
 */

interface Worker
{
    public function work();
}

class Developer implements Worker
{

    public function work()
    {
        print_r("Developer");
    }
}

class Designer implements Worker
{

    public function work()
    {
        print_r("Designer");
    }
}

class WorkerFactory
{
    public static function make($workerTitle): ?Worker
    {
    //strtoupper - преобразует все буквы строки в верхний регистр.
        $Сlassname = strtoupper($workerTitle);

        if(class_exists($Сlassname))
        {
            return new $Сlassname;
        }
        return null;
    }

}

$developer = WorkerFactory::make("Developer");

$developer->work();

