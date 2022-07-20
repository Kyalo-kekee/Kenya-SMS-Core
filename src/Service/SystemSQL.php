<?php

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\NativeQuery;
use Doctrine\ORM\Query\ResultSetMapping;

class SystemSQL
{
    public EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $em)
    {
        $this->entityManager = $em;
    }

    public function execSQLProcedure(
        string $storedProcedure,
        array  $parameters = [],
        array  $resultMapping = []
    )
    {

        $rsm = new ResultSetMapping();
        $this->setScalarResults($rsm, $resultMapping);
        $commandTxt = $this->entityManager->createNativeQuery($storedProcedure.$this->splitAndCreateParametersString($parameters), $rsm);
        $this ->setProcedureParameters($commandTxt,$parameters);
        return $commandTxt->getScalarResult();

    }

    public function setScalarResults(ResultSetMapping $rsm, array $field_alias)
    {
        if (!empty($field_alias))
            foreach ($field_alias as $FieldName => $alias) {
                $rsm->addScalarResult($FieldName, $alias);
            }

    }

    public function setProcedureParameters(NativeQuery $commandTxt, array $parameters)
    {
        foreach ($parameters as $key => $value) {
            $commandTxt->setParameter(':' . $key, $value);
        }
    }

    public function splitAndCreateParametersString($parameters)
    {
        $last = end($parameters);
        $parameters_list = '';
        foreach ($parameters as $key => $value) {

            if ($value != $last) {
                $parameters_list .= ':' . $key . ',';
            } else {
                $parameters_list .= ':' . $key;
            }
        }
        return $parameters_list;
    }


}