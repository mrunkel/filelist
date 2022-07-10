<?php

namespace App\Entity;

use App\Repository\FileRepository;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;

/**
 * @ORM\Entity(repositoryClass=FileRepository::class)
 */
class File
{
    /**
     * Hook timestampable behavior
     * updates createdAt, updatedAt fields
     */
    use TimestampableEntity;

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private ?int $id = null;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private ?string $path = null;

    /**
     * @ORM\Column(type="bigint")
     */
    private ?string $size = null;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private ?string $filename = null;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private ?string $extension = null;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private ?string $directory = null;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private ?bool $vr = null;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private ?bool $subtitled = null;

    /**
     * @ORM\ManyToOne(targetEntity=Movie::class, inversedBy="files")
     */
    private ?Movie $movie = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPath(): ?string
    {
        return $this->path;
    }

    public function setPath(string $path): self
    {
        $this->path = $path;

        return $this;
    }

    public function getSize(): ?string
    {
        return $this->size;
    }

    public function setSize(string $size): self
    {
        $this->size = $size;

        return $this;
    }

    public function getFilename(): ?string
    {
        return $this->filename;
    }

    public function setFilename(string $filename): self
    {
        $this->filename = $filename;

        return $this;
    }

    public function getExtension(): ?string
    {
        return $this->extension;
    }

    public function setExtension(string $extension): self
    {
        $this->extension = $extension;

        return $this;
    }

    public function getDirectory(): ?string
    {
        return $this->directory;
    }

    public function setDirectory(string $directory): self
    {
        $this->directory = $directory;

        return $this;
    }

    public function getVr(): ?bool
    {
        return $this->vr;
    }

    public function setVr(?bool $vr): self
    {
        $this->vr = $vr;

        return $this;
    }

    public function getSubtitled(): ?bool
    {
        return $this->subtitled;
    }

    public function setSubtitled(?bool $subtitled): self
    {
        $this->subtitled = $subtitled;

        return $this;
    }

    public function getMovie(): ?Movie
    {
        return $this->movie;
    }

    public function setMovie(?Movie $movie): self
    {
        $this->movie = $movie;

        return $this;
    }
}
