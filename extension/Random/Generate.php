<?php

namespace Extension\Random;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Id\AbstractIdGenerator;
use PragmaRX\Random\Random;

class Generate extends  AbstractIdGenerator
{

    public function generateId(EntityManagerInterface $em, $entity)
    {
        $rand = new Random();

        return $rand->size(6)->alpha()->get();
    }
}