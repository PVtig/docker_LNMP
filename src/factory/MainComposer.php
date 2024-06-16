<?
	class MainComposer{
		public function getClass($type){
			
			switch($type){
				case "user": return new UserPostsComposer;
				case "report": return new ReportPostsComposer;
				case "garage": return new GaragePostsComposer;
				case "car": return new CarPostsComposer;
				case "event": return new EventPostsComposer;
				default: throw new Exception("Error type");
			}
		}
	}
