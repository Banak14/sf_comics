<?php

namespace App\Repository;

use App\Entity\Designer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Designer|null find($id, $lockMode = null, $lockVersion = null)
 * @method Designer|null findOneBy(array $criteria, array $orderBy = null)
 * @method Designer[]    findAll()
 * @method Designer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DesignerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Designer::class);
    }

    // /**
    //  * @return Designer[] Returns an array of Designer objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Designer
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
