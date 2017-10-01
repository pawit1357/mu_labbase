<?php
/**
 * SiteController is the default controller to handle user requests.
 */
class SurveyBioController extends CController {
	public $layout = '_main';
	private $_model;
	
	/**
	 * Index action is the default action in a controller.
	 */
	public function actionIndex() {
		// Authen Login
		if (! UserLoginUtils::isLogin ()) {
			$this->redirect ( Yii::app ()->createUrl ( 'Site/login' ) );
		}
		
		if (! UserLoginUtils::authorizePage ( $_SERVER ['REQUEST_URI'] )) {
			$this->redirect ( Yii::app ()->createUrl ( 'DashBoard/Permission' ) );
		}
		
		if (isset ( $_POST ['answers_choices'] )) {
			
			$transaction = Yii::app ()->db->beginTransaction ();
			
			$answers_choices = $_POST ['answers_choices'];
			$answer_texts = $_POST ['answer_texts'];
			$answer_files = $_FILES ['answer_files'];
			
			// $listOfHasOtherQid = array (
			// "2.1.1A" => "0", //
			// "2.1.2A" => "1", //
			// "2.1.3.5" => "1", //
			// "2.1.3A" => "0", //
			// "2.1.4A" => "0", //
			// "2.1.6A.4" => "1", //
			// "2.1.6A" => "0", //
			// "2.1.8A" => "1"
			// );
			
			// FILES
			$QuesIdList = array (
					"2.1.1A",
					"2.1.4A",
					"2.1.7A",
					"2.2.2A" 
			);
			// Delete old role
			$cri = new CDbCriteria ();
			$cri->condition = " department_id='" . UserLoginUtils::getRegisterInfo ()->dep_department_id . "'";
			Answers::model ()->deleteAll ( $cri );
			
			// CHOICE
			foreach ( $answers_choices as $choice_key => $choice_value ) {
				$ans = new Answers ();
				$ans->question_id = $choice_key;
				$ans->value = $choice_value;
				$ans->type = CommonUtil::CHECKBOX_TYPE;
				$ans->survey_type = CommonUtil::SURVEY_BIO;
				$ans->department_id = UserLoginUtils::getRegisterInfo ()->dep_department_id;
				$ans->create_by = UserLoginUtils::getUsersLoginId ();
				$ans->create_date = date ( "Y-m-d H:i:s" );
				$ans->update_by = UserLoginUtils::getUsersLoginId ();
				$ans->update_date = date ( "Y-m-d H:i:s" );
				
				// if (QuestionUtil::isChildOfSelectedChoice ( $listOfHasOtherQid, $ans->question_id, $ans->value )) {
				$ans->save ();
				// }
			}
			
			// TEXT
			foreach ( $answer_texts as $key => $value ) {
				if (! CommonUtil::IsNullOrEmptyString ( $value )) {
					
					$ans = new Answers ();
					$ans->question_id = $key;
					$ans->value = $value;
					$ans->type = CommonUtil::TEXT_TYPE;
					$ans->survey_type = CommonUtil::SURVEY_BIO;
					$ans->department_id = UserLoginUtils::getRegisterInfo ()->dep_department_id;
					$ans->create_by = UserLoginUtils::getUsersLoginId ();
					$ans->create_date = date ( "Y-m-d H:i:s" );
					$ans->update_by = UserLoginUtils::getUsersLoginId ();
					$ans->update_date = date ( "Y-m-d H:i:s" );
					$ans->save ();
				}
			}
			
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
						$ans->survey_type = CommonUtil::SURVEY_BIO;
						$ans->department_id = UserLoginUtils::getRegisterInfo ()->dep_department_id;
						$ans->create_by = UserLoginUtils::getUsersLoginId ();
						$ans->create_date = date ( "Y-m-d H:i:s" );
						$ans->update_by = UserLoginUtils::getUsersLoginId ();
						$ans->update_date = date ( "Y-m-d H:i:s" );
						$ans->save ();
					}
					$index ++;
				}
			}
			
			$tmpfilePath = isset ( $_POST ['tmpPath'] ) ? $_POST ['tmpPath'] : NULL;
			if (isset ( $tmpfilePath )) {
				foreach ( $tmpfilePath as $key1 => $value1 ) {
					
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
							$ans->survey_type = CommonUtil::SURVEY_BIO;
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
			$this->render ( '//surveybio/result' );
		} else {
			$this->render ( '//surveybio/main' );
		}
	}
	public function actionView() {
		// Authen Login
		if (! UserLoginUtils::isLogin ()) {
			$this->redirect ( Yii::app ()->createUrl ( 'Site/login' ) );
		}
		
		$this->render ( '//surveybio/main' );
	}
	public function actionPermission() {
		// Authen Login
		if (! UserLoginUtils::isLogin ()) {
			$this->redirect ( Yii::app ()->createUrl ( 'Site/login' ) );
		}
		
		$this->render ( '//surveybio/permission' );
	}
}

