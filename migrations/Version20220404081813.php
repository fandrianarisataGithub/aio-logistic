<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220404081813 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE tran_position_pneu ADD rang INT DEFAULT NULL');
        $this->addSql('ALTER TABLE trans_marque_pneu ADD rang INT DEFAULT NULL');
        $this->addSql('ALTER TABLE trans_reference_pneu ADD rang INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD transport_voyage TINYINT(1) DEFAULT NULL, ADD transport_garage TINYINT(1) DEFAULT NULL, ADD transport_carburant TINYINT(1) DEFAULT NULL, ADD transport_pneu TINYINT(1) DEFAULT NULL, ADD transport_vehicule TINYINT(1) DEFAULT NULL, ADD transport_chauffeur TINYINT(1) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE tran_position_pneu DROP rang');
        $this->addSql('ALTER TABLE trans_marque_pneu DROP rang');
        $this->addSql('ALTER TABLE trans_reference_pneu DROP rang');
        $this->addSql('ALTER TABLE user DROP transport_voyage, DROP transport_garage, DROP transport_carburant, DROP transport_pneu, DROP transport_vehicule, DROP transport_chauffeur');
    }
}
