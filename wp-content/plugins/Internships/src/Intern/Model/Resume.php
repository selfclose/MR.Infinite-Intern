<?php
namespace Intern\Model;
use wp_infinite\Controller\ModelController;


/**
 * Class Resume
 * @package Intern\Model
 * @property int id
 * @property int wp_users_id
 * @property string title
 * @property int company_id บริษัทที่จะส่ง หรือ ไม่เจาะจง
 * @property \DateTime out_date วันหมดอายุ
 * @property array type ฝึกงานประเภทอะไรบ้าง
 * @property \DateTime start_date
 * @property \DateTime end_date
 * @property string attach_url
 * @property string description
 * @property string public GLOBAL | SPECIFIC | PRIVATE
 * @property string status PENDING | APPROVE | REJECT
 */
class Resume extends ModelController
{
    const PUBLIC_GLOBAL = 'global';
    const PUBLIC_SPECIFIC = 'specific';
    const PUBLIC_PRIVATE = 'private';

    const STATUS_PENDING = 'pending';
    const STATUS_APPROVE = 'approve';
    const STATUS_REJECT = 'reject';

    protected $user;

    function __construct($id = 0)
    {
        parent::__construct($id);
    }

    /**
     * @return User
     */
    public function getUser()
    {
        if (empty($this->user)) {
            $this->user = new User($this->wp_users_id);
        }
        return $this->user;
    }

    /**
     * @param int $userId
     */
    public function setUser($userId)
    {
        $this->wp_users_id = $userId;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return int
     */
    public function getPingCompanyId()
    {
        return $this->company_id;
    }

    /**
     * @param int $ping_company_id
     */
    public function setPingCompanyId($ping_company_id)
    {
        $this->company_id = $ping_company_id;
    }

    /**
     * @return \DateTime
     */
    public function getOutDate()
    {
        return $this->out_date;
    }

    /**
     * @param \DateTime $out_date
     */
    public function setOutDate($out_date)
    {
        $this->out_date = $out_date;
    }

    /**
     * @return array
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param array $type
     */
    public function setType($type)
    {
        $this->type = $type;
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
     * @return \DateTime
     */
    public function getEndDate()
    {
        return $this->end_date;
    }

    /**
     * @param \DateTime $end_date
     */
    public function setEndDate($end_date)
    {
        $this->end_date = $end_date;
    }

    /**
     * @return string
     */
    public function getAttachUrl()
    {
        return $this->attach_url;
    }

    /**
     * @param string $attach_url
     */
    public function setAttachUrl($attach_url)
    {
        $this->attach_url = $attach_url;
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
     * @return string
     */
    public function getPublic()
    {
        return $this->public;
    }

    /**
     * @param string $public
     */
    public function setPublic($public)
    {
        $this->public = $public;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }
}
