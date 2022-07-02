<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220425155051 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE trans_intervention ADD chauffeur_id INT DEFAULT NULL, ADD client VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE trans_intervention ADD CONSTRAINT FK_3F0E352985C0B3BE FOREIGN KEY (chauffeur_id) REFERENCES trans_chauffeur (id)');
        $this->addSql('CREATE INDEX IDX_3F0E352985C0B3BE ON trans_intervention (chauffeur_id)');
        $this->addSql('ALTER TABLE trans_pneu ADD chauffeur_id INT DEFAULT NULL, ADD client VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE trans_pneu ADD CONSTRAINT FK_23D34AC885C0B3BE FOREIGN KEY (chauffeur_id) REFERENCES trans_chauffeur (id)');
        $this->addSql('CREATE INDEX IDX_23D34AC885C0B3BE ON trans_pneu (chauffeur_id)');
        $this->addSql('ALTER TABLE trans_pneu_hist ADD chauffeur_id INT DEFAULT NULL, ADD client VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE trans_pneu_hist ADD CONSTRAINT FK_8A25F81F85C0B3BE FOREIGN KEY (chauffeur_id) REFERENCES trans_chauffeur (id)');
        $this->addSql('CREATE INDEX IDX_8A25F81F85C0B3BE ON trans_pneu_hist (chauffeur_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE trans_intervention DROP FOREIGN KEY FK_3F0E352985C0B3BE');
        $this->addSql('DROP INDEX IDX_3F0E352985C0B3BE ON trans_intervention');
        $this->addSql('ALTER TABLE trans_intervention DROP chauffeur_id, DROP client');
        $this->addSql('ALTER TABLE trans_pneu DROP FOREIGN KEY FK_23D34AC885C0B3BE');
        $this->addSql('DROP INDEX IDX_23D34AC885C0B3BE ON trans_pneu');
        $this->addSql('ALTER TABLE trans_pneu DROP chauffeur_id, DROP client');
        $this->addSql('ALTER TABLE trans_pneu_hist DROP FOREIGN KEY FK_8A25F81F85C0B3BE');
        $this->addSql('DROP INDEX IDX_8A25F81F85C0B3BE ON trans_pneu_hist');
        $this->addSql('ALTER TABLE trans_pneu_hist DROP chauffeur_id, DROP client');
    }
}
