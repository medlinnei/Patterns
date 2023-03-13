<?php
/*
 * Шаблон Visitor позволяет добавлять новые операции для группы объектов,
 * не изменяя их классы. Например, если у вас есть набор объектов разных
 * классов (например, круги, квадраты, треугольники), то каждый объект может принимать визитора,
 * который добавляет новую операцию для этого
 * объекта (например, вычисление площади или периметра). Для реализации этого шаблона
 * используется два компонента: визитор (Visitor), который определяет новые
 * операции для группы объектов, и объект (Object), который принимает
 * визитора и вызывает соответствующую операцию. Важно,
 * что объекты могут быть разных классов, но должны иметь общий интерфейс принятия
 * визитора, чтобы визитор мог вызывать операции для каждого объекта.
 */
interface WorkerVisitor
{
    public function VisitDeveloper(Worker $worker);
    public function VisitDesigner(Worker $worker);
}

class RecordedVisitor implements WorkerVisitor
{
    private array $visited = [];

    /**
     * @return array
     */
    public function getVisited(): array
    {
        return $this->visited;
    }
    public function VisitDeveloper(Worker $developer)
    {
       $this->visited[] = $developer;
    }

    public function VisitDesigner(Worker $designer)
    {
        $this->visited[] = $designer;
    }
}

interface Worker
{
    public function work();
    public function accept(WorkerVisitor $visitor);
}

class Developer implements Worker
{
    public function accept(WorkerVisitor $visitor)
    {
        $visitor->VisitDeveloper($this);
    }
    public function work()
    {
        printf("developer is working");
    }
}

class Designer implements Worker
{
    public function accept(WorkerVisitor $visitor)
    {
        $visitor->VisitDesigner($this);
    }
    public function work()
    {
        printf("designer is working");
    }
}

$visitor = new RecordedVisitor();

$developer = new Developer();
$designer = new Designer();

$developer->accept($visitor);
$designer->accept($visitor);

var_dump($visitor->getVisited());