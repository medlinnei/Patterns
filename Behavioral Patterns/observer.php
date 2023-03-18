<?php
/*
 * Шаблон Observer позволяет объектам следить за изменениями состояния других объектов и реагировать
 * на них соответствующим образом. Например, если у вас есть список подписчиков на новости,
 * то каждый подписчик может быть объектом-наблюдателем,
 * который получает уведомление о новом событии и может обновить свою информацию.
 * Для реализации этого шаблона используется два компонента: наблюдаемый объект (Subject),
 * который отслеживает изменения своего состояния и оповещает об этом наблюдателей;
 * и наблюдатель (Observer), который получает уведомление о изменениях и может обновить свою информацию. Важно,
 * что объекты-наблюдатели могут добавляться и удаляться динамически во время работы программы.
 */

class Worker implements SplSubject
{
    public SplObjectStorage $splObjectStorage;

    /**
     * @param SplObjectStorage $splObjectStorage
     */
    public function __construct()
    {
        $this->splObjectStorage = new splObjectStorage();
    }

    public function changeName(string $name)
    {
        $this->name = $name;
        $this->notify();
    }
    public function attach(SplObserver $observer): void
    {
        $this->splObjectStorage->attach($observer);
    }

    public function detach(SplObserver $observer): void
    {
        $this->splObjectStorage->detach($observer);
    }

    public function notify(): void
    {
        foreach ($this->splObjectStorage as $splObserver) {
            $splObserver->update($this);
        }
    }
}

class Observer implements SplObserver
{
    public array $workers = [];

    /**
     * @return array
     */
    public function getWorkers(): array
    {
        return $this->workers;
    }

    public function update(SplSubject $subject): void
    {
        $this->workers[] = clone $subject;
    }
}

$worker = new Worker();
$observer = new Observer();

$worker->attach($observer);
$worker->changeName("Ivan");

var_dump($observer->getWorkers());
