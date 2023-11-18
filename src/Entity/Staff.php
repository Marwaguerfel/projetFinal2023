<?php

namespace App\Entity;

use App\Repository\StaffRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StaffRepository::class)]
class Staff
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $staff_id = null;

    #[ORM\OneToMany(mappedBy: 'staff', targetEntity: Hotel::class)]
    private Collection $hotel_id;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $role = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $phone = null;

    public function __construct()
    {
        $this->hotel_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStaffId(): ?string
    {
        return $this->staff_id;
    }

    public function setStaffId(string $staff_id): static
    {
        $this->staff_id = $staff_id;

        return $this;
    }

    /**
     * @return Collection<int, hotel>
     */
    public function getHotelId(): Collection
    {
        return $this->hotel_id;
    }

    public function addHotelId(hotel $hotelId): static
    {
        if (!$this->hotel_id->contains($hotelId)) {
            $this->hotel_id->add($hotelId);
            $hotelId->setStaff($this);
        }

        return $this;
    }

    public function removeHotelId(hotel $hotelId): static
    {
        if ($this->hotel_id->removeElement($hotelId)) {
            // set the owning side to null (unless already changed)
            if ($hotelId->getStaff() === $this) {
                $hotelId->setStaff(null);
            }
        }

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): static
    {
        $this->role = $role;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): static
    {
        $this->phone = $phone;

        return $this;
    }
}
