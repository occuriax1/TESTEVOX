<?php

namespace App\Repository;

use App\Entity\Socio;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Socio>
 *
 * @method Socio|null find($id, $lockMode = null, $lockVersion = null)
 * @method Socio|null findOneBy(array $criteria, array $orderBy = null)
 * @method Socio[]    findAll()
 * @method Socio[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SocioRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Socio::class);
    }

    public function add(Socio $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Socio $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function getSociosComEmpresa() {
        return $this->createQueryBuilder('s')
            ->leftJoin('s.empresa', 'e') 
            ->addSelect('e.nome as empresaNome') 
            ->getQuery()
            ->getResult();
    }

//    /**
//     * @return Socio[] Returns an array of Socio objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Socio
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
