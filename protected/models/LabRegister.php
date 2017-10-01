<?php
class LabRegister extends CActiveRecord {
	public static function model($className = __CLASS__) {
		return parent::model ( $className );
	}
	public function tableName() {
		return 'tb_lab_register';
	}
	public function relations() {
		
		return array(
				'faculty' => array(self::BELONGS_TO, 'MFaculty', 'faculty_id'),
				'department' => array(self::BELONGS_TO, 'MDepartment', 'dep_department_id'),
				'build' => array(self::BELONGS_TO, 'MBuilding', 'building_id'),
				'lab_operating_characteristics' => array(self::BELONGS_TO, 'MLabOperChar', 'lab_operating_characteristics_id'),
				'lab_type' => array(self::BELONGS_TO, 'MLabType', 'lab_type_id'),
				'users' => array(self::BELONGS_TO, 'UsersLogin', 'user_id')
		);
	}
	public function rules() {
		return array (
				array ('id,
						faculty_id,
						dep_addr,lab_code,
						dep_soi,
						dep_road,
						dep_tambon_id,
						dep_amphur_id,
						dep_province_id,
						dep_zipcode,
						lab_name,
						lab_room_no,
						lab_floor,building_id,
						lab_building_name,
						lab_building_age,
						lab_area,
						lab_number_of_use,
						lab_telephone,
						lab_fax,
						lab_operating_characteristics_id,dep_department_id,
						lab_type_id,
						
						create_date date
						update_date date
						create_by,
						update_by,user_id',
						'safe' 
				) 
		);
	}
	public function attributeLabels() {
		return array ()

		;
	}
	public function getUrl($post = null) {
		if ($post === null)
			$post = $this->post;
		return $post->url . '#c' . $this->id;
	}
	protected function beforeSave() {
		return true;
	}
	public function search() {
		$criteria = new CDbCriteria ();
		return new CActiveDataProvider ( get_class ( $this ), array (
				'criteria' => $criteria,
				'sort' => array (
						'defaultOrder' => 't.id asc' 
				),
				'pagination' => array (
						'pageSize' => 15 
				) // ConfigUtil::getDefaultPageSize()
 
		) );
	}
	public static function getMax() {
		$criteria = new CDbCriteria ();
		$criteria->order = 'id DESC';
		$row = self::model ()->find ( $criteria );
		$max = $row->id;
		return $max+1;
	}
}