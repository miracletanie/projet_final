<?php

namespace App\Repository;

use App\Entity\ApprenantModuleCoach;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ApprenantModuleCoach>
 *
 * @method ApprenantModuleCoach|null find($id, $lockMode = null, $lockVersion = null)
 * @method ApprenantModuleCoach|null findOneBy(array $criteria, array $orderBy = null)
 * @method ApprenantModuleCoach[]    findAll()
 * @method ApprenantModuleCoach[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ApprenantModuleCoachRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ApprenantModuleCoach::class);
    }

    public function save(ApprenantModuleCoach $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ApprenantModuleCoach $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return ApprenantModuleCoach[] Returns an array of ApprenantModuleCoach objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('a.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ApprenantModuleCoach
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
