<?php 
	if ($peticionAjax) {
		require_once '../model/homeModel.php';
	}else{
		require_once './model/homeModel.php';
	} 
	class homeController extends homeModel
	{
		public function listPayments($quantity){
			$lists = homeModel::listPayment();
			$this->htmlTablePayments($lists);
        }

		public function htmlTablePayments(array $list){
			$div = '';
			foreach ($list as $key => $payment) {
				$key = $key+1;
				$div .='<tr>
					<th scope="row">'.$key.'</th>
					<td>'.$payment->user_id.'</td>
					<td>'.$payment->amount.'</td>
					<td>'.$payment->bank.'</td>
					<td>'.$payment->mediun.'</td>
					<td>
						<button class="btn btn-warning">
							<a href="'.SERVERURL.'user/'.$payment->user_id.'" > Edit </a>
						</button>
					</td>
				</tr>';
			}
			echo $div;
		}

		public function listPayUser($user_id){
			$lists = homeModel::listPaymentUser($user_id);
			$div = '<h1>USUARIO :</h1>';
			$div .= '<div class="list-group p-4">';
			foreach ($lists as $key => $payments) {
				$key = $key+1;
				$div .='<li type="button" class="list-group-item 
					list-group-item-action">
					S/. '.$payments->amount.' 
					<button class="btn btn-warning">
						<a href="'.SERVERURL.'payment/'.$payments->id.'/edit/'.$user_id.'">Edit</a>
					</button>
				</li>';
			}
			$div .='</div>';

			echo $div;
        }

		public function updatePayment(){
			$datos = [
				'amount_pay' => $_POST['amount_pay'],
				'description_pay' => $_POST['description_pay'],
				'id_pay' => $_POST['id_pay'],
			];
			homeModel::updatePaymentM($datos); 
		}

		public function infoPayment($id_pay){
			return homeModel::infoPay($id_pay);
		}

	}
