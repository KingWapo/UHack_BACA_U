CREATE PROCEDURE [dbo].[GetCourseSyllabus]
	@CourseId int = -1
AS
	select c.Id,
		   c.Name,
		   c.Subject,
		   c.Description,
		   c.[Rank],
		   c.NumRanked,
		   s.Description,
		   s.Evaluation,
		   u.Name
	from Course as c
inner join Syllabus as s on s.CourseId = c.Id
inner join Users as u on u.Id = s.TeacherId
RETURN 0
