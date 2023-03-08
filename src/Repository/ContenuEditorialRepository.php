<?php

namespace App\Repository;

use App\Entity\ContenuEditorial;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ContenuEditorial>
 *
 * @method ContenuEditorial|null find($id, $lockMode = null, $lockVersion = null)
 * @method ContenuEditorial|null findOneBy(array $criteria, array $orderBy = null)
 * @method ContenuEditorial[]    findAll()
 * @method ContenuEditorial[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContenuEditorialRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ContenuEditorial::class);
    }

    public function save(ContenuEditorial $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ContenuEditorial $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return ContenuEditorial[] Returns an array of ContenuEditorial objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ContenuEditorial
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
