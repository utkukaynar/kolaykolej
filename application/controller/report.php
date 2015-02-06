<?php

/**
 * Class Home
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Report extends Controller
{
	public $_title = NULL;
	public $_desc = NULL;
	public $_crumbs = NULL;
	public $_action = NULL;
	
    public function index()
    {
		exit();
    }
	
    public function studentList()
    {
		$this->_title = 'Öğrenci Listesi';
		$this->_desc = 'öğrenci listesi oluştur';
		$this->_crumbs = array('Raporlar','Öğrenci','Öğrenci Listesi');
		$this->_action = URL .'report/studentlist';
		
		$report_model = $this->loadModel('ReportModel');
		
		if (isset($_POST["submit"])) {			
			$_POST = array_map('stripTagsDeep', $_POST);
			
			$season_id = $_POST["season_id"];
			$classroom_id = implode(',', $_POST["classroom_id"]);
            $report = $report_model->getStudentList($classroom_id,
									$_POST["gender_id"],
									$_POST["blood_group_id"]);	
			$season = arrayAlign($report_model->getSeasons());
			
			$this->_action = URL .'report/export';
			
			require 'application/views/report/studentlist/report.php';
			exit;
        }
		
		$season = $report_model->getSeasons();
		$last_season = end($season);
		$season_id = $last_season->id;
		$classroom = $report_model->getClassrooms($season_id);
		$gender = $report_model->getGender();
		$blood_group = $report_model->getBloodGroup();
		
		require 'application/views/_templates/header.php';
        require 'application/views/report/studentlist/index.php';
        require 'application/views/_templates/footer.php';
    }
	
    public function classList()
    {
		$this->_title = 'Sınıf Listesi';
		$this->_desc = 'sınıf listesi oluştur';
		$this->_crumbs = array('Raporlar','Öğrenci','Sınıf Listesi');
		$this->_action = URL .'report/classlist';
		
		$report_model = $this->loadModel('ReportModel');
		
		if (isset($_POST["submit"])) {
			$_POST = array_map('stripTagsDeep', $_POST);
			
			$season_id = $_POST["season_id"];
			$classroom_id = $_POST["classroom_id"];
            $report = $report_model->getClassList($classroom_id);	
			$season = arrayAlign($report_model->getSeasons());
			$classroom = arrayAlign($report_model->getClassrooms($season_id));
			
			require 'application/views/report/classlist/report.php';
			exit;
        }
		
		$season = $report_model->getSeasons();
		$last_season = end($season);
		$season_id = $last_season->id;
		$classroom = $report_model->getClassrooms($season_id);
		
		require 'application/views/_templates/header.php';
        require 'application/views/report/classlist/index.php';
        require 'application/views/_templates/footer.php';
	}
	
    public function numberOfStudent()
    {
		$this->_title = 'Öğrenci Sayıları';
		$this->_desc = 'sınıf öğrenci sayıları';
		$this->_crumbs = array('Raporlar','Öğrenci','Öğrenci Sayıları');
		$this->_action = URL .'report/numberofstudent';
		
		$report_model = $this->loadModel('ReportModel');
		
		if (isset($_POST["submit"])) {
			$_POST = array_map('stripTagsDeep', $_POST);
			
			$season_id = $_POST["season_id"];
            $report = $report_model->getNumberOfStudent($season_id);	
			$season = arrayAlign($report_model->getSeasons());
			
			require 'application/views/report/numberofstudent/report.php';
			exit;
        }
		
		$season = $report_model->getSeasons();
		$last_season = end($season);
		$season_id = $last_season->id;
		
		require 'application/views/_templates/header.php';
        require 'application/views/report/numberofstudent/index.php';
        require 'application/views/_templates/footer.php';
	}
	
    public function examResults()
    {
		$this->_title = 'Sınav Sonuçları';
		$this->_desc = 'sınav sonuçlarını listele';
		$this->_crumbs = array('Raporlar','Öğrenci','Sınav Sonuçları');
		$this->_action = URL .'report/examresults';
		
		$report_model = $this->loadModel('ReportModel');
		
		if (isset($_POST["submit"])) {			
			$_POST = array_map('stripTagsDeep', $_POST);
			
			$season_id = $_POST["season_id"];
			$classroom_id = implode(',', $_POST["classroom_id"]);
			$exam_id = $_POST["exam_id"];
			$subject_id = $_POST["subject_id"];
			
            $report = $report_model->getExamResults($classroom_id,
									$exam_id,
									$subject_id);	
			$season = arrayAlign($report_model->getSeasons());
			$exam = arrayAlign($report_model->getExams());
			$subject = arrayAlign($report_model->getSubjects());
			
			$this->_action = URL .'report/export';
			
			require 'application/views/report/examresults/report.php';
			exit;
        }
		
		$season = $report_model->getSeasons();
		$last_season = end($season);
		$season_id = $last_season->id;
		$classroom = $report_model->getClassrooms($season_id);
		$exam = $report_model->getExams();
		$subject = $report_model->getSubjects();
		
		require 'application/views/_templates/header.php';
        require 'application/views/report/examresults/index.php';
        require 'application/views/_templates/footer.php';
	}
	
    public function studentPerformance()
    {
		$this->_title = 'Öğrenci Performansı';
		$this->_desc = 'öğrenci performans grafiği';
		$this->_crumbs = array('Raporlar','Öğrenci','Öğrenci Performansı');
		
		require 'application/views/_templates/header.php';
        require 'application/views/report/studentperformance/index.php';
        require 'application/views/_templates/footer.php';
	}
	
    public function teacherList()
    {
		$this->_title = 'Öğretmen Listesi';
		$this->_desc = 'öğretmen listesi oluştur';
		$this->_crumbs = array('Raporlar','Öğretmen','Öğretmen Listesi');
		$this->_action = URL .'report/teacherlist';
		
		$report_model = $this->loadModel('ReportModel');
		
		if (isset($_POST["submit"])) {			
			$_POST = array_map('stripTagsDeep', $_POST);
			
			$season_id = $_POST["season_id"];
			$classroom_id = implode(',', $_POST["classroom_id"]);
			$classrooms = $_POST["classroom_id"];
			$subject_id = $_POST["subject_id"];
            $report = $report_model->getTeacherList($classroom_id, $subject_id);	
			$season = arrayAlign($report_model->getSeasons());
			$classroom = arrayAlign($report_model->getClassrooms($season_id));
			$subject = arrayAlign($report_model->getSubjects());
			
			$this->_action = URL .'report/export';
			
			require 'application/views/report/teacherlist/report.php';
			exit;
        }
		
		$season = $report_model->getSeasons();
		$last_season = end($season);
		$season_id = $last_season->id;
		$classroom = $report_model->getClassrooms($season_id);
		$subject = $report_model->getSubjects();
		
		require 'application/views/_templates/header.php';
        require 'application/views/report/teacherlist/index.php';
        require 'application/views/_templates/footer.php';
    }
	
    public function parentList()
    {
		$this->_title = 'Veli Listesi';
		$this->_desc = 'veli listesi oluştur';
		$this->_crumbs = array('Raporlar','Veli','Veli Listesi');
		$this->_action = URL .'report/parentlist';
		
		$report_model = $this->loadModel('ReportModel');
		
		if (isset($_POST["submit"])) {			
			$_POST = array_map('stripTagsDeep', $_POST);
			
			$season_id = $_POST["season_id"];
			$classroom_id = implode(',', $_POST["classroom_id"]);
			$classrooms = $_POST["classroom_id"];
            $report = $report_model->getParentList($classroom_id);	
			$season = arrayAlign($report_model->getSeasons());
			$classroom = arrayAlign($report_model->getClassrooms($season_id));
			
			$this->_action = URL .'report/export';
			
			require 'application/views/report/parentlist/report.php';
			exit;
        }
		
		$season = $report_model->getSeasons();
		$last_season = end($season);
		$season_id = $last_season->id;
		$classroom = $report_model->getClassrooms($season_id);
		
		require 'application/views/_templates/header.php';
        require 'application/views/report/parentlist/index.php';
        require 'application/views/_templates/footer.php';
    }
	
    public function collectingStatus()
    {
		$this->_title = 'Tahsilat Durumu';
		$this->_desc = 'tahsilat durum grafiği';
		$this->_crumbs = array('Raporlar','Finans','Tahsilat Durumu');
		
		require 'application/views/_templates/header.php';
        require 'application/views/report/collectingstatus/index.php';
        require 'application/views/_templates/footer.php';
	}
	
    public function monthlyEndorsement()
    {
		$this->_title = 'Aylık Ciro';
		$this->_desc = 'aylık ciro grafiği';
		$this->_crumbs = array('Raporlar','Finans','Aylık Ciro');
		
		require 'application/views/_templates/header.php';
        require 'application/views/report/monthlyendorsement/index.php';
        require 'application/views/_templates/footer.php';
	}
	
	public function export() {
		if (!isset($_POST["submit"])) exit();
		
		require 'application/views/report/export.php';
	}
}
