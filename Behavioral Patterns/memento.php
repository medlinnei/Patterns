<?php
/*
 * Шаблон проектирования Memento позволяет сохранять текущее состояние объекта и восстанавливать
 * его в будущем, не раскрывая деталей реализации объекта.
 * Это может быть полезно, например, для сохранения состояния игры или веб-формы,
 * чтобы пользователь мог вернуться к предыдущему состоянию,
 * если он ошибся или захотел изменить что-то.
 * Для реализации этого шаблона используются три компонента: хранитель (Memento),
 * который хранит состояние объекта; создатель (Originator), который создает и восстанавливает объекты из хранителя;
 * и смотритель (Caretaker), который управляет хранителем и создателем, чтобы сохранять и восстанавливать состояние объекта.
 */
class Memento
{
    private State $state;

    /**
     * @return State
     */
    public function getState(): State
    {
        return $this->state;
    }

    /**
     * @param State $state
     */
    public function __construct(State $state)
    {
        $this->state = $state;
    }
}

class State
{
    public const CREATED = "created";
    public const PROCESS = "process";
    public const TEST = "test";
    public const DONE = "done";

    private string $state;

    /**
     * @param string $state
     */
    public function __construct(string $state)
    {
        $this->state = $state;
    }

    public function __toString(): string
    {
        return  $this->state;
    }
}

class Task
{
    private State $state;

    public function create()
    {
        $this->state = new State(State::CREATED);
    }
    public function process()
    {
        $this->state = new State(State::PROCESS);
    }
    public function test()
    {
        $this->state = new State(State::TEST);
    }
    public function done()
    {
        $this->state = new State(State::DONE);
    }

    public function saveToMemento(): Memento
    {
        return new Memento($this->state);
    }
    public function restoreFromMemento(Memento $memento)
    {
        $this->state = $memento->getState();
    }

    public function getState(): State
    {
        return $this->state;
    }
}

$task = new Task();
$task->create();

$memento = $task->saveToMemento();
var_dump($memento->getState());