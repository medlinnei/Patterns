<?php
/*
 * Паттерн Command (или "команда") - это способ организации кода,
 * который позволяет отделить запрос от выполнения действий.
 */

/*
 * В этом паттерне есть объекты "команды", которые содержат в себе информацию о том,
 * какое действие нужно выполнить и над каким объектом.
 * Эти объекты можно передавать между разными частями программы,
 * что позволяет удобно управлять выполнением операций.
 */

<?php

interface Command {
    public function execute();
}

class BinaryCode
{
    public function zero()
    {
        echo "0";
    }
    public function one()
    {
        echo "1";
    }
}

class ComandOne implements Command
{
    private BinaryCode $binaryCode;

    /**
     * @param BinaryCode $binaryCode
     */
    public function __construct(BinaryCode $binaryCode)
    {
        $this->binaryCode = $binaryCode;
    }

    public function execute()
    {
        $this->binaryCode->one();
    }
}
class CommandZero
{
    private BinaryCode $binaryCode;

    /**
     * @param BinaryCode $binaryCode
     */
    public function __construct(BinaryCode $binaryCode)
    {
        $this->binaryCode = $binaryCode;
    }

    public function execute()
    {
        $this->binaryCode->zero();
    }
}

class Remote
{
    public Command $command;

    /**
     * @param Command $command
     */
    public function setCommand(Command $command): void
    {
        $this->command = $command;
    }
    public function execute()
    {
        $this->command->execute();
    }
}

$binaryCode = new BinaryCode();
$remote = new Remote();
$commandone = new ComandOne($binaryCode);
$commandone->execute();
