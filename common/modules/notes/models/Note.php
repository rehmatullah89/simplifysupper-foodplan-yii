<?php

/**
 * This is the model class for table "notes".
 *
 * The followings are the available columns in table 'notes':
 * @property string $id
 * @property string $note_type
 * @property string $description
 * @property string $parent_id
 * @property string $parent_type
 * @property string $created_at
 * @property string $created_by
 * @property string $modified_at
 * @property string $modified_by
 */
class Note extends BActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Notes the static model class
     */
    public function __construct($scenario = 'insert') {
        parent::__construct($scenario);
    }

    public function getType() {

        return get_class($this);
    }

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'notes';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('note_type, description, parent_id, parent_type', 'required'),
            array('note_type', 'length', 'max' => 100),
            array('parent_id, created_by, modified_by', 'length', 'max' => 11),
            array('parent_type', 'length', 'max' => 50),
            array('created_at, modified_at', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, note_type, description, parent_id, parent_type, created_at, created_by, modified_at, modified_by', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'note_type' => 'Note Type',
            'description' => 'Description',
            'parent_id' => 'Parent',
            'parent_type' => 'Parent Type',
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

        $criteria->compare('id', $this->id, true);
        $criteria->compare('note_type', $this->note_type, true);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('parent_id', $this->parent_id, true);
        $criteria->compare('parent_type', $this->parent_type, true);
        $criteria->compare('created_at', $this->created_at, true);
        $criteria->compare('created_by', $this->created_by, true);
        $criteria->compare('modified_at', $this->modified_at, true);
        $criteria->compare('modified_by', $this->modified_by, true);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

    public function findnotes($parent_type, $parent_id) {

        $notes = Note::model()->findAllByAttributes(array(
            'parent_type' => $parent_type,
            'parent_id' => $parent_id,
                ));
        return $notes;
    }

}