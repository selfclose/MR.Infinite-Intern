<?php
namespace Intern\Model;

use Intern\ConcatTrait\NameLangTrait;
use wp_infinite\Controller\ModelController;

class JobType extends ModelController
{
    use NameLangTrait;

    function __construct($id = 0)
    {
        parent::__construct($id);
    }
}
