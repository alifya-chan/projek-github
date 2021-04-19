<?php
header('Content-Type: application/json');
    $con = mysqli_connect("localhost", "teknolog_loginap", "e#]bv&=eofWS", "teknolog_CAD");
    //kk tambah code test
    
    //tes ubah
    $nama = $_POST["nama"];
    $nohp = $_POST["nohp"];
    $tanggal_lahir = $_POST["tanggal_lahir"];
    $alamat = $_POST["alamat"];
    $jenis_kelamin = $_POST["jenis_kelamin"];
    $berat_badan = $_POST["berat_badan"];
    $tinggi_badan = $_POST["tinggi_badan"];
    $bmi = $_POST["bmi"];
    $tekanan_sistolik = $_POST["tekanan_sistolik"];
    $tekanan_diastolik = $_POST["tekanan_diastolik"];
    $total_kolesterol = $_POST["total_kolesterol"];
    $ldl = $_POST["ldl"];
    $hdl = $_POST["hdl"];
    $triglyceride = $_POST["triglyceride"];
    $riwayat_darah_tinggi = $_POST["riwayat_darah_tinggi"];
    $riwayat_diabetes = $_POST["riwayat_diabetes"];
    $riwayat_dispilidemia = $_POST["riwayat_dispilidemia"];
    $riwayat_rokok = $_POST["riwayat_rokok"];
    $riwayat_koroner = $_POST["riwayat_koroner"];
    $date = $_POST["date"];
    $flag=true;

    $checkStatement = mysqli_prepare($con, "SELECT nohp FROM personal_info WHERE nohp = ?");
    mysqli_stmt_bind_param($checkStatement,"s", $nohp);
    mysqli_stmt_execute($checkStatement);
    mysqli_stmt_store_result($checkStatement);

    $response = array();
    
    if (mysqli_stmt_fetch($checkStatement)){

        $response["success"] = false;

    } else {
        $response["success"] = true;  

        $statement = mysqli_prepare($con, "INSERT INTO personal_info(nama, nohp, tanggal_lahir, alamat, 
        jenis_kelamin, berat_badan, tinggi_badan, bmi, tekanan_sistolik, 
        tekanan_diastolik, total_kolesterol, ldl, hdl, 
        triglyceride, riwayat_darah_tinggi, riwayat_diabetes, riwayat_dispilidemia, 
        riwayat_koroner, riwayat_rokok, date) 
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
    
        mysqli_stmt_bind_param($statement, "sssssiisddddddssssss", $nama, $nohp, $tanggal_lahir, $alamat, $jenis_kelamin, $berat_badan, $tinggi_badan,
         $bmi, $tekanan_sistolik, $tekanan_diastolik, $total_kolesterol, $ldl, $hdl, $triglyceride, $riwayat_darah_tinggi, $riwayat_diabetes,
          $riwayat_dispilidemia, $riwayat_koroner, $riwayat_rokok, $date);
        mysqli_stmt_execute($statement);
    }
    
    echo json_encode($response);
   

?>