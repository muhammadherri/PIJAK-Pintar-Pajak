document.addEventListener('DOMContentLoaded', function() {
    // sptmasapajak
        const sptpajak_npwp = document.getElementById('id_npwp_1721');
        const errorerrorid_npwp = document.getElementById('errorid_npwp_1721');
        sptpajak_npwp.addEventListener('input', function() {
            const inputValue = sptpajak_npwp.value;

            if (inputValue.length > 15) {
                sptpajak_npwp.value = inputValue.slice(0, 15);
                errorerrorid_npwp.textContent = 'Maksimal 15 digit';
            } else {
                errorerrorid_npwp.textContent = '';
            }
        });
        const sptnpwppemotong_1721 = document.getElementById('npwppemotong_1721');
        const erronpwp_pemotong_1721 = document.getElementById('errorid_npwp_pemotong_1721');
        sptnpwppemotong_1721.addEventListener('input', function() {
            const inputValue = sptnpwppemotong_1721.value;

            if (inputValue.length > 15) {
                sptnpwppemotong_1721.value = inputValue.slice(0, 15);
                erronpwp_pemotong_1721.textContent = 'Maksimal 15 digit';
            } else {
                erronpwp_pemotong_1721.textContent = '';
            }
        });
        
        const tablelist_1721 = document.querySelector('#objekpajak_1721 tbody');
        const addBtnadd_1721 = document.querySelector('#btn-addobjek_1721');
        addBtnadd_1721.addEventListener('click', function() {
            const newRow = `
            <tr>
                <td width="auto" class="text-center"value="">
                    <select id="objek_penerima[]" name="objek_penerima[]" class="dropdown-groups">
                        <option value="PEGAWAI TETAP - 21-100-01">1. PEGAWAI TETAP - 21-100-01</option>
                        <option value="PENERIMA PENSIUN - BERKALA 21-100-02">2. PENERIMA PENSIUN BERKALA - 21-100-02</option>
                        <option value="PEGAWAI TIDAK TETAP ATAU TENAGA KERJA LEPAS - 21-100-03">3. PEGAWAI TIDAK TETAP ATAU... - 21-100-03</option>
                        <option value="DISTRIBUTOR MLM - 21-100-04">4a. DISTRIBUTOR MLM - 21-100-04</option>
                        <option value="PETUGAS DINAS LUAR ASURANSI - 21-100-05">4b. PETUGAS DINAS LUAR ASURAN... - 21-100-05</option>
                        <option value="PENJAJA BARANG DAGANGAN - 21-100-06">4c. PENJAJA BARANG DAGANGAN - 21-100-06</option>
                        <option value="TENAGA AHLI - 21-100-07">4d. TENAGA AHLI - 21-100-07</option>
                        <option value="BUKAN PEGAWAI YANG MENERIMA IMBALAN YANG BERSIFAT BERKESINAMBUNGAN - 21-100-08">4e. BUKAN PEGAWAI YANG MENERI ... - 21-100-08</option>
                        <option value="BUKAN PEGAWAI YANG MENERIMA IMBALAN YANG TIDAK BERSIFAT BERKESINAMBUNGAN - 21-100-09">4f. BUKAN PEGAWAI YANG MENERI... - 21-100-09</option>
                        <option value="ANGGOTA DEWAN KOMISARIS ATAU DEWAN PENGAWAS YANG TIDAK MERANGKAP SEBAGAI PEGAWAI TETAP - 21-100-10">5. ANGGOTA DEWAN KOMISARIS A... - 21-100-10</option>
                        <option value="MANTAN PEGAWAI YANG MENERIMA JASA PRODUKSI, TANTIEM, BONUS ATAU IMBALAN LAIN - 21-100-11">6. MANTAN PEGAWAI YANG MENERI... - 21-100-11</option>
                        <option value="PEGAWAI YANG MELAKUKAN PENARIKAN DANA PENSIUN - 21-100-12">7. PEGAWAI YANG MELAKUKAN PE... - 21-100-12</option>
                        <option value="PESERTA KEGIATAN - 21-100-13">8. PESERTA KEGIATAN - 21-100-13</option>
                        <option value="PENERIMA PENGHASILAN YANG DIPOTONG PPh PASAL 21 TIDAK FINAL LAINNYA - 21-100-99">9. PENERIMA PENGHASILAN YANG... - 21-100-99</option>
                        <option value="PEGAWAI/PEMBERI JASA/PESERTA KEGIATAN/PENERIMA PENSIUN BERKALA SEBAGAI WAJIB PAJAK LUAR NEGERI - 27-100-99">10. PEGAWAI/PEMBERI JASA/PESE... - 27-100-99</option>
                    </select>  
                </td>
              
                <td class="text-center">
                    <input required autocomplete="off" type="text" onkeyup="this.value=sprator(this.value);"
                        name="objek_jumlahpenerima[]"
                        id="objek_jumlahpenerima[]" min="0"
                        class="form-control penerima1771" />
                </td>
                <td class="text-center">
                    <input required autocomplete="off" type="text" onkeyup="this.value=sprator(this.value);"
                        name="objek_jumlahpenghasilan[]"
                        id="objek_jumlahpenghasilan[]" min="0"
                        class="form-control penghasilan1771" />
                </td>
                <td class="text-center">
                    <input required autocomplete="off" type="text" onkeyup="this.value=sprator(this.value);"
                        name="objek_jumlahpajak[]"
                        id="objek_jumlahpajak[]" min="0"
                        class="form-control pajak1771" />
                </td>
                <td><button type="button" class="btn btn-danger btn-remove-1721"><i
                    class="fa fa-trash"></i>
                </td>
            </tr>
            `;
            tablelist_1721.insertAdjacentHTML('beforeend', newRow);
        });
        tablelist_1721.addEventListener('input', function(event) {
            const target = event.target;
            if (target.tagName === 'INPUT' && target.name.startsWith('objek')) {

                var totalpenerima = 0
                var totalbruto = 0
                var totalpajakpotong = 0

                $(".penerima1771").each(function() {
                    totalpenerima += +$(this).val().replace(/,/g, '');
                });
                $(".penghasilan1771").each(function() {
                    totalbruto += +$(this).val().replace(/,/g, '');
                });
                $(".pajak1771").each(function() {
                    totalpajakpotong += +$(this).val().replace(/,/g, '');
                });
            
                $('.totalpenerima1771').val(totalpenerima.toLocaleString());
                $('.totalbruto1771').val(totalbruto.toLocaleString());
                $('.totalpajak1771').val(totalpajakpotong.toLocaleString());
            }
        });
        tablelist_1721.addEventListener('click', function(event) {
            if (event.target.classList.contains('btn-remove-1721')) {
                const row = event.target.closest('tr');
                row.remove();
            }
        });

        const tablelistobjekpajakfinal_1721 = document.querySelector('#objekpajakfinal_1721 tbody');
        const addBtnadd_addobjekfinal_1721 = document.querySelector('#btn-addobjekfinal_1721');
        addBtnadd_addobjekfinal_1721.addEventListener('click', function() {
            const newRow = `
            <tr>
                <td width="auto" class="text-center"value="">
                    <select id="objek_penerima_c[]" name="objek_penerima_c[]" class="dropdown-groups">
                        <option value="PENERIMA UANG PESANGON YANG DIBAYARKAN SEKALIGUS - 21-401-01">1. PENERIMA UANG PESANGON YA... -  21-401-01</option>
                        <option value="PENERIMA UANG MANFAAT PENSIUN, TUNJANGAN HARI TUA ATAU JAMINAN HARI TUA DAN PEMBAYARAN SEJENIS YANG DIBAYARKAN SEKALIGUS - 21-401-02">2. PENERIMA UANG MANFAAT PEN... -  21-401-02</option>
                        <option value="PEJABAT NEGARA, PEGAWAI NEGERI SIPIL, ANGGOTA TNI/POLRI DAN PENSIUNAN YANG MENERIMA HONORARIUM DAN IMBALAN LAIN YANG DIBEBANKAN KEPADA KEUANGAN NEGARA/DAERAH - 21-402-01">3. PEJABAT NEGARA, PEGAWAI N... -  21-402-01</option>
                        <option value="PENERIMA PENGHASILAN YANG DIPOTONG PPh PASAL 21 FINAL LAINNYA - 21-499-99">4. PENERIMA PENGHASILAN YANG... -  21-499-99</option>
                        
                    </select>
                </td>
               
                <td class="text-center">
                    <input required autocomplete="off" type="text"
                        onkeyup="this.value=sprator(this.value);"
                        name="objek_jumlahpenerima_c[]"
                        id="objek_jumlahpenerima_c[]" min="0"
                        class="form-control penerima_c" />
                </td>
                <td class="text-center">
                    <input required autocomplete="off" type="text"
                    onkeyup="this.value=sprator(this.value);"
                    name="objek_jumlahpenghasilan_c[]"
                        id="objek_jumlahpenghasilan_c[]"
                        min="0" class="form-control penghasilan_c" />
                </td>
                <td class="text-center">
                    <input required autocomplete="off" type="text"
                    onkeyup="this.value=sprator(this.value);"
                    name="objek_jumlahpajak_c[]"
                        id="objek_jumlahpajak_c[]" min="0"
                        class="form-control pajak_c" />
                </td>
                <td><button type="button" class="btn btn-danger btn-remove-final-1721"><i
                    class="fa fa-trash"></i>
                </td>
            </tr>
            `;
            tablelistobjekpajakfinal_1721.insertAdjacentHTML('beforeend', newRow);
        });
        tablelistobjekpajakfinal_1721.addEventListener('input', function(event) {
            const target = event.target;
            if (target.tagName === 'INPUT' && target.name.startsWith('objek')) {

                var totalpenerima = 0
                var totalbruto = 0
                var totalpajakpotong = 0

                $(".penerima_c").each(function() {
                    totalpenerima += +$(this).val().replace(/,/g, '');
                });
                $(".penghasilan_c").each(function() {
                    totalbruto += +$(this).val().replace(/,/g, '');
                });
                $(".pajak_c").each(function() {
                    totalpajakpotong += +$(this).val().replace(/,/g, '');
                });
            
                $('.totalpenerima_c').val(totalpenerima.toLocaleString());
                $('.totalbruto_c').val(totalbruto.toLocaleString());
                $('.totalpajak_c').val(totalpajakpotong.toLocaleString());
            }
        });
        tablelistobjekpajakfinal_1721.addEventListener('click', function(event) {
            if (event.target.classList.contains('btn-remove-final-1721')) {
                const row = event.target.closest('tr');
                row.remove();
            }
        });

    // FORMULIR I
        const npwppemotong_1721_formulirI = document.getElementById('npwppemotong_1721_formulirI');
        const error_npwppemotong_1721_formulirI = document.getElementById('error_npwppemotong_1721_formulirI');
        npwppemotong_1721_formulirI.addEventListener('input', function() {
            const inputValue = npwppemotong_1721_formulirI.value;
    
            if (inputValue.length > 15) {
                npwppemotong_1721_formulirI.value = inputValue.slice(0, 15);
                error_npwppemotong_1721_formulirI.textContent = 'Maksimal 15 digit';
            } else {
                error_npwppemotong_1721_formulirI.textContent = '';
            }
        });
        const tablelist_1721i = document.querySelector('#penerimapensiun_1721 tbody');
        const addBtnadd_1721i = document.querySelector('#btn-adddaftarpotongan_1721');
        addBtnadd_1721i.addEventListener('click', function() {
            const newRow = `
            <tr>
                <td width="auto" class="text-center">
                    <input required autocomplete="off" type="text"
                        name="pgt_npwp_1721[]" id="pgt_npwp_1721[]" min="0"
                        class="form-control" />
                </td>
                <td width="auto" class="text-center">
                    <input required autocomplete="off" type="text"
                        name="pgt_namapegawai_1721[]" id="pgt_namapegawai_1721[]"
                        class="form-control" />
                </td>
                <td width="auto" class="text-center">
                    <input required autocomplete="off" type="number"
                        name="pgt_nomor_1721[]" id="pgt_nomor_1721[]" min="0"
                        class="form-control" />
                </td>
                <td width="auto" class="text-center">
                    <input required autocomplete="off" type="date"
                        name="pgt_tglbukti_1721[]" id="pgt_tglbukti_1721[]"
                        class="form-control" />
                </td>
                <td width="auto" class="text-center">
                    <input required autocomplete="off" type="number"
                        name="pgt_kodeobjek_1721[]" id="pgt_kodeobjek_1721[]" min="0"
                        class="form-control" />
                </td>
                <td width="auto" class="text-center">
                    <input required autocomplete="off" type="text" min="0"
                        name="pgt_jumlahpenghasilanbruto_1721[]" id="pgt_jumlahpenghasilanbruto_1721[]"
                        onkeyup="this.value=sprator(this.value);"
                        class="form-control bruto" />
                </td>
                <td width="auto" class="text-center">
                    <input required autocomplete="off" type="text" min="0"
                        name="pgt_pphdipotong_1721[]" id="pgt_pphdipotong_1721[]"
                        onkeyup="this.value=sprator(this.value);"
                        class="form-control pph" />
                </td>
                <td width="auto" class="text-center">
                    <input required autocomplete="off" type="text" min="0"
                        name="pgt_masaperolehan_1721[]" id="pgt_masaperolehan_1721[]"
                        onkeyup="this.value=sprator(this.value);"
                        class="form-control" />
                </td>
                <td width="auto" class="text-center">
                    <input required autocomplete="off" type="number" min="0"
                        name="pgt_kodenegara_1721[]" id="pgt_kodenegara_1721[]"
                        class="form-control" />
                </td>
                <td><button type="button" class="btn btn-danger btn-remove-1721i"><i
                    class="fa fa-trash"></i>
                </td>
            </tr>
            `;
            tablelist_1721i.insertAdjacentHTML('beforeend', newRow);
        });
        tablelist_1721i.addEventListener('input', function(event) {
            const target = event.target;
            if (target.tagName === 'INPUT' && target.name.startsWith('pgt')) {

                var totalbruto = 0
                var totalpph = 0

                $(".bruto").each(function() {
                    totalbruto += +$(this).val().replace(/,/g, '');
                });
                $(".pph").each(function() {
                    totalpph += +$(this).val().replace(/,/g, '');
                });
             
                $('.totalbruto').val(totalbruto.toLocaleString());
                $('.totalpph').val(totalpph.toLocaleString());
            }
        });
        tablelist_1721i.addEventListener('click', function(event) {
            if (event.target.classList.contains('btn-remove-1721i')) {
                const row = event.target.closest('tr');
                row.remove();
            }
        });

    // FORMULIR I
    // FORMULIR II
        const pemotong_formulirII_1721 = document.getElementById('npwppemotong_formulirII_1721');
        const error_npwppemotong_1721_formulirII = document.getElementById('error_npwppemotong_1721_formulirII');
        pemotong_formulirII_1721.addEventListener('input', function() {
            const inputValue = pemotong_formulirII_1721.value;

            if (inputValue.length > 15) {
                pemotong_formulirII_1721.value = inputValue.slice(0, 15);
                error_npwppemotong_1721_formulirII.textContent = 'Maksimal 15 digit';
            } else {
                error_npwppemotong_1721_formulirII.textContent = '';
            }
        });
        const tablelist_1721ii = document.querySelector('#formulir1721-II tbody');
        const addBtnadd_1721ii = document.querySelector('#btn-adddaftarpotongan_1721_ii');
        addBtnadd_1721ii.addEventListener('click', function() {
            const newRow = `
            <tr>
                <td width="auto" class="text-center">
                    <input required autocomplete="off" type="text"
                        name="pgt_npwp_1721_formulirII[]" id="pgt_npwp_1721_formulirII[]" min="0"
                        class="form-control" />
                </td>
                <td width="auto" class="text-center">
                    <input required autocomplete="off" type="text"
                        name="pgt_namapegawai_1721_formulirII[]" id="pgt_namapegawai_1721_formulirII[]"
                        class="form-control" />
                </td>
                <td width="auto" class="text-center">
                    <input required autocomplete="off" type="text"
                        name="pgt_nomor_1721_formulirII[]" id="pgt_nomor_1721_formulirII[]" min="0"
                        class="form-control" />
                </td>
                <td width="auto" class="text-center">
                    <input required autocomplete="off" type="date"
                        name="pgt_tglbukti_1721_formulirII[]" id="pgt_tglbukti_1721_formulirII[]"
                        class="form-control" />
                </td>
                <td width="auto" class="text-center">
                    <input required autocomplete="off" type="text"
                        name="pgt_kodeobjek_1721_formulirII[]" id="pgt_kodeobjek_1721_formulirII[]" min="0"
                        class="form-control" />
                </td>
                <td width="auto" class="text-center">
                    <input required autocomplete="off" type="text" min="0"
                        name="pgt_jumlahpenghasilanbruto_1721_formulirII[]" id="pgt_jumlahpenghasilanbruto_1721_formulirII[]"
                        onkeyup="this.value=sprator(this.value);"
                        class="form-control penghasilanbruto" />
                </td>
                <td width="auto" class="text-center">
                    <input required autocomplete="off" type="text" min="0"
                        name="pgt_pphdipotong_1721_formulirII[]" id="pgt_pphdipotong_1721_formulirII[]"
                        onkeyup="this.value=sprator(this.value);"
                        class="form-control potonganpph" />
                </td>
                <td width="auto" class="text-center">
                    <input required autocomplete="off" type="number" min="0"
                        name="pgt_kodenegara_1721_formulirII[]" id="pgt_kodenegara_1721_formulirII[]"
                        class="form-control" />
                </td>
                <td><button type="button" class="btn btn-danger btn-remove-1721ii"><i
                    class="fa fa-trash"></i>
                </td>
            </tr>
            `;
            tablelist_1721ii.insertAdjacentHTML('beforeend', newRow);
        });
        tablelist_1721ii.addEventListener('input', function(event) {
            const target = event.target;
            if (target.tagName === 'INPUT' && target.name.startsWith('pgt')) {
                var totalbruto = 0
                var totalpph = 0

                $(".penghasilanbruto").each(function() {
                    totalbruto += +$(this).val().replace(/,/g, '');
                });
                $(".potonganpph").each(function() {
                    totalpph += +$(this).val().replace(/,/g, '');
                });
             
                $('.jumlahbruto1721II').val(totalbruto.toLocaleString());
                $('.jumlahpotonganpph1721II').val(totalpph.toLocaleString());
            }
        });
        tablelist_1721ii.addEventListener('click', function(event) {
            if (event.target.classList.contains('btn-remove-1721ii')) {
                const row = event.target.closest('tr');
                row.remove();
            }
        });
    // FORMULIR II
    // FORMULIR III
        const pemotong_formulirIII_1721 = document.getElementById('npwppemotong_formulirIII_1721');
        const error_npwppemotong_1721_formulirIII = document.getElementById('error_npwppemotong_1721_formulirIII');
        pemotong_formulirIII_1721.addEventListener('input', function() {
            const inputValue = pemotong_formulirIII_1721.value;

            if (inputValue.length > 15) {
                pemotong_formulirIII_1721.value = inputValue.slice(0, 15);
                error_npwppemotong_1721_formulirIII.textContent = 'Maksimal 15 digit';
            } else {
                error_npwppemotong_1721_formulirIII.textContent = '';
            }
        });
        const tablelist_1721iii = document.querySelector('#formulir1721-III tbody');
        const addBtnadd_1721iii = document.querySelector('#btn-adddaftarpotongan_1721_iii');
        addBtnadd_1721iii.addEventListener('click', function() {
            const newRow = `
            <tr>
                <td width="auto" class="text-center">
                    <input required autocomplete="off" type="text"
                        name="pgt_npwp_1721_formulirIII[]" id="pgt_npwp_1721_formulirIII[]" min="0"
                        class="form-control" />
                </td>
                <td width="auto" class="text-center">
                    <input required autocomplete="off" type="text"
                        name="pgt_namapegawai_1721_formulirIII[]" id="pgt_namapegawai_1721_formulirIII[]"
                        class="form-control" />
                </td>
                <td width="auto" class="text-center">
                    <input required autocomplete="off" type="text"
                        name="pgt_nomor_1721_formulirIII[]" id="pgt_nomor_1721_formulirIII[]" min="0"
                        class="form-control" />
                </td>
                <td width="auto" class="text-center">
                    <input required autocomplete="off" type="date"
                        name="pgt_tglbukti_1721_formulirIII[]" id="pgt_tglbukti_1721_formulirIII[]"
                        class="form-control" />
                </td>
                <td width="auto" class="text-center">
                    <input required autocomplete="off" type="text"
                        name="pgt_kodeobjek_1721_formulirIII[]" id="pgt_kodeobjek_1721_formulirIII[]" min="0"
                        class="form-control" />
                </td>
                <td width="auto" class="text-center">
                    <input required autocomplete="off" type="text" min="0"
                        name="pgt_jumlahpenghasilanbruto_1721_formulirIII[]" id="pgt_jumlahpenghasilanbruto_1721_formulirIII[]"
                        onkeyup="this.value=sprator(this.value);"
                        class="form-control penghasilanbruto1721iii" />
                </td>
                <td width="auto" class="text-center">
                    <input required autocomplete="off" type="text" min="0"
                        name="pgt_pphdipotong_1721_formulirIII[]" id="pgt_pphdipotong_1721_formulirIII[]"
                        onkeyup="this.value=sprator(this.value);"
                        class="form-control potonganpph1721iii" />
                </td>
                <td><button type="button" class="btn btn-danger btn-remove-1721iii"><i
                    class="fa fa-trash"></i>
                </td>
            </tr>
            `;
            tablelist_1721iii.insertAdjacentHTML('beforeend', newRow);
        });
        tablelist_1721iii.addEventListener('input', function(event) {
            const target = event.target;
            if (target.tagName === 'INPUT' && target.name.startsWith('pgt')) {
                var totalbruto = 0
                var totalpph = 0

                $(".penghasilanbruto1721iii").each(function() {
                    totalbruto += +$(this).val().replace(/,/g, '');
                });
                $(".potonganpph1721iii").each(function() {
                    totalpph += +$(this).val().replace(/,/g, '');
                });
             
                $('.jumlahbruto1721III').val(totalbruto.toLocaleString());
                $('.jumlahpotonganpph1721III').val(totalpph.toLocaleString());
            }
        });
        tablelist_1721iii.addEventListener('click', function(event) {   
            if (event.target.classList.contains('btn-remove-1721iii')) {
                const row = event.target.closest('tr');
                row.remove();
            }
        });
    // FORMULIR III
    // FORMULIR IV
        const npwppemotong_formulirIV_1721 = document.getElementById('npwppemotong_formulirIV_1721');
        const error_npwppemotong_1721_formulirIV = document.getElementById('error_npwppemotong_1721_formulirIV');
        npwppemotong_formulirIV_1721.addEventListener('input', function() {
            const inputValue = npwppemotong_formulirIV_1721.value;

            if (inputValue.length > 15) {
                npwppemotong_formulirIV_1721.value = inputValue.slice(0, 15);
                error_npwppemotong_1721_formulirIV.textContent = 'Maksimal 15 digit';
            } else {
                error_npwppemotong_1721_formulirIV.textContent = '';
            }
        });
        const tablelist_1721iv = document.querySelector('#formulir1721-IV tbody');
        const addBtnadd_1721iv = document.querySelector('#btn-adddaftarpotongan_1721_iv');
        addBtnadd_1721iv.addEventListener('click', function() {
            const newRow = `
            <tr>
                <td width="auto" class="text-center">
                    <input required autocomplete="off" type="number"
                        name="ssp_kapIV[]" id="ssp_kapIV[]" min="0"
                        class="form-control" />
                </td>
                <td width="auto" class="text-center">
                    <input min="0" required autocomplete="off" type="number"
                        name="ssp_kjsIV[]" id="ssp_kjsIV[]"
                        class="form-control" />
                </td>
                <td width="auto" class="text-center">
                    <input required autocomplete="off" type="date"
                        name="ssp_tglIV[]" id="ssp_tglIV[]" min="0"
                        class="form-control" />
                </td>
                <td width="auto" class="text-center">
                    <input required autocomplete="off" type="number"
                        name="ssp_ntpnIV[]" id="ssp_ntpnIV[]"
                        class="form-control" />
                </td>
                <td width="auto" class="text-center">
                    <input required autocomplete="off" type="text"
                        name="ssp_pphIV[]" id="ssp_pphIV[]" min="0"
                        onkeyup="this.value=sprator(this.value);"
                        class="form-control jumlahpph" />
                </td>
                <td width="auto" class="text-center">
                    <input required autocomplete="off" type="text" min="0"
                        name="ssp_ketIV[]" id="ssp_ketIV[]"
                        class="form-control" />
                </td>
                <td><button type="button" class="btn btn-danger btn-remove-1721iv"><i
                    class="fa fa-trash"></i>
                </td>
            </tr>
            `;
            tablelist_1721iv.insertAdjacentHTML('beforeend', newRow);
        });
        tablelist_1721iv.addEventListener('input', function(event) {
            const target = event.target;
            if (target.tagName === 'INPUT' && target.name.startsWith('ssp')) {
                var totalpph = 0
             
                $(".jumlahpph").each(function() {
                    totalpph += +$(this).val().replace(/,/g, '');
                });
             
                $('.totalpph').val(totalpph.toLocaleString());
            }
        });
        tablelist_1721iv.addEventListener('click', function(event) {
            if (event.target.classList.contains('btn-remove-1721iv')) {
                const row = event.target.closest('tr');
                row.remove();
            }
        });
    // FORMULIR IV
    // FORMULIR V
        const npwppemotong_formulirV_1721 = document.getElementById('npwppemotong_formulirV_1721');
        const error_npwppemotong_1721_formulirV = document.getElementById('error_npwppemotong_1721_formulirV');
        npwppemotong_formulirV_1721.addEventListener('input', function() {
            const inputValue = npwppemotong_formulirV_1721.value;

            if (inputValue.length > 15) {
                npwppemotong_formulirV_1721.value = inputValue.slice(0, 15);
                error_npwppemotong_1721_formulirV.textContent = 'Maksimal 15 digit';
            } else {
                error_npwppemotong_1721_formulirV.textContent = '';
            }
        });
        
    // FORMULIR V
    // FORMULIR VI
        const npwp_formulirVI_1721 = document.getElementById('npwp_formulirVI_1721');
        const error_npwp_1721_formulirVI = document.getElementById('error_npwp_1721_formulirVI');
        npwp_formulirVI_1721.addEventListener('input', function() {
            const inputValue = npwp_formulirVI_1721.value;
            if (inputValue.length > 15) {
                npwp_formulirVI_1721.value = inputValue.slice(0, 15);
                error_npwp_1721_formulirVI.textContent = 'Maksimal 15 digit';
            } else {
                error_npwp_1721_formulirVI.textContent = '';
            }
        });
        const npwppemotong_formulirVI_1721 = document.getElementById('npwppemotong_formulirVI_1721');
        const error_npwppemotong_formulirVI_1721 = document.getElementById('error_npwppemotong_formulirVI_1721');
        npwppemotong_formulirVI_1721.addEventListener('input', function() {
            const inputValue = npwppemotong_formulirVI_1721.value;
            if (inputValue.length > 15) {
                npwppemotong_formulirVI_1721.value = inputValue.slice(0, 15);
                error_npwppemotong_formulirVI_1721.textContent = 'Maksimal 15 digit';
            } else {
                error_npwppemotong_formulirVI_1721.textContent = '';
            }
        });
        const tablelist_1721VI_pasal21 = document.querySelector('#list_1721VI_pasal21 tbody');
        const addPphPasal = document.querySelector('#btn-addPphPasal');
        addPphPasal.addEventListener('click', function() {
            const newRow = `
            <tr>
                <td class="text-center">
                    <input required autocomplete="off"
                        type="number" name="pph_KOPVI[]"
                        id="pph_KOPVI[]"
                        class="form-control" />
                </td>
                <td class="text-center">
                    <input min="0" required autocomplete="off"
                        type="text" name="pph_JPBVI[]"
                        onkeyup="this.value=sprator(this.value);"
                        id="pph_JPBVI[]"
                        class="form-control" />
                </td>
                <td class="text-center">
                    <input min="0" required autocomplete="off"
                        type="text" name="pph_DPPVI[]"
                        onkeyup="this.value=sprator(this.value);"
                        id="pph_DPPVI[]"
                        class="form-control" />
                </td>
                <td class="text-center">
                    <input min="0" required autocomplete="off"
                        type="text" name="pph_TLTVI[]"
                        onkeyup="this.value=sprator(this.value);"
                        id="pph_TLTVI[]"
                        class="form-control" />
                </td>
                <td class="text-center">
                    <input min="0" required autocomplete="off"
                        type="text" name="pph_tarifVI[]"
                        onkeyup="this.value=sprator(this.value);"
                        id="pph_tarifVI[]"
                        class="form-control" />
                </td>
                <td class="text-center">
                    <input min="0" required autocomplete="off"
                        type="text" name="pph_potongVI[]"
                        onkeyup="this.value=sprator(this.value);"
                        id="pph_potongVI[]"
                        class="form-control" />
                </td>
                <td><button type="button" class="btn btn-danger btn-remove-1721pph"><i
                    class="fa fa-trash"></i>
                </td>
            </tr>
            `;
            tablelist_1721VI_pasal21.insertAdjacentHTML('beforeend', newRow);
        });
        tablelist_1721VI_pasal21.addEventListener('input', function(event) {
            const target = event.target;
            if (target.tagName === 'INPUT' && target.name.startsWith('ssp')) {
                
            }
        });
        tablelist_1721VI_pasal21.addEventListener('click', function(event) {
            if (event.target.classList.contains('btn-remove-1721pph')) {
                const row = event.target.closest('tr');
                row.remove();
            }
        });
    // FORMULIR VI
    // FORMULIR VII
        const npwp_formulirVII_1721 = document.getElementById('npwp_formulirVII_1721');
        const error_npwp_1721_formulirVII = document.getElementById('error_npwp_1721_formulirVII');
        npwp_formulirVII_1721.addEventListener('input', function() {
            const inputValue = npwp_formulirVII_1721.value;
            if (inputValue.length > 15) {
                npwp_formulirVII_1721.value = inputValue.slice(0, 15);
                error_npwp_1721_formulirVII.textContent = 'Maksimal 15 digit';
            } else {
                error_npwp_1721_formulirVII.textContent = '';
            }
        });
        const tablelist_formulir1721VII = document.querySelector('#formulir1721-VII tbody');
        const addaddpphformulir1721vii = document.querySelector('#btn-addpphformulir1721-vii');
        addaddpphformulir1721vii.addEventListener('click', function() {
            const newRow = `
            <tr>
                <td class="text-center">
                    <input required autocomplete="off"
                        type="number" name="pph_kop_formulir_Vii[]"
                        id="pph_kop_formulir_Vii[]"
                        class="form-control" />
                </td>
                <td class="text-center">
                    <input min="0" required autocomplete="off"
                        onkeyup="this.value=sprator(this.value);"
                        type="text" name="pph_jpb_formulir_Vii[]"
                        id="pph_jpb_formulir_Vii[]"
                        class="form-control" />
                </td>
                <td class="text-center">
                    <input min="0" required autocomplete="off"
                        onkeyup="this.value=sprator(this.value);"
                        type="text" name="pph_tp_formulir_Vii[]"
                        id="pph_tp_formulir_Vii[]"
                        class="form-control" />
                </td>
                <td class="text-center">
                    <input min="0" required autocomplete="off"
                        type="text" name="pph_pph_formulir_Vii[]"
                        onkeyup="this.value=sprator(this.value);"
                        id="pph_pph_formulir_Vii[]"
                        class="form-control" />
                </td>
                <td><button type="button" class="btn btn-danger btn-remove-1721vii"><i
                    class="fa fa-trash"></i>
                </td>
            </tr>
            `;
            tablelist_formulir1721VII.insertAdjacentHTML('beforeend', newRow);
        });
        tablelist_formulir1721VII.addEventListener('input', function(event) {
            const target = event.target;
            if (target.tagName === 'INPUT' && target.name.startsWith('ssp')) {
                
            }
        });
        tablelist_formulir1721VII.addEventListener('click', function(event) {
            if (event.target.classList.contains('btn-remove-1721vii')) {
                const row = event.target.closest('tr');
                row.remove();
            }
        });
    // FORMULIR VII
    // FORMULIR A1
        const npwppemotong_formulirA1_1721 = document.getElementById('npwppemotong_formulirA1_1721');
        const error_npwppemotong_formulirA1_1721 = document.getElementById('error_npwppemotong_formulirA1_1721');
        npwppemotong_formulirA1_1721.addEventListener('input', function() {
            const inputValue = npwppemotong_formulirA1_1721.value;
            if (inputValue.length > 15) {
                npwppemotong_formulirA1_1721.value = inputValue.slice(0, 15);
                error_npwppemotong_formulirA1_1721.textContent = 'Maksimal 15 digit';
            } else {
                error_npwppemotong_formulirA1_1721.textContent = '';
            }
        });
        const npwppenerima_formulirA1_1721 = document.getElementById('npwppenerima_formulirA1_1721');
        const error_npwppenerima_formulirA1_1721 = document.getElementById('error_npwppenerima_formulirA1_1721');
        npwppenerima_formulirA1_1721.addEventListener('input', function() {
            const inputValue = npwppenerima_formulirA1_1721.value;
            if (inputValue.length > 15) {
                npwppenerima_formulirA1_1721.value = inputValue.slice(0, 15);
                error_npwppenerima_formulirA1_1721.textContent = 'Maksimal 15 digit';
            } else {
                error_npwppenerima_formulirA1_1721.textContent = '';
            }
        });
        const npwpIdPem_formulirA1_1721 = document.getElementById('npwpIdPem_formulirA1_1721');
        const error_npwpIdPem_formulirA1_1721 = document.getElementById('error_npwpIdPem_formulirA1_1721');
        npwpIdPem_formulirA1_1721.addEventListener('input', function() {
            const inputValue = npwpIdPem_formulirA1_1721.value;
            if (inputValue.length > 15) {
                npwpIdPem_formulirA1_1721.value = inputValue.slice(0, 15);
                error_npwpIdPem_formulirA1_1721.textContent = 'Maksimal 15 digit';
            } else {
                error_npwpIdPem_formulirA1_1721.textContent = '';
            }
        });
    // FORMULIR A1
    // FORMULIR A2
    const npwpBendahara_formulirA2_1721 = document.getElementById('npwpBendahara_formulirA2_1721');
    const error_npwpBendahara_formulirA2_1721 = document.getElementById('error_npwpBendahara_formulirA2_1721');
    npwpBendahara_formulirA2_1721.addEventListener('input', function() {
        const inputValue = npwpBendahara_formulirA2_1721.value;
        if (inputValue.length > 15) {
            npwpBendahara_formulirA2_1721.value = inputValue.slice(0, 15);
            error_npwpBendahara_formulirA2_1721.textContent = 'Maksimal 15 digit';
        } else {
            error_npwpBendahara_formulirA2_1721.textContent = '';
        }
    });
    const npwpPenerima_formulirA2_1721 = document.getElementById('npwpPenerima_formulirA2_1721');
    const error_npwpPenerima_formulirA2_1721 = document.getElementById('error_npwpPenerima_formulirA2_1721');
    npwpPenerima_formulirA2_1721.addEventListener('input', function() {
        const inputValue = npwpPenerima_formulirA2_1721.value;
        if (inputValue.length > 15) {
            npwpPenerima_formulirA2_1721.value = inputValue.slice(0, 15);
            error_npwpPenerima_formulirA2_1721.textContent = 'Maksimal 15 digit';
        } else {
            error_npwpPenerima_formulirA2_1721.textContent = '';
        }
    });
    const npwpttdben_formulirA2_1721 = document.getElementById('npwpttdben_formulirA2_1721');
    const error_npwpttdben_formulirA2_1721 = document.getElementById('error_npwpttdben_formulirA2_1721');
    npwpttdben_formulirA2_1721.addEventListener('input', function() {
        const inputValue = npwpttdben_formulirA2_1721.value;
        if (inputValue.length > 15) {
            npwpttdben_formulirA2_1721.value = inputValue.slice(0, 15);
            error_npwpttdben_formulirA2_1721.textContent = 'Maksimal 15 digit';
        } else {
            error_npwpttdben_formulirA2_1721.textContent = '';
        }
    });
    // FORMULIR A2
        const bruto_1721_I = document.getElementById('jumlahbruto_1721_formulirI');
        const tht_1721_I = document.getElementById('tht_1721_formulirI');
        const pokokpajak_b = document.getElementById('pokokpajak_1721');
        const setorlebih = document.getElementById('kelebihanpenyetor_1721');
        const totalpajakb = document.getElementById('total_jumlah_pajak1721');
        const sptbetulan_b = document.getElementById('sptdibetulkan_1721');

        const resultjumlah_1721_I = document.getElementById('totaljumlah_1721_formulirI');
        const jumlahobjekb = document.getElementById('jumlah_1721');
        const kuranglebih_b = document.getElementById('kuranglebihsetor_1721');
        const pembetulan_b = document.getElementById('sptpembetulan_1721');

        const inputgaji_formulirV_1721 = document.getElementById('gaji_formulirV_1721');
        const inputbiayatransportasi_formulirV_1721 = document.getElementById('biayatransportasi_formulirV_1721');
        const inputbiayaPenyusutan_formulirV_1721 = document.getElementById('biayaPenyusutan_formulirV_1721');
        const inputbiayaSewa_formulirV_1721 = document.getElementById('biayaSewa_formulirV_1721');
        const inputbiayaBungaPinjam_formulirV_1721 = document.getElementById('biayaBungaPinjam_formulirV_1721');
        const inputbiayaSehubunganDenganJasa_formulirV_1721 = document.getElementById('biayaSehubunganDenganJasa_formulirV_1721');
        const inputbiayaPiutangTakTertagih_formulirV_1721 = document.getElementById('biayaPiutangTakTertagih_formulirV_1721');
        const inputbiayaRoyalti_formulirV_1721 = document.getElementById('biayaRoyalti_formulirV_1721');
        const inputbiayaPemasaran_formulirV_1721 = document.getElementById('biayaPemasaran_formulirV_1721');
        const inputbiayaLain_formulirV_1721 = document.getElementById('biayaLain_formulirV_1721');
        
        const resultjumlah_formulirV_1721 = document.getElementById('jumlah_formulirV_1721');
        
        const inputgaji_formulirA1_1721 = document.getElementById('gaji_formulirA1_1721');
        const inputtunjanganPph_formulirA1_1721 = document.getElementById('tunjanganPph_formulirA1_1721');
        const inputtunjanganlain_formulirA1_1721 = document.getElementById('tunjanganlain_formulirA1_1721');
        const inputhonorarium_formulirA1_1721 = document.getElementById('honorarium_formulirA1_1721');
        const inputpremiAsuransi_formulirA1_1721 = document.getElementById('premiAsuransi_formulirA1_1721');
        const inputnatura_formulirA1_1721 = document.getElementById('natura_formulirA1_1721');
        const inputtantiem_formulirA1_1721 = document.getElementById('tantiem_formulirA1_1721');
        
        const inputbiayajabatan_formulirA1_1721 = document.getElementById('biayajabatan_formulirA1_1721');
        const inputiuranPensiun_formulirA1_1721 = document.getElementById('iuranPensiun_formulirA1_1721');
        const inputjumlahPenghasilanNetoSetaun_formulirA1_1721 = document.getElementById('jumlahPenghasilanNetoSetaun_formulirA1_1721');
        const inputiuranptkp_formulirA1_1721 = document.getElementById('ptkp_formulirA1_1721');
        const inputgajiPokok_formulirA2_1721 = document.getElementById('gajiPokok_formulirA2_1721');
        const inputtunjanganIsteri_formulirA2_1721 = document.getElementById('tunjanganIsteri_formulirA2_1721');
        const inputtunjanganAnak_formulirA2_1721 = document.getElementById('tunjanganAnak_formulirA2_1721');
        
        const inputtunjanganPerbaikan_formulirA2_1721 = document.getElementById('tunjanganPerbaikan_formulirA2_1721');
        const inputtunjanganStruktural_formulirA2_1721 = document.getElementById('tunjanganStruktural_formulirA2_1721');
        const inputtunjanganBeras_formulirA2_1721 = document.getElementById('tunjanganBeras_formulirA2_1721');
        const inputtunjanganKhusus_formulirA2_1721 = document.getElementById('tunjanganKhusus_formulirA2_1721');
        const inputtunjanganLain_formulirA2_1721 = document.getElementById('tunjanganLain_formulirA2_1721');
        const inputpenghasilanTetap_formulirA2_1721 = document.getElementById('penghasilanTetap_formulirA2_1721');
        const inputbiayaJabatan_formulirA2_1721 = document.getElementById('biayaJabatan_formulirA2_1721');
        const inputiuranPensi_formulirA2_1721 = document.getElementById('iuranPensi_formulirA2_1721');
        const inputjumlahPenghasilanPenghitungan_formulirA2_1721 = document.getElementById('jumlahPenghasilanPenghitungan_formulirA2_1721');
        const inputptkp_formulirA2_1721 = document.getElementById('ptkp_formulirA2_1721');
        
        const resultjumlahbruto_formulirA1_1721 = document.getElementById('jumlahbruto_formulirA1_1721');
        const resultjumlahpengurangan_formulirA1_1721 = document.getElementById('jumlahpengurangan_formulirA1_1721');
        const resultjumlahPenghasilanNeto_formulirA1_1721 = document.getElementById('jumlahPenghasilanNeto_formulirA1_1721');
        const resultpkp_formulirA1_1721 = document.getElementById('pkp_formulirA1_1721');
        const resultkeluarga_formulirA2_1721 = document.getElementById('keluarga_formulirA2_1721');
        const resultpenghasilanBruto_formulirA2_1721 = document.getElementById('penghasilanBruto_formulirA2_1721');
        const resultjumlahPengurangan_formulirA2_1721 = document.getElementById('jumlahPengurangan_formulirA2_1721');
        const resultjumlahPenghasilan_formulirA2_1721 = document.getElementById('jumlahPenghasilan_formulirA2_1721');
        const resultpkp_formulirA2_1721 = document.getElementById('pkp_formulirA2_1721');

        [inputptkp_formulirA2_1721,inputjumlahPenghasilanPenghitungan_formulirA2_1721,inputiuranPensi_formulirA2_1721,inputbiayaJabatan_formulirA2_1721,inputpenghasilanTetap_formulirA2_1721,inputtunjanganLain_formulirA2_1721,inputtunjanganKhusus_formulirA2_1721,inputtunjanganBeras_formulirA2_1721,inputtunjanganStruktural_formulirA2_1721,inputtunjanganPerbaikan_formulirA2_1721,inputtunjanganAnak_formulirA2_1721,inputtunjanganIsteri_formulirA2_1721,inputgajiPokok_formulirA2_1721,inputiuranptkp_formulirA1_1721,inputjumlahPenghasilanNetoSetaun_formulirA1_1721,inputiuranPensiun_formulirA1_1721,inputbiayajabatan_formulirA1_1721,inputtantiem_formulirA1_1721,inputnatura_formulirA1_1721,inputpremiAsuransi_formulirA1_1721,inputhonorarium_formulirA1_1721,inputtunjanganlain_formulirA1_1721,inputtunjanganPph_formulirA1_1721,inputgaji_formulirA1_1721,inputbiayaLain_formulirV_1721,inputbiayaPemasaran_formulirV_1721,inputbiayaRoyalti_formulirV_1721,inputbiayaPiutangTakTertagih_formulirV_1721,inputbiayaSehubunganDenganJasa_formulirV_1721,inputbiayaBungaPinjam_formulirV_1721,inputbiayaSewa_formulirV_1721,inputbiayaPenyusutan_formulirV_1721,inputgaji_formulirV_1721,inputbiayatransportasi_formulirV_1721,bruto_1721_I,tht_1721_I,resultjumlah_1721_I,pokokpajak_b,setorlebih,totalpajakb
        ,sptbetulan_b]
            .forEach(input => {
                input.addEventListener('input', updateformuliri);
            });
        function updateformuliri() {
            const jumlahbruto_1721_i = parseFloat(bruto_1721_I.value) || 0;
            const tht_1721_i = parseFloat(tht_1721_I.value) || 0;
            resultjumlah_1721_I.value=jumlahbruto_1721_i+tht_1721_i;
            
            const lebih = parseFloat(setorlebih.value) || 0;
            const pajakpokokb = parseFloat(pokokpajak_b.value) || 0;
            const jumlahobjek_b = lebih+pajakpokokb;
            jumlahobjekb.value=jumlahobjek_b;
            
            const totpajakb = parseFloat(totalpajakb.value) || 0;
            const kurang = totpajakb-jumlahobjek_b;
            if(kurang<0){
                kuranglebih_b.value=0;
            }else{
                kuranglebih_b.value=kurang;
            }
            const betulan_b = parseFloat(sptbetulan_b.value) || 0;
            const pembetul_b = kurang-betulan_b;
            if(pembetul_b<0){
                pembetulan_b.value=0;
            }else{
                pembetulan_b.value=pembetul_b;
            }
            const gajiFormulirV_1721 = parseFloat(inputgaji_formulirV_1721.value) || 0;
            const transportasiFormulirV_1721 = parseFloat(inputbiayatransportasi_formulirV_1721.value) || 0;
            const penyusutanFormulirV_1721 = parseFloat(inputbiayaPenyusutan_formulirV_1721.value) || 0;
            const sewaFormulirV_1721 = parseFloat(inputbiayaSewa_formulirV_1721.value) || 0;
            const bungaFormulirV_1721 = parseFloat(inputbiayaBungaPinjam_formulirV_1721.value) || 0;
            const jasaFormulirV_1721 = parseFloat(inputbiayaSehubunganDenganJasa_formulirV_1721.value) || 0;
            const piutangFormulirV_1721 = parseFloat(inputbiayaPiutangTakTertagih_formulirV_1721.value) || 0;
            const royaltiFormulirV_1721 = parseFloat(inputbiayaRoyalti_formulirV_1721.value) || 0;
            const pemasaranFormulirV_1721 = parseFloat(inputbiayaPemasaran_formulirV_1721.value) || 0;
            const biayalainFormulirV_1721 = parseFloat(inputbiayaLain_formulirV_1721.value) || 0;
            resultjumlah_formulirV_1721.value=gajiFormulirV_1721+transportasiFormulirV_1721+penyusutanFormulirV_1721+sewaFormulirV_1721+bungaFormulirV_1721+jasaFormulirV_1721+piutangFormulirV_1721+royaltiFormulirV_1721+pemasaranFormulirV_1721+biayalainFormulirV_1721;
            
            const formulirA1Gaji = parseFloat(inputgaji_formulirA1_1721.value) || 0;
            const formulirA1tunjanganpph = parseFloat(inputtunjanganPph_formulirA1_1721.value) || 0;
            const formulirA1tunlain= parseFloat(inputtunjanganlain_formulirA1_1721.value) || 0;
            const formulirA1honorarium= parseFloat(inputhonorarium_formulirA1_1721.value) || 0;
            const formulirA1premiasuransi= parseFloat(inputpremiAsuransi_formulirA1_1721.value) || 0;
            const formulirA1natura= parseFloat(inputnatura_formulirA1_1721.value) || 0;
            const formulirA1tantiem= parseFloat(inputtantiem_formulirA1_1721.value) || 0;
            const brutoA1= formulirA1Gaji+formulirA1tunjanganpph+formulirA1tunlain+formulirA1honorarium+formulirA1premiasuransi+formulirA1natura+formulirA1tantiem;
            resultjumlahbruto_formulirA1_1721.value=brutoA1;
            
            const formulirA1biayajabatan= parseFloat(inputbiayajabatan_formulirA1_1721.value) || 0;
            const formulirA1iuran= parseFloat(inputiuranPensiun_formulirA1_1721.value) || 0;
            const jumlahformulirA1iuran= formulirA1biayajabatan+formulirA1iuran;
            resultjumlahpengurangan_formulirA1_1721.value=jumlahformulirA1iuran;
            
            const jumlahPenghasilanNettoA1= brutoA1-jumlahformulirA1iuran;
            if(jumlahPenghasilanNettoA1<0){
                resultjumlahPenghasilanNeto_formulirA1_1721.value=0;
            }else{
                resultjumlahPenghasilanNeto_formulirA1_1721.value=jumlahPenghasilanNettoA1;
            }
            const formulirA1penghasilannetto= parseFloat(inputjumlahPenghasilanNetoSetaun_formulirA1_1721.value) || 0;
            const formulirA1ptkp= parseFloat(inputiuranptkp_formulirA1_1721.value) || 0;
            const jumlahpkpA1= formulirA1penghasilannetto-formulirA1ptkp;
            if(jumlahpkpA1<0){
                resultpkp_formulirA1_1721.value=0;
            }else{
                resultpkp_formulirA1_1721.value=jumlahpkpA1;
            }
            const formulirA2gapok= parseFloat(inputgajiPokok_formulirA2_1721.value) || 0;
            const formulirA2tunjangan= parseFloat(inputtunjanganIsteri_formulirA2_1721.value) || 0;
            const formulirA2tunjangananak= parseFloat(inputtunjanganAnak_formulirA2_1721.value) || 0;
            const jumlahgaji = formulirA2gapok+formulirA2tunjangan+formulirA2tunjangananak;
            resultkeluarga_formulirA2_1721.value=jumlahgaji;

            const formulirA2tunper= parseFloat(inputtunjanganPerbaikan_formulirA2_1721.value) || 0;
            const formulirA2tunstruk= parseFloat(inputtunjanganStruktural_formulirA2_1721.value) || 0;
            const formulirA2tunberas= parseFloat(inputtunjanganBeras_formulirA2_1721.value) || 0;
            const formulirA2tunkhus= parseFloat(inputtunjanganKhusus_formulirA2_1721.value) || 0;
            const formulirA2tunlain= parseFloat(inputtunjanganLain_formulirA2_1721.value) || 0;
            const formulirA2pengtep= parseFloat(inputpenghasilanTetap_formulirA2_1721.value) || 0;
            const jumbruto = jumlahgaji+formulirA2tunper+formulirA2tunstruk+formulirA2tunberas+formulirA2tunkhus+formulirA2tunlain+formulirA2pengtep;
            resultpenghasilanBruto_formulirA2_1721.value=jumbruto;
            
            const formulirA2biayajab= parseFloat(inputbiayaJabatan_formulirA2_1721.value) || 0;
            const formulirA2iuranpens= parseFloat(inputiuranPensi_formulirA2_1721.value) || 0;
            const jumpeng = formulirA2biayajab+formulirA2iuranpens;
            resultjumlahPengurangan_formulirA2_1721.value=jumpeng;
            const jumpengnetto = jumbruto-jumpeng
            if(jumpengnetto<0){
                resultjumlahPenghasilan_formulirA2_1721.value=0;
            }else{
                resultjumlahPenghasilan_formulirA2_1721.value=jumpengnetto;
            }
            const formulirA2jumpeng= parseFloat(inputjumlahPenghasilanPenghitungan_formulirA2_1721.value) || 0;
            const formulirA2ptkp= parseFloat(inputptkp_formulirA2_1721.value) || 0;
            const pkp =formulirA2jumpeng-formulirA2ptkp;
            if(pkp<0){
                resultpkp_formulirA2_1721.value=0;
            }else{
                resultpkp_formulirA2_1721.value=pkp;
            }
        }
    // sptmasapajak
});
function sprator(x) {
    //remove commas
    retVal = x ? parseFloat(x.replace(/,/g, '')) : 0;
    // console.log(retVal);
    const pokokpajak_1721 = $('#pokokpajak_1721').val();
    const kelebihanpenyetor_1721 = $('#kelebihanpenyetor_1721').val();
    const resultjumlah_1721 = document.getElementById('jumlah_1721');
    
    retValpokokpajak_1721 =pokokpajak_1721 ? parseFloat(pokokpajak_1721.replace(/,/g, '')) : 0;
    retValkelebihanpenyetor_1721 =kelebihanpenyetor_1721 ? parseFloat(kelebihanpenyetor_1721.replace(/,/g, '')) : 0;
    const hasilpokokpajak =retValpokokpajak_1721+retValkelebihanpenyetor_1721;
    resultjumlah_1721.value = hasilpokokpajak.toLocaleString();

    const total_jumlah_pajak1721 = $('#total_jumlah_pajak1721').val();
    retValtotal_jumlah_pajak1721=total_jumlah_pajak1721 ? parseFloat(total_jumlah_pajak1721.replace(/,/g, '')) : 0;
    const resultkuranglebihsetor_1721 = document.getElementById('kuranglebihsetor_1721');
    
    const hasilsetor =retValtotal_jumlah_pajak1721-hasilpokokpajak;
    if(hasilsetor<0){
        resultkuranglebihsetor_1721.value =0;
    }else{
        resultkuranglebihsetor_1721.value = hasilsetor.toLocaleString();
    }
    
    const sptdibetulkan_1721 = $('#sptdibetulkan_1721').val();
    retValsptdibetulkan_1721 =sptdibetulkan_1721 ? parseFloat(sptdibetulkan_1721.replace(/,/g, '')) : 0;
    const hasilpembetulan =hasilsetor-retValsptdibetulkan_1721;
    
    const resultsptpembetulan_1721 = document.getElementById('sptpembetulan_1721');
    if(hasilpembetulan<0){
        resultsptpembetulan_1721.value =0;
    }else{
        resultsptpembetulan_1721.value = hasilpembetulan.toLocaleString();
    }

    const jumlahbruto_1721_formulirI = $('#jumlahbruto_1721_formulirI').val();
    const tht_1721_formulirI = $('#tht_1721_formulirI').val();
    retValjumlahbruto_1721_formulirI =jumlahbruto_1721_formulirI ? parseFloat(jumlahbruto_1721_formulirI.replace(/,/g, '')) : 0;
    retValtht_1721_formulirI =tht_1721_formulirI ? parseFloat(tht_1721_formulirI.replace(/,/g, '')) : 0;
    const totaljumlah1721_i =retValjumlahbruto_1721_formulirI+retValtht_1721_formulirI;
    const resulttotaljumlah_1721_formulirI = document.getElementById('totaljumlah_1721_formulirI');
    resulttotaljumlah_1721_formulirI.value = totaljumlah1721_i.toLocaleString();

    const jumlahgaji_formulirV_1721= $('#gaji_formulirV_1721').val();
    const biayatransportasi_formulirV_1721 = $('#biayatransportasi_formulirV_1721').val();
    const biayaPenyusutan_formulirV_1721 = $('#biayaPenyusutan_formulirV_1721').val();
    const biayaSewa_formulirV_1721 = $('#biayaSewa_formulirV_1721').val();
    const biayaBungaPinjam_formulirV_1721 = $('#biayaBungaPinjam_formulirV_1721').val();
    const biayaSehubunganDenganJasa_formulirV_1721 = $('#biayaSehubunganDenganJasa_formulirV_1721').val();
    const biayaPiutangTakTertagih_formulirV_1721 = $('#biayaPiutangTakTertagih_formulirV_1721').val();
    const biayaRoyalti_formulirV_1721 = $('#biayaRoyalti_formulirV_1721').val();
    const biayaPemasaran_formulirV_1721 = $('#biayaPemasaran_formulirV_1721').val();
    const biayaLain_formulirV_1721 = $('#biayaLain_formulirV_1721').val();

    retValjumlahgaji_formulirV_1721 =jumlahgaji_formulirV_1721 ? parseFloat(jumlahgaji_formulirV_1721.replace(/,/g, '')) : 0;
    retValbiayatransportasi_formulirV_1721 =biayatransportasi_formulirV_1721 ? parseFloat(biayatransportasi_formulirV_1721.replace(/,/g, '')) : 0;
    retValbiayaPenyusutan_formulirV_1721 =biayaPenyusutan_formulirV_1721 ? parseFloat(biayaPenyusutan_formulirV_1721.replace(/,/g, '')) : 0;
    retValbiayaSewa_formulirV_1721 =biayaSewa_formulirV_1721 ? parseFloat(biayaSewa_formulirV_1721.replace(/,/g, '')) : 0;
    retValbiayaBungaPinjam_formulirV_1721 =biayaBungaPinjam_formulirV_1721 ? parseFloat(biayaBungaPinjam_formulirV_1721.replace(/,/g, '')) : 0;
    retValbiayaSehubunganDenganJasa_formulirV_1721 =biayaSehubunganDenganJasa_formulirV_1721 ? parseFloat(biayaSehubunganDenganJasa_formulirV_1721.replace(/,/g, '')) : 0;
    retValbiayaPiutangTakTertagih_formulirV_1721 =biayaPiutangTakTertagih_formulirV_1721 ? parseFloat(biayaPiutangTakTertagih_formulirV_1721.replace(/,/g, '')) : 0;
    retValbiayaRoyalti_formulirV_1721 =biayaRoyalti_formulirV_1721 ? parseFloat(biayaRoyalti_formulirV_1721.replace(/,/g, '')) : 0;
    retValbiayaPemasaran_formulirV_1721 =biayaPemasaran_formulirV_1721 ? parseFloat(biayaPemasaran_formulirV_1721.replace(/,/g, '')) : 0;
    retValbiayaLain_formulirV_1721 =biayaLain_formulirV_1721 ? parseFloat(biayaLain_formulirV_1721.replace(/,/g, '')) : 0;
    const totalbiaya = retValjumlahgaji_formulirV_1721+retValbiayatransportasi_formulirV_1721+retValbiayaPenyusutan_formulirV_1721+retValbiayaSewa_formulirV_1721+retValbiayaBungaPinjam_formulirV_1721+retValbiayaSehubunganDenganJasa_formulirV_1721+retValbiayaPiutangTakTertagih_formulirV_1721+retValbiayaRoyalti_formulirV_1721+retValbiayaPemasaran_formulirV_1721+retValbiayaLain_formulirV_1721;
    const resultjumlah_formulirV_1721 = document.getElementById('jumlah_formulirV_1721');
    resultjumlah_formulirV_1721.value = totalbiaya.toLocaleString();
    
    const gaji_formulirA1_1721 = $('#gaji_formulirA1_1721').val();
    const tunjanganPph_formulirA1_1721 = $('#tunjanganPph_formulirA1_1721').val();
    const tunjanganlain_formulirA1_1721 = $('#tunjanganlain_formulirA1_1721').val();
    const honorarium_formulirA1_1721 = $('#honorarium_formulirA1_1721').val();
    const premiAsuransi_formulirA1_1721 = $('#premiAsuransi_formulirA1_1721').val();
    const natura_formulirA1_1721 = $('#natura_formulirA1_1721').val();
    const tantiem_formulirA1_1721 = $('#tantiem_formulirA1_1721').val();
    retValgaji_formulirA1_1721 =gaji_formulirA1_1721 ? parseFloat(gaji_formulirA1_1721.replace(/,/g, '')) : 0;
    retValtunjanganPph_formulirA1_1721 =tunjanganPph_formulirA1_1721 ? parseFloat(tunjanganPph_formulirA1_1721.replace(/,/g, '')) : 0;
    retValtunjanganlain_formulirA1_1721 =tunjanganlain_formulirA1_1721 ? parseFloat(tunjanganlain_formulirA1_1721.replace(/,/g, '')) : 0;
    retValhonorarium_formulirA1_1721 =honorarium_formulirA1_1721 ? parseFloat(honorarium_formulirA1_1721.replace(/,/g, '')) : 0;
    retValpremiAsuransi_formulirA1_1721 =premiAsuransi_formulirA1_1721 ? parseFloat(premiAsuransi_formulirA1_1721.replace(/,/g, '')) : 0;
    retValnatura_formulirA1_1721 =natura_formulirA1_1721 ? parseFloat(natura_formulirA1_1721.replace(/,/g, '')) : 0;
    retValtantiem_formulirA1_1721 =tantiem_formulirA1_1721 ? parseFloat(tantiem_formulirA1_1721.replace(/,/g, '')) : 0;
    const totalpemotongan= retValgaji_formulirA1_1721+retValtunjanganPph_formulirA1_1721+retValtunjanganlain_formulirA1_1721+retValhonorarium_formulirA1_1721+retValpremiAsuransi_formulirA1_1721+retValnatura_formulirA1_1721+retValtantiem_formulirA1_1721;
    
    const resultjumlahbruto_formulirA1_1721 = document.getElementById('jumlahbruto_formulirA1_1721');
    resultjumlahbruto_formulirA1_1721.value = totalpemotongan.toLocaleString();

    const biayajabatan_formulirA1_1721 = $('#biayajabatan_formulirA1_1721').val();
    const iuranPensiun_formulirA1_1721 = $('#iuranPensiun_formulirA1_1721').val();
    retValbiayajabatan_formulirA1_1721 =biayajabatan_formulirA1_1721 ? parseFloat(biayajabatan_formulirA1_1721.replace(/,/g, '')) : 0;
    retValiuranPensiun_formulirA1_1721 =iuranPensiun_formulirA1_1721 ? parseFloat(iuranPensiun_formulirA1_1721.replace(/,/g, '')) : 0;
    const totalpengurangan =retValbiayajabatan_formulirA1_1721+retValiuranPensiun_formulirA1_1721;

    const resultjumlahpengurangan_formulirA1_1721 = document.getElementById('jumlahpengurangan_formulirA1_1721');
    resultjumlahpengurangan_formulirA1_1721.value = totalpengurangan.toLocaleString();
    
    const jumlahpengnetto= totalpemotongan-totalpengurangan;
    const jumlahPenghasilanNeto_formulirA1_1721 = document.getElementById('jumlahPenghasilanNeto_formulirA1_1721');
    
    if(jumlahpengnetto<0){
        jumlahPenghasilanNeto_formulirA1_1721.value = 0;
    }else{
        jumlahPenghasilanNeto_formulirA1_1721.value = jumlahpengnetto.toLocaleString();
    }
    
    const jumlahPenghasilanNetoSetaun_formulirA1_1721 = $('#jumlahPenghasilanNetoSetaun_formulirA1_1721').val();
    const ptkp_formulirA1_1721 = $('#ptkp_formulirA1_1721').val();
    retValjumlahPenghasilanNetoSetaun_formulirA1_1721 =jumlahPenghasilanNetoSetaun_formulirA1_1721 ? parseFloat(jumlahPenghasilanNetoSetaun_formulirA1_1721.replace(/,/g, '')) : 0;
    retValptkp_formulirA1_1721 =ptkp_formulirA1_1721 ? parseFloat(ptkp_formulirA1_1721.replace(/,/g, '')) : 0;

    const jumlahkenapajak = retValjumlahPenghasilanNetoSetaun_formulirA1_1721-retValptkp_formulirA1_1721;
    const resultpkp_formulirA1_1721 = document.getElementById('pkp_formulirA1_1721');
    if(jumlahkenapajak<0){
        resultpkp_formulirA1_1721.value = 0;
    }else{
        resultpkp_formulirA1_1721.value = jumlahkenapajak.toLocaleString();
    }

    const gajiPokok_formulirA2_1721 = $('#gajiPokok_formulirA2_1721').val();
    const tunjanganIsteri_formulirA2_1721 = $('#tunjanganIsteri_formulirA2_1721').val();
    const tunjanganAnak_formulirA2_1721 = $('#tunjanganAnak_formulirA2_1721').val();
    retValgajiPokok_formulirA2_1721 =gajiPokok_formulirA2_1721 ? parseFloat(gajiPokok_formulirA2_1721.replace(/,/g, '')) : 0;
    retValtunjanganIsteri_formulirA2_1721 =tunjanganIsteri_formulirA2_1721 ? parseFloat(tunjanganIsteri_formulirA2_1721.replace(/,/g, '')) : 0;
    retValtunjanganAnak_formulirA2_1721 =tunjanganAnak_formulirA2_1721 ? parseFloat(tunjanganAnak_formulirA2_1721.replace(/,/g, '')) : 0;
    const jumlahgaji = retValgajiPokok_formulirA2_1721+retValtunjanganIsteri_formulirA2_1721+retValtunjanganAnak_formulirA2_1721;

    const resultkeluarga_formulirA2_1721 = document.getElementById('keluarga_formulirA2_1721');
    resultkeluarga_formulirA2_1721.value = jumlahgaji.toLocaleString();

    const tunjanganPerbaikan_formulirA2_1721 = $('#tunjanganPerbaikan_formulirA2_1721').val();
    const tunjanganStruktural_formulirA2_1721 = $('#tunjanganStruktural_formulirA2_1721').val();
    const tunjanganBeras_formulirA2_1721 = $('#tunjanganBeras_formulirA2_1721').val();
    const tunjanganKhusus_formulirA2_1721 = $('#tunjanganKhusus_formulirA2_1721').val();
    const tunjanganLain_formulirA2_1721 = $('#tunjanganLain_formulirA2_1721').val();
    const penghasilanTetap_formulirA2_1721 = $('#penghasilanTetap_formulirA2_1721').val();
    retValtunjanganPerbaikan_formulirA2_1721 =tunjanganPerbaikan_formulirA2_1721 ? parseFloat(tunjanganPerbaikan_formulirA2_1721.replace(/,/g, '')) : 0;
    retValtunjanganStruktural_formulirA2_1721 =tunjanganStruktural_formulirA2_1721 ? parseFloat(tunjanganStruktural_formulirA2_1721.replace(/,/g, '')) : 0;
    retValtunjanganBeras_formulirA2_1721 =tunjanganBeras_formulirA2_1721 ? parseFloat(tunjanganBeras_formulirA2_1721.replace(/,/g, '')) : 0;
    retValtunjanganKhusus_formulirA2_1721 =tunjanganKhusus_formulirA2_1721 ? parseFloat(tunjanganKhusus_formulirA2_1721.replace(/,/g, '')) : 0;
    retValtunjanganLain_formulirA2_1721 =tunjanganLain_formulirA2_1721 ? parseFloat(tunjanganLain_formulirA2_1721.replace(/,/g, '')) : 0;
    retValpenghasilanTetap_formulirA2_1721 =penghasilanTetap_formulirA2_1721 ? parseFloat(penghasilanTetap_formulirA2_1721.replace(/,/g, '')) : 0;
    const jumlahpengbruto = jumlahgaji+retValtunjanganPerbaikan_formulirA2_1721+retValtunjanganStruktural_formulirA2_1721+retValtunjanganBeras_formulirA2_1721+retValtunjanganKhusus_formulirA2_1721+retValtunjanganLain_formulirA2_1721+retValpenghasilanTetap_formulirA2_1721;
    const penghasilanBruto_formulirA2_1721 = document.getElementById('penghasilanBruto_formulirA2_1721');
    penghasilanBruto_formulirA2_1721.value = jumlahpengbruto.toLocaleString();


    const biayaJabatan_formulirA2_1721 = $('#biayaJabatan_formulirA2_1721').val();
    const iuranPensi_formulirA2_1721 = $('#iuranPensi_formulirA2_1721').val();
    retValbiayaJabatan_formulirA2_1721 =biayaJabatan_formulirA2_1721 ? parseFloat(biayaJabatan_formulirA2_1721.replace(/,/g, '')) : 0;
    retValiuranPensi_formulirA2_1721 =iuranPensi_formulirA2_1721 ? parseFloat(iuranPensi_formulirA2_1721.replace(/,/g, '')) : 0;
    const jumlahpengurangan = retValbiayaJabatan_formulirA2_1721+retValiuranPensi_formulirA2_1721;
    const resultjumlahPengurangan_formulirA2_1721 = document.getElementById('jumlahPengurangan_formulirA2_1721');
    resultjumlahPengurangan_formulirA2_1721.value = jumlahpengurangan.toLocaleString();
    
    const jumlahpengnettoa2 = jumlahpengbruto-jumlahpengurangan;
    const resultjumlahPenghasilan_formulirA2_1721 = document.getElementById('jumlahPenghasilan_formulirA2_1721');
    if(jumlahpengnettoa2<0){
        resultjumlahPenghasilan_formulirA2_1721.value =0;
    }else{
        resultjumlahPenghasilan_formulirA2_1721.value = jumlahpengnettoa2.toLocaleString();
    }
    
    const jumlahPenghasilanPenghitungan_formulirA2_1721 = $('#jumlahPenghasilanPenghitungan_formulirA2_1721').val();
    const ptkp_formulirA2_1721 = $('#ptkp_formulirA2_1721').val();
    retValjumlahPenghasilanPenghitungan_formulirA2_1721 =jumlahPenghasilanPenghitungan_formulirA2_1721 ? parseFloat(jumlahPenghasilanPenghitungan_formulirA2_1721.replace(/,/g, '')) : 0;
    retValptkp_formulirA2_1721 =ptkp_formulirA2_1721 ? parseFloat(ptkp_formulirA2_1721.replace(/,/g, '')) : 0;
    const jumlahpengkenapajak = retValjumlahPenghasilanPenghitungan_formulirA2_1721-retValptkp_formulirA2_1721;
    const resultpkp_formulirA2_1721 = document.getElementById('pkp_formulirA2_1721');
    if(jumlahpengkenapajak<0){
        resultpkp_formulirA2_1721.value = 0;
    }else{
        resultpkp_formulirA2_1721.value = jumlahpengkenapajak.toLocaleString();
    }
    return retVal.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

    
