<?php

namespace App\Entity;

use App\Repository\PartnersRepository;
use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Uid\UuidV4;
use Symfony\Bridge\Doctrine\IdGenerator\UuidV4Generator;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Partners
 *
 * @author Anais Sparesotto <a.sparesotto@icloud.com>
 * @ORM\Entity(repositoryClass=PartnersRepository::class)
 * @Vich\Uploadable
 */
class Partners
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
     *      minMessage = "Le nom de l'entreprise doit avoir au minimum {{ limit }} caractères",
     *      maxMessage = "Le nom de l'entreprise doit avoir au maximum {{ limit }} caractères"
     * )
     */
    private ?string $companyName;

    /**
     * @var string
     * @ORM\Column(type="text")
     * @Assert\NotBlank
     * @Assert\Length(
     *      min = 2,
     *      max = 2000,
     *      minMessage = "Le contenu doit avoir au minimum {{ limit }} caractères",
     *      maxMessage = "Le contenu doit avoir au maximum {{ limit }} caractères"
     * )
     */
    private string $biography;

    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     * @Assert\Url(
     *    message = "L'url '{{ value }}' n'est pas valide",
     * )
     */
    private string $website;

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
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getCompanyName(): ?string
    {
        return $this->companyName;
    }

    /**
     * @param string $companyName
     */
    public function setCompanyName(string $companyName): void
    {
        $this->companyName = $companyName;
    }

    /**
     * @return string
     */
    public function getBiography(): string
    {
        return $this->biography;
    }

    /**
     * @param string $biography
     */
    public function setBiography(string $biography): void
    {
        $this->biography = $biography;
    }

    /**
     * @return string
     */
    public function getWebsite(): string
    {
        return $this->website;
    }

    /**
     * @param string $website
     */
    public function setWebsite(string $website): void
    {
        $this->website = $website;
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
}
