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

interface Command
{
    public function exeute();
}

interface Undoable extends Command
{
    public function undo();
}

class Output
{
    private bool $isEnable = true;
    private string $body = "";

    /**
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }

    public function write($str)
    {
        if($this->isEnable){
            $this->body = $str;
        }
    }

    public function enable()
    {
        $this->isEnable = true;
    }

    public function disable()
    {
        $this->isEnable = false;
    }
}

class Invoker
{
    private Command $command;

    /**
     * @param Command $command
     */
    public function setCommand(Command $command): void
    {
        $this->command = $command;
    }
    public function run()
    {
        $this->command->exeute();
    }
}

class Message implements Command
{
    private Output $output;

    /**
     * @param Output $output
     */
    public function __construct(Output $output)
    {
        $this->output = $output;
    }

    public function exeute()
    {
        $this->output->write("some string from execute");
    }
}

class ChangerStatus implements Undoable
{
    private Output $output;

    /**
     * @param Output $output
     */
    public function __construct(Output $output)
    {
        $this->output = $output;
    }

    public function exeute()
    {
        $this->output->enable();
    }

    public function undo()
    {
        $this->output->disable();
    }
}

$output = new Output();
$invoker = new Invoker();
$messege = new Message($output);

$undoable = new ChangerStatus($output);
$undoable->undo();

$messege->exeute();
var_dump($output->getBody());
