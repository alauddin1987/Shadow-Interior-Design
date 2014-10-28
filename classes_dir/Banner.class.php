<?php
class Banner
{

    private $recTime;
    public static $tableName;
    public static $PrimeryKey;
	public static $extendent_folder_path;
	public static $file_permission_list;

    function __construct()
	{
	  $this-> recTime = date ('y-m-d H:i:s');
	  self::$tableName = TABLE_PREFIX.'banner';
	  self::$PrimeryKey = DataProcess::getPrimKey(self::$tableName);
	  self::$extendent_folder_path = 'banners/';
	  self::$file_permission_list = 'jpg, jpeg, gif, pdf';
	}

	public function add()
	{
		
		$_POST['status'] = 'active';

		$_POST['recTime'] = $this->recTime;

		$_POST['recBy'] = $_SESSION['adminId'];

		
		if($_FILES['photo']['name']!='') {
			DataValidator::isValidPhoto(self::$file_permission_list, 'photo');
		
			$Uploader = new Uploader();
			$_POST['photo'] = $Uploader -> photoNamer(1, 'photo', BANNER_WIDTH, self::$extendent_folder_path);
		}

		DataProcess::saveData($_POST, self::$tableName, false);
		
		echo "<script type=\"text/javascript\">location.replace(\"bannerView.php?msg=ok\");</script>";
	}
	
	public function get($bannerId)
	{
		$contentId = DataValidator::isNumeric('var', $bannerId, SE.' (banner::getbanner::bannerId)');

		$sql = "SELECT * FROM ".self::$tableName." WHERE ".self::$PrimeryKey."=$bannerId";
		
		$result = Database::query($sql, 2, __FILE__, __LINE__);
		
		return $result;	
	}
	
	public function gets($condition='')
	{
		$sql = "SELECT * FROM ".self::$tableName." WHERE status!='deleted' $condition ORDER BY ".self::$PrimeryKey." ASC";
		
		$result = Database::query($sql, 2, __FILE__, __LINE__);
		
		return $result;
	}
	
	public function edit($bannerId)
	{
		
		if($_FILES['photo']['name']!='') {
			DataValidator::isValidPhoto(self::$file_permission_list, 'photo');
			
			$Uploader = new Uploader();
			
			$Uploader -> photoDelete($_POST['curphoto'], self::$extendent_folder_path);			
			$_POST['photo'] = $Uploader -> photoNamer(1, 'photo', BANNER_WIDTH, self::$extendent_folder_path);
			
		}
		
		DataProcess::saveData($_POST, self::$tableName, false);
		
		echo "<script type=\"text/javascript\">location.replace(\"bannerView.php?msg=ok\");</script>";
	}
	
	public function delete($bannerId)
	{
		
		$result = $this -> get($bannerId);
		
		$show = $result -> fetch_array(MYSQL_ASSOC);	
		
		$Uploader = new Uploader();
		
		$Uploader -> photoDelete($show['photo'], self::$extendent_folder_path);		
		
		$sql = "UPDATE ".self::$tableName." SET status='deleted' WHERE ".self::$PrimeryKey."=$bannerId";
		
		Database::query($sql, 2, __FILE__, __LINE__);
		
	}
}
?>
