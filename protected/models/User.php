<?php

/**
 * This is the model class for table "tbl_user".
 *
 * The followings are the available columns in table 'tbl_user':
 * @property integer $id
 * @property string $username
 * @property string $title
 * @property string $password
 * @property string $email
 * @property string $prefix
 */
class User extends CActiveRecord {

    protected $prefixTemp;

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return User the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    protected function beforeSave() {
        $result = parent::beforeSave();
        if ($result && $this->getIsNewRecord()) {
            $this->prefix = $this->makePrefix();
            $this->createUserTables();
        }
        return $result;
    }

    protected function afterSave() {
        parent::afterSave();
    }

    protected function beforeDelete() {
        $this->prefixTemp = $this->prefix;
        return parent::beforeDelete();
    }

    protected function afterDelete() {
        $this->dropUserTables($this->prefixTemp);
        parent::afterDelete();
    }

    protected function makePrefix() {
        return $this->username;
    }

    protected function createUserTables() {
        $prefix = $this->prefix;
        include("createUserTables.php");
        $connection = Yii::app()->db;
        $command = $connection->createCommand($sqltext);
        $command->execute();
    }

    protected function dropUserTables($prefix) {
        $sqltext = "DROP TABLE IF EXISTS `" . $prefix . "_accounts`;
                        DROP TABLE IF EXISTS `" . $prefix . "_accounts_operations`;
                        DROP TABLE IF EXISTS `" . $prefix . "_accounts_totals`;
                        DROP TABLE IF EXISTS `" . $prefix . "_budgets`;
                        DROP TABLE IF EXISTS `" . $prefix . "_expense_budgets`;
                        DROP TABLE IF EXISTS `" . $prefix . "_expense_categories`;
                        DROP TABLE IF EXISTS `" . $prefix . "_expense_operations`;
                        DROP TABLE IF EXISTS `" . $prefix . "_income_budgets`;
                        DROP TABLE IF EXISTS `" . $prefix . "_income_categories`;
                        DROP TABLE IF EXISTS `" . $prefix . "_income_operations`;
                        DROP TABLE IF EXISTS `" . $prefix . "_operations`;
                        DROP TABLE IF EXISTS `" . $prefix . "_operations_tags`;
                        DROP TABLE IF EXISTS `" . $prefix . "_tags`;";
        $connection = Yii::app()->db;
        $command = $connection->createCommand($sqltext);
        $command->execute();
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'tbl_user';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('username, title, password, email', 'required'),
            array('username, title, password, email', 'length', 'max' => 128),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, username, title, password, email', 'safe', 'on' => 'search'),
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
            'username' => 'Username',
            'password' => 'Password',
            'title' => 'Title',
            'email' => 'Email',
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
        $criteria->compare('username', $this->username, true);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('password', $this->password, true);
        $criteria->compare('email', $this->email, true);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

}