<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211130102317 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE tresorerie_depense');
        $this->addSql('DROP TABLE tresorerie_recette');
        $this->addSql('ALTER TABLE data_tropical_wood CHANGE updated_at updated_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE details_offer CHANGE created_at created_at DATETIME DEFAULT NULL, CHANGE updated_at updated_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE fidelisation ADD nom_aff VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE sessions CHANGE sess_lifetime sess_lifetime INT DEFAULT NULL, CHANGE sess_time sess_time INT DEFAULT NULL, CHANGE sess_id sess_id VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE sessions RENAME INDEX user_id TO IDX_9A609D13A76ED395');
        $this->addSql('ALTER TABLE tresorerie CHANGE updated_at updated_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE roles roles JSON NOT NULL, CHANGE receptionniste receptionniste VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE tresorerie_depense (id INT AUTO_INCREMENT NOT NULL, date DATETIME DEFAULT NULL, designation VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, num_sage VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, mode_paiement VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, compte_bancaire VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, monnaie VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, paiement DOUBLE PRECISION DEFAULT NULL, num_compte VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, nom_fournisseur VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE tresorerie_recette (id INT AUTO_INCREMENT NOT NULL, date DATETIME DEFAULT NULL, designation VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, num_sage VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, mode_paiement VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, compte_bancaire VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, monnaie VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, paiement DOUBLE PRECISION DEFAULT NULL, id_pro VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, nom_client VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE data_tropical_wood CHANGE updated_at updated_at DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE details_offer CHANGE created_at created_at DATE DEFAULT NULL, CHANGE updated_at updated_at DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE fidelisation DROP nom_aff');
        $this->addSql('ALTER TABLE sessions CHANGE sess_lifetime sess_lifetime BIGINT DEFAULT NULL, CHANGE sess_time sess_time BIGINT DEFAULT NULL, CHANGE sess_id sess_id VARCHAR(255) CHARACTER SET latin1 DEFAULT NULL COLLATE `latin1_swedish_ci`');
        $this->addSql('ALTER TABLE sessions RENAME INDEX idx_9a609d13a76ed395 TO user_id');
        $this->addSql('ALTER TABLE tresorerie CHANGE updated_at updated_at DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE roles roles VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE receptionniste receptionniste VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
