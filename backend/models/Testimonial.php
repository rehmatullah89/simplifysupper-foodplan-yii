<?php

/**
 * This is the model class for table "testimonials".
 *
 * The followings are the available columns in table 'testimonials':
 * @property string $id
 * @property integer $created_by
 * @property string $test_name
 * @property string $test_email
 * @property string $comments
 * @property string $created_at
 * @property string $status
 * @property string $approved_on
 * @property string $approved_by
 *
 * The followings are the available model relations:
 * @property Members $createdBy
 */
class Testimonial extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Testimonial the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'testimonials';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('created_by, test_name, test_email, comments, created_at, status', 'required'),
			array('created_by', 'numerical', 'integerOnly'=>true),
			array('test_name, test_email', 'length', 'max'=>100),
			array('status', 'length', 'max'=>8),
			array('approved_by', 'length', 'max'=>20),
			array('approved_on', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, created_by, test_name, test_email, comments, created_at, status, approved_on, approved_by', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'createdBy' => array(self::BELONGS_TO, 'Members', 'created_by'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'created_by' => 'Created By',
			'test_name' => 'Test Name',
			'test_email' => 'Test Email',
			'comments' => 'Comments',
			'created_at' => 'Created At',
			'status' => 'Status',
			'approved_on' => 'Approved On',
			'approved_by' => 'Approved By',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('test_name',$this->test_name,true);
		$criteria->compare('test_email',$this->test_email,true);
		$criteria->compare('comments',$this->comments,true);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('approved_on',$this->approved_on,true);
		$criteria->compare('approved_by',$this->approved_by,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}