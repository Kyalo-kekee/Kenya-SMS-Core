<?php

namespace App\Repository;

use App\Entity\GetNextNumberIDS;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method GetNextNumberIDS|null find($id, $lockMode = null, $lockVersion = null)
 * @method GetNextNumberIDS|null findOneBy(array $criteria, array $orderBy = null)
 * @method GetNextNumberIDS[]    findAll()
 * @method GetNextNumberIDS[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GetNextNumberIDSRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GetNextNumberIDS::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(GetNextNumberIDS $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(GetNextNumberIDS $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return GetNextNumberIDS[] Returns an array of GetNextNumberIDS objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?GetNextNumberIDS
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
