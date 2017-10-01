<?php
$criteria = new CDbCriteria ();
$dept_id = $_GET ["dept_id"];
if (isset ( $dept_id )) {
	$criteria->condition = "department_id = " . $dept_id;
} else {
	$criteria->condition = "department_id = " . UserLoginUtils::getRegisterInfo ()->dep_department_id;
}
$answers = Answers::model ()->findAll ( $criteria );

if (count ( $answers ) == 0) {
	header ( "Location: " . ConfigUtil::getAppName().'/index.php/DashBoard/NotFoundData' );
}

?>
<head>
<style>
.content_poll {
	width: 100%;
	margin: 0 auto;
	padding: 10px 40px;
	background-color: white;
}

.content_poll .poll {
	position: relative;
	margin-top: 30px;
}

.content_poll .poll .num {
	position: absolute;
	left: -40px;
	top: -5px;
	background: #eeeeee;
	color: #666666;
	padding: 3px 4px;
	font-size: 14px;
	box-shadow: -7px 0px 0px #dddddd;
}

.content_poll .poll h2 {
	font-weight: 200;
	font-color: green;
	font-size: 16px;
}

.content_poll .poll .choices {
	margin: 10px 0 0 0;
}

.content_poll .poll .choices .choice {
	width: 100%;
	margin: 10px 0;
}

.content_poll .poll .choices .choice label {
	color: #666;
	font-size: 13px;
	margin-left: 5px;
}
</style>
<script
	src="<?php echo ConfigUtil::getAppName();?>/assets/global/plugins/jquery.min.js"
	type="text/javascript"></script>

<script type="text/javascript">

	function getFilename($id,$elm) {
		 var fn = $($elm).val();
		 
		 $('#fpath_'+$id).val(fn);
			
	}
	
jQuery(document).ready(function () {
});
</script>
</head>
<form id="Form1" method="POST" enctype="multipart/form-data">
	<div class="portlet light bordered">
		<div class="portlet-title">
			<div class="caption">
				<?php echo  MenuUtil::getMenuName($_SERVER['REQUEST_URI'])?>
			</div>
			<div class="actions">
			<?// echo CHtml::link('ย้อนกลับ',array('surveyOcc/'),array('class'=>'btn btn-default btn-sm'));?>
			</div>
		</div>
		<div class="portlet-body form">
			<div class="form-body">
				<div class="content_poll">


					<!-- 					<div class="well">xxxx</div> -->

					<div class="panel-group accordion" id="accordion1">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a class="accordion-toggle" data-toggle="collapse"
										data-parent="#accordion1" href="#collapse_1"> 1.
										การบริหารจัดการด้านความปลอดภัย อาชีวอนามัย
										และสถาพแวดล้อมในการทำงาน </a>
								</h4>
							</div>
							<div id="collapse_1" class="panel-collapse in">
								<div class="panel-body">
									<br>
									<p class="list-datetime bold uppercase font-red">1.1 นโยบาย</p>
									<div class="poll">
										<!-- 										<div class="num">1.1.1</div> -->
										<h6>1.1.1 นโยบายด้านความปลอดภัย ฯ ระดับส่วนงาน?</h6>
										<div class="choices">
											<div class="choice">
												<input type="radio" value="1" name="answer_choices[1.1.1A]"
													id="rd111A" id="answer_choices_1"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"1.1.1A", "1") ?>>มี
												(โปรดแนบไฟล์นโยบาย้านความปลอดภัยฯ ระดับส่วนงาน)<label> <input
													name="answer_files[]" type="file" style="display: none;"
													onchange='getFilename("111A",this)' /><a>&nbsp;&nbsp;<i
														class="fa fa-paperclip"></i></a></label> <input
													id="fpath_111A" placeholder="" disabled="disabled"
													style="border: none;"
													value="<?php echo QuestionUtil::getAnswerValue($answers, "4", "1.1.1A", "")?>" />
											<?php if(QuestionUtil::getAnswerValue($answers, "4", "1.1.1A", "") != ''){?>
<a title="Download" class="fa fa-download"
													href="<?php echo ConfigUtil::getAppName().''. QuestionUtil::getAnswerValue($answers, "4", "1.1.1A", "")?>"></a>
												<input type="hidden" name="tmpPath[1.1.1A]"
													value="<?php echo QuestionUtil::getAnswerValue($answers, "4", "1.1.1A", "")?>">
<?php }?>

							</div>
											<div class="choice">
												<input type="radio" value="0" name="answer_choices[1.1.1A]"
													id="rd111A"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"1.1.1A", "0")?>
													id="answer_choices_2">ไม่มี
												คาดว่าจะมีการดำเนินการเสร็จสิ้นภายใน<input
													id="answer_other_111A" name="answer_texts[1.1.1A]"
													type="text"
													value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"1.1.1A", "")?>"
													style="border: none; border-bottom-style: dotted;">
											</div>
										</div>
									</div>
									<!-- END -->

									<div class="poll">
										<!-- 										<div class="num">1.1.2</div> -->
										<h6>1.1.2 รูปแบบการประกาศนโยบายให้บุคลากรภายในส่วนงานรับทราบ?</h6>
										<div class="choices">
											<div class="choice">
												<input type="checkbox" value="1"
													name="answer_choices[1.1.2A]" id="answer_choices_3"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"1.1.2A", "1") ?>>เอกสาร
												(เช่น หนังสือเวียน โปสเตอร์) <br> <input type="checkbox"
													value="1" name="answer_choices[1.1.2B]"
													id="answer_choices_4"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"1.1.2B", "1") ?>>อิเล็กทรอนิกส์
												<br> <input type="checkbox" value="1"
													name="answer_choices[1.1.2C]" id="answer_choices_5"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"1.1.2C", "1") ?>>การประชุม
											</div>
											<div class="choice"></div>
										</div>
									</div>
									<!-- END -->
									<br>
									<p class="list-datetime bold uppercase font-red">1.2
										โครงสร้างการบริหารจัดการด้านความปลอดภัยฯ
										บทบาทหน้าที่และความรับผิดชอบ ระดับส่วนงาน</p>

									<div class="poll">
										<!-- 										<div class="num">1.2.1</div> -->
										<h6>
											1.2.1 โครงสร้างการบริหารจัดการด้านความปลอดภัยฯ?<input
												id="answer_text_6" name="answer_texts[1.2.1A]" type="text"
												style="border: none; border-bottom-style: dotted;"
												value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"1.2.1A", "") ?>">
										</h6>
										<div class="choices">
											<div class="choice">
												**โปรดแนบไฟล์ดครงสร้างการบริหารจัดความปลอดภัยฯ
												/คำนั่งแต่งตั้ง**<label> <input name="answer_files[]"
													type="file" style="display: none;"
													onchange='getFilename("121A",this)' /><a>&nbsp;&nbsp;<i
														class="fa fa-paperclip"></i></a>
												</label> <input id="fpath_121A" placeholder=""
													disabled="disabled" style="border: none;"
													value="<?php echo QuestionUtil::getAnswerValue($answers, "4", "1.2.1A", "")?>" />
<?php if(QuestionUtil::getAnswerValue($answers, "4", "1.2.1A", "") != ''){?>
<a title="Download" class="fa fa-download"
													href="<?php echo ConfigUtil::getAppName().''. QuestionUtil::getAnswerValue($answers, "4", "1.2.1A", "")?>"></a>
												<input type="hidden" name="tmpPath[1.2.1A]"
													value="<?php echo  QuestionUtil::getAnswerValue($answers, "4", "1.2.1A", "")?>">
<?php }?>


							</div>
											<div class="choice"></div>
										</div>
									</div>
									<!-- END -->
									<div class="poll">
										<!-- 										<div class="num">1.2.2</div> -->
										<h6>
											1.2.2 การประชุมคณะกรรมการความปลอดภัยฯ?<input
												id="answer_text_7" name="answer_texts[1.2.2]" type="text"
												value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"1.2.2", "") ?>"
												style="border: none; border-bottom-style: dotted;">
										</h6>
										<div class="choices">
											<div class="choice"></div>
											<div class="choice"></div>
										</div>
									</div>

									<!-- END -->
									<div class="poll">
										<!-- 										<div class="num">1.2.2.1</div> -->
										<h6>
											&nbsp;&nbsp;&nbsp;1.2.2.1
											กรณีมีการแต่งตั้งคณะกรรมการความปลอดภัยฯ
											(โปรดแนบไฟล์คำสั่งแต่งตั้ง)? <label> <input
												name="answer_files[]" type="file" style="display: none;"
												onchange='getFilename("1221",this)' /><a>&nbsp;&nbsp;<i
													class="fa fa-paperclip"></i></a></label> <input
												id="fpath_1221" placeholder="" disabled="disabled"
												style="border: none;"
												value="<?php echo QuestionUtil::getAnswerValue($answers, "4", "1.2.2.1", "")?>" />
<?php if(QuestionUtil::getAnswerValue($answers, "4", "1.2.2.1", "") != ''){?>
<a title="Download" class="fa fa-download"
												href="<?php echo ConfigUtil::getAppName().''. QuestionUtil::getAnswerValue($answers, "4", "1.2.2.1", "")?>"></a>
											<input type="hidden" name="tmpPath[1.2.2.1]"
												value="<?php echo  QuestionUtil::getAnswerValue($answers, "4", "1.2.2.1", "")?>">
<?php }?>

						</h6>
										<div class="choices">
											<div class="choice"></div>

											<div class="choice">
												โปรดระบุชื่อคณะกรรมการ <input id="answer_text_8"
													name="answer_texts[1.2.1.1.1]" type="text"
													value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"1.2.1.1.1", "") ?>"
													style="border: none; border-bottom-style: dotted;"> <br>จำนวนคณะกรรมการทั้งหมด<input
													id="answer_text_9" name="answer_texts[1.2.1.1.2]"
													type="text"
													value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"1.2.1.1.2", "") ?>"
													style="border: none; border-bottom-style: dotted;">คน

											</div>
										</div>
									</div>
									<!-- END -->

									<table id="gvResult" border="1">
										<thead>
											<tr>
												<th rowspan="2" style="text-align: center;">&nbsp;&nbsp;&nbsp;องค์ประกอบของคณะกรรมการ&nbsp;&nbsp;&nbsp;</th>
												<th colspan="3" style="text-align: center;">&nbsp;&nbsp;&nbsp;จำแนกประเภท</th>
											</tr>
											<tr>
												<th style="text-align: center;">&nbsp;&nbsp;&nbsp;ผู้บริหารส่วนงาน&nbsp;&nbsp;&nbsp;</th>
												<th style="text-align: center;">&nbsp;&nbsp;&nbsp;หัวหน้าหน่วยงาน&nbsp;&nbsp;&nbsp;</th>
												<th style="text-align: center;">&nbsp;&nbsp;&nbsp;ผู้ปฏิบัติงาน&nbsp;&nbsp;&nbsp;</th>
											
											
											<tr>
										
										</thead>
										<tbody>
											<tr>
												<td>ก.ประธาน</td>
												<td style="text-align: center;"><input type="checkbox"
													value="1"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"1.2.1.1.3A", "1")?>
													name="answer_choices[1.2.1.1.3A]" id="answer_choices_5"></td>
												<td style="text-align: center;"><input type="checkbox"
													value="1"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"1.2.1.1.3B", "1")?>
													name="answer_choices[1.2.1.1.3B]" id="answer_choices_5"></td>
												<td style="text-align: center;"><input type="checkbox"
													value="1"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"1.2.1.1.3C", "1")?>
													name="answer_choices[1.2.1.1.3C]" id="answer_choices_5"></td>
											</tr>
											<tr>
												<td>ข.รองประธาน</td>
												<td style="text-align: center;"><input type="checkbox"
													value="1"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"1.2.1.1.4A", "1")?>
													name="answer_choices[1.2.1.1.4A]" id="answer_choices_5"></td>
												<td style="text-align: center;"><input type="checkbox"
													value="1"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"1.2.1.1.4B", "1")?>
													name="answer_choices[1.2.1.1.4B]" id="answer_choices_5"></td>
												<td style="text-align: center;"><input type="checkbox"
													value="1"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"1.2.1.1.4C", "1")?>
													name="answer_choices[1.2.1.1.4C]" id="answer_choices_5"></td>
											</tr>
											<tr>
												<td>ค.คณะกรรมการ</td>
												<td style="text-align: center;">&nbsp;&nbsp;&nbsp;จำนวน<input
													id="answer_text_29" name="answer_texts[1.2.1.1.5.1]"
													type="text"
													value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"1.2.1.1.5.1", "") ?>"
													style="border: none; border-bottom-style: dotted; width: 80px">คน
													&nbsp;&nbsp;&nbsp;
												</td>
												<td style="text-align: center;">&nbsp;&nbsp;&nbsp;จำนวน<input
													id="answer_text_29" name="answer_texts[1.2.1.1.5.2]"
													type="text"
													value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"1.2.1.1.5.2", "") ?>"
													style="border: none; border-bottom-style: dotted; width: 80px">คน
													&nbsp;&nbsp;&nbsp;
												</td>
												<td style="text-align: center;">&nbsp;&nbsp;&nbsp;จำนวน<input
													id="answer_text_29" name="answer_texts[1.2.1.1.5.3]"
													type="text"
													value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"1.2.1.1.5.3", "") ?>"
													style="border: none; border-bottom-style: dotted; width: 80px">คน
													&nbsp;&nbsp;&nbsp;
												</td>
											</tr>
											<tr>
												<td>ง.เลขานุการ</td>
												<td style="text-align: center;"><input type="checkbox"
													value="1"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"1.2.1.1.6A", "1")?>
													name="answer_choices[1.2.1.1.6A]" id="answer_choices_5"></td>
												<td style="text-align: center;"><input type="checkbox"
													value="1"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"1.2.1.1.6B", "1")?>
													name="answer_choices[1.2.1.1.6B]" id="answer_choices_5"></td>
												<td style="text-align: center;"><input type="checkbox"
													value="1"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"1.2.1.1.6C", "1")?>
													name="answer_choices[1.2.1.1.6C]" id="answer_choices_5"></td>
											</tr>
											<tr>
												<td colspan="4">ความถี่ในการประชุม<input id="answer_text_29"
													name="answer_texts[1.2.1.1.7]" type="text"
													value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"1.2.1.1.7", "") ?>"
													style="border: none; border-bottom-style: dotted; width: 80px">ครั้ง/ปี
												</td>
											</tr>
										</tbody>
									</table>
									<div class="poll">
										<!-- 										<div class="num">1.2.2.2</div> -->
										<h6>&nbsp;&nbsp;&nbsp;1.2.2.2 กรณีไม่มีคณะกรรมการความปลอดภัยฯ
											?</h6>
										<div class="choices">
											<div class="choice">
												<input type="radio" value="1"
													name="answer_choices[1.2.2.2A]" id="rd1222A"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"1.2.2.2A", "1")?>
													id="answer_choices_5"> มีแผนการแต่งตั้ง
												คาดว่าจะมีการดำเนินการเสร็จสิ้นภายใน<input
													id="answer_other_1222A" name="answer_texts[1.2.2.2A]"
													type="text"
													value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"1.2.2.2A", "") ?>"
													style="border: none; border-bottom-style: dotted;">
											</div>
											<div class="choice">
												<input type="radio" value="0"
													name="answer_choices[1.2.2.2A]" id="rd1222A"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"1.2.2.2A", "0")?>
													id="answer_choices_5"> ไม่มี
											</div>
										</div>
									</div>
									<!-- END -->
									<h6>1.2.3 หน่วยงานความปลอดภัย/เจ้าหน้าที่ความปลอดภัย
										ประจำส่วนงาน</h6>
									<div class="poll">
										<!-- 										<div class="num">1.2.3.1</div> -->
										<h6>&nbsp;&nbsp;&nbsp;1.2.3.1
											ส่วนงานมีหน่วยงานความปลอดภัยประจำส่วนงาน?</h6>
										<div class="choices">
											<div class="choice">
												<input type="radio" value="1"
													name="answer_choices[1.2.3.1A]" id="rd1231A"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"1.2.3.1A", "1")?>
													id="answer_choices_5"> มี (โปรดระบุชื่อหน่วยงานความปลอดภัย)<input
													id="answer_other_1231A" name="answer_texts[1.2.3.1A]"
													type="text"
													value=" <?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"1.2.3.1A", "") ?>"
													style="border: none; border-bottom-style: dotted;">
											</div>
											<div class="choice">
												<input type="radio" value="0"
													name="answer_choices[1.2.3.1A]" id="rd1231A"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"1.2.3.1A", "0")?>
													id="answer_choices_5"> ไม่มี
											</div>
										</div>
									</div>
									<!-- END -->
									<div class="poll">
										<!-- 										<div class="num">1.2.3.2</div> -->
										<h6>&nbsp;&nbsp;&nbsp;1.2.3.2
											ส่วนงานมีเจ้าหน้าที่ความปลอดภัยประจำส่วนงาน?</h6>
										<div class="choices">
											<div class="choice">
												<input type="radio" value="1"
													name="answer_choices[1.2.3.2A]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"1.2.3.2A", "1")?>
													id="rd1232A"> มี
												(โปรดแนบไฟล์คำสั่งแต่งตั้งเจ้าหน้าที่ปลอดภัย)<label> <input
													name="answer_files[]" type="file" style="display: none;"
													onchange='getFilename("1232A",this)' /><a>&nbsp;&nbsp;<i
														class="fa fa-paperclip"></i></a>
												</label> <input id="fpath_1232A" placeholder=""
													disabled="disabled" style="border: none;"
													value="<?php echo QuestionUtil::getAnswerValue($answers, "4", "1.2.3.2A", "")?>" />
