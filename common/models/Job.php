<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "job".
 *
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property int $created_at
 * @property int $created_by
 * @property int|null $category_id
 *
 * @property Application[] $applications
 * @property Category $category
 * @property User $createdBy
 */
class Job extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'job';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'created_at', 'created_by'], 'required'],
            [['created_at', 'created_by', 'category_id'], 'integer'],
            [['title', 'description'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'category_id' => 'Category ID',
        ];
    }

    /**
     * Gets query for [[Applications]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\ApplicationQuery
     */
    public function getApplications()
    {
        return $this->hasMany(Application::className(), ['job_id' => 'id']);
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\CategoryQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * Gets query for [[CreatedBy]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\UserQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\JobQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\JobQuery(get_called_class());
    }
}
