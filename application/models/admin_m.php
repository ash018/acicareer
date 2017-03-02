<?php

class Admin_m extends CI_Model {
    
    function validate_admin() {
        //AND Password = '$password'
        $user_id = $this->input->post('EmpCode');
        $password = $this->input->post('Password');
        $sql = "SELECT * FROM UserManager WHERE EmpCode = '$user_id' "; 
        $query = $this->db->query($sql);
        $return = $query->result_array();
            
        if ($return[0]['Password'] == $password) {
            $sql = "SELECT * FROM UserManager WHERE EmpCode = '$user_id' AND Password = '$password'"; 
            $query = $this->db->query($sql);
            return $query->result();
        } else {
            return false;
        }
    }
    
	function selectAllResumeSearch(){
		$sql = "SELECT T1.*, T2.* FROM UserInfo T1 
		INNER JOIN AppliedJob T2 ON T1.Id = T2.UserId
		WHERE NOT EXISTS 
		(SELECT * FROM ShortList sl 
			WHERE sl.UserId = T2.UserId AND sl.PostId = T2.PostId)
			AND
			NOT EXISTS 
		(SELECT * FROM Recommendation sl 
			WHERE sl.UserId = T2.UserId AND sl.PostId = T2.PostId)";
		$query = $this->db->query($sql);
        $query = $query->result_array();  
        $query->free_result();                            
        
        return $query;
	}
	
    function selectAllResume($UserName, $JobTitel, $JobLocation, $AgeFrom, $AgeTo, $Gender, $JobLevel,$ExpectedSalaryFrom,
        $ExpectedSalaryTo,$MinimumEducationLevel, $DegreeName, $MajorSubject, $Result, $InstituteName,
        $ExperienceFrom, $ExperienceTo, $CompanyName, $page = 1) {
        //$sql = "Select T1.*, T1.Id AS UserId, T2.*, T3.* From UserInfo T1 Left Join AppliedJob T2 ON T1.id = T2.UserId left Join JobPost T3 ON T2.PostId = T3.PostId";
        $sql = "EXEC usp_cvFilter '$UserName','$JobTitel','$JobLocation','$AgeFrom','$AgeTo','$Gender','$JobLevel','$ExpectedSalaryFrom',$ExpectedSalaryTo, 
            '$MinimumEducationLevel','$DegreeName','$MajorSubject','$Result','$InstituteName',
            '$ExperienceFrom', '$ExperienceTo', '$CompanyName', '$page' "; 
			
        $query = $this->db->query($sql);
		$data = array();
		if ($query) {
			$data['AllResume'] = $query->result_array();
			$data['shortlist'] = $query->next_result();
            $data['paging'] = $query->next_result();
            $query->free_result();
            return $data;
        } 
		$query->free_result();
        return $data;		
    }
    
    function SelectRecommendationSearch($Recommondation = '%', $page = 1) {
        //$sql = "Select T1.*, T1.Id AS UserId, T2.*, T3.* From UserInfo T1 Left Join AppliedJob T2 ON T1.id = T2.UserId left Join JobPost T3 ON T2.PostId = T3.PostId";
        $sql = "usp_searchCvRecommendation '$Recommondation', $page ";
        $query = $this->db->query($sql);
        $data['content'] = $query->result_array();
        $data['paging'] = $query->next_result();                                     
        
        return $data;    
    }
    
    function usp_searchInternship($universityname = '%',$grade= '%',$fromMonth= '%',$toMonth = '%', $page = 1) {
        //$sql = "Select T1.*, T1.Id AS UserId, T2.*, T3.* From UserInfo T1 Left Join AppliedJob T2 ON T1.id = T2.UserId left Join JobPost T3 ON T2.PostId = T3.PostId";
        $sql = "usp_searchInternship '$universityname','$grade','$fromMonth','$toMonth','$page' ";
        $query = $this->db->query($sql);
        $data['content'] = $query->result_array();
        $data['paging'] = $query->next_result();   
        //$query = $query->result_array();                                     
        
        return $data;    
    }
    
