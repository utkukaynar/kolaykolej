<?php

/**
 * Class Home
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Home extends Controller
{
	public $_title = 'Masaüstü';
	public $_desc = 'genel bakış & istatistik';
	public $_crumbs = NULL;
	
    public function index()
    {
        $home_model = $this->loadModel('HomeModel');
		
        $student_count = $home_model->getStudentCount();
		$teacher_count = $home_model->getTeacherCount();
		$parent_count = $home_model->getParentCount();
		$classroom_count = $home_model->getClassroomCount();
		$subject_count = $home_model->getSubjectCount();
		$exam_count = $home_model->getExamCount();
		$meeting_count = $home_model->getMeetingCount();
		$notice_count = $home_model->getNoticeCount();
		
		$notices = $home_model->getAllNotices();
		$meetings = $home_model->getAllMeetings();
		
		require 'application/views/_templates/header.php';
        require 'application/views/home/index.php';
        require 'application/views/_templates/footer.php';
    }
}
