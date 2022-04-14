<?php

namespace App\Repository;

use App\Entity\InstitutionSetup;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method InstitutionSetup|null find($id, $lockMode = null, $lockVersion = null)
 * @method InstitutionSetup|null findOneBy(array $criteria, array $orderBy = null)
 * @method InstitutionSetup[]    findAll()
 * @method InstitutionSetup[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InstitutionSetupRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, InstitutionSetup::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(InstitutionSetup $entity, bool $flush = true): void
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
    public function remove(InstitutionSetup $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return InstitutionSetup[] Returns an array of InstitutionSetup objects
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
    public function findOneBySomeField($value): ?InstitutionSetup
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
