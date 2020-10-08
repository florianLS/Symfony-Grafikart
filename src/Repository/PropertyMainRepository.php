<?php

namespace App\Repository;

use App\Entity\PropertyMain;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PropertyMain|null find($id, $lockMode = null, $lockVersion = null)
 * @method PropertyMain|null findOneBy(array $criteria, array $orderBy = null)
 * @method PropertyMain[]    findAll()
 * @method PropertyMain[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PropertyMainRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PropertyMain::class);
    }

    public function findAllVisible() {
        return $this->findVisibleQuery()
            ->getQuery()
            ->getResult();
    }

    /**
     * @return PropertyMain[]
     */
    public function findLatest(): array
    {
        return $this->findVisibleQuery()
            ->setMaxResults(4)
            ->getQuery()
            ->getResult();
    }

    public function findVisibleQuery(): QueryBuilder
    {
        return $this->createQueryBuilder('p')
            ->where("p.sold = false");
    }
    // /**
    //  * @return PropertyMain[] Returns an array of PropertyMain objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PropertyMain
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
