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

<?php

// Загальний інтерфейс компонентів.
interface DataSource
{
    public function WriteData($data);
    public function ReadData();
}

// Один з конкретних компонентів реалізує базову
// функціональність.
class FileDataSource implements DataSource
{

    public function WriteData($data)
    {
        echo ("Запись данных");
    }

    public function ReadData()
    {
        echo ("Прочитать данные из файла");
    }
}
// Базовий клас усіх декораторів містить код обгортування.
class DataSourceDecorator implements DataSource
{
    public DataSource $dataSource;

    /**
     * @param DataSource $dataSource
     */
    public function __construct(DataSource $dataSource)
    {
        $this->dataSource = $dataSource;
    }

    public function WriteData($data)
    {
        $this->dataSource->WriteData(13);
    }

    public function ReadData()
    {
        return $this->dataSource->ReadData();
    }
}

// Конкретні декоратори додають щось своє до базової поведінки
// обгорнутого компонента.
class EncryptionDecorator implements DataSource
{
    public function WriteData($data)
    {
        echo "Зашифровать поданные данные";
    }
    public function ReadData()
    {
        echo "Прочитать зашифрованные данные";
    }
}
//Створення Базових класів усіх декораторів в якій міститься клас який наслідується від інтерфейсу
$dataSource = new DataSourceDecorator(new EncryptionDecorator());
$dataSource->ReadData();

