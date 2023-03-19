<?php
/*
 * Паттерн итератор (Iterator) - это способ доступа к элементам коллекции
 * (например, списку, массиву или словарю) один за другим,
 * без необходимости знать детали реализации коллекции.
 * Он позволяет перебирать элементы коллекции без изменения самой коллекции,
 * и делает этот процесс удобным и простым для использования.
 */

/*
 * Как правило, паттерн итератор используется совместно с циклом for-each или while,
 * чтобы обойти все элементы коллекции и выполнить нужные операции с каждым элементом.
 * При этом код становится более читабельным и легко поддерживаемым,
 * так как не нужно каждый раз повторять один и тот же код для доступа к элементам коллекции.
 */

class MeIterator implements Iterator
{
    public $iterator;
    public array $name = [];

    /**
     * @return array
     */
    public function getName(): array
    {
        return $this->name;
    }

    /**
     * @param array $name
     */
    public function setName(array $name): void
    {
        $this->name = $name;
    }

    public function current(): mixed
    {
        return $this->name[$this->iterator];
    }

    public function next(): void
    {
        ++$this->iterator;
    }

    public function key(): mixed
    {
        return $this->iterator;
    }

    public function valid(): bool
    {
        return isset($this->name[$this->iterator]);
    }

    public function rewind(): void
    {
        $this->iterator = 0;
    }
}

$name = ["Alex", "Ivan", "Kate"];
$it = new MeIterator();
$it->setName($name);

foreach($it as $iterator => $name) {
    echo "$iterator: $name". PHP_EOL;
}
