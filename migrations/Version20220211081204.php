<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220211081204 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE trans_voyage ADD CONSTRAINT FK_294E857585C0B3BE FOREIGN KEY (chauffeur_id) REFERENCES trans_chauffeur (id)');
        $this->addSql('CREATE INDEX IDX_294E857585C0B3BE ON trans_voyage (chauffeur_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE trans_voyage DROP FOREIGN KEY FK_294E857585C0B3BE');
        $this->addSql('DROP INDEX IDX_294E857585C0B3BE ON trans_voyage');
    }
}