<?php if(QuestionUtil::getAnswerValue($answers, "4", "1.2.3.2A", "") != ''){?>
<a title="Download" class="fa fa-download"
													href="<?php echo ConfigUtil::getAppName().''. QuestionUtil::getAnswerValue($answers, "4", "1.2.3.2A", "")?>"></a>
												<input type="hidden" name="tmpPath[1.2.3.2A]"
													value="<?php echo  QuestionUtil::getAnswerValue($answers, "4", "1.2.3.2A", "")?>">
<?php }?>
		
										 <br>
												<table id="gvResult" border="1">
													<thead>
														<tr>
															<th style="text-align: center;">&nbsp;&nbsp;&nbsp;เจ้าหน้าที่ความปลอดภัย&nbsp;&nbsp;&nbsp;</th>
															<th style="text-align: center;">&nbsp;&nbsp;&nbsp;จำนวน
																(คน)&nbsp;&nbsp;&nbsp;</th>
															<th style="text-align: center;">&nbsp;&nbsp;&nbsp;รายชื่อ&nbsp;&nbsp;&nbsp;</th>
														
														
														<tr>
													
													</thead>
													<tbody>
														<tr>
															<td>* จป. บริหาร</td>
															<td>&nbsp;&nbsp;&nbsp;<input id="answer_text_12321A"
																name="answer_texts[1.2.3.2.1A]" type="text"
																value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"1.2.3.2.1A", "") ?>"
																style="border: none; border-bottom-style: dotted;">&nbsp;&nbsp;&nbsp;
															</td>
															<td>&nbsp;&nbsp;&nbsp;<input id="answer_text_12321B"
																name="answer_texts[1.2.3.2.1B]" type="text"
																value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"1.2.3.2.1B", "") ?>"
																style="border: none; border-bottom-style: dotted;">&nbsp;&nbsp;&nbsp;
															</td>
														</tr>
														<tr>
															<td>* จป. หัวหน้างาน</td>
															<td>&nbsp;&nbsp;&nbsp;<input id="answer_text_12322A"
																name="answer_texts[1.2.3.2.2A]" type="text"
																value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"1.2.3.2.2A", "") ?>"
																style="border: none; border-bottom-style: dotted;">&nbsp;&nbsp;&nbsp;
															</td>
															<td>&nbsp;&nbsp;&nbsp;<input id="answer_text_12322B"
																name="answer_texts[1.2.3.2.2B]" type="text"
																value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"1.2.3.2.2B", "") ?>"
																style="border: none; border-bottom-style: dotted;">&nbsp;&nbsp;&nbsp;
															</td>
														</tr>
														<tr>
															<td>จป. วิชาชีพ</td>
															<td>&nbsp;&nbsp;&nbsp;<input id="answer_text_12323A"
																name="answer_texts[1.2.3.2.3A]" type="text"
																value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"1.2.3.2.3A", "") ?>"
																style="border: none; border-bottom-style: dotted;">&nbsp;&nbsp;&nbsp;
															</td>
															<td>&nbsp;&nbsp;&nbsp;<input id="answer_text_12323B"
																name="answer_texts[1.2.3.2.3B]" type="text"
																value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"1.2.3.2.3B", "") ?>"
																style="border: none; border-bottom-style: dotted;">&nbsp;&nbsp;&nbsp;
															</td>
														</tr>
														<tr>
															<td>จป. เทคนิคขั้นสูง</td>
															<td>&nbsp;&nbsp;&nbsp;<input id="answer_text_12324A"
																name="answer_texts[1.2.3.2.4A]" type="text"
																value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"1.2.3.2.4A", "") ?>"
																style="border: none; border-bottom-style: dotted;">&nbsp;&nbsp;&nbsp;
															</td>
															<td>&nbsp;&nbsp;&nbsp;<input id="answer_text_12324B"
																name="answer_texts[1.2.3.2.4B]" type="text"
																value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"1.2.3.2.4B", "") ?>"
																style="border: none; border-bottom-style: dotted;">&nbsp;&nbsp;&nbsp;
															</td>
														</tr>
														<tr>
															<td>จป. เทคนิค</td>
															<td>&nbsp;&nbsp;&nbsp;<input id="answer_text_12325A"
																name="answer_texts[1.2.3.2.5A]" type="text"
																value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"1.2.3.2.5A", "") ?>"
																style="border: none; border-bottom-style: dotted;">&nbsp;&nbsp;&nbsp;
															</td>
															<td>&nbsp;&nbsp;&nbsp;<input id="answer_text_12325B"
																name="answer_texts[1.2.3.2.5B]" type="text"
																value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"1.2.3.2.5B", "") ?>"
																style="border: none; border-bottom-style: dotted;">&nbsp;&nbsp;&nbsp;
															</td>
														</tr>
													</tbody>
												</table>

											</div>
											<div class="choice">
												<input type="radio" value="0"
													name="answer_choices[1.2.3.2A]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"1.2.3.2A", "0")?>
													id="rd1232A"> ไม่มี คาดว่าจะมีการดำเนินการเสร็จสิ้นภายใน<input
													id="answer_other_1232A" name="answer_texts[1.2.3.2B]"
													type="text"
													value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"1.2.3.2B", "")?>"
													style="border: none; border-bottom-style: dotted;"> <br>หมายเหตุ
												กำหนดระยะเวลาดำเนินการในส่วนที่มี *
											</div>
										</div>
									</div>
									<!-- END -->

									<div class="poll">
										<!-- 										<div class="num">1.3</div> -->
										<br>
										<p class="list-datetime bold uppercase font-red">1.3
											ระบบการจัดการที่ได้รับการรับรอง?</p>
										<div class="choices">
											<div class="choice">
												<input type="radio" value="1" name="answer_choices[1.3A]"
													id="rd13A"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"1.3A", "1")?>
													id="answer_choices_5"> มีระบบการจัดการที่ได้รับการรับรอง
												(โปรดระบุ) <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input
													type="checkbox" value="1" name="answer_choices[1.3A.1]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"1.3A.1", "1")?>
													id="ck13A1">OHSAS 18001&nbsp;&nbsp;&nbsp;&nbsp; ปีที่ได้รับ
												<input id="answer_other_13A1" name="answer_texts[1.3A.1]"
													value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"1.3A.1", "") ?>"
													type="text"
													style="border: none; border-bottom-style: dotted;"> <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input
													type="checkbox" value="1" name="answer_choices[1.3A.2]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"1.3A.2", "1")?>
													id="ck13A2">ISO 14001&nbsp;&nbsp;&nbsp;&nbsp;ปีที่ได้รับ<input
													id="answer_other_13A2" name="answer_texts[1.3A.2]"
													value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"1.3A.2", "") ?>"
													type="text"
													style="border: none; border-bottom-style: dotted;"> <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input
													type="checkbox" value="1" name="answer_choices[1.3A.3]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"1.3A.3", "1")?>
													id="ck13A3">ISO 9001&nbsp;&nbsp;&nbsp;&nbsp;ปีที่ได้รับ<input
													id="answer_other_13A3" name="answer_texts[1.3A.3]"
													value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"1.3A.3", "") ?>"
													type="text"
													style="border: none; border-bottom-style: dotted;"> <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input
													type="checkbox" value="1" name="answer_choices[1.3A.4]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"1.3A.4", "1")?>
													id="ck13A4">อื่น ๆ (โปรดระบุ)&nbsp;&nbsp;&nbsp;&nbsp;<input
													id="answer_other_13A4" name="answer_texts[1.3A.4]"
													value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"1.3A.4", "") ?>"
													type="text"
													style="border: none; border-bottom-style: dotted;">
											</div>
											<div class="choice">
												<input type="radio" value="0" name="answer_choices[1.3A]"
													id="rd13A"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"1.3A", "0")?>
													id="answer_choices_5"> ไม่มีระบบการจัดการที่ได้รับการรับรอง
											</div>
										</div>
									</div>
									<!-- END -->


								</div>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a class="accordion-toggle" data-toggle="collapse"
										data-parent="#accordion1" href="#collapse_2"> 2.
										แผนงานและแนวทางการดำเนินงานความมปลอดภัยฯ </a>
								</h4>
							</div>
							<div id="collapse_2" class="panel-collapse collapse">
								<div class="panel-body">

									<div class="poll">
										<!-- 										<div class="num">2.1</div> -->
										<p class="list-datetime bold uppercase font-red">2.1
											ปัญหาด้านความปลอดภัย อาชีวอนามัย
											และสภาพแวดล้อมในการทำงานระดับส่วนงาน (โปรดระบุ)?</p>
										<div class="choices">
											<div class="choice">

												<table id="gvResult" border="1">
													<thead>
														<tr>
															<th style="text-align: center;">ปัญหา</th>
															<th style="text-align: center;">สาเหตุ</th>
															<th style="text-align: center;">ตัวชี้จัด <br>(สถิติ/<br>ความรุนแรง)
															</th>
															<th style="text-align: center;">มาตรการ<br>ควบคุมที่มีอยู่
															</th>
															<th style="text-align: center;">แนวทางการ<br>แก้ไขเพิ่มเติม
															</th>
															<th style="text-align: center;">ผู้รับผิดชอบ</th>
															<th style="text-align: center;">ช่วงเวลาที่<br>เกิดปัญหา
															</th>
															<th style="text-align: center;">ช่วงเวลาที่<br>ดำเนินการ<br>แก้ไขเสร็จ
															</th>
														
														
														<tr>
													
													</thead>
													<tbody>
						<?php
						$order = 1;
						$index = 1;
						for($x = 43; $x < 53; $x ++) {
							echo '<tr>';
							for($y = 1; $y <= 8; $y ++) {
								echo '<td>&nbsp;&nbsp;&nbsp;<input id="answer_text_2.1.' . $index . '" name="answer_texts[2.1.' . $index . ']" type="text" value="' . (QuestionUtil::getAnswerValue ( $answers, CommonUtil::TEXT_TYPE, "2.1." . $index, "" )) . '"  style="text-align: center;width:80px;border: none; border-bottom-style: dotted;">&nbsp;&nbsp;&nbsp;</td>';
								$index ++;
							}
							echo '</tr>';
							$order ++;
						}
						?>
						</tbody>
												</table>
											</div>
											<div class="choice"></div>
										</div>
									</div>
									<!-- END -->

									<div class="poll">
										<!-- 										<div class="num">2.2</div> -->
										<br>
										<p class="list-datetime bold uppercase font-red">2.2
											แผนงาน/โครงการ/กิจกรรม และแนวทางการดำเนินงานด้านความปลอดภัย ฯ
											ระดับส่วนงาน?</p>
										<div class="choices">
											<div class="choice">
												<input type="radio" value="1" name="answer_choices[2.2A]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"2.2A", "1")?>
													id="rd22A"> มี แผนงาน/โครงการ/กิจกรรม
												และแนวทางการดำเนินงานด้านความปลอดภัยฯ (โปรดระบุ) <br> <br>
												<table id="gvResult" border="1">
													<thead>
														<tr>
															<th style="text-align: center;">&nbsp;&nbsp;&nbsp;ลำดับ&nbsp;&nbsp;&nbsp;</th>
															<th style="text-align: center;">&nbsp;&nbsp;&nbsp;ชื่อแผนงาน/โครงการ/กิจกรรม&nbsp;&nbsp;&nbsp;</th>
														
														
														<tr>
													
													</thead>
													<tbody>
														<tr>
															<td style="text-align: center;">1</td>
															<td>&nbsp;&nbsp;&nbsp;<input id="answer_text_22A1"
																name="answer_texts[2.2A.1]" type="text"
																value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"2.2A.1", "")?>"
																style="border: none; border-bottom-style: dotted;">&nbsp;&nbsp;&nbsp;
															</td>
														</tr>
														<tr>
															<td style="text-align: center;">2</td>
															<td>&nbsp;&nbsp;&nbsp;<input id="answer_text_22A2"
																name="answer_texts[2.2A.2]" type="text"
																value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"2.2A.2", "")?>"
																style="border: none; border-bottom-style: dotted;">&nbsp;&nbsp;&nbsp;
															</td>
														</tr>
														<tr>
															<td style="text-align: center;">3</td>
															<td>&nbsp;&nbsp;&nbsp;<input id="answer_text_22A3"
																name="answer_texts[2.2A.3]" type="text"
																value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"2.2A.3", "")?>"
																style="border: none; border-bottom-style: dotted;">&nbsp;&nbsp;&nbsp;
															</td>
														</tr>
														<tr>
															<td style="text-align: center;">4</td>
															<td>&nbsp;&nbsp;&nbsp;<input id="answer_text_22A4"
																name="answer_texts[2.2A.4]" type="text"
																value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"2.2A.4", "")?>"
																style="border: none; border-bottom-style: dotted;">&nbsp;&nbsp;&nbsp;
															</td>
														</tr>
														<tr>
															<td style="text-align: center;">5</td>
															<td>&nbsp;&nbsp;&nbsp;<input id="answer_text_22A5"
																name="answer_texts[2.2A.5]" type="text"
																value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"2.2A.5", "")?>"
																style="border: none; border-bottom-style: dotted;">&nbsp;&nbsp;&nbsp;
															</td>
														</tr>


													</tbody>
												</table>
												<br> **โปรดแนบไฟล์แผนงาน/โครงการ/กิจกรรม
												และแนวทางการดำเนินงานด้านความปลอดภัย ฯ ** <label> <input
													name="answer_files[]" type="file" style="display: none;"
													onchange='getFilename("22A",this)' /><a>&nbsp;&nbsp;<i
														class="fa fa-paperclip"></i></a></label> <input
													id="fpath_22A" placeholder="" disabled="disabled"
													style="border: none;"
													value="<?php echo QuestionUtil::getAnswerValue($answers, "4", "2.2A", "")?>" />
