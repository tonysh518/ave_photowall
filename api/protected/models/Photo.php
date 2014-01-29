<?php

/**
 * This is the model class for table "Photo".
 *
 * The followings are the available columns in table 'Photo':
 * @property integer $pid
 * @property string $image
 * @property string $screen_name
 * @property integer $sns_uid
 * @property string $avatar
 * @property string $content
 * @property integer $datetime
 */
class Photo extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Photo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('image, screen_name, sns_uid, avatar, content, datetime', 'required'),
			array('sns_uid, datetime', 'numerical', 'integerOnly'=>true),
			array('image, screen_name, avatar', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('pid, image, screen_name, sns_uid, avatar, content, datetime', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'pid' => 'photo id',
			'image' => 'image url',
			'screen_name' => 'weibo screen name',
			'sns_uid' => 'weibo uid',
			'avatar' => 'weibo avatar url',
			'content' => 'content',
			'datetime' => 'Datetime',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('pid',$this->pid);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('screen_name',$this->screen_name,true);
		$criteria->compare('sns_uid',$this->sns_uid);
		$criteria->compare('avatar',$this->avatar,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('datetime',$this->datetime);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Photo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
