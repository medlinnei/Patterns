Можешь определить какой это паттерн? <?php

class Functions
{
    public function functionOne(): string
    {
        return "Реалізація складної функції 1" . PHP_EOL;
    }
    public function functionTwo(): string
    {
        return "Реалізація складної функції 2". PHP_EOL;
    }
    public function functionThre(): string
    {
        return "Реалізація складної функції 3". PHP_EOL;
    }
}
class Reales
{
    private Functions $functions;

    /**
     * @param Functions $functions
     */
    public function __construct(Functions $functions)
    {
        $this->functions = $functions;
    }

    /**
     * @return mixed
     */
    public function getComponents(): string
    {
        $result = $this->functions->functionOne();
        $result .= $this->functions->functionTwo();
        $result .= $this->functions->functionThre();
        return $result;
    }
}

$function = new Functions();
$factory = new Reales($function);
echo $factory->getComponents();
