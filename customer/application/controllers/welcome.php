<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function show_login()
	{
		$this->load->view('hal_login_cust');
	}

	public function index()
	{
		$where = $_GET['cari'];
		if ($where == '') {
			$data_film = $this->mymodel->GetFilm();
			$this->load->view('hal_awal_cust',array('data' => $data_film));
		}else{
			$where = "s.id_film = f.id_film and f.judul_film like '%".$where."%'";
			$data_show = $this->mymodel->GetData("show_film s, film f",$where);
			$this->load->view('hal_awal_cust',array('data' => $data_show));
		}
	}

	public function show_home()
	{
		$this->load->view('hal_home_cust');
	}

	public function do_login()
	{
		$email = $_POST['email'];
		$pass = $_POST['pass'];

		$where = array(
			'email_member' => $email,
			'password_member' => $pass
		);

		if ($login = $this->mymodel->GetMember($where)) {
			$_SESSION['id_member'] = $login['id_member'];
			$_SESSION['email_member'] = $login['email_member'];
			$_SESSION['nama_member'] = $login['nama_member'];
			$_SESSION['status'] = "login";
			$this->load->view('hal_home_cust');
		}else{
			echo "Login Gagal";
		}
	}

	public function show_profil()
	{
			$where = "b.id_film = f.id_film and b.id_member=".$_SESSION['id_member'];
			$data_show = $this->mymodel->GetData("book b, film f",$where);
			$this->load->view('hal_profil_cust',array('data' => $data_show));
	}

	public function do_refund($where="")
	{
		$id_book = $where;
		$where = "id_booking='".$where."'";
		$data = $this->mymodel->GetData("book",$where);
		$member = $this->mymodel->GetData('member','id_member = 2');
		$show = $this->mymodel->GetData("show_film","id_show=".$data[0]['id_show']);

		if ($show[0]['hari_show'] == 'Friday') {
		$tiket = 35000;
	}else if ($show[0]['hari_show'] == 'Saturday' || $show[0]['hari_show'] == 'Sunday') {
		$tiket = 40000;
	}else {
		$tiket = 30000;
	}

		if ($this->mymodel->UpdateData("member",array('saldo_member' => $member[0]['saldo_member']+($tiket-$tiket*10/100)),array('id_member' => $_SESSION['id_member'])) && $this->mymodel->UpdateData("show_film",array('slot_show' => $show[0]['slot_show']+1),array('id_show' => $show[0]['id_show'])) && $this->mymodel->DeleteData("book",array('id_booking' => $id_book))) {
			$where = "b.id_film = f.id_film and b.id_member=".$_SESSION['id_member'];
			$data_show = $this->mymodel->GetData("book b, film f",$where);
			$this->load->view('hal_profil_cust',array('data' => $data_show));
		}else{
			echo "REFUND GAGAL";
		}

		

	}

	public function show_film()
	{
		$where = $_GET['cari'];
		if ($where == '') {
			$data_film = $this->mymodel->GetFilm();
			$this->load->view('hal_theater_cust',array('data' => $data_film));
		}else{
			$where = "s.id_film = f.id_film and f.judul_film like '%".$where."%'";
			$data_show = $this->mymodel->GetData("show_film s, film f",$where);
			$this->load->view('hal_theater_cust',array('data' => $data_show));
		}
		
	}

	public function show_book($id)
	{
		$show = $this->mymodel->GetFilmBook($id);
		$this->load->view('hal_book_cust',array('data' => $show));
	}

	public function do_book()
	{
		$id_film = $_POST['id_film'];
		$id_show = $_POST['id_show'];
		$seat_data = $_POST['seat']; 
		$count_seat = count($_POST['seat']);
		$total_pay=0;

		$show = $this->mymodel->GetFilmBook($id_show);

		$studio = $show['studio_show'];
		$tanggal = $show['tanggal_show'];
		$waktu = $show['waktu_show'];
		

		if ($show['hari_show'] == 'Friday') {
			$tiket = 35000;
		}else if ($show['hari_show'] == 'Saturday' || $show['hari_show'] == 'Sunday') {
			$tiket = 40000;
		}else {
			$tiket = 30000;
		}

	
		for ($i=0; $i < $count_seat; $i++) { 
			
			$data = array(
				'id_booking' => '',
				'id_member' => $_SESSION['id_member'],
				'id_film' => $id_film,
				'id_show' => $id_show,
				'studio_show' => $studio,
				'tanggal_show' => $tanggal,
				'waktu_show' => $waktu,
				'kursi_booking' => $seat_data[$i],
				'harga_booking' => $tiket

			);

			$slot = $this->mymodel->GetData('show_film','id_show = '.$id_show);
			
			$res1 = $this->mymodel->InsertData('book',$data);
			$total_pay=$total_pay+$tiket;
			$res2 = $this->mymodel->UpdateData('show_film',array('slot_show' => $slot[0]['slot_show']-1),array('id_show' => $id_show));
			
			
			if ($res1>=1 && $res2>=1) {
				
			}else{
				echo "booking gagal";
			}
		}
		$member = $this->mymodel->GetData('member','id_member = '.$_SESSION['id_member']);
		//echo $total_pay;
		if ($this->mymodel->UpdateData('member',array('saldo_member' => $member[0]['saldo_member']-$total_pay),array('id_member' => $_SESSION['id_member']))) {
			$data_film = $this->mymodel->GetFilm();
			$this->load->view('hal_theater_cust',array('data' => $data_film));
		}else{
			echo "booking gagal";
		}
	}

	public function do_logout()
	{
		$this->session->sess_destroy();
    	redirect('welcome/?cari=');
	}
}
