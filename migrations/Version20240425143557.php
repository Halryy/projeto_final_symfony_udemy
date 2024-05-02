<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240425143557 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product_image ADD image VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE product_image ADD img_updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL');
        $this->addSql('ALTER TABLE product_image ADD image_title VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE product_image ADD image_alt VARCHAR(255) DEFAULT NULL');
        $this->addSql('COMMENT ON COLUMN product_image.img_updated_at IS \'(DC2Type:datetime_immutable)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE product_image DROP image');
        $this->addSql('ALTER TABLE product_image DROP img_updated_at');
        $this->addSql('ALTER TABLE product_image DROP image_title');
        $this->addSql('ALTER TABLE product_image DROP image_alt');
    }
}
