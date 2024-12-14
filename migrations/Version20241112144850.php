<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241112144850 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE facture (id INT AUTO_INCREMENT NOT NULL, mission_id INT NOT NULL, freelance_id INT NOT NULL, personnel_id INT NOT NULL, montant DOUBLE PRECISION NOT NULL, date_emission DATETIME NOT NULL, INDEX IDX_FE866410BE6CAE90 (mission_id), INDEX IDX_FE866410E8DF656B (freelance_id), INDEX IDX_FE8664101C109075 (personnel_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recherche_freelance (id INT AUTO_INCREMENT NOT NULL, personnel_id INT NOT NULL, criteres VARCHAR(255) NOT NULL, date_recherche DATETIME NOT NULL, INDEX IDX_9F8FCCDF1C109075 (personnel_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE facture ADD CONSTRAINT FK_FE866410BE6CAE90 FOREIGN KEY (mission_id) REFERENCES mission (id)');
        $this->addSql('ALTER TABLE facture ADD CONSTRAINT FK_FE866410E8DF656B FOREIGN KEY (freelance_id) REFERENCES freelance (id)');
        $this->addSql('ALTER TABLE facture ADD CONSTRAINT FK_FE8664101C109075 FOREIGN KEY (personnel_id) REFERENCES personnel (id)');
        $this->addSql('ALTER TABLE recherche_freelance ADD CONSTRAINT FK_9F8FCCDF1C109075 FOREIGN KEY (personnel_id) REFERENCES personnel (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE facture DROP FOREIGN KEY FK_FE866410BE6CAE90');
        $this->addSql('ALTER TABLE facture DROP FOREIGN KEY FK_FE866410E8DF656B');
        $this->addSql('ALTER TABLE facture DROP FOREIGN KEY FK_FE8664101C109075');
        $this->addSql('ALTER TABLE recherche_freelance DROP FOREIGN KEY FK_9F8FCCDF1C109075');
        $this->addSql('DROP TABLE facture');
        $this->addSql('DROP TABLE recherche_freelance');
    }
}
