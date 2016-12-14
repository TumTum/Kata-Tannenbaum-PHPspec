<?php

namespace spec\domain;

use domain\tannenbaum;
use domain\output\outputStreamInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;


class tannenbaumSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith(4, false);
    }
    function it_is_initializable()
    {
        $this->shouldHaveType(tannenbaum::class);
    }

    public function it_can_get_height()
    {
        $this->getHeight()->shouldBe(4);
    }

    public function it_has_not_star()
    {
        $this->shouldNotHaveStar();
    }

    public function it_has_star()
    {
        $this->beConstructedWith(4, true);
        $this->shouldHaveStar();
    }

    public function it_know_maximal_line_of_height_4()
    {
        $this->getMaximalLine()->shouldBe(7);
    }

    public function it_know_maximal_line_of_height_5()
    {
        $this->beConstructedWith(5, false);
        $this->getMaximalLine()->shouldBe(9);
    }

    public function it_can_print_first_line()
    {
        $this->createLine(1)->shouldBeEqualTo('   X   ');
    }

    public function it_can_print_second_line()
    {
        $this->createLine(2)->shouldBeEqualTo('  XXX  ');
    }

    public function it_can_build_trunk()
    {
        $this->createTrunk()->shouldBeEqualTo('   |   ');
    }

    public function it_can_not_create_a_star()
    {
        $this->createStar()->shouldBeEqualTo('');
    }

    public function it_can_create_star()
    {
        $this->beConstructedWith(4, true);
        $this->createStar()->shouldBeEqualTo('   *   ');

    }

    public function it_can_create_tree(outputStreamInterface $outputStream)
    {
        $outputStream->addLine(Argument::is('   X   '))->shouldBeCalled();
        $outputStream->addLine(Argument::is('  XXX  '))->shouldBeCalled();
        $outputStream->addLine(Argument::is(' XXXXX '))->shouldBeCalled();
        $outputStream->addLine(Argument::is('XXXXXXX'))->shouldBeCalled();
        $outputStream->addLine(Argument::is('   |   '))->shouldBeCalled();
        $this->makeTree($outputStream);
    }

    public function it_can_create_tree_with_star(outputStreamInterface $outputStream)
    {
        $this->beConstructedWith(4, true);
        $outputStream->addLine(Argument::is('   *   '))->shouldBeCalled();
        $outputStream->addLine(Argument::is('   X   '))->shouldBeCalled();
        $outputStream->addLine(Argument::is('  XXX  '))->shouldBeCalled();
        $outputStream->addLine(Argument::is(' XXXXX '))->shouldBeCalled();
        $outputStream->addLine(Argument::is('XXXXXXX'))->shouldBeCalled();
        $outputStream->addLine(Argument::is('   |   '))->shouldBeCalled();
        $this->makeTree($outputStream);
    }
}
/*
1     X
2    XXX
3   XXXXX
4  XXXXXXX
5 XXXXXXXXX */