<?php
// Mengambil data dari form
$nomor_surat = htmlspecialchars($_POST['nomor_surat']);
$kepada = htmlspecialchars($_POST['kepada']);
$tanggal = htmlspecialchars($_POST['tanggal']);
$jam = htmlspecialchars($_POST['jam']);
$acara = htmlspecialchars($_POST['acara']);
$tempat = htmlspecialchars($_POST['tempat']);
$tanggal_pembuatan = htmlspecialchars($_POST['tanggal_pembuatan']);
$pengirim = htmlspecialchars($_POST['pengirim']); // Nama pengirim
?>

<!DOCTYPE html>
<html>
<head>
    <title>Surat Undangan</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            margin: 40px;
        }
        .header {
            text-align: center;
        }
        .header img {
            width: 100px;
            height: auto;
        }
        .header h1, .header h2, .header h3 {
            margin: 0;
        }
        .header h1 {
            font-size: 20px;
        }
        .header h2 {
            font-size: 18px;
        }
        .header h3 {
            font-size: 16px;
        }
        .header p {
            margin: 0;
            font-size: 14px;
        }
        .content {
            margin-top: 20px;
        }
        .content p {
            margin: 5px 0;
        }
        .content .details {
            margin-left: 40px;
        }
        .content .details p {
            margin: 2px 0;
        }
        .footer {
            margin-top: 40px;
        }
        .footer .signature {
            margin-top: 60px;
            text-align: right;
        }
        .footer .signature p {
            margin: 2px 0;
        }
        .footer .stamp {
            text-align: center;
            margin-top: 20px;
        }
        .footer .stamp img {
            width: 100px;
            height: auto;
        }
         /* Tambahan CSS untuk menghilangkan tombol saat dicetak */
         @media print {
            .action-container {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="header">
    <img alt="Logo" src="images/lampungtengah.png"/>
        <h1>PEMERINTAH KABUPATEN LAMPUNG TENGAH</h1>
        <h2>KECAMATAN SEPUTIH AGUNG</h2>
        <h3>KAMPUNG GAYAU SAKTI</h3>
        <p>Sekretariat : Jl. Raya Gayau Sakti Depan Pasar Gayau Sakti</p>
        <hr/>
    </div>
    <div class="content">
        <p>Nomor : <?php echo $nomor_surat; ?></p>
        <p>Lampiran : -</p>
        <p>Perihal : Undangan</p>
        <p>Kepada Yth :</p>
        <div class="details">
            <?php echo nl2br($kepada); ?>
        </div>
        <p>Assalamu'alaikum Warahmatullahi Wabarakaatuh</p>
        <p>Dengan Hormat</p>
        <p>Sehubungan dengan di akan adakannya Musyawarah Rencana Pembangunan (Musrenbang) tingkat Kampung, bersama ini Kepala Kampung Gayau Sakti mengundang Bapak/Ibu untuk dapat hadir pada :</p>
        <div class="details">
            <p>Hari, Tanggal : <?php echo date('l, d F Y', strtotime($tanggal)); ?></p>
            <p>Jam : <?php echo $jam; ?></p>
            <p>Acara : <?php echo $acara; ?></p>
            <p>Tempat : <?php echo $tempat; ?></p>
        </div>
        <p>Demikian Surat Undangan ini kami sampaikan, atas perhatian dan kehadirannya dihaturkan terimakasih.</p>
    </div>
    <div class="footer">
        <p>Wassalamu'alaikum Warahmatullahi Wabarakaatuh</p>
        <div class="signature">
            <p>Gayau Sakti, <?php echo date('d F Y', strtotime($tanggal_pembuatan)); ?></p>
            <p>Kepala Kampung Gayau Sakti</p>
            <br/><br/><br/><br>
            <p><?php echo $pengirim; ?></p>
        </div>
        <div class="action-container">
            <button onclick="window.print()">Cetak Data Perangkat Desa</button> 
        </div>
    </div>
</body>
</html>
