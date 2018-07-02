<?php

namespace App\Repository;

use App\Entity\Product;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Product|null find($id, $lockMode = null, $lockVersion = null)
 * @method Product|null findOneBy(array $criteria, array $orderBy = null)
 * @method Product[]    findAll()
 * @method Product[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductRepository extends ServiceEntityRepository
{   
    const Active = 1;

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Product::class);
    }

    //return unique product manufacturer
    public function getProductBrand(): array
    {
        $query = $this->getEntityManager()->createQuery("SELECT DISTINCT product.brand FROM App\Entity\Product product");
        return $query->getResult();

        // return $this->createQueryBuilder('product')
        //     ->where("product.brand IN (:id)")
        //     ->setParameter('id', $id)
        //     ->getQuery()
        //     ->getResult()
        //     ;

    }

    //return lastProducts manufacturer
    public function getLatestProduct(): array
    {
        $query = $this->getEntityManager()->createQuery("SELECT product FROM App\Entity\Product product where product.status=".self::Active." ORDER BY product.id desc");
        return $query->getResult();
    }



    // return Product from array ProductId
    
    public function findProductById($id)
    {
        return $this->createQueryBuilder('product')
            ->where("product.id IN (:id)")
            ->setParameter('id', $id)
            ->getQuery()
            ->getResult()
            ;
    }


    /*
    public function findOneBySomeField($value): ?Product
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
