<?
	class MainComposer{
		public static function getClass($type): ?CRUDInterface{
			$ClassName = ucfirst($type.'PostsComposer');
			if(class_exists($ClassName)){
				return new $ClassName;
			}
			return print_r('class name not correct');
		}
	}
