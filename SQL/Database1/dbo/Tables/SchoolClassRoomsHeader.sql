CREATE TABLE [dbo].[SchoolClassRoomsHeader] (
    [id]                    NVARCHAR (72) NOT NULL,
    [MaxCapacity]           INT           NOT NULL,
    [SectionName]           NVARCHAR (72) NOT NULL,
    [HasBothGenders]        BIT           NULL,
    [TotalNumberOfStudents] INT           NULL,
    [CompanyID]             NVARCHAR (32) NOT NULL,
    [BranchID]              NVARCHAR (32) NOT NULL,
    [ClassID_id]            NVARCHAR (72) NOT NULL,
    PRIMARY KEY CLUSTERED ([id] ASC),
    CONSTRAINT [FK_F89632DB8B25AE9] FOREIGN KEY ([ClassID_id]) REFERENCES [dbo].[SchoolClassHeader] ([id])
);


GO
CREATE NONCLUSTERED INDEX [IDX_F89632DB8B25AE9]
    ON [dbo].[SchoolClassRoomsHeader]([ClassID_id] ASC);


GO
CREATE UNIQUE NONCLUSTERED INDEX [UNIQ_F89632DEE3A9447]
    ON [dbo].[SchoolClassRoomsHeader]([SectionName] ASC) WHERE ([SectionName] IS NOT NULL);

