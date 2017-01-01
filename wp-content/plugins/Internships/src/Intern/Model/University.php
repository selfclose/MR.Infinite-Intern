<?php
namespace Intern\Model;
use Intern\ConcatTrait\NameLangTrait;
use wp_infinite\Controller\ModelController;

/**
 * @property int id
 * @property string name
 * @property string short_name
 * @property string short_name_eng
 * @property string website
 * @property int province_id
 */
class University extends ModelController
{
    use NameLangTrait;

    protected $shortname;
    protected $universitytype_id;
    protected $website;
    protected $province_id;

    /**
     * @return UniversityType
     */
    public function getType()
    {
        return UniversityType::find($this->universitytype_id);
    }

    /**
     * @param int UniversityType $type
     */
    public function setType($type)
    {
        $this->universitytype_id = $type;
    }

    /**
     * @return string
     */
    public function getShortName()
    {
        return $this->shortname;
    }

    /**
     * @param string $short_name
     */
    public function setShortName($short_name)
    {
        $this->shortname = $short_name;
    }

    /**
     * @return string
     */
    public function getShortNameEng()
    {
        return $this->short_name_eng;
    }

    /**
     * @param string $short_name_eng
     */
    public function setShortNameEng($short_name_eng)
    {
        $this->short_name_eng = $short_name_eng;
    }

    /**
     * @return string
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * @param string $website
     */
    public function setWebsite($website)
    {
        $this->website = $website;
    }

    /**
     * @return int
     */
    public function getProvinceId()
    {
        return Province::find($this->province_id);
    }

    /**
     * @param int Province $province_id
     */
    public function setProvinceId($province_id)
    {
        $this->province_id = $province_id;
    }
}
