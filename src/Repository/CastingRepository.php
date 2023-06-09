<?php

namespace App\Repository;

use App\Entity\Casting;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Casting>
 *
 * @method Casting|null find($id, $lockMode = null, $lockVersion = null)
 * @method Casting|null findOneBy(array $criteria, array $orderBy = null)
 * @method Casting[]    findAll()
 * @method Casting[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CastingRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Casting::class);
    }

    public function save(Casting $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Casting $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function findBySearch(string $libelle, string $metier, string $contrat) : array
    {
        $query = $this->createQueryBuilder('c')
            ->where('c.intitule LIKE :libelle')
            ->orWhere('c.description LIKE :libelle')
            ->orWhere('c.reference = :ref')
            ->setParameter('libelle', '%'.$libelle.'%')
            ->setParameter('ref', $libelle);

        if($metier != 0)
        {
            $query->andWhere('c.metiers = :metier')
                ->setParameter('metier', $metier);
        }
        if($contrat != 0)
        {
            $query->andWhere('c.typeContrat = :contrat')
                ->setParameter('contrat', $contrat);
        }
//        dd($query->getQuery()->getResult());
        return $query->getQuery()->getResult();
    }

//    /**
//     * @return Casting[] Returns an array of Casting objects
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

//    public function findOneBySomeField($value): ?Casting
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
