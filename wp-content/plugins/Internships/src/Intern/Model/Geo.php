<?php
namespace Intern\Model;
use wp_infinite\Controller\ModelController;

/**
 * Class Geo
 * @package Intern\Model
 * @property string name
 */
class Geo extends ModelController
{
    protected $name;
    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

}
