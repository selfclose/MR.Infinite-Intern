<?php
namespace Intern\Model;

use Intern\ConcatTrait\EnabledTrait;
use wp_infinite\Controller\ModelController;

/**
 * @property int id
 * @property string title
 * @property array sharedJobtag
 * @property int company_id
 * @property int companydepartment_id
 * @property string description
 */
class Job extends ModelController
{
    use EnabledTrait;

    protected $table = 'job';

    protected $enabled = true;

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
     * @return Company
     */
    public function getCompany()
    {
//        return \R::load('company', $this->company_id);
        return $this->company_id;
    }

    /**
     * @param string $company_id
     */
    public function setCompany($company_id)
    {
        $this->company_id = $company_id;
    }


    /**
     * @return mixed
     */
    public function getJobcategoryId()
    {
        return $this->jobcategory_id;
    }

    /**
     * @param mixed $jobcategory_id
     */
    public function setJobcategoryId($jobcategory_id)
    {
        $this->jobcategory_id = $jobcategory_id;
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
     * @return int
     */
    public function getDepartmentId()
    {
        return $this->companydepartment_id;
    }

    /**
     * @param int $department_id
     */
    public function setDepartmentId($department_id)
    {
        $this->companydepartment_id = $department_id;
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
     * @return array
     */
    public function getTag()
    {
        return  $this->sharedJobtag;
    }

    /**
     * @param $tagId array JobTag
     */
    public function setTag($tags)
    {
        unset($this->sharedJobtag);
        if (is_array($tags)) {
            foreach ($tags as $tag) {
                $this->sharedJobtag[] = \R::load('jobtag', $tag);
            }
        }
    }

    /**
     * @param $tagId int JobTag
     */
    public function addTag($tagId)
    {
        $this->sharedJobtag[] = \R::load('jobtag', $tagId);
    }
}