    function CompanyName(){
        //$sql = "Select T1.*, T1.Id AS UserId, T2.*, T3.* From UserInfo T1 Left Join AppliedJob T2 ON T1.id = T2.UserId left Join JobPost T3 ON T2.PostId = T3.PostId";
        $sql = "SELECT DISTINCT CompanyName FROM Experience Where CompanyName <>''";
        $query = $this->db->query($sql);
        if ($query) {
            return $query->result_array();
        } else {
            return false;
        }    
    }
    
	function UniversityName(){        
        //$sql = "Exec sp_UserIdWiseUniversityName";
		$sql = "Select Distinct InstituteName from Education";
        $query = $this->db->query($sql);
        if ($query) {
            return $query->result_array();
        } else {
            return false;
        }    
    }
	function JobTitle(){        
        //$sql = "Exec sp_UserIdWiseUniversityName";
		$sql = "Select Distinct JobTitel from JobPost";
        $query = $this->db->query($sql);
        if ($query) {
            return $query->result_array();
        } else {
            return false;
        }    
    }
    function userinfo($empcode){
        //$sql = "Select T1.*, T1.Id AS UserId, T2.*, T3.* From UserInfo T1 Left Join AppliedJob T2 ON T1.id = T2.UserId left Join JobPost T3 ON T2.PostId = T3.PostId";
        $sql = "SELECT * FROM UserManager WHERE EmpCode = '$empcode'";
        $query = $this->db->query($sql);
        if ($query) {
            return $query->result_array();
        } else {
            return false;
        }    
    }
    
    function updateuserinfophoto($fileName,$empcode){
        //$sql = "Select T1.*, T1.Id AS UserId, T2.*, T3.* From UserInfo T1 Left Join AppliedJob T2 ON T1.id = T2.UserId left Join JobPost T3 ON T2.PostId = T3.PostId";
        $sql = " UPDATE UserManager SET UserPhoto = '$fileName' WHERE EmpCode = '$empcode' ";
        $query = $this->db->query($sql);
        return true;    
    }
    
    function updateuserinfo($username,$designation,$empcode){
        //$sql = "Select T1.*, T1.Id AS UserId, T2.*, T3.* From UserInfo T1 Left Join AppliedJob T2 ON T1.id = T2.UserId left Join JobPost T3 ON T2.PostId = T3.PostId";
        $sql = " UPDATE UserManager SET UserName = '$username' , UserDesignation = '$designation' WHERE EmpCode = '$empcode' ";
        $query = $this->db->query($sql);
        return true;    
    }
	
	function selectShortlistRecommendation($data) {
          
          $column = '';
          if(empty($data['UserName'])){
              $column .= '';
          }else{
              $column .= 'T1.UserName,';
          }
          if(empty($data['Gender'])){
              $column .= '';
          }else{
              $column .= 'T1.Gender,';
          }
          if(empty($data['JobTitel'])){
              $column .= '';
          }else{
              $column .= 'T3.JobTitel,';
          }
          if(empty($data['ExpectedSalary'])){
              $column .= '';
          }else{
              $column .= 'T2.ExpectedSalary,';
          }
          if(empty($data['Mobile'])){
              $column .= '';
          }else{
              $column .= 'T1.Mobile,';
          }
           if(empty($data['Email'])){
              $column .= '';
          }else{
              $column .= 'T1.Email,';
          }
          //$col = substr($column, 0, -1);
          //echo '<pre/>'; echo substr($column, 0, -1); exit(); 
          $sql = "  SELECT $column T1.Id, T4.ShortListId FROM UserInfo T1 
                        INNER JOIN AppliedJob T2 ON T1.Id = T2.UserId
                        INNER JOIN JobPost T3 ON T2.PostId = T3.PostId
                        LEFT JOIN ShortList T4 ON T2.UserId = T4.UserId and T2.PostId = T4.PostId
                        LEFT JOIN Recommendation T5 ON T5.UserId = T4.UserId and T5.PostId = T4.PostId
                    WHERE EXISTS (
                        SELECT * FROM ShortList sl 
                        WHERE sl.UserId = T2.UserId AND sl.PostId = T2.PostId
                    ) OR

                    EXISTS(
                        SELECT * FROM Recommendation rr
                            WHERE rr.UserId = T2.UserId AND rr.PostId = T2.PostId
                    )
				";

        $query = $this->db->query($sql);
        if ($query) {
            return $query->result_array();
        } else {
            return false;
        }
    }
	