<?php if(QuestionUtil::getAnswerValue($answers, "4", "2.2A", "") != ''){?>
<a title="Download" class="fa fa-download"
													href="<?php echo ConfigUtil::getAppName().''. QuestionUtil::getAnswerValue($answers, "4", "2.2A", "")?>"></a>
												<input type="hidden" name="tmpPath[2.2A]"
													value="<?php echo  QuestionUtil::getAnswerValue($answers, "4", "2.2A", "")?>">
<?php }?>

							</div>
											<div class="choice">


												<input type="radio" value="0" name="answer_choices[2.2A]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"2.2A", "0")?>
													id="rd22A"> ไม่มี
											</div>
										</div>
									</div>
									<!-- END -->
									<h6>การเฝ้าระวังด้านสิ่งแวดล้อมและสุขภาพ</h6>
									<div class="poll">
										<!-- 										<div class="num">2.3.1</div> -->
										<h6>2.3.1 การตรวจวัดสภาพแวดล้อมในการทำงาน?</h6>
										<div class="choices">
											<div class="choice">
												<input type="radio" value="1" name="answer_choices[2.3.1A]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"2.3.1A", "1")?>
													id="rd231A"> มีการตรวจวัดสภาพแวดล้อมในการทำงาน (โปรดระบุ) <br>

												<table id="gvResult" border="1">
													<thead>
														<tr>
															<th colspan="7" style="text-align: center;">การตรวจวัดสภาพแวดล้อมในการทำงาน</th>
														</tr>
														<tr>
															<th colspan="4" style="text-align: center;">ด้านกายภาพ</th>
															<th rowspan="2" style="text-align: center;">ด้านเคมี<br>(เช่น
																สารฟอร์มัลดีไฮด์/<br>VOC อื่น ๆ)
															</th>
															<th rowspan="2" style="text-align: center;">ด้านชีวภาพ
																(เชื้อจุล<br>ชีพก่อโรค/เชื้อรา/<br>แบคทีเรีย อื่น ๆ)
															</th>
															<th rowspan="2" style="text-align: center;">ด้านการยศาสตร์</th>

														</tr>
														<tr>
															<th style="text-align: center;">&nbsp;&nbsp;&nbsp;ความร้อน&nbsp;&nbsp;&nbsp;</th>
															<th style="text-align: center;">&nbsp;&nbsp;&nbsp;แสงสว่าง&nbsp;&nbsp;&nbsp;</th>
															<th style="text-align: center;">&nbsp;&nbsp;&nbsp;เสียง&nbsp;&nbsp;&nbsp;</th>
															<th style="text-align: center;">&nbsp;&nbsp;&nbsp;รังสี&nbsp;&nbsp;&nbsp;</th>
															<th colspan="3"></th>
														
														
														<tr>
													
													</thead>
													<tbody>
														<tr>
															<td style="text-align: center;"><input type="checkbox"
																value="1" name="answer_choices[2.3.1A.1]"
																<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"2.3.1A.1", "1")?>
																id="answer_choices_5"></td>
															<td style="text-align: center;"><input type="checkbox"
																value="1" name="answer_choices[2.3.1A.2]"
																<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"2.3.1A.2", "1")?>
																id="answer_choices_5"></td>
															<td style="text-align: center;"><input type="checkbox"
																value="1" name="answer_choices[2.3.1A.3]"
																<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"2.3.1A.3", "1")?>
																id="answer_choices_5"></td>
															<td style="text-align: center;"><input type="checkbox"
																value="1" name="answer_choices[2.3.1A.4]"
																<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"2.3.1A.4", "1")?>
																id="answer_choices_5"></td>
															<td style="text-align: center;"><input type="checkbox"
																value="1" name="answer_choices[2.3.1A.5]"
																<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"2.3.1A.5", "1")?>
																id="ck231A5"> <br>โปรดระบุ<br> <input
																id="answer_other_231A5" name="answer_texts[2.3.1A.5]"
																value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"2.3.1A.5", "")?>"
																type="text"
																style="border: none; border-bottom-style: dotted; width: 50px;"
																style="border: none; border-bottom-style: dotted;"><br>&nbsp;</td>
															<td style="text-align: center;"><input type="checkbox"
																value="1" name="answer_choices[2.3.1A.6]"
																<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"2.3.1A.6", "1")?>
																id="ck231A6"> <br>โปรดระบุ<br> <input
																id="answer_other_231A6" name="answer_texts[2.3.1A.6]"
																value=" <?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"2.3.1A.6", "")?>"
																type="text"
																style="border: none; border-bottom-style: dotted;; width: 50px;"
																style="border: none; border-bottom-style: dotted;"><br>&nbsp;</td>
															<td style="text-align: center;"><input type="checkbox"
																value="1" name="answer_choices[2.3.1A.7]"
																<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"2.3.1A.7", "1")?>
																id="ck231A7"> <br>โปรดระบุ<br> <input
																id="answer_other_231A7" name="answer_texts[2.3.1A.7]"
																value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"2.3.1A.7", "")?>"
																type="text"
																style="border: none; border-bottom-style: dotted;; width: 50px;"
																style="border: none; border-bottom-style: dotted;"><br>&nbsp;</td>
														</tr>

													</tbody>
												</table>
												<table>
													<tr>
														<td>บริษัท/หน่วยงานที่ตรวจวัด (โปรดระบุ)</td>
														<td><input id="answer_other_231A"
															name="answer_texts[2.3.1A]" type="text"
															value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"2.3.1A", "")?>"
															style="border: none; border-bottom-style: dotted;"></td>
													</tr>
												</table>

											</div>
											<div class="choice">
												<input type="radio" value="0" name="answer_choices[2.3.1A]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"2.3.1A", "0")?>
													id="rd231A"> ไม่มีการตรวจวัดสภาพแวดล้อมในการทำงาน
											</div>
										</div>
									</div>
									<!-- END -->
									<h6>2.3.2 การตรวจสุขภาพของบุคลากร</h6>
									<div class="poll">
										<!-- 										<div class="num">2.3.2.1</div> -->
										<h6>&nbsp;&nbsp;&nbsp;&nbsp;2.3.2.1
											ส่วนงานได้จัดให้มีการตรวจสุขภาพประจำปี?</h6>
										<div class="choices">
											<div class="choice">
												<input type="radio" value="1"
													name="answer_choices[2.3.2.1A]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"2.3.2.1A", "1")?>
													id="rd2321A"> มี (โปรดระบุ
												หรือแนบไฟล์ตามที่ส่วนงานมีการจัดเก็บข้อมูล) <br>จำนวนบุคลากรทั้งหมดภายในส่วนงาน<input
													id="answer_other_2321A1" name="answer_texts[2.3.2.1A.1]"
													value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"2.3.2.1A.1", "")?>"
													type="text"
													style="border: none; border-bottom-style: dotted;">คน <br>จำนวนบุคลากรที่ตรวจสุขภาพ<input
													id="answer_other_2321A2"
													value=" <?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"2.3.2.1A.2", "")?>"
													name="answer_texts[2.3.2.1A.2]" type="text"
													style="border: none; border-bottom-style: dotted;">คน <br>
												<br>
												<table id="gvResult" border="1">
													<thead>
														<tr>
															<th style="text-align: center;">รายการตรวจสุขภาพ</th>
															<th style="text-align: center;">จำนวนบุคลากรที่เข้ารับการตรวจวัด
																(คน)</th>
														
														
														<tr>
													
													</thead>
													<tbody>
														<tr>
															<td>1. ความดัน</td>
															<td style="text-align: center;">&nbsp;&nbsp;&nbsp;<input
																id="answer_other_2321A3" name="answer_texts[2.3.2.1A.3]"
																type="text"
																value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"2.3.2.1A.3", "")?>"
																style="border: none; border-bottom-style: dotted;"></td>
														</tr>
														<tr>
															<td>2. เบาหวาน</td>
															<td style="text-align: center;">&nbsp;&nbsp;&nbsp;<input
																id="answer_other_2321A4" name="answer_texts[2.3.2.1A.4]"
																type="text"
																value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"2.3.2.1A.4", "")?>"
																style="border: none; border-bottom-style: dotted;"></td>
														</tr>
														<tr>
															<td>3. ไขมันในเลือด</td>
															<td style="text-align: center;">&nbsp;&nbsp;&nbsp;<input
																id="answer_other_2321A5" name="answer_texts[2.3.2.1A.5]"
																type="text"
																value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"2.3.2.1A.5", "")?>"
																style="border: none; border-bottom-style: dotted;"></td>
														</tr>
														<tr>
															<td>4. ตับ</td>
															<td style="text-align: center;">&nbsp;&nbsp;&nbsp;<input
																id="answer_other_2321A6" name="answer_texts[2.3.2.1A.6]"
																type="text"
																value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"2.3.2.1A.6", "")?>"
																style="border: none; border-bottom-style: dotted;"></td>
														</tr>
														<tr>
															<td>5. ไต</td>
															<td style="text-align: center;">&nbsp;&nbsp;&nbsp;<input
																id="answer_other_2321A7" name="answer_texts[2.3.2.1A.7]"
																type="text"
																value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"2.3.2.1A.7", "")?>"
																style="border: none; border-bottom-style: dotted;"></td>
														</tr>
														<tr>
															<td>6. อื่น ๆ โปรดระบุ<input id="answer_other_2321A8"
																name="answer_texts[2.3.2.1A.8" type="text"
																value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"2.3.2.1A.8", "")?>"
																style="border: none; border-bottom-style: dotted;"></td>
															<td style="text-align: center;">&nbsp;&nbsp;&nbsp;<input
																id="answer_other_2321A9" name="answer_texts[2.3.2.1A.9]"
																type="text"
																value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"2.3.2.1A.9", "")?>"
																style="border: none; border-bottom-style: dotted;"></td>
														</tr>
													</tbody>
												</table>
												<table>
													<tr>
														<td>บริษัท/หน่วยงานที่ตรวจวัด (โปรดระบุ)</td>
														<td><input id="answer_other_2321A10"
															name="answer_texts[2.3.2.1A.10]" type="text"
															value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"2.3.2.1A.10", "")?>"
															style="border: none; border-bottom-style: dotted;"></td>
													</tr>
												</table>
											</div>
											<div class="choice">
												<input type="radio" value="0"
													name="answer_choices[2.3.2.1A]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"2.3.2.1A", "0")?>
													id="rd2321A"> ไม่มีการตรวจสุขภาพประจำปี
											</div>
										</div>
									</div>
									<!-- END -->

									<div class="poll">
										<!-- 										<div class="num">2.3.2.2</div> -->
										<h6>&nbsp;&nbsp;&nbsp;&nbsp;2.3.2.2
											การตรวจสุขภาพตามปัจจัยเสี่ยง?</h6>
										<div class="choices">
											<div class="choice">
												<input type="radio" value="1"
													name="answer_choices[2.3.2.2A]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"2.3.2.2A", "1")?>
													id="rd2322A"> มี (โปรดระบุ) <br>

												<table id="gvResult" border="1">
													<thead>
														<tr>
															<th style="text-align: center;">&nbsp;&nbsp;&nbsp;ชื่อสารเคมี/ชื่อสิ่งที่เป็นปัจจัยเสี่ยง&nbsp;&nbsp;&nbsp;</th>
															<th style="text-align: center;">&nbsp;&nbsp;&nbsp;รายการสิ่งที่ตรวจ&nbsp;&nbsp;&nbsp;</th>
														
														
														<tr>
													
													</thead>
													<tbody>
														<tr>
															<td style="text-align: center;">&nbsp;&nbsp;&nbsp;<input
																id="answer_other_2322A1" name="answer_texts[2.3.2.2A.1]"
																type="text"
																value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"2.3.2.2A.1", "")?>"
																style="border: none; border-bottom-style: dotted;">&nbsp;&nbsp;&nbsp;
															</td>
															<td style="text-align: center;">&nbsp;&nbsp;&nbsp;<input
																id="answer_other_2322A2" name="answer_texts[2.3.2.2A.2]"
																type="text"
																value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"2.3.2.2A.2", "")?>"
																style="border: none; border-bottom-style: dotted;">&nbsp;&nbsp;&nbsp;
															</td>
														</tr>
														<tr>
															<td style="text-align: center;">&nbsp;&nbsp;&nbsp;<input
																id="answer_other_2322A3" name="answer_texts[2.3.2.2A.3]"
																type="text"
																value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"2.3.2.2A.3", "")?>"
																style="border: none; border-bottom-style: dotted;">&nbsp;&nbsp;&nbsp;
															</td>
															<td style="text-align: center;">&nbsp;&nbsp;&nbsp;<input
																id="answer_other_2322A4" name="answer_texts[2.3.2.2A.4]"
																type="text"
																value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"2.3.2.2A.4", "")?>"
																style="border: none; border-bottom-style: dotted;">&nbsp;&nbsp;&nbsp;
															</td>
														</tr>
														<tr>
															<td style="text-align: center;">&nbsp;&nbsp;&nbsp;<input
																id="answer_other_2322A5" name="answer_texts[2.3.2.2A.5]"
																type="text"
																value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"2.3.2.2A.5", "")?>"
																style="border: none; border-bottom-style: dotted;">&nbsp;&nbsp;&nbsp;
															</td>
															<td style="text-align: center;">&nbsp;&nbsp;&nbsp;<input
																id="answer_other_2322A6" name="answer_texts[2.3.2.2A.6]"
																type="text"
																value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"2.3.2.2A.6", "")?>"
																style="border: none; border-bottom-style: dotted;">&nbsp;&nbsp;&nbsp;
															</td>
														</tr>
														<tr>
															<td style="text-align: center;">&nbsp;&nbsp;&nbsp;<input
																id="answer_other_2322A7" name="answer_texts[2.3.2.2A.7]"
																type="text"
																value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"2.3.2.2A.7", "")?>"
																style="border: none; border-bottom-style: dotted;">&nbsp;&nbsp;&nbsp;
															</td>
															<td style="text-align: center;">&nbsp;&nbsp;&nbsp;<input
																id="answer_other_2322A8" name="answer_texts[2.3.2.2A.8]"
																type="text"
																value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"2.3.2.2A.8", "")?>"
																style="border: none; border-bottom-style: dotted;">&nbsp;&nbsp;&nbsp;
															</td>
														</tr>
														<tr>
															<td style="text-align: center;">&nbsp;&nbsp;&nbsp;<input
																id="answer_other_2322A9" name="answer_texts[2.3.2.2A.9]"
																type="text"
																value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"2.3.2.2A.9", "")?>"
																style="border: none; border-bottom-style: dotted;">&nbsp;&nbsp;&nbsp;
															</td>
															<td style="text-align: center;">&nbsp;&nbsp;&nbsp;<input
																id="answer_other_2322A10"
																name="answer_texts[2.3.2.2A.10]" type="text"
																value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"2.3.2.2A.10", "")?>"
																style="border: none; border-bottom-style: dotted;">&nbsp;&nbsp;&nbsp;
															</td>
														</tr>
													</tbody>
												</table>
											</div>
											<div class="choice">
												<input type="radio" value="0"
													name="answer_choices[2.3.2.2A]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"2.3.2.2A", "0")?>
													id="rd2322A"> ไม่มีการตรวจสุขภาพปัจจัยเสี่ยง
											</div>
										</div>
									</div>
									<!-- END -->


								</div>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a class="accordion-toggle" data-toggle="collapse"
										data-parent="#accordion1" href="#collapse_3"> 3.
										การดำเนินงาน/กิจกรรมด้านความปลอดภัย ฯ </a>
								</h4>
							</div>
							<div id="collapse_3" class="panel-collapse collapse">
								<div class="panel-body">

									<p class="list-datetime bold uppercase font-red">3.1 การฝึกอบรม
										การสร้างจิตสำนักและความรู้ความสามารถด้านความปลอดภัย ฯ</p>

									<div class="poll">
										<!-- 										<div class="num">3.1.1</div> -->
										<h6>3.1.1 มีการฝึกอบรม
											เพื่อสร้างจิตสำนึกและความรู้ความสามารถด้านความปลอดภัย ฯ?</h6>
										<div class="choices">
											<div class="choice">
												<input type="radio" value="1" name="answer_choices[3.1.1A]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"3.1.1A", "1")?>
													id="answer_choices_1">มีการฝึกอบรม
												(โปรดแนบไฟล์/เอกสารระบุหัวข้อการอบรม)<label> <input
													name="answer_files[]" type="file" style="display: none;"
													onchange='getFilename("311A",this)' /><a>&nbsp;&nbsp;<i
														class="fa fa-paperclip"></i></a></label> <input
													id="fpath_311A" placeholder="" disabled="disabled"
													style="border: none;"
													value="<?php echo QuestionUtil::getAnswerValue($answers, "4", "3.1.1A", "")?>" />
