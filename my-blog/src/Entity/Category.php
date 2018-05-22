<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use PhpParser\Node\Expr\Array_;


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


    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Category", inversedBy="children")
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id", nullable=true)
     */
    private $parent_id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Category", mappedBy="parent_id")
     */
    private $children;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Post", mappedBy="category")
     */
    private $posts;

    public function __toString()
    {
        return $this->parent_id ? $this->parent_id : 'NEW';
    }

    public function __construct()
    {
        $this->posts = new Array_();
        $this->children = new ArrayCollection();
      $this->parent_id = new Array_();
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
    public function getParent_id()
    {
        return $this->parent_id;
    }

    /**
     * Set parent
     *
     * @param integer $parent_id
     * @return Categories
     */
    public function setParent($parent_id)
    {
        $this->parent_id = $parent_id;

        return $this;
    }

//    /**
//     * Get parent
//     *
//     * @return integer
//     */
//    public function getParent()
//    {
//        $link = mysqli_connect("localhost", "root", "", "mypost");
//        $query = 'SELECT * FROM category';
//        $result = mysqli_query($link,$query);
////        var_dump($res);
//        $arr_cat = array();
//        if(mysqli_num_rows($result) !=0)
//        {
//            for ($i = 0;$i<mysqli_num_rows($result);$i++)
//            {
//                $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
//
//                if(empty($arr_cat[$row['parent_id']]))
//                {
//                   $this->parent = $arr_cat[$row['parent_id']]= array();
//                }
//                $this->parent = $arr_cat[$row['parent_id']][] = $row;
//            }
//        }
//
//        return $this->parent;
//    }
//    public function categoty_tree($dataset){
//        $tree = array();
//        foreach ($dataset as $id=>&$node){
//            if(!$node['parent_id']){
//                $tree[$id] = &$node;
//            }else {$dataset[$node['parent_id']]['children'][$id] = &$node;}
//        }
//        return $tree;
//    }
//    public function addParent(Category $parent): self
//    {
//        if (!$this->parent->contains($parent)) {
//            $this->parent[] = $parent;
//            $parent->setParent($this);
//        }
//
//        return $this;
//    }

    public function removeParent(Category $parent): self
    {
        if ($this->parent->contains($parent)) {
            $this->parent->removeElement($parent);
            // set the owning side to null (unless already changed)
            if ($parent->getParent() === $this) {
                $parent->setParent(null);
            }
        }

        return $this;
    }

    public function object_to_array($catgories)
    {
        if (is_array($catgories) || is_object($catgories))
        {
            $result = array();
            foreach ($catgories as $key => $value)
            {
                $result[$key] = object_to_array($value);
            }
            return $result;
        }
        return $catgories;
    }
  
}
