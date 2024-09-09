<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Repository\RecipeRepository; 
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Recipe;        // ajout de cet use qui n'apparait pas dans la video de GrafikArt
use App\Form\RecipeType;        // ajout de cet use qui n'apparait pas dans la video de GrafikArt (à partir de 5minutes)
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
// use Symfony\Bridge\Doctrine\ArgumentResolver\EntityValueResolver;


/*class RecipeController extends AbstractController
{
    #[Route('/recette/{slug}-{id}', name: 'recipe.show', requirements: ['id' => '\d+', 'slug' => '[a-z0-9-]+'])]
    public function index(Request $request, string $slug, int $id): Response
    {
      #dd($request->attributes->get('slug'), $request->attributes->getInt('id'));        #getIn: permet de donner un entier
    dd($slug, $id);
    }
} */

//********************************************************************************************************************************
    /*
    class RecipeController extends AbstractController
    {

        #[Route('/recette', name: 'recipe.index')]
        public function index(Request $request): Response
        {
          #dd($request->attributes->get('slug'), $request->attributes->getInt('id'));        #getIn: permet de donner un entier
        return new Response('Recettes');
        }


        #[Route('/recette/{slug}-{id}', name: 'recipe.show', requirements: ['id' => '\d+', 'slug' => '[a-z0-9-]+'])]
        public function show(Request $request, string $slug, int $id): Response
        {
          #dd($request->attributes->get('slug'), $request->attributes->getInt('id'));        #getIn: permet de donner un entier

        return new JsonResponse([
            'slug' => $slug
        ]);

          return new Response('Recette : ' .$slug);

        }
    } */

//********************************************************************************************************************************
     /* class RecipeController extends AbstractController
    {

        #[Route('/recette', name: 'recipe.index')]
        public function index(Request $request): Response
        {
          #dd($request->attributes->get('slug'), $request->attributes->getInt('id'));        #getIn: permet de donner un entier
        return new Response('Recettes');
        }


        #[Route('/recette/{slug}-{id}', name: 'recipe.show', requirements: ['id' => '\d+', 'slug' => '[a-z0-9-]+'])]
        public function show(Request $request, string $slug, int $id): Response
        {
          #dd($request->attributes->get('slug'), $request->attributes->getInt('id'));        #getIn: permet de donner un entier

        return $this->json([
            'slug' => $slug
        ]);

        

        }
    }*/

    //********************************************************************************************************************************

   /* class RecipeController extends AbstractController
    {

        #[Route('/recette', name: 'recipe.index')]
        public function index(Request $request): Response
        {
          #dd($request->attributes->get('slug'), $request->attributes->getInt('id'));        #getIn: permet de donner un entier
        return new Response('Recettes');
        }


        #[Route('/recette/{slug}-{id}', name: 'recipe.show', requirements: ['id' => '\d+', 'slug' => '[a-z0-9-]+'])]
        public function show(Request $request, string $slug, int $id): Response
        {
          #dd($request->attributes->get('slug'), $request->attributes->getInt('id'));        #getIn: permet de donner un entier

        return $this->json([
            'slug' => $slug
        ]);

        

        }
    }*/

        //***************************************************** MOTEUR DE TEMPLATE TWIG *************************************************************

        /*class RecipeController extends AbstractController
        {
    
            #[Route('/recette', name: 'recipe.index')]
            public function index(Request $request): Response
            {
              #dd($request->attributes->get('slug'), $request->attributes->getInt('id'));        #getIn: permet de donner un entier
            return $this->render('recipe/index.html.twig');
            }
    
    
            #[Route('/recette/{slug}-{id}', name: 'recipe.show', requirements: ['id' => '\d+', 'slug' => '[a-z0-9-]+'])]
            public function show(Request $request, string $slug, int $id): Response
            {
              #dd($request->attributes->get('slug'), $request->attributes->getInt('id'));        #getIn: permet de donner un entier
    
            return $this->json([
                'slug' => $slug
            ]);
    
            
    
            }
        }*/

        //***************************************************** MOTEUR DE TEMPLATE TWIG: partie du fichier "show.html.twig"  *************************************************************

       /* class RecipeController extends AbstractController
        {
    
            #[Route('/recette', name: 'recipe.index')]
            public function index(Request $request): Response
            {
             
              #dd($request->attributes->get('slug'), $request->attributes->getInt('id'));        #getIn: permet de donner un entier
            return $this->render('recipe/index.html.twig');
            }
    
    
            #[Route('/recette/{slug}-{id}', name: 'recipe.show', requirements: ['id' => '\d+', 'slug' => '[a-z0-9-]+'])]
            public function show(Request $request, string $slug, int $id): Response
            {
              #dd($request->attributes->get('slug'), $request->attributes->getInt('id'));        #getIn: permet de donner un entier
    
            return $this->render('recipe/show.html.twig' , [
                'slug' => $slug,
                'id' => $id,
                'demo' => '<strong>Hello</strong>',
                'person' => [
                    'firstname' => 'john',
                    'lastname' => 'Doe'
                ]
            ]);
    
            
    
            }
        } */
