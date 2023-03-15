<?php

/*
 * Singleton - это паттерн проектирования в программировании,
 * который позволяет создавать только один объект класса и предоставляет
 * глобальную точку доступа к этому экземпляру.
 */

 /*
 * Другими словами, Singleton гарантирует,
 * что в системе будет только один объект данного класса и предоставляет
 * механизм для доступа к этому объекту из любой части программы.
 */

 /* Это может быть полезно, например, для создания класса,
 *  который управляет доступом к некоторому ресурсу или для создания класса,
 *  который предоставляет доступ к конфигурационным параметрам приложения.
 */

class Person
{
    private static string $name;
    private static int $age;

    /**
     * @return string
     */
    public static function getName(): string
    {
        return self::$name;
    }

    /**
     * @param string $name
     */
    public static function setName(string $name): void
    {
        self::$name = $name;
    }

    /**
     * @return int
     */
    public static function getAge(): int
    {
        return self::$age;
    }

    /**
     * @param int $age
     */
    public static function setAge(int $age): void
    {
        self::$age = $age;
    }
    private static ?self $instacne = null;

    public static function getInstance(): self
    {
        if(self::$instacne == null){
            self::$instacne = new self();
        }
        return self::$instacne;
    }
}

$person = Person::getInstance();

$person::setName("Ivan");
$person::setAge(20);
var_dump($person::getName(), $person::getAge());
