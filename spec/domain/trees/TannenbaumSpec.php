<?php

namespace spec\domain\trees;

use domain\trees\Tannenbaum;
use domain\output\OutputStreamInterface;
use domain\trees\TreeTypeInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;


class TannenbaumSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith(4, false);
    }
    function it_is_initializable()
    {
        $this->shouldHaveType(Tannenbaum::class);
        $this->shouldHaveType(TreeTypeInterface::class);
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

    public function it_can_create_top_without_star()
    {
        $this->createTop()->shouldBeEqualTo(['   X   ']);
    }

    public function it_can_create_top_with_star()
    {
        $this->beConstructedWith(4, true);
        $this->createTop()->shouldBeEqualTo(['   *   ', '   X   ']);

    }
}
/*
1     X
2    XXX
3   XXXXX
4  XXXXXXX
5 XXXXXXXXX */