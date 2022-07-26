CREATE TABLE [dbo].[CourseModuleHeader] (
    [id]          NVARCHAR (72)  NOT NULL,
    [ModuleID]    NVARCHAR (10)  NOT NULL,
    [ModuleName]  NVARCHAR (255) NOT NULL,
    [CreatedAt]   DATETIME2 (6)  NOT NULL,
    [UpdatedAt]   DATETIME2 (6)  NULL,
    [CreatedBy]   NVARCHAR (255) NOT NULL,
    [CompanyID]   NVARCHAR (32)  NOT NULL,
    [BranchID]    NVARCHAR (32)  NOT NULL,
    [CourseId_id] NVARCHAR (72)  NOT NULL,
    PRIMARY KEY CLUSTERED ([id] ASC),
    CONSTRAINT [FK_854ED0E7AD9E9399] FOREIGN KEY ([CourseId_id]) REFERENCES [dbo].[CourseHeader] ([id])
);


GO
CREATE NONCLUSTERED INDEX [IDX_854ED0E7AD9E9399]
    ON [dbo].[CourseModuleHeader]([CourseId_id] ASC);


GO
EXECUTE sp_addextendedproperty @name = N'MS_Description', @value = N'(DC2Type:datetime_immutable)', @level0type = N'SCHEMA', @level0name = N'dbo', @level1type = N'TABLE', @level1name = N'CourseModuleHeader', @level2type = N'COLUMN', @level2name = N'UpdatedAt';


GO
EXECUTE sp_addextendedproperty @name = N'MS_Description', @value = N'(DC2Type:datetime_immutable)', @level0type = N'SCHEMA', @level0name = N'dbo', @level1type = N'TABLE', @level1name = N'CourseModuleHeader', @level2type = N'COLUMN', @level2name = N'CreatedAt';

