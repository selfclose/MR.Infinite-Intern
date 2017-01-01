<?php

namespace Intern\ConcatTrait;

trait NameLangTrait
{
    /* default is th */
    protected $name = '[]';

    function addName($name, $lang = 'th') {
        $n = json_decode($this->name, true);
        $n = array_merge($n, [$lang => $name]);
        $this->name = json_encode($n);
    }

    function removeName($lang) {
        $n = json_decode($this->name, true);
        unset($n[$lang]);
        $this->name = json_encode($n);
    }

    public function getName($lang = 'th') {
        return json_decode($this->name, true)[$lang];
    }

    function setName($name_arr) {
        //check if array is 1 dimensional
        if (count($name_arr) == count($name_arr, COUNT_RECURSIVE)) {
            $this->name = json_encode($name_arr);
        }
    }
}
