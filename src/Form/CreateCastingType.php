<?php

namespace App\Form;

use App\Entity\Casting;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CreateCastingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('reference')
            ->add('intitule')
            ->add('dateDebutPublication')
            ->add('dureeDiffusion')
            ->add('dateDebutContrat')
            ->add('nombrePosteDispo')
            ->add('localisation')
            ->add('description')
            ->add('descriptionProfilRecherche')
            ->add('email')
            ->add('numeroTelephone')
            ->add('fax')
            ->add('siteWeb')
            ->add('adressePostale')
            ->add('verifie')
            ->add('metier')
            ->add('sexe')
            ->add('typeContrat')
//            ->add('professionnel')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Casting::class,
        ]);
    }
}
