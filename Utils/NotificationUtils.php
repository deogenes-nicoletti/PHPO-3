<?php
	namespace Utils;

	class NotificationUtils
	{
		public function notificateToBrowser($strTitle = '', $strMessage = '', $boolDieProgram = false)
		{
			echo sprintf("<script>alert('%s');</script>", $strMessage);

			if($boolDieProgram)
				die();
		}
	}