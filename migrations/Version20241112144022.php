<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241112144022 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE contrat (id INT AUTO_INCREMENT NOT NULL, mission_id INT NOT NULL, freelance_id INT NOT NULL, personnel_id INT NOT NULL, contenu LONGTEXT NOT NULL, date_signature DATETIME NOT NULL, INDEX IDX_60349993BE6CAE90 (mission_id), INDEX IDX_60349993E8DF656B (freelance_id), INDEX IDX_603499931C109075 (personnel_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE conversation (id INT AUTO_INCREMENT NOT NULL, expediteur_id INT NOT NULL, destinataire_id INT NOT NULL, message LONGTEXT NOT NULL, date_envoi DATETIME NOT NULL, INDEX IDX_8A8E26E910335F61 (expediteur_id), INDEX IDX_8A8E26E9A4F84F6E (destinataire_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE contrat ADD CONSTRAINT FK_60349993BE6CAE90 FOREIGN KEY (mission_id) REFERENCES mission (id)');
        $this->addSql('ALTER TABLE contrat ADD CONSTRAINT FK_60349993E8DF656B FOREIGN KEY (freelance_id) REFERENCES freelance (id)');
        $this->addSql('ALTER TABLE contrat ADD CONSTRAINT FK_603499931C109075 FOREIGN KEY (personnel_id) REFERENCES personnel (id)');
        $this->addSql('ALTER TABLE conversation ADD CONSTRAINT FK_8A8E26E910335F61 FOREIGN KEY (expediteur_id) REFERENCES personnel (id)');
        $this->addSql('ALTER TABLE conversation ADD CONSTRAINT FK_8A8E26E9A4F84F6E FOREIGN KEY (destinataire_id) REFERENCES personnel (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contrat DROP FOREIGN KEY FK_60349993BE6CAE90');
        $this->addSql('ALTER TABLE contrat DROP FOREIGN KEY FK_60349993E8DF656B');
        $this->addSql('ALTER TABLE contrat DROP FOREIGN KEY FK_603499931C109075');
        $this->addSql('ALTER TABLE conversation DROP FOREIGN KEY FK_8A8E26E910335F61');
        $this->addSql('ALTER TABLE conversation DROP FOREIGN KEY FK_8A8E26E9A4F84F6E');
        $this->addSql('DROP TABLE contrat');
        $this->addSql('DROP TABLE conversation');
    }
}
