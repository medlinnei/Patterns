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
abstract class Expression
{
    abstract public function interpret(Context $context): bool;
}

class Context
{
    private array $workers = [];

    public function setWorkers(string $workers): void
    {
        $this->workers[] = $workers;
    }

    public function lookUp($key): string|bool
    {
        if(isset($this->workers[$key])){
            return $this->workers[$key];
        }
        return false;
    }
}

class VariableExp extends Expression
{
    private int $key;

    /**
     * @param int $key
     */
    public function __construct(int $key)
    {
        $this->key = $key;
    }

    public function interpret(Context $context): bool
    {
        return $context->lookUp($this->key);
    }
}

class AndExp extends Expression
{
    private int $keyOne;
    private int $keyTwo;

    /**
     * @param int $keyOne
     * @param int $keyTwo
     */
    public function __construct(int $keyOne, int $keyTwo)
    {
        $this->keyOne = $keyOne;
        $this->keyTwo = $keyTwo;
    }

    public function interpret(Context $context): bool
    {
        return $context->lookUp($this->keyOne) and $context->lookUp($this->keyOne);
    }
}

class OrExp extends Expression
{
    private int $keyOne;
    private int $keyTwo;

    /**
     * @param int $keyOne
     * @param int $keyTwo
     */
    public function __construct(int $keyOne, int $keyTwo)
    {
        $this->keyOne = $keyOne;
        $this->keyTwo = $keyTwo;
    }

    public function interpret(Context $context): bool
    {
        return $context->lookUp($this->keyOne) or $context->lookUp($this->keyOne);
    }
}

$context = new Context();
$context->setWorkers("Ivan");
$context->setWorkers("Alex");

$varExp = new VariableExp(1);
$andExp = new AndExp(2, 5);
$orExp = new OrExp(1, 3);

var_dump($varExp->interpret($context));
var_dump($andExp->interpret($context));
var_dump($orExp->interpret($context));