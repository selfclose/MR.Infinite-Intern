<?php
namespace Intern\Model;

use Intern\ConcatTrait\NameLangTrait;
use wp_infinite\Controller\ModelController;

/**
 * @property int id
 * @property string name
 */
class EducationDegree extends ModelController
{
   use NameLangTrait;

    protected $table = 'degree';

}
