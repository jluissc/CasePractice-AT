<?php 

	require_once 'mainModel.php'; 
	class homeModel extends mainModel
	{
		protected static function listPayment() { 
			$sql = mainModel::conexion()
				->prepare("SELECT * FROM payment p ORDER BY p.id DESC");
			$sql -> execute();
			$resutl = $sql->fetchAll(PDO::FETCH_OBJ);				
			$sql = null;
			return $resutl;
		}
		protected static function infoPay($id_pay) { 
			$sql = mainModel::conexion()
				->prepare("SELECT * FROM payment p WHERE id = $id_pay");
			$sql -> execute();
			$resutl = $sql->fetch(PDO::FETCH_OBJ);				
			$sql = null;
			return $resutl;
		}
		
		protected static function listPaymentUser($user_id) {
			$sql = mainModel::conexion()
				->prepare("SELECT * FROM payment p WHERE p.user_id = $user_id ORDER BY p.id DESC ");
			$sql -> execute();
			$resutl = $sql->fetchAll(PDO::FETCH_OBJ);				
			$sql = null;
			return $resutl;
		}
		protected static function updatePaymentM($datos) {
			$sql = mainModel::conexion()->prepare('UPDATE payment SET amount = '.$datos['amount_pay'].'
                WHERE id= '.$datos['id_pay'].'');
			$sql -> execute();
			if($sql->rowCount()== 1){
				$sqlt = mainModel::conexion()->prepare('INSERT INTO change_payment (`description`, `pay_id`) 
					VALUES(:description, :pay_id)');				
				$sqlt->bindParam(":description",$datos['description_pay']);	
				$sqlt->bindParam(":pay_id",$datos['id_pay']);	
			
				$sqlt -> execute();	
				if($sqlt->rowCount()== 1){
					$sqlt = null;
					exit(json_encode(1));				
				}else{
					$sqlt = null;
					exit(json_encode(0));
				}								
			}else{
				$sql = null;
				exit(json_encode([0,'Error BDf']));
			}	
		}
		
	}