<?php

/**
 * This is the model class for table "ingredient_measurement".
 *
 * The followings are the available columns in table 'ingredient_measurement':
 * @property integer $id
 * @property string $ing_id
 * @property integer $measure_id
 *
 * The followings are the available model relations:
 * @property Measurements $measure
 * @property Ingredients $ing
 */
class IngredientMeasurement extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return IngredientMeasurement the static model class
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
		return 'ingredient_measurement';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ing_id, measure_id', 'required'),
			array('measure_id', 'numerical', 'integerOnly'=>true),
			array('ing_id', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, ing_id, measure_id', 'safe', 'on'=>'search'),
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
			'measure' => array(self::BELONGS_TO, 'Measurement', 'measure_id'),
			'ing' => array(self::BELONGS_TO, 'Ingredient', 'ing_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'ing_id' => 'Ing',
			'measure_id' => 'Measure',
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
		$criteria->compare('ing_id',$this->ing_id,true);
		$criteria->compare('measure_id',$this->measure_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}