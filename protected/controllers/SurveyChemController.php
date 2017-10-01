<?php
/**
 * SiteController is the default controller to handle user requests.
 */
class SurveyChemController extends CController {
	public $layout = '_main';
	private $_model;
	public function actionIndex() {
		// Authen Login
		if (! UserLoginUtils::isLogin ()) {
			$this->redirect ( Yii::app ()->createUrl ( 'Site/login' ) );
		}
		
		if (! UserLoginUtils::authorizePage ( $_SERVER ['REQUEST_URI'] )) {
			$this->redirect ( Yii::app ()->createUrl ( 'DashBoard/Permission' ) );
		}
		
		if (isset ( $_POST ['answer_choices'] )) {
			
			$transaction = Yii::app ()->db->beginTransaction ();
			// other
			// 1.1.1A x
			// 1.1.2A x
			// 1.1.2B.5 x
			// 1.1.3A x
			// 1.1.3B.4 x
			// 1.2.2A x
			// 1.2.3A x
			// 1.2.5A x
			// 1.3.2B.1A x
			// 1.3.2B.1B x
			// 1.4B
			// 1.5.1B.2
			// 1.5.5B
			
			$answer_choices = $_POST ['answer_choices'];
			$answer_texts = $_POST ['answer_texts'];
			$answer_files = $_FILES ['answer_files'];
			// Delete old role
			$cri = new CDbCriteria ();
			$cri->condition = " department_id='" . UserLoginUtils::getRegisterInfo ()->dep_department_id . "'";
			Answers::model ()->deleteAll ( $cri );
			// CHOICE
			foreach ( $answer_choices as $key1 => $value1 ) {
				// echo "-------#" . $key1 . "," . $value1 . "<br>";
				$ans = new Answers ();
				
				$ans->question_id = $key1;
				$ans->value = $value1;
				$ans->type = CommonUtil::CHECKBOX_TYPE;
				$ans->survey_type = CommonUtil::SURVEY_CHEM;
				$ans->department_id = UserLoginUtils::getRegisterInfo ()->dep_department_id;
				$ans->create_by = UserLoginUtils::getUsersLoginId ();
				$ans->create_date = date ( "Y-m-d H:i:s" );
				$ans->update_by = UserLoginUtils::getUsersLoginId ();
				$ans->update_date = date ( "Y-m-d H:i:s" );
				// $ans->department_id = UserLoginUtils::getDepartmentId();
				$ans->save ();
			}
			// CHOICE
			foreach ( $answer_texts as $key1 => $value1 ) {
				// echo "-------#" . $key1 . "," . $value1 . "<br>";
				if (! CommonUtil::IsNullOrEmptyString ( $value1 )) {
					$ans = new Answers ();
					
					$ans->question_id = $key1;
					$ans->value = $value1;
					$ans->type = CommonUtil::TEXT_TYPE;
					$ans->type = CommonUtil::CHECKBOX_TYPE;
					$ans->survey_type = CommonUtil::SURVEY_CHEM;
					$ans->create_by = UserLoginUtils::getUsersLoginId ();
					$ans->create_date = date ( "Y-m-d H:i:s" );
					$ans->update_by = UserLoginUtils::getUsersLoginId ();
					$ans->update_date = date ( "Y-m-d H:i:s" );
					// $ans->department_id = UserLoginUtils::getDepartmentId();
					$ans->save ();
				}
			}
			// FILES
			$QuesIdList = array (
					"1.1.1A",
					"1.2.2A",
					"1.2.4B.2",
					"1.2.6A",
					"1.2.7A" 
			)
			// "1.1.1B",
			// "1.2.2B",
			// "1.2.4B.2",
			// "1.2.6B",
			// "1.2.7B"
			;
			if (isset ( $answer_files )) {
				$file_ary = CommonUtil::reArrayFiles ( $answer_files );
				
				$index = 0;
				foreach ( $file_ary as $file ) {
					if ($file ['size'] > 0) {
						
						CommonUtil::upload ( $file );
						$ans = new Answers ();
						
						$ans->question_id = $QuesIdList [$index];
						$ans->value = '/uploads/' . $file ['name'];
						$ans->type = CommonUtil::FILE_TYPE;
						$ans->type = CommonUtil::CHECKBOX_TYPE;
						$ans->survey_type = CommonUtil::SURVEY_CHEM;
						$ans->create_by = UserLoginUtils::getUsersLoginId ();
						$ans->create_date = date ( "Y-m-d H:i:s" );
						$ans->update_by = UserLoginUtils::getUsersLoginId ();
						$ans->update_date = date ( "Y-m-d H:i:s" );
						// $ans->department_id = UserLoginUtils::getDepartmentId();
						$ans->save ();
						
						echo '==>' . $index;
					}
					$index ++;
				}
			}
			$tmpfilePath = isset ( $_POST ['tmpPath'] ) ? $_POST ['tmpPath'] : NULL;
			if (isset ( $tmpfilePath )) {
				foreach ( $tmpfilePath as $key1 => $value1 ) {
					// echo "-------#" . $key1 . "," . $value1 . "<br>";
					
					if (isset ( $answer_files )) {
						$file_ary = CommonUtil::reArrayFiles ( $answer_files );
						
						$bExist = false;
						$index = 0;
						foreach ( $file_ary as $file ) {
							if ($file ['size'] > 0) {
								if ($QuesIdList [$index] == $key1) {
									$bExist = true;
								}
							}
							$index ++;
						}
						if (! $bExist) {
							$ans = new Answers ();
							
							$ans->question_id = $key1;
							$ans->value =  $value1;
							$ans->type = CommonUtil::FILE_TYPE;
							$ans->type = CommonUtil::CHECKBOX_TYPE;
							$ans->survey_type = CommonUtil::SURVEY_CHEM;
							$ans->create_by = UserLoginUtils::getUsersLoginId ();
							$ans->create_date = date ( "Y-m-d H:i:s" );
							$ans->update_by = UserLoginUtils::getUsersLoginId ();
							$ans->update_date = date ( "Y-m-d H:i:s" );
							$ans->department_id = $_GET ['id'];
							$ans->save ();
						}
					}
				}
			}
			$transaction->commit ();
			$this->render ( '//surveychem/result' );
		} else {
			$this->render ( '//surveychem/main' );
		}
	}
	public function actionView() {
		// Authen Login
		if (! UserLoginUtils::isLogin ()) {
			$this->redirect ( Yii::app ()->createUrl ( 'Site/login' ) );
		}
		
		$this->render ( '//surveychem/main' );
	}
	public function actionPermission() {
		// Authen Login
		if (! UserLoginUtils::isLogin ()) {
			$this->redirect ( Yii::app ()->createUrl ( 'Site/login' ) );
		}
		$this->render ( '//surveychem/permission' );
	}
}

/**
 * for loop ตามจำนวนข้อทั้งหมด
 * 1. ตรวจอสบประเภทว่าเป็น choice,text,file แล้วนำข้อมูลใส่ field
 * answers_choice
 * answers_file
 * answers_others
 * answers_texts
 * answers_col1-x
 *
 *
 */