<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "bsk_tag".
 *
 * @property string $id
 * @property string $name
 * @property integer $status
 * @property string $updated_by
 * @property integer $updated_at
 * @property string $created_by
 * @property integer $created_at
 */
class BskTag extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bsk_tag';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'status', 'updated_by', 'updated_at', 'created_by', 'created_at'], 'required'],
            [['id', 'status', 'updated_by', 'updated_at', 'created_by', 'created_at'], 'integer'],
            [['name'], 'string', 'max' => 32]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common', 'ID'),
            'name' => Yii::t('common', '标签名称'),
            'status' => Yii::t('common', 'Status'),
            'updated_by' => Yii::t('common', 'Updated By'),
            'updated_at' => Yii::t('common', 'Updated At'),
            'created_by' => Yii::t('common', 'Created By'),
            'created_at' => Yii::t('common', 'Created At'),
        ];
    }
}
