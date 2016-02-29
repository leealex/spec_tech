<?php

use app\modules\admin\models\User;
use yii\db\Migration;

class m160229_175003_rbac_permissions extends Migration
{
    public function up()
    {
        $auth = Yii::$app->authManager;
        $admin = $auth->getRole(User::ROLE_ADMINISTRATOR);

        $permissions = [
            'editSettings' => 'Редактирование настроек',
            'editUsers' => 'Редактирование пользователей',
            'editWidgetMenu' => 'Редактирование разделов сайта',
            'editWidgetText' => 'Редактирование текстовых блоков',
        ];

        foreach ($permissions as $key => $value) {
            $permission = $auth->createPermission($key);
            $permission->description = $value;
            $auth->add($permission);
            $auth->addChild($admin, $permission);
        }
    }

    public function down()
    {
        $auth = Yii::$app->authManager;
        $admin = $auth->getRole(User::ROLE_ADMINISTRATOR);
        $auth->removeChildren($admin);
        $auth->removeAllPermissions();
    }
}
