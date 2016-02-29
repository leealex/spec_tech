<?php

use app\modules\admin\models\User;
use yii\db\Migration;

class m160229_094418_rbac_roles extends Migration
{
    public function up()
    {
        $auth = Yii::$app->authManager;

        $auth->removeAll();

        $editSettings = $auth->createPermission('editSettings');
        $editSettings->description = 'Редактирование настроек';
        $auth->add($editSettings);

        $editUsers = $auth->createPermission('editUsers');
        $editUsers->description = 'Редактирование пользователей';
        $auth->add($editUsers);

        $user = $auth->createRole(User::ROLE_USER);
        $user->description = 'Пользователь';
        $auth->add($user);

        $manager = $auth->createRole(User::ROLE_MANAGER);
        $manager->description = 'Менеджер';
        $auth->add($manager);
//        $auth->addChild($manager, $user);

        $admin = $auth->createRole(User::ROLE_ADMINISTRATOR);
        $admin->description = 'Администратор';
        $auth->add($admin);
//        $auth->addChild($admin, $manager);
        $auth->addChild($admin, $editSettings);
        $auth->addChild($admin, $editUsers);

        $auth->assign($admin, 1);
    }

    public function down()
    {
        $auth = Yii::$app->authManager;
        $auth->remove($auth->getRole(User::ROLE_ADMINISTRATOR));
        $auth->remove($auth->getRole(User::ROLE_MANAGER));
        $auth->remove($auth->getRole(User::ROLE_USER));
    }
}
