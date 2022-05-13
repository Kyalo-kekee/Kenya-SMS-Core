<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220513092241 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ClassHeader (id INT IDENTITY NOT NULL, ClassName NVARCHAR(255) NOT NULL, MaximumStudentCapacity INT NOT NULL, MinimumStudentCapacity INT NOT NULL, HasStreams BIT, ClassTeacher NVARCHAR(255), PRIMARY KEY (id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_83ADEF8A4702329D ON ClassHeader (ClassName) WHERE ClassName IS NOT NULL');
        $this->addSql('CREATE TABLE ClassHeaderDetails (id INT IDENTITY NOT NULL, ClassID NVARCHAR(255) NOT NULL, SectionID NVARCHAR(255) NOT NULL, MaxStudents INT NOT NULL, MinStudents INT NOT NULL, ClassPrefect NVARCHAR(255), PRIMARY KEY (id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1B46C0FFA14BBEB ON ClassHeaderDetails (SectionID) WHERE SectionID IS NOT NULL');
        $this->addSql('CREATE TABLE CompaniesNextNumbers (id INT IDENTITY NOT NULL, CompaniesNextNumbers NVARCHAR(100) NOT NULL, Prefix NVARCHAR(5) NOT NULL, NextNumberValue NVARCHAR(10) NOT NULL, EntityClass NVARCHAR(255) NOT NULL, PRIMARY KEY (id))');
        $this->addSql('CREATE TABLE MshuleUser (id INT IDENTITY NOT NULL, username NVARCHAR(180) NOT NULL, roles VARCHAR(MAX), password NVARCHAR(255) NOT NULL, FirstName NVARCHAR(22) NOT NULL, MiddleName NVARCHAR(22), LastName NVARCHAR(22), EmployeeNumber NVARCHAR(122) NOT NULL, Salutation NVARCHAR(4) NOT NULL, IsEmployee BIT, Designation NVARCHAR(100) NOT NULL, Email NVARCHAR(255) NOT NULL, isVerified BIT NOT NULL, PRIMARY KEY (id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_DEBFCE83F85E0677 ON MshuleUser (username) WHERE username IS NOT NULL');
        $this->addSql('EXEC sp_addextendedproperty N\'MS_Description\', N\'(DC2Type:json)\', N\'SCHEMA\', \'dbo\', N\'TABLE\', \'MshuleUser\', N\'COLUMN\', roles');
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
        $this->addSql('DROP TABLE CompaniesNextNumbers');
        $this->addSql('DROP TABLE MshuleUser');
    }
}
