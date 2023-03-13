<?php

/*
 * Паттерн Composite - это паттерн проектирования,
 * который используется для организации объектов в древовидную
 * структуру и работы с ней как с одним целым.
 */

/*
 * Вместо того, чтобы работать с отдельными объектами,
 * мы группируем их в древовидную структуру,
 * где каждый узел может содержать как отдельный объект,
 * так и другие группы объектов. Затем мы можем работать с этой структурой
 * как с одним объектом, вызывая методы узлов или групп узлов.
 */
interface Renderable
{
    public function render(): string;
}

class Mail implements Renderable
{
    private array $parts = [];
    public function render(): string
    {
        $result = " ";
        foreach ($this->parts as $part){
            $result .= $part->render();
        }
        return $result;
    }

    public function addPart(Renderable $part)
    {
        $this->parts[] = $part;
    }
}

abstract class Part
{
    private string $text;

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text . PHP_EOL;
    }

    /**
     * @param string $text
     */
    public function __construct(string $text)
    {
        $this->text = $text;
    }
}

class Headers extends Part implements Renderable
{
    public function render(): string
    {
        return $this->getText();
    }
}
class Body extends Part implements Renderable
{
    public function render(): string
    {
        return $this->getText();
    }
}
class Footer extends Part implements Renderable
{
    public function render(): string
    {
        return $this->getText();
    }
}

$mail = new Mail();

$mail->addPart(new Headers("Header"));
$mail->addPart(new Body("Body"));
$mail->addPart(new Footer("Footer"));

var_dump($mail->render());