<?php

class Car
{

    private string $color;
    private string $model;
    private string $naming;

   public function setColor($value)
   {
       return $this->naming = $value;
   }
   public function setModel($value)
   {
       return $this->model = $value;
   }
   public function setNaming($value)
   {
       return $this->color = $value;
   }
   public function getCar()
   {
       return [
           "naming" => $this->naming,
           "model" => $this->model,
           "color" => $this->color,
       ];
   }
}

class Builder
{
    protected $car;

    /**
     * @param $car
     */
    public function __construct()
    {
        $this->car = new Car();
    }
    public function setNaming($value)
    {
        $this->car->setNaming($value);
        return $this;
    }
    public function setModel($value)
    {
        $this->car->setModel($value);
        return $this;
    }
    public function setColor($value)
    {
        $this->car->setColor($value);
        return $this;
    }
    public function getCar()
    {
        return $this->car;
    }
}

$builder = new Builder();
$car = $builder->setNaming("Tesla")->setModel("X")->setColor("Black")->getCar();
print_r($car->getCar());