/*
          //*****************************************************L'ORM Doctrine   *************************************************************

           class RecipeController extends AbstractController
        {
      
              #[Route('/recette', name: 'recipe.index')]
              public function index(Request $request, RecipeRepository $repository): Response
              {
                $recipes = $repository->findAll();  // Find prend en paramètre l'id et permet de trouver un enregistrement en particulier. FindBy permet de spécifier un critère sous forme de tableau
              //  dd($recipes);
              return $this->render('recipe/index.html.twig', [
                'recipes' => $recipes
              ]);

              }
      
      
              #[Route('/recette/{slug}-{id}', name: 'recipe.show', requirements: ['id' => '\d+', 'slug' => '[a-z0-9-]+'])]
              public function show(Request $request, string $slug, int $id, RecipeRepository $repository): Response
              {
               //Pour chercher par l'id, on fait: 
                $recipe = $repository->find($id);
                if ($recipe->getSlug() !== $slug) {
                  return $this->redirectToRoute('recipe.show', ['slug' => $recipe->getSlug(), 'id' => $recipe->getId()]);
                }
                //Pour chercher par le slug, on fait: 
                        //$recipe = $repository->findOneBy(['slug' => $slug]);
               // dd($recipe);
              return $this->render('recipe/show.html.twig' , [
                  'slug' => $slug,
                  'id' => $id,
                  'demo' => '<strong>Hello</strong>',
                  'person' => [
                      'firstname' => 'john',
                      'lastname' => 'Doe'
                  ]
              ]);
      
              
      
              }
          }
        */

            //*****************************************************L'ORM Doctrine: part 2   *************************************************************

      /*      class RecipeController extends AbstractController
            {
          
                  #[Route('/recette', name: 'recipe.index')]
                  public function index(Request $request, RecipeRepository $repository): Response
                  {
                    $recipes = $repository->findAll();  // Find prend en paramètre l'id et permet de trouver un enregistrement en particulier. FindBy permet de spécifier un critère sous forme de tableau
                  //  dd($recipes);
                  return $this->render('recipe/index.html.twig', [
                    'recipes' => $recipes
                  ]);
    
                  }
          
          
                  #[Route('/recette/{slug}-{id}', name: 'recipe.show', requirements: ['id' => '\d+', 'slug' => '[a-z0-9-]+'])]
                  public function show(Request $request, string $slug, int $id, RecipeRepository $repository): Response
                  {
                   //Pour chercher par l'id, on fait: 
                    $recipe = $repository->find($id);
                    if ($recipe->getSlug() !== $slug) {
                      return $this->redirectToRoute('recipe.show', ['slug' => $recipe->getSlug(), 'id' => $recipe->getId()]);
                    }
                    //Pour chercher par le slug, on fait: 
                            //$recipe = $repository->findOneBy(['slug' => $slug]);
                   //dd($recipe);
                  return $this->render('recipe/show.html.twig' , [
                      'recipe' => $recipe 
                      
                  ]);
          
                  
          
                  }
              }
                  
*/

