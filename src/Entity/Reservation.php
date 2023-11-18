<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservationRepository::class)]
class Reservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $reservation_id = null;

    #[ORM\ManyToOne(inversedBy: 'reservations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Guest $guest_id = null;

    #[ORM\ManyToMany(targetEntity: Room::class, inversedBy: 'reservations')]
    private Collection $room_id;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $check_in_date = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $check_out_date = null;

    #[ORM\Column(nullable: true)]
    private ?float $total_price = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $status = null;

    #[ORM\ManyToOne(inversedBy: 'reseration_id')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Payment $payment = null;

    public function __construct()
    {
        $this->room_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReservationId(): ?string
    {
        return $this->reservation_id;
    }

    public function setReservationId(string $reservation_id): static
    {
        $this->reservation_id = $reservation_id;

        return $this;
    }

    public function getGuestId(): ?guest
    {
        return $this->guest_id;
    }

    public function setGuestId(?guest $guest_id): static
    {
        $this->guest_id = $guest_id;

        return $this;
    }

    /**
     * @return Collection<int, room>
     */
    public function getRoomId(): Collection
    {
        return $this->room_id;
    }

    public function addRoomId(room $roomId): static
    {
        if (!$this->room_id->contains($roomId)) {
            $this->room_id->add($roomId);
        }

        return $this;
    }

    public function removeRoomId(room $roomId): static
    {
        $this->room_id->removeElement($roomId);

        return $this;
    }

    public function getCheckInDate(): ?\DateTimeInterface
    {
        return $this->check_in_date;
    }

    public function setCheckInDate(\DateTimeInterface $check_in_date): static
    {
        $this->check_in_date = $check_in_date;

        return $this;
    }

    public function getCheckOutDate(): ?\DateTimeInterface
    {
        return $this->check_out_date;
    }

    public function setCheckOutDate(\DateTimeInterface $check_out_date): static
    {
        $this->check_out_date = $check_out_date;

        return $this;
    }

    public function getTotalPrice(): ?float
    {
        return $this->total_price;
    }

    public function setTotalPrice(?float $total_price): static
    {
        $this->total_price = $total_price;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getPayment(): ?Payment
    {
        return $this->payment;
    }

    public function setPayment(?Payment $payment): static
    {
        $this->payment = $payment;

        return $this;
    }
}
