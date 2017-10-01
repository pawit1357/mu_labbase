<?php
ini_set ( 'memory_limit', '-1' );
class RegisterReportController extends CController {
	public $layout = '_blank';
	private $_model;
	public function actionIndex() {
		if (isset ( $_POST ['LabRegister'] )) {
			
			$transaction = Yii::app ()->db->beginTransaction ();
			
			$pwd = '';
			$user = new UsersLogin ();
			$user->attributes = $_POST ['UsersLogin'];
			$pwd = $user->password;
			$user->password = md5 ( $user->password );
			$user->role_id = 3; // FIX STAFF
			$user->status = "I";
			$user->is_force_change_password = 1;
			$user->create_by = 1; // UserLoginUtils::getUsersLoginId ();
			$user->create_date = date ( "Y-m-d H:i:s" );
			// $model->update_by = 1;//UserLoginUtils::getUsersLoginId ();
			// $model->update_date = date ( "Y-m-d H:i:s" );
			
			if ($user->save ()) {
				
				$model = new LabRegister ();
				$model->attributes = $_POST ['LabRegister'];
				$model->create_by = - 1; // UserLoginUtils::getUsersLoginId ();
				$model->create_date = date ( "Y-m-d H:i:s" );
				$model->user_id = $user->id;
				
				if ($model->save ()) {
					$strSubject = "=?UTF-8?B?" . base64_encode ( ConfigUtil::getEmailSubject () ) . "?=";
					MailUtil::sendMail ( $user->email, $strSubject, self::GetConfirmEmailTemplate ( '', $user->title->name, $user->first_name, $user->last_name, $user->username, $pwd, '', '', '', '', '', $model->user_id ) );
				}
			}
			
			$transaction->commit ();
			$this->redirect ( array (
					'RegisterReport/Result',
					'user_id' => $user->id,
					'pwd' => $pwd 
			) );
		} else {
			// Render
			$this->render ( '//registerreport/main' );
		}
	}
	public function actionResult($user_id, $pwd) {
		$cri = new CDbCriteria ();
		$cri->condition = " t.user_id = " . $user_id;
		$model = LabRegister::model ()->findAll ( $cri );
		
		$user = UsersLogin::model ()->findByPk ( $user_id );
		
		$this->render ( '//registerreport/result', array (
				'data' => $model,
				'user' => $user,
				'pwd' => $pwd 
		) );
		
		// $this->render ( 'result' );
	}
	public function actionResult1($user_id, $pwd) {
		$cri = new CDbCriteria ();
		$cri->condition = " t.user_id = " . $user_id;
		$model = LabRegister::model ()->findAll ( $cri );
		
		$user = UsersLogin::model ()->findByPk ( $user_id );
		
		$this->render ( '//registerreport/result_1', array (
				'data' => $model,
				'user' => $user,
				'pwd' => $pwd 
		) );
		
		// $this->render ( 'result' );
	}
	public function actionResult2($user_id) {
		$user = UsersLogin::model ()->findByPk ( $user_id );
		if (isset ( $user )) {
			$user->status = 'A';
			$user->update ();
		}
		$this->render ( '//registerreport/result_2' );
	}
	public function loadModel() {
		if ($this->_model === null) {
			if (isset ( $_GET ['id'] )) {
				$id = addslashes ( $_GET ['id'] );
				$this->_model = LabRegister::model ()->findbyPk ( $id );
			}
			if ($this->_model === null)
				throw new CHttpException ( 404, 'The requested page does not exist.' );
		}
		return $this->_model;
	}
	public function GetConfirmEmailTemplate($lab_code, $title, $first_name, $last_name, $username, $pwd, $fac, $dep, $build, $lab_floor, $labtype, $user_id) {
		return '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<title></title>
	<style type="text/css">
#outlook a {
	padding: 0;
}

body {
	width: 100% !important;
	margin: 0;
}

body {
	-webkit-text-size-adjust: none;
}

body {
	margin: 0;
	padding: 0;
}

img {
	border: 0;
	height: auto;
	line-height: 100%;
	outline: none;
	text-decoration: none;
}

table td {
	border-collapse: collapse;
}

#backgroundTable {
	height: 100% !important;
	margin: 0;
	padding: 0;
	width: 100% !important;
}

@import
	url(http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700);

body, #backgroundTable {
	background-color: #FFF;
}

.TopbarLogo {
	padding: 10px;
	text-align: left;
	vertical-align: middle;
}

h1, .h1 {
	color: #444444;
	display: block;
	font-family: Open Sans;
	font-size: 35px;
	font-weight: 400;
	line-height: 100%;
	margin-top: 2%;
	margin-right: 0;
	margin-bottom: 1%;
	margin-left: 0;
	text-align: left;
}

h2, .h2 {
	color: #444444;
	display: block;
	font-family: Open Sans;
	font-size: 30px;
	font-weight: 400;
	line-height: 100%;
	margin-top: 2%;
	margin-right: 0;
	margin-bottom: 1%;
	margin-left: 0;
	text-align: left;
}

h3, .h3 {
	color: #444444;
	display: block;
	font-family: Open Sans;
	font-size: 24px;
	font-weight: 400;
	margin-top: 2%;
	margin-right: 0;
	margin-bottom: 1%;
	margin-left: 0;
	text-align: left;
}

h4, .h4 {
	color: #444444;
	display: block;
	font-family: Open Sans;
	font-size: 18px;
	font-weight: 400;
	line-height: 100%;
	margin-top: 2%;
	margin-right: 0;
	margin-bottom: 1%;
	margin-left: 0;
	text-align: left;
}