//***************************L'ORM Doctrine: part 3: à partir de 24min25secondes : Requête personnalisée (par exemple: pour afficher les requêtes qui durent moins de 10min)   ************************************
/*
class RecipeController extends AbstractController
{

      #[Route('/recette', name: 'recipe.index')]
      public function index(Request $request, RecipeRepository $repository): Response
      {
        $recipes = $repository->findWithDurationLowerThan(20);  // Find prend en paramètre l'id et permet de trouver un enregistrement en particulier. FindBy permet de spécifier un critère sous forme de tableau. '20' pour 20 minutes
      //  dd($recipes);
      return $this->render('recipe/index.html.twig', [
        'recipes' => $recipes
      ]);

      }


      #[Route('/recette/{slug}-{id}', name: 'recipe.show', requirements: ['id' => '\d+', 'slug' => '[a-z0-9-]+'])]
      public function show(Request $request, string $slug, int $id, RecipeRepository $repository): Response
      {
       //Pour chercher par l'id, on fait: 
        $recipe = $repository->find($id);
        if ($recipe->getSlug() !== $slug) {
          return $this->redirectToRoute('recipe.show', ['slug' => $recipe->getSlug(), 'id' => $recipe->getId()]);
        }
        //Pour chercher par le slug, on fait: 
                //$recipe = $repository->findOneBy(['slug' => $slug]);
       // dd($recipe);
      return $this->render('recipe/show.html.twig' , [
          'recipe' => $recipe 
          
      ]);

      

      }
  }
  */

  
//  *****************************   L'ORM Doctrine: part 4: à partir de 26min07secondes : Comment modifier un enregistrement     *************************
/*
class RecipeController extends AbstractController
{

      #[Route('/recette', name: 'recipe.index')]
      public function index(Request $request, RecipeRepository $repository, EntityManagerInterface $em): Response // em: comme EntityManager
      {
        $recipes = $repository->findWithDurationLowerThan(20);  // Find prend en paramètre l'id et permet de trouver un enregistrement en particulier. FindBy permet de spécifier un critère sous forme de tableau. '20' pour 20 minutes
        $recipes[0]->setTitle('Bala papa');     // Bala papa: est écrit avec cette erreur car on fait un test de modification de notre titre de départ dans la base de données
        $em->flush();   // La méthode flush permet de modifier l'information ou un enregistrement dans notre base de données.
      return $this->render('recipe/index.html.twig', [
        'recipes' => $recipes
      ]);

      }


      #[Route('/recette/{slug}-{id}', name: 'recipe.show', requirements: ['id' => '\d+', 'slug' => '[a-z0-9-]+'])]
      public function show(Request $request, string $slug, int $id, RecipeRepository $repository): Response
      {
       //Pour chercher par l'id, on fait: 
        $recipe = $repository->find($id);
        if ($recipe->getSlug() !== $slug) {
          return $this->redirectToRoute('recipe.show', ['slug' => $recipe->getSlug(), 'id' => $recipe->getId()]);
        }
        //Pour chercher par le slug, on fait: 
                //$recipe = $repository->findOneBy(['slug' => $slug]);
       // dd($recipe);
      return $this->render('recipe/show.html.twig' , [
          'recipe' => $recipe 
          
      ]);

      }
  }
*/

//  *****************************   L'ORM Doctrine: part 4: à partir de 28min38secondes :  Créer une nouvelle recette   *************************
/*
class RecipeController extends AbstractController
{

      #[Route('/recette', name: 'recipe.index')]
      public function index(Request $request, RecipeRepository $repository, EntityManagerInterface $em): Response // em: comme EntityManager
      {
        $recipes = $repository->findWithDurationLowerThan(20);  // Find prend en paramètre l'id et permet de trouver un enregistrement en particulier. FindBy permet de spécifier un critère sous forme de tableau. '20' pour 20 minutes
        $recipe = new Recipe();
        $recipe->setTitle('Balapa de papa') //On commence par créer l'objet
          ->setSlug('balapa-papa')
          ->setContent('Mettez du sucre et mangez.')
          ->setDuration(2)
          ->setCreatedAt(new \DateTimeImmutable())
          ->setUpdatedAt(new \DateTimeImmutable());
        $em->persist($recipe); // Au niveau de l'entityManager, je veux que tu persistes c'est-à-dire que tu sauvegardes la présence de cet objet dans ma base de données.
        $em->flush();   // La méthode flush permet de modifier l'information ou un enregistrement dans notre base de données.

      return $this->render('recipe/index.html.twig', [
        'recipes' => $recipes
      ]);

      }


      #[Route('/recette/{slug}-{id}', name: 'recipe.show', requirements: ['id' => '\d+', 'slug' => '[a-z0-9-]+'])]
      public function show(Request $request, string $slug, int $id, RecipeRepository $repository): Response
      {
       //Pour chercher par l'id, on fait: 
        $recipe = $repository->find($id);
        if ($recipe->getSlug() !== $slug) {
          return $this->redirectToRoute('recipe.show', ['slug' => $recipe->getSlug(), 'id' => $recipe->getId()]);
        }
        //Pour chercher par le slug, on fait: 
                //$recipe = $repository->findOneBy(['slug' => $slug]);
       // dd($recipe);
      return $this->render('recipe/show.html.twig' , [
          'recipe' => $recipe 
          
      ]);

      }
  }
  */

