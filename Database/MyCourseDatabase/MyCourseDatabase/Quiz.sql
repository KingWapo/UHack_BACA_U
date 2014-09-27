CREATE TABLE [dbo].[Quiz]
(
	[Id] INT NOT NULL PRIMARY KEY, 
    [CourseId] INT NOT NULL, 
    [Name] VARCHAR(50) NOT NULL, 
    [Description] VARCHAR(MAX) NULL, 
    CONSTRAINT [FK_Quiz_Course_CourseId] FOREIGN KEY ([CourseId]) REFERENCES Course(Id)
)
