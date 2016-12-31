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
    function __construct($tableId = 0)
    {
        parent::__construct($tableId);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->dataModel->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->dataModel->name = $name;
    }

}
