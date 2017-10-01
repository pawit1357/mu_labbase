<?php
ini_set ( 'max_execution_time', 0 );
class CommonUtil {
	
	public static function convertModelToArray($models) {
		if (is_array($models))
			$arrayMode = TRUE;
		else {
			$models = array($models);
			$arrayMode = FALSE;
		}
	
		$result = array();
		foreach ($models as $model) {
			$attributes = $model->getAttributes();
			$relations = array();
			foreach ($model->relations() as $key => $related) {
				if ($model->hasRelated($key)) {
					$relations[$key] = convertModelToArray($model->$key);
				}
			}
			$all = array_merge($attributes, $relations);
	
			if ($arrayMode)
				array_push($result, $all);
			else
				$result = $all;
		}
		return $result;
	}
	
	public static function IsNullOrEmptyString($question) {
		return (! isset ( $question ) || trim ( $question ) === '');
	}
	public static function deleteDirectory($dirPath) {
		if (! is_dir ( $dirPath )) {
			throw new InvalidArgumentException ( "$dirPath must be a directory" );
		}
		if (substr ( $dirPath, strlen ( $dirPath ) - 1, 1 ) != '/') {
			$dirPath .= '/';
		}
		$files = glob ( $dirPath . '*', GLOB_MARK );
		foreach ( $files as $file ) {
			if (is_dir ( $file )) {
				self::deleteDirectory ( $file );
			} else {
				unlink ( $file );
			}
		}
		rmdir ( $dirPath );
	}
	function clean($string) {
		$string = str_replace ( ' ', '-', $string ); // Replaces all spaces with hyphens.
		
		return preg_replace ( '/[^A-Za-z0-9\-]/', '', $string ); // Removes special chars.
	}
	public static function endsWith($FullStr, $needle) {
		$StrLen = strlen ( $needle );
		$FullStrEnd = substr ( $FullStr, strlen ( $FullStr ) - $StrLen );
		return $FullStrEnd == $needle;
	}
	public static function dateDiff($date1, $date2) {
		// $datetime1 = new DateTime ( $date1 );
		// $datetime2 = new DateTime ( $date2 );
		// $interval = $datetime1->diff ( $datetime2 );
		// return $interval->format ( '%a' );
		$unixOriginalDate = strtotime ( $date1 );
		$unixNowDate = strtotime ( $date2 );
		$difference = $unixNowDate - $unixOriginalDate;
		$days = ( int ) ($difference / 86400);
		$hours = ( int ) ($difference / 3600);
		$minutes = ( int ) ($difference / 60);
		$seconds = $difference;
		return $days;
	} // end function dateDiff
	public static function getDateThai($date) {
		list ( $year, $month, $day ) = explode ( "-", $date );
		return $day . '/' . $month . '/' . ((( int ) $year)+543);
	}
	public static function getDate($date) {
		list ( $day, $month, $year ) = explode ( "/", $date );
		 
		return  ((( int ) $year)-543) . '-' . $month . '-' . $day;
	}
	public function upload($file) {
		$currentdir = getcwd ();
	
		$upload_dir = $currentdir . "/uploads/";
		$file_dir = $upload_dir . $file ["name"];
	
		$move = move_uploaded_file ( $file ["tmp_name"], $file_dir );
		return $file_dir;
	}
	// public static function getLastRevision($ref_doc) {
	// $criteria = new CDbCriteria ();
	// $criteria->condition = "refer_doc ='" . $ref_doc . "'";
	// $criteria->order = 'id DESC';
	// $row = Form1::model ()->find ( $criteria );
	// $somevariable = $row->revision;
	// return $somevariable + 1;
	// }
	// public static function getLastRevision_Form2($ref_doc, $type) {
	// $criteria = new CDbCriteria ();
	// $criteria->condition = "ref_doc ='" . $ref_doc . "' AND type=" . $type;
	// $criteria->order = 'id DESC';
	// $row = Form2::model ()->find ( $criteria );
	// $somevariable = $row->revision;
	// return $somevariable + 1;
	// }
	// public static function getLastRevision_Form3($ref_doc) {
	// $criteria = new CDbCriteria ();
	// $criteria->condition = "ref_doc ='" . $ref_doc . "'";
	// $criteria->order = 'id DESC';
	// $row = Form3::model ()->find ( $criteria );
	// $somevariable = $row->revision;
	// return $somevariable + 1;
	// }
	// public static function getLastRevision_Form6($ref_doc) {
	// $criteria = new CDbCriteria ();
	// $criteria->condition = "ref_doc ='" . $ref_doc . "'";
	// $criteria->order = 'id DESC';
	// $row = Form6::model ()->find ( $criteria );
	// $somevariable = $row->revision;
	// return $somevariable + 1;
	// }
	public static function getValue($id) {
		$criteria = new CDbCriteria ();
		$criteria->condition = "id ='" . $id . "'";
		$criteria->order = 'id DESC';
		$row = MSetting::model ()->find ( $criteria );
		$somevariable = $row->value;
		return $somevariable;
	}
	public static function reArrayFiles($file_post) {
		$file_ary = array ();
		$file_count = count ( $file_post ['name'] );
		$file_keys = array_keys ( $file_post );
		
		for($i = 0; $i < $file_count; $i ++) {
			foreach ( $file_keys as $key ) {
				$file_ary [$i] [$key] = $file_post [$key] [$i];
			}
		}
		
		return $file_ary;
	}
	/* #MASTER# */
	const CHECKBOX_TYPE = "1";
	const TEXT_TYPE = "2";
	const TABLE_TYPE = "3";
	const FILE_TYPE = "4";
	/* QUERY */
	const SURVEY_BIO = "1";
	const SURVEY_CHEM = "2";
	const SURVEY_OCC = "3";
	const SURVEY_RADBASE = "4";
	
}
?>