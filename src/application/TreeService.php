<?php

namespace application;

use domain\output\OutputStreamInterface;
use domain\trees\TreeTypeInterface;

class TreeService
{
    /**
     * @var OutputStreamInterface
     */
    private $outputStream;

    public function __construct(OutputStreamInterface $outputStream)
    {
        $this->outputStream = $outputStream;
    }

    public function farm(TreeTypeInterface $treeType)
    {
        foreach ($treeType->createTop() as $line) {
            $this->outputStream->addLine($line);
        }

        for ($i = 2; $i <= $treeType->getHeight(); $i++) {
            $this->outputStream->addLine($treeType->createLine($i));
        }

        $this->outputStream->addLine($treeType->createTrunk());
    }
}