    function selectAppliedResume(){
        $sql = "Select T1.*, T1.Id AS UserId, T2.*, T3.* From UserInfo T1 inner Join AppliedJob T2 ON T1.id = T2.UserId inner Join JobPost T3 ON T2.PostId = T3.PostId";
        $query = $this->db->query($sql);
        if ($query) {
            return $query->result_array();
        } else {
            return false;
        }    
    }
	
    function selectResumeDetails($UserId){
        $sql = "Select * From UserInfo Where Id = '$UserId'";
        $query = $this->db->query($sql); 
        $query = $query->result_array();
        foreach ($query as $key => $value) {
            $sql2 = "SELECT T1.*, T2.* FROM Education T1 Inner Join LEducationLevel T2 ON T1.EducationLevel = T2.Id WHERE UserId = '".$value['Id']."'";
            $query2 = $this->db->query($sql2); 
            $query2 = $query2->result_array();
            $query[$key]['Education'] = $query2;
            $sql3 = "SELECT * FROM Training WHERE UserId = '".$value['Id']."'";
            $query3 = $this->db->query($sql3); 
            $query3 = $query3->result_array();
            $query[$key]['Training'] = $query3;
            $sql4 = "SELECT * FROM Experience WHERE UserId = '".$value['Id']."'";
            $query4 = $this->db->query($sql4); 
            $query4 = $query4->result_array();
            $query[$key]['Experience'] = $query4;
        }
        return $query;
    }
    
    public function InsertETicket($data, $table) {
         $ECategoryId = $data['ECategoryId'];
         $ESubCategory = $data['ESubCategoryId'];
         $DepartmentId = $data['DeptCode'];
         $subject = $data['Subject'];
         $details = $data['Details'];
         $EmpCode = $data['EntryBy'];      
           
        $sql = " INSERT INTO ETicketing VALUES ('$ECategoryId','$ESubCategory','$DepartmentId','$subject','$details','$EmpCode',getdate())"; 
        $query = $this->db->query($sql);
        return true;
    }
    
    public function INSERTJobPost($data) {
       
        $EmpCode = $this->session->userdata("EmpCode");   
        $sql = " 
        INSERT INTO [dbo].[JobPost]
        ([DepartmentId],[JobCategoryId],[JobTitel],[Vacancy],[JobDescription],[JobNatureId],
            [EducationalRequirements],[FunctionalRequirements],[BehavioralRequirements],[JobRequirements],
            [JobLevelId],[Salary],[JobLocation],[OtherBenefits],[ApplicationDeadline],[Experience],[EntryBy],
            [EntryDate],[EditedBy],[EditedDate])     
        VALUES('".$data['Department']."', '".$data['JobCategory']."', '".$data['JobTitel']."', '".$data['Vacancy']."', 
        '".$data['JobDescription']."', '".$data['JobNature']."', '".$data['EducationalRequirements']."', 
        '".$data['FunctionalRequirements']."', '".$data['BehavioralRequirements']."', '".$data['JobRequirements']."', 
        '".$data['JobLevel']."', '".$data['Salary']."', '".$data['JobLocation']."', '".$data['OtherBenefits']."', 
        '".$data['ApplicationDeadline']."','".$data['Experience']."','$EmpCode',getdate(),'','')
        ";                     
        $query = $this->db->query($sql);
        return true;
    }
    
