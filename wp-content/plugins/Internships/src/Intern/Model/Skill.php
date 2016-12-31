<?php
namespace Intern\Model;
use Intern\ConcatTrait\EnabledTrait;
use Intern\ConcatTrait\NameTrait;
use wp_infinite\Controller\ModelController;

/**
 * Class Skill
 * @package Intern\Model
 * @property int id
 * @property int type_id
 * @property string name
 * @property int skillType
 */
class Skill extends ModelController
{
    use NameTrait;
    use EnabledTrait;

    function __construct($id = 0)
    {
        parent::__construct($id);

        $this->setEnabled(true);
    }
//
//    /**
//     * @return int SkillType
//     */
//    public function getSkillType()
//    {
//        return $this->skilltype_id;
//    }
//
//    /**
//     * @param int $type
//     */
//    public function setSkillType($type)
//    {
//        $this->skilltype_id = $type;
//    }

    /**
     * @return array
     */
    public function getSkillType()
    {
        return $this->sharedSkill;
    }

    /**
     * @param $skills array Skill
     */
    public function setSkillType($skills)
    {
        unset($this->sharedSkill);
        if (is_array($skills)) {
            foreach ($skills as $skill) {
                $this->sharedSkill[] = Skill::readAction($skill);// \R::load('skill', $skill);
            }
        }
    }

    public function addSkill($skill)
    {
        $this->sharedSkill[] = \R::load('skill', $skill);
        iLog($skill);
    }

}
