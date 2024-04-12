<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240411171953 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE task_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE global_tags_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE global_tags (id INT NOT NULL, ga4 TEXT DEFAULT NULL, tags_google_ads TEXT DEFAULT NULL, pixel_meta_ads TEXT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('DROP TABLE task');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE global_tags_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE task_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE task (id INT NOT NULL, content VARCHAR(255) DEFAULT NULL, status VARCHAR(25) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('DROP TABLE global_tags');
    }
}
