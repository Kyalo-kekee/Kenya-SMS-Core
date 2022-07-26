CREATE TABLE [dbo].[studentinformation_courseheader] (
    [studentinformation_id] NVARCHAR (72) NOT NULL,
    [courseheader_id]       NVARCHAR (72) NOT NULL,
    PRIMARY KEY CLUSTERED ([studentinformation_id] ASC, [courseheader_id] ASC),
    CONSTRAINT [FK_E66469F8A98D37EE] FOREIGN KEY ([courseheader_id]) REFERENCES [dbo].[CourseHeader] ([id]) ON DELETE CASCADE,
    CONSTRAINT [FK_E66469F8D43C89B1] FOREIGN KEY ([studentinformation_id]) REFERENCES [dbo].[StudentInformation] ([id]) ON DELETE CASCADE
);


GO
CREATE NONCLUSTERED INDEX [IDX_E66469F8A98D37EE]
    ON [dbo].[studentinformation_courseheader]([courseheader_id] ASC);


GO
CREATE NONCLUSTERED INDEX [IDX_E66469F8D43C89B1]
    ON [dbo].[studentinformation_courseheader]([studentinformation_id] ASC);

