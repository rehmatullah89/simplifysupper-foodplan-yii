<?php

/**
 * This is the model class for table "coupons_category".
 *
 * The followings are the available columns in table 'coupons_category':
 * @property integer $id
 * @property string $coupon_id
 * @property integer $cat_id
 *
 * The followings are the available model relations:
 * @property Coupon $coupon
 * @property Categories $cat
 */
class CouponsCategory extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CouponsCategory the static model class
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
		return 'coupons_category';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('coupon_id, cat_id', 'required'),
			array('cat_id', 'numerical', 'integerOnly'=>true),
			//array('coupon_id', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, coupon_id, cat_id', 'safe', 'on'=>'search'),
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
			'coupon' => array(self::BELONGS_TO, 'Coupon', 'coupon_id'),
			'cat' => array(self::BELONGS_TO, 'Categories', 'cat_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'coupon_id' => 'Coupon',
			'cat_id' => 'Cat',
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
		$criteria->compare('coupon_id',$this->coupon_id,true);
		$criteria->compare('cat_id',$this->cat_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}