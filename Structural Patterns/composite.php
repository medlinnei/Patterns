<?php

/*
 * Паттерн Composite - это паттерн проектирования,
 * который используется для организации объектов в древовидную
 * структуру и работы с ней как с одним целым.
 */

/*
 * Вместо того, чтобы работать с отдельными объектами,
 * мы группируем их в древовидную структуру,
 * где каждый узел может содержать как отдельный объект,
 * так и другие группы объектов. Затем мы можем работать с этой структурой
 * как с одним объектом, вызывая методы узлов или групп узлов.
 */
interface Device
{
    public function device();
}

class User implements Device
{
    private string $name;
    private array $devices;

    /**
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
        $this->devices = [];
    }

    public function addDevice(Device $device)
    {
        $this->devices[] = $device;
    }

    public function device()
    {
        foreach ($this->devices as $device) {
            $output .= "- " . $device->device() . "\n";
        }
        return $output;
    }
}

class UserDevice implements Device
{
    private string $deviceUser;

    /**
     * @param string $deviceUser
     */
    public function __construct(string $deviceUser)
    {
        $this->deviceUser = $deviceUser;
    }

    public function device()
    {
        return $this->deviceUser;
    }
}

// Создаем объект пользователя
$user = new User("Ivan");

// Создаем объекты устройств
$phone = new UserDevice("Phone");
$laptop = new UserDevice("Laptop");
$smartwatch = new UserDevice("Smartwatch");

// Добавляем устройства к пользователю
$user->addDevice($phone);
$user->addDevice($laptop);
$user->addDevice($smartwatch);

// Выводим информацию о пользователе и его устройствах
echo $user->device();
