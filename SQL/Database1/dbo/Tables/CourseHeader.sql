CREATE TABLE [dbo].[CourseHeader] (
    [id]             NVARCHAR (72)  NOT NULL,
    [CourseID]       NVARCHAR (10)  NOT NULL,
    [CourseName]     NVARCHAR (255) NOT NULL,
    [CourseDuration] NVARCHAR (255) NOT NULL,
    [CreatedAt]      DATETIME2 (6)  NOT NULL,
    [UpdatedAt]      DATETIME2 (6)  NOT NULL,
    [HasModules]     BIT            NULL,
    [CompanyID]      NVARCHAR (32)  NOT NULL,
    [BranchID]       NVARCHAR (32)  NOT NULL,
    PRIMARY KEY CLUSTERED ([id] ASC)
);


GO
EXECUTE sp_addextendedproperty @name = N'MS_Description', @value = N'(DC2Type:datetime_immutable)', @level0type = N'SCHEMA', @level0name = N'dbo', @level1type = N'TABLE', @level1name = N'CourseHeader', @level2type = N'COLUMN', @level2name = N'UpdatedAt';


GO
EXECUTE sp_addextendedproperty @name = N'MS_Description', @value = N'(DC2Type:datetime_immutable)', @level0type = N'SCHEMA', @level0name = N'dbo', @level1type = N'TABLE', @level1name = N'CourseHeader', @level2type = N'COLUMN', @level2name = N'CreatedAt';

