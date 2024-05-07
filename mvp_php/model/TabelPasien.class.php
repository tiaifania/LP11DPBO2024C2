<?php

/******************************************
Asisten Pemrogaman 13
 ******************************************/

class TabelPasien extends DB
{
	function getPasien()
	{
		// Query mysql select data pasien
		$query = "SELECT * FROM pasien";
		// Mengeksekusi query
		return $this->execute($query);
	}

	function deletePasien($id)
	{
		$query = "delete FROM pasien WHERE id = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
	}

	function addPasien($data)
    {
		$nik = $data['tnik'];
        $nama = $data['tnama'];
		$tempat = $data['ttempat'];
		$tl = $data['ttl'];
		$gender = $data['tgender'];
		$email = $data['temail'];
		$telp = $data['ttelp'];

        $query = "insert into pasien values ('', '$nik','$nama', '$tempat', '$tl', '$gender', '$email', '$telp')";

        // Mengeksekusi query
        return $this->execute($query);
    }

	function getPasienById ($id) {
        $query = "SELECT * FROM pasien WHERE id = $id";
        $this->execute($query);
       return $this->getResult();
    }

	function editPasien($id, $data)
	{
		$nik = $data['nik'];
		$nama = $data["nama"];
		$tempat = $data['tempat'];
		$tl = $data['tl'];
		$gender = $data['gender'];
		$email = $data['email'];
		$telp = $data['telp'];
        $query = "UPDATE pasien SET nik='$nik', nama='$nama', tempat='$tempat', tl='$tl', gender='$gender', email='$email', telp='$telp' WHERE id='$id'";
        return $this->execute($query);
	}

}
