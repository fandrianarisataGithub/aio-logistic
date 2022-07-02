<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220222154603 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE trans_intervention (id INT AUTO_INCREMENT NOT NULL, vehicule_id INT NOT NULL, date_debut DATETIME NOT NULL, date_fin DATETIME NOT NULL, km VARCHAR(255) NOT NULL, ot VARCHAR(255) DEFAULT NULL, motif VARCHAR(255) NOT NULL, intervenant VARCHAR(255) NOT NULL, commentaire VARCHAR(255) DEFAULT NULL, total INT NOT NULL, INDEX IDX_3F0E35294A4A3511 (vehicule_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE trans_intervention_detail (id INT AUTO_INCREMENT NOT NULL, intervention_id INT NOT NULL, piece_id INT NOT NULL, qte INT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_CEDF24D78EAE3863 (intervention_id), INDEX IDX_CEDF24D7C40FCFA8 (piece_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE trans_piece (id INT AUTO_INCREMENT NOT NULL, intervention_id INT DEFAULT NULL, updated_at DATETIME NOT NULL, created_at DATETIME NOT NULL, code VARCHAR(255) NOT NULL, designation VARCHAR(255) NOT NULL, qte INT NOT NULL, prix INT NOT NULL, prix_total INT NOT NULL, bl VARCHAR(255) NOT NULL, fournisseur VARCHAR(255) NOT NULL, INDEX IDX_FB096EFC8EAE3863 (intervention_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE trans_piece_entre (id INT AUTO_INCREMENT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, fournisseur VARCHAR(255) NOT NULL, bl VARCHAR(255) NOT NULL, code VARCHAR(255) NOT NULL, designation VARCHAR(255) NOT NULL, qte INT NOT NULL, prix INT NOT NULL, prix_total INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE trans_pneu_entre (id INT AUTO_INCREMENT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, fournisseur VARCHAR(255) NOT NULL, bl VARCHAR(255) NOT NULL, code VARCHAR(255) NOT NULL, designation VARCHAR(255) NOT NULL, qte INT NOT NULL, prix INT NOT NULL, prix_total INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE trans_intervention ADD CONSTRAINT FK_3F0E35294A4A3511 FOREIGN KEY (vehicule_id) REFERENCES trans_vehicule (id)');
        $this->addSql('ALTER TABLE trans_intervention_detail ADD CONSTRAINT FK_CEDF24D78EAE3863 FOREIGN KEY (intervention_id) REFERENCES trans_intervention (id)');
        $this->addSql('ALTER TABLE trans_intervention_detail ADD CONSTRAINT FK_CEDF24D7C40FCFA8 FOREIGN KEY (piece_id) REFERENCES trans_piece (id)');
        $this->addSql('ALTER TABLE trans_piece ADD CONSTRAINT FK_FB096EFC8EAE3863 FOREIGN KEY (intervention_id) REFERENCES trans_intervention (id)');
        $this->addSql('ALTER TABLE trans_vehicule CHANGE date_circulation date_circulation DATETIME DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE trans_intervention_detail DROP FOREIGN KEY FK_CEDF24D78EAE3863');
        $this->addSql('ALTER TABLE trans_piece DROP FOREIGN KEY FK_FB096EFC8EAE3863');
        $this->addSql('ALTER TABLE trans_intervention_detail DROP FOREIGN KEY FK_CEDF24D7C40FCFA8');
        $this->addSql('DROP TABLE trans_intervention');
        $this->addSql('DROP TABLE trans_intervention_detail');
        $this->addSql('DROP TABLE trans_piece');
        $this->addSql('DROP TABLE trans_piece_entre');
        $this->addSql('DROP TABLE trans_pneu_entre');
        $this->addSql('ALTER TABLE trans_vehicule CHANGE date_circulation date_circulation DATETIME NOT NULL');
    }
}
