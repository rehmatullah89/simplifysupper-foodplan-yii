<?php

/**
 * This is the model class for table "store_ad".
 *
 * The followings are the available columns in table 'store_ad':
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $url
 * @property string $store_logo
 * @property string $start_date
 * @property string $end_date
 * @property string $status
 * @property string $created_at
 * @property integer $created_by
 * @property string $modified_at
 * @property integer $modified_by
 *
 * The followings are the available model relations:
 * @property StoreadCategory[] $storeadCategories
 */
class StoreAd extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return StoreAd the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'store_ad';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('created_at, created_by', 'required'),
            array('created_by, modified_by', 'numerical', 'integerOnly' => true),
            array('title, url', 'length', 'max' => 255),
            array('status', 'length', 'max' => 8),
            array('description, store_logo, start_date, end_date, modified_at', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, title, description, url, store_logo, start_date, end_date, status, created_at, created_by, modified_at, modified_by', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'storeadCategories' => array(self::HAS_MANY, 'StoreadCategory', 'storad_id'),
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
            'url' => 'Url',
            'store_logo' => 'Store Logo',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
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
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('url', $this->url, true);
        $criteria->compare('store_logo', $this->store_logo, true);
        $criteria->compare('start_date', $this->start_date, true);
        $criteria->compare('end_date', $this->end_date, true);
        $criteria->compare('status', $this->status);
        $criteria->compare('created_at', $this->created_at, true);
        $criteria->compare('created_by', $this->created_by);
        $criteria->compare('modified_at', $this->modified_at, true);
        $criteria->compare('modified_by', $this->modified_by);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public static function getRecipeforstoread() {

        $criteria = new CDbCriteria();
        $criteria->select = 'cat_name , cat_type, parent'; // select fields which you want in output
        $criteria->condition = 'parent=:parent AND cat_type=:category1 OR cat_type=:category2';
        $criteria->params = array(':category1' => 'Recipe', ':category2' => 'Ingredient', ':parent' => 0);
        $categories = Category::model()->findAll($criteria);
        $category = array();
        foreach ($categories as $cat) {

            $category[$cat->cat_name] = $cat->cat_name;

            //array_push($category, $cat->cat_name);
        }
        if (empty($category)) {
            array_push($category, 'No Category Exists');
        }
        return $category;
    }

    public function checkDates() {
        $end_date = strtotime($this->end_date);
        $start_date = strtotime($this->start_date);
        if ($start_date > $end_date) {
            $this->addError('date_to', 'Store Ad end date cannot be before than start date');
        }
    }

    public static function getStoreAdCats($id) {
        $criteria = new CDbCriteria;
        $criteria->select = 'cat_id,storad_id'; // select fields which you want in output
        $criteria->condition = 'storad_id = "' . $id . '"';
        $categories = StoreadCategory::model()->findAll($criteria);
        $category = array();
        foreach ($categories as $cat) {
            $criteria->select = 'id,cat_name'; // select fields which you want in output
            $criteria->condition = 'id = "' . $cat->cat_id . '"';
            $categories = Category::model()->findAll($criteria);
            array_push($category, $categories[0]->cat_name);
        }
        return $category;
    }

    /*
     * Use this funciton on update 
     * Get all selected categories form coupons categoryt table \
     * and get their name from main category table
     */

    public static function getStoreAdCatNames($id) {
        $criteria = new CDbCriteria;
        $criteria->select = 'cat_id,storad_id'; // select fields which you want in output
        $criteria->condition = 'storad_id = "' . $id . '"';
        $categories = StoreadCategory::model()->findAll($criteria);
        $category = array();
        foreach ($categories as $cat) {
            $category_info = Category::model()->findbyPk($cat['cat_id']);
            array_push($category, $category_info->cat_name);
        }
        return $category;
    }

    public static function getCategories() {
        $criteria = new CDbCriteria;
        $criteria->select = 'cat_name , cat_type, parent'; // select fields which you want in output
        $criteria->condition = 'cat_type = "Recipe"';
        $categories = Category::model()->findAll($criteria);
        $category = array();
        foreach ($categories as $cat) {
            array_push($category, $cat->cat_name);
        }
        if (empty($category)) {
            array_push($category, 'No Category Exists');
        }
        return $category;
    }

}
