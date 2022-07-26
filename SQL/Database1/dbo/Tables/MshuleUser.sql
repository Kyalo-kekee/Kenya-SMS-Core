CREATE TABLE [dbo].[MshuleUser] (
    [id]             NVARCHAR (72)  NOT NULL,
    [username]       NVARCHAR (180) NOT NULL,
    [roles]          VARCHAR (MAX)  NULL,
    [password]       NVARCHAR (255) NOT NULL,
    [FirstName]      NVARCHAR (22)  NOT NULL,
    [MiddleName]     NVARCHAR (22)  NULL,
    [LastName]       NVARCHAR (22)  NULL,
    [EmployeeNumber] NVARCHAR (122) NOT NULL,
    [Salutation]     NVARCHAR (4)   NOT NULL,
    [IsEmployee]     BIT            NULL,
    [Designation]    NVARCHAR (100) NOT NULL,
    [Email]          NVARCHAR (255) NOT NULL,
    [isVerified]     BIT            NOT NULL,
    [CompanyID]      NVARCHAR (32)  NOT NULL,
    [BranchID]       NVARCHAR (32)  NOT NULL,
    PRIMARY KEY CLUSTERED ([id] ASC)
);


GO
CREATE UNIQUE NONCLUSTERED INDEX [UNIQ_DEBFCE83F85E0677]
    ON [dbo].[MshuleUser]([username] ASC) WHERE ([username] IS NOT NULL);


GO
EXECUTE sp_addextendedproperty @name = N'MS_Description', @value = N'(DC2Type:json)', @level0type = N'SCHEMA', @level0name = N'dbo', @level1type = N'TABLE', @level1name = N'MshuleUser', @level2type = N'COLUMN', @level2name = N'roles';

