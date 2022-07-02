<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220211061217 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE trans_carburant (id INT AUTO_INCREMENT NOT NULL, created_at DATETIME NOT NULL, type_carburant VARCHAR(255) NOT NULL, litrage INT NOT NULL, montant VARCHAR(255) NOT NULL, discr VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE trans_carburant_entre (id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE trans_carburant_sortie (id INT NOT NULL, vehicule_id INT DEFAULT NULL, chauffeur_id INT DEFAULT NULL, station VARCHAR(255) DEFAULT NULL, kilometrage VARCHAR(255) DEFAULT NULL, fond_reservoir INT NOT NULL, trajet VARCHAR(255) DEFAULT NULL, client VARCHAR(255) DEFAULT NULL, INDEX IDX_87F580D24A4A3511 (vehicule_id), INDEX IDX_87F580D285C0B3BE (chauffeur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE trans_chauffeur (id INT AUTO_INCREMENT NOT NULL, matricule VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE trans_carburant_entre ADD CONSTRAINT FK_FE34E28ABF396750 FOREIGN KEY (id) REFERENCES trans_carburant (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE trans_carburant_sortie ADD CONSTRAINT FK_87F580D24A4A3511 FOREIGN KEY (vehicule_id) REFERENCES trans_vehicule (id)');
        $this->addSql('ALTER TABLE trans_carburant_sortie ADD CONSTRAINT FK_87F580D285C0B3BE FOREIGN KEY (chauffeur_id) REFERENCES trans_chauffeur (id)');
        $this->addSql('ALTER TABLE trans_carburant_sortie ADD CONSTRAINT FK_87F580D2BF396750 FOREIGN KEY (id) REFERENCES trans_carburant (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE changement_after_import CHANGE liste_pfupdated_id liste_pfupdated_id INT DEFAULT NULL, CHANGE nom nom VARCHAR(255) DEFAULT NULL, CHANGE last_data last_data VARCHAR(255) DEFAULT NULL, CHANGE next_data next_data VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE client CHANGE fidelisation_id fidelisation_id INT DEFAULT NULL, CHANGE prenom prenom VARCHAR(255) DEFAULT NULL, CHANGE nbr_chambre nbr_chambre INT DEFAULT NULL, CHANGE prix_total prix_total VARCHAR(255) DEFAULT NULL, CHANGE provenance provenance VARCHAR(255) DEFAULT NULL, CHANGE tarif tarif VARCHAR(255) DEFAULT NULL, CHANGE source source VARCHAR(255) DEFAULT NULL, CHANGE email email VARCHAR(255) DEFAULT NULL, CHANGE telephone telephone VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE client_upload CHANGE annee annee VARCHAR(255) DEFAULT NULL, CHANGE type_client type_client VARCHAR(255) DEFAULT NULL, CHANGE numero_facture numero_facture VARCHAR(255) DEFAULT NULL, CHANGE nom nom VARCHAR(255) DEFAULT NULL, CHANGE personne_hebergee personne_hebergee VARCHAR(255) DEFAULT NULL, CHANGE montant montant VARCHAR(255) DEFAULT NULL, CHANGE date date DATETIME DEFAULT NULL, CHANGE montant_payer montant_payer VARCHAR(255) DEFAULT NULL, CHANGE date_pmt date_pmt DATETIME DEFAULT NULL, CHANGE mode_pmt mode_pmt VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE contact_entreprise_tw CHANGE entreprise_id entreprise_id INT DEFAULT NULL, CHANGE nom_en_contact nom_en_contact VARCHAR(255) DEFAULT NULL, CHANGE type type VARCHAR(255) DEFAULT NULL, CHANGE email email VARCHAR(255) DEFAULT NULL, CHANGE telephone telephone VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE customer CHANGE fidelisation_id fidelisation_id INT DEFAULT NULL, CHANGE last_name last_name VARCHAR(255) DEFAULT NULL, CHANGE email email VARCHAR(255) DEFAULT NULL, CHANGE telephone telephone VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE data_tropical_wood CHANGE entreprise_tw_id entreprise_tw_id INT DEFAULT NULL, CHANGE entreprise entreprise VARCHAR(255) DEFAULT NULL, CHANGE contact contact VARCHAR(255) DEFAULT NULL, CHANGE detail detail VARCHAR(255) DEFAULT NULL, CHANGE type_transaction type_transaction VARCHAR(255) DEFAULT NULL, CHANGE etat_production etat_production VARCHAR(255) DEFAULT NULL, CHANGE paiement paiement VARCHAR(255) DEFAULT NULL, CHANGE montant_total montant_total NUMERIC(10, 0) DEFAULT NULL, CHANGE date_confirmation date_confirmation DATETIME DEFAULT NULL, CHANGE montant_paye montant_paye NUMERIC(10, 0) DEFAULT NULL, CHANGE id_pro id_pro VARCHAR(255) DEFAULT NULL, CHANGE total_reglement total_reglement NUMERIC(10, 0) DEFAULT NULL, CHANGE reste reste DOUBLE PRECISION DEFAULT NULL, CHANGE etape_production etape_production DOUBLE PRECISION DEFAULT NULL, CHANGE date_facture date_facture DATETIME DEFAULT NULL, CHANGE date_paiement_prevu date_paiement_prevu DATETIME DEFAULT NULL, CHANGE date_paiement_effectif date_paiement_effectif DATETIME DEFAULT NULL, CHANGE created_at created_at DATETIME DEFAULT NULL, CHANGE requested_situation requested_situation VARCHAR(255) DEFAULT NULL, CHANGE updated_at updated_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE date_maj CHANGE maj_data_trop maj_data_trop DATETIME DEFAULT NULL, CHANGE maj_data_detail maj_data_detail DATETIME DEFAULT NULL, CHANGE maj_data_tres maj_data_tres DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE details_offer CHANGE data_tropical_wood_id data_tropical_wood_id INT DEFAULT NULL, CHANGE quantity quantity DOUBLE PRECISION DEFAULT NULL, CHANGE unite_price unite_price VARCHAR(255) DEFAULT NULL, CHANGE amount amount VARCHAR(255) DEFAULT NULL, CHANGE delivred_quantity delivred_quantity DOUBLE PRECISION DEFAULT NULL, CHANGE pourcent_work_progress pourcent_work_progress DOUBLE PRECISION DEFAULT NULL, CHANGE requested_situation requested_situation VARCHAR(255) DEFAULT NULL, CHANGE deposit_received deposit_received VARCHAR(255) DEFAULT NULL, CHANGE the_rest_of the_rest_of VARCHAR(255) DEFAULT NULL, CHANGE sector sector VARCHAR(255) DEFAULT NULL, CHANGE id_pro id_pro VARCHAR(255) DEFAULT NULL, CHANGE company_confirmation company_confirmation VARCHAR(255) DEFAULT NULL, CHANGE created_at created_at DATETIME DEFAULT NULL, CHANGE updated_at updated_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE donnee_du_jour CHANGE heb_to heb_to VARCHAR(255) DEFAULT NULL, CHANGE heb_ca heb_ca VARCHAR(255) DEFAULT NULL, CHANGE res_n_couvert res_n_couvert VARCHAR(255) DEFAULT NULL, CHANGE res_ca res_ca VARCHAR(255) DEFAULT NULL, CHANGE res_p_dej res_p_dej VARCHAR(255) DEFAULT NULL, CHANGE res_dej res_dej VARCHAR(255) DEFAULT NULL, CHANGE res_dinner res_dinner VARCHAR(255) DEFAULT NULL, CHANGE spa_ca spa_ca VARCHAR(255) DEFAULT NULL, CHANGE spa_n_abonne spa_n_abonne VARCHAR(255) DEFAULT NULL, CHANGE spa_c_unique spa_c_unique VARCHAR(255) DEFAULT NULL, CHANGE n_pax_heb n_pax_heb INT DEFAULT NULL, CHANGE n_chambre_occupe n_chambre_occupe INT DEFAULT NULL');
        $this->addSql('ALTER TABLE donnee_mensuelle CHANGE hotel_id hotel_id INT DEFAULT NULL, CHANGE stock stock VARCHAR(255) DEFAULT NULL, CHANGE cost_restaurant_value cost_restaurant_value VARCHAR(255) DEFAULT NULL, CHANGE cost_restaurant_pourcent cost_restaurant_pourcent VARCHAR(255) DEFAULT NULL, CHANGE cost_electricite_value cost_electricite_value VARCHAR(255) DEFAULT NULL, CHANGE cost_electricite_pourcent cost_electricite_pourcent VARCHAR(255) DEFAULT NULL, CHANGE cost_eau_value cost_eau_value VARCHAR(255) DEFAULT NULL, CHANGE cost_eau_pourcent cost_eau_pourcent VARCHAR(255) DEFAULT NULL, CHANGE cost_gasoil_value cost_gasoil_value VARCHAR(255) DEFAULT NULL, CHANGE cost_gasoil_pourcent cost_gasoil_pourcent VARCHAR(255) DEFAULT NULL, CHANGE salaire_brute_value salaire_brute_value VARCHAR(255) DEFAULT NULL, CHANGE salaire_brute_pourcent salaire_brute_pourcent VARCHAR(255) DEFAULT NULL, CHANGE sqn_interne sqn_interne VARCHAR(255) DEFAULT NULL, CHANGE sqn_booking sqn_booking VARCHAR(255) DEFAULT NULL, CHANGE sqn_tripadvisor sqn_tripadvisor VARCHAR(255) DEFAULT NULL, CHANGE kpi_adr kpi_adr VARCHAR(255) DEFAULT NULL, CHANGE kpi_revp kpi_revp VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE entreprise_tw CHANGE adresse adresse VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE fiche_hotel CHANGE hotel_id hotel_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE fidelisation CHANGE limite_nuite limite_nuite INT DEFAULT NULL, CHANGE limite_ca limite_ca INT DEFAULT NULL, CHANGE icone_carte icone_carte VARCHAR(255) DEFAULT NULL, CHANGE icone_client icone_client VARCHAR(255) DEFAULT NULL, CHANGE style_etiquette style_etiquette VARCHAR(255) DEFAULT NULL, CHANGE nom_aff nom_aff VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE fournisseur CHANGE created_at created_at DATETIME DEFAULT NULL, CHANGE numero_facture numero_facture VARCHAR(255) DEFAULT NULL, CHANGE type type VARCHAR(255) DEFAULT NULL, CHANGE nom_fournisseur nom_fournisseur VARCHAR(255) DEFAULT NULL, CHANGE montant montant VARCHAR(255) DEFAULT NULL, CHANGE mode_pmt mode_pmt VARCHAR(255) DEFAULT NULL, CHANGE montant_paye montant_paye VARCHAR(255) DEFAULT NULL, CHANGE date_pmt date_pmt DATETIME DEFAULT NULL, CHANGE remarque remarque VARCHAR(255) DEFAULT NULL, CHANGE echeance echeance DATETIME DEFAULT NULL, CHANGE reste reste VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE interval_change_pf CHANGE date_last date_last DATETIME DEFAULT NULL, CHANGE date_next date_next DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE liste_pfupdated CHANGE client_updated_id client_updated_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE prestation CHANGE customer_id customer_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE remarque_entreprise_tw CHANGE entreprise_id entreprise_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE save_remarque CHANGE date_remarque date_remarque DATETIME DEFAULT NULL, CHANGE concerne concerne VARCHAR(255) DEFAULT NULL, CHANGE observation observation VARCHAR(255) DEFAULT NULL, CHANGE etat_resultat etat_resultat VARCHAR(255) DEFAULT NULL, CHANGE entreprise_nom_for_id_on_remarque entreprise_nom_for_id_on_remarque VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE sessions CHANGE user_id user_id INT DEFAULT NULL, CHANGE sess_hotel sess_hotel VARCHAR(255) DEFAULT NULL, CHANGE sess_current_page sess_current_page VARCHAR(255) DEFAULT NULL, CHANGE sess_lifetime sess_lifetime INT DEFAULT NULL, CHANGE sess_time sess_time INT DEFAULT NULL');
        $this->addSql('ALTER TABLE sous_categorie_tresorerie CHANGE categorie_id categorie_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE trans_pneu CHANGE vehicule_id vehicule_id INT DEFAULT NULL, CHANGE date date DATETIME DEFAULT NULL, CHANGE kilometrage kilometrage VARCHAR(255) DEFAULT NULL, CHANGE position position VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE trans_vehicule CHANGE image image VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE trans_voyage ADD chauffeur_id INT NOT NULL, DROP chauffeur, CHANGE ot ot VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE trans_voyage ADD CONSTRAINT FK_294E857585C0B3BE FOREIGN KEY (chauffeur_id) REFERENCES trans_chauffeur (id)');
        $this->addSql('CREATE INDEX IDX_294E857585C0B3BE ON trans_voyage (chauffeur_id)');
        $this->addSql('ALTER TABLE tresorerie CHANGE date_paiment date_paiment DATETIME DEFAULT NULL, CHANGE encaissement encaissement VARCHAR(255) DEFAULT NULL, CHANGE decaissement decaissement VARCHAR(255) DEFAULT NULL, CHANGE categorie categorie VARCHAR(255) DEFAULT NULL, CHANGE sous_categorie sous_categorie VARCHAR(255) DEFAULT NULL, CHANGE id_pro id_pro VARCHAR(255) DEFAULT NULL, CHANGE client client VARCHAR(255) DEFAULT NULL, CHANGE num_sage num_sage VARCHAR(255) DEFAULT NULL, CHANGE prestataire prestataire VARCHAR(255) DEFAULT NULL, CHANGE created_at created_at DATETIME DEFAULT NULL, CHANGE updated_at updated_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE roles roles JSON NOT NULL, CHANGE prenom prenom VARCHAR(255) DEFAULT NULL, CHANGE pass_clair pass_clair VARCHAR(255) DEFAULT NULL, CHANGE image image VARCHAR(255) DEFAULT NULL, CHANGE profile profile VARCHAR(255) DEFAULT NULL, CHANGE receptionniste receptionniste VARCHAR(255) DEFAULT NULL, CHANGE comptable comptable VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE visit CHANGE customer_id customer_id INT DEFAULT NULL, CHANGE hotel_id hotel_id INT DEFAULT NULL, CHANGE provenance provenance VARCHAR(255) DEFAULT NULL, CHANGE source source VARCHAR(255) DEFAULT NULL, CHANGE montant montant VARCHAR(255) DEFAULT NULL, CHANGE nbr_chambre nbr_chambre INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE trans_carburant_entre DROP FOREIGN KEY FK_FE34E28ABF396750');
        $this->addSql('ALTER TABLE trans_carburant_sortie DROP FOREIGN KEY FK_87F580D2BF396750');
        $this->addSql('ALTER TABLE trans_carburant_sortie DROP FOREIGN KEY FK_87F580D285C0B3BE');
        $this->addSql('ALTER TABLE trans_voyage DROP FOREIGN KEY FK_294E857585C0B3BE');
        $this->addSql('DROP TABLE trans_carburant');
        $this->addSql('DROP TABLE trans_carburant_entre');
        $this->addSql('DROP TABLE trans_carburant_sortie');
        $this->addSql('DROP TABLE trans_chauffeur');
        $this->addSql('ALTER TABLE changement_after_import CHANGE liste_pfupdated_id liste_pfupdated_id INT DEFAULT NULL, CHANGE nom nom VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE last_data last_data VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE next_data next_data VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE client CHANGE fidelisation_id fidelisation_id INT DEFAULT NULL, CHANGE prenom prenom VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE nbr_chambre nbr_chambre INT DEFAULT NULL, CHANGE prix_total prix_total VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE provenance provenance VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE tarif tarif VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE source source VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE email email VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE telephone telephone VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE client_upload CHANGE annee annee VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE type_client type_client VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE numero_facture numero_facture VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE nom nom VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE personne_hebergee personne_hebergee VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE montant montant VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE date date DATETIME DEFAULT \'NULL\', CHANGE montant_payer montant_payer VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE date_pmt date_pmt DATETIME DEFAULT \'NULL\', CHANGE mode_pmt mode_pmt VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE contact_entreprise_tw CHANGE entreprise_id entreprise_id INT DEFAULT NULL, CHANGE nom_en_contact nom_en_contact VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE type type VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE email email VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE telephone telephone VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE customer CHANGE fidelisation_id fidelisation_id INT DEFAULT NULL, CHANGE last_name last_name VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE email email VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE telephone telephone VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE data_tropical_wood CHANGE entreprise_tw_id entreprise_tw_id INT DEFAULT NULL, CHANGE entreprise entreprise VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE contact contact VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE detail detail VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE type_transaction type_transaction VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE etat_production etat_production VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE paiement paiement VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE montant_total montant_total NUMERIC(10, 0) DEFAULT \'NULL\', CHANGE date_confirmation date_confirmation DATETIME DEFAULT \'NULL\', CHANGE montant_paye montant_paye NUMERIC(10, 0) DEFAULT \'NULL\', CHANGE id_pro id_pro VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE total_reglement total_reglement NUMERIC(10, 0) DEFAULT \'NULL\', CHANGE reste reste DOUBLE PRECISION DEFAULT \'NULL\', CHANGE date_facture date_facture DATETIME DEFAULT \'NULL\', CHANGE etape_production etape_production DOUBLE PRECISION DEFAULT \'NULL\', CHANGE date_paiement_prevu date_paiement_prevu DATETIME DEFAULT \'NULL\', CHANGE date_paiement_effectif date_paiement_effectif DATETIME DEFAULT \'NULL\', CHANGE created_at created_at DATETIME DEFAULT \'NULL\', CHANGE requested_situation requested_situation VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE updated_at updated_at DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE date_maj CHANGE maj_data_trop maj_data_trop DATETIME DEFAULT \'NULL\', CHANGE maj_data_detail maj_data_detail DATETIME DEFAULT \'NULL\', CHANGE maj_data_tres maj_data_tres DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE details_offer CHANGE data_tropical_wood_id data_tropical_wood_id INT DEFAULT NULL, CHANGE quantity quantity DOUBLE PRECISION DEFAULT \'NULL\', CHANGE unite_price unite_price VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE amount amount VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE delivred_quantity delivred_quantity DOUBLE PRECISION DEFAULT \'NULL\', CHANGE pourcent_work_progress pourcent_work_progress DOUBLE PRECISION DEFAULT \'NULL\', CHANGE requested_situation requested_situation VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE deposit_received deposit_received VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE the_rest_of the_rest_of VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE company_confirmation company_confirmation VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE sector sector VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE id_pro id_pro VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE created_at created_at DATETIME DEFAULT \'NULL\', CHANGE updated_at updated_at DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE donnee_du_jour CHANGE heb_to heb_to VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE heb_ca heb_ca VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE res_n_couvert res_n_couvert VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE res_ca res_ca VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE res_p_dej res_p_dej VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE res_dej res_dej VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE res_dinner res_dinner VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE spa_ca spa_ca VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE spa_n_abonne spa_n_abonne VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE spa_c_unique spa_c_unique VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE n_pax_heb n_pax_heb INT DEFAULT NULL, CHANGE n_chambre_occupe n_chambre_occupe INT DEFAULT NULL');
        $this->addSql('ALTER TABLE donnee_mensuelle CHANGE hotel_id hotel_id INT DEFAULT NULL, CHANGE stock stock VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE cost_restaurant_value cost_restaurant_value VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE cost_restaurant_pourcent cost_restaurant_pourcent VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE cost_electricite_value cost_electricite_value VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE cost_electricite_pourcent cost_electricite_pourcent VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE cost_eau_value cost_eau_value VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE cost_eau_pourcent cost_eau_pourcent VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE cost_gasoil_value cost_gasoil_value VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE cost_gasoil_pourcent cost_gasoil_pourcent VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE salaire_brute_value salaire_brute_value VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE salaire_brute_pourcent salaire_brute_pourcent VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE sqn_interne sqn_interne VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE sqn_booking sqn_booking VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE sqn_tripadvisor sqn_tripadvisor VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE kpi_adr kpi_adr VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE kpi_revp kpi_revp VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE entreprise_tw CHANGE adresse adresse VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE fiche_hotel CHANGE hotel_id hotel_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE fidelisation CHANGE limite_nuite limite_nuite INT DEFAULT NULL, CHANGE limite_ca limite_ca INT DEFAULT NULL, CHANGE icone_carte icone_carte VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE icone_client icone_client VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE style_etiquette style_etiquette VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE nom_aff nom_aff VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE fournisseur CHANGE created_at created_at DATETIME DEFAULT \'NULL\', CHANGE numero_facture numero_facture VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE type type VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE nom_fournisseur nom_fournisseur VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE montant montant VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE echeance echeance DATETIME DEFAULT \'NULL\', CHANGE mode_pmt mode_pmt VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE montant_paye montant_paye VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE date_pmt date_pmt DATETIME DEFAULT \'NULL\', CHANGE remarque remarque VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE reste reste VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE interval_change_pf CHANGE date_last date_last DATETIME DEFAULT \'NULL\', CHANGE date_next date_next DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE liste_pfupdated CHANGE client_updated_id client_updated_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE prestation CHANGE customer_id customer_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE remarque_entreprise_tw CHANGE entreprise_id entreprise_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE save_remarque CHANGE date_remarque date_remarque DATETIME DEFAULT \'NULL\', CHANGE concerne concerne VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE observation observation VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE etat_resultat etat_resultat VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE entreprise_nom_for_id_on_remarque entreprise_nom_for_id_on_remarque VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE sessions CHANGE user_id user_id INT DEFAULT NULL, CHANGE sess_hotel sess_hotel VARCHAR(255) CHARACTER SET latin1 DEFAULT \'NULL\' COLLATE `latin1_swedish_ci`, CHANGE sess_current_page sess_current_page VARCHAR(255) CHARACTER SET latin1 DEFAULT \'NULL\' COLLATE `latin1_swedish_ci`, CHANGE sess_lifetime sess_lifetime INT DEFAULT NULL, CHANGE sess_time sess_time INT DEFAULT NULL');
        $this->addSql('ALTER TABLE sous_categorie_tresorerie CHANGE categorie_id categorie_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE trans_pneu CHANGE vehicule_id vehicule_id INT DEFAULT NULL, CHANGE date date DATETIME DEFAULT \'NULL\', CHANGE kilometrage kilometrage VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE position position VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE trans_vehicule CHANGE image image VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('DROP INDEX IDX_294E857585C0B3BE ON trans_voyage');
        $this->addSql('ALTER TABLE trans_voyage ADD chauffeur VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP chauffeur_id, CHANGE ot ot VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE tresorerie CHANGE date_paiment date_paiment DATETIME DEFAULT \'NULL\', CHANGE encaissement encaissement VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE decaissement decaissement VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE categorie categorie VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE sous_categorie sous_categorie VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE id_pro id_pro VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE client client VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE num_sage num_sage VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE prestataire prestataire VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE created_at created_at DATETIME DEFAULT \'NULL\', CHANGE updated_at updated_at DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE user CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`, CHANGE prenom prenom VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE profile profile VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE pass_clair pass_clair VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE image image VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE receptionniste receptionniste VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE comptable comptable VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE visit CHANGE customer_id customer_id INT DEFAULT NULL, CHANGE hotel_id hotel_id INT DEFAULT NULL, CHANGE provenance provenance VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE source source VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE montant montant VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE nbr_chambre nbr_chambre INT DEFAULT NULL');
    }
}
