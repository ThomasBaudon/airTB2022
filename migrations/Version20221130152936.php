<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221130152936 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE aeroport ADD ville_id INT NOT NULL');
        $this->addSql('ALTER TABLE aeroport ADD CONSTRAINT FK_9FB0D288A73F0036 FOREIGN KEY (ville_id) REFERENCES ville (id)');
        $this->addSql('CREATE INDEX IDX_9FB0D288A73F0036 ON aeroport (ville_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE aeroport DROP FOREIGN KEY FK_9FB0D288A73F0036');
        $this->addSql('DROP INDEX IDX_9FB0D288A73F0036 ON aeroport');
        $this->addSql('ALTER TABLE aeroport DROP ville_id');
    }
}
