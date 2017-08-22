<?php

namespace AppBundle\Repository;

/**
 * PomodoroRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PomodoroRepository extends \Doctrine\ORM\EntityRepository
{
    public function countPomodoroTask($hash){
        $q = $this->createQueryBuilder('pomodoro')
            ->leftJoin('pomodoro.task', 'task')
            ->select('count(pomodoro) As complete')
            ->where('task.hash = :hash')->setParameter('hash', $hash)
            ->andWhere('pomodoro.finished = true')
            ->getQuery()
            ->getOneOrNullResult();
        return $q;
    }

    public function getReceiver($id){
        $q = $this->createQueryBuilder('p')
            ->leftJoin('p.receiver', 'r')
            ->select('p')
            ->where('r.id = :id')->setParameter('id', $id)
            ->getQuery()
            ->getArrayResult();
    }

    public function countPomodoroItem($hash){
        $q = $this->createQueryBuilder('pomodoro')
            ->leftJoin('pomodoro.item', 'item')
            ->select('count(pomodoro) As complete')
            ->where('item.hash = :hash')->setParameter('hash', $hash)
            ->andWhere('pomodoro.finished = true')
            ->getQuery()
            ->getOneOrNullResult();;
        return $q;
    }

    public function countPomodoroIssue($hash){
        $q = $this->createQueryBuilder('pomodoro')
            ->leftJoin('pomodoro.issue', 'issue')
            ->select('count(pomodoro) As complete')
            ->where('issue.hash = :hash')->setParameter('hash', $hash)
            ->andWhere('pomodoro.finished = true')
            ->getQuery()
            ->getOneOrNullResult();
        return $q;
    }

}