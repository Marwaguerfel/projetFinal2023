<?php

namespace App\Entity;

use App\Repository\PaymentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PaymentRepository::class)]
class Payment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $payment_id = null;

    #[ORM\OneToMany(mappedBy: 'payment', targetEntity: Reservation::class)]
    private Collection $reseration_id;

    #[ORM\Column]
    private ?float $amount = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $payment_date = null;

    #[ORM\Column(length: 255)]
    private ?string $payment_method = null;

    public function __construct()
    {
        $this->reseration_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPaymentId(): ?string
    {
        return $this->payment_id;
    }

    public function setPaymentId(string $payment_id): static
    {
        $this->payment_id = $payment_id;

        return $this;
    }

    /**
     * @return Collection<int, reservation>
     */
    public function getReserationId(): Collection
    {
        return $this->reseration_id;
    }

    public function addReserationId(reservation $reserationId): static
    {
        if (!$this->reseration_id->contains($reserationId)) {
            $this->reseration_id->add($reserationId);
            $reserationId->setPayment($this);
        }

        return $this;
    }

    public function removeReserationId(reservation $reserationId): static
    {
        if ($this->reseration_id->removeElement($reserationId)) {
            // set the owning side to null (unless already changed)
            if ($reserationId->getPayment() === $this) {
                $reserationId->setPayment(null);
            }
        }

        return $this;
    }

    public function getAmount(): ?float
    {
        return $this->amount;
    }

    public function setAmount(float $amount): static
    {
        $this->amount = $amount;

        return $this;
    }

    public function getPaymentDate(): ?\DateTimeInterface
    {
        return $this->payment_date;
    }

    public function setPaymentDate(\DateTimeInterface $payment_date): static
    {
        $this->payment_date = $payment_date;

        return $this;
    }

    public function getPaymentMethod(): ?string
    {
        return $this->payment_method;
    }

    public function setPaymentMethod(string $payment_method): static
    {
        $this->payment_method = $payment_method;

        return $this;
    }
}
