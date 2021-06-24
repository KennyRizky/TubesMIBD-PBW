<?php
    $url = $_SERVER['REDIRECT_URL'];
    $baseURL = '/TubesMIBD-PBW';

    if($_SERVER["REQUEST_METHOD"] == "GET"){
        switch ($url) {
            case $baseURL.'/index':
                require_once "controller/indexController.php";
                $indexCtrl = new IndexController();
                echo $indexCtrl->view_index();
                break;
            case $baseURL.'/companyprofile':
                require_once "controller/indexController.php";
                $indexCtrl = new IndexController();
                echo $indexCtrl->view_company_profile();
                break;
            case $baseURL.'/signin';
                require_once "controller/signInController.php";
                $indexCtrl = new signInController();
                echo $indexCtrl->view_signIn();
                break;
            case $baseURL.'/register';
                require_once "controller/registerController.php";
                $indexCtrl = new registerController();
                echo $indexCtrl->view_register();
                break;
            case $baseURL.'/registerTeacher';
                require_once "controller/registerController.php";
                $indexCtrl = new registerController();
                echo $indexCtrl->view_registerTeacher();
                break;
            case $baseURL.'/admin';
                require_once "controller/adminController.php";
                $indexCtrl = new adminController();
                echo $indexCtrl->view_admin();
                break;
            case $baseURL.'/logout';
                require_once "controller/logoutController.php";
                $logoutCtrl = new logoutController();
                echo $logoutCtrl->logout();
                header('Location: index');
                break;
            case $baseURL.'/signinTeacher';
                require_once "controller/signInController.php";
                $signInTeacherCtrl = new signInController();
                echo $signInTeacherCtrl->view_signInTeacher();
                break;
            case $baseURL.'/profileMember';
                require_once "controller/profileMemberController.php";
                $profileMember = new profileMemberController();
                echo $profileMember->view_profileMember();
                break;
            case $baseURL.'/editProfile';
                require_once "controller/editProfileController.php";
                $editProfile = new editProfileController();
                echo $editProfile->view_editProfile();
                break;
            case $baseURL.'/deleteAccount';
                require_once "controller/profileMemberController.php";
                $deleteAccount = new profileMemberController();
                $deleteAccount->delete_account();
                header('Location: index');
                break;
            case $baseURL.'/buyCredit';
                require_once "controller/walletController.php";
                $addWallet = new walletController();
                echo $addWallet->view_wallet();
                break;
            case $baseURL.'/myCoursesTeacher';
                require_once "controller/coursesTeacherController.php";
                $viewCoursesTeacher = new coursesTeacherController();
                echo $viewCoursesTeacher->view_coursesTeacher();
                break;
            case $baseURL.'/addCoursesTeacher';
                require_once "controller/coursesTeacherController.php";
                $viewCoursesTeacher = new coursesTeacherController();
                echo $viewCoursesTeacher->view_add_courses();
                break;
            case $baseURL.'/addModule';
                require_once "controller/addModuleController.php";
                $addModuleTeacher = new addModuleController();
                echo $addModuleTeacher->view_addModule();
                break;
            case $baseURL.'/addExam';
                require_once "controller/addExamController.php";
                $addExamTeacher = new addExamController();
                echo $addExamTeacher->view_addExam();
                break;
            case $baseURL.'/coursePage';
                require_once "controller/coursesTeacherController.php";
                $coursePageTeacher = new coursesTeacherController();
                echo $coursePageTeacher->view_coursePage();
                break;
            case $baseURL.'/coursePage2';
                require_once "controller/coursesTeacherController.php";
                $coursePageTeacher = new coursesTeacherController();
                echo $coursePageTeacher->view_coursePage2();
                break;
            case $baseURL.'/coursePage3';
                require_once "controller/coursesTeacherController.php";
                $coursePageTeacher = new coursesTeacherController();
                echo $coursePageTeacher->view_coursePage3();
                break;
            case $baseURL.'/courses';
                require_once "controller/coursesMemberController.php";
                $courses = new coursesMemberController();
                echo $courses->view_courses();
                break;
            case $baseURL.'/myCourses';
                require_once "controller/coursesMemberController.php";
                $myCourses = new coursesMemberController();
                echo $myCourses->view_enrolledCourses();
                break;
            default:
                echo '404 Not Found';
                break;
        }
    }else if($_SERVER["REQUEST_METHOD"] == "POST"){
        switch($url){
            case $baseURL.'/submitRegister';
                require_once "controller/registerController.php";
                $indexCtrl = new registerController();
                $indexCtrl->add_accountMember();
                header('Location: index');
                break;
            case $baseURL.'/submitRegisterTeacher';
                require_once "controller/uploadController.php";
                $uploadCtrl = new uploadController();
                $uploadCtrl->upload();
                header('Location: index');
                break;
            case $baseURL.'/submitSignIn';
                require_once "controller/signInController.php";
                $indexCtrl = new signInController();
                $indexCtrl->check_signIn();
                header('Location: index');
                break;
            case $baseURL.'/signinTeacher';
                require_once "controller/signInController.php";
                $signInTeacherCtrl = new signInController();
                $signInTeacherCtrl->check_signInTeacher();
                header('Location: index');
                break;
            case $baseURL.'/updateProfile';
                require_once "controller/editProfileController.php";
                $signInTeacherCtrl = new editProfileController();
                $signInTeacherCtrl->edit_profile();
                header('Location: profileMember');
                break;
            case $baseURL.'/buyCredit';
                require_once "controller/walletController.php";
                $buyCredit = new walletController();
                $buyCredit->add_transaksiKupon();
                header('Location: buyCredit');
                break;
            case $baseURL.'/validateWallet';
                require_once "controller/adminController.php";
                $adminCtrl = new adminController();
                $adminCtrl->validate_wallet();
                header('Location: admin');
                break;
            case $baseURL.'/addCourseTeacher';
                require_once "controller/coursesTeacherController.php";
                $coursesTeacherCtrl = new coursesTeacherController();
                $coursesTeacherCtrl->add_Courses();
                header('Location: coursePage');
                break;
            case $baseURL.'/addCourseTeacher2';
                require_once "controller/coursesTeacherController.php";
                $coursesTeacherCtrl = new coursesTeacherController();
                $coursesTeacherCtrl->add_Courses();
                header('Location: coursePage2');
                break;
            case $baseURL.'/addModule';
                require_once "controller/addModuleController.php";
                $addModuleCtrl = new addModuleController();
                $addModuleCtrl->addModule();
                header('Location: coursePage3');
                break;
            case $baseURL.'/addExam';
                require_once "controller/addExamController.php";
                $addExamCtrl = new addExamController();
                $addExamCtrl->add_Exam();
                header('Location: coursePage');
                break;
            case $baseURL.'/seeMore';
                require_once "controller/seeMoreController.php";
                $seeMore = new seeMoreController();
                echo $seeMore->view_coursePage();
                break;
            case $baseURL.'/orderSummary';
                require_once "controller/orderSummaryController.php";
                $orderSummary = new orderSummaryController();
                echo $orderSummary->view_orderSummary();
                break;
            case $baseURL.'/enroll';
                require_once "controller/enrollController.php";
                $enroll = new enrollController();
                $enroll->add_enroll();
                header('Location: myCourses');
                break;
            case $baseURL.'/seeCourse';
                require_once "controller/seeCourseController.php";
                $seeCourse = new seeCourseController();
                echo $seeCourse->view_seeCourse();
                break;
            default:
                echo '404 Not Found';
                break;
        }
    }
    
?>