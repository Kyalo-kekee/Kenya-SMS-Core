<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220518075618 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE StudentInformation ADD ClassRoomID_id INT NOT NULL');
        $this->addSql('ALTER TABLE StudentInformation ADD CONSTRAINT FK_7C3732FDF50DF059 FOREIGN KEY (ClassRoomID_id) REFERENCES SchoolClassRoomsHeader (id)');
        $this->addSql('CREATE INDEX IDX_7C3732FDF50DF059 ON StudentInformation (ClassRoomID_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA db_accessadmin');
        $this->addSql('CREATE SCHEMA db_backupoperator');
        $this->addSql('CREATE SCHEMA db_datareader');
        $this->addSql('CREATE SCHEMA db_datawriter');
        $this->addSql('CREATE SCHEMA db_ddladmin');
        $this->addSql('CREATE SCHEMA db_denydatareader');
        $this->addSql('CREATE SCHEMA db_denydatawriter');
        $this->addSql('CREATE SCHEMA db_owner');
        $this->addSql('CREATE SCHEMA db_securityadmin');
        $this->addSql('CREATE SCHEMA dbo');
        $this->addSql('ALTER TABLE StudentInformation DROP CONSTRAINT FK_7C3732FDF50DF059');
        $this->addSql('DROP INDEX IDX_7C3732FDF50DF059 ON StudentInformation');
        $this->addSql('ALTER TABLE StudentInformation DROP COLUMN ClassRoomID_id');
    }
}
