<?php

namespace Intern\ConcatTrait;

trait ImageTrait
{
    /**
     * @var string $image
     */
    protected $image;

    /**
     * @return string
     */
    public function getImageUrl()
    {
        return $this->image;
    }

    /**
     * @param string $url
     */
    public function setImageUrl($url)
    {
        $this->image = $url;
    }

}
