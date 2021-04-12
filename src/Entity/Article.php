<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use DateTime;
use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\IdGenerator\UuidV4Generator;
use Symfony\Component\Uid\Uuid;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Uid\UuidV4;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Article
 * @author Anais Sparesotto <a.sparesotto@icloud.com>
 * @ORM\Entity(repositoryClass=ArticleRepository::class)
 * @Vich\Uploadable
 */
class Article
{
    /**
     * @var string
     * @ORM\Id
     * @ORM\Column(type="uuid", unique=true)
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class=UuidV4Generator::class)
     */
    private $id = UuidV4::class;

    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     * @Assert\Type(type="string")
     * @Assert\NotBlank
     * @Assert\Length(
     *      min = 2,
     *      max = 255,
     *      minMessage = "Le titre doit avoir au minimum {{ limit }} caractères",
     *      maxMessage = "Le titre doit avoir au maximum {{ limit }} caractères"
     * )
     */
    private string $title;

    /**
     * @var string
     * @ORM\Column(type="text")
     * @Assert\NotBlank
     * @Assert\Length(
     *      min = 2,
     *      max = 2000,
     *      minMessage = "L'article doit avoir au minimum {{ limit }} caractères",
     *      maxMessage = "L'article doit avoir au maximum {{ limit }} caractères"
     * )
     */
    private string $content;

    /**
     * @var DateTime
     * @ORM\Column(type="datetime")
     */
    private DateTime $publicationDate;

    /**
     * @var DateTime | null
     * @ORM\Column(type="datetime")
     */
    private ?DateTime $updatedAt;

    /**
     * @var string
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Length(
     *      min = 1,
     *      max = 255,
     *      minMessage = "Le nom de l'image doit avoir au minimum {{ limit }} caractères",
     *      maxMessage = "Le nom de l'image doit avoir au maximum {{ limit }} caractères"
     * )
     */
    private $featuredImage;

    /**
     * @var file
     * @Vich\UploadableField(mapping="featured_image", fileNameProperty="featuredImage")
     * @Assert\File(
     *     mimeTypes = {"image/jpeg", "image/gif", "image/png", "image/svg"},
     *     mimeTypesMessage = "Le format de l'image est incorect (jpg,gif,png,svg)"
     * )
     */
    private $imageFile;


    /**
     * @var Author
     * @ORM\ManyToOne(targetEntity=Author::class, inversedBy="article")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotNull
     */
    private $author;

    /**
     * @var Category
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="article")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotNull
     */
    private Category $category;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private ?string $slug;

    /**
     * Article constructor.
     */
    public function __construct()
    {
        $this->updatedAt = new DateTime();
    }

    /**
     * @return string
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return $this
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return DateTime | null
     */
    public function getUpdatedAt(): ?DateTime
    {
        return $this->updatedAt;
    }

    /**
     * @param DateTime|null $updatedAt
     */
    public function setUpdatedAt(?DateTime $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * @return string|null
     */
    public function getContent(): ?string
    {
        return $this->content;
    }

    /**
     * @param string $content
     * @return $this
     */
    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getPublicationDate(): ?DateTime
    {
        return $this->publicationDate;
    }

    /**
     * @param DateTime $publicationDate
     * @return $this
     */
    public function setPublicationDate(DateTime $publicationDate): self
    {
        $this->publicationDate = $publicationDate;

        return $this;
    }

    /**
     * @return File | null
     */
    public function getImageFile()
    {
        return $this->imageFile;
    }

    /**
     * @param File|null $image
     * @return $this
     */
    public function setImageFile($image = null): self
    {
        $this->imageFile = $image;

        if ($image) {
            $this->updatedAt = new DateTime();
        }

        return $this;
    }

    /**
     * @return string | null
     */
    public function getFeaturedImage(): ?string
    {
        return $this->featuredImage;
    }

    /**
     * @param string|null $featuredImage
     * @return $this
     */
    public function setFeaturedImage(?string $featuredImage): self
    {
        $this->featuredImage = $featuredImage;

        return $this;
    }

    /**
     * @return Author|null
     */
    public function getAuthor(): ?Author
    {
        return $this->author;
    }

    /**
     * @param Author|null $author
     * @return $this
     */
    public function setAuthor(?Author $author): self
    {
        $this->author = $author;

        return $this;
    }

    /**
     * @return Category|null
     */
    public function getCategory(): ?Category
    {
        return $this->category;
    }

    /**
     * @param Category|null $category
     * @return $this
     */
    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSlug(): ?string
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     * @return $this
     */
    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }
}
