<?php

namespace App\Controller\Admin;

use App\Entity\Article;
use App\Entity\Contact;
use Doctrine\ORM\Mapping\OneToMany;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Vich\UploaderBundle\Mapping\Annotation\UploadableField;

/**
 * Class ArticleCrudController
 *
 * @author Anais Sparesotto <a.sparesotto@icloud.com>
 */
class ArticleCrudController extends AbstractCrudController
{
    /**
     * @return string
     */
    public static function getEntityFqcn(): string
    {
        return Article::class;
    }

    /**
     * @param string $pageName
     * @return iterable
     */
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title', 'Titre'),
            TextField::new('content', 'Contenu'),
            DateField::new('publicationDate', 'Date de publication')
                ->setFormat('short'),
            AssociationField::new('author', 'Auteur'),
            AssociationField::new('category', 'Catégorie'),
            ImageField::new('featuredImage', 'Nom de l\'image')
                ->setBasePath('uploads/images/articles')->onlyOnDetail(),
            TextareaField::new('imageFile', 'Image')
                ->setFormType(VichImageType::class),
            TextField::new('comment', 'Commentaires'),
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
            ->disable(Action::DETAIL, Action::SAVE_AND_ADD_ANOTHER, Action::SAVE_AND_CONTINUE)
            ->update(Crud::PAGE_INDEX, Action::DELETE, function (Action $action) {
                return $action->setIcon('fa fa-trash-alt')->setLabel('supprimer');
            })
            ->update(Crud::PAGE_INDEX, Action::EDIT, function (Action $action) {
                return $action->setLabel('editer');
            });
    }
}
