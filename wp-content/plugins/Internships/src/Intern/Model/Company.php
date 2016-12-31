<?php
namespace Intern\Model;
use Intern\ConcatTrait\ImageTrait;
use Intern\ConcatTrait\NameTrait;
use wp_infinite\Controller\ModelController;

/**
 * @property string id
 * @property string account_type
 * @property string name
 * @property string logo Url
 * @property CompanyType type
 * @property string founder
 * @property string description
 * @property \DateTime start_date
 * @property array tel
 * @property array fax
 * @property array open_date
 * @property string address
 * @property int province_id
 * @property int zipcode
 * @property string googlemap
 * @property int wallet
 * @property \DateTime end_package_date
 * @property array department
 * @property string facebook
 * @property string website
 * @property int clicked
 * @property int rating
 */
class Company extends ModelController
{
    use NameTrait;
    use ImageTrait;

    const ACCOUNT_FREE = 'free';
    const ACCOUNT_VIP = 'vip';
    const ACCOUNT_PREMIUM = 'premium';

    protected $account_type;
    protected $logo;
    protected $companytype_id;
    protected $founder;
    protected $description;
    protected $start_date;
    protected $tel;
    protected $fax;
    protected $open_date;
    protected $province_id;
    protected $zipcode;
    protected $googlemap;
    protected $wallet;
    protected $end_package_date;
    protected $department;
    protected $facebook;
    protected $website;
    protected $clicked;
    protected $rating;

    /**
     * @return string
     */
    public function getAccountType()
    {
        return $this->account_type;
    }

    /**
     * @param string $account_type
     */
    public function setAccountType($account_type)
    {
        $this->account_type = $account_type;
    }

    /**
     * @return string
     */
    public function getLogoUrl()
    {
        return $this->logo;
    }

    /**
     * @return CompanyType
     */
    public function getType()
    {
        return $this->companytype_id;
    }

    /**
     * @param int CompanyType $type
     */
    public function setType($type)
    {
        $this->companytype_id = $type;
    }

    /**
     * @return string
     */
    public function getFounder()
    {
        return $this->founder;
    }

    /**
     * @param string $founder
     */
    public function setFounder($founder)
    {
        $this->founder = $founder;
    }

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
     * @return \DateTime
     */
    public function getStartDate()
    {
        return $this->start_date;
    }

    /**
     * @param \DateTime $start_date
     */
    public function setStartDate($start_date)
    {
        $this->start_date = $start_date;
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

    /**
     * @return array
     */
    public function getOpenDate()
    {
        return $this->open_date;
    }

    /**
     * @param array $open_date
     */
    public function setOpenDate($open_date)
    {
        $this->open_date = $open_date;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return Province
     */
    public function getProvinceId()
    {
        return $this->province_provinceid;
    }

    /**
     * @param int Province $province_id
     */
    public function setProvinceId($province_id)
    {
        $this->province_id = $province_id;
    }

    /**
     * @return int
     */
    public function getZipcode()
    {
        return $this->zipcode;
    }

    /**
     * @param int $zipcode
     */
    public function setZipcode($zipcode)
    {
        $this->zipcode = $zipcode;
    }

    /**
     * @return string
     */
    public function getGoogleMap()
    {
        return $this->googleMap;
    }

    /**
     * @param string $googleMap
     */
    public function setGoogleMap($googleMap)
    {
        $this->googleMap = $googleMap;
    }

    /**
     * @return int
     */
    public function getWallet()
    {
        return $this->wallet;
    }

    /**
     * @param int $wallet
     */
    public function setWallet($wallet)
    {
        $this->wallet = $wallet;
    }

    /**
     * @return \DateTime
     */
    public function getEndPackageDate()
    {
        return $this->end_package_date;
    }

    /**
     * @param \DateTime $end_package_date
     */
    public function setEndPackageDate($end_package_date)
    {
        $this->end_package_date = $end_package_date;
    }

    /**
     * @return array
     */
    public function getDepartment()
    {
        return $this->department;
    }

    /**
     * @param array $department
     */
    public function setDepartment($department)
    {
        $this->department = $department;
    }

    /**
     * @return string
     */
    public function getFacebook()
    {
        return $this->facebook;
    }

    /**
     * @param string $facebook
     */
    public function setFacebook($facebook)
    {
        $this->facebook = $facebook;
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
    public function getClicked()
    {
        return $this->clicked;
    }

    /**
     * @param int $clicked
     */
    public function setClicked($clicked)
    {
        $this->clicked = $clicked;
    }

    /**
     * @return int
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * @param int $rating
     */
    public function setRating($rating)
    {
        $this->rating = $rating;
    }
}
