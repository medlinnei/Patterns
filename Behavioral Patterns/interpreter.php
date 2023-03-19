<?php
/*
 * Паттерн Interpreter (или "интерпретатор") - это способ организации кода,
 * который позволяет интерпретировать и выполнять различные языки
 * программирования или специализированные языки.
 */

/*
 * В этом паттерне есть объект "интерпретатор",
 * который содержит логику интерпретации и выполнения определенных команд или выражений.
 * Он может принимать на вход данные в виде текстовой
 * строки или каких-то других форматов, а затем обрабатывать их с помощью разных правил и алгоритмов.
 */

interface Inpreter
{
    public function interpret(): int;
}

class Number implements Inpreter
{
    public int $number;

    /**
     * @param int $number
     */
    public function __construct(int $number)
    {
        $this->number = $number;
    }

    public function interpret(): int
    {
        return $this->number;
    }
}
class Plus implements Inpreter
{
    public Inpreter $exp1;
    public Inpreter $exp2;

    /**
     * @param Inpreter $exp1
     * @param Inpreter $exp2
     */
    public function __construct(Inpreter $exp1, Inpreter $exp2)
    {
        $this->exp1 = $exp1;
        $this->exp2 = $exp2;
    }

    public function interpret(): int
    {
        return $this->exp1->interpret() + $this->exp2->interpret();
    }
}
class Minus implements Inpreter
{
    public Inpreter $exp1;
    public Inpreter $exp2;

    /**
     * @param Inpreter $exp1
     * @param Inpreter $exp2
     */
    public function __construct(Inpreter $exp1, Inpreter $exp2)
    {
        $this->exp1 = $exp1;
        $this->exp2 = $exp2;
    }

    public function interpret(): int
    {
        return $this->exp1->interpret() - $this->exp2->interpret();
    }
}

class Multiply implements Inpreter
{
    public Inpreter $exp1;
    public Inpreter $exp2;

    /**
     * @param Inpreter $exp1
     * @param Inpreter $exp2
     */
    public function __construct(Inpreter $exp1, Inpreter $exp2)
    {
        $this->exp1 = $exp1;
        $this->exp2 = $exp2;
    }

    public function interpret(): int
    {
        return $this->exp1->interpret() * $this->exp2->interpret();
    }
}

$expression = new Plus(new Number(10), new Multiply(new Number(2), new Number(10)));
echo $expression->interpret();
