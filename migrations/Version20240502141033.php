<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240502141033 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE news_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE news (id INT NOT NULL, status INT DEFAULT NULL, highlighted INT DEFAULT NULL, date DATE DEFAULT NULL, title VARCHAR(255) DEFAULT NULL, short_description VARCHAR(255) DEFAULT NULL, youtube_video_code VARCHAR(255) DEFAULT NULL, full_description TEXT DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, img_updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, language INT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN news.img_updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE news_news_category (news_id INT NOT NULL, news_category_id INT NOT NULL, PRIMARY KEY(news_id, news_category_id))');
        $this->addSql('CREATE INDEX IDX_1A91D6D6B5A459A0 ON news_news_category (news_id)');
        $this->addSql('CREATE INDEX IDX_1A91D6D63B732BAD ON news_news_category (news_category_id)');
        $this->addSql('ALTER TABLE news_news_category ADD CONSTRAINT FK_1A91D6D6B5A459A0 FOREIGN KEY (news_id) REFERENCES news (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE news_news_category ADD CONSTRAINT FK_1A91D6D63B732BAD FOREIGN KEY (news_category_id) REFERENCES news_category (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE news_id_seq CASCADE');
        $this->addSql('ALTER TABLE news_news_category DROP CONSTRAINT FK_1A91D6D6B5A459A0');
        $this->addSql('ALTER TABLE news_news_category DROP CONSTRAINT FK_1A91D6D63B732BAD');
        $this->addSql('DROP TABLE news');
        $this->addSql('DROP TABLE news_news_category');
    }
}
