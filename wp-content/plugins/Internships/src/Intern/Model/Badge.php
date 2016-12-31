<?php
namespace Intern\Model;

use Intern\ConcatTrait\EnabledTrait;
use Intern\ConcatTrait\NameTrait;
use wp_infinite\Controller\ModelController;

/**
 * @property string name
 * @property int company_id
 * @property int companydepartment_id
 * @property int jobtype_id
 * @property string description
 */
class Badge extends ModelController
{
    use NameTrait;
}
