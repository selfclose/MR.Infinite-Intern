<?php
namespace Intern\Model;
use Intern\ConcatTrait\NameLangTrait;
use wp_infinite\Controller\ModelController;

/**
 * @property int id
 * @property string name
**/
class UserType extends ModelController
{
    protected $table = 'wp_users_type';

    use NameLangTrait;
    function __construct($id = 0)
    {
        parent::__construct($id, true);
    }
}
