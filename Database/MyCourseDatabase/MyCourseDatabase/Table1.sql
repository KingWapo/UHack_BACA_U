﻿CREATE TABLE [dbo].[Users]
(
	[Id] INT NOT NULL PRIMARY KEY, 
    [Name] VARCHAR(50) NOT NULL, 
    [Email] VARCHAR(MAX) NOT NULL, 
    [Password] VARCHAR(MAX) NOT NULL
)