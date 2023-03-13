<?php
/*
 * Паттерн Specification - это способ определить правила или критерии,
 * по которым можно проверить, соответствует объект (например, продукт в интернет-магазине)
 * заданным требованиям или нет.
 */

/*
 * Обычно вы создаете специальный объект, который содержит критерии и правила,
 * которые должны быть выполнены для удовлетворения требований.
 * После создания объекта Specification вы можете проверить,
 * соответствует ли объект этим критериям или нет.
 */
interface Specification
{
    public function isNormal(Pupil $pupil): bool;
}

class Pupil
{
    private int $rate = 0;

    /**
     * @return int
     */
    public function getRate(): int
    {
        return $this->rate;
    }

    /**
     * @param int $rate
     */
    public function __construct(int $rate)
    {
        $this->rate = $rate;
    }
}

class PupilSpecification implements Specification
{

    private int $needRate = 0;

    /**
     * @param int $needRate
     */
    public function __construct(int $needRate)
    {
        $this->needRate = $needRate;
    }

    public function isNormal(Pupil $pupil): bool
    {
        return $this->needRate < $pupil->getRate();
    }
}

class AndSpecification implements Specification
{
    private array $specification;

    /**
     * @param array $specification
     */
    public function __construct(Specification... $specification)
    {
        $this->specification = $specification;
    }

    public function isNormal(Pupil $pupil): bool
    {
        foreach ($this->specification as $specification){
            if(!$specification->isNormal($pupil)){
                return false;
            }
        }
        return true;
    }
}

class OrSpecification implements Specification
{
    private array $specification;

    /**
     * @param array $specification
     */
    public function __construct(Specification ...$specification)
    {
        $this->specification = $specification;
    }

    public function isNormal(Pupil $pupil): bool
    {
        foreach ($this->specification as $specification){
            if($specification->isNormal($pupil)){
                return true;
            }
        }
        return false;
    }
}

class NotSpecification implements Specification
{
    private Specification $specification;

    /**
     * @param Specification $specification
     */
    public function __construct(Specification $specification)
    {
        $this->specification = $specification;
    }

    public function isNormal(Pupil $pupil): bool
    {
        return !$this->specification->isNormal($pupil);
    }
}

$specificationOne = new PupilSpecification(10);
$specificationTwo = new PupilSpecification(10);

$pupil = new Pupil(11);

$andSpecification = new AndSpecification($specificationOne, $specificationTwo);

var_dump($andSpecification->isNormal($pupil));
