CREATE TABLE [dbo].[StudentInformation] (
    [id]                         NVARCHAR (72)  NOT NULL,
    [FirstName]                  NVARCHAR (255) NOT NULL,
    [MiddleName]                 NVARCHAR (72)  NULL,
    [LastName]                   NVARCHAR (72)  NOT NULL,
    [EnrollDate]                 DATETIME2 (6)  NOT NULL,
    [GuardianName]               NVARCHAR (72)  NOT NULL,
    [GuardianPhoneNumber1]       NVARCHAR (15)  NOT NULL,
    [GuardianPhoneNumber2]       NVARCHAR (15)  NULL,
    [GuardianEmail]              NVARCHAR (255) NULL,
    [ImageUrl]                   NVARCHAR (255) NULL,
    [ImageSize]                  NVARCHAR (10)  NULL,
    [CertificateAttachment1]     NVARCHAR (255) NULL,
    [CertificateAttachment2]     NVARCHAR (255) NULL,
    [EntryMarks]                 NVARCHAR (10)  NULL,
    [EntryGrade]                 NVARCHAR (4)   NULL,
    [DOB]                        NVARCHAR (10)  NOT NULL,
    [UpdatedAt]                  DATETIME2 (6)  NULL,
    [StudentEmail]               NVARCHAR (100) NULL,
    [StudentHomeAddress]         VARCHAR (MAX)  NULL,
    [StudentGender]              NVARCHAR (32)  NULL,
    [StudentPhoneNumber]         NVARCHAR (13)  NULL,
    [CompanyID]                  NVARCHAR (32)  NOT NULL,
    [BranchID]                   NVARCHAR (32)  NOT NULL,
    [ClassRoomID_id]             NVARCHAR (72)  NOT NULL,
    [CertificateAttachmentSize]  NVARCHAR (255) NULL,
    [CertificateAttachmentSize2] NVARCHAR (255) NULL,
    PRIMARY KEY CLUSTERED ([id] ASC),
    CONSTRAINT [FK_7C3732FDF50DF059] FOREIGN KEY ([ClassRoomID_id]) REFERENCES [dbo].[SchoolClassRoomsHeader] ([id])
);


GO
CREATE NONCLUSTERED INDEX [IDX_7C3732FDF50DF059]
    ON [dbo].[StudentInformation]([ClassRoomID_id] ASC);


GO
EXECUTE sp_addextendedproperty @name = N'MS_Description', @value = N'(DC2Type:datetime_immutable)', @level0type = N'SCHEMA', @level0name = N'dbo', @level1type = N'TABLE', @level1name = N'StudentInformation', @level2type = N'COLUMN', @level2name = N'UpdatedAt';

