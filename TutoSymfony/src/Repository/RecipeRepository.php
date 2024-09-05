<?php

namespace App\Repository;

use App\Entity\Recipe;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Recipe>
 */
/*class RecipeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Recipe::class);
    }       */


/* *******************************************  L'ORM DOctrine: à partir de 21min25: Requête personnalisée (par exemple: pour afficher les requêtes qui durent moins de 10min)  *********************************    */
/*
    /**
     * @return Recipe[]
     */                 /*
public function findWithDurationLowerThan(int $duration): array
{
    return $this->createQueryBuilder('r')   // 'r': est choisi pour recette
        ->where('r.duration <= :duration')
        ->orderBy('r.duration', 'ASC')          // Pour classer par ordre
        ->setMaxResults(10)  // On peut lui dire: je veux un résultat, 2 résultats, 10 résulats, etc.
        ->setParameter('duration', $duration)          // Pour lui expliquer comment il doit renseigner les paramètres et on lui donne la clé à l'exemple de 'duration' pour cet exercice
        ->getQuery()    // Une fois satisfait, on peut générer la requête
        ->getResult();   //Permet d'obtenir les résultats


}
*/

/* *************  L'ORM DOctrine: à partir de 32min42: AUTRES REQUÊTES DIFFÉRENTES: faire des requêtes différentes: ex: récupérer la durée totale de mes recettes    *************  */
    
/**
 * @extends ServiceEntityRepository<Recipe>
 */             
class RecipeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Recipe::class);
    }

    public function findTotalDuration():int         // :int permet de convertir mon total en entier 
    {
        return $this->createQueryBuilder('r')
            ->select('SUM(r.duration) as total')            // SUM: correspond au total
          // ->select('r') // select('r'): donne une ligne de recettes
          // ->select('r.id', 'r.duration') // select('r.id', 'r.duration'): nous donne des tableaux avec l'id et la duréee
            ->getQuery()  
           // ->getResult();    //  getResult(): donne tous les résultats
           // -> getSingleResult();  //Ne fonctionne que si on a une seule ligne. Dans le cadre de la somme avec cette formule au dessus (select('SUM(r.duration) as total')), le  getSingleResult marche bien car le total est sur une ligne.
    
           -> getSingleScalarResult();    // On l'utilise quand on sait qu'on a qu'un seul champs et que l'on ne veut que la valeur de ce champs
    }

   /**
     * @return Recipe[]
     */
    public function findWithDurationLowerThan(int $duration): array
    {
        return $this->createQueryBuilder('r')   // 'r': est choisi pour recette
            ->where('r.duration <= :duration')
            ->orderBy('r.duration', 'ASC')          // Pour classer par ordre
            ->setMaxResults(10)  // On peut lui dire: je veux un résultat, 2 résultats, 10 résulats, etc.
            ->setParameter('duration', $duration)          // Pour lui expliquer comment il doit renseigner les paramètres et on lui donne la clé à l'exemple de 'duration' pour cet exercice
            ->getQuery()    // Une fois satisfait, on peut générer la requête
            ->getResult();   //Permet d'obtenir les résultats
    
    
    }














/*  *******************************          ********************************************         */

/*  *******************************          ********************************************         */

/*  *******************************          ********************************************         */

/*  *******************************          ********************************************         */






//    /**
//     * @return Recipe[] Returns an array of Recipe objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('r.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Recipe
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
