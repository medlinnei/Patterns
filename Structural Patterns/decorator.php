<?php
/*
 * Шаблон проектирования Decorator используется для добавления нового поведения или функциональности
 * к объекту, не изменяя его исходного класса.
 */

/*
 * При использовании шаблона Decorator создается класс-декоратор,
 * который содержит ссылку на исходный объект и добавляет новые методы или свойства.
 * Декоратор оборачивает исходный объект, добавляя новую функциональность или модифицируя его поведение.
 */

interface Window
{
    public function open();
    public function close();
    public function display();
}

class BasicWindow implements Window
{
    public function open()
    {
        echo "Window is opened\n";
    }
    public function close()
    {
        echo "Window is closed\n";
    }
    public function display()
    {
        echo "Window is displayed\n";
    }
}

abstract class WindowDecorator implements Window
{
    protected $window;

    public function __construct(Window $window)
    {
        $this->window = $window;
    }

    public function open()
    {
        $this->window->open();
    }

    public function close()
    {
        $this->window->close();
    }

    public function display()
    {
        $this->window->display();
    }
}

// Использование

$window = new BasicWindow();

$window->open(); // "Window is opened"
$window->display(); // "Window is displayed\nWindow can be dragged"
$window->close(); // "Window is closed"
