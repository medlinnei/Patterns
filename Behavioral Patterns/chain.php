<?php
/*
 * Паттерн Chain of Responsibility (Цепочка обязанностей) позволяет передавать
 * запросы по цепочке объектов, пока один из них не обработает запрос.
 * Каждый объект в цепочке имеет возможность обработать запрос или передать его
 * дальше по цепочке. Таким образом, паттерн позволяет динамически определять,
 * какой объект будет обрабатывать запрос в зависимости от его характеристик.
 * Это может быть полезно, например, для обработки ошибок в программе,
 * когда необходимо найти объект, который может обработать конкретную ошибку.
 */
<?php

abstract class Chain
{
    protected $binaryCode;
    public function setBinaryCode($binaryCode)
    {
        $this->binaryCode = $binaryCode;
    }
    abstract public function getBinaryCode($request);
}
class BinaryOne extends Chain
{
    public function getBinaryCode($request)
    {
        if ($request == "BinaryOne"){
            echo "BinaryOne";
        }elseif ($this->binaryCode){
            $this->binaryCode->getBinaryCode($request);
        }
    }
}
class BinaryTwo extends Chain
{

    public function getBinaryCode($request)
    {
        if ($request == "BinaryOne")
        {
            echo "BinaryOne";
        }elseif ($this->binaryCode){
            $this->binaryCode->getBinaryCode($request);
        }
    }
}

$binaryCodeOne = new BinaryOne();
$binaryCodeTwo = new BinaryTwo();
$binaryCodeOne->setBinaryCode($binaryCodeTwo);

$binaryCodeOne->getBinaryCode("BinaryOne");
