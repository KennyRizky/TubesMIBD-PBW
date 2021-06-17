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
		
		if(isset($_SESSION['username'])){
			include 'view/layout/layout2.php';
			$include = ob_get_contents();
			ob_end_clean();
			return $include;
		}else{
			include 'view/layout/layout.php';
			$include = ob_get_contents();
			ob_end_clean();
			return $include;
		}
	}
}
?>