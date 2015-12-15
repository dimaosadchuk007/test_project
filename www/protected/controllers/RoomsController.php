<?php

class RoomsController extends Controller
{

	public $layout='//layouts/column2';

	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform actions
				'actions'=>array('index','view','create','update','delete'),
				'users'=>array('*'),
			),
		);
	}

	public function actionView($id)
	{
			$this->redirect('/rooms/');
	}

	public function actionCreate()
	{
		$model=new Rooms;

		if(isset($_POST['Rooms']))
		{
			$model->attributes=$_POST['Rooms'];
			if($model->save())
				$this->redirect('/rooms/');
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		if(isset($_POST['Rooms']))
		{
			$model->attributes=$_POST['Rooms'];
			if($model->save())
				$this->redirect('/rooms/');
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	public function actionDelete($id)
	{		
		$model=$this->loadModel($id);
		
		if ($model->room_reservedFor=='') 
		{
			Rooms::model()->deleteByPk($id);
			$this->redirect(array('/rooms/'));
		} else {
				$text_error="You cannot delete room #".$model->room_id
				." because it was reserved by ".$model->room_reservedFor;
				$this->render('error',array('error_message'=>$text_error,
				));
		       }
		
	}

	public function actionReserve($id)
	{		
		$model=$this->loadModel($id);

		if ($model->room_reservedFor=='') 
		{
				if(isset($_POST['Rooms']))
				  {
						$model->attributes=$_POST['Rooms'];
						if($model->save())
							$this->redirect(array('view','id'=>$model->room_id));
				  }
						$this->render('reservation_form',array(
						'model'=>$model,
						));
		}else {
				$model->room_reservedFor='';
				$model->save();
				$this->redirect('/rooms/');
			  }
	}

	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Rooms');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	public function loadModel($id)
	{
		$model=Rooms::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='rooms-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
