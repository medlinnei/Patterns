<?php
/*
 * Шаблон проектирования Data Mapper используется для отделения объектов предметной
 * области от базы данных, которая хранит данные.
 */

/*
 * Как правило, приложениям нужно получать данные из базы данных и затем использовать
 * эти данные для выполнения каких-то операций,
 * например, отображения на веб-странице или обработки в бизнес-логике.
 * Data Mapper позволяет изолировать код, который работает с базой данных, от остального кода приложения.
 */
class Worker
{
    private string $name;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public static function make($args): Worker
    {
        return new self($args["name"]);
    }
}

class WorkerMapper
{
    private WorkerStorageAdapter $workerStorageAdapter;

    /**
     * @param WorkerStorageAdapter $workerStorageAdapter
     */
    public function __construct(WorkerStorageAdapter $workerStorageAdapter)
    {
        $this->workerStorageAdapter = $workerStorageAdapter;
    }

    public function findById($id): Worker|string
    {
        $res = $this->workerStorageAdapter->find($id);

        if($res === null){
            return "Worker with this id doesnt exists";
        }
        return $this->make($res);
    }
    private function make($args): Worker
    {
        return Worker::make($args);
    }
}

class WorkerStorageAdapter
{
    private array $data = [];

    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function find($id): array|null
    {
        if(isset($this->data[$id])){
            return $this->data[$id];
        }else{
            return null;
        }
    }
}

$data = [
    1 => [
        "name" => "Ivan",
    ],
];

$workerStorageAdapter = new WorkerStorageAdapter($data);
$workerMapper = new WorkerMapper($workerStorageAdapter);

$worker = $workerMapper->findById(1);

var_dump($worker->getName());