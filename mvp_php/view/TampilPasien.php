<?php


include("KontrakView.php");
include("presenter/ProsesPasien.php");

class TampilPasien implements KontrakView
{
	private $prosespasien; //presenter yang dapat berinteraksi langsung dengan view
	private $tpl;

	function __construct()
	{
		//konstruktor
		$this->prosespasien = new ProsesPasien();
	}
	
	function tampil()
	{
		if (!empty($_GET['id_hapus'])) {
			$id = $_GET['id_hapus'];
			$this->prosespasien->deleteDataPasien($id);
		} else if (isset($_POST['add'])) {
			$this->prosespasien->addDataPasien($_POST);
		} else if (isset($_POST['edit'])) {
			$this->prosespasien->editDataPasien($_POST);
		}
		$this->prosespasien->prosesDataPasien();
		$data = null;

		//semua terkait tampilan adalah tanggung jawab view
		for ($i = 0; $i < $this->prosespasien->getSize(); $i++) {
			$no = $i + 1;
			$data .= "<tr>
			<td>" . $no . "</td>
			<td>" . $this->prosespasien->getNik($i) . "</td>
			<td>" . $this->prosespasien->getNama($i) . "</td>
			<td>" . $this->prosespasien->getTempat($i) . "</td>
			<td>" . $this->prosespasien->getTl($i) . "</td>
			<td>" . $this->prosespasien->getGender($i) . "</td>
			<td>" . $this->prosespasien->getEmail($i) . "</td>
			<td>" . $this->prosespasien->getTelp($i) . "</td>
			<td>
                    <a href='index.php?id_edit=". $this->prosespasien->getId($i) ."' class='btn btn-warning' '>Edit</a>
                    <a href='index.php?id_hapus=". $this->prosespasien->getId($i) ."' class='btn btn-danger' '>Hapus</a>
                    </td></tr>";
		}
		// Membaca template skin.html
		$this->tpl = new Template("templates/skin.html");

		// Mengganti kode Data_Tabel dengan data yang sudah diproses
		$this->tpl->replace("DATA_TABEL", $data);

		// Menampilkan ke layar
		$this->tpl->write();
	}

	function showAddForm()
	{
		$data = '<form action="index.php" method="POST">
		<div class="form-row">
		  <div class="form-group col">
			<label for="tnik">nik pasien</label>
			<input type="text" class="form-control" name="tnik" required />
		  </div>
		</div>

		<div class="form-row">
		  <div class="form-group col">
			<label for="tnama">nama pasien</label>
			<input type="text" class="form-control" name="tnama" required />
		  </div>
		</div>

		<div class="form-row">
		  <div class="form-group col">
			<label for="ttempat">tempat lahir pasien</label>
			<input type="text" class="form-control" name="ttempat" required />
		  </div>
		</div>

		<div class="form-row">
		  <div class="form-group col">
			<label for="ttl">tanggal lahir pasien</label>
			<input type="text" class="form-control" name="ttl" required />
		  </div>
		</div>

		<div class="form-row">
		  <div class="form-group col">
			<label for="tgender">gender pasien</label>
			<input type="text" class="form-control" name="tgender" required />
		  </div>
		</div>

		<div class="form-row">
		  <div class="form-group col">
			<label for="temail">email pasien</label>
			<input type="text" class="form-control" name="temail" required />
		  </div>
		</div>

		<div class="form-row">
		  <div class="form-group col">
			<label for="ttelp">nomor telepon pasien</label>
			<input type="text" class="form-control" name="ttelp" required />
		  </div>
		</div>


		<button type="submit" name="add" class="btn btn-primary mt-3">Add</button>
	  	</form>';
		// Membaca template skin.html
		$this->tpl = new Template("templates/form.html");

		// Mengganti kode Data_Tabel dengan data yang sudah diproses
		$this->tpl->replace("FORM", $data);

		// Menampilkan ke layar
		$this->tpl->write();
	}

	function showEditForm($id)
	{

		$pasien = $this->prosespasien->getPasienById($id);
		// $id = $pasien['eid'];
		// $nik = $pasien['enik'];
		// $nama = $pasien["enama"];
		// $tempat = $pasien['etempat'];
		// $tl = $pasien['etl'];
		// $gender = $pasien['egender'];
		// $email = $pasien['eemail'];
		// $telp = $pasien['etelp'];
		$data = 
		'<form method="post" action="index.php">
   
		<br><br><div class="card">
		
		<div class="card-header bg-warning">
		<h1 class="text-white text-center">  Update role </h1>
		</div><br>

		<input type="hidden" name="eid" value=" ' . $id . ' " class="form-control"> <br>
		
		<label> NIK: </label>
		<input type="text" name="nik" value=" ' . $this->prosespasien->getNik(0) . ' " class="form-control"> <br>
	
		<label> NAME: </label>
		<input type="text" name="nama" value=" '. $this->prosespasien->getNama(0) . ' " class="form-control"> <br>

		<label> TEMPAT LAHIR: </label>
		<input type="text" name="tempat" value=" '. $this->prosespasien->getTempat(0) . ' " class="form-control"> <br>
		<label> TANGGAL LAHIR: </label>
		<input type="text" name="tl" value=" '. $this->prosespasien->getTl(0) . ' " class="form-control"> <br>
		<label> GENDER: </label>
		<input type="text" name="gender" value=" '. $this->prosespasien->getGender(0) . ' " class="form-control"> <br>
		<label> EMAIL: </label>
		<input type="text" name="email" value=" '. $this->prosespasien->getEmail(0) . ' " class="form-control"> <br>
		<label> TELEPON: </label>
		<input type="text" name="telp" value=" '. $this->prosespasien->getTelp(0) . ' " class="form-control"> <br>
	
	
		<button class="btn btn-success" type="submit" name="edit"> Submit </button><br>
		<a class="btn btn-info" type="submit" name="cancel" href="index.php"> Cancel </a><br>
	
		</div>
		</form>';
		$this->tpl = new Template("templates/form.html");

		// Mengganti kode Data_Tabel dengan data yang sudah diproses
		$this->tpl->replace("FORM", $data);

		// Menampilkan ke layar
		$this->tpl->write();
	}
}
