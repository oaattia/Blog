<?php

namespace Oaattia\BlogBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Post
 *
 * @ORM\Table(name="post")
 * @ORM\Entity(repositoryClass="Oaattia\BlogBundle\Repository\PostRepository")
 */
class Post
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
     * @var string
     *
     * @ORM\Column(name="body", type="text")
     */
    private $body;
    
    
    /**
     * @var integer
     *
     * @ORM\ManyToMany(targetEntity="Tag", inversedBy="tags", cascade={"persist"})
     * @ORM\JoinTable(name="posts_tags")
     */
    private $tags;
    
    
    /**
     * Post constructor.
     *
     */
    public function __construct()
    {
        $this->tags = new ArrayCollection();
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
     * Set title
     *
     * @param string $title
     *
     * @return Post
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set body
     *
     * @param string $body
     *
     * @return Post
     */
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }

    /**
     * Get body
     *
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }
    
    /**
     * @return int
     */
    public function getTags()
    {
        return $this->tags->toArray();
    }
    
    /**
     * @param Tag $tag
     *
     * @return Post
     */
    public function setTags(Tag $tag)
    {
        if( !$this->tags->contains($tag) ) {
            $this->tags->add($tag);
        }
        
        return $this;
    }
}