    public function joblists(){
        $sql = "SELECT T1.*, T2.* FROM JobPost T1 Inner Join LDepartment T2 ON T1.DepartmentId = T2.DepartmentId Order By T1.ApplicationDeadline DESC";
        $query = $this->db->query($sql);
        if ($query) {
            return $query->result_array();
        } else {
            return false;
        }    
    }
	function current_vacancy() {
        $sql = "Select Count(T1.DepartmentId) AS CC, T1.DepartmentId, T2.DepartmentName From JobPost T1
				Inner Join LDepartment T2 ON T1.DepartmentId = T2.DepartmentId
				Group By T1.DepartmentId, T2.DepartmentName";
        $query = $this->db->query($sql);
        $query = $query->result_array();
        return $query;
    }
	
    
    public function fiendJob($jobId){
        $sql = "SELECT * FROM JobPost WHERE PostId = '$jobId'";
        $query = $this->db->query($sql);
        if ($query) {
            return $query->row();
        } else {
            return false;
        } 
        
    }
    
    public function findPassword($EmailId){
        $sql = "SELECT * FROM [CvHub].[dbo].[UserManager] Where EmpCode = '$EmailId'";
        $query = $this->db->query($sql);
        if ($query) {
            return $query->result_array();
        } else {
            return false;
        } 
        
    }
    
    public function updateJob($data){
              
        $sql = "UPDATE JobPost
                SET DepartmentId = '".$data['Department']."' 
                   ,JobCategoryId ='".$data['JobCategory']."' 
                   ,[JobTitel] = '".$data['JobTitel']."' 
                   ,[Vacancy] = '".$data['Vacancy']."' 
                   ,[JobDescription] = '".$data['JobDescription']."' 
                   ,[JobNatureId] = '".$data['JobNature']."' 
                   ,[EducationalRequirements] = '".$data['EducationalRequirements']."' 
                   ,[FunctionalRequirements] = '".$data['FunctionalRequirements']."' 
                   ,[BehavioralRequirements] = '".$data['BehavioralRequirements']."' 
                   ,[JobRequirements] = '".$data['JobRequirements']."' 
                   ,[JobLevelId] = '".$data['JobLevel']."' 
                   ,[Salary] = '".$data['Salary']."' 
                   ,[JobLocation] = '".$data['JobLocation']."' 
                   ,[OtherBenefits] = '".$data['OtherBenefits']."' 
                   ,[ApplicationDeadline] = '".$data['ApplicationDeadline']."' 
                   ,[Experience] = '".$data['Experience']."' 
              WHERE PostId = '".$data['PostId']."'";
        $this->db->query($sql);
        return true;
    }
    
    function selectcvsummaryExport($data){
        $column = '';
          if(empty($data['UserName'])){
              $column .= '';
          }else{
              $column .= 'T1.UserName,';
          }
          if(empty($data['Gender'])){
              $column .= '';
          }else{
              $column .= 'T1.Gender,';
          }
          if(empty($data['JobTitel'])){
              $column .= '';
          }else{
              $column .= 'T3.JobTitel,';
          }
          if(empty($data['ExpectedSalary'])){
              $column .= '';
          }else{
              $column .= 'T2.ExpectedSalary,';
          }
          if(empty($data['Mobile'])){
              $column .= '';
          }else{
              $column .= 'T1.Mobile,';
          }
           if(empty($data['Email'])){
              $column .= '';
          }else{
              $column .= 'T1.Email,';
          }
          $col = substr($column, 0, -1);
        $sql = "SELECT $col FROM UserInfo T1 
                INNER JOIN AppliedJob T2 ON T1.Id = T2.UserId
                INNER JOIN JobPost T3 ON T2.PostId = T3.PostId
              WHERE EXISTS (
                      SELECT * FROM ShortList sl 
                      WHERE sl.UserId = T2.UserId AND sl.PostId = T2.PostId
              ) OR

              EXISTS(
                      SELECT * FROM Recommendation rr
                        WHERE rr.UserId = T2.UserId AND rr.PostId = T2.PostId
              )";
          return  $query = $this->db->query($sql);
    }
    
