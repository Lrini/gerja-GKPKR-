<?php
	$kon = mysqli_connect("localhost","root","","gereja");
	function query($query){
		global $kon;
		$result = mysqli_query($kon,$query);
		$rows = [];
		while ( $row = mysqli_fetch_assoc($result)) {
			$rows[] = $row;
		}
		return $rows;
	}

	function foto(){
		$namaFile = $_FILES['foto']['name'];
		$ukuranFile = $_FILES['foto']['size'];
		$error = $_FILES['foto']['error'];
		$tipe = $_FILES['foto']['tmp_name'];

		//cek apa tidak ada gambar yang di upload 
		if (($error === 4)) {
			echo "<script>
					alert ('pilih gambar terlebih dahulu');
					</script>";
		return false;
		}
		//cek gambar atau bukan 
		$ekstensi = ['jpg','jpeg','png'];
		$eks = explode('.', $namaFile);
		$eks = strtolower(end($eks));
		if (!in_array($eks, $ekstensi)) {
			echo "<script>
					alert ('bukan gambar');
					</script>";
			return false;
			die;
		}
		//cek ukuran gambar 
		if ($ukuranFile >1000000) {
			echo "<script>
					alert ('ukuran terlalu besar');
					</script>";
		}
		//lolos cek generete nama baru 
	//	$namabaru = uniqid();
		//var_dump($namabaru);die;
	//	$namabaru .= '.';
	//	$namabaru .= $eks;
		move_uploaded_file($tipe, '../galeri/'.$namaFile);
		//var_dump($namabaru);die;
		return $namaFile;
	}


    function renungan($data){
        global $kon;
        $judul= $_POST['judul'];
        $ayat = $_POST['ayat'];
        $renungan = $_POST['renungan'];
        $sql = mysqli_query($kon,"insert into renungan (judul,ayat,renungan) values ('$judul','$ayat','$renungan')");
        return mysqli_affected_rows($kon);
    }

	function tambahgaleri($data){
		global $kon;
		$nama = $_POST['nama_foto'];
		$foto = foto();
		if(!$foto){
			return false;
		}
		$sql = mysqli_query($kon,"insert into galeri (nama_foto,foto) values ('$nama','$foto')");
		return mysqli_affected_rows($kon);
	}

	function minggu ($data){
		global $kon;
		$liturgis = $_POST['liturgis'];
		$pujian = $_POST['pujian'];
		$pemusik = $_POST['pemusik'];
		$operator = $_POST['operator'];
		$persembahan = $_POST['persembahan'];
		$khotbah = $_POST['khotbah'];

		$sql= mysqli_query($kon," insert into minggu (liturgis,pujian,pemusik,operator,persembahan,khotbah) values ('$liturgis','$pujian','$pemusik','$operator','$persembahan','$khotbah')");
		return mysqli_affected_rows($kon);
	}

	function pemuda($data){
		global $kon;
		$liturgis = $_POST['liturgis'];
		$pemusik = $_POST['pemusik'];
		$persembahan = $_POST['persembahan'];
		$operator = $_POST['operator'];
		$khotbah = $_POST['khotbah'];
		$sql = mysqli_query($kon,"insert into pemuda (liturgis,pemusik,persembahan,operator,khotbah) values ('$liturgis','$pemusik','$persembahan','$operator','$khotbah')");
		return mysqli_affected_rows($kon);
	}

	function wanita($data){
		global $kon;
		$liturgis = $_POST['liturgis'];
		$pemusik = $_POST['pemusik'];
		$operator = $_POST ['operator'];
		$khotbah = $_POST['khotbah'];
		$persembahan = $_POST['persembahan'];
		$sql = mysqli_query ($kon,"insert into wanita (liturgis,pemusik,operator,khotbah,persembahan) values ('$liturgis','$pemusik','$operator','$khotbah','$persembahan')");
		return mysqli_affected_rows($kon);
	}

	function doa($data){
		global $kon;
		$liturgis = $_POST['liturgis'];
		$pemusik = $_POST['pemusik'];
		$operator = $_POST ['operator'];
		$khotbah = $_POST['khotbah'];
		$persembahan = $_POST['persembahan'];
		$sql = mysqli_query ($kon,"insert into doa (liturgis,pemusik,operator,khotbah,persembahan) values ('$liturgis','$pemusik','$operator','$khotbah','$persembahan')");
		return mysqli_affected_rows($kon);
	}


	function editrenungan($data){
		global $kon;
		$id = $_POST['id'];
		$judul = $_POST['judul'];
		$ayat = $_POST['ayat'];
		$renungan = $_POST['renungan'];
		$sql = mysqli_query($kon,"update renungan set judul ='$judul',ayat='$ayat',renungan='$renungan' where id='$id'");
		return mysqli_affected_rows($kon);
	}

	function editminggu($data){
		global $kon;
		$id = $_POST['id'];
		$liturgis = $_POST['liturgis'];
		$pujian = $_POST['pujian'];
		$pemusik = $_POST['pemusik'];
		$operator = $_POST['operator'];
		$persembahan = $_POST['persembahan'];
		$khotbah = $_POST['khotbah'];
		$sql = mysqli_query($kon,"update minggu set liturgis='$liturgis',pujian='$pujian',pemusik='$pemusik',operator='$operator',persembahan='$persembahan',khotbah='$khotbah' where id = '$id'");
		return mysqli_affected_rows($kon);
	}

	function editpemuda($data){
		global $kon;
		$id = $_POST['id'];
		$liturgis = $_POST['liturgis'];
		$pemusik = $_POST['pemusik'];
		$operator = $_POST['operator'];
		$persembahan = $_POST['persembahan'];
		$khotbah = $_POST['khotbah'];

		$sql= mysqli_query($kon,"update pemuda set liturgis='$liturgis',pemusik='$pemusik',operator='$operator',persembahan='$persembahan',khotbah='$khotbah' where id = '$id'");
		return mysqli_affected_rows($kon);
	}

	function editwanita($data){
		global $kon;
		$id = $_POST['id'];
		$liturgis = $_POST['liturgis'];
		$pemusik = $_POST['pemusik'];
		$operator = $_POST['operator'];
		$persembahan = $_POST['persembahan'];
		$khotbah = $_POST['khotbah'];

		$sql= mysqli_query($kon,"update wanita set liturgis='$liturgis',pemusik='$pemusik',operator='$operator',persembahan='$persembahan',khotbah='$khotbah' where id = '$id'");
		return mysqli_affected_rows($kon);
	}

	function editdoa($data){
		global $kon;
		$id = $_POST['id'];
		$liturgis = $_POST['liturgis'];
		$pemusik = $_POST['pemusik'];
		$operator = $_POST['operator'];
		$persembahan = $_POST['persembahan'];
		$khotbah = $_POST['khotbah'];

		$sql= mysqli_query($kon,"update doa set liturgis='$liturgis',pemusik='$pemusik',operator='$operator',persembahan='$persembahan',khotbah='$khotbah' where id = '$id'");
		return mysqli_affected_rows($kon);
	}

	function hapusrenungan($id){
		global $kon;
		$sql = mysqli_query($kon,"delete from renungan where id = '$id'");
		return mysqli_affected_rows($kon);
	}

	function hapusgaleri($id){
		global $kon;
		$sql = mysqli_query($kon,"delete from galeri where id = '$id'");
		return mysqli_affected_rows($kon);
	}

	function hapusminggu($id){
		global $kon;
		$sql = mysqli_query($kon,"delete from minggu where id = '$id'");
		return mysqli_affected_rows($kon);
	}
	
	function hapuspemuda($id){
		global $kon;
		$sql =mysqli_query($kon,"delete from pemuda where id = '$id'");
		return mysqli_affected_rows($kon);
	}

	function hapuswanita($id){
		global $kon;
		$sql =mysqli_query($kon,"delete from wanita where id = '$id'");
		return mysqli_affected_rows($kon);
	}

	function hapusdoa($id){
		global $kon;
		$sql =mysqli_query($kon,"delete from doa where id = '$id'");
		return mysqli_affected_rows($kon);
	}
?>