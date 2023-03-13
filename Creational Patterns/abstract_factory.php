<?php
/*
 * Паттерн Abstract Factory - является паттерном проектирования
 * программного обеспечения, который позволяет создавать связанные объекты,
 * не привязываясь к конкретным классам.
 */

/*
 * В простых словах, паттерн Abstract Factory позволяет создавать семейства объектов,
 * которые взаимодействуют друг с другом и отвечают определенным требованиям,
 * но не зависят от конкретных классов этих объектов.
 */
interface AbstractFactory
{
    public static function makeDeveloperWorker(): DeveloperWorker;
    public static function makeDesignerWorker(): DesignerWorker;
}

class OutsourceWorkerFactory implements AbstractFactory
{

    public static function makeDeveloperWorker(): DeveloperWorker
    {
        return new OutsourceDeveloperWorker();
    }

    public static function makeDesignerWorker(): DesignerWorker
    {
        return new OutsourceDesignerWorker();
    }
}

class NativeWorkerFactory implements AbstractFactory
{

    public static function makeDeveloperWorker(): DeveloperWorker
    {
        return new NativeDeveloperWorker();
    }

    public static function makeDesignerWorker(): DesignerWorker
    {
        return new NativeDesignerWorker();
    }
}

interface Worker
{
    public function work();
}
interface DeveloperWorker extends Worker
{

}

interface DesignerWorker extends Worker
{

}

class NativeDeveloperWorker implements DeveloperWorker
{

    public function work()
    {
        print_r("I`m developing as native");
    }
}

class OutsourceDeveloperWorker implements DeveloperWorker
{

    public function work()
    {
        print_r("I`m developing as outsource");
    }
}

class NativeDesignerWorker implements DesignerWorker
{

    public function work()
    {
        print_r("I`m designer as native");
    }
}

class OutsourceDesignerWorker implements DesignerWorker
{

    public function work()
    {
        print_r("I`m designer as outsource");
    }
}

$nativeDeveloper = NativeWorkerFactory::makeDeveloperWorker();
$outsourceDeveloper = OutsourceWorkerFactory::makeDeveloperWorker();
$nativeDesigner = NativeWorkerFactory::makeDesignerWorker();
$outsourceDesigner = OutsourceWorkerFactory::makeDesignerWorker();

$nativeDesigner->work();


