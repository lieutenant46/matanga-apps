<?php

namespace App\Entity;

use App\Repository\ShoeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=ShoeRepository::class)
 * @Vich\Uploadable
 */
class Shoe
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $price;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $imageName;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $updatedAt;

    /**
     * @ORM\ManyToMany(targetEntity=Size::class, inversedBy="shoes")
     */
    private $sizes;

    /**
     * @ORM\ManyToOne(targetEntity=Brand::class, inversedBy="shoes")
     */
    private $brand;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="shoes")
     */
    private $category;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $person;

    /**
     * @Vich\UploadableField(mapping="brand", fileNameProperty="imageName")
     *
     * @var File|null
     */
    private $imageFile;

    /**
     * @Vich\UploadableField(mapping="brand", fileNameProperty="imageName2")
     *
     * @var File|null
     */
    private $imageFile2;

    /**
     * @Vich\UploadableField(mapping="brand", fileNameProperty="imageName3")
     *
     * @var File|null
     */
    private $imageFile3;

    /**
     * @Vich\UploadableField(mapping="brand", fileNameProperty="imageName4")
     *
     * @var File|null
     */
    private $imageFile4;

    /**
     * @Vich\UploadableField(mapping="brand", fileNameProperty="imageName5")
     *
     * @var File|null
     */
    private $imageFile5;
    /**
     * @ORM\ManyToOne(targetEntity=Banner::class, inversedBy="shoes", fetch="EAGER")
     */
    private $banner;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isActive = true;


    /**
     * @ORM\Column(type="boolean")
     */
    private $isTop;


    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $imageName2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $imageName3;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $imageName4;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $imageName5;


    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable();
        $this->sizes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getImageName(): ?string
    {
        return $this->imageName;
    }

    public function setImageName(string $imageName): self
    {
        $this->imageName = $imageName;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return Collection|Size[]
     */
    public function getSizes(): Collection
    {
        return $this->sizes;
    }

    public function addSize(Size $size): self
    {
        if (!$this->sizes->contains($size)) {
            $this->sizes[] = $size;
        }

        return $this;
    }

    public function removeSize(Size $size): self
    {
        $this->sizes->removeElement($size);

        return $this;
    }

    public function getBrand(): ?Brand
    {
        return $this->brand;
    }

    public function setBrand(?Brand $brand): self
    {
        $this->brand = $brand;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getPerson(): ?string
    {
        return $this->person;
    }

    public function setPerson(string $person): self
    {
        $this->person = $person;

        return $this;
    }
    /**
     * @param File|UploadedFile|null $imageFile
     */
    public function setImageFile(?File $imageFile = null): void
    {
        $this->imageFile = $imageFile;

        if (null !== $imageFile) {
            $this->updatedAt = new \DateTimeImmutable();
        }
    }
    /**
     * @param File|UploadedFile|null $imageFile2
     */
    public function setImageFile2(?File $imageFile2 = null): void
    {
        $this->imageFile2 = $imageFile2;

        if (null !== $imageFile2) {
            $this->updatedAt = new \DateTimeImmutable();
        }
    }
    /**
     * @param File|UploadedFile|null $imageFile3
     */
    public function setImageFile3(?File $imageFile3 = null): void
    {
        $this->imageFile3 = $imageFile3;

        if (null !== $imageFile3) {
            $this->updatedAt = new \DateTimeImmutable();
        }
    }
    /**
     * @param File|UploadedFile|null $imageFile4
     */
    public function setImageFile4(?File $imageFile4 = null): void
    {
        $this->imageFile4 = $imageFile4;

        if (null !== $imageFile4) {
            $this->updatedAt = new \DateTimeImmutable();
        }
    }
    /**
     * @param File|UploadedFile|null $imageFile5
     */
    public function setImageFile5(?File $imageFile5 = null): void
    {
        $this->imageFile5 = $imageFile5;

        if (null !== $imageFile5) {
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }
    public function getImageFile2(): ?File
    {
        return $this->imageFile2;
    }

    public function getImageFile3(): ?File
    {
        return $this->imageFile3;
    }
    public function getImageFile4(): ?File
    {
        return $this->imageFile4;
    }
    public function getImageFile5(): ?File
    {
        return $this->imageFile5;
    }
    public function getBanner(): ?Banner
    {
        return $this->banner;
    }

    public function setBanner(?Banner $banner): self
    {
        $this->banner = $banner;

        return $this;
    }
    public function __toString()
    {
        return (string) $this->name;
    }

    public function getIsActive(): ?bool
    {
        return $this->isActive;
    }

    public function setIsActive(?bool $isActive): self
    {
        $this->isActive = $isActive;

        return $this;
    }

    public function getIsTop(): ?bool
    {
        return $this->isTop;
    }

    public function setIsTop(bool $isTop): self
    {
        $this->isTop = $isTop;

        return $this;
    }

    public function getImageName2(): ?string
    {
        return $this->imageName2;
    }

    public function setImageName2(?string $imageName2): self
    {
        $this->imageName2 = $imageName2;

        return $this;
    }

    public function getImageName3(): ?string
    {
        return $this->imageName3;
    }

    public function setImageName3(?string $imageName3): self
    {
        $this->imageName3 = $imageName3;

        return $this;
    }

    public function getImageName4(): ?string
    {
        return $this->imageName4;
    }

    public function setImageName4(?string $imageName4): self
    {
        $this->imageName4 = $imageName4;

        return $this;
    }

    public function getImageName5(): ?string
    {
        return $this->imageName5;
    }

    public function setImageName5(?string $imageName5): self
    {
        $this->imageName5 = $imageName5;

        return $this;
    }


}
