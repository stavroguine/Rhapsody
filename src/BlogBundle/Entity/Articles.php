<?php

namespace BlogBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
* @ORM\Entity(repositoryClass="BlogBundle\Repository\BlogRepository")
* @ORM\Table(name="blog")
* @ORM\HasLifecycleCallbacks()
*/


class Articles
{
    public function __construct()
    {
        $this->setCreated(new \DateTime());
        $this->setUpdated(new \DateTime());

        $this->comments = new ArrayCollection();

        $this->setCreated(new \DateTime());
        $this->setUpdated(new \DateTime());
    }

    public function __toString()
    {
        return $this->getTitle();
    }

    /**
    * @ORM\PreUpdate
    */
    public function setUpdatedValue()
    {
        $this->setUpdated(new \DateTime());
    }
    /**
    * @ORM\Id
    * @ORM\Column(type="integer")
    * @ORM\GeneratedValue(strategy="AUTO")
    */
    protected $id;

    /**
    * @ORM\Column(type="string")
    */
    protected $title;

    /**
    * @ORM\Column(type="string", length=100)
    */
    protected $author;

    /**
    * @ORM\Column(type="text")
    */
    protected $blog;

    /**
    * @ORM\Column(type="string", length=20)
    */
    protected $image;

    /**
    * @ORM\Column(type="text")
    */
    protected $tags;

    /**
    * @ORM\OneToMany(targetEntity="Comment", mappedBy="blog")
    */

    protected $comments;

    /**
    * @ORM\Column(type="datetime")
    */
    protected $created;

    /**
    * @ORM\Column(type="datetime")
    */
    protected $updated;

    /**
    * Get id
    *
    * @return integer
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
    * @return Articles
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
    * Set author
    *
    * @param string $author
    *
    * @return Articles
    */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
    * Get author
    *
    * @return string
    */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
    * Set blog
    *
    * @param string $blog
    *
    * @return Articles
    */
    public function setBlog($blog)
    {
        $this->blog = $blog;

        return $this;
    }

    /**
    * Get blog
    *
    * @return string
    */
    public function getBlog($length = null)
    {
        if (false === is_null($length) && $length > 0)
        return substr($this->blog, 0, $length);
        else
        return $this->blog;
    }

    /**
    * Set image
    *
    * @param string $image
    *
    * @return Articles
    */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
    * Get image
    *
    * @return string
    */
    public function getImage()
    {
        return $this->image;
    }

    /**
    * Set tags
    *
    * @param string $tags
    *
    * @return Articles
    */
    public function setTags($tags)
    {
        $this->tags = $tags;

        return $this;
    }

    /**
    * Get tags
    *
    * @return string
    */
    public function getTags()
    {
        return $this->tags;
    }

    /**
    * Set created
    *
    * @param \DateTime $created
    *
    * @return Articles
    */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
    * Get created
    *
    * @return \DateTime
    */
    public function getCreated()
    {
        return $this->created;
    }

    /**
    * Set updated
    *
    * @param \DateTime $updated
    *
    * @return Articles
    */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
    * Get updated
    *
    * @return \DateTime
    */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
    * Add comment
    *
    * @param \BlogBundle\Entity\Comment $comment
    *
    * @return Articles
    */
    public function addComment(\BlogBundle\Entity\Comment $comment)
    {
        $this->comments[] = $comment;

        return $this;
    }

    /**
    * Remove comment
    *
    * @param \BlogBundle\Entity\Comment $comment
    */
    public function removeComment(\BlogBundle\Entity\Comment $comment)
    {
        $this->comments->removeElement($comment);
    }

    /**
    * Get comments
    *
    * @return \Doctrine\Common\Collections\Collection
    */
    public function getComments()
    {
        return $this->comments;
    }

    /**
    * @ORM\ManyToOne(targetEntity="Category", inversedBy="blogPosts")
    */
    private $category;

    public function setCategory(Category $category)
    {
        $this->category = $category;
    }

    public function getCategory()
    {
        return $this->category;
    }

    /**
    * @var bool
    *
    * @ORM\Column(name="draft", type="boolean")
    */
    private $draft = false;
}
