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
                    <input required autocomplete="off" type="text"
                        name="objek_penerima[]" id="objek_penerima[]"
                        class="form-control" />
                </td>
                <td class="text-center">
                    <input required autocomplete="off" type="number"
                        name="objek_kodeobjek[]"
                        id="objek_kodeobjek[]" class="form-control" />
                </td>
                <td class="text-center">
                    <input required autocomplete="off" type="number"
                        name="objek_jumlahpenerima[]"
                        id="objek_jumlahpenerima[]" min="0"
                        class="form-control penerima1771" />
                </td>
                <td class="text-center">
                    <input required autocomplete="off" type="number"
                        name="objek_jumlahpenghasilan[]"
                        id="objek_jumlahpenghasilan[]" min="0"
                        class="form-control penghasilan1771" />
                </td>
                <td class="text-center">
                    <input required autocomplete="off" type="number"
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
                    totalpenerima += +$(this).val();
                });
                $(".penghasilan1771").each(function() {
                    totalbruto += +$(this).val();
                });
                $(".pajak1771").each(function() {
                    totalpajakpotong += +$(this).val();
                });
            
                $('.totalpenerima1771').val(totalpenerima);
                $('.totalbruto1771').val(totalbruto);
                $('.totalpajak1771').val(totalpajakpotong);
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
                    <input required autocomplete="off" type="text"
                        name="objek_penerima_c[]"
                        id="objek_penerima_c[]"
                        class="form-control" />
                </td>
                <td class="text-center">
                    <input required autocomplete="off" type="number"
                        name="objek_kodeobjek_c[]"
                        id="objek_kodeobjek_c[]"
                        class="form-control" />
                </td>
                <td class="text-center">
                    <input required autocomplete="off" type="number"
                        name="objek_jumlahpenerima_c[]"
                        id="objek_jumlahpenerima_c[]" min="0"
                        class="form-control penerima_c" />
                </td>
                <td class="text-center">
                    <input required autocomplete="off" type="number"
                        name="objek_jumlahpenghasilan_c[]"
                        id="objek_jumlahpenghasilan_c[]"
                        min="0" class="form-control penghasilan_c" />
                </td>
                <td class="text-center">
                    <input required autocomplete="off" type="number"
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
                    totalpenerima += +$(this).val();
                });
                $(".penghasilan_c").each(function() {
                    totalbruto += +$(this).val();
                });
                $(".pajak_c").each(function() {
                    totalpajakpotong += +$(this).val();
                });
            
                $('.totalpenerima_c').val(totalpenerima);
                $('.totalbruto_c').val(totalbruto);
                $('.totalpajak_c').val(totalpajakpotong);
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
                    <input required autocomplete="off" type="number"
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
                    <input required autocomplete="off" type="number" min="0"
                        name="pgt_jumlahpenghasilanbruto_1721[]" id="pgt_jumlahpenghasilanbruto_1721[]"
                        class="form-control bruto" />
                </td>
                <td width="auto" class="text-center">
                    <input required autocomplete="off" type="number" min="0"
                        name="pgt_pphdipotong_1721[]" id="pgt_pphdipotong_1721[]"
                        class="form-control pph" />
                </td>
                <td width="auto" class="text-center">
                    <input required autocomplete="off" type="number" min="0"
                        name="pgt_masaperolehan_1721[]" id="pgt_masaperolehan_1721[]"
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
                    totalbruto += +$(this).val();
                });
                $(".pph").each(function() {
                    totalpph += +$(this).val();
                });
             
                $('.totalbruto').val(totalbruto);
                $('.totalpph').val(totalpph);
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
                    <input required autocomplete="off" type="number"
                        name="pgt_npwp_1721_formulirII[]" id="pgt_npwp_1721_formulirII[]" min="0"
                        class="form-control" />
                </td>
                <td width="auto" class="text-center">
                    <input required autocomplete="off" type="text"
                        name="pgt_namapegawai_1721_formulirII[]" id="pgt_namapegawai_1721_formulirII[]"
                        class="form-control" />
                </td>
                <td width="auto" class="text-center">
                    <input required autocomplete="off" type="number"
                        name="pgt_nomor_1721_formulirII[]" id="pgt_nomor_1721_formulirII[]" min="0"
                        class="form-control" />
                </td>
                <td width="auto" class="text-center">
                    <input required autocomplete="off" type="date"
                        name="pgt_tglbukti_1721_formulirII[]" id="pgt_tglbukti_1721_formulirII[]"
                        class="form-control" />
                </td>
                <td width="auto" class="text-center">
                    <input required autocomplete="off" type="number"
                        name="pgt_kodeobjek_1721_formulirII[]" id="pgt_kodeobjek_1721_formulirII[]" min="0"
                        class="form-control" />
                </td>
                <td width="auto" class="text-center">
                    <input required autocomplete="off" type="number" min="0"
                        name="pgt_jumlahpenghasilanbruto_1721_formulirII[]" id="pgt_jumlahpenghasilanbruto_1721_formulirII[]"
                        class="form-control penghasilanbruto" />
                </td>
                <td width="auto" class="text-center">
                    <input required autocomplete="off" type="number" min="0"
                        name="pgt_pphdipotong_1721_formulirII[]" id="pgt_pphdipotong_1721_formulirII[]"
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
                    totalbruto += +$(this).val();
                });
                $(".potonganpph").each(function() {
                    totalpph += +$(this).val();
                });
             
                $('.jumlahbruto1721II').val(totalbruto);
                $('.jumlahpotonganpph1721II').val(totalpph);
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
                    <input required autocomplete="off" type="number"
                        name="pgt_npwp_1721_formulirIII[]" id="pgt_npwp_1721_formulirIII[]" min="0"
                        class="form-control" />
                </td>
                <td width="auto" class="text-center">
                    <input required autocomplete="off" type="text"
                        name="pgt_namapegawai_1721_formulirIII[]" id="pgt_namapegawai_1721_formulirIII[]"
                        class="form-control" />
                </td>
                <td width="auto" class="text-center">
                    <input required autocomplete="off" type="number"
                        name="pgt_nomor_1721_formulirIII[]" id="pgt_nomor_1721_formulirIII[]" min="0"
                        class="form-control" />
                </td>
                <td width="auto" class="text-center">
                    <input required autocomplete="off" type="date"
                        name="pgt_tglbukti_1721_formulirIII[]" id="pgt_tglbukti_1721_formulirIII[]"
                        class="form-control" />
                </td>
                <td width="auto" class="text-center">
                    <input required autocomplete="off" type="number"
                        name="pgt_kodeobjek_1721_formulirIII[]" id="pgt_kodeobjek_1721_formulirIII[]" min="0"
                        class="form-control" />
                </td>
                <td width="auto" class="text-center">
                    <input required autocomplete="off" type="number" min="0"
                        name="pgt_jumlahpenghasilanbruto_1721_formulirIII[]" id="pgt_jumlahpenghasilanbruto_1721_formulirIII[]"
                        class="form-control penghasilanbruto1721iii" />
                </td>
                <td width="auto" class="text-center">
                    <input required autocomplete="off" type="number" min="0"
                        name="pgt_pphdipotong_1721_formulirIII[]" id="pgt_pphdipotong_1721_formulirIII[]"
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
                    totalbruto += +$(this).val();
                });
                $(".potonganpph1721iii").each(function() {
                    totalpph += +$(this).val();
                });
             
                $('.jumlahbruto1721III').val(totalbruto);
                $('.jumlahpotonganpph1721III').val(totalpph);
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
                    <input required autocomplete="off" type="number"
                        name="ssp_pphIV[]" id="ssp_pphIV[]" min="0"
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
                    totalpph += +$(this).val();
                });
             
                $('.totalpph').val(totalpph);
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
                        type="number" name="pph_JPBVI[]"
                        id="pph_JPBVI[]"
                        class="form-control" />
                </td>
                <td class="text-center">
                    <input min="0" required autocomplete="off"
                        type="number" name="pph_DPPVI[]"
                        id="pph_DPPVI[]"
                        class="form-control" />
                </td>
                <td class="text-center">
                    <input min="0" required autocomplete="off"
                        type="number" name="pph_TLTVI[]"
                        id="pph_TLTVI[]"
                        class="form-control" />
                </td>
                <td class="text-center">
                    <input min="0" required autocomplete="off"
                        type="number" name="pph_tarifVI[]"
                        id="pph_tarifVI[]"
                        class="form-control" />
                </td>
                <td class="text-center">
                    <input min="0" required autocomplete="off"
                        type="number" name="pph_potongVI[]"
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
                        type="number" name="pph_jpb_formulir_Vii[]"
                        id="pph_jpb_formulir_Vii[]"
                        class="form-control" />
                </td>
                <td class="text-center">
                    <input min="0" required autocomplete="off"
                        type="number" name="pph_tp_formulir_Vii[]"
                        id="pph_tp_formulir_Vii[]"
                        class="form-control" />
                </td>
                <td class="text-center">
                    <input min="0" required autocomplete="off"
                        type="number" name="pph_pph_formulir_Vii[]"
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


    
