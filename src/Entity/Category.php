<?php

namespace App\Entity;

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
     * @ORM\Column(type="integer", nullable=true)
     */
    private $editor;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEditor(): ?int
    {
        return $this->editor;
    }

    public function setEditor(?int $editor): self
    {
        $this->editor = $editor;

        return $this;
    }
}
