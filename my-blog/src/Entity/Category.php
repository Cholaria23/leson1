<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategoryRepository")
 */
class Category
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;


//    /**
//     * @ORM\OneToMany(targetEntity="App\Entity\Category", mappedBy="parent")
//     */
//    private $children;

//    /**
//     * @ORM\OneToOne(targetEntity="App\Entity\Category", mappedBy="parent")
//     */
//    private $parents;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Post", mappedBy="category")
     */
    private $posts;



    public function __construct()
    {
        $this->posts = new ArrayCollection();
        $this->children = new ArrayCollection();
        $this->parents = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return Collection|Post[]
     */
    public function getPosts(): Collection
    {
        return $this->posts;
    }

    public function addPost(Post $post): self
    {
        if (!$this->posts->contains($post)) {
            $this->posts[] = $post;
            $post->setCategory($this);
        }

        return $this;
    }

    public function removePost(Post $post): self
    {
        if ($this->posts->contains($post)) {
            $this->posts->removeElement($post);
            // set the owning side to null (unless already changed)
            if ($post->getCategory() === $this) {
                $post->setCategory(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Category[]
     */
    public function getChildren(): Collection
    {
        return $this->children;
    }

    public function addChild(Category $child): self
    {
        if (!$this->children->contains($child)) {
            $this->children[] = $child;
            $child->setParent($this);
        }

        return $this;
    }

    public function removeChild(Category $child): self
    {
        if ($this->children->contains($child)) {
            $this->children->removeElement($child);
            // set the owning side to null (unless already changed)
            if ($child->getParent() === $this) {
                $child->setParent(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Category[]
     */
    public function getParents(): Collection
    {
        return $this->parents;
    }

    public function addParents(Category $parents): self
    {
        if (!$this->parents->contains($parents)) {
            $this->parents[] = $parents;
            $parents->setParent($this);
        }

        return $this;
    }

    public function removeParents(Category $parents): self
    {
        if ($this->parents->contains($parents)) {
            $this->parents->removeElement($parents);
            // set the owning side to null (unless already changed)
            if ($parents->getParent() === $this) {
                $parents->setParent(null);
            }
        }

        return $this;
    }

  
}
