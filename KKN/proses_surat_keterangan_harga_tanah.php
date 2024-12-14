<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengumpulkan data form
    $nomor_surat = $_POST['nomor_surat'];
    $nama_pemilik_tanah = $_POST['nama_pemilik_tanah'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = strftime("%e %B %Y", strtotime($_POST['tanggal_lahir']));
    $agama = $_POST['agama'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $pekerjaan = $_POST['pekerjaan'];
    $alamat = $_POST['alamat'];
    $tahun_pelunasan_pbb = $_POST['tahun_pelunasan_pbb'];
    $nomor_wajib_pajak = $_POST['nomor_wajib_pajak'];
    $luas_tanah = $_POST['luas_tanah'];
    $luas_bangunan = $_POST['luas_bangunan'];
    $harga_tanah = $_POST['harga_tanah'];
    $harga_bangunan = $_POST['harga_bangunan'];
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
                text-align: right;
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
            SURAT KETERANGAN HARGA TANAH
        </div>
        <div class='nomor-surat'>
            Nomor: $nomor_surat
        </div>
        <div class='isi-surat'>
            Yang bertanda tangan di bawah ini, Kepala Kampung Gayau Sakti Kecamatan Seputih Agung Kabupaten Lampung Tengah, menerangkan dengan sebenarnya bahwa :
            <table>
                <tr><td>Nama</td><td>: $nama_pemilik_tanah</td></tr>
                <tr><td>Tempat, Tanggal Lahir</td><td>: $tempat_lahir, $tanggal_lahir</td></tr>
                <tr><td>Jenis Kelamin</td><td>: $jenis_kelamin</td></tr>
                <tr><td>Agama</td><td>: $agama</td></tr>
                <tr><td>Pekerjaan</td><td>: $pekerjaan</td></tr>
                <tr><td>Alamat</td><td>: $alamat</td></tr>
            </table>
            Nama tersebut diatas benar penduduk Kmapung Gayau Sakti Kecamatan Seputih Agung Kabupaten Lmapung Tengah,
            menurut data pengamatan kami nama tersebut beneran telah melunasi PBB (Pajak Bumi dan Bangunan) tahun $tahun_pelunasan_pbb,
            Nama tersebut memiliki sebidang lahan perumahan dengan Nomor Wajib Pajak $nomor_wajib_pajak seluas $luas_tanah dan luas bangunan $luas_bangunan.
            <div><br></div>
            Harga Tafsiran Tanah Ditempat Tersebut Menurut Yang Bersangkutan Berkisar Antara Rp.$harga_tanah per M Dan Harga Bangunan Sebesar Rp.$harga_bangunan per M.
            <div><br></div>
            Demikian surat keterangan ini dibuat dengan sebenarnya dan untuk dipergunakan sebagaimana mestinya.
        </div>
        <div class='footer-surat'>
        <br>
        <table>
            <tr><td>Dikeluarkan di</td><td>: $dikeluarkan_surat</td></tr>
            <tr><td>Pada Tanggal</td><td>: $tanggal_pembuatan_surat</td></tr>
            <tr><td><br/>Kepala Kampung Gayau Sakti</td></tr>
            <tr><td><div class='ttd'><br><br>$nama_kepala_kampung</div></td></tr>
        </table>
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
