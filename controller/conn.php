<?php

// URL API BMKG untuk data gempa terkini
$apiUrl = "https://data.bmkg.go.id/DataMKG/TEWS/autogempa.xml";

// Inisialisasi cURL
$ch = curl_init();

// Set opsi cURL
curl_setopt($ch, CURLOPT_URL, $apiUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Mengembalikan data sebagai string

// Eksekusi cURL dan simpan hasilnya
$response = curl_exec($ch);

// Tutup koneksi cURL
curl_close($ch);

// Konfigurasi database
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "gempadb";

// Koneksi ke database
$conn = mysqli_connect($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Periksa apakah data berhasil diambil
if ($response) {
    // Parsing data XML menjadi array
    $data = simplexml_load_string($response);

    // Contoh mengambil informasi spesifik dari XML
    $tanggal = $data->gempa->Tanggal;
    $Jam = $data->gempa->Jam;
    $magnitude = $data->gempa->Magnitude;
    $Lintang = $data->gempa->Lintang;
    $Bujur = $data->gempa->Bujur;
    $kedalaman = $data->gempa->Kedalaman;
    $wilayah = $data->gempa->Wilayah;
    $Potensi = $data->gempa->Potensi;
    $Dirasakan = $data->gempa->Dirasakan;
    $Shakemap = $data->gempa->Shakemap;

    // Cek apakah data gempa sudah ada di database
    $sql_check = "SELECT * FROM gempa WHERE tanggal = '$tanggal' AND jam = '$Jam'";
    $result = $conn->query($sql_check);

    if ($result->num_rows > 0) {
        // Data sudah ada, cek apakah ada perubahan
        $row = $result->fetch_assoc();
        if (
            $row['lintang'] != $Lintang ||
            $row['bujur'] != $Bujur ||
            $row['magnitude'] != $magnitude ||
            $row['kedalaman'] != $kedalaman ||
            $row['wilayah'] != $wilayah ||
            $row['potensi'] != $Potensi ||
            $row['dirasakan'] != $Dirasakan ||
            $row['shakemap'] != $Shakemap
        ) {
            // Perbarui data jika ada perubahan
            $sql_update = "UPDATE gempa SET lintang = '$Lintang', bujur = '$Bujur', magnitude = '$magnitude', kedalaman = '$kedalaman', wilayah = '$wilayah', potensi = '$Potensi', dirasakan = '$Dirasakan', shakemap = '$Shakemap' WHERE tanggal = '$tanggal' AND jam = '$Jam'";
            if ($conn->query($sql_update) === TRUE) {
                echo "Data gempa berhasil diperbarui.\n";
            } else {
                echo "Error: " . $conn->error . "\n";
            }
        } else {
            // echo "Data gempa tidak berubah.\n";
        }
    } else {
        // Data belum ada, tambahkan ke database
        $sql_insert = "INSERT INTO gempa (tanggal, jam, magnitude, lintang, bujur, kedalaman, wilayah, potensi, dirasakan, shakemap)
    VALUES ('$tanggal', '$Jam', '$magnitude', '$Lintang', '$Bujur', '$kedalaman', '$wilayah', '$Potensi', '$Dirasakan', '$Shakemap')";
        if ($conn->query($sql_insert) === TRUE) {
            echo "Data gempa baru berhasil disimpan.\nJam: $Jam, Tanggal: $tanggal \nWilayah: $wilayah \nKoordinat: $Lintang - $Bujur \nMagnitude: $magnitude \nKedalaman: $kedalaman \nPotensi: $Potensi \nDirasakan: $Dirasakan \n";
        } else {
            echo "Error: " . $conn->error . "\n";
        }
    }
} else {
    echo "Gagal mengambil data dari BMKG.";
}
