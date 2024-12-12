<?php

/**
 * This is the model class for table "blog_media".
 *
 * The followings are the available columns in table 'blog_media':
 * @property integer $id
 * @property string $media
 * @property integer $blog_id
 *
 * The followings are the available model relations:
 * @property Blog $blog
 */
class BlogMedia extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return BlogMedia the static model class
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
		return 'blog_media';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('blog_id', 'required'),
			array('blog_id', 'numerical', 'integerOnly'=>true),
			array('media', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, media, blog_id', 'safe', 'on'=>'search'),
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
			'blog' => array(self::BELONGS_TO, 'Blog', 'blog_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'media' => 'Media',
			'blog_id' => 'Blog',
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
		$criteria->compare('media',$this->media,true);
		$criteria->compare('blog_id',$this->blog_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}