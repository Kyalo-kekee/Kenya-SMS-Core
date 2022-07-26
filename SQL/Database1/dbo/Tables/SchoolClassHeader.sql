CREATE TABLE [dbo].[SchoolClassHeader] (
    [id]                 NVARCHAR (72)  NOT NULL,
    [ClassName]          NVARCHAR (72)  NOT NULL,
    [LevelID]            NVARCHAR (4)   NOT NULL,
    [NumberOfClassRooms] INT            NULL,
    [ClassColorID]       NVARCHAR (10)  NULL,
    [Remarks]            NVARCHAR (255) NULL,
    [CreatedBy]          NVARCHAR (72)  NOT NULL,
    [Status]             SMALLINT       NOT NULL,
    [CompanyID]          NVARCHAR (32)  NOT NULL,
    [BranchID]           NVARCHAR (32)  NOT NULL,
    PRIMARY KEY CLUSTERED ([id] ASC)
);


GO
CREATE UNIQUE NONCLUSTERED INDEX [UNIQ_7BE4ADFA2D530F45]
    ON [dbo].[SchoolClassHeader]([LevelID] ASC) WHERE ([LevelID] IS NOT NULL);


GO
CREATE UNIQUE NONCLUSTERED INDEX [UNIQ_7BE4ADFA4702329D]
    ON [dbo].[SchoolClassHeader]([ClassName] ASC) WHERE ([ClassName] IS NOT NULL);

