<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Vlabs\MediaBundle\Annotation\Vlabs;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Product
 *
 * @ORM\Table(name="product")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProductRepository")
 */
class Product {

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
     * @var int
     *
     * @ORM\Column(name="price", type="integer")
     */
    private $price;

    /**
     * @var string
     *
     * @ORM\Column(name="locale", type="text", nullable=true)
     */
    private $locale;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="products", cascade={"persist"})
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     */
    private $category;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Currency", inversedBy="products")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="currency_id", referencedColumnName="id")
     * })
     */
    private $currency;

    /**
     * @var VlabsFile
     *
     * @ORM\OneToOne(targetEntity="Image", cascade={"persist", "remove"}, orphanRemoval=true))
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="image", referencedColumnName="id")
     * })
     * 
     * @Vlabs\Media(identifier="image_entity", upload_dir="files/images")
     * @Assert\Valid()
     */
    private $image;

    /**
     * @var VlabsFile
     *
     * @ORM\OneToOne(targetEntity="Image", cascade={"persist", "remove"}, orphanRemoval=true))
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="archivo", referencedColumnName="id")
     * })
     * 
     * @Vlabs\Media(identifier="image_entity", upload_dir="files/images")
     * @Assert\Valid()
     */
    private $archivo;

    /**
     * @Gedmo\Slug(fields={"name"})
     * @ORM\Column(length=255, unique=true,nullable=true)
     */
    private $slug;

    /**
     * @var boolean
     *
     * @ORM\Column(name="featured", type="boolean", nullable=true)
     */
    private $featured;

    /**
     * Get id
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Product
     */
    public function setName($name) {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Set price
     *
     * @param integer $price
     *
     * @return Product
     */
    public function setPrice($price) {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return int
     */
    public function getPrice() {
        return $this->price;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Product
     */
    public function setDescription($description) {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * Set image
     *
     * @param \AppBundle\Entity\Image $image
     *
     * @return Product
     */
    public function setImage(\AppBundle\Entity\Image $image = null) {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return \AppBundle\Entity\Image
     */
    public function getImage() {
        return $this->image;
    }

    /**
     * Set category
     *
     * @param \AppBundle\Entity\Category $category
     *
     * @return Product
     */
    public function setCategory(\AppBundle\Entity\Category $category = null) {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \AppBundle\Entity\Category
     */
    public function getCategory() {
        return $this->category;
    }

    public function __toString() {
        return $this->getName();
    }

    /**
     * Set slug
     *
     * @param string $slug
     *
     * @return Product
     */
    public function setSlug($slug) {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug() {
        return $this->slug;
    }

    /**
     * Set archivo
     *
     * @param \AppBundle\Entity\Image $archivo
     *
     * @return Product
     */
    public function setArchivo(\AppBundle\Entity\Image $archivo = null) {
        $this->archivo = $archivo;

        return $this;
    }

    /**
     * Get archivo
     *
     * @return \AppBundle\Entity\Image
     */
    public function getArchivo() {
        return $this->archivo;
    }

    /**
     * Set featured
     *
     * @param boolean $featured
     *
     * @return Product
     */
    public function setFeatured($featured) {
        $this->featured = $featured;

        return $this;
    }

    /**
     * Get featured
     *
     * @return boolean
     */
    public function getFeatured() {
        return $this->featured;
    }

    /**
     * Set locale
     *
     * @param string $locale
     *
     * @return Product
     */
    public function setLocale($locale) {
        $this->locale = $locale;

        return $this;
    }

    /**
     * Get locale
     *
     * @return string
     */
    public function getLocale() {
        return $this->locale;
    }


    /**
     * Set currency
     *
     * @param \AppBundle\Entity\Currency $currency
     *
     * @return Product
     */
    public function setCurrency(\AppBundle\Entity\Currency $currency = null)
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * Get currency
     *
     * @return \AppBundle\Entity\Currency
     */
    public function getCurrency()
    {
        return $this->currency;
    }
}