//  *****************************   L'ORM Doctrine: part 4: à partir de 30min36secondes :  supprimer une recette ou un objet    *************************
/*
class RecipeController extends AbstractController
{

      #[Route('/recette', name: 'recipe.index')]
      public function index(Request $request, RecipeRepository $repository, EntityManagerInterface $em): Response // em: comme EntityManager
      {
        $recipes = $repository->findWithDurationLowerThan(20);  // Find prend en paramètre l'id et permet de trouver un enregistrement en particulier. FindBy permet de spécifier un critère sous forme de tableau. '20' pour 20 minutes
        //$em->remove($recipes[0]); // Si on s'arrête à cette étape il ne va rien se passer.    Je mets la ligne en commentaire pour éviter qu'il continue à me supprimer les lignes de ma base de données
        //$em->flush(); // Il faut lui demander de persister les informations grâce au flush pour que la supression se fasse.

      return $this->render('recipe/index.html.twig', [
        'recipes' => $recipes
      ]);

      }


      #[Route('/recette/{slug}-{id}', name: 'recipe.show', requirements: ['id' => '\d+', 'slug' => '[a-z0-9-]+'])]
      public function show(Request $request, string $slug, int $id, RecipeRepository $repository): Response
      {
       //Pour chercher par l'id, on fait: 
        $recipe = $repository->find($id);
        if ($recipe->getSlug() !== $slug) {
          return $this->redirectToRoute('recipe.show', ['slug' => $recipe->getSlug(), 'id' => $recipe->getId()]);
        }
        //Pour chercher par le slug, on fait: 
                //$recipe = $repository->findOneBy(['slug' => $slug]);
       // dd($recipe);
      return $this->render('recipe/show.html.twig' , [
          'recipe' => $recipe 
          
      ]);

      }
  }
  */  

//  *********************   L'ORM Doctrine: part 4: à partir de 32min34secondes :  faire des requêtes différentes: ex: récupérer la durée totale de mes recettes    ********************
/*
class RecipeController extends AbstractController
{

      #[Route('/recette', name: 'recipe.index')]
      public function index(Request $request, RecipeRepository $repository): Response // em: comme EntityManager
      {
              
      //dd($repository->findTotalDuration());   
      $recipes= $repository->findWithDurationLowerThan(20);
      return $this->render('recipe/index.html.twig', [
        'recipes' => $recipes
      ]);

      }


      #[Route('/recette/{slug}-{id}', name: 'recipe.show', requirements: ['id' => '\d+', 'slug' => '[a-z0-9-]+'])]
      public function show(Request $request, string $slug, int $id, RecipeRepository $repository): Response
      {
       //Pour chercher par l'id, on fait: 
        $recipe = $repository->find($id);
        if ($recipe->getSlug() !== $slug) {
          return $this->redirectToRoute('recipe.show', ['slug' => $recipe->getSlug(), 'id' => $recipe->getId()]);
        }
        //Pour chercher par le slug, on fait: 
                //$recipe = $repository->findOneBy(['slug' => $slug]);
       // dd($recipe);
      return $this->render('recipe/show.html.twig' , [
          'recipe' => $recipe 
          
      ]);

      }
  }
*/

  /*  ********************************     VIDEO GRAFIKART: LES FORMULAIRES: à partir de 2min      *********************   */
  /*
  class RecipeController extends AbstractController
  {
  
        #[Route('/recette', name: 'recipe.index')]
        public function index(Request $request, RecipeRepository $repository): Response // em: comme EntityManager
        {
                
        //dd($repository->findTotalDuration());   
        $recipes= $repository->findWithDurationLowerThan(20);
        return $this->render('recipe/index.html.twig', [
          'recipes' => $recipes
        ]);
  
        }
  
  
        #[Route('/recette/{slug}-{id}', name: 'recipe.show', requirements: ['id' => '\d+', 'slug' => '[a-z0-9-]+'])]
        public function show(Request $request, string $slug, int $id, RecipeRepository $repository): Response
        {
         //Pour chercher par l'id, on fait: 
          $recipe = $repository->find($id);
          if ($recipe->getSlug() !== $slug) {
            return $this->redirectToRoute('recipe.show', ['slug' => $recipe->getSlug(), 'id' => $recipe->getId()]);
          }
          //Pour chercher par le slug, on fait: 
                  //$recipe = $repository->findOneBy(['slug' => $slug]);
         // dd($recipe);
        return $this->render('recipe/show.html.twig' , [
            'recipe' => $recipe 
            
        ]);
  
        }

        #[Route('/recette/{id}/edit', name: 'recipe.edit')]
        public function edit(Recipe $recipe)          // Attention: pour le test, mettre un id qui existe et qui est identique à celui qui est sur mon dbeaver, car je n'ai pas de ligne avec un id =2, et j'ai un message d'erreur.
        {
          //dd($recipe);
          $form = $this->createForm(RecipeType::class, $recipe);
          return $this->render('recipe/edit.html.twig' , [
            'recipe' => $recipe,
            'form' => $form
            
        ]);
        }




    }
    */





