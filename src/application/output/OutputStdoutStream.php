<?php

namespace application\output;

use domain\output\OutputStreamInterface;

class OutputStdoutStream implements OutputStreamInterface
{
    /**
     * @var string
     */
    private $line;

    public function addLine($line)
    {
        $this->line .= $line . "\n";
    }

    public function output()
    {
        return $this->line;
    }
}
