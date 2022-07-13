USE [SMS_CLIENT]
GO

EXEC sys.sp_dropextendedproperty @name=N'MS_Description' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'GetNextNumberIDS', @level2type=N'COLUMN',@level2name=N'UpdatedAt'

GO

/****** Object:  Table [dbo].[GetNextNumberIDS]    Script Date: 7/12/2022 1:09:18 PM ******/
DROP TABLE [dbo].[GetNextNumberIDS]
    GO

/****** Object:  Table [dbo].[GetNextNumberIDS]    Script Date: 7/12/2022 1:09:18 PM ******/
    SET ANSI_NULLS ON
    GO

    SET QUOTED_IDENTIFIER ON
    GO


CREATE TABLE [dbo].[GetNextNumberIDS](
    [id] [int] IDENTITY(1,1) NOT NULL,
    [ObjectSignatureNamespace] [nvarchar](255) NOT NULL,
    [PrefixID] [nvarchar](10) NOT NULL,
    [StartValue] [int] NULL,
    [NextValueSlot] [int] NULL,
    [ToForceRandomIdGeneration] [bit] NULL,
    [UpdatedAt] [datetime2](6) NULL,
    PRIMARY KEY CLUSTERED
(
[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
    ) ON [PRIMARY]

    GO

    SET IDENTITY_INSERT [dbo].[GetNextNumberIDS] ON
    GO

    EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'(DC2Type:datetime_immutable)' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'GetNextNumberIDS', @level2type=N'COLUMN',@level2name=N'UpdatedAt'
    GO

