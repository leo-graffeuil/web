<?php

namespace App\Controller\Admin;

use App\Entity\Partners;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

/**
 * Class PartnersCrudController
 *
 * @author Anais Sparesotto <a.sparesotto@icloud.com>
 */
class PartnersCrudController extends AbstractCrudController
{
    /**
     * @return string
     */
    public static function getEntityFqcn(): string
    {
        return Partners::class;
    }

    /**
     * @param string $pageName
     * @return iterable
     */
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('companyName', 'Entreprise'),
            TextareaField::new('biography', 'Présentation'),
            TextField::new('website', 'Site Internet'),
            ImageField::new('featuredImage', 'Nom de l\'image')
                ->setBasePath('uploads/images/partners')->onlyOnDetail(),
            TextareaField::new('imageFile', 'Image')
                ->setFormType(VichImageType::class)
                ->setTranslationParameters(['form.label.delete' => 'supprimer'])
            ,];
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
