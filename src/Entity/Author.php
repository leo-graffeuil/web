<?php

namespace App\Entity;

use App\Repository\AuthorRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Author
 *
 * @author Anais Sparesotto <a.sparesotto@icloud.com>
 * @ORM\Entity(repositoryClass=AuthorRepository::class)
 */
class Author
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string", length=255, nullable=false)
     * @Assert\Length(
     *      min = 2,
     *      max = 255,
     *      minMessage = "Le nom de l'auteur doit avoir au minimum {{ limit }} caractères",
     *      maxMessage = "Le nom de l'auteur doit avoir au maximum {{ limit }} caractères"
     * )
     */
    private string $firstName;

    /**
     * @var string
     * @ORM\Column(type="string", length=255, nullable=false)
     * @Assert\Length(
     *      min = 2,
     *      max = 255,
     *      minMessage = "Le prénom de l'auteur doit avoir au minimum {{ limit }} caractères",
     *      maxMessage = "Le prénom de l'auteur doit avoir au maximum {{ limit }} caractères"
     * )
     */
    private string $lastName;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity=Article::class, mappedBy="author")
     */
    private $article;

    /**
     * Author constructor.
     */
    public function __construct()
    {
        $this->article = new ArrayCollection();
    }

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
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * @param string|null $firstName
     * @return $this
     */
    public function setFirstName(?string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * @param string|null $lastName
     * @return $this
     */
    public function setLastName(?string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * @return Collection|Article[]
     */
    public function getArticle(): Collection
    {
        return $this->article;
    }

    /**
     * @param Article $article
     * @return $this
     */
    public function addArticle(Article $article): self
    {
        if (!$this->article->contains($article)) {
            $this->article[] = $article;
            $article->setAuthor($this);
        }

        return $this;
    }

    /**
     * @param Article $article
     * @return $this
     */
    public function removeArticle(Article $article): self
    {
        if ($this->article->removeElement($article)) {
            if ($article->getAuthor() === $this) {
                $article->setAuthor(null);
            }
        }

        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getFullUsername();
    }

    /**
     * @return string
     */
    public function getFullUsername(): string
    {
        return $this->firstName . ' ' . ' ' . $this->lastName;
    }
}
