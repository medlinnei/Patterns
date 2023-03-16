<?php
/*
 * Паттерн Strategy - это шаблон проектирования, который позволяет объекту
 * выбирать алгоритм выполнения задачи во время выполнения программы.
 */

/*
 * Представьте, что у нас есть объект, который может выполнять задачу,
 * например, сортировку данных. Вместо того, чтобы включать алгоритм сортировки внутрь объекта,
 * мы создаем отдельный класс для каждого алгоритма и передаем нужный класс объекту,
 * который будет выполнять сортировку.
 */

interface User
{
    public function oplata();
}

class Contest
{
    private User $user;

    /**
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function infoPay()
    {
        $this->user->oplata();
    }


}

class Card implements User
{

    public function oplata()
    {
       echo "Опалата картою" . PHP_EOL;
    }
}

class Nal implements User
{

    public function oplata()
    {
        echo "Опалата налічкою" . PHP_EOL;
    }
}

$oplata = new Contest(new Card());

$oplata->infoPay();
