CREATE PROCEDURE [dbo].[GetAllClasses]
AS
	select c.Id,
		   c.Name,
		   c.Subject,
		   c.Description,
		   c.[Rank],
		   c.NumRanked
	from Course as c
	order by c.Name
RETURN 0
