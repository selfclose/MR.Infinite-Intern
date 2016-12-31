<?php

namespace Intern\ConcatTrait;

trait NameLangTrait
{
    protected $name;


    /**
     * @return string
     */
    public function getName($lang = 'th')
    {
        return $this['name_'.$lang];
    }

    /**
     * @param string $name
     */
    public function setName($name, $lang = 'th')
    {
        $this['name_'.$lang] = $name;
    }
}
