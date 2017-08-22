<?php

namespace AppBundle\Repository;

/**
 * LocationRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class LocationRepository extends \Doctrine\ORM\EntityRepository
{
    public function getUserLocation(){
        $q = $this->createQueryBuilder('l')
            ->leftJoin('l.profiles', 'p')
            ->leftJoin('p.user', 'u')
            ->select('l as location, u.username')
            ->where('u.username IS NOT NULL')
            ->andWhere('l.active = true')
            ->getQuery()
            ->getArrayResult();
        return $q;
    }
}