<?php if(QuestionUtil::getAnswerValue($answers, "4", "3.1.1A", "") != ''){?>
<a title="Download" class="fa fa-download"
													href="<?php echo ConfigUtil::getAppName().''. QuestionUtil::getAnswerValue($answers, "4", "3.1.1A", "")?>"></a>
												<input type="hidden" name="tmpPath[3.1.1A]"
													value="<?php echo  QuestionUtil::getAnswerValue($answers, "4", "3.1.1A", "")?>">
<?php }?>

							</div>
											<div class="choice">
												<input type="radio" value="0" name="answer_choices[3.1.1A]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"3.1.1A", "0")?>
													id="answer_choices_2">ไม่มีการฝึกอบรม
											</div>
										</div>
									</div>
									<!-- END -->


									<div class="poll">
										<!-- 										<div class="num">3.1.2</div> -->
										<h6>3.1.2 มีการทบทวนความรู้ด้านความปลอดภัย ฯ
											ให้กับผู้ปฏิบัติงานอย่างน้อยปีละ 1 ครั้ง?</h6>
										<div class="choices">
											<div class="choice">
												<input type="radio" value="1" name="answer_choices[3.1.2A]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"3.1.2A", "1")?>
													id="answer_choices_1">มีการทบทวนความรู้ความปลอดภัย ฯ
											</div>
											<div class="choice">
												<input type="radio" value="0" name="answer_choices[3.1.2A]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"3.1.2A", "0")?>
													id="answer_choices_2">ไม่มีการทบทวนความรู้ด้านความปลอดภัย ฯ
											</div>
										</div>
									</div>
									<!-- END -->


									<br>
									<p class="list-datetime bold uppercase font-red">3.2 ข้อคิดเห็น
										ข้อเสนอแนะ ข้อร้องเรียนด้านความปลอดภัย ฯ</p>
									<div class="poll">
										<!-- 										<div class="num">3.2.1</div> -->
										<h6>3.2.1 ส่วนงานมีช่องทางสำหรับบุคลากร
											นักศึกษาหรือบุคลากรภายนอกแสดงความคิดเห็น/ข้อเสนอแนะด้านความปลอดภัย
											ฯ?</h6>
										<div class="choices">
											<div class="choice">
												<input type="radio" value="1" name="answer_choices[3.2.1A]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"3.2.1A", "1")?>
													id="rd321A">มี (โปรดระบุ) <br>

												<table id="gvResult" border="1">
													<thead>
														<tr>
															<th style="text-align: center;">&nbsp;&nbsp;&nbsp;ประเด็น&nbsp;&nbsp;&nbsp;</th>
															<th style="text-align: center;">&nbsp;&nbsp;&nbsp;แนวทางการแก้ไข&nbsp;&nbsp;&nbsp;</th>
															<th style="text-align: center;">&nbsp;&nbsp;&nbsp;วิธีรายงานกลับไปยังผู้ร้องเรียน&nbsp;&nbsp;&nbsp;</th>
														
														
														<tr>
													
													</thead>
													<tbody>
														<tr>
															<td>&nbsp;&nbsp;&nbsp;<input id="answer_other_321A1"
																name="answer_texts[3.2.1A.1]" type="text"
																value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"3.2.1A.1", "")?>"
																style="border: none; border-bottom-style: dotted;">&nbsp;&nbsp;&nbsp;
															</td>
															<td>&nbsp;&nbsp;&nbsp;<input id="answer_other_321A2"
																name="answer_texts[3.2.1A.2]" type="text"
																value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"3.2.1A.2", "")?>"
																style="border: none; border-bottom-style: dotted;">&nbsp;&nbsp;&nbsp;
															</td>
															<td>&nbsp;&nbsp;&nbsp;<input id="answer_other_321A3"
																name="answer_texts[3.2.1A.3]" type="text"
																value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"3.2.1A.3", "")?>"
																style="border: none; border-bottom-style: dotted;">&nbsp;&nbsp;&nbsp;
															</td>
														</tr>

													</tbody>
												</table>



											</div>
											<div class="choice">
												<input type="radio" value="0" name="answer_choices[3.2.1A]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"3.2.1A", "0")?>
													id="rd321A"> ไม่มี
											</div>
										</div>
									</div>
									<!-- END -->

									<div class="poll">
										<!-- 										<div class="num">3.2.2</div> -->
										<h6>3.2.2 ส่วนงานมีช่องทางสำหรับบุคลากร
											นักศึกษาหรือบุคลากรภายนอกร้องเรียนด้านความปลอดภัยฯ?</h6>
										<div class="choices">
											<div class="choice">
												<input type="radio" value="1" name="answer_choices[3.2.2A]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"3.2.2A", "1")?>
													id="rd322A">มี (โปรดระบุ) <br> <br>

												<table id="gvResult" border="1">
													<thead>
														<tr>
															<th style="text-align: center;">&nbsp;&nbsp;&nbsp;ประเด็น&nbsp;&nbsp;&nbsp;</th>
															<th style="text-align: center;">&nbsp;&nbsp;&nbsp;แนวทางการแก้ไข&nbsp;&nbsp;&nbsp;</th>
															<th style="text-align: center;">&nbsp;&nbsp;&nbsp;วิธีรายงานกลับไปยังผู้ร้องเรียน&nbsp;&nbsp;&nbsp;</th>
														
														
														<tr>
													
													</thead>
													<tbody>
														<tr>
															<td style="text-align: center;">&nbsp;&nbsp;&nbsp;<input
																id="answer_other_322A1" name="answer_texts[3.2.2A.1]"
																type="text"
																value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"3.2.2A.1", "")?>"
																style="border: none; border-bottom-style: dotted;">&nbsp;&nbsp;&nbsp;
															</td>
															<td style="text-align: center;">&nbsp;&nbsp;&nbsp;<input
																id="answer_other_322A2" name="answer_texts[3.2.2A.2]"
																type="text"
																value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"3.2.2A.2", "")?>"
																style="border: none; border-bottom-style: dotted;">&nbsp;&nbsp;&nbsp;
															</td>
															<td style="text-align: center;">&nbsp;&nbsp;&nbsp;<input
																id="answer_other_322A3" name="answer_texts[3.2.2A.3]"
																type="text"
																value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"3.2.2A.3", "")?>"
																style="border: none; border-bottom-style: dotted;">&nbsp;&nbsp;&nbsp;
															</td>
														</tr>

													</tbody>
												</table>
												<br>
											</div>
											<div class="choice">
												<input type="radio" value="0" name="answer_choices[3.2.2A]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"3.2.2A", "0")?>
													id="rd322A"> ไม่มี
											</div>
										</div>
									</div>
									<!-- END -->


									<br>
									<p class="list-datetime bold uppercase font-red">3.3
										เอกสารด้านความปลอดภัย ฯ และการทบทวน</p>

									<div class="poll">
										<!-- 										<div class="num">3.3.1</div> -->
										<h6>3.3.1 ส่วนงานมีการจัดเก็บข้อมูลและเอกสารด้านความปลอดภัย ฯ
											ในรูปแบบใดและมีความถี่ในการทบทวนอย่างไร
											ในแต่ละเรื่องต่อไปนี้?</h6>
										<div class="choices">
											<div class="choice">

												<table id="gvResult" border="1">
													<thead>
														<tr>
															<th style="text-align: center;">เรื่อง</th>
															<th style="text-align: center;">&nbsp;&nbsp;&nbsp;มี&nbsp;&nbsp;&nbsp;</th>
															<th style="text-align: center;">&nbsp;&nbsp;&nbsp;ไม่มี&nbsp;&nbsp;&nbsp;</th>
															<th style="text-align: center;">&nbsp;&nbsp;&nbsp;รูปแบบการจัดเก็บ&nbsp;&nbsp;&nbsp;</th>
															<th style="text-align: center;">&nbsp;&nbsp;&nbsp;ความถี่ในการทบทวน&nbsp;&nbsp;&nbsp;</th>
														
														
														<tr>
													
													</thead>
													<tbody>
														<tr>
															<td>นโยบาย แผนงาน และโครงสร้างการบริหารด้านความปลอดภัย</td>
															<td><input type="checkbox" value="1"
																<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"3.3.1.1A", "1")?>
																name="answer_choices[3.3.1.1A]" id="answer_choices_5"></td>
															<td style="text-align: center;"><input type="checkbox"
																value="1" name="answer_choices[3.3.1.1B]"
																<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"3.3.1.1B", "1")?>
																id="answer_choices_5"></td>
															<td style="text-align: left;"><input type="checkbox"
																value="1" name="answer_choices[3.3.1.1CA]"
																<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"3.3.1.1CA", "1")?>
																id="answer_choices_5">เอกสาร<br> <input type="checkbox"
																value="1" name="answer_choices[3.3.1.1CB]"
																<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"3.3.1.1CB", "1")?>
																id="answer_choices_5">อิเล็กทรอนิกส์</td>
															<td style="text-align: center;"><input
																id="answer_text_29" name="answer_texts[3.3.1.1D]"
																type="text"
																value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"3.3.1.1D", "")?>"
																style="border: none; border-bottom-style: dotted; width: 50px;">ครั้ง/ปี</td>
														</tr>
														<tr>
															<td>กฎหมายด้านความปลอดภัย</td>
															<td style="text-align: center;"><input type="checkbox"
																value="1" name="answer_choices[3.3.1.2A]"
																<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"3.3.1.2A", "1")?>
																id="answer_choices_5"></td>
															<td style="text-align: center;"><input type="checkbox"
																value="1" name="answer_choices[3.3.1.2B]"
																<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"3.3.1.2B", "1")?>
																id="answer_choices_5"></td>
															<td style="text-align: left;"><input type="checkbox"
																value="1" name="answer_choices[3.3.1.2CA]"
																<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"3.3.1.2CA", "1")?>
																id="answer_choices_5">เอกสาร<br> <input type="checkbox"
																value="1" name="answer_choices[3.3.1.2CB]"
																<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"3.3.1.2CB", "1")?>
																id="answer_choices_5">อิเล็กทรอนิกส์</td>
															<td style="text-align: center;"><input
																id="answer_text_29" name="answer_texts[3.3.1.2D]"
																type="text"
																value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"3.3.1.2D", "")?>"
																style="border: none; border-bottom-style: dotted; width: 50px;">ครั้ง/ปี</td>
														</tr>
														<tr>
															<td>ระเบียบและข้อกำหนดด้านความปลอดภัยของส่วนงาน</td>
															<td style="text-align: center;"><input type="checkbox"
																value="1" name="answer_choices[3.3.1.3A]"
																<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"3.3.1.3A", "1")?>
																id="answer_choices_5"></td>
															<td style="text-align: center;"><input type="checkbox"
																value="1" name="answer_choices[3.3.1.3B]"
																<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"3.3.1.3B", "1")?>
																id="answer_choices_5"></td>
															<td style="text-align: left;"><input type="checkbox"
																value="1" name="answer_choices[3.3.1.3CA]"
																<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"3.3.1.3CA", "1")?>
																id="answer_choices_5">เอกสาร<br> <input type="checkbox"
																value="1" name="answer_choices[3.3.1.3CB]"
																<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"3.3.1.3CB", "1")?>
																id="answer_choices_5">อิเล็กทรอนิกส์</td>
															<td style="text-align: center;"><input
																id="answer_text_29" name="answer_texts[3.3.1.3D]"
																type="text"
																value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"3.3.1.3D", "")?>"
																style="border: none; border-bottom-style: dotted; width: 50px;">ครั้ง/ปี</td>
														</tr>
														<tr>
															<td>แผนฉุกเฉิน</td>
															<td style="text-align: center;"><input type="checkbox"
																value="1" name="answer_choices[3.3.1.4A]"
																<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"3.3.1.4A", "1")?>
																id="answer_choices_5"></td>
															<td style="text-align: center;"><input type="checkbox"
																value="1" name="answer_choices[3.3.1.4B]"
																<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"3.3.1.4B", "1")?>
																id="answer_choices_5"></td>
															<td style="text-align: left;"><input type="checkbox"
																value="1" name="answer_choices[3.3.1.4CA]"
																<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"3.3.1.4CA", "1")?>
																id="answer_choices_5">เอกสาร<br> <input type="checkbox"
																value="1" name="answer_choices[3.3.1.4CB]"
																<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"3.3.1.4CB", "1")?>
																id="answer_choices_5">อิเล็กทรอนิกส์</td>
															<td style="text-align: center;"><input
																id="answer_text_29" name="answer_texts[3.3.1.4D]"
																type="text"
																value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"3.3.1.4D", "")?>"
																style="border: none; border-bottom-style: dotted; width: 50px;">ครั้ง/ปี</td>
														</tr>
														<tr>
															<td>คู่มือการปฎิบัติงาน (SOP)</td>
															<td style="text-align: center;"><input type="checkbox"
																value="1" name="answer_choices[3.3.1.5A]"
																<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"3.3.1.5A", "1")?>
																id="answer_choices_5"></td>
															<td style="text-align: center;"><input type="checkbox"
																value="1" name="answer_choices[3.3.1.5B]"
																<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"3.3.1.5B", "1")?>
																id="answer_choices_5"></td>
															<td style="text-align: left;"><input type="checkbox"
																value="1" name="answer_choices[3.3.1.5CA]"
																<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"3.3.1.5CA", "1")?>
																id="answer_choices_5">เอกสาร<br> <input type="checkbox"
																value="1" name="answer_choices[3.3.1.5CB]"
																<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"3.3.1.5CB", "1")?>
																id="answer_choices_5">อิเล็กทรอนิกส์</td>
															<td style="text-align: center;"><input
																id="answer_text_29" name="answer_texts[3.3.1.5D]"
																type="text"
																value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"3.3.1.5D", "")?>"
																style="border: none; border-bottom-style: dotted; width: 50px;">ครั้ง/ปี</td>
														</tr>
														<tr>
															<td>คู่มือการใช้เครื่องมือ</td>
															<td style="text-align: center;"><input type="checkbox"
																value="1" name="answer_choices[3.3.1.6A]"
																<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"3.3.1.6A", "1")?>
																id="answer_choices_5"></td>
															<td style="text-align: center;"><input type="checkbox"
																value="1" name="answer_choices[3.3.1.6B]"
																<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"3.3.1.6B", "1")?>
																id="answer_choices_5"></td>
															<td style="text-align: left;"><input type="checkbox"
																value="1" name="answer_choices[3.3.1.6CA]"
																<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"3.3.1.6CA", "1")?>
																id="answer_choices_5">เอกสาร<br> <input type="checkbox"
																value="1" name="answer_choices[3.3.1.6CB]"
																<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"3.3.1.6CB", "1")?>
																id="answer_choices_5">อิเล็กทรอนิกส์</td>
															<td style="text-align: center;"><input
																id="answer_text_29" name="answer_texts[3.3.1.6D]"
																type="text"
																value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"3.3.1.6D", "")?>"
																style="border: none; border-bottom-style: dotted; width: 50px;">ครั้ง/ปี</td>
														</tr>
														<tr>
															<td>ระบบรายงานอุบัติเหตุ/อุบัติการณ์ภายในส่วนงาน</td>
															<td style="text-align: center;"><input type="checkbox"
																value="1" name="answer_choices[3.3.1.7A]"
																<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"3.3.1.7A", "1")?>
																id="answer_choices_5"></td>
															<td style="text-align: center;"><input type="checkbox"
																value="1" name="answer_choices[3.3.1.7B]"
																<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"3.3.1.7B", "1")?>
																id="answer_choices_5"></td>
															<td style="text-align: left;"><input type="checkbox"
																value="1" name="answer_choices[3.3.1.7CA]"
																<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"3.3.1.7CA", "1")?>
																id="answer_choices_5">เอกสาร<br> <input type="checkbox"
																value="1" name="answer_choices[3.3.1.7CB]"
																<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"3.3.1.7CB", "1")?>
																id="answer_choices_5">อิเล็กทรอนิกส์</td>
															<td style="text-align: center;"><input
																id="answer_text_29" name="answer_texts[3.3.1.7D]"
																type="text"
																value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"3.3.1.7D", "")?>"
																style="border: none; border-bottom-style: dotted; width: 50px;">ครั้ง/ปี</td>
														</tr>
														<tr>
															<td>การบำรุงรักษาองค์ประกอบทางกายภาพอุปกรณ์
																และเครื่องมือของส่วนงาน</td>
															<td style="text-align: center;"><input type="checkbox"
																value="1" name="answer_choices[3.3.1.8A]"
																<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"3.3.1.8A", "1")?>
																id="answer_choices_5"></td>
															<td style="text-align: center;"><input type="checkbox"
																value="1" name="answer_choices[3.3.1.8B]"
																<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"3.3.1.8B", "1")?>
																id="answer_choices_5"></td>
															<td style="text-align: left;"><input type="checkbox"
																value="1" name="answer_choices[3.3.1.8CA]"
																<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"3.3.1.8CA", "1")?>
																id="answer_choices_5">เอกสาร<br> <input type="checkbox"
																value="1" name="answer_choices[3.3.1.8CB]"
																<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"3.3.1.8CB", "1")?>
																id="answer_choices_5">อิเล็กทรอนิกส์</td>
															<td style="text-align: center;"><input
																id="answer_text_29" name="answer_texts[3.3.1.8D]"
																type="text"
																value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"3.3.1.8D", "")?>"
																style="border: none; border-bottom-style: dotted; width: 50px;">ครั้ง/ปี</td>
														</tr>
														<tr>
															<td>เอกสารความรู้เกี่ยวกับความปลอดภัย</td>
															<td style="text-align: center;"><input type="checkbox"
																value="1" name="answer_choices[3.3.1.9A]"
																<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"3.3.1.9A", "1")?>
																id="answer_choices_5"></td>
															<td style="text-align: center;"><input type="checkbox"
																value="1" name="answer_choices[3.3.1.9B]"
																<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"3.3.1.9B", "1")?>
																id="answer_choices_5"></td>
															<td style="text-align: left;"><input type="checkbox"
																value="1" name="answer_choices[3.3.1.9CA]"
																<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"3.3.1.9CA", "1")?>
																id="answer_choices_5">เอกสาร<br> <input type="checkbox"
																value="1" name="answer_choices[3.3.1.9CB]"
																<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"3.3.1.9CB", "1")?>
																id="answer_choices_5">อิเล็กทรอนิกส์</td>
															<td style="text-align: center;"><input
																id="answer_text_29" name="answer_texts[3.3.1.9D]"
																type="text"
																value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"3.3.1.9D", "")?>"
																style="border: none; border-bottom-style: dotted; width: 50px;">ครั้ง/ปี</td>
														</tr>
														<tr>
															<td>การอบรมด้านความปลอดภัยของบุคลากรในส่วนงาน</td>
															<td style="text-align: center;"><input type="checkbox"
																value="1" name="answer_choices[3.3.1.10A]"
																<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"3.3.1.10A", "1")?>
																id="answer_choices_5"></td>
															<td style="text-align: center;"><input type="checkbox"
																value="1" name="answer_choices[3.3.1.10B]"
																<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"3.3.1.10B", "1")?>
																id="answer_choices_5"></td>
															<td style="text-align: left;"><input type="checkbox"
																value="1" name="answer_choices[3.3.1.10CA]"
																<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"3.3.1.10CA", "1")?>
																id="answer_choices_5">เอกสาร<br> <input type="checkbox"
																value="1" name="answer_choices[3.3.1.10CB]"
																<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"3.3.1.10CB", "1")?>
																id="answer_choices_5">อิเล็กทรอนิกส์</td>
															<td style="text-align: center;"><input
																id="answer_text_29" name="answer_texts[3.3.1.10D]"
																type="text"
																value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"3.3.1.10D", "")?>"
																style="border: none; border-bottom-style: dotted; width: 50px;">ครั้ง/ปี</td>
														</tr>
														<tr>
															<td>อื่น ๆ (โปรดระบุ)<input id="answer_text_29"
																name="answer_texts[3.3.1.11A]" type="text"
																value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"3.3.1.11A", "")?>"
																style="border: none; border-bottom-style: dotted;"></td>
															<td style="text-align: center;"><input type="checkbox"
																value="1" name="answer_choices[3.3.1.11B]"
																<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"3.3.1.11B", "1")?>
																id="answer_choices_5"></td>
															<td style="text-align: center;"><input type="checkbox"
																value="1" name="answer_choices[3.3.1.11C]"
																<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"3.3.1.11C", "1")?>
																id="answer_choices_5"></td>
															<td style="text-align: left;"><input type="checkbox"
																value="1" name="answer_choices[3.3.1.11DA]"
																<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"3.3.1.11DA", "1")?>
																id="answer_choices_5">เอกสาร<br> <input type="checkbox"
																value="1" name="answer_choices[3.3.1.11DB]"
																<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"3.3.1.11DB", "1")?>
																id="answer_choices_5">อิเล็กทรอนิกส์</td>
															<td style="text-align: center;"><input
																id="answer_text_29" name="answer_texts[3.3.1.11E]"
																type="text"
																value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"3.3.1.11E", "")?>"
																style="border: none; border-bottom-style: dotted; width: 50px;">ครั้ง/ปี</td>
														</tr>
													</tbody>
												</table>
											</div>
											<div class="choice"></div>
										</div>
									</div>
									<!-- END -->



									<br>
									<p class="list-datetime bold uppercase font-red">3.4
										การควบคุมการปฏิบัติงาน</p>
									<div class="poll">
										<!-- 										<div class="num">3.4.1</div> -->
										<h6>3.4.1
											ส่วนงานมีการควบคุมการปฎิบัติงานในเรื่องการจัดซื้อจัดจ้าง
											ดังต่อไปนี้?</h6>
										<div class="choices">
											<div class="choice">
												<input type="radio" value="1" name="answer_choices[3.4.1A]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"3.4.1A", "1")?>
													id="rd341A">มี (โปรดระบุ) <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input
													type="checkbox" value="1" name="answer_choices[3.4.1A.1]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"3.4.1A.1", "1")?>
													id="ck341A1">มีการกำหนดข้อมูลด้านความปลอดภัยในการจัดซื้อผลิตภัณฑ์
												อุปกรณ์ เครื่องมือ <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input
													type="checkbox" value="1" name="answer_choices[3.4.1A.2]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"3.4.1A.2", "1")?>
													id="ck341A2">มีการขอเอกสารคู่มือการใช้งานที่ถูกต้องและปลอดภัย
												ในกรณีที่จัดซื้ออุปกรณ์หรือเครื่องมือ <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input
													type="checkbox" value="1" name="answer_choices[3.4.1A.3]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"3.4.1A.3", "1")?>
													id="ck341A3">มีการขอเอกสารข้อมูลความปลอดภัย (SDS)
												ในกรณีที่จัดซื้อสารเคมี <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input
													type="checkbox" value="1" name="answer_choices[3.4.1A.4]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"3.4.1A.4", "1")?>
													id="ck341A4">มีการระบุข้อกำหนดด้านความปลอดภัยในเอกสารการจัดซื้อจัดจ้าง
												(TOR) <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input
													type="checkbox" value="1" name="answer_choices[3.4.1A.5]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"3.4.1A.5", "1")?>
													id="ck341A5">มีการดำเนินการเพื่อควบคุมการทำงานของผู้รับเหมาและผู้รับเหมาช่วงให้ปฎิบัติงานอย่างปลอดภัย
												<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input
													type="checkbox" value="1" name="answer_choices[3.4.1A.6]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"3.4.1A.6", "1")?>
													id="ck341A6">มีการระบุงบประมาณที่ใช้ในการบริหารจัดการด้านความปลอดภัยในเอกสารการจัดซื้อจัดจ้าง
												<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input
													type="checkbox" value="1" name="answer_choices[3.4.1A.7]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"3.4.1A.7", "1")?>
													id="ck341A7">อื่น ๆ โปรดระบุ <input
													id="answer_choices_341A7" name="answer_texts[3.4.1A.7]"
													type="text"
													value=" <?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"3.4.1A.7", "")?>"
													style="border: none; border-bottom-style: dotted;">
											</div>
											<div class="choice">
												<input type="radio" value="0" name="answer_choices[3.4.1A]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"3.4.1A", "0")?>
													id="rd341A">ไม่มี
											</div>
										</div>
									</div>
									<!-- END -->

									<br>
									<p class="list-datetime bold uppercase font-red">3.5
										การเตรียมความพร้อมและการตอบโต้ภาวะฉุกเฉิน</p>
									<div class="poll">
										<!-- 										<div class="num">3.5.1</div> -->
										<h6>
											3.5.1 ส่วนงานมีการจัดทำแผนโต้ตอบภาวะฉุกเฉิน/การทบทวน/
											(โปรดแนบไฟล์แผนโต้ตอบภาวะฉุกเฉิน)? <label> <input
												name="answer_files[]" type="file" style="display: none;"
												onchange='getFilename("351",this)' /><a>&nbsp;&nbsp;<i
													class="fa fa-paperclip"></i></a></label> <input
												id="fpath_351" placeholder="" disabled="disabled"
												style="border: none;"
												value="<?php echo QuestionUtil::getAnswerValue($answers, "4", "3.5.1", "")?>" />
