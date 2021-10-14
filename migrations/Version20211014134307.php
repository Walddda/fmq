<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211014134307 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__quote AS SELECT id, text, character FROM quote');
        $this->addSql('DROP TABLE quote');
        $this->addSql('CREATE TABLE quote (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, text VARCHAR(255) NOT NULL COLLATE BINARY, character VARCHAR(100) DEFAULT NULL COLLATE BINARY)');
        $this->addSql('INSERT INTO quote (id, text, character) SELECT id, text, character FROM __temp__quote');
        $this->addSql('DROP TABLE __temp__quote');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE quote ADD COLUMN movie VARCHAR(100) DEFAULT NULL COLLATE BINARY');
    }
}
