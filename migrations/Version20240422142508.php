<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240422142508 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE product_property_value_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE product_property_value (id INT NOT NULL, product_id INT DEFAULT NULL, product_property_id INT DEFAULT NULL, value VARCHAR(255) DEFAULT NULL, language INT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_880DE7154584665A ON product_property_value (product_id)');
        $this->addSql('CREATE INDEX IDX_880DE715F8BD8DF3 ON product_property_value (product_property_id)');
        $this->addSql('ALTER TABLE product_property_value ADD CONSTRAINT FK_880DE7154584665A FOREIGN KEY (product_id) REFERENCES product (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE product_property_value ADD CONSTRAINT FK_880DE715F8BD8DF3 FOREIGN KEY (product_property_id) REFERENCES product_property (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE product_property_value_id_seq CASCADE');
        $this->addSql('ALTER TABLE product_property_value DROP CONSTRAINT FK_880DE7154584665A');
        $this->addSql('ALTER TABLE product_property_value DROP CONSTRAINT FK_880DE715F8BD8DF3');
        $this->addSql('DROP TABLE product_property_value');
    }
}
