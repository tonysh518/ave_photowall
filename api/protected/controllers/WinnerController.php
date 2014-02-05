<?php

class WinnerController extends Controller
{
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

}