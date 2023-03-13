<?php

/*
 * Паттерн Flyweight - это способ экономного использования памяти и увеличения
 * производительности программы, путем разделения данных на общие и уникальные части.
 */

/*
 * Вместо создания отдельного объекта для каждой уникальной части данных,
 * мы используем общие объекты для всех элементов,
 * которые имеют одинаковые свойства. Таким образом, мы избегаем создания лишних объектов,
 * что уменьшает потребление памяти и ускоряет выполнение программы.
 */
interface Mail
{
    public function render(): string;
}

abstract class TypeMail
{
    private string $text;

    /**
     * @param string $text
     */
    public function __construct(string $text)
    {
        $this->text = $text;
    }
    public function getText()
    {
        return $this->text;
    }
}

class BusinessMail extends TypeMail implements Mail
{
    public function render(): string
    {
        return $this->getText() . "from business mail";
    }

}

class JobMail extends TypeMail implements Mail
{
    public function render(): string
    {
        return $this->getText() . "from job mail";
    }

}

class MailFactory
{
    private array $pool = [];

    public function getMail($id, $typeMail): Mail
    {
        if(!isset($this->pool[$id])){
            $this->pool[$id] = $this->make($typeMail);
        }
        return $this->pool[$id];
    }

    private function make($typeMail): Mail
    {
        if($typeMail === "business"){
            return new BusinessMail("Business text ");
        }
        return new JobMail("Job text ");
    }
}

$mailFactory = new MailFactory();
$mail = $mailFactory->getMail(10, "business");
var_dump($mail->render());