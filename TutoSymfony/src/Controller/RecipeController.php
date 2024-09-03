<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Repository\RecipeRepository; 
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

          //*****************************************************L'ORM Doctrine   *************************************************************

          class RecipeController extends AbstractController
        {
      
              #[Route('/recette', name: 'recipe.index')]
              public function index(Request $request, RecipeRepository $repository): Response
              {
                $recipes = $repository->findAll();  // Find prend en paramètre l'id et permet de trouver un enregistrement en particulier. FindBy permet de spécifier un critère sous forme de tableau
               dd($recipes);
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
          }