<?php if(QuestionUtil::getAnswerValue($answers, "4", "3.5.1", "") != ''){?>
<a title="Download" class="fa fa-download"
												href="<?php echo ConfigUtil::getAppName().''. QuestionUtil::getAnswerValue($answers, "4", "3.5.1", "")?>"></a>
											<input type="hidden" name="tmpPath[3.5.1]"
												value="<?php echo QuestionUtil::getAnswerValue($answers, "4", "3.5.1", "")?>">
<?php }?>

						</h6>
										<div class="choices">
											<div class="choice">
												<input type="radio" value="1" name="answer_choices[3.5.1A]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"3.5.1A", "1")?>
													id="answer_choices_3">มี (โปรดระบุ) <br> <br>

												<table id="gvResult" border="1">
													<thead>
														<tr>
															<th></th>
															<th colspan="2" style="text-align: center;">&nbsp;&nbsp;&nbsp;การดำเนินการ&nbsp;&nbsp;&nbsp;</th>
															<th></th>
															<th></th>
														</tr>
														<tr>
															<th style="text-align: center;">&nbsp;&nbsp;&nbsp;แผนฉุกเฉิน&nbsp;&nbsp;&nbsp;</th>
															<th style="text-align: center;">&nbsp;&nbsp;&nbsp;ทั้งส่วนงาน&nbsp;&nbsp;&nbsp;</th>
															<th style="text-align: center;">&nbsp;&nbsp;&nbsp;บางพื้นที่/อาคาร&nbsp;&nbsp;&nbsp;</th>
															<th style="text-align: center;">&nbsp;&nbsp;&nbsp;ความถี่ในการทบทวน&nbsp;&nbsp;&nbsp;
															</th>
															<th style="text-align: center;">&nbsp;&nbsp;&nbsp;ผู้รับผิดชอบ&nbsp;&nbsp;&nbsp;</th>
														
														
														<tr>
													
													</thead>
													<tbody>
														<tr>
															<td><input type="checkbox" value="1"
																<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"3.5.1A.1.A", "1")?>
																name="answer_choices[3.5.1A.1.A]" id="rd351A1A">อุทกภัย</td>
															<td style="text-align: center;"><input type="checkbox"
																value="1"
																<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"3.5.1A.1.B", "1")?>
																name="answer_choices[3.5.1A.1.B]" id="ck351A1B"></td>
															<td><input type="checkbox" value="1"
																<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"3.5.1A.1.C", "1")?>
																name="answer_choices[3.5.1A.1.C]" id="ck351A1C">(โปรดระบุ)<input
																id="answer_text_351A1C" name="answer_texts[3.5.1A.1.C]"
																type="text"
																value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"3.5.1A.1.C", "")?>"
																style="border: none; border-bottom-style: dotted; width: 100px;">&nbsp;&nbsp;&nbsp;<br></td>
															<td style="text-align: center;">&nbsp;&nbsp;&nbsp;<input
																id="answer_text_29" name="answer_texts[3.5.1A.1.D]"
																type="text"
																value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"3.5.1A.1.D", "")?>"
																style="border: none; border-bottom-style: dotted; width: 100px;">&nbsp;&nbsp;&nbsp;
															</td>
															<td style="text-align: center;">&nbsp;&nbsp;&nbsp;<input
																id="answer_text_29" name="answer_texts[3.5.1A.1.E]"
																type="text"
																value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"3.5.1A.1.E", "")?>"
																style="border: none; border-bottom-style: dotted; width: 50px;">&nbsp;&nbsp;&nbsp;
															</td>
														</tr>
														<tr>
															<td><input type="checkbox" value="1"
																<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"3.5.1A.2.A", "1")?>
																name="answer_choices[3.5.1A.2.A]" id="answer_choices_5">อัคคีภัย</td>
															<td style="text-align: center;"><input type="checkbox"
																value="1"
																<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"3.5.1A.2.B", "1")?>
																name="answer_choices[3.5.1A.2.B]" id="answer_choices_5"></td>
															<td><input type="checkbox" value="1"
																<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"3.5.1A.2.C", "1")?>
																name="answer_choices[3.5.1A.2.C]" id="ck351A2C">(โปรดระบุ)<input
																id="answer_text_351A2C" name="answer_texts[3.5.1A.2.C]"
																type="text"
																value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"3.5.1A.2.C", "")?>"
																style="border: none; border-bottom-style: dotted; width: 100px;">&nbsp;&nbsp;&nbsp;<br></td>
															<td style="text-align: center;">&nbsp;&nbsp;&nbsp;<input
																id="answer_text_29" name="answer_texts[3.5.1A.2.D]"
																type="text"
																value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"3.5.1A.2.D", "")?>"
																style="border: none; border-bottom-style: dotted; width: 100px;">&nbsp;&nbsp;&nbsp;
															</td>
															<td style="text-align: center;">&nbsp;&nbsp;&nbsp;<input
																id="answer_text_29" name="answer_texts[3.5.1A.2.E]"
																type="text"
																value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"3.5.1A.2.E", "")?>"
																style="border: none; border-bottom-style: dotted; width: 50px;">&nbsp;&nbsp;&nbsp;
															</td>
														</tr>
														<tr>
															<td><input type="checkbox" value="1"
																<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"3.5.1A.3.A", "1")?>
																name="answer_choices[3.5.1A.3.A]" id="answer_choices_5">อุบัติเหตุ</td>
															<td style="text-align: center;"><input type="checkbox"
																<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"3.5.1A.3.B", "1")?>
																value="1" name="answer_choices[3.5.1A.3.B]"
																id="answer_choices_5"></td>
															<td><input type="checkbox" value="1"
																<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"3.5.1A.3.C", "1")?>
																name="answer_choices[3.5.1A.3.C]" id="ck351A3C">(โปรดระบุ)<input
																id="answer_text_351A3C" name="answer_texts[3.5.1A.3.C]"
																type="text"
																value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"3.5.1A.3.C", "")?>"
																style="border: none; border-bottom-style: dotted; width: 100px;">&nbsp;&nbsp;&nbsp;<br></td>
															<td style="text-align: center;">&nbsp;&nbsp;&nbsp;<input
																id="answer_text_29" name="answer_texts[3.5.1A.3.D]"
																type="text"
																value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"3.5.1A.3.D", "")?>"
																style="border: none; border-bottom-style: dotted; width: 100px;">&nbsp;&nbsp;&nbsp;
															</td>
															<td style="text-align: center;">&nbsp;&nbsp;&nbsp;<input
																id="answer_text_29" name="answer_texts[3.5.1A.3.E]"
																type="text"
																value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"3.5.1A.3.E", "")?>"
																style="border: none; border-bottom-style: dotted; width: 50px;">&nbsp;&nbsp;&nbsp;
															</td>
														</tr>
														<tr>
															<td><input type="checkbox" value="1"
																<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"3.5.1A.4.A", "1")?>
																name="answer_choices[3.5.1A.4.A]" id="answer_choices_5">โจรกรรม/วินาศกรรม/ก่อการร้าย/การชุมนุมประท้วง</td>
															<td style="text-align: center;"><input type="checkbox"
																<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"3.5.1A.4.B", "1")?>
																value="1" name="answer_choices[3.5.1A.4.B]"
																id="answer_choices_5"></td>
															<td><input type="checkbox" value="1"
																<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"3.5.1A.4.C", "1")?>
																name="answer_choices[3.5.1A.4.C]" id="ck351A4C">(โปรดระบุ)<input
																id="answer_text_351A4C" name="answer_texts[3.5.1A.4.C]"
																type="text"
																value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"3.5.1A.4.C]", "")?>"
																style="border: none; border-bottom-style: dotted; width: 100px;">&nbsp;&nbsp;&nbsp;<br></td>
															<td style="text-align: center;">&nbsp;&nbsp;&nbsp;<input
																id="answer_text_29" name="answer_texts[3.5.1A.4.D]"
																type="text"
																value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"3.5.1A.4.D", "")?>"
																style="border: none; border-bottom-style: dotted; width: 100px;">&nbsp;&nbsp;&nbsp;
															</td>
															<td style="text-align: center;">&nbsp;&nbsp;&nbsp;<input
																id="answer_text_29" name="answer_texts[3.5.1A.4.E]"
																type="text"
																value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"3.5.1A.4.E", "")?>"
																style="border: none; border-bottom-style: dotted; width: 50px;">&nbsp;&nbsp;&nbsp;
															</td>
														</tr>
														<tr>
															<td><input type="checkbox" value="1"
																<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"3.5.1A.5.A", "1")?>
																name="answer_choices[3.5.1A.5.A]" id="answer_choices_5">วัตถุไวไฟ/วัตถุมีพิษหกรั่วไหล</td>
															<td style="text-align: center;"><input type="checkbox"
																value="1" name="answer_choices[3.5.1A.5.B]"
																<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"3.5.1A.5.B", "1")?>
																id="answer_choices_5"></td>
															<td><input type="checkbox" value="1"
																<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"3.5.1A.5.C", "1")?>
																name="answer_choices[3.5.1A.5.C]" id="ck351A5C">(โปรดระบุ)<input
																id="answer_text_351A5C" name="answer_texts[3.5.1A.5.C]"
																type="text"
																value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"3.5.1A.5.C", "")?>"
																style="border: none; border-bottom-style: dotted; width: 100px;">&nbsp;&nbsp;&nbsp;<br></td>
															<td style="text-align: center;">&nbsp;&nbsp;&nbsp;<input
																id="answer_text_29" name="answer_texts[3.5.1A.5.D]"
																type="text"
																value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"3.5.1A.5.D", "")?>"
																style="border: none; border-bottom-style: dotted; width: 100px;">&nbsp;&nbsp;&nbsp;
															</td>
															<td style="text-align: center;">&nbsp;&nbsp;&nbsp;<input
																id="answer_text_29" name="answer_texts[3.5.1A.5.E]"
																type="text"
																value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"3.5.1A.5.E", "")?>"
																style="border: none; border-bottom-style: dotted; width: 50px;">&nbsp;&nbsp;&nbsp;
															</td>
														</tr>
														<tr>
															<td><input type="checkbox" value="1"
																<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"3.5.1A.6.A", "1")?>
																name="answer_choices[3.5.1A.6.A]" id="answer_choices_5">อื่น
																ๆ โปรดระบุ <input id="answer_text_29"
																value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"3.5.1A.6.A", "")?>"
																name="answer_texts[3.5.1A.6.A]" type="text"
																style="border: none; border-bottom-style: dotted; width: 150px;"></td>
															<td style="text-align: center;"><input type="checkbox"
																value="1" name="answer_choices[3.5.1A.6.C]"
																<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"3.5.1A.6.C", "1")?>
																id="answer_choices_5"></td>
															<td><input type="checkbox" value="1"
																<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"3.5.1A.6.D", "1")?>
																name="answer_choices[3.5.1A.6.D]" id="ck351A6D">(โปรดระบุ)<input
																id="answer_text_351A6D" name="answer_texts[3.5.1A.6.D]"
																type="text"
																value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"3.5.1A.6.D", "")?>"
																style="border: none; border-bottom-style: dotted; width: 100px;">&nbsp;&nbsp;&nbsp;<br></td>
															<td style="text-align: center;">&nbsp;&nbsp;&nbsp;<input
																id="answer_text_29" name="answer_texts[3.5.1A.6.E]"
																type="text"
																value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"3.5.1A.6.E", "")?>"
																style="border: none; border-bottom-style: dotted; width: 100px;">&nbsp;&nbsp;&nbsp;
															</td>
															<td style="text-align: center;">&nbsp;&nbsp;&nbsp;<input
																id="answer_text_29" name="answer_texts[3.5.1A.6.F]"
																type="text"
																value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"3.5.1A.6.F", "")?>"
																style="border: none; border-bottom-style: dotted; width: 50px;">&nbsp;&nbsp;&nbsp;
															</td>
														</tr>
													</tbody>
												</table>
												<br>

											</div>
											<div class="choice">
												<input type="radio" value="0" name="answer_choices[3.5.1A]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"3.5.1A", "0")?>
													id="answer_choices_3">ไม่มี
											</div>
										</div>
									</div>
									<!-- END -->

									<div class="poll">
										<!-- 										<div class="num">3.5.2</div> -->
										<h6>3.5.2 ส่วนงานมีการฝึกอบรมแผนการ โต้ตอบภาวะฉุกเฉิน?</h6>
										<div class="choices">
											<div class="choice">
												<input type="radio" value="1" name="answer_choices[3.5.2A]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"3.5.2A", "1")?>
													id="rd352A">มี (โปรดระบุ) <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
												<input type="checkbox" value="1"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"3.5.2A.A", "1")?>
													name="answer_choices[3.5.2A.A]" id="ck352AA">ทั้งส่วนงาน <input
													type="checkbox" value="1"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"3.5.2A.B", "1")?>
													name="answer_choices[3.5.2A.B]" id="ck352AB">บางพื้นที่/อาคาร
												(โปรดระบุ) <input id="answer_text_352AB"
													value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"3.5.2A.B", "")?>"
													name="answer_texts[3.5.2A.B]" type="text"
													style="border: none; border-bottom-style: dotted;"> <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-วันที่จัดการฝึกอบรม
												<input id="answer_text_352A1"
													value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"3.5.2A.1", "")?>"
													name="answer_texts[3.5.2A.1]" type="text"
													style="border: none; border-bottom-style: dotted;"> <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-ชื่อหลักสุตรที่อบรม
												<input id="answer_text_352A2"
													value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"3.5.2A.2", "")?>"
													name="answer_texts[3.5.2A.2]" type="text"
													style="border: none; border-bottom-style: dotted;"> <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-หน่วยงานที่ฝึกอบรม
												<input id="answer_text_352A3"
													value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"3.5.2A.3", "")?>"
													name="answer_texts[3.5.2A.3]" type="text"
													style="border: none; border-bottom-style: dotted;"> <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-ค่าใช้จ่ายในการจ้างหน่วยงานฝึกอบรม
												<input id="answer_text_352A4"
													value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"3.5.2A.4", "")?>"
													name="answer_texts[3.5.2A.4]" type="text"
													style="border: none; border-bottom-style: dotted;">บาท <br>

											</div>
											<div class="choice">
												<input type="radio" value="0" name="answer_choices[3.5.2A]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"3.5.2A", "0")?>
													id="rd352A">ไม่มี
											</div>
										</div>
									</div>
									<!-- END -->
									<div class="poll">
										<!-- 										<div class="num">3.5.3</div> -->
										<h6>3.5.3 ส่วนงานมีการฝึกซ้อมแผนการโต้ตอบฉุกเฉิน?</h6>
										<div class="choices">
											<div class="choice">
												<input type="radio" value="1" name="answer_choices[3.5.3A]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"3.5.3A", "1")?>
													id="rd353A">มี (โปรดระบุ) <br> <br>
												&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input
													type="checkbox" value="1" name="answer_choices[3.5.3A.A]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"3.5.3A.A", "1")?>
													id="ck353AA">ทั้งส่วนงาน <input type="checkbox" value="1"
													name="answer_choices[3.5.3A.B]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"3.5.3A.B", "1")?>
													id="ck353AB">บางพื้นที่/อาคาร (โปรดระบุ)<input
													id="answer_text_353AB" name="answer_texts[3.5.3A.B]"
													type="text"
													value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"3.5.3A.B", "")?>"
													style="border: none; border-bottom-style: dotted;"> <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-วันที่จัดการฝึกอบรม
												<input id="answer_text_353A1" name="answer_texts[3.5.3A.1]"
													type="text"
													value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"3.5.3A.1", "")?>"
													style="border: none; border-bottom-style: dotted;"> <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-ชื่อหลักสุตรที่อบรม
												<input id="answer_text_353A2" name="answer_texts[3.5.3A.2]"
													type="text"
													value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"3.5.3A.2", "")?>"
													style="border: none; border-bottom-style: dotted;"> <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-หน่วยงานที่ฝึกอบรม
												<input id="answer_text_353A3" name="answer_texts[3.5.3A.3]"
													type="text"
													value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"3.5.3A.3", "")?>"
													style="border: none; border-bottom-style: dotted;"> <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-ค่าใช้จ่ายในการจ้างหน่วยงานฝึกอบรม
												<input id="answer_text_353A4" name="answer_texts[3.5.3A.4]"
													type="text"
													value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"3.5.3A.4", "")?>"
													style="border: none; border-bottom-style: dotted;">บาท
											</div>
											<div class="choice">
												<input type="radio" value="0" name="answer_choices[3.5.3A]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"3.5.3A", "0")?>
													id="rd353A">ไม่มี
											</div>
										</div>
									</div>
									<!-- END -->

									<div class="poll">
										<!-- 										<div class="num">3.5.4</div> -->
										<h6>3.5.4 การตรวจสอบอุปกรณ์และเส้นทางที่ใช้ในภาวะฉุกเฉิน?</h6>
										<div class="choices">
											<div class="choice">
												<input type="radio" value="1" name="answer_choices[3.5.4A]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"3.5.4A", "1")?>
													id="rd354A">มี (โปรดระบุ) <br>
												&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input
													type="checkbox" value="1" name="answer_choices[3.5.4A.A]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"3.5.4A.A", "1")?>
													id="ck354AA">ทั้งส่วนงาน <input type="checkbox" value="1"
													name="answer_choices[3.5.4A.B]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"3.5.4A.B", "1")?>
													id="ck354AB">บางพื้นที่/อาคาร (โปรดระบุ)<input
													id="answer_text_354AB" name="answer_texts[3.5.4A.B]"
													type="text"
													style="border: none; border-bottom-style: dotted;"> <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-วันที่จัดการฝึกอบรม
												<input id="answer_text_354A1" name="answer_texts[3.5.4A.1]"
													value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"3.5.4A.1", "")?>"
													type="text"
													value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"3.5.4A.1", "")?>"
													style="border: none; border-bottom-style: dotted;"> <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-ชื่อหลักสุตรที่อบรม
												<input id="answer_text_354A2" name="answer_texts[3.5.4A.2]"
													type="text"
													value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"3.5.4A.2", "")?>"
													style="border: none; border-bottom-style: dotted;"> <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-หน่วยงานที่ฝึกอบรม
												<input id="answer_text_354A3" name="answer_texts[3.5.4A.3]"
													type="text"
													value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"3.5.4A.34", "")?>"
													style="border: none; border-bottom-style: dotted;"> <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-ค่าใช้จ่ายในการจ้างหน่วยงานฝึกอบรม
												<input id="answer_text_354A4" name="answer_texts[3.5.4A.4]"
													type="text"
													value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"3.5.4A.4", "")?>"
													style="border: none; border-bottom-style: dotted;">บาท <br>
											</div>
											<div class="choice">
												<input type="radio" value="0" name="answer_choices[3.5.4A]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"3.5.4A", "0")?>
													id="rd354A">ไม่มี
											</div>
										</div>
									</div>
									<!-- END -->

								</div>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a class="accordion-toggle" data-toggle="collapse"
										data-parent="#accordion1" href="#collapse_4"> 4.
										การะประเมินผลและการทบทวนการจัดการ </a>
								</h4>
							</div>
							<div id="collapse_4" class="panel-collapse collapse">
								<div class="panel-body">

									<div class="poll">
										<!-- 										<div class="num">4.1</div> -->
										<p class="list-datetime bold uppercase font-red">4.1
											การตรวจประเมินด้านความปลอดภัย ฯ</p>
										<div class="choices">
											<div class="choice">

												<table id="gvResult" border="1">
													<thead>
														<tr>
															<th rowspan="2" style="text-align: center;">&nbsp;&nbsp;&nbsp;ระบบการจัดการที่เข้ารับ<br>การตรวจประเมิน&nbsp;&nbsp;&nbsp;
															</th>
															<th colspan="2" style="text-align: center;">&nbsp;&nbsp;&nbsp;ผู้ตรวจประเมิน&nbsp;&nbsp;&nbsp;</th>
															<th rowspan="2" style="text-align: center;">&nbsp;&nbsp;&nbsp;ผลการตรวจประเมิน&nbsp;&nbsp;&nbsp;</th>
														</tr>
														<tr>
															<th style="text-align: center;">&nbsp;&nbsp;&nbsp;ภายใน&nbsp;&nbsp;&nbsp;</th>
															<th style="text-align: center;">&nbsp;&nbsp;&nbsp;ภายนอก&nbsp;&nbsp;&nbsp;</th>
														
														
														<tr>
													
													</thead>
													<tbody>
						<?php
						$order = 1;
						$qid = 1;
						for($x = 1; $x < 5; $x ++) {
							echo '<tr>';
							for($y = 1; $y <= 4; $y ++) {
								echo '<td>&nbsp;&nbsp;&nbsp;<input id="answer_texts_4.1' . $qid . '" name="answer_texts[4.1.' . $qid . ']" type="text" value="' . (QuestionUtil::getAnswerValue ( $answers, CommonUtil::TEXT_TYPE, "4.1." . $qid, "" )) . '" style="border: none; border-bottom-style: dotted;">&nbsp;&nbsp;&nbsp;</td>';
								$qid ++;
							}
							echo '</tr>';
							$order ++;
						}
						?>
						</tbody>
												</table>
											</div>
											<div class="choice"></div>
										</div>
									</div>
									<!-- END -->


									<br>
									<p class="list-datetime bold uppercase font-red">4.2
										รายงานการเกิดอุบัติเหตุและการสอบสวนอุบัติเหตุ</p>
									<div class="poll">
										<!-- 										<div class="num">4.2.1</div> -->
										<h6>4.2.1 ส่วนงานมีระบบการแจ้งเหตุหรือการรายงานเกิดอุบัติเหตุ?</h6>
										<div class="choices">
											<div class="choice">
												<input type="radio" value="1" name="answer_choices[4.2.1A]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"4.2.1A", "1")?>
													id="rd421A">มี ผ่านระบบบ <br>
												&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input
													type="checkbox" value="1" name="answer_choices[4.2.1A.1]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"4.2.1A.1", "1")?>
													id="ck421A1">เอกสาร <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
												<input type="checkbox" value="1"
													name="answer_choices[4.2.1A.2]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"4.2.1A.2", "1")?>
													id="ck421A2">อิเล็กทรอนิกส์ (โปรดระบุชื่อ) <input
													id="answer_text_421A2" name="answer_texts[4.2.1A.2]"
													type="text"
													value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"4.2.1A.2", "")?>"
													style="border: none; border-bottom-style: dotted;">
											</div>
											<div class="choice">
												<input type="radio" value="0" name="answer_choices[4.2.1A]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"4.2.1A", "0")?>
													id="rd421A">ไม่มี
											</div>
											** โปรดแนบไฟล์รายงานการเกิดอุบัติเหตุ** <label> <input
												name="answer_files[]" type="file" style="display: none;"
												onchange='getFilename("421A",this)' /><a>&nbsp;&nbsp;<i
													class="fa fa-paperclip"></i></a></label> <input
												id="fpath_421A" placeholder="" disabled="disabled"
												style="border: none;"
												value="<?php echo QuestionUtil::getAnswerValue($answers, "4", "4.2.1A", "")?>" />
