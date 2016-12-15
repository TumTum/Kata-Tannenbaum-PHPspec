<?php

namespace domain\trees;

/**
 * Class tannenbaum
 * @package domain
 */
class Tannenbaum implements TreeTypeInterface
{
    /**
     * @var int
     */
    private $height;

    /**
     * @var bool
     */
    private $hasStar;

    /**
     * tannenbaum constructor.
     * @param int $height
     * @param bool $hasStar
     */
    public function __construct(int $height, bool $hasStar)
    {
        $this->height = $height;
        $this->hasStar = $hasStar;
    }

    /**
     * @return int
     */
    public function getHeight() :int
    {
        return $this->height;
    }

    /**
     * @return bool
     */
    public function hasStar()
    {
        return $this->hasStar;
    }

    /**
     * @return int
     */
    public function getMaximalLine()
    {
        return ($this->getHeight() - 1) * 2 + 1;
    }

    public function createLine(int $line, string $char = 'X')
    {
        $Ixes  = $this->repeatChar($line, $char);
        return str_pad($Ixes, $this->getMaximalLine(), ' ', STR_PAD_BOTH);
    }

    protected function repeatChar($line, $char)
    {
        $mulitkator = $line + ($line - 1);
        return str_repeat($char, $mulitkator);
    }

    /**
     * @return string
     */
    public function createTrunk()
    {
        return $this->createLine(1, "|");
    }

    public function createTop(): array
    {
        $toplines = [];

        if ($this->hasStar()) {
            $toplines[] = $this->createLine(1, "*");
        }

        $toplines[] = $this->createLine(1);

        return $toplines;
    }
}
