<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Product
 *
 * @ORM\Table(name="product")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProductRepository")
 */
class Product
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="category", type="string", length=255)
     */
    private $category;

    /**
     * @var string
     *
     * @ORM\Column(name="detail", type="string", length=255)
     */
    private $detail;

    /**
     * @var string
     *
     * @ORM\Column(name="moredetail", type="string", length=255)
     */
    private $moredetail;

    /**
     * @var string
     *
     * @ORM\Column(name="dateadd", type="string", length=255)
     */
    private $dateadd;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="timeadd", type="datetime")
     */
    private $timeadd;


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
     * Set name
     *
     * @param string $name
     *
     * @return Product
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set category
     *
     * @param string $category
     *
     * @return Product
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set detail
     *
     * @param string $detail
     *
     * @return Product
     */
    public function setDetail($detail)
    {
        $this->detail = $detail;

        return $this;
    }

    /**
     * Get detail
     *
     * @return string
     */
    public function getDetail()
    {
        return $this->detail;
    }

    /**
     * Set moredetail
     *
     * @param string $moredetail
     *
     * @return Product
     */
    public function setMoredetail($moredetail)
    {
        $this->moredetail = $moredetail;

        return $this;
    }

    /**
     * Get moredetail
     *
     * @return string
     */
    public function getMoredetail()
    {
        return $this->moredetail;
    }

    /**
     * Set dateadd
     *
     * @param string $dateadd
     *
     * @return Product
     */
    public function setDateadd($dateadd)
    {
        $this->dateadd = $dateadd;

        return $this;
    }

    /**
     * Get dateadd
     *
     * @return string
     */
    public function getDateadd()
    {
        return $this->dateadd;
    }

    /**
     * Set timeadd
     *
     * @param \DateTime $timeadd
     *
     * @return Product
     */
    public function setTimeadd($timeadd)
    {
        $this->timeadd = $timeadd;

        return $this;
    }

    /**
     * Get timeadd
     *
     * @return \DateTime
     */
    public function getTimeadd()
    {
        return $this->timeadd;
    }
}