<?php if(QuestionUtil::getAnswerValue($answers, "4", "4.2.1A", "") != ''){?>
<a title="Download" class="fa fa-download"
												href="<?php echo ConfigUtil::getAppName().''. QuestionUtil::getAnswerValue($answers, "4", "4.2.1A", "")?>"></a>
											<input type="hidden" name="tmpPath[4.2.1A]"
												value="<?php echo  QuestionUtil::getAnswerValue($answers, "4", "4.2.1A", "")?>">
<?php }?>


						</div>
									</div>
									<!-- END -->
									<div class="poll">
										<!-- 										<div class="num">4.2.2</div> -->
										<h6>4.2.2 ความถี่ในการเกิดอุบัติเหตุ?</h6>
										<div class="choices">
											<div class="choice">
												<input id="answer_text_29" name="answer_texts[4.2.2]"
													value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"4.2.2", "")?>"
													type="text"
													style="border: none; border-bottom-style: dotted;">ครั้ง/ปี
											</div>
											<div class="choice"></div>
										</div>
									</div>
									<!-- END -->
									<div class="poll">
										<!-- 										<div class="num">4.2.3</div> -->
										<h6>4.2.3 ความเสียหายจากการเกิดอุบัติเหตุ?</h6>
										<div class="choices">
											<div class="choice">
												<input type="checkbox" value="1"
													name="answer_choices[4.2.3A]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"4.2.3A", "1")?>
													id="ck423A">เสียชีวิต จำนวน <input id="answer_text_423A"
													name="answer_texts[4.2.3A]"
													value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"4.2.3A", "")?>"
													type="text"
													style="border: none; border-bottom-style: dotted;">คน/ปี <br>
												<input type="checkbox" value="1"
													name="answer_choices[4.2.3B]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"4.2.3B", "1")?>
													id="ck423B">บาดเจ็บ/เจ็บป่วย จำนวน <input
													id="answer_text_423B" name="answer_texts[4.2.3B]"
													value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"4.2.3B", "")?>"
													type="text"
													style="border: none; border-bottom-style: dotted;">คน/ปี <br>
												<input type="checkbox" value="1"
													name="answer_choices[4.2.3C]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"4.2.3C", "1")?>
													id="ck423C">ทรัพย์สินเสียหาย จำนวน <input
													id="answer_text_423C" name="answer_texts[4.2.3C]"
													value="<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::TEXT_TYPE,"4.2.3C", "")?>"
													type="text"
													style="border: none; border-bottom-style: dotted;">คน/ปี
											</div>
											<div class="choice"></div>
										</div>
									</div>
									<!-- END -->

									<div class="poll">
										<!-- 										<div class="num">4.2.4</div> -->
										<h6>4.2.4 ส่วนงานมีการรายงานการสอบสวนอุบัติเหตุ?</h6>
										<div class="choices">
											<div class="choice">
												<input type="radio" value="1" name="answer_choices[4.2.4A]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"4.2.4A", "1")?>
													id="answer_choices_3">มี (โปรดแนบไฟล์เอกสารการรายงาน)<label>
													<input name="answer_files[]" type="file"
													style="display: none;" onchange='getFilename("424A",this)' /><a>&nbsp;&nbsp;<i
														class="fa fa-paperclip"></i></a>
												</label> <input id="fpath_424A" placeholder=""
													disabled="disabled" style="border: none;"
													value="<?php echo QuestionUtil::getAnswerValue($answers, "4", "4.2.4A", "")?>" />
