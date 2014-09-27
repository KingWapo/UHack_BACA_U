CREATE TABLE [dbo].[Grading]
(
	[Id] INT NOT NULL PRIMARY KEY, 
	[SyllabusId] INT NOT NULL,
    [Name] VARCHAR(50) NOT NULL, 
    [OverallPercent] INT NULL, 
    [Description] VARCHAR(MAX) NULL, 
    CONSTRAINT [FK_Grading_Syllabus_SyllabusId] FOREIGN KEY (SyllabusId) REFERENCES Syllabus(Id)
)
