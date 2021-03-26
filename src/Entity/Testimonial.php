<?php

namespace App\Entity;

use App\Repository\TestimonialRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Testimonial
 *
 * @author Anais Sparesotto <a.sparesotto@icloud.com>
 * @ORM\Entity(repositoryClass=TestimonialRepository::class)
 */
class Testimonial
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     * @Assert\NotNull(
     *     message = "Ce champ ne peut pas être vide"
     *     )
     * @Assert\Length(
     *      min = 2,
     *      max = 255,
     *      minMessage = "L'entreprise doit avoir au minimum {{ limit }} caractères",
     *      maxMessage = "L'entreprise doit avoir au maximum {{ limit }} caractères"
     * )
     */
    private $compagny;

    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     * @Assert\NotNull(
     *     message = "Ce champ ne peut pas être vide"
     *     )
     * @Assert\Length(
     *      min = 2,
     *      max = 255,
     *      minMessage = "Le métier doit avoir au minimum {{ limit }} caractères",
     *      maxMessage = "Le métier doit avoir au maximum {{ limit }} caractères"
     * )
     */
    private $job;

    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     * @Assert\NotNull(
     *     message = "Ce champ ne peut pas être vide"
     *     )
     * @Assert\Length(
     *      min = 2,
     *      max = 255,
     *      minMessage = "Le nom doit avoir au minimum {{ limit }} caractères",
     *      maxMessage = "Le nom doit avoir au maximum {{ limit }} caractères"
     * )
     */
    private $name;

    /**
     * @var string
     * @ORM\Column(type="text")
     * @Assert\NotNull(
     *     message = "Ce champ ne peut pas être vide"
     *     )
     * @Assert\Length(
     *      min = 20,
     *      max = 600,
     *      minMessage = "Le témoignage doit avoir au minimum {{ limit }} caractères",
     *      maxMessage = "Le témoignage doit avoir au maximum {{ limit }} caractères"
     * )
     */
    private $content;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getCompagny(): ?string
    {
        return $this->compagny;
    }

    /**
     * @param string $compagny
     * @return $this
     */
    public function setCompagny(string $compagny): self
    {
        $this->compagny = $compagny;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getJob(): ?string
    {
        return $this->job;
    }

    /**
     * @param string $job
     * @return $this
     */
    public function setJob(string $job): self
    {
        $this->job = $job;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
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
}
