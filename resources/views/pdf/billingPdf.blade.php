<html>
    <head>
        <title>Taxceed</title>
        <style>
			.invoice-box {
				max-width: 800px;
				margin: auto;
				padding: 30px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
				font-size: 16px;
				line-height: 24px;
				font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
				color: #555;
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(2) {
				text-align: right;
			}

			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}

			@media only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}

			/** RTL **/
			.invoice-box.rtl {
				direction: rtl;
				font-family: Tahoma, "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
			}

			.invoice-box.rtl table {
				text-align: right;
			}

			.invoice-box.rtl table tr td:nth-child(2) {
				text-align: left;
			}
		</style>
        @php
        function penyebut($nilai) {
            $nilai = abs($nilai);
            $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
            $temp = "";
            if ($nilai < 12) {
                $temp = " ". $huruf[$nilai];
            } else if ($nilai <20) {
                $temp = penyebut($nilai - 10). " belas";
            } else if ($nilai < 100) {
                $temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
            } else if ($nilai < 200) {
                $temp = " seratus" . penyebut($nilai - 100);
            } else if ($nilai < 1000) {
                $temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
            } else if ($nilai < 2000) {
                $temp = " seribu" . penyebut($nilai - 1000);
            } else if ($nilai < 1000000) {
                $temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
            } else if ($nilai < 1000000000) {
                $temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
            } else if ($nilai < 1000000000000) {
                $temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
            } else if ($nilai < 1000000000000000) {
                $temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
            }     
            return $temp;
        }

        function terbilang($nilai) {
            if($nilai<0) {
                $hasil = "minus ". trim(penyebut($nilai));
            } else {
                $hasil = trim(penyebut($nilai));
            }     		
            return $hasil;
        }
        @endphp
    </head>
    <body>
		<div class="invoice-box">
			<table cellpadding="0" cellspacing="0">
				<tr class="top">
					<td >
						<table>
							<tr>
								<td class="title">
									<img src="{{$image_path}}" style="width: 90%; max-width: 100" />
								</td>
								<table>
									<tr>
										<td>
											<b>
												KEMENTRIAN KEUANGAN R.I<br />
											</b>
											<b>
												DIREKTORAT JENDERAL PAJAK<br />
											</b>
										</td>
										
									</tr>
								</table>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td><b>NPWP</b></td>
					<td>{{$billing->npwp}}</td>
				</tr>
				<tr>
					<td><b>NAMA</b></td>
					<td>{{$billing->nama}}</td>
				</tr>
				<tr>
					<td><b>ALAMAT</b></td>
					<td>{{$billing->alamat}}</td>
				</tr>
				<tr>
					<td><b>NOP</b></td>
					<td>{{$billing->nop}}</td>
				</tr>
				<tr>
					<td><b>JENIS PAJAK</b></td>
					<td>{{$billing->jenis_pajak}}</td>
				</tr>
				<tr>
					<td><b>JENIS SETORAN</b></td>
					<td>{{$billing->kode_jenis_setoran}}</td>
				</tr>
				<tr>
					<td><b>MASA PAJAK</b></td>
					<td>{{$billing->masa_pajak}}</td>
				</tr>
				<tr>
					<td><b>TAHUN PAJAK</b></td>
					<td>{{$billing->tahun_pajak}}</td>
				</tr>
				<tr>
					<td><b>NOMOR KETETAPAN</b></td>
					<td>-</td>
				</tr>
				<tr>
					<td><b>JUMLAH SETOR</b></td>
					<td>{{number_format($billing->jumlah)}}</td>
				</tr>
				<tr>
					<td><b>TERBILANG</b></td>
					<td>{{terbilang($billing->jumlah)}}</td>
				</tr>
				<br>
				<tr>
					<td><b>URAIAN</b></td>
					<td>-</td>
				</tr>
				<br>
				<tr>
					<td><b>NPWP PENYETOR</b></td>
					<td>{{$billing->npwp_penyetor}}</td>
				</tr>
				<tr>
					<td><b>NAMA PENYETOR</b></td>
					<td>{{$billing->nama_penyetor}}</td>
				</tr>
				<tr>
					<h6><b>GUNAKAN KODE BILLING UNTUK PEMBAYARAN</b></h6>
				</tr>
				<tr>
					<td><b>ID BILLING</b></td>
					<td>{{$billing->kode_billing}}</td>
				</tr>
				<tr>
					<td><b>MASA AKTIF</b></td>
					<td>{{date('d/M/Y',strtotime($billing->end_periode_pajak))}}</td>
				</tr>
				<tr>
					<h6><b>Catatan: Apabila ada kesalahan dalam isian Kode Billing atau masa berlakunya berakhir, Kode Billing dapat dibuat kembali. Tanggung jawab isian Kode Billing ada pada Wajib Pajak yang namanya tercantum di dalamnya.</b></h6>
				</tr>
			</table>
		</div>
	</body>
</html>