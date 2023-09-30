<html>
    <head>
        <title>Pembayaran</title>
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
    </head>
    <body>
		<div class="invoice-box">
			<table cellpadding="0" cellspacing="0">
				<tr class="top">
					<td >
						<b>
							<h2>
								Pembayaran Tagihan - Transaksi<br />
							</h2>
						</b>
					</td>
				</tr>
				<tr>
					<td><b>Informasi Pembayaran</b></td>
				</tr>
				<tr>
					<td>No.Referensi Tagihan</td>
					<td>{{$billing->no_ref}}</td>
				</tr>
				<tr>
					<td>Dari Rekening</td>
					<td>{{$billing->vendor->attribute3}}</td>
				</tr>
				<tr>
					<td>Ke Perusahaan</td>
					<td>{{$billing->vendor->nama_vendor}}</td>
				</tr>
				<tr>
					<td>Kode Billing</td>
					<td>{{$billing->kode_billing}}</td>
				</tr>
				<tr>
					<td>NPWP</td>
					<td>{{$billing->npwp_penyetor}}</td>
				</tr>
				<tr>
					<td>Nama Wajib Pajak</td>
					<td>{{$billing->nama_penyetor}}</td>
				</tr>
				<tr>
					<td>Akun</td>
					<td>{{$billing->akun}}</td>
				</tr>
				<tr>
					<td>Kose Jenis Setoran</td>
					<td>{{$billing->kode_jenis_setoran}}</td>
				</tr>
				<tr>
					<td>Masa Pajak</td>
					<td>{{$billing->masa_pajak}}</td>
				</tr>
				<tr>
					<td>Jumlah Setor</td>
					<td>{{$billing->jumlah}}</td>
				</tr>
				<tr>
					<td>Nomor SK</td>
					<td>{{$billing->no_sk}}</td>
				</tr>
				<tr>
					<td>NOP</td>
					<td>{{$billing->nop}}</td>
				</tr>
				<tr>
					<td>NTPN</td>
					<td>{{$billing->ntpn}}</td>
				</tr>
				<tr>
					<td>NTB</td>
					<td>{{$billing->ntb}}</td>
				</tr>
				<tr>
					<td>STAN</td>
					<td>{{$billing->stan}}</td>
				</tr>
				<tr>
					<td>Tanggal Buku</td>
					<td>{{date('d-M-Y',strtotime($billing->created_at))}}</td>
				</tr>
				<tr>
					<td>Jenis Pembayaran</td>
					<td>Pembayaran Sekarang</td>
				</tr>
				<tr>
					<td><b>Status</b></td>
				</tr>
				<tr>
					<td>Status</td>
					<td>Berhasil</td>
				</tr>
				<tr>
					<td><b>Pelaksana Transaksi</b></td>
				</tr>
				<br>
			</table>
			<table>
				<tr>
					<td><b>User</b></td>
					<td><b>Tindakan</b></td>
					<td><b></b></td>
					<td><b>Tanggal</b></td>
				</tr>
				<tr>
					<td>{{$billing->nama_penyetor}}</td>
					<td>Dibuat</td>
					<td><b></b></td>
					<td>{{date('d-M-Y',strtotime($billing->created_at))}}</td>
				</tr>
				<tr>
					@php
						$tahunsekarang = date('Y');
					@endphp
					<h5>
						{{$tahunsekarang}}.Hak cipta dilindungi undang-undang
					</h5>
				</tr>
			</table>
		</div>
	</body>
</html>