CREATE TABLE [dbo].[InstitutionSetup] (
    [id]                  NVARCHAR (72)  NOT NULL,
    [IDInitials]          NVARCHAR (22)  NOT NULL,
    [Name]                NVARCHAR (255) NOT NULL,
    [CellPhone1]          NVARCHAR (13)  NOT NULL,
    [CellPhone2]          NVARCHAR (13)  NULL,
    [Email]               NVARCHAR (255) NULL,
    [WebsiteURl]          NVARCHAR (255) NULL,
    [LogoURL]             NVARCHAR (255) NULL,
    [NoOfLevels]          INT            NOT NULL,
    [NoOfStreamsPerLevel] INT            NOT NULL,
    [Zip]                 NVARCHAR (10)  NULL,
    [City]                NVARCHAR (10)  NULL,
    [State]               NVARCHAR (10)  NULL,
    [CompanyID]           NVARCHAR (32)  NOT NULL,
    [BranchID]            NVARCHAR (32)  NOT NULL,
    PRIMARY KEY CLUSTERED ([id] ASC)
);

