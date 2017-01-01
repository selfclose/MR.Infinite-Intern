<?php
namespace Intern\Model;
use wp_infinite\Controller\ModelController;
use Intern\ConcatTrait\NameLangTrait;
/**
 * Class Company
 * @package Intern\Model
 * @property string id
 * @property string name
 */
class CompanyType extends ModelController
{
    use NameLangTrait;
    protected $table = 'companytype';
}
