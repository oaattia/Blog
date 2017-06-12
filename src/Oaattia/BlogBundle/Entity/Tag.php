<?php

namespace Oaattia\BlogBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Tag
 *
 * @ORM\Table(name="tag")
 * @ORM\Entity(repositoryClass="Oaattia\BlogBundle\Repository\TagRepository")
 */
class Tag extends Entity
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
     * @ORM\Column(name="title", type="string", length=144)
     */
    private $title;
    
    
    /**
     * @var
     *
     * @ORM\ManyToMany(targetEntity="Post", mappedBy="posts")
     * @ORM\JoinTable(name="posts_tags")
     */
    private $posts;
    
    
    /**
     * Tag constructor.
     *
     */
    public function __construct()
    {
        $this->posts = new ArrayCollection();
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
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }
    
    /**
     * @param mixed $title
     *
     * @return $this
     */
    public function setTitle($title)
    {
        $this->title = $title;
        
        return $this;
    }
    
    /**
     * @return mixed
     */
    public function getPosts()
    {
        return $this->posts;
    }
    
    /**
     * @param mixed $posts
     *
     * @return Tag
     */
    public function setPosts($posts)
    {
        $this->posts = $posts;
        
        return $this;
    }
    
}

