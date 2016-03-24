<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "liuyan".
 *
 * @property integer $liu_id
 * @property string $liu_name
 * @property string $liu_content
 * @property string $liu_time
 */
class Liuyan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'liuyan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['liu_name', 'liu_content', 'liu_time'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'liu_id' => 'Liu ID',
            'liu_name' => 'Liu Name',
            'liu_content' => 'Liu Content',
            'liu_time' => 'Liu Time',
        ];
    }
}
