<?php

/**
 * This is the model class for table "user_meal".
 *
 * The followings are the available columns in table 'user_meal':
 * @property integer $id
 * @property integer $recipe_id
 * @property integer $serving_size
 * @property integer $member_id
 * @property string $recipe_date
 *
 * The followings are the available model relations:
 * @property Recipes $recipe
 * @property Members $member
 */
class UserMeal extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return UserMeal the static model class
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
		return 'user_meal';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('recipe_id, serving_size, member_id', 'numerical', 'integerOnly'=>true),
			array('recipe_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, recipe_id, serving_size, member_id, recipe_date', 'safe', 'on'=>'search'),
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
			'recipe' => array(self::BELONGS_TO, 'Recipe', 'recipe_id'),
			'member' => array(self::BELONGS_TO, 'Members', 'member_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'recipe_id' => 'Recipe',
			'serving_size' => 'Serving Size',
			'member_id' => 'Member',
			'recipe_date' => 'Recipe Date',
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
		$criteria->compare('recipe_id',$this->recipe_id);
		$criteria->compare('serving_size',$this->serving_size);
		$criteria->compare('member_id',$this->member_id);
		$criteria->compare('recipe_date',$this->recipe_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}