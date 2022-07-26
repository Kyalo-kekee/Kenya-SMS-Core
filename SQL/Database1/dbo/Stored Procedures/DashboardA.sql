-- =============================================
-- Author:		<Author,,Name>
-- Create date: <Create Date,,>
-- Description:	<Description,,>
-- =============================================
CREATE PROCEDURE [dbo].[DashboardA](
	-- Add the parameters for the stored procedure here
		@SchoolID nvarchar(10)
	)

AS
BEGIN
	-- SET NOCOUNT ON added to prevent extra result sets from
	-- interfering with SELECT statements.
	SET NOCOUNT ON;
    SELECT  CO.Name, CO.WebsiteURl,CO.City,CO.State ,CO.NoOfLevels
	 FROM InstitutionSetup AS CO
	 
	 JOIN StudentInformation AS SI ON  CO.CompanyID = SI.CompanyID
END