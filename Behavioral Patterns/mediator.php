<?php
/*
 * Паттерн посредник (Mediator) - это способ организации взаимодействия между
 * объектами таким образом, чтобы они не зависели друг от друга напрямую.
 * Вместо этого, объекты общаются через специальный объект-посредник,
 * который контролирует и регулирует их взаимодействие.
 */
/*
 * Паттерн посредник позволяет разделить сложную систему на более простые компоненты,
 * которые легче понимать и поддерживать.
 * Объекты не знают друг о друге напрямую и не могут вызывать методы друг друга,
 * а только сообщают о своих действиях посреднику. Посредник же, в свою очередь,
 * реагирует на эти сообщения и управляет взаимодействием между объектами.
 */
<?php

interface Mediator
{
    public function getComponents();
}

class ConcreteComponents
{
    private string $component3 = "Component 3";

    /**
     * @return string
     */
    public function getComponent3(): string
    {
        return $this->component3;
    }

}
class ComponentsConcreteMediator implements Mediator
{
    public ComponentOne $componentOne;
    public ComponentTwo $componentTwo;
    public ConcreteComponents $concreteComponents;

    /**
     * @param ComponentOne $componentOne
     * @param ComponentTwo $componentTwo
     */
    public function __construct(ComponentOne $componentOne, ComponentTwo $componentTwo, $concreteComponents)
    {
        $this->concreteComponents = $concreteComponents;
        $this->componentOne = $componentOne;
        $this->componentTwo = $componentTwo;
    }
    public function getComponents()
    {
       echo $this->concreteComponents->getComponent3();
       echo $this->componentOne->getComponent1();
       echo $this->componentTwo->getComponent2();
    }

}
class ComponentOne extends ComponentsConcreteMediator
{
    private string $component1;

    /**
     * @return string
     */
    public function getComponent1(): string
    {
        return $this->component1;
    }

    /**
     * @param string $component1
     */
    public function __construct(string $component1)
    {
        $this->component1 = $component1;
    }

}
class ComponentTwo extends ComponentsConcreteMediator
{
    private string $component2;

    /**
     * @return string
     */
    public function getComponent2(): string
    {
        return $this->component2;
    }

    /**
     * @param string $component2
     */
    public function __construct(string $component2)
    {
        $this->component2 = $component2;
    }

}

$component1 = new ComponentOne("Component 1");
$component2 = new ComponentTwo("Component 2");
$concreteComponents = new ConcreteComponents();

$components = new ComponentsConcreteMediator($component1, $component2, $concreteComponents);
$components->getComponents();
