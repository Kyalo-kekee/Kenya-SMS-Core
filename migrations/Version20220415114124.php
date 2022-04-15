<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220415114124 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ClassHeader (id INT IDENTITY NOT NULL, ClassName NVARCHAR(255) NOT NULL, MaximumStudentCapacity INT NOT NULL, MinimumStudentCapacity INT NOT NULL, HasStreams BIT, ClassTeacher NVARCHAR(255), PRIMARY KEY (id))');
        $this->addSql('CREATE TABLE ClassHeaderDetails (id INT IDENTITY NOT NULL, ClassID NVARCHAR(255) NOT NULL, SectionID NVARCHAR(255) NOT NULL, MaxStudents INT NOT NULL, MinStudents INT NOT NULL, ClassPrefect NVARCHAR(255) NOT NULL, PRIMARY KEY (id))');
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
        $this->addSql('DROP TABLE ClassHeader');
        $this->addSql('DROP TABLE ClassHeaderDetails');
    }
}