//  *****************************   VIDEO GRAFIKART: LES FORMULAIRES  à partir de 11min16s    *************************
/*
class RecipeController extends AbstractController
  {
  
        #[Route('/recette', name: 'recipe.index')]
        public function index(Request $request, RecipeRepository $repository): Response // em: comme EntityManager
        {
                
        //dd($repository->findTotalDuration());   
        $recipes= $repository->findWithDurationLowerThan(20);
        return $this->render('recipe/index.html.twig', [
          'recipes' => $recipes
        ]);
  
        }
  
  
        #[Route('/recette/{slug}-{id}', name: 'recipe.show', requirements: ['id' => '\d+', 'slug' => '[a-z0-9-]+'])]
        public function show(Request $request, string $slug, int $id, RecipeRepository $repository): Response
        {
         //Pour chercher par l'id, on fait: 
          $recipe = $repository->find($id);
          if ($recipe->getSlug() !== $slug) {
            return $this->redirectToRoute('recipe.show', ['slug' => $recipe->getSlug(), 'id' => $recipe->getId()]);
          }
          //Pour chercher par le slug, on fait: 
                  //$recipe = $repository->findOneBy(['slug' => $slug]);
         // dd($recipe);
        return $this->render('recipe/show.html.twig' , [
            'recipe' => $recipe 
            
        ]);
  
        }

        #[Route('/recette/{id}/edit', name: 'recipe.edit')]
        public function edit(Recipe $recipe, Request $request, EntityManagerInterface $em)          // Attention: pour le test, mettre un id qui existe et qui est identique à celui qui est sur mon dbeaver, car je n'ai pas de ligne avec un id =2, et j'ai un message d'erreur.
        {
          $form = $this->createForm(RecipeType::class, $recipe);
          $form->handleRequest($request);       // on regarde si la requête est en 'post' et si le formulaire a été soumis. s'il a été soumis, il va modifier l'entité '$recipe' pour la remplir avec les données provenant du formulaire
          //dd($recipe);
          //pour demander "est-ce que le formulaire a été soumis?"
          if($form->isSubmitted() && $form->isValid()){
            $em->flush(); // 'flush' permet de sauvegarder les changements 
            return $this->redirectToRoute('recipe.index'); //permet de rediriger vers la route recipe.index
          }
          return $this->render('recipe/edit.html.twig' , [
            'recipe' => $recipe,
            'form' => $form
         
        ]);
        }




    }
*/








//  *****************************   VIDEO GRAFIKART: LES FORMULAIRES  à partir de 13min49: pour sauvegarder un message en session    *************************

