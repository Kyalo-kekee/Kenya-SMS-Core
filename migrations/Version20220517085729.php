<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220517085729 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE SchoolClassHeader (id INT IDENTITY NOT NULL, ClassName NVARCHAR(72) NOT NULL, LevelID NVARCHAR(4) NOT NULL, NumberOfClassRooms INT, ClassColorID NVARCHAR(10), Remarks NVARCHAR(255), CreatedBy NVARCHAR(72) NOT NULL, Status SMALLINT NOT NULL, PRIMARY KEY (id))');
        $this->addSql('CREATE TABLE SchoolClassRoomsHeader (id INT IDENTITY NOT NULL, MaxCapacity INT NOT NULL, SectionName NVARCHAR(72) NOT NULL, HasBothGenders BIT, ClassID_id INT NOT NULL, PRIMARY KEY (id))');
        $this->addSql('CREATE INDEX IDX_F89632DB8B25AE9 ON SchoolClassRoomsHeader (ClassID_id)');
        $this->addSql('CREATE TABLE StudentInformation (id INT IDENTITY NOT NULL, FirstName NVARCHAR(255) NOT NULL, MiddleName NVARCHAR(72), LastName NVARCHAR(72) NOT NULL, EnrollDate DATETIME2(6) NOT NULL, GuardianName NVARCHAR(72) NOT NULL, GuardianPhoneNumber1 NVARCHAR(15) NOT NULL, GuardianPhoneNumber2 NVARCHAR(15), GuardianEmail NVARCHAR(255), ImageUrl NVARCHAR(255), ImageSize NVARCHAR(10), CertificateAttachment1 NVARCHAR(255) NOT NULL, CertificateAttachment2 NVARCHAR(255), EntryMarks NVARCHAR(10), EntryGrade NVARCHAR(4), DOB NVARCHAR(10) NOT NULL, PRIMARY KEY (id))');
        $this->addSql('ALTER TABLE SchoolClassRoomsHeader ADD CONSTRAINT FK_F89632DB8B25AE9 FOREIGN KEY (ClassID_id) REFERENCES SchoolClassHeader (id)');
        $this->addSql('DROP TABLE ClassHeader');
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
        $this->addSql('ALTER TABLE SchoolClassRoomsHeader DROP CONSTRAINT FK_F89632DB8B25AE9');
        $this->addSql('CREATE TABLE ClassHeader (id INT IDENTITY NOT NULL, ClassName NVARCHAR(255) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL, MaximumStudentCapacity INT NOT NULL, MinimumStudentCapacity INT NOT NULL, HasStreams BIT, ClassTeacher NVARCHAR(255) COLLATE SQL_Latin1_General_CP1_CI_AS, PRIMARY KEY (id))');
        $this->addSql('CREATE UNIQUE NONCLUSTERED INDEX UNIQ_83ADEF8A4702329D ON ClassHeader (ClassName) WHERE ClassName IS NOT NULL');
        $this->addSql('DROP TABLE SchoolClassHeader');
        $this->addSql('DROP TABLE SchoolClassRoomsHeader');
        $this->addSql('DROP TABLE StudentInformation');
    }
}
