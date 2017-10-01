<?php
/**
 * SiteController is the default controller to handle user requests.
 */
class SurveyOccController extends CController {
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
			// 1.2.2.2A x
			// 1.2.3.1A x
			// 1.3A.1 x
			// 1.3A.2 x
			// 1.3A.3 x
			// 1.3A.4 x
			// 2.3.1A.5
			// 2.3.1A.6 x
			// 2.3.1A.7 x
			// 3.2.1A x
			// 2.3.2.1A x
			// 2.3.2.2A x
			// ---
			// 3.5.1A.6.A
			// 3.5.1A.1.C
			// 3.5.1A.2.C
			// 3.5.1A.3.C
			// 3.5.1A.4.C
			// 3.5.1A.5.C
			// 3.5.1A.6.D
			// --
			// 3.5.2A.B
			// 3.5.3A.B
			// 4.2.1A.2
			// 4.2.3A
			// 4.2.3B
			// 4.2.3C
			
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
				$ans->survey_type = CommonUtil::SURVEY_OCC;
				$ans->department_id = UserLoginUtils::getRegisterInfo ()->dep_department_id;
				
				$ans->create_by = UserLoginUtils::getUsersLoginId ();
				$ans->create_date = date ( "Y-m-d H:i:s" );
				$ans->update_by = UserLoginUtils::getUsersLoginId ();
				$ans->update_date = date ( "Y-m-d H:i:s" );
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
					$ans->survey_type = CommonUtil::SURVEY_OCC;
					$ans->department_id = UserLoginUtils::getRegisterInfo ()->dep_department_id;
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
					"1.2.1A",
					"1.2.2.1",
					"1.2.3.2A",
					"2.2A",
					"3.1.1A",
					"3.5.1",
					"4.2.1A",
					"4.2.4A",
					"4.2.5A" 
			);
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
						$ans->survey_type = CommonUtil::SURVEY_OCC;
						$ans->department_id = UserLoginUtils::getRegisterInfo ()->dep_department_id;
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
							$ans->survey_type = CommonUtil::SURVEY_OCC;
							$ans->department_id = UserLoginUtils::getRegisterInfo ()->dep_department_id;
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
			$this->render ( '//surveyocc/result' );
		} else {
			$this->render ( '//surveyocc/main' );
		}
	}
	public function actionView() {
		// Authen Login
		if (! UserLoginUtils::isLogin ()) {
			$this->redirect ( Yii::app ()->createUrl ( 'Site/login' ) );
		}
		
		$this->render ( '//surveyocc/main' );
	}
	public function actionPermission() {
		// Authen Login
		if (! UserLoginUtils::isLogin ()) {
			$this->redirect ( Yii::app ()->createUrl ( 'Site/login' ) );
		}
		
		$this->render ( '//surveyocc/permission' );
	}
}