h5, .h5 {
	color: #444444;
	display: block;
	font-family: Open Sans;
	font-size: 14px;
	font-weight: 400;
	line-height: 100%;
	margin-top: 2%;
	margin-right: 0;
	margin-bottom: 1%;
	margin-left: 0;
	text-align: left;
}

.textdark {
	color: #444444;
	font-family: Open Sans;
	font-size: 13px;
	line-height: 150%;
	text-align: left;
}

.textwhite {
	color: #fff;
	font-family: Open Sans;
	font-size: 13px;
	line-height: 150%;
	text-align: left;
}

.fontwhite {
	color: #fff;
}

.btn {
	background-color: #e5e5e5;
	background-image: none;
	filter: none;
	border: 0;
	box-shadow: none;
	padding: 7px 14px;
	text-shadow: none;
	font-family: "Segoe UI", Helvetica, Arial, sans-serif;
	font-size: 14px;
	color: #333333;
	cursor: pointer;
	outline: none;
	-webkit-border-radius: 0 !important;
	-moz-border-radius: 0 !important;
	border-radius: 0 !important;
}

.btn:hover, .btn:focus, .btn:active, .btn.active, .btn[disabled], .btn.disabled
	{
	font-family: "Segoe UI", Helvetica, Arial, sans-serif;
	color: #333333;
	box-shadow: none;
	background-color: #d8d8d8;
}

.btn.red {
	color: white;
	text-shadow: none;
	background-color: #d84a38;
}

.btn.red:hover, .btn.red:focus, .btn.red:active, .btn.red.active, .btn.red[disabled],
	.btn.red.disabled {
	background-color: #bb2413 !important;
	color: #fff !important;
}

.btn.green {
	color: white;
	text-shadow: none;
	background-color: #35aa47;
}

.btn.green:hover, .btn.green:focus, .btn.green:active, .btn.green.active,
	.btn.green.disabled, .btn.green[disabled] {
	background-color: #1d943b !important;
	color: #fff !important;
}
</style>

</head>
<body>
	<table border="0" cellpadding="0" cellspacing="0" width="100%"
		style="background-color: #1f1f1f; height: 52px;">
		<tbody>
			<tr>
				<td align="center">
					<center>
						<table border="0" cellpadding="0" cellspacing="0" width="600px"
							style="height: 100%;">
							<tbody>
								<tr>
									<td align="left" valign="middle" style="padding-left: 20px;"><a
										href="#"> <img
											src="http://myapps1357.com/labbase/images/logo_main.png"
											alt="LabBase"></img>
									</a></td>

								</tr>
							</tbody>
						</table>
					</center>
				</td>
			</tr>
		</tbody>
	</table>
	<table border="0" cellpadding="0" cellspacing="0" width="100%">
		<tbody>
			<tr>
				<td style="padding-bottom: 20px;">
					<center>
						<table border="0" cellpadding="0" cellspacing="0" width="600px"
							style="height: 100%;">
							<tbody>
								<tr>
									<td valign="top" class="bodyContent">
										<table border="0" cellpadding="20" cellspacing="0"
											width="100%">
											<tbody>
												<tr>
													<td valign="top">
														<h4>ข้อมูลการลงทะเบียนห้องปฏิบัติการทางวิทยาศาสตร์ (รายงานประจำปี)</h4><br></br>
														<table>
															<tr>
																<td style="text-align: right">ชื่อ-นามสกุล :</td>
																<td>' . $title . ' ' . $first_name . ' ' . $last_name . '</td>
															</tr>
															<tr>
																<td style="text-align: right">รหัสผู้ใช้ :</td>
																<td>' . $username . '</td>
															</tr>
															<tr>
																<td style="text-align: right">รหัสผ่าน :</td>
																<td>' . $pwd . '</td>
															</tr>
														</table>

													</td>
													<td></td>
												</tr>
											</tbody>
										</table>
									</td>
								</tr>
							</tbody>
						</table>
					</center>
				</td>
			</tr>
		</tbody>
	</table>
	<table border="0" cellpadding="0" cellspacing="0" width="100%"
		style="background-color: #f8f8f8; border-top: 1px solid #e7e7e7; border-bottom: 1px solid #e7e7e7;">
		<tbody>
			<tr>
				<td>
					<center>
						<table border="0" cellpadding="0" cellspacing="0" width="600px"
							style="height: 100%;">
							<tbody>
								<tr>
									<td valign="top" style="font-size: 12px; padding: 20px;">
										<h3>ยืนยันการลงทะเบียน</h3>
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;กดลิงค์เพื่อยืนยันการลงทะเบียน ?
										<a href="http://myapps1357.com/labbase/index.php/RegisterReport/Result1/user_id/' . $user_id . '/pwd/' . $pwd . '">Click</a>
												
												
									</td>
								</tr>
							</tbody>
						</table>
					</center>
				</td>
			</tr>
		</tbody>
	</table>

	<table border="0" cellpadding="0" cellspacing="0" width="100%"
		style="background-color: #1f1f1f;">
		<tbody>
			<tr>
				<td align="center">
					<center>
						<table border="0" cellpadding="0" cellspacing="0" width="600px"
							style="height: 100%;">
							<tbody>
								<tr>
									<td align="right" valign="middle" class="textwhite"
										style="font-size: 12px; padding: 20px;">2012 &copy;
										ศูนย์บริหารความปลอดภัยอาชีวอนามัยและสิ่งแวดล้อม
										มหาวิทยาลัยมหิดล ศาลายา</td>
								</tr>
							</tbody>
						</table>
					</center>
				</td>
			</tr>
		</tbody>
	</table>

</body>
</html>';
	}
}