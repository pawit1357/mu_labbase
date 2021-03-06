<?php
class ConfigUtil {
	private static $emailSubject = 'ระบบสารสนเทศฐานข้อมูลห้องปฏิบัติการทางวิทยาศาสตร์';
	private static $hostName = 'http://localhost:81/';
	private static $siteName = 'http://localhost:81/labbase/index.php/Site/LogOut';
	private static $ApplicationTitle = 'LabBase| ระบบสารสนเทศฐานข้อมูลห้องปฏิบัติการทางวิทยาศาสตร์';
	private static $ApplicationCopyRight = '2012 &copy; ศูนย์บริหารความปลอดภัยอาชีวอนามัยและสิ่งแวดล้อม มหาวิทยาลัยมหิดล ศาลายา';
	private static $ApplicationAddress = '';
	private static $ApplicationUpdateVersion = '<li class="fa fa-clock-o"></li> &nbsp;Lasted Update 2016-03-20';
// 	private static $AppName = '';	
	private static $AppName = '/labbase';
	
	private static $btnAddButton = 'เพิ่มข้อมูล';
	private static $btnSaveButton = 'บันทึก';
	private static $btnCancelButton = 'ยกเลิก';
	private static $btnCloseButton = 'ปิด';


	private static $defaultPageSize = 200;

	public static function getDbName() {
		$str = Yii::app()->db->connectionString;
		list($host, $db) = explode(';', $str);
		list($xx, $dbName) = explode('=', $db);
		return $dbName;
	}
	public static function getHostName() {
		$str = Yii::app()->db->connectionString;
		list($host, $db) = explode(';', $str);
		list($xx, $hostName) = explode('=', $host);
		return $hostName;
	}
	
	public static function getBtnAddName(){
		return self::$btnAddButton;	
	}
	public static function getBtnCloseName(){
		return self::$btnCloseButton;
	}
	public static function getBtnSaveButton(){
		return self::$btnSaveButton;
	}
	public static function getBtnCancelButton(){
		return self::$btnCancelButton;
	}
	
	public static function getUsername() {
		return Yii::app()->db->username;
	}
	public static function getPassword() {
		return Yii::app()->db->password;
	}
	public static function getSiteName() {
		return self::$siteName;
	}

	public static function getAppName() {
		return self::$AppName;
	}
	public static function getApplicationTitle() {
		return self::$ApplicationTitle;
	}
	public static function getApplicationCopyRight() {
		return self::$ApplicationCopyRight;
	}
	public static function getApplicationAddress() {
		return self::$ApplicationAddress;
	}
	
	public static function getApplicationUpdateVersion() {
		return self::$ApplicationUpdateVersion;
	}
	
	public static function getDefaultPageSize() {
		return self::$defaultPageSize;
	}
	public static function getUrlHostName() {
		return self::$hostName;
	}
	
	/* EMAIL */
	public static function getEmailSubject() {
		return self::$emailSubject;
	}
	public static function getEmailTemplatePath() {
		return self::$hostName.''.self::$AppName.'/template/email_template.php';
	}
	public static function getEmailForgotTemplatePath() {
		return self::$hostName.''.self::$AppName.'/template/email_forgot_template.php';
	}
}
?>