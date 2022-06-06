<?php
namespace app\commands;

use Yii;
use yii\console\Controller;
use \app\rbac\UserGroupRule;
use app\model\User;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = \Yii::$app->authManager;

        // Удалить стпрые записи
    //    $auth->removeAll();

        //Создадим роли
        $admin = $auth->createRole('admin');


          //Запись ролей в бд
          $auth->add($admin);

          // Добавляем и описываем роли
          $AdminPanel = $auth->createPermission('AdminPanel');
          $AdminPanel->description = 'Панель Администратора ';





          //  Записываем роли в бд
            $auth->add($AdminPanel);



          // Разрешение админа
          $auth->addChild($admin, $AdminPanel);







          //  Прописываем админа и менджера
          $auth->assign($admin, 1);









    }
}
