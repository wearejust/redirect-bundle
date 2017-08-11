<?php

namespace Wearejust\RedirectBundle\Repository;

use Wearejust\RedirectBundle\Entity\Redirect;

class RedirectRepository extends \Doctrine\ORM\EntityRepository
{
    /**
     * @param array $toMatch
     *
     * @return Redirect|null
     */
    public function getByFrom(array $toMatch)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.active = true')
            ->andWhere('r.fromUrl IN (:urls)')
            ->setParameter('urls', $toMatch)
            ->getQuery()
            ->getOneOrNullResult();
    }
}
