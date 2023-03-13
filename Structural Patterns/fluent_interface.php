<?php

/*
 * Шаблон Fluent Interface - это способ написания кода на языке программирования,
 * который позволяет вызывать методы объекта в цепочке, чтобы создать более читаемый и легко понятный код.
 */

/*
 * Вместо того чтобы вызывать методы объекта отдельно и передавать параметры каждый раз,
 * вы можете вызвать несколько методов в цепочке, применяя их последовательно к объекту.
 * Каждый метод возвращает объект, на котором можно вызывать следующий метод в цепочке.
 * Это позволяет создавать более читаемый и выразительный код,
 * поскольку каждый вызов метода следует за предыдущим и действия можно комбинировать в более сложные выражения.
 */
class QueryBuilder
{
    private array $select = [];
    private array $from = [];
    private array $where = [];

    public function select(array $select): QueryBuilder
    {
        $this->select = $select;
        return $this;
    }

    public function from($from): QueryBuilder
    {
        $this->from[] = $from;
        return $this;
    }

    public function where(array $where): QueryBuilder
    {
        $this->where = $where;
        return $this;
    }

    public function get(): string
    {
        return sprintf("SELECT %s FROM %s WHERE %s;",
            join(",", $this->select),
            join(",", $this->from),
            join("  AND  ", $this->where),
        );
    }

}

$queryBuilder = new QueryBuilder();

$query = $queryBuilder
    ->select(["title", "id"])
    ->from("posts")
    ->where(["view > 20"])
    ->get();

var_dump($query);