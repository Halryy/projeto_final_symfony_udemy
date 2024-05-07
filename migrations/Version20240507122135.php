<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240507122135 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE testimony_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE testimony (id INT NOT NULL, title VARCHAR(255) DEFAULT NULL, short_description VARCHAR(255) DEFAULT NULL, full_description TEXT DEFAULT NULL, status INT DEFAULT NULL, highlighted INT DEFAULT NULL, position INT DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, img_updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, language INT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN testimony.img_updated_at IS \'(DC2Type:datetime_immutable)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE testimony_id_seq CASCADE');
        $this->addSql('DROP TABLE testimony');
    }
}