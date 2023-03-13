<?php
/*
 * Шаблон Template Method определяет основу для выполнения некоторой операции,
 * но позволяет подклассам изменять некоторые шаги алгоритма без изменения его общей структуры.
 * Например, если у вас есть базовый класс для готовки еды,
 * то каждый подкласс может переопределить некоторые шаги процесса
 * готовки (например, добавить свои ингредиенты или изменить время приготовления), но сохранить общую
 * последовательность шагов. Для реализации этого шаблона используется абстрактный
 * класс (Abstract Class), который определяет основу для выполнения операции,
 * а конкретные подклассы (Concrete Classes) реализуют некоторые шаги и добавляют свои специфические детали в процесс.
 * Важно, что последовательность шагов и общая структура операции остаются неизменными,
 * что позволяет избежать дублирования кода и упростить поддержку программы.
 */
abstract class Task
{
    public function printSection()
    {
        $this->printHeader();
        $this->printBody();
        $this->printFooter();
        $this->printCustom();
    }

    private function printHeader()
    {
        printf("Header" . PHP_EOL);
    }
    private function printBody()
    {
        printf("Body" . PHP_EOL);
    }
    private function printFooter()
    {
        printf("Footer" . PHP_EOL);
    }
    abstract protected function printCustom();
}

class DeveloperTask extends Task
{
    protected function printCustom()
    {
        printf("for developer" . PHP_EOL);
    }
}

class DesignerTask extends Task
{
    protected function printCustom()
    {
        printf("for designer" . PHP_EOL);
    }
}


$developerTask = new DeveloperTask();
$designerTask = new DesignerTask();

$developerTask->printSection();