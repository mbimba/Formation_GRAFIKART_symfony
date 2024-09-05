<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Repository\RecipeRepository; 
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Recipe;        // ajout de cet use qui n'apparait pas dans la video de GrafikArt
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

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
//  *****************************       *************************

//  *****************************       *************************

//  *****************************       *************************

//  *****************************       *************************