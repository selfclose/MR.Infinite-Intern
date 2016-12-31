<?php
namespace Intern\Model;

use wp_infinite\Controller\ModelController;

/**
 * @property int id
 * @property User user
 * @property string degree
 * @property int university_id
 * @property int GPA
 * @property \DateTime start_year
 * @property \DateTime end_year
 * @property int honour = 0 เกีรตินินม
 *
 * @property string description
 */
class Education extends ModelController
{
//    const DEGREE_Diploma = 'dip'; //อนุปริญญา
//    const DEGREE_Bachelor = 'bac'; //ปริญญาตรี
//    const DEGREE_Masters = 'mas'; //ปริญญาโท
//    const DEGREE_Doctoral = 'doc'; //ปริญญาโท

    protected $user;
    protected $degree;
    protected $major;
    protected $wp_users_id;
    protected $honour = 0;
    protected $degree_id;

    //TODO: mis understanding move please
    /**
     * @return User
     */
    public function getUser()
    {
        if (empty($this->user)) {
            $this->user = new User($this-$this->wp_users_id);
        }
        return $this->user;
    }

    /**
     * @param User $user_id
     */
    public function setUser($user_id)
    {
        $this->wp_users_id = $user_id;
    }

    /**
     * @return EducationDegree
     */
    public function getDegree()
    {
        if (empty($degree)) {
            $this->degree = new EducationDegree($this->degree_id);
        }
        return $this->degree;
    }

    /**
     * @param string $degree_id
     */
    public function setDegree($degree_id)
    {
        $this->degree_id = $degree_id;
    }

    /**
     * @return EducationMajor
     */
    public function getMajors()
    {
        if (empty($this->major)) {
            $this->major = new EducationMajor($this->major_id);
        }
        return $this->major;
    }

    /**
     * @param int $major_id
     */
    public function setMajors($major_id)
    {
        $this->major_id = $major_id;
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
     * @return University
     */
    public function getUniversity()
    {
        return new University($this->sharedUniversity);
    }

    /**
     * @param $university_id array University
     */
    public function setUniversity($university_id)
    {
        $this->university_id = $university_id;
    }

    /**
     * @return int
     */
    public function getGPA()
    {
        return $this->GPA;
    }

    /**
     * @param int $GPA
     */
    public function setGPA($GPA)
    {
        $this->GPA = $GPA;
    }

    /**
     * @return \DateTime
     */
    public function getStartYear()
    {
        return $this->start_year;
    }

    /**
     * @param \DateTime $start_year
     */
    public function setStartYear($start_year)
    {
        $this->start_year = $start_year;
    }

    /**
     * @return \DateTime
     */
    public function getEndYear()
    {
        return $this->end_year;
    }

    /**
     * @param \DateTime $end_year
     */
    public function setEndYear($end_year)
    {
        $this->end_year = $end_year;
    }

    /**
     * @return int
     */
    public function getHonour()
    {
        return $this->honour;
    }

    /**
     * @param int $honour
     */
    public function setHonour($honour)
    {
        $this->honour = $honour;
    }
}
