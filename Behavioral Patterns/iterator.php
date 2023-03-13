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
class WorkerList
{
    private array $list = [];
    private int $index = 0;

    /**
     * @return int
     */
    public function getIndex(): int
    {
        return $this->index;
    }

    /**
     * @param int $index
     */
    public function setIndex(int $index): void
    {
        $this->index = $index;
    }


    /**
     * @return array
     */
    public function getList(): array
    {
        return $this->list;
    }

    /**
     * @param array $list
     */
    public function setList(array $list): void
    {
        $this->list = $list;
    }

    public function getItem($key): ?Worker
    {
        if($this->list[$key])
        {
            return $key;
        }
        return null;
    }

    public function next()
    {
        if($this->index < count($this->list) - 1) {
            $this->index++;
        }
    }

    public function prev()
    {
        $this->index--;
    }

    public function getByIndex(): Worker
    {
        return $this->list[$this->index];
    }
}

class Worker
{
    private string $name = "";

    /**
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}

$worker = new Worker("Ivan");
$workerTwo = new Worker("Alex");
$workerThree = new Worker("Kate");

$workerList = new WorkerList();
$workerList->setList([$worker, $workerTwo, $workerThree]);
$workerList->next();

var_dump($workerList->getByIndex()->getName());