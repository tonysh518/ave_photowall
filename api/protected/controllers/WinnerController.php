<?php

class WinnerController extends Controller
{
	public function getRole() {
		return Yii::app()->session['user_role'];
	}

	public function actionIndex()
	{
		$this->render('index');
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/


	public function actionList()
	{
		$request = Yii::app()->getRequest();
		$page = $request->getParam("page");
		if (!$page) {
			$page = 1;
		}
		$pagenum = $request->getParam("pagenum");
		if (!$pagenum) {
			$pagenum = 12;
		}
		$winner = new Winner();
		$criteria=new CDbCriteria;
		$criteria->select='*';
		$criteria->limit = $pagenum;
		$criteria->offset = ($page - 1 ) * $pagenum;
		$criteria->order = 'month DESC';
		$winners = $winner->findAll($criteria);
		$this->responseJSON($winners, "success");
	}

	public function actionUploadImage() {
		if($this->getRole() != 2) {
			return;
		}
		$photoUpload = CUploadedFile::getInstanceByName("file");
		if(!$photoUpload) {
			return $this->responseError("no file");
		}
		$dir = ROOT_PATH."/upload/winner/";
		if (!is_dir($dir)) {
			mkdir($dir, 0777, TRUE);
		}
		$filename = uniqid().'_'.time().'.'.$photoUpload->extensionName;
		$to = $dir."/". $filename;
		$ret = $photoUpload->saveAs($to);
		if($ret) {
			$this->responseJSON("/upload/winner/".$filename, "success");
		}
	}


	public function actionPost() {
		$request = Yii::app()->getRequest();
		$month = $request->getPost('month');
		$name = $request->getPost('name');
		$avatar = $request->getPost('avatar');
		$tel = $request->getPost('tel');
		$photo = $request->getPost('photo');
		$prize = $request->getPost('prize');
		$prize_image = $request->getPost('prize_image');

		$winner = new Winner();
		$winner->month = $month;
		$winner->name = $name;
		$winner->avatar = $avatar;
		$winner->tel = $tel;
		$winner->photo = $photo;
		$winner->prize = $prize;
		$winner->prize_img = $prize_image;
		$winner->save();
		if($winner->validate()) {
			$winner->save();
			echo 1;
		}
		else {
			echo 0;
		}

	}

}