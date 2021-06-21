<?php
session_start();
class View{
	public static function createView($view,$param){
		foreach ($param as $key => $value) {
			$$key = $value;
		}
		ob_start();
		include 'view/'.$view;
		$content = ob_get_contents();
		ob_end_clean();
		
		ob_start();
		
		if($view === 'admin.php'){
			include 'view/layout/layoutAdmin.php';
			$include = ob_get_contents();
			ob_end_clean();
			return $include;
		}
		else if(isset($_SESSION['username'])){
			include 'view/layout/layout2.php';
			$include = ob_get_contents();
			ob_end_clean();
			return $include;
		}
		else if(isset($_SESSION['usernameTeacher'])){
			include 'view/layout/layout3.php';
			$include = ob_get_contents();
			ob_end_clean();
			return $include;
		}
		
		else{
			include 'view/layout/layout.php';
			$include = ob_get_contents();
			ob_end_clean();
			return $include;
		}

		
	}
}
?>