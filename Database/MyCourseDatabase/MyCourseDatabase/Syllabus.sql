CREATE TABLE [dbo].[Syllabus]
(
	[Id] INT NOT NULL PRIMARY KEY, 
    [CourseId] INT NOT NULL, 
    [TeacherId] INT NOT NULL, 
    [Description] VARCHAR(MAX) NULL, 
    [Evaluation] VARCHAR(MAX) NULL, 
    CONSTRAINT [FK_Syllabus_User_TeacherId] FOREIGN KEY (TeacherId) REFERENCES [Users](Id), 
    CONSTRAINT [FK_Syllabus_Course_CourseId] FOREIGN KEY (CourseId) REFERENCES Course(Id)
)
