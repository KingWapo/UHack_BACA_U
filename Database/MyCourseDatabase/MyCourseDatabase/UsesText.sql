CREATE TABLE [dbo].[UsesText]
(
	[TextId] INT NOT NULL , 
    [SyllabusId] INT NOT NULL, 
    CONSTRAINT [PK_UsesText] PRIMARY KEY (TextId, SyllabusId), 
    CONSTRAINT [FK_UsesText_Text_TextId] FOREIGN KEY (TextId) REFERENCES [Text](Id), 
    CONSTRAINT [FK_UsesText_Syllabus_SyllabusId] FOREIGN KEY (SyllabusId) REFERENCES [Syllabus](Id)
)
