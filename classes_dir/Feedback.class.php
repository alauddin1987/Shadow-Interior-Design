<?php
class Feedback
{

    private $recTime;
    public static $tableName;
	public static $PrimeryKey;

    function __construct()
	{
	  $this-> recTime = date ('y-m-d H:i:s');
	  self::$tableName = TABLE_PREFIX.'feedback';
	  self::$PrimeryKey = DataProcess::getPrimKey(self::$tableName);
	}

	public function add()
	{
		$_POST['name'] = DataValidator::sanitizeSpecialChars('post', 'name', 'Please input your name.');
		$_POST['email'] = DataValidator::isEmail('post', 'email', 'E-mail address seems to be incorrect');
		$_POST['message'] = DataValidator::sanitizeSpecialChars('post', 'message', 'Please input message.');
						
		DataProcess::saveData($_POST, self::$tableName, false);
		//Common::sendMail();
		echo "<script type=\"text/javascript\">location.replace(\"contact_us.php?msg=Your feedback has been saved!\");</script>";
	}
	
	//Edit ar Dispaly
	public function get($feedbackId)
	{
	
		$sql = "SELECT * FROM ".self::$tableName." WHERE ".self::$PrimeryKey."=$feedbackId";
		
		$result = Database::query($sql, 2, __FILE__, __LINE__);
		
		return $result;	
	}
	
	//Viwe
	public function gets($feedbackId = 'id', $orderBy='recTime')
	{
		$sql = "SELECT * FROM ".self::$tableName." WHERE status!='deleted' ORDER BY {$orderBy} DESC";
		
		$result = Database::query($sql, 2, __FILE__, __LINE__);
		
		return $result;
	}
	
	public function delete($feedbackId)
	{
		$sql = "UPDATE ".self::$tableName." SET status='deleted' WHERE ".self::$PrimeryKey."=$feedbackId";
		
		Database::query($sql, 2, __FILE__, __LINE__);
		
	}
}
?>
