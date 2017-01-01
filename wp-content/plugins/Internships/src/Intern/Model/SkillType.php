<?php
namespace Intern\Model;

use Intern\ConcatTrait\NameTrait;
use wp_infinite\Controller\ModelController;

/**
 * Class SkillType
 * @package Intern\Model
 * @property int|array id
 * @property string name

 */
class SkillType extends ModelController
{
    use NameTrait;

    protected $ownSkill;

    /**
     * @return array
     */
    public function getSkills()
    {
        return $this->ownSkill;
    }

    /**
     * @param $skills array Skill
     */
    public function setSkills($skills)
    {
        unset($this->ownSkill);
        if (is_array($skills)) {
            foreach ($skills as $skill) {
                $this->ownSkill[] = Skill::find($skill);// \R::load('skill', $skill);
            }
        }
    }

    /**
     * @param $skill
     */
    public function addSkill($skill_id)
    {
        $this->ownSkill[] =  Skill::find($skill_id);//\R::load('skill', $skill_id);
        iLog('add_skill '.$skill_id);
    }
}
