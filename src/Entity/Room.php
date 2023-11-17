<?php

namespace App\Entity;

use App\Repository\RoomRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RoomRepository::class)]
class Room
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $room_type = null;

    #[ORM\Column]
    private ?float $price = null;

    #[ORM\Column]
    private ?bool $availability = null;

    #[ORM\Column(length: 255)]
    private ?string $amenities = null;

    #[ORM\ManyToOne(inversedBy: 'rooms')]
    private ?Hotel $hotel = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRoomType(): ?string
    {
        return $this->room_type;
    }

    public function setRoomType(string $room_type): static
    {
        $this->room_type = $room_type;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function isAvailability(): ?bool
    {
        return $this->availability;
    }

    public function setAvailability(bool $availability): static
    {
        $this->availability = $availability;

        return $this;
    }

    public function getAmenities(): ?string
    {
        return $this->amenities;
    }

    public function setAmenities(string $amenities): static
    {
        $this->amenities = $amenities;

        return $this;
    }

    public function getHotel(): ?Hotel
    {
        return $this->hotel;
    }

    public function setHotel(?Hotel $hotel): static
    {
        $this->hotel = $hotel;

        return $this;
    }
}
