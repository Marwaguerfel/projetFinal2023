<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231117223748 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE guest (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, phone VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE hotel (id INT AUTO_INCREMENT NOT NULL, staff_id INT NOT NULL, name VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, contact_info VARCHAR(255) NOT NULL, INDEX IDX_3535ED9D4D57CD (staff_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE payment (id INT AUTO_INCREMENT NOT NULL, payment_id VARCHAR(255) NOT NULL, amount DOUBLE PRECISION NOT NULL, payment_date DATE NOT NULL, payment_method VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, guest_id_id INT NOT NULL, payment_id INT NOT NULL, reservation_id VARCHAR(255) NOT NULL, check_in_date DATE NOT NULL, check_out_date DATE NOT NULL, total_price DOUBLE PRECISION DEFAULT NULL, status VARCHAR(255) DEFAULT NULL, INDEX IDX_42C849556ABA0943 (guest_id_id), INDEX IDX_42C849554C3A3BB (payment_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation_room (reservation_id INT NOT NULL, room_id INT NOT NULL, INDEX IDX_64A69CF3B83297E7 (reservation_id), INDEX IDX_64A69CF354177093 (room_id), PRIMARY KEY(reservation_id, room_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE room (id INT AUTO_INCREMENT NOT NULL, hotel_id INT DEFAULT NULL, room_type VARCHAR(255) NOT NULL, price DOUBLE PRECISION NOT NULL, availability TINYINT(1) NOT NULL, amenities VARCHAR(255) NOT NULL, INDEX IDX_729F519B3243BB18 (hotel_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE staff (id INT AUTO_INCREMENT NOT NULL, staff_id VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, role VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, phone VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE hotel ADD CONSTRAINT FK_3535ED9D4D57CD FOREIGN KEY (staff_id) REFERENCES staff (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C849556ABA0943 FOREIGN KEY (guest_id_id) REFERENCES guest (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C849554C3A3BB FOREIGN KEY (payment_id) REFERENCES payment (id)');
        $this->addSql('ALTER TABLE reservation_room ADD CONSTRAINT FK_64A69CF3B83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservation_room ADD CONSTRAINT FK_64A69CF354177093 FOREIGN KEY (room_id) REFERENCES room (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE room ADD CONSTRAINT FK_729F519B3243BB18 FOREIGN KEY (hotel_id) REFERENCES hotel (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE hotel DROP FOREIGN KEY FK_3535ED9D4D57CD');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C849556ABA0943');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C849554C3A3BB');
        $this->addSql('ALTER TABLE reservation_room DROP FOREIGN KEY FK_64A69CF3B83297E7');
        $this->addSql('ALTER TABLE reservation_room DROP FOREIGN KEY FK_64A69CF354177093');
        $this->addSql('ALTER TABLE room DROP FOREIGN KEY FK_729F519B3243BB18');
        $this->addSql('DROP TABLE guest');
        $this->addSql('DROP TABLE hotel');
        $this->addSql('DROP TABLE payment');
        $this->addSql('DROP TABLE reservation');
        $this->addSql('DROP TABLE reservation_room');
        $this->addSql('DROP TABLE room');
        $this->addSql('DROP TABLE staff');
    }
}
