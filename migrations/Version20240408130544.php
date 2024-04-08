<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240408130544 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE page_seo_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE page_seo (id INT NOT NULL, home_page_title VARCHAR(255) NOT NULL, home_page_description VARCHAR(255) NOT NULL, about_us_page_title VARCHAR(255) NOT NULL, about_us_page_description VARCHAR(255) NOT NULL, product_listing_page_title VARCHAR(255) NOT NULL, product_listing_page_description VARCHAR(255) NOT NULL, news_listing_page_title VARCHAR(255) NOT NULL, news_listing_page_description VARCHAR(255) NOT NULL, service_listing_page_title VARCHAR(255) NOT NULL, service_listing_page_description VARCHAR(255) NOT NULL, financing_list_page_title VARCHAR(255) NOT NULL, financing_list_page_description VARCHAR(255) NOT NULL, video_listing_page_title VARCHAR(255) NOT NULL, video_listing_page_description VARCHAR(255) NOT NULL, language INT DEFAULT NULL, PRIMARY KEY(id))');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE page_seo_id_seq CASCADE');
        $this->addSql('DROP TABLE page_seo');
    }
}
