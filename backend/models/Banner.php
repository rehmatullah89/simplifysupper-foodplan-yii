<?php

/**
 * This is the model class for table "banner".
 *
 * The followings are the available columns in table 'banner':
 * @property string $id
 * @property string $title
 * @property string $details
 * @property string $owner_name
 * @property string $image
 * @property string $back_url
 * @property string $owner_type
 * @property string $owner
 * @property string $owner_phone
 * @property string $owner_email
 * @property string $btype
 * @property double $price
 * @property string $clicks
 * @property string $views
 * @property string $clicked
 * @property string $viewed
 * @property string $status
 * @property string $created_at
 * @property integer $created_by
 * @property string $modified_at
 * @property integer $modified_by
 *
 * The followings are the available model relations:
 * @property Members $createdBy
 */
class Banner extends CActiveRecord
{
    
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Banner the static model class
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
		return 'banner';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('details, owner_name, back_url', 'required'),
			array('created_by, modified_by', 'numerical', 'integerOnly'=>true),
			array('price', 'numerical'),
			array('title, owner_name, image, owner', 'length', 'max'=>255),
			array('owner_type', 'length', 'max'=>6),
			array('owner_phone', 'length', 'max'=>30),
			array('owner_email', 'length', 'max'=>100),
			array('btype', 'length', 'max'=>8),
			array('clicks, views, clicked, viewed', 'length', 'max'=>20),
			array('status', 'length', 'max'=>7),
			array('created_at, modified_at', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, details, owner_name, image, back_url, owner_type, owner, owner_phone, owner_email, btype, price, clicks, views, clicked, viewed, status, created_at, created_by, modified_at, modified_by', 'safe', 'on'=>'search'),
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
			'title' => 'Title',
			'details' => 'Details',
			'owner_name' => 'Owner Name',
			'image' => 'Image',
			'back_url' => 'Back Url',
			'owner_type' => 'Owner Type',
			'owner' => 'Owner',
			'owner_phone' => 'Owner Phone',
			'owner_email' => 'Owner Email',
			'btype' => 'Btype',
			'price' => 'Price',
			'clicks' => 'Clicks',
			'views' => 'Views',
			'clicked' => 'Clicked',
			'viewed' => 'Viewed',
			'status' => 'Status',
			'created_at' => 'Created At',
			'created_by' => 'Created By',
			'modified_at' => 'Modified At',
			'modified_by' => 'Modified By',
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('details',$this->details,true);
		$criteria->compare('owner_name',$this->owner_name,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('back_url',$this->back_url,true);
		$criteria->compare('owner_type',$this->owner_type,true);
		$criteria->compare('owner',$this->owner,true);
		$criteria->compare('owner_phone',$this->owner_phone,true);
		$criteria->compare('owner_email',$this->owner_email,true);
		$criteria->compare('btype',$this->btype,true);
		$criteria->compare('price',$this->price);
		$criteria->compare('clicks',$this->clicks,true);
		$criteria->compare('views',$this->views,true);
		$criteria->compare('clicked',$this->clicked,true);
		$criteria->compare('viewed',$this->viewed,true);
		$criteria->compare('status',$this->status); // remove true for status filtering
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('modified_at',$this->modified_at,true);
		$criteria->compare('modified_by',$this->modified_by);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}