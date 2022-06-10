<?php

namespace Wearejust\RedirectBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="wearejust_redirects")
 * @ORM\Entity(repositoryClass="Wearejust\RedirectBundle\Repository\RedirectRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Redirect
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var bool
     *
     * @ORM\Column(name="active", type="boolean")
     */
    private $active;

    /**
     * @var string
     *
     * @ORM\Column(name="fromUrl", type="string", length=255, unique=true)
     */
    private $fromUrl;

    /**
     * @var string
     *
     * @ORM\Column(name="toUrl", type="string", length=255)
     */
    private $toUrl;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime")
     */
    private $updatedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     */
    public function __construct()
    {
        $this->createdAt = new \DateTime();
        $this->updatedAt = new \DateTime();
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string) $this->getFromUrl();
    }
    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return Redirect
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return bool
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set fromUrl
     *
     * @param string $fromUrl
     *
     * @return Redirect
     */
    public function setFromUrl($fromUrl)
    {
        $this->fromUrl = trim($fromUrl, '/');

        return $this;
    }

    /**
     * Get fromUrl
     *
     * @return string
     */
    public function getFromUrl()
    {
        return $this->fromUrl;
    }

    /**
     * Set toUrl
     *
     * @param string $toUrl
     *
     * @return Redirect
     */
    public function setToUrl($toUrl)
    {
        $this->toUrl = $toUrl;

        return $this;
    }

    /**
     * Get toUrl
     *
     * @return string
     */
    public function getToUrl()
    {
        return $this->toUrl;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Redirect
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Redirect
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @ORM\PreUpdate()
     */
    public function preUpdate()
    {
        $this->updatedAt = new \DateTime();
    }
}

