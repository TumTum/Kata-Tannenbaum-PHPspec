<?php

namespace spec\application;

use application\Option\TreeOption;
use application\TreeService;
use domain\output\outputStreamInterface;
use domain\trees\TreeTypeInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TreeServiceSpec extends ObjectBehavior
{
    public function let(
        outputStreamInterface $outputStream
    )
    {
        $this->beConstructedWith($outputStream);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(TreeService::class);
    }

    public function it_will_build_the_tree(
        outputStreamInterface $outputStream,
        TreeTypeInterface $treeType
    )
    {
        $treeType->createLine(Argument::any())->shouldBeCalled();
        $treeType->createTop()->shouldBeCalled();
        $treeType->createTrunk()->shouldBeCalled();
        $treeType->getHeight()->willReturn(4)->shouldBeCalled();

        $outputStream->addLine(Argument::any())->shouldBeCalled();

        $this->farm($treeType);
    }
}
