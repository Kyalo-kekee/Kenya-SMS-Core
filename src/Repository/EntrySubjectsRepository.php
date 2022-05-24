<?php

namespace App\Repository;

use App\Entity\EntrySubjects;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method EntrySubjects|null find($id, $lockMode = null, $lockVersion = null)
 * @method EntrySubjects|null findOneBy(array $criteria, array $orderBy = null)
 * @method EntrySubjects[]    findAll()
 * @method EntrySubjects[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EntrySubjectsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EntrySubjects::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(EntrySubjects $entity, bool $flush = true): void
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
    public function remove(EntrySubjects $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return EntrySubjects[] Returns an array of EntrySubjects objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?EntrySubjects
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
