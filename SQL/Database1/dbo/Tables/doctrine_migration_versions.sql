CREATE TABLE [dbo].[doctrine_migration_versions] (
    [version]        NVARCHAR (191) NOT NULL,
    [executed_at]    DATETIME2 (6)  NULL,
    [execution_time] INT            NULL,
    PRIMARY KEY CLUSTERED ([version] ASC)
);

