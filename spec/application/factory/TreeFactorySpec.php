<?php

namespace spec\application\factory;

use application\factory\TreeFactory;
use domain\trees\Tannenbaum;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TreeFactorySpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(TreeFactory::class);
    }

    public function it_can_give_me_a_tannenbaum()
    {
        $this->makeTannenbaum(4, true)->shouldBeAnInstanceOf(Tannenbaum::class);
    }
}
