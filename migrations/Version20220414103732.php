<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220414103732 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE InstitutionSetup (Id NVARCHAR(255) NOT NULL, IDInitials NVARCHAR(22) NOT NULL, Name NVARCHAR(255) NOT NULL, CellPhone1 NVARCHAR(13) NOT NULL, CellPhone2 NVARCHAR(13), Email NVARCHAR(255), WebsiteURl NVARCHAR(255), LogoURL NVARCHAR(255), NoOfLevels INT NOT NULL, NoOfStreamsPerLevel INT NOT NULL, Zip NVARCHAR(10), City NVARCHAR(10), State NVARCHAR(10), PRIMARY KEY (Id))');
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
        $this->addSql('DROP TABLE InstitutionSetup');
    }
}
