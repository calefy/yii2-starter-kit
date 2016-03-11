<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "bsk_exam".
 *
 * @property string $id
 * @property integer $type
 * @property string $category_id
 * @property string $short_time
 * @property string $short_addr
 * @property string $title
 * @property string $description
 * @property string $stem
 * @property integer $status
 * @property string $updated_by
 * @property integer $updated_at
 * @property string $created_by
 * @property integer $created_at
 */
class BskExam extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bsk_exam';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'type', 'category_id', 'status', 'updated_by', 'updated_at', 'created_by', 'created_at'], 'required'],
            [['id', 'type', 'category_id', 'status', 'updated_by', 'updated_at', 'created_by', 'created_at'], 'integer'],
            [['short_time', 'short_addr'], 'string', 'max' => 64],
            [['title'], 'string', 'max' => 128],
            [['description', 'stem'], 'string', 'max' => 256]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common', 'ID'),
            'type' => Yii::t('common', '试卷分类：1-真题'),
            'category_id' => Yii::t('common', '试卷分类ID'),
            'short_time' => Yii::t('common', '短标题-时间'),
            'short_addr' => Yii::t('common', '短标题-地点'),
            'title' => Yii::t('common', '试卷标题'),
            'description' => Yii::t('common', '试卷描述'),
            'stem' => Yii::t('common', '试卷主题干json'),
            'status' => Yii::t('common', '状态：0-删除，1-有效'),
            'updated_by' => Yii::t('common', '更新者'),
            'updated_at' => Yii::t('common', '更新时间'),
            'created_by' => Yii::t('common', '创建者'),
            'created_at' => Yii::t('common', '创建时间'),
        ];
    }
}