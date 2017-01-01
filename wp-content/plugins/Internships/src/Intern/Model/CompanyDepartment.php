<?php
namespace Intern\Model;
use Intern\ConcatTrait\NameLangTrait;
use wp_infinite\Controller\ModelController;

/**
 * Class Company
 * @package Intern\Model
 * @property int id
 * @property string name
 * @property string description
 * @property int company_id
 * @property array wp_user_id
 * @property array tel
 * @property array fax
 */
class CompanyDepartment extends ModelController
{
    use NameLangTrait;

    protected $description;
    protected $company_id;
    protected $wp_user_id;
    protected $tel;
    protected $fax;
    protected $sharedWp_users;

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return int
     */
    public function getCompanyId()
    {
        return $this->company_id;
    }

    /**
     * @param int $company_id
     */
    public function setCompanyId($company_id)
    {
        $this->company_id = $company_id;
    }

    /**
     * @return array
     */
    public function getUser()
    {
        return  $this->sharedWp_users;
    }

    /**
     * @param $tagId array wp_users
     */
    public function setUser($users)
    {
        unset($this->sharedWp_users);
        if (is_array($users)) {
            foreach ($users as $tag) {
                $this->sharedWp_users[] = \R::load('wp_users', $tag);
            }
        }
    }

    /**
     * @return array
     */
    public function getTel()
    {
        return unserialize($this->tel);
    }

    /**
     * @param array $tel
     */
    public function setTel($tel)
    {
        $this->tel = serialize($tel);
    }

    /**
     * @return array
     */
    public function getFax()
    {
        return unserialize($this->fax);
    }

    /**
     * @param array $fax
     */
    public function setFax($fax)
    {
        $this->fax = serialize($fax);
    }
}
