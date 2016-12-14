<?php

namespace domain;
use domain\output\outputStreamInterface;

/**
 * Class tannenbaum
 * @package domain
 */
class tannenbaum
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
    public function getHeight()
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

    public function createLine($line, $char = "X")
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

    /**
     * @return string
     */
    public function createStar()
    {
        if ($this->hasStar()) {
            return $this->createLine(1, "*");
        }
        return '';
    }

    public function makeTree(outputStreamInterface $outputStream)
    {
        if ($star = $this->createStar()) {
            $outputStream->addLine($star);
        }
        for ($i = 1; $i <= $this->getHeight(); $i++) {
            $outputStream->addLine($this->createLine($i));
        }
        $outputStream->addLine($this->createTrunk());
    }
}
