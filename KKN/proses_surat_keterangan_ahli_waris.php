<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengumpulkan data form
    $nomor_surat = $_POST['nomor_surat'];
    $nama_pewaris = $_POST['nama_pewaris'];
    $tempat_tinggal_terakhir_pewaris = $_POST['tempat_tinggal_terakhir_pewaris'];
    $tanggal_meninggal = strftime("%e %B %Y", strtotime($_POST['tanggal_meninggal']));
    $tempat_meninggal = $_POST['tempat_meninggal'];
    $agama_pewaris = $_POST['agama_pewaris'];
    $penyebab_meninggal = $_POST['penyebab_meninggal'];
    $meninggalkan = $_POST['meninggalkan'];
    $nama_meninggalkan = $_POST['nama_meninggalkan'];
    $hubungan = $_POST['hubungan'];
    $nama_hubungan =$_POST['nama_hubungan'];
    $saksi1 = $_POST['saksi1'];
    $saksi2 = $_POST['saksi2'];
    $tanggal_pembuatan_surat = strftime("%e %B %Y", strtotime($_POST['tanggal_pembuatan_surat']));
    $nama_kepala_kampung = $_POST['nama_kepala_kampung'];

    // Membuat konten HTML untuk Surat Keterangan Usaha
    $html = "
    <html>
    <head>
        <title>Surat Kuasa</title>
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
            .kop-surat .penyebab_meninggal {
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
                <div class='penyebab_meninggal'>Sekretariat: Jl. Raya Gayau Sakti Depan Pasar Gayau Sakti</div>
            </div>
        </div>
        <div class='judul-surat'>
            SURAT KETERAANGAN AHLI WARIS
        </div>
        <div class='nomor-surat'>
            Nomor: $nomor_surat
        </div>
        <div class='isi-surat'>
        Yang bertanda tangan di bawah ini, para ahli waris dari almarhum <b>$nama_pewaris (ALM)</b> menerangkan dengan sebenarnya dan sanggup diangkat
        sumpah bahwa almarhum <b>$nama_pewaris (ALM)</b> tempat tinggal terakhir di $tempat_tinggal_terakhir_pewaris. Pada tanggal $tanggal_meninggal
        telah meninggal dunia di $tempat_meninggal, karena $penyebab_meninggal, meninggalkan seorang $meninggalkan dan $hubungan yaitu :
            <table>
                <tr><td>Nama</td><td>: <b>$nama_pewaris</b></td></tr>
                <tr><td>tempat_tinggal_terakhir</td><td>: $tempat_tinggal_terakhir_pewaris</td></tr>
                <tr><td>Tempat, Tanggal Lahir</td><td>: $tempat_meninggal, $tanggal_meninggal</td></tr>
                <tr><td>Pekerjaan</td><td>: $tempat_meninggal</td></tr>
                <tr><td>Agama</td><td>: $agama_pewaris</td></tr>
                <tr><td>Alamat</td><td>: $penyebab_meninggal</td></tr>
            </table>
            Selanjutnya disebut <b>PIHAK 1</b><br>
            <table>
                <tr><td>Nama</td><td>: <b>$meninggalkan</b></td></tr>
                <tr><td>tempat_tinggal_terakhir</td><td>: $nama_meninggalkan</td></tr>
                <tr><td>Tempat, Tanggal Lahir</td><td>: $hubungan, $nama_hubungan</td></tr>
                <tr><td>Pekerjaan</td><td>: $saksi2</td></tr>
                <tr><td>Agama</td><td>: $saksi2</td></tr>
                <tr><td>Alamat</td><td>: $alamat_pihak2</td></tr>
            </table>
            Selanjutnya disebut <b>PIHAK 2</b><br>
            <p>
    Saya Pihak 1 (<b>$nama_pewaris</b>) memberi kuasa kepada pihak 2 (<b>$meninggalkan</b>) untuk menggunakan Akta Jual Beli (AJB) 
    atas nama <b>$meninggalkan</b> sebagai jaminan pinjaman di <b>$jaminan_pinjaman</b>.
</p>

<p>
    Demikian surat kuasa ini saya buat dengan sebenarnya tanpa ada tekanan dan paksaan dari pihak lain, 
    untuk selanjutnya agar dapat berguna sebagaimana mestinya.
</p>
        </div>
        <div class='footer-surat' style='text-align: center;'>
    <div style='text-align: right; margin-bottom: 20px;'>
        Gayau Sakti, $tanggal_pembuatan_surat
    </div>
    <div style='display: flex; justify-content: space-around; margin-top: 30px;'>
        <div>
            Yang Diberi Kuasa<br><br><br>
            <div class='ttd'>$meninggalkan</div>
        </div>
        <div>
            Yang Memberi Kuasa<br><br><br>
            <div class='ttd'>$nama_pewaris</div>
        </div>
    </div>
    <br>
    Mengetahui<br>
    Kepala Kampung Gayau Sakti<br><br>
    <div class='ttd'>$nama_kepala_kampung</div>
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
