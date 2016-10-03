<?php

namespace app\controllers;

use app\models\Post;
use app\models\Articles;
use app\models\User;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Signup;



/**
 * SiteController implements the CRUD actions for user model.
 */
class SiteController extends Controller
{

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     * Lists all user models.
     * @return mixed
     */
    public function actionIndex()
    {

        $posts = Post::find()
            ->select(['user.*','post.*'])
            ->leftJoin('user', '`post`.`author_id` = `user`.`id`')
            ->all();
        //  echo $post->name; //вощможно из-за ExtraPropsBehaviour extends Behavior // Позволяет модели иметь совершенно произвольные свойства
        /*  foreach ($post as $item) {
          echo $item->user->name; //таким запросом мы говорим загрузить дополнительно связь
          }*/
   /*     $ch = curl_init('http://yii2go.ru/');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLOPT_COOKIE, 'curl_normal_cookie=1 ; curl_session_cookie=1');
        $html = curl_exec($ch);
        curl_close($ch);
        echo $html;*/

        //Открыли поток с файлом
/*        $fileStream = fopen(__DIR__.'/csb.txt', 'r'); //feof - определяет дошел ли указатель до конца файла
        $users = [];
        while(!feof($fileStream)){
            $userLine = fgets($fileStream); //fgets - берет одну строку
            $user = [];
            $user['first_name'] = $userLine[0];
            $user['last_name'] = $userLine[1];
            $user['second_name'] = $userLine[2];
            $user['birth_name'] = $userLine[3];
            $users[] = $user;
        }

        foreach($users as $user) {
            echo $user['first_name'].' '.$user['last_name'].' '.$user['second_name'].' '. $user['birth_name'].'<br>';
        }
        fclose($fileStream);//Закрыли поток*/

        $news = Articles::find(4)->one();
        $news->name = 'Первая статья';
        $news->text  = "Первая тестовая статья";
        $news->save(false);


        return $this->render('index', ['posts' => $posts]);

    }

    public function actionService()
    {
        $locator = \Yii::$app->locator;
        $cache = $locator->cache;
        $cache->set('test',1);
        echo $cache->get('test');
    }


    /**
     * Displays signup page.
     *
     * @return string
     */
    public function actionSignup()
    {
        $model = new Signup();

        if(isset($_POST['Signup']))
        {
            $model->attributes = Yii::$app->request->post('Signup');

            if($model->validate() && $model->signup())
            {
                return $this->goHome();
            }
        }

        return $this->render('signup', ['model'=>$model]);
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {

        if (!Yii::$app->user->isGuest) {

            return $this->goHome();
        }

        $model = new LoginForm();

        if(Yii::$app->request->post('LoginForm'))
        {
            $model->attributes = Yii::$app->request->post('LoginForm');

            if($model->validate())
            {
               Yii::$app->user->login($model->getUser());
               return $this->goHome();
            }
        }

          return $this->render('login', ['model' => $model,]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        if(!Yii::$app->user->isGuest)
        {
            Yii::$app->user->logout();
        }

        return $this->redirect(['login']);
    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }

        return $this->render('contact', [
            'model' => $model,
        ]);
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


}
