<?php

/*
 * Паттерн Flyweight - это способ экономного использования памяти и увеличения
 * производительности программы, путем разделения данных на общие и уникальные части.
 */

/*
 * Вместо создания отдельного объекта для каждой уникальной части данных,
 * мы используем общие объекты для всех элементов,
 * которые имеют одинаковые свойства. Таким образом, мы избегаем создания лишних объектов,
 * что уменьшает потребление памяти и ускоряет выполнение программы.
 */
<?php

interface FlyInterface
{
    public function operation();
}

class Fly
{
    protected $element = [];
    public function setElement(array $element): void
    {
        $this->element = $element;
    }
    public function getElement($key)
    {
        if(!isset($this->element[$key])){
            $this->element[$key] = new ConcreteElement($key);
        }
        return $this->element[$key];
    }

}

class ConcreteElement implements FlyInterface
{
    private $key;
    public function __construct($key)
    {
        $this->key = $key;
    }

    public function operation()
    {
        echo "element". $this->key;
    }
}
$fly = new Fly();
$fly->setElement([1]);
$concreteElement = new ConcreteElement(1);
$concreteElement->operation();
