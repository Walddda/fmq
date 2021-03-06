<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211014134931 extends AbstractMigration
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
        $this->addSql('CREATE TABLE quote (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, movie_id INTEGER NOT NULL, text VARCHAR(255) NOT NULL COLLATE BINARY, character VARCHAR(100) DEFAULT NULL COLLATE BINARY, CONSTRAINT FK_6B71CBF48F93B6FC FOREIGN KEY (movie_id) REFERENCES movie (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO quote (id, text, character) SELECT id, text, character FROM __temp__quote');
        $this->addSql('DROP TABLE __temp__quote');
        $this->addSql('CREATE INDEX IDX_6B71CBF48F93B6FC ON quote (movie_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_6B71CBF48F93B6FC');
        $this->addSql('CREATE TEMPORARY TABLE __temp__quote AS SELECT id, text, character FROM quote');
        $this->addSql('DROP TABLE quote');
        $this->addSql('CREATE TABLE quote (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, text VARCHAR(255) NOT NULL, character VARCHAR(100) DEFAULT NULL)');
        $this->addSql('INSERT INTO quote (id, text, character) SELECT id, text, character FROM __temp__quote');
        $this->addSql('DROP TABLE __temp__quote');
    }
}
