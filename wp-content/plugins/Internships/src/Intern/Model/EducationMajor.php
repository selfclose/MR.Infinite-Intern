<?php
namespace Intern\Model;

use Intern\ConcatTrait\EnabledTrait;
use Intern\ConcatTrait\NameLangTrait;
use Intern\ConcatTrait\NameTrait;
use Intern\Config\Table;
use wp_infinite\Controller\ModelController;

/**
 * คณะ
 * @property int id
 * @property string name_th
 * @property string name_en
 */
class EducationMajor extends ModelController
{
   use NameLangTrait;

    protected $table = Table::MAJOR;

    function __construct($id = 0)
    {
        parent::__construct($id);
    }
}
