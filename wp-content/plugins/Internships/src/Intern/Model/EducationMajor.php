<?php
namespace Intern\Model;

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
   use NameTrait;

    protected $table = 'major';

}