<?php if(QuestionUtil::getAnswerValue($answers, "4", "4.2.4A", "") != ''){?>
<a title="Download" class="fa fa-download"
													href="<?php echo ConfigUtil::getAppName().''. QuestionUtil::getAnswerValue($answers, "4", "4.2.4A", "")?>"></a>
												<input type="hidden" name="tmpPath[4.2.4A]"
													value="<?php echo  QuestionUtil::getAnswerValue($answers, "4", "4.2.4A", "")?>">
<?php }?>

							</div>
											<div class="choice">
												<input type="radio" value="0" name="answer_choices[4.2.4A]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"4.2.4A", "0")?>
													id="answer_choices_3">ไม่มี
											</div>
										</div>
									</div>
									<!-- END -->
									<div class="poll">
										<!-- 										<div class="num">4.2.5</div> -->
										<h6>4.2.5
											ส่วนงานมีมาตราการ/วิธีการดำเนินการแก้ไขและป้องกันการเกิดซ้ำ?</h6>
										<div class="choices">
											<div class="choice">
												<input type="radio" value="1" name="answer_choices[4.2.5A]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"4.2.5A", "1")?>
													id="answer_choices_3">มี (โปรดแนบไฟล์เอกสารการรายงาน)<label>
													<input name="answer_files[]" type="file"
													style="display: none;" onchange='getFilename("425A",this)' /><a>&nbsp;&nbsp;<i
														class="fa fa-paperclip"></i></a>
												</label> <input id="fpath_425A" placeholder=""
													disabled="disabled" style="border: none;"
													value="<?php echo QuestionUtil::getAnswerValue($answers, "4", "4.2.5A", "")?>" />
