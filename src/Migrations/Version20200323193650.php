<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200323193650 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE factuur (id INT AUTO_INCREMENT NOT NULL, klant_id INT NOT NULL, verval_datum DATE NOT NULL, datum DATE NOT NULL, nummer INT NOT NULL, korting DOUBLE PRECISION NOT NULL, INDEX IDX_321477103C427B2F (klant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE factuur_product (id INT AUTO_INCREMENT NOT NULL, factuur_id INT NOT NULL, product_id INT NOT NULL, aantal INT NOT NULL, INDEX IDX_B1D09135C35D3E (factuur_id), UNIQUE INDEX UNIQ_B1D091354584665A (product_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE klant (id INT AUTO_INCREMENT NOT NULL, post_code VARCHAR(255) DEFAULT NULL, adres VARCHAR(255) DEFAULT NULL, naam VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE producten (id INT AUTO_INCREMENT NOT NULL, omschrijving VARCHAR(255) NOT NULL, prijs DOUBLE PRECISION NOT NULL, btw INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE factuur ADD CONSTRAINT FK_321477103C427B2F FOREIGN KEY (klant_id) REFERENCES klant (id)');
        $this->addSql('ALTER TABLE factuur_product ADD CONSTRAINT FK_B1D09135C35D3E FOREIGN KEY (factuur_id) REFERENCES factuur (id)');
        $this->addSql('ALTER TABLE factuur_product ADD CONSTRAINT FK_B1D091354584665A FOREIGN KEY (product_id) REFERENCES producten (id)');
        $this->addSql('ALTER TABLE user CHANGE roles roles JSON NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE factuur_product DROP FOREIGN KEY FK_B1D09135C35D3E');
        $this->addSql('ALTER TABLE factuur DROP FOREIGN KEY FK_321477103C427B2F');
        $this->addSql('ALTER TABLE factuur_product DROP FOREIGN KEY FK_B1D091354584665A');
        $this->addSql('DROP TABLE factuur');
        $this->addSql('DROP TABLE factuur_product');
        $this->addSql('DROP TABLE klant');
        $this->addSql('DROP TABLE producten');
        $this->addSql('ALTER TABLE user CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`');
    }
}
