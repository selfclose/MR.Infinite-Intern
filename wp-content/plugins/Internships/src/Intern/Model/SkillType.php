<?php
namespace Intern\Model;

use Intern\ConcatTrait\NameTrait;
use wp_infinite\Controller\ModelController;

/**
 * Class SkillType
 * @package Intern\Model
 * @property int|array id
 * @property string name
 * @property array sharedSkill
 */
class SkillType extends ModelController
{
    use NameTrait;

    function __construct($id = 0)
    {
        parent::__construct($id);
    }

    /**
     * @return array
     */
    public function getSkills()
    {
        return $this->sharedSkill;
    }

    /**
     * @param $skills array Skill
     */
    public function setSkills($skills)
    {
        unset($this->sharedSkill);
        if (is_array($skills)) {
            foreach ($skills as $skill) {
                $this->sharedSkill[] = \R::load('skill', $skill);
            }
        }
    }

    public function addSkill($skill)
    {
        $this->sharedSkill[] = \R::load('skill', $skill);
        iLog($skill);
    }
}
