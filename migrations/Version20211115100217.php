<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211115100217 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE date_maj (id INT AUTO_INCREMENT NOT NULL, maj_trop_id INT DEFAULT NULL, maj_detail_id INT DEFAULT NULL, maj_tres_id INT DEFAULT NULL, created_at DATETIME NOT NULL, date_maj DATETIME DEFAULT NULL, INDEX IDX_DFC314B43C39EB1D (maj_trop_id), INDEX IDX_DFC314B431E1D8A9 (maj_detail_id), INDEX IDX_DFC314B4643C5C52 (maj_tres_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE date_maj ADD CONSTRAINT FK_DFC314B43C39EB1D FOREIGN KEY (maj_trop_id) REFERENCES data_tropical_wood (id)');
        $this->addSql('ALTER TABLE date_maj ADD CONSTRAINT FK_DFC314B431E1D8A9 FOREIGN KEY (maj_detail_id) REFERENCES details_offer (id)');
        $this->addSql('ALTER TABLE date_maj ADD CONSTRAINT FK_DFC314B4643C5C52 FOREIGN KEY (maj_tres_id) REFERENCES tresorerie (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE date_maj');
    }
}
