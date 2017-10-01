<?php
class QuestionUtil {
	public static function isChildOfSelectedChoice($listOfQuesttion, $question_id, $question_value) {
		$result = false;
		
		foreach ( $answers as $item => $val ) {
			if($item == $question_id && $question_value == $val){
				$result = true;
				break;
			}
		}
		return in_array ( $listOfQuesttion, $question_id ) ? $result : true;
	}
	public static function getAnswerValue($answers, $type, $qid, $radio_compare) {
		$result = '';
		/*
		 * TYPE
		 * 1= Radio
		 * 2= TextBox
		 * 3= CheckBox
		 * 4= File
		 */
		
		if (isset ( $answers )) {
			foreach ( $answers as $item ) {
				if ($item->question_id == $qid && $item->type == $type) {
					switch ($item->type) {
						case "1" :
							$result = ($item->value == $radio_compare) ? 'checked=checked' : '';
							break;
						case "2" :
							$result = $item->value;
							break;
						case "3" :
							$result = ($item->value == $radio_compare) ? 'checked=checked' : '';
							break;
						case "4" :
							$result = $item->value;
							break;
					}
					break;
				}
			}
		}
		return $result;
	}
}