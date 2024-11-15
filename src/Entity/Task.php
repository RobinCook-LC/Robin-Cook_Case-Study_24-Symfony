<?php

namespace App\Entity;

use App\Entity\Enum\TaskStatus;
use App\Repository\TaskRepository;
use DateTimeImmutable;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

#[ORM\Entity(repositoryClass: TaskRepository::class)]
class Task
{
    #[ORM\Id]
    #[ORM\Column(type: 'string', length: 36, unique: true)]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\CustomIdGenerator(class: 'doctrine.uuid_generator')]
    #[Serializer\Groups(["task"])]
    private ?string $id = null;

    #[ORM\Column]
    #[Serializer\Groups(["task"])]
    private TaskStatus $status;

    public function __construct()
    {
        $this->status = TaskStatus::NEW;
        $this->createdAt = new DateTimeImmutable();
    }
}
