<?php

namespace App\Repository;

use App\Entity\Shoe;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Shoe|null find($id, $lockMode = null, $lockVersion = null)
 * @method Shoe|null findOneBy(array $criteria, array $orderBy = null)
 * @method Shoe[]    findAll()
 * @method Shoe[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ShoeRepository extends ServiceEntityRepository
{
    /**
     * @var CategoryRepository
     */
    private $categoryRepository;

    public function __construct(ManagerRegistry $registry, CategoryRepository $categoryRepository)
    {
        parent::__construct($registry, Shoe::class);
        $this->categoryRepository = $categoryRepository;
    }

    public function filterShoes($data){
        $minPrice = htmlspecialchars($data['minPrice']);
        $maxPrice = htmlspecialchars($data['maxPrice']);
        $categoryF = htmlspecialchars($data['category']);
        $category = $this->categoryRepository->findOneBy(array('name'=>$categoryF));

        return $this->createQueryBuilder('s')
            ->andWhere('s.price > :minPrice')
            ->setParameter('minPrice', $minPrice)
            ->andWhere('s.price < :maxPrice')
            ->setParameter('maxPrice', $maxPrice)
            ->andWhere('s.category = :category')
            ->setParameter('category', $category)
            ->orderBy('s.id', 'ASC')
            ->getQuery()
            ->getResult()
            ;
    }
    // /**
    //  * @return Shoe[] Returns an array of Shoe objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Shoe
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