/*
class RecipeController extends AbstractController
  {
  
        #[Route('/recette', name: 'recipe.index')]
        public function index(Request $request, RecipeRepository $repository): Response // em: comme EntityManager
        {
                
        //dd($repository->findTotalDuration());   
        $recipes= $repository->findWithDurationLowerThan(20);
        return $this->render('recipe/index.html.twig', [
          'recipes' => $recipes
        ]);
  
        }
  
  
        #[Route('/recette/{slug}-{id}', name: 'recipe.show', requirements: ['id' => '\d+', 'slug' => '[a-z0-9-]+'])]
        public function show(Request $request, string $slug, int $id, RecipeRepository $repository): Response
        {
         //Pour chercher par l'id, on fait: 
          $recipe = $repository->find($id);
          if ($recipe->getSlug() !== $slug) {
            return $this->redirectToRoute('recipe.show', ['slug' => $recipe->getSlug(), 'id' => $recipe->getId()]);
          }
          //Pour chercher par le slug, on fait: 
                  //$recipe = $repository->findOneBy(['slug' => $slug]);
         // dd($recipe);
        return $this->render('recipe/show.html.twig' , [
            'recipe' => $recipe 
            
        ]);
  
        }

        #[Route('/recette/{id}/edit', name: 'recipe.edit')]
        public function edit(Recipe $recipe, Request $request, EntityManagerInterface $em)          // Attention: pour le test, mettre un id qui existe et qui est identique à celui qui est sur mon dbeaver, car je n'ai pas de ligne avec un id =2, et j'ai un message d'erreur.
        {
          $form = $this->createForm(RecipeType::class, $recipe);
          $form->handleRequest($request);       // on regarde si la requête est en 'post' et si le formulaire a été soumis. s'il a été soumis, il va modifier l'entité '$recipe' pour la remplir avec les données provenant du formulaire
          //dd($recipe);
          //pour demander "est-ce que le formulaire a été soumis?"
          if($form->isSubmitted() && $form->isValid()){
            $em->flush(); // 'flush' permet de sauvegarder les changements 
          //Pour sauvegarder un message en session
          $this->addFlash('success', 'La recette a bien été modifiée');   // 'success = type  et le message c'est: La recette a bien été modifiée
          return $this->redirectToRoute('recipe.index'); //permet de rediriger vers la route recipe.index
          }
          return $this->render('recipe/edit.html.twig' , [
            'recipe' => $recipe,
            'form' => $form
         
        ]);
        }

    }
  */

//  *****************************   VIDEO GRAFIKART: LES FORMULAIRES  à partir de 18min54: nouvelle Route pour une nouvelle recette    *************************

/*
class RecipeController extends AbstractController
  {
  
        #[Route('/recette', name: 'recipe.index')]
        public function index(Request $request, RecipeRepository $repository): Response // em: comme EntityManager
        {
                
        //dd($repository->findTotalDuration());   
        $recipes= $repository->findWithDurationLowerThan(20);
        return $this->render('recipe/index.html.twig', [
          'recipes' => $recipes
        ]);
  
        }
  
  
        #[Route('/recette/{slug}-{id}', name: 'recipe.show', requirements: ['id' => '\d+', 'slug' => '[a-z0-9-]+'])]
        public function show(Request $request, string $slug, int $id, RecipeRepository $repository): Response
        {
         //Pour chercher par l'id, on fait: 
          $recipe = $repository->find($id);
          if ($recipe->getSlug() !== $slug) {
            return $this->redirectToRoute('recipe.show', ['slug' => $recipe->getSlug(), 'id' => $recipe->getId()]);
          }
          //Pour chercher par le slug, on fait: 
                  //$recipe = $repository->findOneBy(['slug' => $slug]);
         // dd($recipe);
        return $this->render('recipe/show.html.twig' , [
            'recipe' => $recipe 
            
        ]);
  
        }

        #[Route('/recette/{id}/edit', name: 'recipe.edit')]
        public function edit(Recipe $recipe, Request $request, EntityManagerInterface $em)          // Attention: pour le test, mettre un id qui existe et qui est identique à celui qui est sur mon dbeaver, car je n'ai pas de ligne avec un id =2, et j'ai un message d'erreur.
        {
          $form = $this->createForm(RecipeType::class, $recipe);
          $form->handleRequest($request);       // on regarde si la requête est en 'post' et si le formulaire a été soumis. s'il a été soumis, il va modifier l'entité '$recipe' pour la remplir avec les données provenant du formulaire
       
          if($form->isSubmitted() && $form->isValid()){
            $em->flush(); // 'flush' permet de sauvegarder les changements 
          //Pour sauvegarder un message en session
          $this->addFlash('success', 'La recette a bien été modifiée');   
          return $this->redirectToRoute('recipe.index'); //permet de rediriger vers la route recipe.index
          }
          return $this->render('recipe/edit.html.twig' , [
            'recipe' => $recipe,
            'form' => $form
         
        ]);
        }
// Pour créer une nouvelle recette: on crée une nouvelle Route ci-dessous
        #[Route('/recette/create', name: 'recipe.create')]
        public function create(Request $request, EntityManagerInterface $em)
        {
          $recipe = new Recipe();
          $form = $this->createForm(RecipeType::class, $recipe);
          if ($form->isSubmitted() && $form->isValid()) 
          {
            $em->persist($recipe);
            $em->flush();
            $this->addFlash('success' , 'La recette a bien été créée');
            return $this->redirectToRoute('recipe.index');
          }
          return $this->render('recipe/create.html.twig', [
            'form' => $form
          ]);
        }

    } //  fin de la balise "class"
  */

