
CREATE PROCEDURE CompaniesNextNumbers
	@CompanyID NVARCHAR(32),
	@BranchID NVARCHAR(32),
	@Entity NVARCHAR(72),
	@EntityID NVARCHAR(32) =NULL
AS

DECLARE @ErrorMessage NVARCHAR(200)
DECLARE @ServerName NVARCHAR(72)
--SELECT CONVERT(SYSNAME, SERVERPROPERTY('SERVERNAME'))
SELECT @ServerName = CONVERT(SYSNAME, SERVERPROPERTY('SERVERNAME'))


BEGIN
	-- SET NOCOUNT ON added to prevent extra result sets from
	-- interfering with SELECT statements.
	SET NOCOUNT ON;
BEGIN TRAN T1

DECLARE @NextID INT
DECLARE @NextNumber NVARCHAR(36)
DECLARE @Prefix NVARCHAR(36)

--then get the number;
	 select 
	  NextValueSlot as NextValueSlot ,
	  PrefixID + NextValueSlot +'/' + RIGHT(CAST(DATEPART(YEAR, GETDATE()) AS NVARCHAR(10)), 2) AS PrefixID
	  
	  from GetNextNumberIDS 
	  
	 WHERE 
		CompanyID = @CompanyID AND
		BranchID = @BranchID AND
		ObjectSignatureNamespace = @Entity

	SELECT 
		@EntityID = ISNULL(PrefixID, '') + NextValueSlot,
		@NextID = ISNULL(CAST(NextValueSlot AS INT), 0),
		@NextNumber = ISNULL(NextValueSlot, N'0')
	
	FROM 
		GetNextNumberIDS
	WHERE 
		CompanyID = @CompanyID AND
		BranchID = @BranchID AND
		ObjectSignatureNamespace = @Entity




	SET @NextID = @NextID + 1


	
UPDATE 
	GetNextNumberIDS
SET 
	NextValueSlot = CASE WHEN LEN(CAST(@NextID AS NVARCHAR)) < LEN(@NextNumber) THEN REPLICATE('0', LEN(@NextNumber) - LEN(CAST(@NextID AS NVARCHAR))) + CAST(@NextID AS NVARCHAR) ELSE CAST(@NextID AS NVARCHAR) END
WHERE 
	CompanyID = @CompanyID AND
	BranchID = @BranchID AND
	ObjectSignatureNamespace = @Entity

--An error occured, go to the error handler
IF @@ERROR <> 0
BEGIN
	SET @EntityID = N''
	SET @ErrorMessage = 'NextNumbers update failed'
	GOTO WriteError
END

--we add a prefix for all next numbers to bear the year, from 2014
IF LOWER(@Entity) NOT IN (N'nextqueueid', N'nextemployeenumber', N'nextpatientnumber')
	SET @EntityID = @EntityID + '/' + RIGHT(CAST(DATEPART(YEAR, GETDATE()) AS NVARCHAR(10)), 2)

--Everything is OK
COMMIT TRAN T1


RETURN 0

WriteError:
IF @@TRANCOUNT < 2
	ROLLBACK TRAN T1
ELSE
	COMMIT TRAN T1
-- The error handler

RETURN -1

END