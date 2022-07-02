<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220225152444 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE trans_pneu_hist (id INT AUTO_INCREMENT NOT NULL, pneu_id INT NOT NULL, vehicule_id INT DEFAULT NULL, qte INT NOT NULL, montant VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, kilometrage VARCHAR(255) DEFAULT NULL, serie VARCHAR(255) DEFAULT NULL, position VARCHAR(255) DEFAULT NULL, date DATETIME DEFAULT NULL, INDEX IDX_8A25F81FD7C9D5CE (pneu_id), INDEX IDX_8A25F81F4A4A3511 (vehicule_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE trans_pneu_hist ADD CONSTRAINT FK_8A25F81FD7C9D5CE FOREIGN KEY (pneu_id) REFERENCES trans_pneu (id)');
        $this->addSql('ALTER TABLE trans_pneu_hist ADD CONSTRAINT FK_8A25F81F4A4A3511 FOREIGN KEY (vehicule_id) REFERENCES trans_vehicule (id)');
        $this->addSql('ALTER TABLE trans_pneu ADD qte INT NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE trans_pneu_hist');
        $this->addSql('ALTER TABLE trans_pneu DROP qte');
    }
}
