<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240520171238 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE log ALTER id DROP DEFAULT');
        $this->addSql('ALTER TABLE log ALTER date_time TYPE TIMESTAMP(0) WITHOUT TIME ZONE');
        $this->addSql('COMMENT ON COLUMN log.date_time IS NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE SEQUENCE log_id_seq');
        $this->addSql('SELECT setval(\'log_id_seq\', (SELECT MAX(id) FROM log))');
        $this->addSql('ALTER TABLE log ALTER id SET DEFAULT nextval(\'log_id_seq\')');
        $this->addSql('ALTER TABLE log ALTER date_time TYPE TIMESTAMP(0) WITHOUT TIME ZONE');
        $this->addSql('COMMENT ON COLUMN log.date_time IS \'(DC2Type:datetime_immutable)\'');
    }
}
