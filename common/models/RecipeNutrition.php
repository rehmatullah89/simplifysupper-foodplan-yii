<?php

/**
 * This is the model class for table "recipe_nutritions".
 *
 * The followings are the available columns in table 'recipe_nutritions':
 * @property string $id
 * @property integer $recipeid
 * @property string $measure_unit
 * @property double $weight
 * @property double $water
 * @property double $kcal
 * @property double $protein
 * @property double $fat
 * @property double $sat_fat
 * @property double $mono_unsat_fat
 * @property double $poly_unsat_fat
 * @property double $cholesterol
 * @property double $carbohydrate
 * @property double $dietry_fiber
 * @property double $calcium
 * @property double $iron
 * @property string $potassium
 * @property string $sodium
 * @property double $suger
 * @property double $vit_a_iu
 * @property double $vit_a_re
 * @property double $thiamin
 * @property double $flavin
 * @property double $niacin
 * @property double $vit_c
 * @property double $vit_e
 *
 * The followings are the available model relations:
 * @property Recipes $recipe
 */
class RecipeNutrition extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return RecipeNutrition the static model class
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
		return 'recipe_nutritions';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('weight, water, kcal, protein, fat, sat_fat, mono_unsat_fat, poly_unsat_fat, cholesterol, carbohydrate, dietry_fiber, calcium, iron, potassium, sodium, suger, vit_a_iu, vit_a_re, thiamin, flavin, niacin, vit_c, vit_e', 'required'),
			array('recipeid', 'numerical', 'integerOnly'=>true),
			array('weight, water, kcal, protein, fat, sat_fat, mono_unsat_fat, poly_unsat_fat, cholesterol, carbohydrate, dietry_fiber, calcium, iron, suger, vit_a_iu, vit_a_re, thiamin, flavin, niacin, vit_c, vit_e', 'numerical'),
			array('measure_unit', 'length', 'max'=>2),
			array('potassium, sodium', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, recipeid, measure_unit, weight, water, kcal, protein, fat, sat_fat, mono_unsat_fat, poly_unsat_fat, cholesterol, carbohydrate, dietry_fiber, calcium, iron, potassium, sodium, suger, vit_a_iu, vit_a_re, thiamin, flavin, niacin, vit_c, vit_e', 'safe', 'on'=>'search'),
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
			'measure_unit' => 'Measure Unit',
			'weight' => 'Weight',
			'water' => 'Water',
			'kcal' => 'Kcal',
			'protein' => 'Protein',
			'fat' => 'Fat',
			'sat_fat' => 'Sat Fat',
			'mono_unsat_fat' => 'Mono Unsat Fat',
			'poly_unsat_fat' => 'Poly Unsat Fat',
			'cholesterol' => 'Cholesterol',
			'carbohydrate' => 'Carbohydrate',
			'dietry_fiber' => 'Dietry Fiber',
			'calcium' => 'Calcium',
			'iron' => 'Iron',
			'potassium' => 'Potassium',
			'sodium' => 'Sodium',
			'suger' => 'Suger',
			'vit_a_iu' => 'Vit A Iu',
			'vit_a_re' => 'Vit A Re',
			'thiamin' => 'Thiamin',
			'flavin' => 'Flavin',
			'niacin' => 'Niacin',
			'vit_c' => 'Vit C',
			'vit_e' => 'Vit E',
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
		$criteria->compare('measure_unit',$this->measure_unit,true);
		$criteria->compare('weight',$this->weight);
		$criteria->compare('water',$this->water);
		$criteria->compare('kcal',$this->kcal);
		$criteria->compare('protein',$this->protein);
		$criteria->compare('fat',$this->fat);
		$criteria->compare('sat_fat',$this->sat_fat);
		$criteria->compare('mono_unsat_fat',$this->mono_unsat_fat);
		$criteria->compare('poly_unsat_fat',$this->poly_unsat_fat);
		$criteria->compare('cholesterol',$this->cholesterol);
		$criteria->compare('carbohydrate',$this->carbohydrate);
		$criteria->compare('dietry_fiber',$this->dietry_fiber);
		$criteria->compare('calcium',$this->calcium);
		$criteria->compare('iron',$this->iron);
		$criteria->compare('potassium',$this->potassium,true);
		$criteria->compare('sodium',$this->sodium,true);
		$criteria->compare('suger',$this->suger);
		$criteria->compare('vit_a_iu',$this->vit_a_iu);
		$criteria->compare('vit_a_re',$this->vit_a_re);
		$criteria->compare('thiamin',$this->thiamin);
		$criteria->compare('flavin',$this->flavin);
		$criteria->compare('niacin',$this->niacin);
		$criteria->compare('vit_c',$this->vit_c);
		$criteria->compare('vit_e',$this->vit_e);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}