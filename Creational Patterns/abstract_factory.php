<?php
/*
 * Паттерн Abstract Factory - является паттерном проектирования
 * программного обеспечения, который позволяет создавать связанные объекты,
 * не привязываясь к конкретным классам.
 */

/*
 * В простых словах, паттерн Abstract Factory позволяет создавать семейства объектов,
 * которые взаимодействуют друг с другом и отвечают определенным требованиям,
 * но не зависят от конкретных классов этих объектов.
 */
<?php

// Абстрактный продукт A
interface AbstractProductA {
    public function getProduct(): string;
}

// Конкретный продукт A1
class ConcreteProductA1 implements AbstractProductA {
    public function getProduct(): string {
        return "Product A1";
    }
}

// Конкретный продукт A2
class ConcreteProductA2 implements AbstractProductA {
    public function getProduct(): string {
        return "Product A2";
    }
}

// Абстрактный продукт B
interface AbstractProductB {
    public function getProduct(): string;
}

// Конкретный продукт B1
class ConcreteProductB1 implements AbstractProductB {
    public function getProduct(): string {
        return "Product B1";
    }
}

// Конкретный продукт B2
class ConcreteProductB2 implements AbstractProductB {
    public function getProduct(): string {
        return "Product B2";
    }
}

// Фабрика продуктов
class ProductFactory
{
    public static function createProductA1(string $type): AbstractProductA
    {
        return new ConcreteProductA1();
    }

    public static function createProductA2(string $type): AbstractProductA
    {
        return new ConcreteProductA2();
    }

    public static function createProductB1(string $type): AbstractProductB
    {
        return new ConcreteProductB1();
    }
    public static function createProductB2(string $type): AbstractProductB
    {
        return new ConcreteProductB2();
    }
}


// Клиентский код
$productA = ProductFactory::createProductA1('A1');

echo $productA->getProduct() . "\n";