//  *****************************    VIDEO GRAFIKART: LES FORMULAIRES  à partir de 23 min: pour envoyer mon formulaire avec la nouvelle recette   *************************

/*

class RecipeController extends AbstractController
  {
  
        #[Route('/recette', name: 'recipe.index')]
        public function index(Request $request, RecipeRepository $repository): Response // em: comme EntityManager
        {
                
        //dd($repository->findTotalDuration());   
        $recipes= $repository->findWithDurationLowerThan(20);
        return $this->render('recipe/index.html.twig', [
          'recipes' => $recipes
        ]);
  
        }
  
  
        #[Route('/recette/{slug}-{id}', name: 'recipe.show', requirements: ['id' => '\d+', 'slug' => '[a-z0-9-]+'])]
        public function show(Request $request, string $slug, int $id, RecipeRepository $repository): Response
        {
         //Pour chercher par l'id, on fait: 
          $recipe = $repository->find($id);
          if ($recipe->getSlug() !== $slug) {
            return $this->redirectToRoute('recipe.show', ['slug' => $recipe->getSlug(), 'id' => $recipe->getId()]);
          }
          //Pour chercher par le slug, on fait: 
                  //$recipe = $repository->findOneBy(['slug' => $slug]);
         // dd($recipe);
        return $this->render('recipe/show.html.twig' , [
            'recipe' => $recipe 
            
        ]);
  
        }

        #[Route('/recette/{id}/edit', name: 'recipe.edit')]
        public function edit(Recipe $recipe, Request $request, EntityManagerInterface $em)          // Attention: pour le test, mettre un id qui existe et qui est identique à celui qui est sur mon dbeaver, car je n'ai pas de ligne avec un id =2, et j'ai un message d'erreur.
        {
          $form = $this->createForm(RecipeType::class, $recipe);
          $form->handleRequest($request);       // on regarde si la requête est en 'post' et si le formulaire a été soumis. s'il a été soumis, il va modifier l'entité '$recipe' pour la remplir avec les données provenant du formulaire
       
          if($form->isSubmitted() && $form->isValid()){
            $recipe->setUpdatedAt(new \DateTimeImmutable());
            $em->flush(); // 'flush' permet de sauvegarder les changements 
          //Pour sauvegarder un message en session
          $this->addFlash('success', 'La recette a bien été modifiée');   
          return $this->redirectToRoute('recipe.index'); //permet de rediriger vers la route recipe.index
          }
          return $this->render('recipe/edit.html.twig' , [
            'recipe' => $recipe,
            'form' => $form
         
        ]);
        }
// Pour créer une nouvelle recette: on crée une nouvelle Route ci-dessous
        #[Route('/recette/create', name: 'recipe.create')]
        public function create(Request $request, EntityManagerInterface $em)
        {
          $recipe = new Recipe();
          $form = $this->createForm(RecipeType::class, $recipe);
          // Pour envoyer ma nouvelle recette créée dans le formulaire
          $form->handleRequest($request);
          if ($form->isSubmitted() && $form->isValid()) 
          {        //Sur ma recette, avant que tu la persistes, je veux que tu fasses un setCreatedAt
            $recipe->setCreatedAt(new \DateTimeImmutable());
            // Et je fais la même chose avec le setUpdatedAt
            $recipe->setUpdatedAt(new \DateTimeImmutable());
            $em->persist($recipe);
            $em->flush();
            $this->addFlash('success' , 'La recette a bien été créée');
            return $this->redirectToRoute('recipe.index');
          }
          return $this->render('recipe/create.html.twig', [
            'form' => $form
          ]);
        }

    } //  fin de la balise "class"
    */

/*  ********************************  VIDEO GRAFIKART: LES FORMULAIRES  à partir de 24min54: pour supprimer une recette créée  *********************   */


