<?php

/**
 * This is the model class for table "memberingredients".
 *
 * The followings are the available columns in table 'memberingredients':
 * @property string $id
 * @property string $ingredient_id
 * @property integer $cat_id
 * @property integer $measurement_id
 * @property string $amount
 * @property integer $memberid
 * @property string $ingdesc
 *
 * The followings are the available model relations:
 * @property Categories $cat
 * @property Ingredients $ingredient
 * @property Measurements $measurement
 * @property Members $member
 */
class Memberingredient extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Memberingredient the static model class
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
		return 'memberingredients';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ingredient_id, cat_id, measurement_id, amount, memberid, ingdesc', 'required'),
			array('cat_id, measurement_id, memberid', 'numerical', 'integerOnly'=>true),
			array('ingredient_id', 'length', 'max'=>20),
			array('amount, ingdesc', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, ingredient_id, cat_id, measurement_id, amount, memberid, ingdesc', 'safe', 'on'=>'search'),
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
			'cat' => array(self::BELONGS_TO, 'Categories', 'cat_id'),
			'ingredient' => array(self::BELONGS_TO, 'Ingredients', 'ingredient_id'),
			'measurement' => array(self::BELONGS_TO, 'Measurements', 'measurement_id'),
			'member' => array(self::BELONGS_TO, 'Members', 'memberid'),
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
			'cat_id' => 'Cat',
			'measurement_id' => 'Measurement',
			'amount' => 'Amount',
			'memberid' => 'Memberid',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('ingredient_id',$this->ingredient_id,true);
		$criteria->compare('cat_id',$this->cat_id);
		$criteria->compare('measurement_id',$this->measurement_id);
		$criteria->compare('amount',$this->amount,true);
		$criteria->compare('memberid',$this->memberid);
		$criteria->compare('ingdesc',$this->ingdesc,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}