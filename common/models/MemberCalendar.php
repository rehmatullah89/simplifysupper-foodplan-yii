<?php

/**
 * This is the model class for table "member_calendar".
 *
 * The followings are the available columns in table 'member_calendar':
 * @property string $id
 * @property integer $recipeid
 * @property string $servings
 * @property string $dateadded
 * @property integer $memberid
 * @property string $sidedishid
 * @property string $sidedish
 * @property string $mc_type
 *
 * The followings are the available model relations:
 * @property Members $member
 * @property Recipes $recipe
 */
class MemberCalendar extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MemberCalendar the static model class
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
		return 'member_calendar';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('recipeid, servings, dateadded, memberid, sidedishid', 'required'),
			array('recipeid, memberid', 'numerical', 'integerOnly'=>true),
			array('servings, sidedishid', 'length', 'max'=>20),
			array('sidedish', 'length', 'max'=>3),
			array('mc_type', 'length', 'max'=>9),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, recipeid, servings, dateadded, memberid, sidedishid, sidedish, mc_type', 'safe', 'on'=>'search'),
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
			'member' => array(self::BELONGS_TO, 'Members', 'memberid'),
			'recipe' => array(self::BELONGS_TO, 'Recipes', 'recipeid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'recipeid' => 'Recipeid',
			'servings' => 'Servings',
			'dateadded' => 'Dateadded',
			'memberid' => 'Memberid',
			'sidedishid' => 'Sidedishid',
			'sidedish' => 'Sidedish',
			'mc_type' => 'Mc Type',
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
		$criteria->compare('recipeid',$this->recipeid);
		$criteria->compare('servings',$this->servings,true);
		$criteria->compare('dateadded',$this->dateadded,true);
		$criteria->compare('memberid',$this->memberid);
		$criteria->compare('sidedishid',$this->sidedishid,true);
		$criteria->compare('sidedish',$this->sidedish,true);
		$criteria->compare('mc_type',$this->mc_type,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}