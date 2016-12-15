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

    /**
     * TreeService constructor.
     *
     * @param OutputStreamInterface $outputStream
     */
    public function __construct(OutputStreamInterface $outputStream)
    {
        $this->outputStream = $outputStream;
    }

    /**
     * Erstellt den Baum
     *
     * @param TreeTypeInterface $treeType
     */
    public function farm(TreeTypeInterface $treeType)
    {
        $this->buildTop($treeType);
        $this->buildTreecrown($treeType);
        $this->buildTrunk($treeType);
    }

    /**
     * @param TreeTypeInterface $treeType
     */
    private function buildTop(TreeTypeInterface $treeType): void
    {
        foreach ($treeType->createTop() as $line) {
            $this->outputStream->addLine($line);
        }
    }

    /**
     * @param TreeTypeInterface $treeType
     */
    private function buildTreecrown(TreeTypeInterface $treeType): void
    {
        for ($i = 2; $i <= $treeType->getHeight(); $i++) {
            $this->outputStream->addLine($treeType->createLine($i));
        }
    }

    /**
     * @param TreeTypeInterface $treeType
     */
    private function buildTrunk(TreeTypeInterface $treeType): void
    {
        $this->outputStream->addLine($treeType->createTrunk());
    }
}
