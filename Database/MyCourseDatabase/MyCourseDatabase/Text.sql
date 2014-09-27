CREATE TABLE [dbo].[Text]
(
	[Id] INT NOT NULL PRIMARY KEY, 
    [Title] VARCHAR(50) NOT NULL, 
    [Author] VARCHAR(50) NULL, 
	[ISBN] VARCHAR(50) NULL,
	[Type] VARCHAR(50) NULL,
    [Required] BIT NULL, 
    [Link] VARCHAR(MAX) NULL
)
