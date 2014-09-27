CREATE TABLE [dbo].[Assignment]
(
	[Id] INT NOT NULL PRIMARY KEY, 
    [CourseId] INT NOT NULL, 
    [Name] VARCHAR(50) NOT NULL, 
    [Description] VARCHAR(MAX) NULL, 
    [Due] DATE NULL, 
    [Completed] BIT NULL, 
    CONSTRAINT [FK_Assignment_Course_CourseId] FOREIGN KEY ([CourseId]) REFERENCES [Course](Id)
)
