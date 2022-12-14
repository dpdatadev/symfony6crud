<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221213155348 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE link_element ADD COLUMN category VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__link_element AS SELECT id, link, text FROM link_element');
        $this->addSql('DROP TABLE link_element');
        $this->addSql('CREATE TABLE link_element (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, link VARCHAR(255) NOT NULL, text VARCHAR(1000) DEFAULT NULL)');
        $this->addSql('INSERT INTO link_element (id, link, text) SELECT id, link, text FROM __temp__link_element');
        $this->addSql('DROP TABLE __temp__link_element');
    }
}
