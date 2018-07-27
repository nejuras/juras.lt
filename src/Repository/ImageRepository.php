<?php

namespace App\Repository;

use App\Entity\Image;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Image|null find($id, $lockMode = null, $lockVersion = null)
 * @method Image|null findOneBy(array $criteria, array $orderBy = null)
 * @method Image[]    findAll()
 * @method Image[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ImageRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Image::class);
    }

//    /**
//     * @return Image[] Returns an array of Image objects
//     */
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
    public function findOneBySomeField($value): ?Image
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    return $this->createQueryBuilder('p')
        // p.category refers to the "category" property on product
        ->innerJoin('p.category', 'c')
        // selects all the category data to avoid the query
        ->addSelect('c')
        ->andWhere('p.id = :id')
        ->setParameter('id', $productId)
        ->getQuery()
        ->getOneOrNullResult();
    }
    */
    public function findOneByIdJoinedToCategory($s)
    {
        $qb = $this->createQueryBuilder('event')
            ->innerJoin('event.eventName', 'c')
            ->addSelect('c')
            ->andWhere('event.id = :eventId')
            ->setParameter('eventName', $s)
            ->orderBy('c.id', 'ASC')
            ->getQuery();

        return $qb->execute();
    }
}
