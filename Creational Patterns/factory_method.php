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

interface Product
{
    public function NameProduct(): string;
}

class ProductA implements Product
{

    public function NameProduct(): string
    {
        return "Product A";
    }
}
class ProductB implements Product
{

    public function NameProduct(): string
    {
        return "Product B";
    }
}

abstract class Create
{
    abstract public function createProduct(): Product;

    public function doSomething(): string
    {
        $product = $this->createProduct();
        return "I'm working with " . $product->NameProduct();
    }

}

class RealesProductA extends Create
{

    public function createProduct(): Product
    {
        return new ProductA();
    }
}

class RealesProductB extends Create
{
    public function createProduct(): Product
    {
        return new ProductB();
    }
}

$realesA = new RealesProductA();
echo $realesA->doSomething(). PHP_EOL;

$realesB = new RealesProductB();
echo $realesB->doSomething(). PHP_EOL;
