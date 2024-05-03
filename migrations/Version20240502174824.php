<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240502174824 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE news_image_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE news_image (id INT NOT NULL, news_id INT DEFAULT NULL, title VARCHAR(255) DEFAULT NULL, alt VARCHAR(255) DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, img_updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_BF828301B5A459A0 ON news_image (news_id)');
        $this->addSql('COMMENT ON COLUMN news_image.img_updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE news_image ADD CONSTRAINT FK_BF828301B5A459A0 FOREIGN KEY (news_id) REFERENCES news (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE news_image_id_seq CASCADE');
        $this->addSql('ALTER TABLE news_image DROP CONSTRAINT FK_BF828301B5A459A0');
        $this->addSql('DROP TABLE news_image');
    }
}
