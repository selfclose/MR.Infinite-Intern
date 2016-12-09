<?php
namespace Intern\Model;
use Intern\ConcatTrait\NameLangTrait;
use vendor\MrInfinite\Controller\RedBeanController;

class UniversityType extends RedBeanController
{
    use NameLangTrait;

    function __construct($id = 0)
    {
        parent::__construct($id);
    }
}
