<?

$this->title = 'Admin panel';
$this->params['breadcrumbs'][] = array(
    'label'=> 'Admin panel',
    'url'=>Yii::$app->urlManager->createUrl(['admin/'])
);



?>


<div class="admin-default-index">
 <h3>Административный модуль</h3>

    <div class="body-content">

        <div class="row">

            <div class="col-lg-4">
                <h2>Организации</h2>

                <p>Страница для работы с таблицей [ basic ]</p>

                <p><a class="btn btn-default" href="<?=Yii::$app->urlManager->createUrl(['admin/basic'])?>">Перейти</a></p>
            </div>

        </div>

        <div class="row">
          <div class="col-lg-12">
                <h3>-----------------------------------------------------------------------------------------------------------------------------------------</h3>
           </div>
         </div>

         <div class="row">

             <div class="col-lg-4">
                 <h2>ИП</h2>

                 <p>Страница для работы с таблицей [ basicIp ]</p>

                 <p><a class="btn btn-default" href="<?=Yii::$app->urlManager->createUrl(['admin/basic'])?>">Перейти</a></p>
             </div>

         </div>








</div>

</div>
