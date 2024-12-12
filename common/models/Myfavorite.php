<?php

/**
 * This is the model class for table "myfavorites".
 *
 * The followings are the available columns in table 'myfavorites':
 * @property integer $id
 * @property integer $recipeid
 * @property string $fav_type
 * @property integer $memberid
 *
 * The followings are the available model relations:
 * @property Members $member
 * @property Recipes $recipe
 */
class Myfavorite extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Myfavorite the static model class
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
		return 'myfavorites';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('recipeid, memberid', 'numerical', 'integerOnly'=>true),
			array('fav_type', 'length', 'max'=>7),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, recipeid, fav_type, memberid', 'safe', 'on'=>'search'),
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
			'fav_type' => 'Fav Type',
			'memberid' => 'Memberid',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('recipeid',$this->recipeid);
		$criteria->compare('fav_type',$this->fav_type,true);
		$criteria->compare('memberid',$this->memberid);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}