class RecipeController extends AbstractController
  {
  
        #[Route('/recette', name: 'recipe.index')]
        public function index(Request $request, RecipeRepository $repository): Response 
        {
                 
        $recipes= $repository->findWithDurationLowerThan(20);
        return $this->render('recipe/index.html.twig', [
          'recipes' => $recipes
        ]);
  
        }
  
  
        #[Route('/recette/{slug}-{id}', name: 'recipe.show', requirements: ['id' => '\d+', 'slug' => '[a-z0-9-]+'])]
        public function show(Request $request, string $slug, int $id, RecipeRepository $repository): Response
        {
         //Pour chercher par l'id, on fait: 
          $recipe = $repository->find($id);
          if ($recipe->getSlug() !== $slug) {
            return $this->redirectToRoute('recipe.show', ['slug' => $recipe->getSlug(), 'id' => $recipe->getId()]);
          }
          //Pour chercher par le slug, on fait: 
                  //$recipe = $repository->findOneBy(['slug' => $slug]);
         // dd($recipe);
        return $this->render('recipe/show.html.twig' , [
            'recipe' => $recipe 
            
        ]);
  
        }

        #[Route('/recette/{id}/edit', name: 'recipe.edit', methods: ['GET', 'POST'])] // Préciser la méthode qu'on attend: 25min39s
        public function edit(Recipe $recipe, Request $request, EntityManagerInterface $em)          // Attention: pour le test, mettre un id qui existe et qui est identique à celui qui est sur mon dbeaver, car je n'ai pas de ligne avec un id =2, et j'ai un message d'erreur.
        {
          $form = $this->createForm(RecipeType::class, $recipe);
          $form->handleRequest($request);       // on regarde si la requête est en 'post' et si le formulaire a été soumis. s'il a été soumis, il va modifier l'entité '$recipe' pour la remplir avec les données provenant du formulaire
       
          if($form->isSubmitted() && $form->isValid()){
            $recipe->setUpdatedAt(new \DateTimeImmutable());
            $em->flush(); // 'flush' permet de sauvegarder les changements 
          //Pour sauvegarder un message en session
          $this->addFlash('success', 'La recette a bien été modifiée');   
          return $this->redirectToRoute('recipe.index'); //permet de rediriger vers la route recipe.index
          }
          return $this->render('recipe/edit.html.twig' , [
            'recipe' => $recipe,
            'form' => $form
         
        ]);
        }
// Pour créer une nouvelle recette: on crée une nouvelle Route ci-dessous
        #[Route('/recette/create', name: 'recipe.create')]
        public function create(Request $request, EntityManagerInterface $em)
        {
          $recipe = new Recipe();
          $form = $this->createForm(RecipeType::class, $recipe);
          // Pour envoyer ma nouvelle recette créée dans le formulaire
          $form->handleRequest($request);
          if ($form->isSubmitted() && $form->isValid()) 
          {        //Sur ma recette, avant que tu la persistes, je veux que tu fasses un setCreatedAt
            $recipe->setCreatedAt(new \DateTimeImmutable());
            // Et je fais la même chose avec le setUpdatedAt
            $recipe->setUpdatedAt(new \DateTimeImmutable());
            $em->persist($recipe);
            $em->flush();
            $this->addFlash('success' , 'La recette a bien été créée');
            return $this->redirectToRoute('recipe.index');
          }
          return $this->render('recipe/create.html.twig', [
            'form' => $form
          ]);
        }

        // Pour supprimer une recette créée, on crée la fonction suivante:
        #[Route('/recette/{id}', name: 'recipe.delete', methods: ['DELETE'])]
        public function remove(Recipe $recipe, EntityManagerInterface $em)
        {
          $em->remove($recipe);
          $em->flush(); //Pour sauvegarder les modifications
          $this->addFlash('success' , 'La recette a bien été supprimée');
          return $this->redirectToRoute('recipe.index');
        }

    } //  fin de la balise "class"


//  *****************************    VIDEO GRAFIKART: LES FORMULAIRES  à partir de    *************************

/*  ********************************  VIDEO GRAFIKART: LES FORMULAIRES  à partir de      *********************   */

//  *****************************    VIDEO GRAFIKART: LES FORMULAIRES  à partir de    *************************

/*  ********************************  VIDEO GRAFIKART: LES FORMULAIRES  à partir de      *********************   */
