<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengumpulkan data form
    $nomor_surat = $_POST['nomor_surat'];
    $nama = $_POST['nama'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = strftime("%e %B %Y", strtotime($_POST['tanggal_lahir']));
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];
    $hari_meninggal = $_POST['hari_meninggal'];
    $tanggal_meninggal = strftime("%e %B %Y", strtotime($_POST['tanggal_meninggal']));
    $penyebab_meninggal = $_POST['penyebab_meninggal'];
    $tempat_meninggal = $_POST['tempat_meninggal'];
    $dikeluarkan_surat = $_POST['dikeluarkan_surat'];
    $tanggal_pembuatan_surat = strftime("%e %B %Y", strtotime($_POST['tanggal_pembuatan_surat']));
    $nama_kepala_kampung = $_POST['nama_kepala_kampung'];

    // Membuat konten HTML untuk Surat Keterangan Usaha
    $html = "
    <html>
    <head>
        <title>Surat Keterangan Usaha</title>
        <style>
            body {
                font-family: 'Times New Roman', Times, serif;
                margin: 0;
                padding: 0;
            }
            .kop-surat {
                display: flex;
                align-items: center;
                justify-content: space-between; /* Menjaga jarak antara logo dan teks */
                margin-bottom: 20px;
                padding: 20px;
                border-bottom: 2px solid #000;
            }
            .kop-surat img {
                width: 70px;
                height: auto;
                margin-right: 20px;
            }
            .kop-surat div {
                text-align: center;
                font-size: 14px;
                flex: 1;
            }
            .kop-surat h1, .kop-surat h2, .kop-surat h3 {
                margin: 0;
                padding: 0;
            }
            .kop-surat .alamat {
                font-size: 12px;
                margin-top: 5px;
            }
            .judul-surat {
                text-align: center;
                font-size: 18px;
                font-weight: bold;
                text-decoration: underline;
                margin-top: 20px;
            }
            .nomor-surat {
                text-align: center;
                font-weight: bold;
                margin-top: 10px;
            }
            .isi-surat {
                margin-left: 50px;
                margin-right: 50px;
                margin-top: 20px;
                line-height: 1.5;
            }
            .isi-surat table {
                width: 100%;
                margin-bottom: 20px;
            }
            .isi-surat table td {
                padding: 5px;
                text-align: left;
            }
            .footer-surat {
                margin-top: 40px;
                text-align: center;
                font-size: 14px;
            }
            .footer-surat table {
    float: right;
    text-align: left;
    margin-right: 0;
}
            .footer-surat .ttd {
                margin-top: 50px;
                font-weight: bold;
            }
            .action-container {
                text-align: center;
                margin-top: 20px;
            }
            .cetak-button {
                background-color: #4CAF50;
                color: white;
                padding: 12px 24px;
                font-size: 16px;
                font-weight: bold;
                border: none;
                border-radius: 8px;
                cursor: pointer;
                box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
                transition: background-color 0.3s, box-shadow 0.3s;
            }
            .cetak-button:hover {
                background-color: #45a049;
                box-shadow: 0px 6px 8px rgba(0, 0, 0, 0.2);
            }
            .cetak-button:active {
                background-color: #3e8e41;
                box-shadow: 0px 3px 4px rgba(0, 0, 0, 0.2);
                transform: translateY(2px);
            }
            /* Tambahan CSS untuk menghilangkan tombol saat dicetak */
            @media print {
    @page {
        size: 210mm 330mm;
        margin: 10mm; /* Optional: Adjust the margins as needed */
    }

    .action-container {
        display: none;
    }
        </style>
    </head>
    <body>
        <div class='kop-surat'>
            <img src='images/lampungtengah.png' alt='Logo Pemerintah Kabupaten Lampung Tengah'/>
            <div>
                <h2>PEMERINTAH KABUPATEN LAMPUNG TENGAH</h2>
                <h2>KECAMATAN SEPUTIH AGUNG</h2>
                <h3>KAMPUNG GAYAU SAKTI</h3>
                <div class='alamat'>Sekretariat: Jl. Raya Gayau Sakti Depan Pasar Gayau Sakti</div>
            </div>
        </div>
        <div class='judul-surat'>
            SURAT KETERANGAN KEMATIAN
        </div>
        <div class='nomor-surat'>
            Nomor : $nomor_surat
        </div>
        <div class='isi-surat'>
            Yang bertanda tangan di bawah ini, Kepala Kampung Gayau Sakti Kecamatan Seputih Agung Kabupaten Lampung Tengah, menerangkan bahwa :
            <table>
                <tr><td>Nama</td><td>: $nama</td></tr>
                <tr><td>Tempat, Tanggal Lahir</td><td>: $tempat_lahir, $tanggal_lahir</td></tr>
                <tr><td>Jenis Kelamin</td><td>: $jenis_kelamin</td></tr>
                <tr><td>Agama</td><td>: $alamat</td></tr>
                <div class='judul-surat'>
                    Tlah Meninggal Dunia Pada :
                </div>
                <tr><td>Hari</td><td>: $hari_meninggal</td></tr>
                <tr><td>Tanggal</td><td>: $tanggal_meninggal</td></tr>
                <tr><td>Disebabkan Karena</td><td>: $penyebab_meninggal</td></tr>
                <tr><td>Meninggal di</td><td>: $tempat_meninggal</td></tr>
            </table>
            <br>
            Demikian Surat Keterangan kematian ini dibuat dengan sebenarnya dan untuk dipergunakan sebagaimana mestinya.
        </div>
        <div class='footer-surat'>
        <br>
        <table>
           <tr><td>Dikeluarkan di</td><td>: $dikeluarkan_surat</td></tr>
           <tr><td>Pada Tanggal</td><td>: $tanggal_pembuatan_surat</td></tr>
        </table>
        <br><br><br>
            <br/>Kepala Kampung Gayau Sakti
            <div class='ttd'><br><br>$nama_kepala_kampung</div>
        </div>
        <br><br>
        <div class='action-container'>
            <button class='cetak-button' onclick='window.print()'>Cetak Surat</button>
        </div>
        <br><br>
    </body>
    </html>";

    // Menampilkan HTML yang sudah dibuat
    echo $html;
}
?>
