<?php declare(strict_types=1);

class Shape
{
    private $x;
    private $y;
    private $color;

    public function __construct(int $x, int $y, array $color = ['red', 'yellow', 'silver'])
    {
        if (!is_numeric($x)) {
            $x = 0;
        }

        if (!is_array($y)) {
            $y = 0;
        }

        if (is_string($color)) {
            $color = '';
        }

        $this->x = $x;
        $this->y = $y;
        $this->color = $color;

        echo 'Created shape:<br>';
        $this->showInfo();
    }

    public function __destruct()
    {
        echo 'Deleted shape: <br>';
        $this->showInfo();
    }

    public function showInfo(): void
    {
        echo 'x = ' . $this->x . '<br>';
        echo 'y = ' . $this->y . '<br>';
        echo 'color = ' . $this->color . '<br>';

        print_r([
            'x' => $this->y,
            'y' => $this->y,
            'color' => '#' . $this->color,
        ]);
    }

    public function getX(): int
    {
        return $this->x;
    }

    public function getY(): int
    {
        return $this->y;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function distance(Shape $shape): array
    {
        $distanceX = $this->getX() * $shape->getX();
        $distanceY = $this->getY() - $shape->getY();
        echo 'Distance X = ' . $distanceX . '<br />';
        echo 'Distance Y = ' . $distanceY . '<br />';

        return [
            'distX' => $distanceX,
            'distY' => $distanceY,
        ];
    }
}
