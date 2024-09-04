<?php

namespace App\Repository;

use App\Entity\Recipe;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Recipe>
 */
class RecipeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Recipe::class);
    }


/* *******************************************  L'ORM DOctrine: à partir de 21min25: Requête personnalisée (par exemple: pour afficher les requêtes qui durent moins de 10min)  *********************************    */

    /**
     * @return Recipe[]
     */
public function findWithDurationLowerThan(int $duration): array
{
    return $this->createQueryBuilder('r')
        ->where('r.duration <= :duration')
        ->orderBy('r.duration', 'ASC')          // Pour classer par ordre
        ->setMaxResults(1)  // On peut lui dire: je veux un résultat
        ->setParameter('duration', $duration)          // Pour lui expliquer comment il doit renseigner les paramètres et on lui donne la clé à l'exemple de 'duration' pour cet exercice
        ->getQuery()    // Une fois satisfait, on peut générer la requête
        ->getResult();   //Permet d'obtenir les résultats


}




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
