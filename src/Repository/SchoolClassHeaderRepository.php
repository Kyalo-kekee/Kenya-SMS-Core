<?php

namespace App\Repository;

use App\Entity\SchoolClassHeader;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SchoolClassHeader|null find($id, $lockMode = null, $lockVersion = null)
 * @method SchoolClassHeader|null findOneBy(array $criteria, array $orderBy = null)
 * @method SchoolClassHeader[]    findAll()
 * @method SchoolClassHeader[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SchoolClassHeaderRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SchoolClassHeader::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(SchoolClassHeader $entity, bool $flush = true): void
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
    public function remove(SchoolClassHeader $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    public function getClassRooms(SchoolClassHeader $entity,SchoolClassRoomsHeaderRepository $repository)
    {
        return $repository ->createQueryBuilder('cRooms')
            ->andWhere('cRooms.ClassID= :class_headerId')
            ->setParameter('class_headerId', $entity ->getSchoolClassHeaderID())
            ->getQuery()
            ->getResult();

    }

    public function canAddRoom()
    {

    }

    // /**
    //  * @return SchoolClassHeader[] Returns an array of SchoolClassHeader objects
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
    public function findOneBySomeField($value): ?SchoolClassHeader
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
