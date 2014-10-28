<?php
class News
{

    private $recTime;
    public static $tableName;
    public static $PrimeryKey;
    public static $tableNewsCategory;
	public static $extendent_folder_path;
	public static $file_permission_list;
    function __construct()
	{
	  $this-> recTime = date ('y-m-d H:i:s');
	  self::$tableName = TABLE_PREFIX.'news';
	  self::$PrimeryKey = DataProcess::getPrimKey(self::$tableName);
	  self::$tableNewsCategory = TABLE_PREFIX.'news_category';
	  self::$extendent_folder_path = 'newses/';
	  self::$file_permission_list = 'jpg, jpeg, gif, pdf';
	}

	public function add()
	{
		$_POST['news_date'] = Common::converToMysqlDate($_POST['news_date']);

		$_POST['status'] = 'active';

		$_POST['recTime'] = $this->recTime;

		$_POST['recBy'] = $_SESSION['adminId'];

		
		if($_FILES['photo']['name']!='') {
			DataValidator::isValidPhoto(self::$file_permission_list, 'photo');
		
			$Uploader = new Uploader();
			$_POST['photo'] = $Uploader -> photoNamer(1, 'photo', WIDTH_RANGE_LARGE, self::$extendent_folder_path);
		}
		//$_POST['description'] = DataValidator::sanitizeSpecialChars('post', 'description', 'Please input a first name.');	 
		$_POST['description'] = str_replace("'", "", $_POST['description']);
		DataProcess::saveData($_POST, self::$tableName, false);

		echo "<script type=\"text/javascript\">location.replace(\"newsView.php?msg=ok\");</script>";
	}
		
	//Edit ar Dispaly
	public function getnews($newsId)
	{
		$newsId = DataValidator::isNumeric('var', $newsId, SE.' (news::getnews::newsId)');

		$sql = "SELECT * FROM ".self::$tableName." WHERE ".self::$PrimeryKey."=$newsId AND status!='deleted'";
		
		$result = Database::query($sql, 2, __FILE__, __LINE__);
		
		return $result;	
	}
	
		//Viwe
	public function getnewses($condition='', $orderBy = 'news_date')
	{
		$sql = "SELECT n.*, nc.name news_category FROM ".self::$tableName." n
		LEFT JOIN ".self::$tableNewsCategory." nc ON nc.id = n.category
		WHERE n.status!='deleted' $condition ORDER BY {$orderBy} DESC";
		
		$result = Database::query($sql, 2, __FILE__, __LINE__);
		
		return $result;
	}
	
	public function gets($condition='')
	{
		$sql = "SELECT * FROM ".self::$tableName." WHERE status!='deleted' $condition";
		
		$result = Database::query($sql, 2, __FILE__, __LINE__);
		
		return $result;
	}
	
	public function edit()
	{
		$_POST['news_date'] = Common::converToMysqlDate($_POST['news_date']);
		
		if($_FILES['photo']['name']!='') {
			DataValidator::isValidPhoto(self::$file_permission_list, 'photo');
		
			$Uploader = new Uploader();
			$Uploader -> photoDelete($_POST['curphoto'], self::$extendent_folder_path);			
			$_POST['photo'] = $Uploader -> photoNamer(1, 'photo', WIDTH_RANGE_LARGE, self::$extendent_folder_path);
		}
		$_POST['description'] = str_replace("'", "", $_POST['description']);
		//$_POST['description'] = DataValidator::sanitizeSpecialChars('post', 'description', 'Please input a first name.');	 
		DataProcess::saveData($_POST, self::$tableName, false);

		
		echo "<script type=\"text/javascript\">location.replace(\"newsView.php?msg=ok\");</script>";
	}
	
	public function delete($newsId)
	{
		
		$result = $this -> getnews($newsId);
		
		$show = $result -> fetch_array(MYSQL_ASSOC);	
		
		$Uploader = new Uploader();
		
		$Uploader -> photoDelete($show['photo'], self::$extendent_folder_path);		
		
		$sql = "UPDATE ".self::$tableName." SET status='deleted' WHERE ".self::$PrimeryKey."=$newsId";
		
		Database::query($sql, 2, __FILE__, __LINE__);
	}
}
?>
