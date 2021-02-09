<?php
declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Workflow extends AbstractInput
{
    /**
     * @ORM\Column(type="text")
     */
    private string $someVar;

    public function __construct(string $name, string $someVar)
    {
        parent::__construct($name);
        $this->someVar = $someVar;
    }

    public function getSomeVar(): string
    {
        return $this->someVar;
    }

    public function setSomeVar(string $someVar): void
    {
        $this->someVar = $someVar;
    }
}
