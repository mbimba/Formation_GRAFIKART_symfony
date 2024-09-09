<?php
/*  ********************************     VIDEO GRAFIKART: LES FORMULAIRES       *********************   */
namespace App\Form;

use App\Entity\Recipe;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;       // Ajout de cet use qui n'apparait pas dans la video de GrafikArt "formulaires": 8min53 pour ajouter le bouton "save" de mon formulaire
use Symfony\Component\Form\Extension\Core\Type\TextType;         // Ajout de cet use qui n'apparait pas dans la video de GrafikArt "formulaires": 9min23 pour changer le 'title' de mon formulaire par 'titre. 



/*  ***************************************             *******************************************         */
 
/*
/*
class RecipeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
         /*   ->add('title', TextType::class, [                     // Video: "forumulaires": 9min23: Pour changer le champs 'title'      
                    'label' => 'Titre'
            ])       
        */
/*
            ->add('title')                
            ->add('slug')
            ->add('content')
            ->add('createdAt', null, [
                'widget' => 'single_text'
            ])
            ->add('updatedAt', null, [
                'widget' => 'single_text'
            ])
            ->add('duration')           
            ->add('save', SubmitType::class, [                     // Video: "forumulaires": 8min53: Ajout d'un nouveau bouton
                    'label' => 'Envoyer'                            // pour modifier le libellé "save" du dessus, j'ai ajouté ce label poue "envoyer"
            ])     
                
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Recipe::class,
        ]);
    }
}       */

/*  ***************************************  VIDEO GrafikArt   "LES FORMULAIRES":         *******************************************         */
/*
class RecipeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        
            ->add('title')                
            ->add('slug')
            ->add('content')
            ->add('createdAt', null, [
                'widget' => 'single_text'
            ])
            ->add('updatedAt', null, [
                'widget' => 'single_text'
            ])
            ->add('duration')           
            ->add('save', SubmitType::class, [                     // Video: "forumulaires": 8min53: Ajout d'un nouveau bouton
                    'label' => 'Envoyer'                            // pour modifier le libellé "save" du dessus, j'ai ajouté ce label poue "envoyer"
            ])     
                
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Recipe::class,
        ]);
    }
}

*/


/*  ***************************************  VIDEO GrafikArt   "LES FORMULAIRES":   A partir de 10min48s      *******************************************         */
class RecipeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        
            ->add('title')                
            ->add('slug')
            ->add('content')
            ->add('duration')           
            ->add('save', SubmitType::class, [                     // Video: "forumulaires": 8min53: Ajout d'un nouveau bouton
                    'label' => 'Envoyer'                            // pour modifier le libellé "save" du dessus, j'ai ajouté ce label poue "envoyer"
            ])     
                
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Recipe::class,
        ]);
    }
}




/*  ***************************************  VIDEO GrafikArt   "LES FORMULAIRES":   A partir de       *******************************************         */
/*  ***************************************  VIDEO GrafikArt   "LES FORMULAIRES":   A partir de       *******************************************         */
/*  ***************************************  VIDEO GrafikArt   "LES FORMULAIRES":   A partir de       *******************************************         */
/*  ***************************************  VIDEO GrafikArt   "LES FORMULAIRES":   A partir de       *******************************************         */
/*  ***************************************  VIDEO GrafikArt   "LES FORMULAIRES":   A partir de       *******************************************         */
