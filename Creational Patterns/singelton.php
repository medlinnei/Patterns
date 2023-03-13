<?php

/*
 * Singleton - это паттерн проектирования в программировании,
 * который позволяет создавать только один экземпляр класса и предоставляет
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

final class Connection
{
    private static ?self $instacne = null;
    private static string $name;

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
    public static function getInstance():self
    {
        if(self::$instacne === null)
        {
            self::$instacne = new self();
        }
            return self::$instacne;
    }

    public function __clone(): void
    {
        // TODO: Implement __clone() method.
    }

    public function __wakeup(): void
    {
        // TODO: Implement __wakeup() method.
    }
}

$connection = Connection::getInstance();
$connection::setName("Laravel");

var_dump($connection::getName());