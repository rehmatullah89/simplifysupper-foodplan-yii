<?php

/**
 * This is the model class for table "recipes_of_day".
 *
 * The followings are the available columns in table 'recipes_of_day':
 * @property string $id
 * @property string $rod_day
 * @property integer $recipeid
 * @property integer $servingsize
 *
 * The followings are the available model relations:
 * @property Recipes $recipe
 */
class RecipesOfDay extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return RecipesOfDay the static model class
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
		return 'recipes_of_day';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
//			array('rod_day, recipeid, servingsize', 'required'),
//			array('recipeid, servingsize', 'numerical', 'integerOnly'=>true),
//			// The following rule is used by search().
//			// Please remove those attributes that should not be searched.
//			array('id, rod_day, recipeid, servingsize', 'safe', 'on'=>'search'),
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
			'recipe' => array(self::BELONGS_TO, 'Recipe', 'recipeid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'rod_day' => 'Rod Day',
			'recipeid' => 'Recipeid',
			'servingsize' => 'Servingsize',
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
		$criteria->compare('rod_day',$this->rod_day,true);
		$criteria->compare('recipeid',$this->recipeid);
		$criteria->compare('servingsize',$this->servingsize);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}