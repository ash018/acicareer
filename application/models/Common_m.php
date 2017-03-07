<?php

class Common_m extends CI_Model {

//    SELECT SCOPE_IDENTITY() AS RowId
//    $CI =& get_instance();       
//    $CI->db = $this->load->database('default',true);

    function selectBusiness($table) {
        $sql = "SELECT * FROM  $table WHERE Business IN ('H','SE','F','PF','Q','AL') ORDER BY ReportOrder";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function option_select_business($table) {
        $sql = "SELECT * FROM  $table WHERE enable = 'Y'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function option_select_district($table) {
        $sql = "SELECT * FROM  $table";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function select_option_postjoblist($table) {
        $sql = "SELECT * FROM  $table";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function selectMyapply($UserId) {
        $sql = "Select T1.EntryDate as AppliedDate,T1.*, T2.*, T3.*,T4.ShortList From AppliedJob T1 
                Inner Join UserInfo T2 ON T1.UserId = T2.Id
                Inner Join JobPost T3 ON T1.PostId = T3.PostId
                left Join ShortList T4 on T1.UserId = T4.UserId and T1.PostId = T4.PostId 
                WHERE T1.UserId = '$UserId'";

        $query = $this->db->query($sql);
        if ($query->num_rows() >= 1) {
            return $query->result_array();
        } else {
            return false;
        }
    }
    
    public function tracking_checking($Email,$userId){
        $sql = "SELECT Email FROM UserInfo WHERE Email = '$Email' AND Id != '$userId'";
        $query = $this->db->query($sql); 
        return $query->result_array();  
    }
    
    function totalJobs() {
        $sql = "SELECT COUNT(*) AS CountJobs FROM JobPost WHERE CAST(ApplicationDeadline AS DATE) >= CAST(GETDATE() AS DATE)";
        $query = $this->db->query($sql);
        return $query->row();
    }

    function jobDetailsView($JobId) {
        $sql = "SELECT a.*,b.JobCategory FROM JobPost a 
        LEFT JOIN JobCategory b ON a.JobCategoryId = b.JobCategoryId
        WHERE PostId = '$JobId'";
        $query = $this->db->query($sql);
        if ($query->num_rows() >= 1) {
            return $query->row();
        } else {
            return false;
        }
    }

    function selectMyresume($UserId) {
        $sql = "Select T1.* From UserInfo T1 Where T1.Id = '$UserId'";
        $query = $this->db->query($sql);
        $query = $query->result_array();
        foreach ($query as $key => $value) {
            $sql2 = "SELECT T1.*, T2.EducationLevel,T4.* FROM Education T1 
                Inner Join LEducationLevel T2 ON T1.EducationLevel = T2.Id 
                Inner Join LResult T4 ON T1.Result = T4.Id
                WHERE UserId = '" . $value['Id'] . "'";
            $query2 = $this->db->query($sql2);
            $query2 = $query2->result_array();
            $query[$key]['Education'] = $query2;

            $sql3 = "SELECT T1.*, T2.* FROM Training T1 Inner Join LCountry T2 ON T1.Country = T2.Id WHERE UserId = '" . $value['Id'] . "'";
            $query3 = $this->db->query($sql3);
            $query3 = $query3->result_array();
            $query[$key]['Training'] = $query3;

            $sql4 = "SELECT * FROM Experience WHERE UserId = '" . $value['Id'] . "'";
            $query4 = $this->db->query($sql4);
            $query4 = $query4->result_array();
            $query[$key]['Experience'] = $query4;

            $sql5 = "SELECT * FROM Reference WHERE UserId = '" . $value['Id'] . "'";
            $query5 = $this->db->query($sql5);
            $query5 = $query5->result_array();
            $query[$key]['Reference'] = $query5;

            $sql6 = "Select TOP 1 * from UserPhoto Where UserId = '" . $value['Id'] . "' ORDER BY Id DESC";
            $query6 = $this->db->query($sql6);
            $query6 = $query6->result_array();
            $query[$key]['UserPhoto'] = $query6;
        }
        return $query;
    }

    ///End, kallul

    public function insertUserInfo($data) {
        $UserName = $data['UserName'];
        $FatherName = $data['FatherName'];
        $MotherName = $data['MotherName'];
        $Add1 = $data['Add1'];
        $Add2 = $data['Add2'];
        $Nationality = $data['Nationality'];
        $Gender = $data['Gender'];
        $DOB = $data['DOB'];
        $Religion = $data['Religion'];
        $MaritalStatus = $data['MaritalStatus'];
        $ExpSalary = $data['ExpSalary'];
        $BloodGroup = $data['BloodGroup'];
        $TelNo = $data['TelNo'];
        $Mobile = $data['Mobile'];
        $NationalId = $data['NationalId'];
        $PassportNo = $data['PassportNo'];
        $BirthPlace = $data['BirthPlace'];
        $Email = $data['Email'];
        $Password = $data['Password'];
        $Skill = '';
        $ExtraCurriculum = '';
        $CareerObjective = $data['CareerObjective'];

        $sql = "EXEC usp_UserInfoInsert '$UserName','$FatherName','$MotherName','$Add1','$Add2',"
                . "'$Nationality',"
                . "'$Gender','$DOB','$Religion','$MaritalStatus','$ExpSalary','$BloodGroup','$TelNo','$Mobile','$NationalId','$PassportNo',"
                . "'$BirthPlace','$Email','$Password','$Skill','$ExtraCurriculum','$CareerObjective' ";
               //echo '<pre/>';print_r($sql);exit();
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function validate_registration($RowId) {
        $sql = "SELECT * FROM UserInfo WHERE Id = '$RowId'";
        $query = $this->db->query($sql);
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function insertEducation($data, $table) {
        $UserId = $data['UserId'];
        $EducationLevel = $data['EducationLevel'];
        $Faculty = $data['Faculty'];
        $Board = $data['Board'];
        $InstituteName = $data['InstituteName'];
        $Result = $data['Result'];
        $Marks = $data['Marks'];
        $PassingYear = $data['PassingYear'];
        /* (UserId,EducationLevel,Faculty,Board,InstituteName,Result,Marks,PassingYear) */
        $sql = "INSERT INTO $table VALUES ('$UserId','$EducationLevel','$Faculty','$Board','$InstituteName','$Result','$Marks','$PassingYear')";
//        exit();
        $query = $this->db->query($sql);
        if ($query) {
            return true;
        }
    }

    public function insert($data, $table) {
        $query = $this->db->insert($table, $data);
        return true;
    }

    public function insertphoto($data, $table, $UserId) {
        $sql = " SELECT * FROM UserPhoto WHERE UserId = '$UserId' ";
        $query = $this->db->query($sql);

        if (count($query->result_array()) == 0) {
            $query = $this->db->insert($table, $data);
        } else {
            $this->db->where('UserId', $UserId);
            $this->db->update($table, $data);
        }

        return true;
    }

    function select_advance_option($id, $field, $table) {
        $sql = "SELECT * FROM " . $table . " WHERE " . $field . " = '$id'";
        $query = $this->db->query($sql);
        $query = $query->row();
        return $query;
    }

    function option_select($table, $field) {
        $sql = "SELECT * FROM $table ORDER BY $field";
        $query = $this->db->query($sql);
        $query = $query->result_array();
        return $query;
    }

    function option_select_homepage() {
        $sql = "SELECT a.PostId, a.JobTitel,b.DepartmentName, a.Vacancy, a.JobDescription, a.EducationalRequirements, CONVERT(VARCHAR(19),a.ApplicationDeadline) AS ApplicationDeadline 
                FROM JobPost a
                INNER JOIN LDepartment b ON a.DepartmentId = b.DepartmentId
                WHERE CAST(a.ApplicationDeadline AS DATE) >= CAST(GETDATE() AS DATE) 
                ORDER BY a.ApplicationDeadline DESC";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function edit_option($action, $id, $table) {
        $this->db->where('id', $id);
        $this->db->update($table, $action);
        return;
    }

    function edit_option_field($action, $id, $field, $table) {
        $this->db->where($field, $id);
        $this->db->update($table, $action);
        return TRUE;
    }

    function delet_option($id, $table) {
        $this->db->where('Id', $id);
        $this->db->delete($table);
        return;
    }

    function select_password($email) {
        $sql = "SELECT Password FROM UserInfo WHERE Email = '$email'";
        $query = $this->db->query($sql);
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function validate_email($email) {
        $sql = "SELECT * FROM UserInfo WHERE Email = '$email'";
        $query = $this->db->query($sql);
        if ($query) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function validate_password($email, $password) {
        // AND Password = '$password'        
        $sql = "SELECT * FROM UserInfo WHERE Email = '$email'";
        $query = $this->db->query($sql);
        $return = $query->result_array();
//		print_r($return);exit();		
        if (!empty($return)) {
            if ($return[0]['Password'] == $password) {
                $sql = "SELECT * FROM UserInfo WHERE Email = '$email' AND Password = '$password' ";
                $query = $this->db->query($sql);
                return $query->result();
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    //12.12.2016  Email Validation While a New user want to register 
    public function validEmil($email) {
        $sql = "SELECT Email FROM UserInfo WHERE Email = '$email' ";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return false;
        }
    }

    //From Shakil

    function duplicate_checking($CustomerID, $field, $table) {
        $sql = "SELECT * FROM $table WHERE $field = '$CustomerID'";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }
    
    function duplicate_checking_shortlist_check($UserId,$PostId,$ShortList,$table){
        $sql = "SELECT TOP 1 * FROM $table WHERE UserId = '$UserId' AND PostId = '$PostId' AND ShortList = '$ShortList'";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }
    
    function duplicate_checking_shortlist($UserId,$PostId,$table) {
        $sql = "SELECT * FROM $table WHERE UserId = '$UserId' AND PostId = '$PostId'";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }
    
    function edit_option_shortlist($UserId,$PostId,$ShortList,$table){
        $sql = "UPDATE $table SET $table = '$ShortList' WHERE UserId = '$UserId' AND PostId = '$PostId'";
        $query = $this->db->query($sql);
    }
    
    function duplicate_posting($data, $table) {
        $PostId = $data['PostId'];
        $UserId = $data['UserId'];
        $sql = "SELECT * FROM $table WHERE PostId = '$PostId' AND UserId = '$UserId'";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }

    function selectCV($UserId) {
        $sql = "SELECT * FROM UserInfo WHERE Id = '$UserId'";
        $query = $this->db->query($sql);
        $query = $query->result_array();
        foreach ($query as $key => $value) {
            $sql2 = "SELECT * FROM Education WHERE UserId = '" . $value['Id'] . "'";
            $query2 = $this->db->query($sql2);
            $query2 = $query2->result_array();
            $query[$key]['Education'] = $query2;
            $sql3 = "SELECT * FROM Training WHERE UserId = '" . $value['Id'] . "'";
            $query3 = $this->db->query($sql3);
            $query3 = $query3->result_array();
            $query[$key]['Training'] = $query3;
            $sql4 = "SELECT * FROM Experience WHERE UserId = '" . $value['Id'] . "'" . " order by Id asc";
            $query4 = $this->db->query($sql4);
            $query4 = $query4->result_array();
            $query[$key]['Experience'] = $query4;
            //code by shakilReference
            $sql5 = "SELECT * FROM Reference WHERE UserId = '" . $value['Id'] . "'";
            $query5 = $this->db->query($sql5);
            $query5 = $query5->result_array();
            $query[$key]['Reference'] = $query5;
        }
        return $query;
    }

    //Code added by kallul, 14th December 2016
    public function insert_internship($data) {
        $this->db->insert('Internship', $data);
        return TRUE;
    }

    public function do_upload($photo) {
        $config['upload_path'] = "./assets/image/upload/";
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '20000';
        $config['max_width'] = '20000';
        $config['max_height'] = '20000';

        $this->load->library('upload', $config);

        if ($this->upload->do_upload($photo)) {
            $data = $this->upload->data();
            /* PATH */
            $source = "./assets/image/upload/" . $data['file_name'];
            $destination_thumb = "./assets/image/upload/thumbnail/";
            $destination_medium = "./assets/image/upload/medium/";
            $destination_big = "./assets/image/upload/big/";

            // Permission Configuration
            chmod($source, 0777);

            /* Resizing Processing */
            // Configuration Of Image Manipulation :: Static
            $this->load->library('image_lib');
            $img['image_library'] = 'GD2';
            $img['create_thumb'] = TRUE;
            $img['maintain_ratio'] = TRUE;

            /// Limit Width Resize
            $limit_big = 1000;
            $limit_medium = 500;
            $limit_thumb = 250;

            // Size Image Limit was using (LIMIT TOP)
            $limit_use = $data['image_width'] > $data['image_height'] ? $data['image_width'] : $data['image_height'];

            // Percentase Resize
            if ($limit_use > $limit_big || $limit_use > $limit_thumb || $limit_use > $limit_medium) {
                $percent_big = $limit_big / $limit_use;
                $percent_medium = $limit_medium / $limit_use;
                $percent_thumb = $limit_thumb / $limit_use;
            }

            //// Making THUMBNAIL ///////
            $img['width'] = $limit_use > $limit_thumb ? $data['image_width'] * $percent_thumb : $data['image_width'];
            $img['height'] = $limit_use > $limit_thumb ? $data['image_height'] * $percent_thumb : $data['image_height'];

            // Configuration Of Image Manipulation :: Dynamic
            $img['thumb_marker'] = '_thumb-' . floor($img['width']) . 'x' . floor($img['height']);
            $img['quality'] = '99%';
            $img['source_image'] = $source;
            $img['new_image'] = $destination_thumb;

            $thumb_nail = $data['raw_name'] . $img['thumb_marker'] . $data['file_ext'];
            // Do Resizing
            $this->image_lib->initialize($img);
            $this->image_lib->resize();
            $this->image_lib->clear();

            //// Making MEDIUM ///////
            $img['width'] = $limit_use > $limit_medium ? $data['image_width'] * $percent_medium : $data['image_width'];
            $img['height'] = $limit_use > $limit_medium ? $data['image_height'] * $percent_medium : $data['image_height'];

            // Configuration Of Image Manipulation :: Dynamic
            $img['thumb_marker'] = '_medium-' . floor($img['width']) . 'x' . floor($img['height']);
            $img['quality'] = '99%';
            $img['source_image'] = $source;
            $img['new_image'] = $destination_medium;

            $medium = $data['raw_name'] . $img['thumb_marker'] . $data['file_ext'];
            // Do Resizing
            $this->image_lib->initialize($img);
            $this->image_lib->resize();
            $this->image_lib->clear();

            ////// Making BIG /////////////
            $img['width'] = $limit_use > $limit_big ? $data['image_width'] * $percent_big : $data['image_width'];
            $img['height'] = $limit_use > $limit_big ? $data['image_height'] * $percent_big : $data['image_height'];

            // Configuration Of Image Manipulation :: Dynamic
            $img['thumb_marker'] = '_big-' . floor($img['width']) . 'x' . floor($img['height']);
            $img['quality'] = '99%';
            $img['source_image'] = $source;
            $img['new_image'] = $destination_big;

            $album_picture = $data['raw_name'] . $img['thumb_marker'] . $data['file_ext'];
            // Do Resizing
            $this->image_lib->initialize($img);
            $this->image_lib->resize();
            $this->image_lib->clear();

            $data_image = array(
                'thumb' => $thumb_nail,
                'medium' => $medium,
                'img' => $album_picture
            );

            unlink($source);
            return $data_image;
            //echo base_url().'dash_board/products/single_product/'.$product_id;
            //exit();
            //redirect(base_url().'dash_board/products/single_product/'.$product_id);
        } else {
            return FALSE;
        }
    }

    //Notice board 
    function option_select_noticeboard() {
        $sql = "SELECT  NoticeId, LEFT (NoticeDescription, 150) as NoticeDescription,NoticeName,NoticeDate, [Status] FROM Notice Where [Status]=1";
        $query = $this->db->query($sql);
        $query = $query->result_array();
        return $query;
    }

    function select_notice_shortlist($NoticeId) {
        $sql = "SELECT  * FROM Notice WHERE NoticeId = $NoticeId";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function current_vacancy() {
        $sql = "SELECT COUNT(T1.DepartmentId) AS CC, T1.DepartmentId, T2.DepartmentName FROM JobPost T1
                INNER JOIN LDepartment T2 ON T1.DepartmentId = T2.DepartmentId
                WHERE CAST(T1.ApplicationDeadline AS DATE) >= CAST(GETDATE() AS DATE)
                GROUP BY T1.DepartmentId, T2.DepartmentName";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function selectcurrentvacancy_filter($data) {
        $district = $data['district'];
        $JobLevelId = $data['JobLevelId'];
        if (empty($JobLevelId) && empty($district)) {
            $sql = "Select Count(T1.DepartmentId) AS CC, T1.DepartmentId, T2.DepartmentName From JobPost T1
				Inner Join LDepartment T2 ON T1.DepartmentId = T2.DepartmentId Where CAST(T1.ApplicationDeadline AS DATE) >= CAST(GETDATE() AS DATE)
				Group By T1.DepartmentId, T2.DepartmentName";
        } else if (empty($JobLevelId) && !empty($district)) {
            $sql = "Select Count(T1.DepartmentId) AS CC, T1.DepartmentId, T2.DepartmentName From JobPost T1
				Inner Join LDepartment T2 ON T1.DepartmentId = T2.DepartmentId Where T1.JobLocation = '$district' AND CAST(T1.ApplicationDeadline AS DATE) >= CAST(GETDATE() AS DATE)
				Group By T1.DepartmentId, T2.DepartmentName";
        } else if (!empty($JobLevelId) && empty($district)) {
            $sql = "Select Count(T1.DepartmentId) AS CC, T1.DepartmentId, T2.DepartmentName From JobPost T1
				Inner Join LDepartment T2 ON T1.DepartmentId = T2.DepartmentId Where T1.JobLevelId = $JobLevelId AND CAST(T1.ApplicationDeadline AS DATE) >= CAST(GETDATE() AS DATE)
				Group By T1.DepartmentId, T2.DepartmentName";
        } else {
            $sql = "Select Count(T1.DepartmentId) AS CC, T1.DepartmentId, T2.DepartmentName From JobPost T1
				Inner Join LDepartment T2 ON T1.DepartmentId = T2.DepartmentId Where T1.JobLocation = '$district' AND T1.JobLevelId = $JobLevelId AND CAST(T1.ApplicationDeadline AS DATE) >= CAST(GETDATE() AS DATE)
				Group By T1.DepartmentId, T2.DepartmentName";
        }

        $query = $this->db->query($sql);
        if ($query) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    function currentvacancy_filter_details($data) {
        $district = $data['district'];
        $JobLevelId = $data['JobLevelId'];
        $DepartmentId = $data['DepartmentId'];
        if (empty($JobLevelId) && empty($district)) {
            $sql = "SELECT T1.*, T2.* FROM JobPost T1 INNER JOIN LDepartment T2 ON T1.DepartmentId = T2.DepartmentId WHERE CAST(T1.ApplicationDeadline AS DATE) >= CAST(GETDATE() AS DATE) AND T1.DepartmentId = '$DepartmentId'";
        } else if (empty($JobLevelId) && !empty($district)) {
            $sql = "SELECT T1.*, T2.* FROM JobPost T1 INNER JOIN LDepartment T2 ON T1.DepartmentId = T2.DepartmentId 
WHERE T1.JobLocation = '$district' AND CAST(T1.ApplicationDeadline AS DATE) >= CAST(GETDATE() AS DATE) AND T1.DepartmentId = '$DepartmentId'";
        } else if (!empty($JobLevelId) && empty($district)) {
            $sql = "SELECT T1.*, T2.* FROM JobPost T1 INNER JOIN LDepartment T2 ON T1.DepartmentId = T2.DepartmentId 
WHERE T1.JobLevelId = $JobLevelId AND CAST(T1.ApplicationDeadline AS DATE) >= CAST(GETDATE() AS DATE) AND T1.DepartmentId = '$DepartmentId'";
        } else {
            $sql = "SELECT T1.*, T2.* FROM JobPost T1 INNER JOIN LDepartment T2 ON T1.DepartmentId = T2.DepartmentId 
WHERE T1.JobLocation = '$district' AND T1.JobLevelId = $JobLevelId AND CAST(T1.ApplicationDeadline AS DATE) >= CAST(GETDATE() AS DATE) AND T1.DepartmentId = '$DepartmentId'";
        }
        //echo $sql;
        $query = $this->db->query($sql);
        if ($query) {
            return $query->result_array();
        } else {
            return false;
        }
        $query = $query->result_array();
        return $query;
    }

    function current_vacancy_detailview($DepartmentId) {
        $sql = "SELECT T1.*, T2.* FROM JobPost T1 INNER JOIN LDepartment T2 ON T1.DepartmentId = T2.DepartmentId 
			WHERE T1.DepartmentId = '$DepartmentId' AND CAST(T1.ApplicationDeadline AS DATE) >= CAST(GETDATE() AS DATE)";
        $query = $this->db->query($sql);
        $query = $query->result_array();
        return $query;
    }

    function jobwise_application($PostId) {
        $sql = "Select T1.*, T2.*, T3.* From JobPost T1
				Inner Join AppliedJob T2 ON T1.PostId = T2.PostId
				Inner Join UserInfo T3 ON T2.UserId = T3.Id
				Where T2.PostId = '$PostId'";
        $query = $this->db->query($sql);
        $query = $query->result_array();
        return $query;
    }

    public function findPassword($data) {
        $Email = $data;
        $sql = "Select [Password] From UserInfo Where Email = '$Email'";
        //echo '<pre/>';print_r($sql);exit();
        $query = $this->db->query($sql);
        if ($query) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    function validated_email_user($email) {
        $sql = "SELECT * FROM UserInfo WHERE Email = '$email' ";
        $query = $this->db->query($sql);
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function selectJobPosted($PostId, $UserId) {
        $sql = "SELECT COUNT(*) AS jobPosted FROM AppliedJob WHERE PostId = '$PostId' AND UserId = '$UserId'";
        $query = $this->db->query($sql);
        $query = $query->result_array();
        return $query;
    }

    function select_option_name($fieldId, $fieldName, $id, $table) {
        $sql = "SELECT $fieldName AS 'Name' FROM $table WHERE $fieldId = '$id'";
        //echo '<pre/>';print_r($sql);exit();
        $query = $this->db->query($sql);
        if ($query) {
            return $query->result_array();
        } else {
            return false;
        }
    }
    
    function select_option_photo($fieldId, $fieldName, $id, $table) {
        $sql = "SELECT TOP 1 Thumb AS 'Name' FROM $table WHERE UserId = '$id' ORDER BY DESC";
        //echo '<pre/>';print_r($sql);exit();
        $query = $this->db->query($sql);
        if ($query) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function insertInternship($data) {
        $UserName = $data['UserName'];
        $FatherName = $data['FatherName'];
        $MotherName = $data['MotherName'];
        $Add1 = $data['Add1'];
        $Add2 = $data['Add2'];
        $Gender = $data['Gender'];
        $Mobile = $data['Mobile'];
        $Email = $data['Email'];
        $InstituteName = $data['InstituteName'];
        $PassingYear = $data['PassingYear'];
        $EducationLevel = $data['EducationLevel'];
        $MajorConcentration = $data['MajorConcentration'];
        $QualificationAttained = $data['QualificationAttained'];
        $Result = $data['Result'];
        $Marks = $data['Marks'];
        $AvailableMonthFor = $data['AvailableMonthFor'];
        $FromMonth = $data['FromMonth'];
        $ToMonth = $data['ToMonth'];
        $CourseAttended = $data['CourseAttended'];
        $Skill = $data['Skill'];
        $ExtraCurriculum = $data['ExtraCurriculum'];


        $sql = "EXEC usp_InternshipInsert '$UserName','$FatherName','$MotherName',
		'$Add1','$Add2','$Gender','$Mobile','$Email','$InstituteName','$PassingYear',
                '$EducationLevel','$MajorConcentration','$QualificationAttained',
                '$Result','$Marks','$AvailableMonthFor',
                '$FromMonth','$ToMonth','$CourseAttended','$Skill','$ExtraCurriculum'";
        //       echo '<pre/>';print_r($sql);exit();
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function selectInternship($InternshipId) {
        $sql = "SELECT * FROM Internship WHERE InternshipId = '$InternshipId'";
        $query = $this->db->query($sql);
        $query = $query->result_array();
        return $query;
    }
    
    function getEducationLevelIntern(){
        $sql = "SELECT * FROM LEducationLevel WHERE ForIntern = 1 ORDER BY Id";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

}
