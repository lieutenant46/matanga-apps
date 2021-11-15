<?php

namespace App\Repository;

use App\Entity\ImagesShoes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ImagesShoes|null find($id, $lockMode = null, $lockVersion = null)
 * @method ImagesShoes|null findOneBy(array $criteria, array $orderBy = null)
 * @method ImagesShoes[]    findAll()
 * @method ImagesShoes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ImagesShoesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ImagesShoes::class);
    }

    // /**
    //  * @return ImagesShoes[] Returns an array of ImagesShoes objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ImagesShoes
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
