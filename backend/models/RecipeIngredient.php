<?php

/**
 * This is the model class for table "recipeingredients".
 *
 * The followings are the available columns in table 'recipeingredients':
 * @property integer $id
 * @property string $ingredient_id
 * @property integer $ingcat
 * @property integer $measure_id
 * @property string $amount
 * @property double $weight
 * @property string $weight_unit
 * @property integer $recipe_id
 * @property string $ingdesc
 *
 * The followings are the available model relations:
 * @property Recipes $recipe
 * @property Categories $ingcat0
 * @property Ingredients $ingredient
 * @property Measurements $measure
 */
class RecipeIngredient extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return RecipeIngredient the static model class
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
		return 'recipeingredients';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
//			array('ingredient_id, ingcat, measure_id, amount, weight, recipe_id, ingdesc', 'required'),
//			array('ingcat, measure_id, recipe_id', 'numerical', 'integerOnly'=>true),
//			array('weight', 'numerical'),
//			array('ingredient_id', 'length', 'max'=>20),
//			array('amount, ingdesc', 'length', 'max'=>255),
//			array('weight_unit', 'length', 'max'=>2),
//			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, ingredient_id, ingcat, measure_id, amount, weight, weight_unit, recipe_id, ingdesc', 'safe', 'on'=>'search'),
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
			'ingcat0' => array(self::BELONGS_TO, 'Categories', 'ingcat'),
			'ingredient' => array(self::BELONGS_TO, 'Ingredient', 'ingredient_id'),
			'measure' => array(self::BELONGS_TO, 'Measurement', 'measure_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'ingredient_id' => 'Ingredient',
			'ingcat' => 'Ingcat',
			'measure_id' => 'Measure',
			'amount' => 'Amount',
			'weight' => 'Weight',
			'weight_unit' => 'Weight Unit',
			'recipe_id' => 'Recipe',
			'ingdesc' => 'Ingdesc',
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
		$criteria->compare('ingredient_id',$this->ingredient_id,true);
		$criteria->compare('ingcat',$this->ingcat);
		$criteria->compare('measure_id',$this->measure_id);
		$criteria->compare('amount',$this->amount,true);
		$criteria->compare('weight',$this->weight);
		$criteria->compare('weight_unit',$this->weight_unit,true);
		$criteria->compare('recipe_id',$this->recipe_id);
		$criteria->compare('ingdesc',$this->ingdesc,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}