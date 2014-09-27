CREATE TABLE [dbo].[Course]
(
	[Id] INT NOT NULL PRIMARY KEY, 
    [Name] VARCHAR(50) NOT NULL, 
	[Subject] VARCHAR(50) NOT NULL,
    [Description] VARCHAR(MAX) NULL, 
    [Rank] FLOAT NOT NULL DEFAULT 0, 
    [NumRanked] INT NOT NULL DEFAULT 0
)