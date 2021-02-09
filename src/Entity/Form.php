<?php
declare(strict_types=1);

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Form extends AbstractInput
{
    /**
     * @var Collection|Another[]
     * @ORM\OneToMany(
     *     targetEntity="App\Entity\Another",
     *     mappedBy="form",
     *     orphanRemoval=true,
     *     fetch="EAGER"
     * )
     * @ORM\JoinColumn(name="another_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private Collection $anothers;

    public function __construct(string $name)
    {
        parent::__construct($name);

        $this->anothers = new ArrayCollection();
    }

    public function getAnothers(): array
    {
        return $this->anothers->getValues();
    }

    public function addAnother(Another $another): void
    {
        if (!$this->anothers->contains($another)) {
            $this->anothers->add($another);
            $another->setForm($this);
        }
    }

    public function removeAnother(Another $another): void
    {
        if ($this->anothers->contains($another)) {
            $this->anothers->removeElement($another);
        }
    }
}
