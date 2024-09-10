<?php
/*  ********************************     VIDEO GRAFIKART: LES FORMULAIRES       *********************   */
namespace App\Form;

use App\Entity\Recipe;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;       // Ajout de cet use qui n'apparait pas dans la video de GrafikArt "formulaires": 8min53 pour ajouter le bouton "save" de mon formulaire
use Symfony\Component\Form\Extension\Core\Type\TextType;         // Ajout de cet use qui n'apparait pas dans la video de GrafikArt "formulaires": 9min23 pour changer le 'title' de mon formulaire par 'titre. 
use Symfony\Component\Form\Event\PreSubmitEvent;                //  Ajout de cet use qui n'apparait pas dans la video de GrafikArt "formulaires": 31min30
use Symfony\Component\Form\Event\PostSubmitEvent;               //  Ajout de cet use qui n'apparait pas dans la video de GrafikArt "formulaires": 31min30
use Symfony\Component\Form\FormEvents;                          //  Ajout de cet use qui n'apparait pas dans la video de GrafikArt "formulaires": 31min30
use Symfony\Component\String\Slugger\AsciiSlugger;              //  Ajout de cet use qui n'apparait pas dans la video de GrafikArt "formulaires": 33min17
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
                    'label' => 'Envoyer'                            // pour modifier le libellé "save" du dessus, j'ai ajouté ce label pour "envoyer"
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
                    'label' => 'Envoyer'                            // pour modifier le libellé "save" du dessus, j'ai ajouté ce label pour "envoyer"
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

/*
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
                    'label' => 'Envoyer'                            // pour modifier le libellé "save" du dessus, j'ai ajouté ce label pour "envoyer"
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


/*  ***************************************  VIDEO GrafikArt   "LES FORMULAIRES":   A partir de  30min29 "quand l'utilisateur laisse un champ de mon formulaire vide ou ne respecte pas les consignes du formulaire"     *******************************************         */

/*
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
                    'label' => 'Envoyer'                            // pour modifier le libellé "save" du dessus, j'ai ajouté ce label pour "envoyer"
            ])      
            // Video: "formulaires":30min30s                                
            ->addEventListener(FormEvents::PRE_SUBMIT, $this->autoSlug(...))       // les points de suspension = crée une collab à partir de cette méthode là.                                          
        ;
    }

    public function autoSlug(PreSubmitEvent $event): void // 'void' permet de préciser que la fonction ne renverra rien
    {
         // Video: "formulaires":31min32s
        $data = $event->getData();
        if(empty($data['slug']))             // Si slug dans Data est vide, mais que l'utilisateur a complété le 'title' je veux que tu crées automatiquement le slug à partir de ce titre
        { 
            $slugger = new AsciiSlugger();
            $data['slug'] =  strtolower($slugger->slug($data['title']));                    // Au niveau de Data, dans la partie slug, j'aimerais que tu crées un slugger. À partir de ce moment là, on peut utiliser le slugger pour créer un slug dans Data. Le 'strtolower' le met en minuscule.
            $event->setData($data); // qui permet de modifier, de lui injecter les nouvelles données
        } 
        //dd($event->getData()); //Pour récupérer les données qui ont été posté
        //$event->setData(); // qui permet de modifier les données
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Recipe::class,
        ]);
    }
}

*/

/*  ***************************************  VIDEO GrafikArt   "LES FORMULAIRES":   A partir de 33min54 : Création de la fonction 'attachTimestamps()'     *******************************************         */

class RecipeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        
            ->add('title')                
            ->add('slug', TextType::class, [               // Video: "forumulaires": 34min46 pour la partie POST_SUBMIT
                'required' => false
                ]) 
            ->add('content')
            ->add('duration')           
            ->add('save', SubmitType::class, [                     // Video: "forumulaires": 8min53: Ajout d'un nouveau bouton
                    'label' => 'Envoyer'                            // pour modifier le libellé "save" du dessus, j'ai ajouté ce label pour "envoyer"
            ])      
            // Video: "formulaires":30min30s                                
            ->addEventListener(FormEvents::PRE_SUBMIT, $this->autoSlug(...))       // les points de suspension = crée une collab à partir de cette méthode là.   
            ->addEventListener(FormEvents::POST_SUBMIT, $this->attachTimestamps(...))       // Video: "forumulaires": 34min14                                    
        ;
    }

    public function autoSlug(PreSubmitEvent $event): void // 'void' permet de préciser que la fonction ne renverra rien
    {
         // Video: "formulaires":31min32s
        $data = $event->getData();
        if(empty($data['slug']))             // Si slug dans Data est vide, mais que l'utilisateur a complété le 'title' je veux que tu crées automatiquement le slug à partir de ce titre
        { 
            $slugger = new AsciiSlugger();
            $data['slug'] =  strtolower($slugger->slug($data['title']));                    // Au niveau de Data, dans la partie slug, j'aimerais que tu crées un slugger. À partir de ce moment là, on peut utiliser le slugger pour créer un slug dans Data. Le 'strtolower' le met en minuscule.
            $event->setData($data); // qui permet de modifier, de lui injecter les nouvelles données
        } 
  
    }
    // Video: "formulaires":33min54s
    public function attachTimestamps(PostSubmitEvent $event): void      // 'void' permet de préciser que la fonction ne renverra rien
    {
            // video 'formulaires: 35min12': pour faire les traitements
        $data = $event->getData();
                    //On va mettre une petite condition supplémentaire
        if(!($data instanceof Recipe))                          // Si data est différent d'une instance 'Recipe'
        {
            return;
        }
        $data->setUpdatedAt(new \DateTimeImmutable());
        if(!$data->getId())      //Si au niveau de mon data, je n'ai pas de getId, ça veut dire que c'est une nouvelle entité
        {
            $data->setCreatedAt(new \DateTimeImmutable());
        }
        
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