	function SelectFilterOne($data){
            $UserName = $data['UserName'];
            $JobLocation = $data['JobLocation'];
            $Add1c = $data['Add1c'];
            $Add2 = $data['Add2'];
            $ExpectedSalary = $data['ExpectedSalary'];
            $JobTitel = $data['JobTitel'];
            $Gender = $data['Gender'];
            $JobLevel = $data['JobLevel'];
				  
            $sql = "Select T1.Id,(DATEDIFF(MONTH,T1.DOB,GETDATE())/12.0) As Age,T1.UserName,T1.Mobile,T1.TelNo,T1.Email,T1.FatherName,T1.MotherName,T1.Add1,
            T2.UserId,T2.PostId,T2.ExpectedSalary,T4.Thumb
            From UserInfo T1 
            Inner Join AppliedJob T2 ON T1.Id = T2.UserId
            Inner Join JobPost T3 ON T2.PostId = T3.PostId
            LEFT JOIN UserPhoto T4 ON T1.Id = T4.UserId
            Where T1.UserName LIKE '%$UserName%' AND T3.JobTitel LIKE '%$JobTitel%' AND T3.JobLocation LIKE '%$JobLocation%'"; //AND T2.ExpectedSalary = '$ExpectedSalary'
            $query = $this->db->query($sql);
        if ($query) {
            return $query->result_array();
        } else {
            return false;
        }    
		
    }
	
	function SelectRecommendation($data){
		$Recommendation = $data['Recommendation'];
		
		$sql = "Select T1.*, T2.*, T3.* From Recommendation T1 Inner Join UserInfo T2 ON T1.UserId = T2.Id Inner Join AppliedJob T3 ON T1.PostId = T3.PostId AND T1.UserId = T3.UserId Where T1.Business = '$Recommendation'";
		$query = $this->db->query($sql);
        if ($query) {
            return $query->result_array();
        } else {
            return false;
        }    
		
    }
	
	function TotalShortList(){
        $sql = "EXEC sp_TotalShortList ";
        $query = $this->db->query($sql);
        if ($query) {
        return $query->row();
        } else {
        return false;
        }
    }
	
	public function InsertNotice($data) {
       $NoticeName = $data['noticetitle'];
       $NoticeDescription = $data['noticedescription'];
       $NoticeDate = $data['noticedate'];
       $Status = $data['noticestatus'];    
       $file = $data['file'];    
           
        $sql = "INSERT INTO Notice VALUES ('$NoticeName','$NoticeDescription','$NoticeDate','$Status','$file')"; 
        $query = $this->db->query($sql);
        return true;
  }
    
	function previousnotice(){		
		$sql = "SELECT  NoticeId, LEFT (NoticeDescription, 70) as NoticeDescription,NoticeName,NoticeDate,Status,NoticeFile FROM Notice";
		$query = $this->db->query($sql);
        if ($query) {
            return $query->result_array();
        } else {
            return false;
        }    
		
    }
	
	function deletenotice($NoticeId){		
		$sql = "DELETE FROM Notice WHERE NoticeId=$NoticeId";
		$query = $this->db->query($sql);
        if ($query) {
            return true;
        } else {
            return false;
        }    
		
    }
	
	function getnotice($NoticeId){		
		$sql = "SELECT * FROM Notice WHERE NoticeId=$NoticeId";
		$query = $this->db->query($sql);
        if ($query) {
            return $query->result_array();
        } else {
            return false;
        }    
		
    }
	public function UpdateNotice($data) {
         $NoticeId = $data['noticeid'];
         $NoticeName = $data['noticetitle'];
         $NoticeDescription = $data['noticedescription'];
         $NoticeDate = $data['noticedate'];
         $Status = $data['noticestatus'];
         $NoticeFile = $data['NoticeFile'];     
           
         $sql = "Update Notice SET NoticeName='$NoticeName',NoticeDescription='$NoticeDescription',NoticeDate='$NoticeDate',Status='$Status', NoticeFile = '$NoticeFile' WHERE NoticeId=$NoticeId"; 
		
        $query = $this->db->query($sql);
        return true;
    }
	
    public function select_cvbank(){
        $sql = "SELECT *  FROM UserInfo";
        $query = $this->db->query($sql);
        if ($query) {
            return $query->result_array();
        } else {
            return false;
        }    
    }
    
    
    public function deleteshortlist($shortlistid){               
        $sql = "DELETE FROM ShortList WHERE ShortListId = '$shortlistid'";
        $this->db->query($sql);
        return true;
    }
    
