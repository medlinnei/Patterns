<?php
/*
 * Factory Method - это паттерн проектирования,
 * который позволяет создавать объекты разных классов, но с единым интерфейсом
 */

/*
 * Другими словами, Factory Method вынуждает нас использовать абстрактный класс
 * или интерфейс для создания объектов вместо использования конкретных классов.
 * Такой подход позволяет легко добавлять новые типы объектов, не изменяя существующий код,
 * что делает приложение более гибким и расширяемым.
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

interface WorkerFactory
{
    public static function make();
}

class DesignerFactory implements WorkerFactory
{
    public static function make()
    {
        return new Designer();
    }
}

class DeveloperFactory implements WorkerFactory
{

    public static function make()
    {
        return new Developer();
    }
}

$developer = DeveloperFactory::make();
$designer = DesignerFactory::make();

$developer->work();

