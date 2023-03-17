<?php
/*
 * Шаблон Visitor позволяет добавлять новые операции для группы объектов,
 * не изменяя их классы. Например, если у вас есть набор объектов разных
 * классов (например, круги, квадраты, треугольники), то каждый объект может принимать визитора,
 * который добавляет новую, операцию для этого
 * объекта (например, вычисление площади или периметра). Для реализации этого шаблона
 * используется два компонента: визитор (Visitor), который определяет новые
 * операции для группы объектов, и объект (Object), который принимает
 * визитора и вызывает соответствующую операцию. Важно,
 * что объекты могут быть разных классов, но должны иметь общий интерфейс принятия
 * визитора, чтобы визитор мог вызывать операции для каждого объекта.
 *
 * Є схема на https://refactoring.guru/ru/design-patterns/visitor
 */


interface Visitor
{
    public function ElementA(ConcreteElementA $concreteElementA);
    public function ElementB(ConcreteElementB $concreteElementB);
}

interface ElementVisitor
{
    public function accept(Visitor $visitor);
}

class ConcreteVisitor implements Visitor
{

    public function ElementA(ConcreteElementA $concreteElementA)
    {
        $concreteElementA->futureA($this);
    }

    public function ElementB(ConcreteElementB $concreteElementB)
    {
        $concreteElementB->futureB($this);
    }
}

class ConcreteElementA implements ElementVisitor
{
    public function futureA(Visitor $visitor)
    {
        echo "Visit Element A". PHP_EOL;
    }

    public function accept(Visitor $visitor)
    {
        $visitor->ElementA($this);
    }
}
class ConcreteElementB implements ElementVisitor
{

    public function futureB(Visitor $visitor)
    {
        echo "Visit Element B". PHP_EOL;
    }
    public function accept(Visitor $visitor)
    {
        $visitor->ElementB($this);
    }
}

$elementA = new ConcreteElementA();
$elementB = new ConcreteElementB();

$concreteVisitor = new ConcreteVisitor();

$concreteVisitor->ElementA($elementA);
