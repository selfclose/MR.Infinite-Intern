<?php

namespace Intern\ConcatTrait;

trait EnabledTrait
{
    protected $enabled = true;
    /**
     * @return bool
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * @param bool $enabled
     */
    public function setEnabled($enabled = true)
    {
        $this->enabled = $enabled;
    }

}
