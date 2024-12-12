<?php

/**
 * This is the model class for table "blog".
 *
 * The followings are the available columns in table 'blog':
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $created_at
 * @property integer $created_by
 * @property string $status
 * @property string $meta_keywords
 * @property string $meta_title
 * @property string $meta_desc
 *
 * The followings are the available model relations:
 * @property Members $createdBy
 * @property BlogCategory[] $blogCategories
 * @property BlogMedia[] $blogMedias
 */
class Blog extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Blog the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'blog';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('description, created_at, created_by, meta_keywords, meta_title, meta_desc', 'required'),
            array('created_by', 'numerical', 'integerOnly' => true),
            array('title', 'length', 'max' => 100),
            array('status', 'length', 'max' => 8),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, title, description, created_at, created_by, status, meta_keywords, meta_title, meta_desc', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'createdBy' => array(self::BELONGS_TO, 'Members', 'created_by'),
            'blogCategories' => array(self::HAS_MANY, 'BlogCategory', 'blog_id'),
            'blogMedias' => array(self::HAS_MANY, 'BlogMedia', 'blog_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'status' => 'Status',
            'meta_keywords' => 'Meta Keywords',
            'meta_title' => 'Meta Title',
            'meta_desc' => 'Meta Desc',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('created_at', $this->created_at, true);
        $criteria->compare('created_by', $this->created_by);
        $criteria->compare('status', $this->status);
        $criteria->compare('meta_keywords', $this->meta_keywords, true);
        $criteria->compare('meta_title', $this->meta_title, true);
        $criteria->compare('meta_desc', $this->meta_desc, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }
    
     public static function getBlogCatName($id) {
        $criteria = new CDbCriteria;
        $criteria->select = 'cat_id,blog_id'; // select fields which you want in output
        $criteria->condition = 'blog_id = "' . $id . '"';
        $categories = BlogCategory::model()->findAll($criteria);
        $category = array();
        foreach ($categories as $cat) {
            $criteria->select = 'id,cat_name'; // select fields which you want in output
            $criteria->condition = 'id = "' . $cat->cat_id . '"';
            $categories = Category::model()->findAll($criteria);
            array_push($category, $categories[0]->cat_name);
        }
        return $category;
    }
   

   

}
