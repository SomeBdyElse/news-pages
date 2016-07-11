<?php


namespace HannesLau\NewsPages\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

class NewsItem extends AbstractEntity
{
    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $subtitle;

    /**
     * @var string
     */
    protected $teaser;

    /**
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     */
    protected $previewImage;

    /**
     * @var boolean
     */
    protected $topNews;

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getSubtitle()
    {
        return $this->subtitle;
    }

    /**
     * @param string $subtitle
     */
    public function setSubtitle($subtitle)
    {
        $this->subtitle = $subtitle;
    }

    /**
     * @return string
     */
    public function getTeaser()
    {
        return $this->teaser;
    }

    /**
     * @param string $teaser
     */
    public function setTeaser($teaser)
    {
        $this->teaser = $teaser;
    }


    /**
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference
     */
    public function getPreviewImage()
    {
        return $this->previewImage;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $previewImage
     */
    public function setPreviewImage($previewImage)
    {
        $this->previewImage = $previewImage;
    }

    /**
     * @return boolean
     */
    public function isTopNews()
    {
        return $this->topNews;
    }

    /**
     * @param boolean $topNews
     */
    public function setTopNews($topNews)
    {
        $this->topNews = $topNews;
    }
}