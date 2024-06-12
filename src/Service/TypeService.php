<?php
namespace App\Service;

use App\Entity\Type;
use App\Repository\TypeRepository;
use Doctrine\ORM\EntityManagerInterface;

class TypeService {
    private readonly array $defaultTypes;

    public function __construct(
        private readonly TypeRepository $typeRepository,
        private readonly EntityManagerInterface $entityManager
    ){
        $this->defaultTypes = ['incoming', 'outgoing', 'task'];
    }

    public function fill(){
        foreach($this->defaultTypes as $type){
            $this->entityManager->persist(new Type($type));
        }
        $this->entityManager->flush();
    }
}