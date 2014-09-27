CREATE TABLE [dbo].[HasGoal]
(
	[GoalId] INT NOT NULL , 
    [SyllabusId] INT NOT NULL, 
    CONSTRAINT [FK_HasGoal_Syllabus_SyllabusId] FOREIGN KEY (SyllabusId) REFERENCES [Syllabus](Id), 
    CONSTRAINT [PK_HasGoal] PRIMARY KEY (GoalId, SyllabusId), 
    CONSTRAINT [FK_HasGoal_CourseGoal_GoalId] FOREIGN KEY (GoalId) REFERENCES [CourseGoal](Id) 
)
