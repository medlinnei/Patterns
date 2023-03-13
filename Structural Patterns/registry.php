<?php
/*
 * Паттерн Registry - это паттерн проектирования,
 * который используется для хранения и доступа к объектам,
 * которые используются в приложении.
 */

/*
 * Вместо того, чтобы создавать и управлять объектами напрямую,
 * мы создаем реестр (Registry), который хранит ссылки на созданные объекты.
 * Затем мы можем получать доступ к объектам через реестр, используя ключи или идентификаторы объектов.
 */
abstract class Registry
{
    private static array $services = [];

    final public static function setService($key, Service $service)
    {
        self::$services[$key] = $service;
    }
    final public static function getService($key): Service|null
    {
        if(isset(self::$services[$key])){
            return self::$services[$key];
        }else{
            return null;
        }
    }
}

class Service
{

}

$service = new Service();

Registry::setService(1, $service);
$service = Registry::getService(1);

var_dump($service);

