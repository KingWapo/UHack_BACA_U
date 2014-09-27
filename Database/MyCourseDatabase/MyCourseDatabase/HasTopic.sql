CREATE TABLE [dbo].[HasTopic]
(
	[TopicId] INT NOT NULL , 
    [SyllabusId] INT NOT NULL, 
    CONSTRAINT [PK_HasTopic] PRIMARY KEY (TopicId, SyllabusId), 
    CONSTRAINT [FK_HasTopic_CourseTopic_TopicId] FOREIGN KEY (TopicId) REFERENCES [CourseTopic](Id), 
    CONSTRAINT [FK_HasTopic_Syllabus_SyllabusId] FOREIGN KEY (SyllabusId) REFERENCES [Syllabus](Id)
)
