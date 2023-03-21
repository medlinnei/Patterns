<?php

/*
 * Шаблон Bridge используется для разделения абстракции и реализации,
 * чтобы они могли изменяться независимо друг от друга.
 * Он позволяет отделить абстракцию (интерфейс или абстрактный класс) от ее конкретной реализации.
 */

/*
 * В основе шаблона Bridge лежит создание двух иерархий классов:
 * одна иерархия представляет абстракцию, а другая - ее реализацию.
 * Классы из этих иерархий связываются между собой мостом (bridge),
 * что позволяет изменять одну иерархию, не затрагивая другую
 */

abstract class Student
{
    protected $collage;
    /**
     * @param $collage
     */
    public function __construct($collage)
    {
        $this->collage = $collage;
    }
   abstract public function collage();
}
class StudentUKD extends Student
{
    public function collage()
    {
        echo "Student ";
        $this->collage->collage();
    }
}
class StudentPNU extends Student
{

    public function collage()
    {
        echo "Student ";
        $this->collage->collage();
    }
}
interface Collage
{
    public function collage();
}

class CollageUKD implements Collage
{
    public function collage()
    {
        echo "CollageUKD" . PHP_EOL;
    }
}
class CollagePNU implements Collage
{
    public function collage()
    {
        echo "CollagePNU" . PHP_EOL;
    }
}
$pnu = new StudentPNU(new CollagePNU());
$pnu->collage();
$ukd = new StudentUKD(new CollageUKD());
$ukd->collage();