<?php if(QuestionUtil::getAnswerValue($answers, "4", "4.2.5A", "") != ''){?>
<a title="Download" class="fa fa-download"
													href="<?php echo ConfigUtil::getAppName().''. QuestionUtil::getAnswerValue($answers, "4", "4.2.5A", "")?>"></a>
												<input type="hidden" name="tmpPath[4.2.5A]"
													value="<?php echo  QuestionUtil::getAnswerValue($answers, "4", "4.2.5A", "")?>">
<?php }?>

							</div>
											<div class="choice">
												<input type="radio" value="0" name="answer_choices[4.2.5A]"
													<?php echo QuestionUtil::getAnswerValue($answers, CommonUtil::CHECKBOX_TYPE,"4.2.5A", "0")?>
													id="answer_choices_3">ไม่มี
											</div>
										</div>
									</div>
									<!-- END -->

								</div>
							</div>
						</div>
					</div>


					<div class="form-actions">
						<button type="submit" class="btn blue"><?php echo ConfigUtil::getBtnSaveButton();?></button>
						<button type="button" class="btn default"><?php echo ConfigUtil::getBtnCloseName();?></button>
					</div>

				</div>

			</div>
		</div>

	</div>





	<script
		src="<?php echo ConfigUtil::getAppName();?>/assets/global/plugins/jquery.min.js"
		type="text/javascript"></script>

	<script>

	jQuery(document).ready(function () {
		


				
	   $('input[type=radio]').click(function(){
		   switch(this.id){
		   case "rd111A":
			   switch(this.value){
				   case "1":
					   $('#answer_other_111A').val('');
				   break;
			   }
			   break;
			   
		   case "rd1222A":
			   switch(this.value){
			   		case "0":
				  	 $('#answer_other_1222A').val('');
				   break;
				   }
			   break;
		   case "rd1231A":
			   switch(this.value){
			   	case "0":
				   	$('#answer_other_1231A').val('');
			   	break;
			   }
			   break;
		   case "rd1232A":
			   switch(this.value){
			   		case "1":
				   		$('#answer_other_1232A').val('');
			   		break;
			   		case "0":
			   			$('#answer_text_12321A').val('');
			   			$('#answer_text_12321B').val('');
			   			$('#answer_text_12322A').val('');
			   			$('#answer_text_12322B').val('');
			   			$('#answer_text_12323A').val('');
			   			$('#answer_text_12323B').val('');
			   			$('#answer_text_12324A').val('');
			   			$('#answer_text_12324B').val('');
			   			$('#answer_text_12325A').val('');
			   			$('#answer_text_12325B').val('');
			   		break;
			   }
			   break;
		   case "rd13A":
			   switch(this.value){
				   case "0":
					   $('#answer_other_13A1').val('');
					   $('#answer_other_13A2').val('');
					   $('#answer_other_13A3').val('');
					   $('#answer_other_13A4').val('');
					   
// 					   ck13A1
// 					   ck13A2
// 					   ck13A3
// 					   ck13A4
// 					   ck231A5
// 					   ck231A6
// 					   ck231A7
				   break;
			   }
			   break;
		   case "rd22A":
			   switch(this.value){
			   case "0":
				   $('#answer_text_22A1').val('');
				   $('#answer_text_22A2').val('');
				   $('#answer_text_22A3').val('');
				   $('#answer_text_22A4').val('');
				   $('#answer_text_22A5').val('');
				   break;
			   }
			   break;

			   
			   case "rd231A":
				   switch(this.value){
				   		case "0":
					   		$('#answer_other_231A5').val('');
					   		$('#answer_other_231A6').val('');
					   		$('#answer_other_231A7').val('');
					   		$('#answer_other_231A').val('');
				   		break;
					}
				break;
		   case "rd321A":
			   switch(this.value){
			   		case "0":
				   		$('#answer_other_321A1').val('');
				   		$('#answer_other_321A2').val('');
				   		$('#answer_other_321A3').val('');
			   		break;
				}
			break;
		   case "rd2321A":
			   switch(this.value){
			   		case "0":
			   			$('#answer_other_2321A1').val('');
			   			$('#answer_other_2321A2').val('');
			   			$('#answer_other_2321A3').val('');
			   			$('#answer_other_2321A4').val('');
			   			$('#answer_other_2321A5').val('');
						$('#answer_other_2321A6').val('');
						$('#answer_other_2321A7').val('');
						$('#answer_other_2321A8').val('');
						$('#answer_other_2321A9').val('');
						$('#answer_other_2321A10').val('');
						
			   		break;
			   }
			   break;

		   case "rd2322A":
			   switch(this.value){
		   		case "0":
		   			$('#answer_other_2322A1').val('');
		   			$('#answer_other_2322A2').val('');
		   			$('#answer_other_2322A3').val('');
		   			$('#answer_other_2322A4').val('');
		   			$('#answer_other_2322A5').val('');
					$('#answer_other_2322A6').val('');
					$('#answer_other_2322A7').val('');
					$('#answer_other_2322A8').val('');
					$('#answer_other_2322A9').val('');
					$('#answer_other_2322A10').val('');
		   		break;
		   }
		   break;
		   case "rd322A":
			   switch(this.value){
		   		case "0":
		   			$('#answer_other_322A1').val('');
		   			$('#answer_other_322A2').val('');
		   			$('#answer_other_322A3').val('');
		   		break;
		   }
		   break;
		   case "rd354A":
			   switch(this.value){
		   		case "0":
		   			$('#answer_text_352A1').val('');
		   			$('#answer_text_354AB').val('');
		   			$('#answer_text_354A1').val('');
		   			$('#answer_text_354A2').val('');
		   			$('#answer_text_354A3').val('');
		   			$('#answer_text_354A4').val('');
		   			

// 		   			ck354AA
// 		   			ck354AB


		   			
		   		break;
		   }
		   break;

		   
		   case "rd341A":
			   switch(this.value){
		   		case "0":
		   			$('#answer_choices_341A7').val('');
		   			
//		 			ck341A1
//		 			ck341A2
//		 			ck341A3
//		 			ck341A4
//		 			ck341A5
//		 			ck341A6
//		 			ck341A7
		   		break;
		   		}
		   break;
		   case "rd351A1A":
			   switch(this.value){
		   		case "0":
// 		   			ck351A1B
// 		   			ck351A1C
// 		   			ck351A3C
// 		   			ck351A4C
// 		   			ck351A5C
// 		   			ck351A6D
		   		break;
		   		}
		   break;
		   case "rd352A":
			   switch(this.value){
		   		case "0":
		   			$('#answer_text_352AB').val('');
		   			$('#answer_text_352A1').val('');
		   			$('#answer_text_352A2').val('');
		   			$('#answer_text_352A3').val('');
		   			$('#answer_text_352A4').val('');
		   			
		   			
//		   			ck352AA
//		   			ck352AB
		   		break;
		   }
		   break;
		   case "rd353A":
			   switch(this.value){
		   		case "0":
		   			$('#answer_text_353AB').val('');
		   			$('#answer_text_353A1').val('');
		   			$('#answer_text_353A2').val('');
		   			$('#answer_text_353A3').val('');
		   			$('#answer_text_353A4').val('');
		   			
//		   			ck353AA
//		   			ck353AB
		   		break;
		   }
		   break;
		   case "rd421A":
			   switch(this.value){
		   		case "0":
		   			$('#answer_text_421A2').val('');
		   			
//		   			ck421A1
//		   			ck421A2
		   		break;
		   }
		   break;
		   }
		   
	    });
	    
	   $('input[type=checkbox]').click(function(){
		   switch(this.id){
		   
		case "ck13A1":
			if(!this.checked){
				$('#answer_other_13A1').val('');
			}
			break;
		case "ck13A2":
			if(!this.checked){
				$('#answer_other_13A2').val('');
			}
			break;
		case "ck13A3":
			if(!this.checked){
				$('#answer_other_13A3').val('');
			}
			break;
		case "ck13A4":
			if(!this.checked){
				$('#answer_other_13A4').val('');
			}
			break;
		case "ck231A5":
			if(!this.checked){
				$('#answer_other_231A5').val('');
			}
			break;
		case "ck231A6":
			if(!this.checked){
				$('#answer_other_231A6').val('');
			}
			break;
		case "ck231A7":
			if(!this.checked){
				$('#answer_other_231A7').val('');
			}
			break;
			case "ck341A7":
				if(!this.checked){
					$('#answer_choices_341A7').val('');
				}
				break;
			case "ck351A1C":
				if(!this.checked){
					$('#answers_text_351A1C').val('');
				}
				break;
			case "ck351A2C":
				if(!this.checked){
					$('#answer_text_351A2C').val('');
				}
				break;
			case "ck351A3C":
				if(!this.checked){
					$('#answer_text_351A3C').val('');
				}
				break;
			case "ck351A4C":
				if(!this.checked){
					$('#answer_text_351A4C').val('');
				}
				break;
			case "ck354AB":
				if(!this.checked){
					$('#answer_text_354AB').val('');
				}
				break;
			case "ck351A5C":
				if(!this.checked){
					$('#answer_text_351A5C').val('');
				}
				break;
			case "ck351A6D":
				if(!this.checked){
					$('#answer_text_351A6D').val('');
				}
				break;
//	 			ck352AA":
	 			case "ck352AB":
	 				if(!this.checked){
	 					$('#answer_text_352AB').val('');
	 					$('#answer_text_352A1').val('');
	 					$('#answer_text_352A2').val('');
	 					$('#answer_text_352A3').val('');
	 					$('#answer_text_352A4').val('');
	 				}
	 				break;
// 			ck353AA":
			case "ck353AB":
				if(!this.checked){
					$('#answer_text_353AB').val('');
					$('#answer_text_353A1').val('');
					$('#answer_text_353A2').val('');
					$('#answer_text_353A3').val('');
					$('#answer_text_353A4').val('');
				}
				break;
// 			ck421A1":
			case "ck421A2":
				if(!this.checked){
					$('#answer_text_421A2').val('');
				}
				break;
			case "ck423A":
				if(!this.checked){
					$('#answer_text_423A').val('');
				}
				break;
			case "ck423B":
				if(!this.checked){
					$('#answer_text_423B').val('');
				}
				break;
			case "ck423C":
				if(!this.checked){
					$('#answer_text_423C').val('');
				}
				break;
		   	case "ck2135":
			   	if(!this.checked){
				   	$('#answer_text_2135').val('');
			   	}
			   	break;
		   }
	    });
	});
</script>



</form>