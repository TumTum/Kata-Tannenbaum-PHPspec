<?php

namespace spec\application;

use application\TreeService;
use domain\output\OutputStreamInterface;
use domain\trees\TreeTypeInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TreeServiceSpec extends ObjectBehavior
{
    public function let(
        OutputStreamInterface $outputStream
    )
    {
        $this->beConstructedWith($outputStream);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(TreeService::class);
    }

    public function it_will_build_the_tree(
        OutputStreamInterface $outputStream,
        TreeTypeInterface $treeType
    )
    {
        $treeType->createLine(Argument::any())->shouldBeCalled();
        $treeType->createTop()->willReturn(['*','X'])->shouldBeCalled();
        $treeType->createTrunk()->shouldBeCalled();
        $treeType->getHeight()->willReturn(4)->shouldBeCalled();

        $outputStream->addLine(Argument::any())->shouldBeCalled();

        $this->farm($treeType);
    }
}
