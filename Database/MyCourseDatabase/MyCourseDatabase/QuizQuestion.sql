CREATE TABLE [dbo].[QuizQuestion]
(
	[Id] INT NOT NULL PRIMARY KEY, 
    [QuizId] INT NOT NULL, 
    [Question] VARCHAR(MAX) NOT NULL, 
    [Answer] VARCHAR(MAX) NOT NULL, 
    CONSTRAINT [FK_QuizQuestion_Quiz_QuizId] FOREIGN KEY (QuizId) REFERENCES [Quiz](Id)
)
