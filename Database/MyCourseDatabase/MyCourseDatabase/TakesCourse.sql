CREATE TABLE [dbo].[TakesCourse]
(
	[CourseId] INT NOT NULL , 
    [UserId] INT NOT NULL, 
    CONSTRAINT [PK_TakesCourse] PRIMARY KEY (CourseId, UserId), 
    CONSTRAINT [FK_TakesCourse_Courses_CourseId] FOREIGN KEY (CourseId) REFERENCES [Course](Id), 
    CONSTRAINT [FK_TakesCourse_Users_UserId] FOREIGN KEY (UserId) REFERENCES [Users](Id), 
)