    //pagination
    
    function selectData($table){
        $sql = "SELECT COUNT(*) as num FROM $table";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }
    
    function selectJobListData($vpb_start_page,$vpb_page_limit){
        $vpb_end_page = $vpb_start_page+$vpb_page_limit;       
        /*$sql = "SELECT * FROM ( 
	SELECT a.*,b.DepartmentName, ROW_NUMBER() OVER (ORDER BY a.PostId) as row 
	FROM JobPost a INNER JOIN LDepartment b ON a.DepartmentId = b.DepartmentId
	) aa
	WHERE aa.row > $vpb_start_page and aa.row <= $vpb_end_page";*/
	$sql = "SELECT * FROM ( 
				SELECT a.PostId, a.JobTitel,a.JobDescription,a.Vacancy,a.ApplicationDeadline, b.DepartmentName, 
                                    COUNT(c.UserId) AS Applications, ROW_NUMBER() OVER (ORDER BY a.PostId DESC) AS row 
				FROM JobPost a 
				INNER JOIN LDepartment b ON a.DepartmentId = b.DepartmentId 
				LEFT JOIN AppliedJob c ON a.PostId = c.PostId 
			   GROUP BY a.PostId,a.JobTitel,a.JobDescription,a.Vacancy,a.ApplicationDeadline, b.DepartmentName 
			   ) aa
                WHERE aa.row > $vpb_start_page AND aa.row <= $vpb_end_page ORDER BY aa.ApplicationDeadline DESC";
	
        $query = $this->db->query($sql);
        $query = $query->result_array();
        foreach ($query as $key => $value) {
			
			$sql5 = "SELECT  COUNT(UserId) AS Shortlisted FROM Shortlist Where PostId = '" . $value['PostId'] . "' ";
            $query5 = $this->db->query($sql5);
            $query5 = $query5->result_array();
            $query[$key]['Shortlisted'] = $query5;
			
			$sql6 = "SELECT  COUNT(UserId) AS TotalView FROM ViewList Where PostId = '" . $value['PostId'] . "' ";
            $query6 = $this->db->query($sql6);
            $query6 = $query6->result_array();
            $query[$key]['TotalView'] = $query6;
		}
        return $query;
    }
    
    
    function selectCVBankData($vpb_start_page,$vpb_page_limit){
        $vpb_end_page = $vpb_start_page+$vpb_page_limit;       
        $sql = "SELECT Id AS UserId,*,DATEDIFF(MONTH,DOB,GETDATE())/12.0 AS Age,'67' AS PostId FROM ( 
            SELECT a.*,b.ReligionName,c.ShortList, ROW_NUMBER() OVER (ORDER BY a.Id) as row 
            FROM UserInfo a INNER JOIN LReligion b ON a.Religion = b.Id LEFT JOIN ShortList c ON a.Id = c.UserId 
        ) aa
        WHERE aa.row > $vpb_start_page and aa.row <= $vpb_end_page";
        $query = $this->db->query($sql);
        $query = $query->result_array();
        foreach ($query as $key => $value) {
            $sql2 = "SELECT T1.*, T2.EducationLevel FROM Education T1 
                LEFT JOIN LEducationLevel T2 ON T1.EducationLevel = T2.Id
                WHERE UserId = '" . $value['Id'] . "'";
            $query2 = $this->db->query($sql2);
            $query2 = $query2->result_array();
            $query[$key]['Education'] = $query2;
            
            $sql6 = "SELECT TOP 1 * FROM UserPhoto Where UserId = '" . $value['Id'] . "' ORDER BY Id DESC";
            $query6 = $this->db->query($sql6);
            $query6 = $query6->result_array();
            $query[$key]['UserPhoto'] = $query6;
        }
        return $query;
    }
    
    function selectjobWiseCVSummary(){
        $sql = "EXEC sp_AllCVSummary";
        $query = $this->db->query($sql);
        return $query->result_array();  
    }

     
}