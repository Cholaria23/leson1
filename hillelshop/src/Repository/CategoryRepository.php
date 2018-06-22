<?php

namespace App\Repository;

use App\Entity\Category;
use Doctrine\ORM\EntityRepository;
use Knp\DoctrineBehaviors\ORM as ORMBehaviors;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Category|null find($id, $lockMode = null, $lockVersion = null)
 * @method Category|null findOneBy(array $criteria, array $orderBy = null)
 * @method Category[]    findAll()
 * @method Category[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */

class CategoryRepository extends ServiceEntityRepository
{
    use ORMBehaviors\Tree\Tree;

    public function __construct(RegistryInterface $registry)
     {
         parent::__construct($registry, Category::class);
     }

    //return categories, where parent = null
    public function getFirstLevelCategories(): array
    {
        $query = $this->getEntityManager()->createQuery("SELECT category FROM App\Entity\Category category WHERE category.parent IS NULL");
        return $query->getResult();
    } 

    //return popular_categories, where image = not null
    public function getPopularCategories(): array
    {
        $query = $this->getEntityManager()->createQuery("SELECT category FROM App\Entity\Category category WHERE category.parent IS NULL AND category.image IS NOT NULL");
        return $query->getResult();
    } 
 }  

// class CategoryRepository extends ServiceEntityRepository
// {
//     public function __construct(RegistryInterface $registry)
//     {
//         parent::__construct($registry, Category::class);
//     }

//    /**
//     * @return Category[] Returns an array of Category objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    
    // public function findOneBySomeField($value): ?Category
   /* public function findOneBySomeField ()
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.sort_order = :sort_order')
            ->andWhere('c.sort_order = 0')
            ->orderBy('c.sort_order', 'DESC')
            // ->setParameter('val', $value)
            ->getQuery()
            // ->getOneOrNullResult()
            ->getResult()
        ;
    }
    */
//}
