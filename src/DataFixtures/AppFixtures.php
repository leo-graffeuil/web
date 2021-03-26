<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\Author;
use App\Entity\Category;
use App\Entity\Contact;
use App\Entity\Job;
use App\Entity\Employee;
use App\Entity\Testimonial;
use App\Entity\User;
use bheller\ImagesGenerator\ImagesGeneratorProvider;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Validator\Constraints\Date;
use Faker;

/**
 * Class AppFixtures
 *
 * @author Anais Sparesotto <a.sparesotto@icloud.com>
 */
class AppFixtures extends Fixture
{
    private $passwordEncoder;

    /**
     * AppFixtures constructor.
     * @param UserPasswordEncoderInterface $passwordEncoder
     */
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');
        $contact = [];
        for ($i = 0; $i < 8; $i++) {
            $contact [$i] = new Contact();
            $contact [$i]->setEmail($faker->email);
            $contact [$i]->setFirstName($faker->firstName);
            $contact [$i]->setLastName($faker->lastName);
            $contact [$i]->setMessage($faker->text);
            $contact [$i]->setCreatedAt($faker->dateTime);

            $manager->persist($contact [$i]);
        }

        $author = new Author();
        $author->setFirstName('Sparesotto');
        $author->setLastName('Anais');

        $manager->persist($author);

        $category = new Category();
        $category->setName('Climat');
        $manager->persist($category);

        $article = [];
        for ($i = 0; $i < 10; $i++) {
            $article [$i] = new Article();
            $article [$i]->setTitle($faker->sentence($nbWords = 6, $variableNbWords = true));
            $article [$i]->setContent($faker->text($maxNbChars = 200));
            $article [$i]->setPublicationDate($faker->dateTime);
            $article [$i]->setAuthor($author);
            $article [$i]->setCategory($category);
            $article [$i]->setUpdatedAt($faker->dateTime);
            $article [$i]->setFeaturedImage($faker->name);
            $faker->addProvider(new ImagesGeneratorProvider($faker));

            $manager->persist($article [$i]);
        }

        $job = [];
        for ($i = 0; $i < 7; $i++) {
            $job [$i] = new Job();
            $job [$i]->setName($faker->jobTitle);

            $manager->persist($job [$i]);
        }

        $employee = [];
        for ($i = 0; $i < 6; $i++) {
            $employee [$i] = new Employee();
            $employee [$i]->setFirstName($faker->firstName);
            $employee [$i]->setLastName($faker->lastName);
            $employee [$i]->setBiography($faker->text);
            $employee [$i]->setJob($job[rand(0, 6)]);

            $manager->persist($employee [$i]);
        }

        $testimonial = [];
        for ($i = 0; $i < 3; $i++) {
            $testimonial [$i] = new Testimonial();
            $testimonial [$i]->setCompagny($faker->company);
            $testimonial [$i]->setName($faker->name);
            $testimonial [$i]->setJob($faker->jobTitle);
            $testimonial [$i]->setContent($faker->text);

            $manager->persist($testimonial [$i]);
        }

        $user = new User();
        $user->setEmail('admin@test.fr');
        $user->setPassword($this->passwordEncoder->encodePassword(
            $user,
            'admin'
        ));
        $user->setRoles(['ROLE_ADMIN']);
        $manager->persist($user);

        $manager->flush();
    }
}
