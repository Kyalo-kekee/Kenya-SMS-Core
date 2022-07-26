CREATE TABLE [dbo].[GetNextNumberIDS] (
    [id]                       NVARCHAR (72)  NOT NULL,
    [ObjectSignatureNamespace] NVARCHAR (255) NOT NULL,
    [PrefixID]                 NVARCHAR (32)  NOT NULL,
    [NextValueSlot]            NVARCHAR (100) NOT NULL,
    [UpdatedAt]                DATETIME2 (6)  NULL,
    [CompanyID]                NVARCHAR (32)  NOT NULL,
    [BranchID]                 NVARCHAR (32)  NOT NULL,
    PRIMARY KEY CLUSTERED ([id] ASC)
);


GO
CREATE UNIQUE NONCLUSTERED INDEX [UNIQ_25FAFA84B09300CF]
    ON [dbo].[GetNextNumberIDS]([ObjectSignatureNamespace] ASC) WHERE ([ObjectSignatureNamespace] IS NOT NULL);


GO
EXECUTE sp_addextendedproperty @name = N'MS_Description', @value = N'(DC2Type:datetime_immutable)', @level0type = N'SCHEMA', @level0name = N'dbo', @level1type = N'TABLE', @level1name = N'GetNextNumberIDS', @level2type = N'COLUMN', @level2name = N'UpdatedAt';

