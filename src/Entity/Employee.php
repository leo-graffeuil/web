<?php

namespace App\Entity;

use App\Repository\EmployeeRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Employee
 *
 * @author Anais Sparesotto <a.sparesotto@icloud.com>
 * @ORM\Entity(repositoryClass=EmployeeRepository::class)
 */
class Employee
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
     * @Assert\NotNull
     * @Assert\Length(
     *      min = 2,
     *      max = 255,
     *      minMessage = "Le nom du salarié doit avoir au minimum {{ limit }} caractères",
     *      maxMessage = "Le nom du salarié doit avoir au maximum {{ limit }} caractères"
     * )
     */
    private $firstName;

    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     * @Assert\NotNull
     * @Assert\Length(
     *      min = 2,
     *      max = 255,
     *      minMessage = "Le prénom du salarié doit avoir au minimum {{ limit }} caractères",
     *      maxMessage = "Le prénom du salarié doit avoir au maximum {{ limit }} caractères"
     * )
     */
    private $lastName;

    /**
     * @var string
     * @ORM\Column(type="text")
     * @Assert\NotNull(
     *     message = "Vous devez renseigner une descritpion"
     *     )
     * @Assert\Length(
     *      min = 2,
     *      max = 800,
     *      minMessage = "Le texte doit avoir au minimum {{ limit }} caractères",
     *      maxMessage = "Le texte doit avoir au maximum {{ limit }} caractères"
     * )
     */
    private $biography;

    /**
     * @var Job|null
     * @ORM\ManyToOne(targetEntity=Job::class, inversedBy="employee")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotNull(
     *      message = "Vous devez choisir un métier"
     * )
     */
    private ?Job $job;

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
     * @param string $firstName
     * @return $this
     */
    public function setFirstName(string $firstName): self
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
     * @param string $lastName
     * @return $this
     */
    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getBiography(): ?string
    {
        return $this->biography;
    }

    /**
     * @param string $biography
     * @return $this
     */
    public function setBiography(string $biography): self
    {
        $this->biography = $biography;

        return $this;
    }

    /**
     * @return Job|null
     */
    public function getJob(): ?Job
    {
        return $this->job;
    }

    /**
     * @param Job|null $job
     * @return $this
     */
    public function setJob(?Job $job)
    {
        $this->job = $job;

        return $this;
    }
}
