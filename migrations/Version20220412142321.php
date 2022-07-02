<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220412142321 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE trans_piece CHANGE prix prix DOUBLE PRECISION NOT NULL, CHANGE prix_total prix_total DOUBLE PRECISION NOT NULL');
        $this->addSql('ALTER TABLE trans_piece_entre CHANGE qte qte DOUBLE PRECISION NOT NULL, CHANGE prix prix DOUBLE PRECISION NOT NULL, CHANGE prix_total prix_total DOUBLE PRECISION NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE trans_piece CHANGE prix prix INT NOT NULL, CHANGE prix_total prix_total INT NOT NULL');
        $this->addSql('ALTER TABLE trans_piece_entre CHANGE qte qte INT NOT NULL, CHANGE prix prix INT NOT NULL, CHANGE prix_total prix_total INT NOT NULL');
    }
}
