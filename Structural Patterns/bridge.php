<?php

/*
 * Шаблон Bridge используется для разделения абстракции и реализации,
 * чтобы они могли изменяться независимо друг от друга.
 * Он позволяет отделить абстракцию (интерфейс или абстрактный класс) от ее конкретной реализации.
 */

/*
 * В основе шаблона Bridge лежит создание двух иерархий классов:
 * одна иерархия представляет абстракцию, а другая - ее реализацию.
 * Классы из этих иерархий связываются между собой мостом (bridge),
 * что позволяет изменять одну иерархию, не затрагивая другую
 */
interface Formatter
{
    public function format($str): string;
}

class SimpleText implements Formatter
{

    public function format($str): string
    {
        return $str;
    }
}

class HTMLText implements Formatter
{

    public function format($str): string
    {
        return "<p>$str</p>";
    }
}

abstract class BridgeService
{
    public Formatter $formatter;

    /**
     * @param Formatter $formatter
     */
    public function __construct(Formatter $formatter)
    {
        $this->formatter = $formatter;
    }

    abstract public function getFormatter($str): string;
}

class SimpleTextService extends BridgeService
{

    public function getFormatter($str): string
    {
       return $this->formatter->format($str);
    }
}

class HTMLTextService extends BridgeService
{

    public function getFormatter($str): string
    {
        return $this->formatter->format($str);
    }
}

$simpleText = new SimpleText();
$htmlText = new HTMLText();

$simpleTextService = new SimpleTextService($simpleText);
$htmlTextService = new HTMLTextService($htmlText);

var_dump($simpleTextService->getFormatter("Hello"));
var_dump($htmlTextService->getFormatter("Hello"));

