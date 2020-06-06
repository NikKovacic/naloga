<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{


    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {   
        return $this->render('index');
    }


    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    
    public function actionNaloga($project)
    {
        $modelNaloga = new \app\models\NalogaModel();

        $exists=$modelNaloga->doesProjectExists($project);

        if($exists==false){
            return $this->render('projectDontExists');
        }else{
            return $this->render('naloga', [
                'model' => $modelNaloga, 'project' => $project
            ]);
        }

    }

  

}
