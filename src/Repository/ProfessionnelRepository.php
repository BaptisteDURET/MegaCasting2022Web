<?php

namespace App\Repository;

use App\Entity\Professionnel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\DBAL\Connection;
use http\Env\Response;

/**
 * @extends ServiceEntityRepository<Professionnel>
 *
 * @method Professionnel|null find($id, $lockMode = null, $lockVersion = null)
 * @method Professionnel|null findOneBy(array $criteria, array $orderBy = null)
 * @method Professionnel[]    findAll()
 * @method Professionnel[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProfessionnelRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Professionnel::class);
    }

    public function save(Professionnel $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Professionnel $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function buyPack(int $idPro, int $idPack, Connection $connection): void
    {
        $connection->executeQuery('INSERT INTO Acheter (IdentifiantProfessionnel, IdentifiantPack) VALUES (?, ?)', [$idPro, $idPack]);
    }

    public function getAllPacks(int $idPro, Connection $connection)
    {
        $result = $connection->executeQuery('SELECT * FROM Acheter INNER JOIN PackDeCastings ON Acheter.IdentifiantPack = PackDeCastings.Identifiant WHERE Acheter.IdentifiantProfessionnel = ?', [$idPro]);

        return $result->fetchAllAssociative();
    }
//    /**
//     * @return Professionnel[] Returns an array of Professionnel objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Professionnel
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
