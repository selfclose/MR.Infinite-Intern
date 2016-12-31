<?php
namespace Intern\Model;

use Intern\ConcatTrait\NameLangTrait;
use wp_infinite\Controller\ModelController;

/**
 * @property int id
 * @property string name_th
 * @property string name_en
 */
class JobTag extends ModelController
{
    use NameLangTrait;

    function __construct($id = 0)
    {
        parent::__construct($id);
    }
}
