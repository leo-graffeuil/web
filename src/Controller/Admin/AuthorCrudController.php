<?php

namespace App\Controller\Admin;

use App\Entity\Article;
use App\Entity\Author;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

/**
 * Class AuthorCrudController
 *
 * @author Anais Sparesotto <a.sparesotto@icloud.com>
 */
class AuthorCrudController extends AbstractCrudController
{
    /**
     * @return string
     */
    public static function getEntityFqcn(): string
    {
        return Author::class;
    }

    /**
     * @param string $pageName
     * @return iterable
     */
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('firstName', 'Nom'),
            TextField::new('lastName', 'Prénom'),
        ];
    }

    /**
     * @param Actions $actions
     * @return Actions
     */
    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->add(Crud::PAGE_INDEX, Action::DETAIL)
            ->disable(Action::DETAIL, Action::SAVE_AND_CONTINUE, Action::SAVE_AND_ADD_ANOTHER)
            ->update(Crud::PAGE_INDEX, Action::DELETE, function (Action $action) {
                return $action->setIcon('fa fa-trash-alt')->setLabel('supprimer');
            })
            ->update(Crud::PAGE_INDEX, Action::EDIT, function (Action $action) {
                return $action->setIcon('fa fa-pen')->setLabel('éditer');
            })
            ->update(Crud::PAGE_EDIT, Action::SAVE_AND_RETURN, function (Action $action) {
                return $action->setLabel('sauvegarder');
            })
            ;
    }

    /**
     * @param EntityManagerInterface $entityManager
     * @param                        $entityInstance
     */
    public function deleteEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        $articles = $entityManager->getRepository(Article::class)->findBy(
            [
                'author' => $entityInstance->getId()
            ]
        );

        if (count($articles) > 0) {
            $session = $this->get('request_stack')->getCurrentRequest()->getSession();
            $session->getFlashBag()->add('danger', 'Cette auteur à écrit des articles et ne peut pas être supprimé');
            return;
        }

        parent::deleteEntity($entityManager, $entityInstance);
    }
}
