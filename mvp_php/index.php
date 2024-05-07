<?php

/******************************************
Asisten Pemrogaman 13
 ******************************************/

include("model/Template.class.php");
include("model/DB.class.php");
include("model/Pasien.class.php");
include("model/TabelPasien.class.php");
include("view/TampilPasien.php");

$tp = new TampilPasien();
if (isset ($_GET['add'])) {
    $data = $tp->showAddForm();
}else if(isset($_GET['id_edit'])){
    $id = $_GET['id_edit'];
    $data = $tp->showEditForm($id);
} else {
    $data = $tp->tampil();
    
}
