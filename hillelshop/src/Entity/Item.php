<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ItemRepository")
 */
class Item
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $price;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    // *
    //  * @ORM\Column(type="string", length=255)
     
    // private $image;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ItemImage", mappedBy="item")
     */
    private $itemImages;

    public function __construct()
    {
        $this->itemImages = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    // public function getImage(): ?string
    // {
    //     return $this->image;
    // }

    // public function setImage(string $image): self
    // {
    //     $this->image = $image;

    //     return $this;
    // }

    /**
     * @return Collection|ItemImage[]
     */
    public function getItemImages(): Collection
    {
        return $this->itemImages;
    }

    public function addItemImage(ItemImage $itemImage): self
    {
        if (!$this->itemImages->contains($itemImage)) {
            $this->itemImages[] = $itemImage;
            $itemImage->setItem($this);
        }

        return $this;
    }

    public function removeItemImage(ItemImage $itemImage): self
    {
        if ($this->itemImages->contains($itemImage)) {
            $this->itemImages->removeElement($itemImage);
            // set the owning side to null (unless already changed)
            if ($itemImage->getItem() === $this) {
                $itemImage->setItem(null);
            }
        }

        return $this;
    }
}
