<?php
namespace Intern\Model;
use Intern\ConcatTrait\NameLangTrait;
use wp_infinite\Controller\ModelController;

/**
 * Class Province
 * @package Intern\Model
 * @property int id
 * @property int province_id
 * @property string name
 * @property string name_eng
 * @property Geo geo id here
 */
class Province extends ModelController
{
    use NameLangTrait;

    /**
     * @return int
     */
    public function getProvinceId()
    {
        return $this->provinceid;
    }

    /**
     * @param int $province_id
     */
    public function setProvinceId($province_id)
    {
        $this->provinceid = $province_id;
    }

    /**
     * @return Geo
     */
    public function getGeoId()
    {
        return $this->geo_id;
    }

    /**
     * @param Geo $geo_id
     */
    public function setGeoId($geo_id)
    {
        $this->geo_id = $geo_id;
//        $this->setMeta("buildcommand.unique", [[$this->province_id]]);
    }

}
