<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241112152321 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE entreprise ADD gestionnaire_id INT NOT NULL');
        $this->addSql('ALTER TABLE entreprise ADD CONSTRAINT FK_D19FA606885AC1B FOREIGN KEY (gestionnaire_id) REFERENCES personnel (id)');
        $this->addSql('CREATE INDEX IDX_D19FA606885AC1B ON entreprise (gestionnaire_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE entreprise DROP FOREIGN KEY FK_D19FA606885AC1B');
        $this->addSql('DROP INDEX IDX_D19FA606885AC1B ON entreprise');
        $this->addSql('ALTER TABLE entreprise DROP gestionnaire_id');
    }
}
