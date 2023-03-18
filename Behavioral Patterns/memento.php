<?php
/*
 * Шаблон проектирования Memento позволяет сохранять текущее состояние объекта и восстанавливать
 * его в будущем, не раскрывая деталей реализации объекта.
 * Это может быть полезно, например, для сохранения состояния игры или веб-формы,
 * чтобы пользователь мог вернуться к предыдущему состоянию,
 * если он ошибся или захотел изменить что-то.
 * Для реализации этого шаблона используются три компонента: хранитель (Memento),
 * который хранит состояние объекта; создатель (Originator), который создает и восстанавливает объекты из хранителя;
 * и смотритель (Caretaker), который управляет хранителем и создателем, чтобы сохранять и восстанавливать состояние объекта.
 */


// Создаем класс для объекта, состояние которого мы будем сохранять
class Originator 
{
    private $state;

    public function setState($state) 
    {
        $this->state = $state;
    }

    public function getState() 
    {
        return $this->state;
    }

// Создаем объект-хранитель состояния и сохраняем текущее состояние объекта в него
    public function save() 
    {
        return new Memento($this->state);
    }

// Восстанавливаем состояние объекта из объекта-хранителя
    public function restore(Memento $memento) 
    {
        $this->state = $memento->getState();
    }
}

// Создаем класс для объекта-хранителя состояния
class Memento 
{
    private $state;

    public function __construct($state) 
    {
        $this->state = $state;  
    }

    public function getState() 
    {
        return $this->state;
    }
}

// Создаем объект Originator и сохраняем его текущее состояние
$originator = new Originator();
$originator->setState("Состояние 1");
$memento = $originator->save();

// Изменяем состояние объекта Originator
$originator->setState("Состояние 2");

// Восстанавливаем состояние объекта Originator из объекта-хранителя
$originator->restore($memento);

// Теперь состояние объекта Originator равно "Состояние 1"
echo $originator->getState();
