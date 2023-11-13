document.addEventListener('DOMContentLoaded', function() {
    // 1111
    // const npwp_1111 = document.getElementById('npwp_1111');
    // const errornpwp_1111 = document.getElementById('errornpwp_1111');
    // npwp_1111.addEventListener('input', function() {
    //     const inputValue = npwp_1111.value;
    //     if (inputValue.length > 15) {
    //         npwp_1111.value = inputValue.slice(0, 15);
    //         errornpwp_1111.textContent = 'Maksimal 15 digit';
    //     } else {
    //         errornpwp_1111.textContent = '';
    //     }
    // });
    const inputekspor_1111 = document.getElementById('ekspor_1111');
    const inputa2_dpp_1111 = document.getElementById('a2_dpp_1111');
    const inputa3_dpp_1111 = document.getElementById('a3_dpp_1111');
    const inputa4_dpp_1111 = document.getElementById('a4_dpp_1111');
    const inputa5_dpp_1111 = document.getElementById('a5_dpp_1111');
    const inputb_tidak_terutang_dpp_1111 = document.getElementById('b_tidak_terutang_dpp_1111');
    
    const inputdua_b_pajak_keluaran_ppn_1111 = document.getElementById('dua_b_pajak_keluaran_ppn_1111');
    const inputdua_c_pajak_keluaran_ppn_1111 = document.getElementById('dua_c_pajak_keluaran_ppn_1111');
    const inputdua_e_pajak_keluaran_ppn_1111 = document.getElementById('dua_e_pajak_keluaran_ppn_1111');
    
    const inputlima_a_ppn_terutang_1111 = document.getElementById('lima_a_ppn_terutang_1111');
    const inputlima_b_ppn_terutang_1111 = document.getElementById('lima_b_ppn_terutang_1111');
    const inputlima_d_ppn_terutang_1111 = document.getElementById('lima_d_ppn_terutang_1111');

    const resulta2_ppn_1111 = document.getElementById('a2_ppn_1111');
    const resulta3_ppn_1111 = document.getElementById('a3_ppn_1111');
    const resulta4_ppn_1111 = document.getElementById('a4_ppn_1111');
    const resulta5_ppn_1111 = document.getElementById('a5_ppn_1111');
    const resulta_jumlah_dpp_1111 = document.getElementById('a_jumlah_dpp_1111');
    const resulta_jumlah_ppn_1111 = document.getElementById('a_jumlah_ppn_1111');
    const resultc_jumlahpenyerahan_dpp_1111 = document.getElementById('c_jumlahpenyerahan_dpp_1111');
    const resultdua_a_pajak_keluaran_ppn_1111 = document.getElementById('dua_a_pajak_keluaran_ppn_1111');
    const resultdua_d_pajak_keluaran_ppn_1111 = document.getElementById('dua_d_pajak_keluaran_ppn_1111');
    const resultdua_f_pajak_keluaran_ppn_1111 = document.getElementById('dua_f_pajak_keluaran_ppn_1111');
    const resultlima_c_ppn_terutang_1111 = document.getElementById('lima_c_ppn_terutang_1111');
    const resultlima_e_ppn_terutang_1111= document.getElementById('lima_e_ppn_terutang_1111');
    [inputlima_d_ppn_terutang_1111,inputlima_b_ppn_terutang_1111,inputlima_a_ppn_terutang_1111,inputdua_e_pajak_keluaran_ppn_1111,inputdua_c_pajak_keluaran_ppn_1111,inputdua_b_pajak_keluaran_ppn_1111,inputb_tidak_terutang_dpp_1111,inputekspor_1111,inputa5_dpp_1111,inputa2_dpp_1111,inputa3_dpp_1111,inputa4_dpp_1111]
    .forEach(input => {
        input.addEventListener('input', update1111);
    });
    function update1111() {
        const ekspor_1111 = parseFloat(inputekspor_1111.value) || 0;
        const a2_dpp_1111 = parseFloat(inputa2_dpp_1111.value) || 0;
        const a3_dpp_1111 = parseFloat(inputa3_dpp_1111.value) || 0;
        const a4_dpp_1111 = parseFloat(inputa4_dpp_1111.value) || 0;
        const a5_dpp_1111 = parseFloat(inputa5_dpp_1111.value) || 0;
        const b_tidak_terutang_dpp_1111 = parseFloat(inputb_tidak_terutang_dpp_1111.value) || 0;
        
        const a2_ppn_1111 =a2_dpp_1111*11/100;
        const a3_ppn_1111 =a3_dpp_1111*11/100;
        const a4_ppn_1111 =a4_dpp_1111*11/100;
        const a5_ppn_1111 =a5_dpp_1111*11/100;

        const ajumlah_terutang_dpp = ekspor_1111+a2_dpp_1111+a3_dpp_1111+a4_dpp_1111+a5_dpp_1111;
        const ajumlah_terutang_ppn = a2_ppn_1111+a3_ppn_1111+a4_ppn_1111+a5_ppn_1111;
        resulta_jumlah_dpp_1111.value=ajumlah_terutang_dpp;
        // resulta_jumlah_ppn_1111.value=ajumlah_terutang_dpp*11/100;
        resulta_jumlah_ppn_1111.value=ajumlah_terutang_ppn;
        
        resulta2_ppn_1111.value=a2_ppn_1111;
        resulta3_ppn_1111.value=a3_ppn_1111;
        resulta4_ppn_1111.value=a4_ppn_1111;
        resulta5_ppn_1111.value=a5_ppn_1111;
        resultdua_a_pajak_keluaran_ppn_1111.value=a2_ppn_1111;
        resultc_jumlahpenyerahan_dpp_1111.value=ajumlah_terutang_dpp+b_tidak_terutang_dpp_1111;
        
        const dua_b_pajak_keluaran_ppn_1111 = parseFloat(inputdua_b_pajak_keluaran_ppn_1111.value) || 0;
        const dua_c_pajak_keluaran_ppn_1111 = parseFloat(inputdua_c_pajak_keluaran_ppn_1111.value) || 0;
        const jumlahppnIId_1111 = a2_ppn_1111-dua_b_pajak_keluaran_ppn_1111-dua_c_pajak_keluaran_ppn_1111;
        if(jumlahppnIId_1111<0){
            resultdua_d_pajak_keluaran_ppn_1111.value=0;
        }else{
            resultdua_d_pajak_keluaran_ppn_1111.value=jumlahppnIId_1111;
        }

        const dua_e_pajak_keluaran_ppn_1111 = parseFloat(inputdua_e_pajak_keluaran_ppn_1111.value) || 0;
        const jumlahppnIIf_1111 = jumlahppnIId_1111-dua_e_pajak_keluaran_ppn_1111;
        if(jumlahppnIIf_1111<0){
            resultdua_f_pajak_keluaran_ppn_1111.value=0;
        }else{
            resultdua_f_pajak_keluaran_ppn_1111.value=jumlahppnIIf_1111;
        }
        const lima_a_ppn_terutang_1111 = parseFloat(inputlima_a_ppn_terutang_1111.value) || 0;
        const lima_b_ppn_terutang_1111 = parseFloat(inputlima_b_ppn_terutang_1111.value) || 0;
        const jumlahppnc = lima_a_ppn_terutang_1111-lima_b_ppn_terutang_1111;
        if(jumlahppnc<0){
            resultlima_c_ppn_terutang_1111.value=0;
        }else{
            resultlima_c_ppn_terutang_1111.value=jumlahppnc;
        }
        const lima_d_ppn_terutang_1111 = parseFloat(inputlima_d_ppn_terutang_1111.value) || 0;
        const jumlahppne = jumlahppnc-lima_d_ppn_terutang_1111;
        if(jumlahppne<0){
            resultlima_e_ppn_terutang_1111.value=0;
        }else{
            resultlima_e_ppn_terutang_1111.value=jumlahppne;
        }
    }

    // 1111
    // 1111AB
    // const npwp_1111_AB = document.getElementById('npwp_1111_AB');
    // const errornpwp_1111_AB = document.getElementById('errornpwp_1111_AB');
    // npwp_1111_AB.addEventListener('input', function() {
    //     const inputValue = npwp_1111_AB.value;
    //     if (inputValue.length > 15) {
    //         npwp_1111_AB.value = inputValue.slice(0, 15);
    //         errornpwp_1111_AB.textContent = 'Maksimal 15 digit';
    //     } else {
    //         errornpwp_1111_AB.textContent = '';
    //     }
    // });
    const inputdigunggung_dpp_1111_AB = document.getElementById('digunggung_dpp_1111_AB');
    const resultdigunggung_ppn_1111_AB = document.getElementById('digunggung_ppn_1111_AB');
    const inputdipungut_dpp_1111_AB = document.getElementById('dipungut_dpp_1111_AB');
    const resultdipungut_ppn_1111_AB = document.getElementById('dipungut_ppn_1111_AB');
    const inputpemungut_dpp_1111_AB = document.getElementById('pemungut_dpp_1111_AB');
    const resultpemungut_ppn_1111_AB = document.getElementById('pemungut_ppn_1111_AB');
    const inputtidakdipungut_dpp_1111_AB = document.getElementById('tidakdipungut_dpp_1111_AB');
    const resulttidakdipungut_ppn_1111_AB = document.getElementById('tidakdipungut_ppn_1111_AB');
    const inputbebaspajak_dpp_1111_AB = document.getElementById('bebaspajak_dpp_1111_AB');
    const resultbebaspajak_ppn_1111_AB = document.getElementById('bebaspajak_ppn_1111_AB');
    
    const inputimpor_bkp_1111_AB= document.getElementById('impor_bkp_1111_AB');
    const inputperolehan_bkp_1111_AB= document.getElementById('perolehan_bkp_1111_AB');
    const inputimpor_perolehan_bkp_1111_AB= document.getElementById('impor_perolehan_bkp_1111_AB');
    const resultjumlah_perolehan_1111_AB= document.getElementById('jumlah_perolehan_1111_AB');
    const resultjumlah_pajakmasukan_1111_AB= document.getElementById('jumlah_pajakmasukan_1111_AB');
    
    const inputimpor_bkp_ppn_1111_AB= document.getElementById('impor_bkp_ppn_1111_AB');
    const inputimpor_perolehan_bkp_ppn_1111_AB= document.getElementById('impor_perolehan_bkp_ppn_1111_AB');
    const inputperolehan_bkp_ppn_1111_AB= document.getElementById('perolehan_bkp_ppn_1111_AB');
    const resultjumlah_perolehan_ppn_1111_AB= document.getElementById('jumlah_perolehan_ppn_1111_AB');
    
    const inputimpor_bkp_ppnbm_1111_AB= document.getElementById('impor_bkp_ppnbm_1111_AB');
    const inputimpor_perolehan_bkp_ppnbm_1111_AB= document.getElementById('impor_perolehan_bkp_ppnbm_1111_AB');
    const inputperolehan_bkp_ppnbm_1111_AB= document.getElementById('perolehan_bkp_ppnbm_1111_AB');
    const resultjumlah_perolehan_ppnbm_1111_AB= document.getElementById('jumlah_perolehan_ppnbm_1111_AB');
    
    const inputppn_masa_pajak_sebelumnya_1111_AB= document.getElementById('ppn_masa_pajak_sebelumnya_1111_AB');
    const inputspt_ppn_1111_AB= document.getElementById('spt_ppn_1111_AB');
    const inputpajak_masukan_1111_AB= document.getElementById('pajak_masukan_1111_AB');
    const resultjumlah_pajak_masukan_1111_AB= document.getElementById('jumlah_pajak_masukan_1111_AB');
    const resulttotaljumlah_pajak_masukan_1111_AB= document.getElementById('totaljumlah_pajak_masukan_1111_AB');

    [inputpajak_masukan_1111_AB,inputspt_ppn_1111_AB,inputppn_masa_pajak_sebelumnya_1111_AB,inputperolehan_bkp_ppnbm_1111_AB,inputimpor_perolehan_bkp_ppnbm_1111_AB,inputimpor_bkp_ppnbm_1111_AB,inputperolehan_bkp_ppn_1111_AB,inputimpor_perolehan_bkp_ppn_1111_AB,inputimpor_bkp_ppn_1111_AB,inputimpor_perolehan_bkp_1111_AB,inputperolehan_bkp_1111_AB,inputimpor_bkp_1111_AB,inputbebaspajak_dpp_1111_AB,inputtidakdipungut_dpp_1111_AB,inputpemungut_dpp_1111_AB,inputdigunggung_dpp_1111_AB,inputdipungut_dpp_1111_AB]
    .forEach(input => {
        input.addEventListener('input', update1111AB);
    });

    function update1111AB() {
        const digunggung_dpp_1111_AB = parseFloat(inputdigunggung_dpp_1111_AB.value) || 0;
        resultdigunggung_ppn_1111_AB.value=digunggung_dpp_1111_AB*11/100;

        const dipungut_ppn_1111_AB = parseFloat(inputdipungut_dpp_1111_AB.value) || 0;
        resultdipungut_ppn_1111_AB.value=dipungut_ppn_1111_AB*11/100;

        const pemungut_dpp_1111_AB = parseFloat(inputpemungut_dpp_1111_AB.value) || 0;
        resultpemungut_ppn_1111_AB.value=pemungut_dpp_1111_AB*11/100;

        const tidakdipungut_dpp_1111_AB = parseFloat(inputtidakdipungut_dpp_1111_AB.value) || 0;
        resulttidakdipungut_ppn_1111_AB.value=tidakdipungut_dpp_1111_AB*11/100;

        const bebaspajak_dpp_1111_AB = parseFloat(inputbebaspajak_dpp_1111_AB.value) || 0;
        resultbebaspajak_ppn_1111_AB.value=bebaspajak_dpp_1111_AB*11/100;
        
        
        const duaA = parseFloat(inputimpor_bkp_1111_AB.value) || 0;
        const duaB = parseFloat(inputperolehan_bkp_1111_AB.value) || 0;
        const duaC = parseFloat(inputimpor_perolehan_bkp_1111_AB.value) || 0;
        resultjumlah_perolehan_1111_AB.value=duaA+duaB+duaC;
        
        const impor_bkp_ppn_1111_AB = parseFloat(inputimpor_bkp_ppn_1111_AB.value) || 0;
        const impor_perolehan_bkp_ppn_1111_AB = parseFloat(inputimpor_perolehan_bkp_ppn_1111_AB.value) || 0;
        const perolehan_bkp_ppn_1111_AB = parseFloat(inputperolehan_bkp_ppn_1111_AB.value) || 0;
        resultjumlah_perolehan_ppn_1111_AB.value=impor_bkp_ppn_1111_AB+impor_perolehan_bkp_ppn_1111_AB+perolehan_bkp_ppn_1111_AB;
        const jumlah3A = impor_bkp_ppn_1111_AB+perolehan_bkp_ppn_1111_AB;
        resultjumlah_pajakmasukan_1111_AB.value=jumlah3A
        
        const impor_bkp_ppnbm_1111_AB = parseFloat(inputimpor_bkp_ppnbm_1111_AB.value) || 0;
        const impor_perolehan_bkp_ppnbm_1111_AB = parseFloat(inputimpor_perolehan_bkp_ppnbm_1111_AB.value) || 0;
        const perolehan_bkp_ppnbm_1111_AB = parseFloat(inputperolehan_bkp_ppnbm_1111_AB.value) || 0;
        resultjumlah_perolehan_ppnbm_1111_AB.value=impor_bkp_ppnbm_1111_AB+impor_perolehan_bkp_ppnbm_1111_AB+perolehan_bkp_ppnbm_1111_AB;
        
        const ppn_masa_pajak_sebelumnya_1111_AB = parseFloat(inputppn_masa_pajak_sebelumnya_1111_AB.value) || 0;
        const spt_ppn_1111_AB = parseFloat(inputspt_ppn_1111_AB.value) || 0;
        const pajak_masukan_1111_AB = parseFloat(inputpajak_masukan_1111_AB.value) || 0;
        const jumlahB4 =ppn_masa_pajak_sebelumnya_1111_AB+spt_ppn_1111_AB+pajak_masukan_1111_AB;
        resultjumlah_pajak_masukan_1111_AB.value=jumlahB4;
        resulttotaljumlah_pajak_masukan_1111_AB.value=jumlah3A+jumlahB4;
    }
    // 1111AB
    // 1111A1
    // const npwp_1111_A1 = document.getElementById('npwp_1111_A1');
    // const errornpwp_1111_A1 = document.getElementById('errornpwp_1111_A1');
    // npwp_1111_A1.addEventListener('input', function() {
    //     const inputValue = npwp_1111_A1.value;

    //     if (inputValue.length > 15) {
    //         npwp_1111_A1.value = inputValue.slice(0, 15);
    //         errornpwp_1111_A1.textContent = 'Maksimal 15 digit';
    //     } else {
    //         errornpwp_1111_A1.textContent = '';
    //     }
    // });
    const tablelist_1111A1 = document.querySelector('#spt1111A1 tbody');
    const addBtnadd_1111A1 = document.querySelector('#btn-sptppn_1111A1');
    addBtnadd_1111A1.addEventListener('click', function() {
        const newRow = `
        <tr>
            <td width="auto" class="text-center">
                <input required autocomplete="off" type="text"
                    name="pajak_nama_pembeli_bkp_1111A1[]"
                    id="pajak_nama_pembeli_bkp_1111A1[]"
                    class="form-control" />
            </td>
            <td class="text-center">
                <input required autocomplete="off" type="text"
                    name="pajak_no_doc_1111A1[]" min="0"
                    id="pajak_no_doc_1111A1[]"
                    class="form-control"/>
            </td>
            <td class="text-center">
                <input required autocomplete="off" type="date"
                    name="pajak_tanggal_1111A1[]"
                    id="pajak_tanggal_1111A1[]" min="0"
                    class="form-control" />
            </td>
            <td class="text-center">
                <input required autocomplete="off" type="text"
                onkeyup="this.value=sprator(this.value);"
                    name="pajak_dpp_1111A1[]" id="pajak_dpp_1111A1[]"
                    min="0"
                    class="form-control subdpp_1111A1" />
            </td>
            <td class="text-center">
                <input required autocomplete="off" type="text"
                    name="pajak_keterangan_1111A1[]"
                    id="pajak_keterangan_1111A1[]" min="0"
                    class="form-control" />
            </td>
            <td><button type="button" class="btn btn-danger btn-remove-1111A1"><i
                class="fa fa-trash"></i>
            </td>
        </tr>
        `;
        tablelist_1111A1.insertAdjacentHTML('beforeend', newRow);
    });
    tablelist_1111A1.addEventListener('input', function(event) {
        const target = event.target;
        if (target.tagName === 'INPUT' && target.name.startsWith('pajak')) {
            var totaldpp = 0

            $(".subdpp_1111A1").each(function() {
                totaldpp += +$(this).val().replace(/,/g, '');
            });
            
            $('.totaldpp_1111A1').val(totaldpp.toLocaleString());
            
        }
    });
    tablelist_1111A1.addEventListener('click', function(event) {
        if (event.target.classList.contains('btn-remove-1111A1')) {
            const row = event.target.closest('tr');
            row.remove();
        }
    });
    // 1111A1
    // 1111A2
    // const npwp_1111_A2 = document.getElementById('npwp_1111_A2');
    // const errornpwp_1111_A2 = document.getElementById('errornpwp_1111_A2');
    // npwp_1111_A2.addEventListener('input', function() {
    //     const inputValue = npwp_1111_A2.value;

    //     if (inputValue.length > 15) {
    //         npwp_1111_A2.value = inputValue.slice(0, 15);
    //         errornpwp_1111_A2.textContent = 'Maksimal 15 digit';
    //     } else {
    //         errornpwp_1111_A2.textContent = '';
    //     }
    // });
    const tablelist_1111A2 = document.querySelector('#spt1111A2 tbody');
    const addBtnadd_1111A2 = document.querySelector('#btn-sptppn_1111A2');
    addBtnadd_1111A2.addEventListener('click', function() {
        const newRow = `
        <tr>
            <td width="auto" class="text-center">
                <input required autocomplete="off" type="text"
                    name="pajak_nama_penjual_bkp_1111A2[]" id="pajak_nama_penjual_bkp_1111A2[]"
                    class="form-control" />
            </td>
            <td class="text-center">
                <input required autocomplete="off" type="text"
                    name="pajak_no_npwp_1111A2[]" min="0"
                    id="pajak_no_npwp_1111A2[]" class="form-control" />
            </td>
            <td class="text-center">
                <input required autocomplete="off" type="text"
                    name="pajak_kode_dan_no_seri_1111A2[]"
                    id="pajak_kode_dan_no_seri_1111A2[]" min="0"
                    class="form-control"/>
            </td>
            <td class="text-center">
                <input required autocomplete="off" type="date"
                    name="pajak_tanggal_1111A2[]"
                    id="pajak_tanggal_1111A2[]" min="0"
                    class="form-control"/>
            </td>
            <td class="text-center">
                <input required autocomplete="off" type="text"
                    name="pajak_dpp_1111A2[]" onkeyup="this.value=sprator(this.value);"
                    id="pajak_dpp_1111A2[]" min="0"
                    class="form-control subdpp_1111A2" />
            </td>
            <td class="text-center">
                <input required readonly autocomplete="off" type="text"
                    name="pajak_ppn_1111A2[]" onkeyup="this.value=sprator(this.value);"
                    id="pajak_ppn_1111A2[]" min="0"
                    class="form-control subppn_1111A2" />
            </td>
            <td class="text-center">
                <input required  autocomplete="off" type="text"
                    name="pajak_ppnBM_1111A2[]" onkeyup="this.value=sprator(this.value);"
                    id="pajak_ppnBM_1111A2[]" min="0"
                    class="form-control subppnbm_1111A2" />
            </td>
            <td class="text-center">
                <input required autocomplete="off" type="text"
                    name="pajak_no_seri_1111A2[]"
                    id="pajak_no_seri_1111A2[]" min="0"
                    class="form-control" />
            </td>
            <td><button type="button" class="btn btn-danger btn-remove-1111A2"><i
                class="fa fa-trash"></i>
            </td>
        </tr>
        `;
        tablelist_1111A2.insertAdjacentHTML('beforeend', newRow);
    });
    tablelist_1111A2.addEventListener('input', function(event) {
        const target = event.target;
        if (target.tagName === 'INPUT' && target.name.startsWith('pajak')) {
            const row = target.closest('tr');
            // const angkA2 = parseFloat(row.querySelector('input[name="pajak_dpp_1111A2[]"]').value) || 0;
            const angkA2 = $(row.querySelector('[name="pajak_dpp_1111A2[]"]')).val();
            retValangkA2=angkA2 ? parseFloat(angkA2.replace(/,/g, '')) : 0;
            
            const hasilInput = row.querySelector('input[name="pajak_ppn_1111A2[]"]');
            const sum = retValangkA2 * 11/100;
            hasilInput.value = sum.toLocaleString();

            var totaldpp = 0
            var totalppn = 0
            var totalppnbm = 0

            $(".subdpp_1111A2").each(function() {
                totaldpp += +$(this).val().replace(/,/g, '');
            });
            $(".subppn_1111A2").each(function() {
                totalppn += +$(this).val().replace(/,/g, '');
            });
            $(".subppnbm_1111A2").each(function() {
                totalppnbm += +$(this).val().replace(/,/g, '');
            });
            
            $('.totaldpp_1111A2').val(totaldpp.toLocaleString());
            $('.totalppn_1111A2').val(totalppn.toLocaleString());
            $('.totalppnbm_1111A2').val(totalppnbm.toLocaleString());
        }
    });
    tablelist_1111A2.addEventListener('click', function(event) {
        if (event.target.classList.contains('btn-remove-1111A2')) {
            const row = event.target.closest('tr');
            row.remove();
        }
    });
    // 1111A2
    // 1111B1
    // const npwp_1111_b1 = document.getElementById('npwp_1111_b1');
    // const errornpwp_1111_b1 = document.getElementById('errornpwp_1111_b1');
    // npwp_1111_b1.addEventListener('input', function() {
    //     const inputValue = npwp_1111_b1.value;

    //     if (inputValue.length > 15) {
    //         npwp_1111_b1.value = inputValue.slice(0, 15);
    //         errornpwp_1111_b1.textContent = 'Maksimal 15 digit';
    //     } else {
    //         errornpwp_1111_b1.textContent = '';
    //     }
    // });
    const tablelist_1111b1 = document.querySelector('#spt1111b1 tbody');
    const addBtnadd_1111b1 = document.querySelector('#btn-sptppn_1111b1');
    addBtnadd_1111b1.addEventListener('click', function() {
        const newRow = `
        <tr>
            <td width="auto" class="text-center">
                <input required autocomplete="off" type="text"
                    name="pajak_nama_penjual_bkp_1111b1[]"
                    id="pajak_nama_penjual_bkp_1111b1[]"
                    class="form-control" />
            </td>
            <td class="text-center">
                <input required autocomplete="off" type="text"
                    name="pajak_no_doc_1111b1[]" min="0"
                    id="pajak_no_doc_1111b1[]"
                    class="form-control" />
            </td>
        
            <td class="text-center">
                <input required autocomplete="off" type="date"
                    name="pajak_tanggal_1111b1[]"
                    id="pajak_tanggal_1111b1[]" min="0"
                    class="form-control" />
            </td>
            <td class="text-center">
                <input required autocomplete="off" type="text" onkeyup="this.value=sprator(this.value);"
                    name="pajak_dpp_1111b1[]" id="pajak_dpp_1111b1[]"
                    min="0"
                    class="form-control subdpp_1111b1" />
            </td>
            <td class="text-center">
                <input required readonly autocomplete="off" type="text" onkeyup="this.value=sprator(this.value);"
                    name="pajak_ppn_1111b1[]" id="pajak_ppn_1111b1[]"
                    min="0"
                    class="form-control subppn_1111b1" />
            </td>
            <td class="text-center">
                <input required autocomplete="off" type="text" onkeyup="this.value=sprator(this.value);"
                    name="pajak_ppnBM_1111b1[]"
                    id="pajak_ppnBM_1111b1[]" min="0"
                    class="form-control subppnbm_1111b1" />
            </td>
            <td class="text-center">
                <input required autocomplete="off" type="text"
                    name="keterangan_1111b1[]"
                    id="keterangan_1111b1[]" min="0"
                    class="form-control" />
            </td>
            <td><button type="button" class="btn btn-danger btn-remove-1111b1"><i
                class="fa fa-trash"></i>
            </td>
        </tr>
        `;
        tablelist_1111b1.insertAdjacentHTML('beforeend', newRow);
    });
    tablelist_1111b1.addEventListener('input', function(event) {
        const target = event.target;
        if (target.tagName === 'INPUT' && target.name.startsWith('pajak')) {
            const row = target.closest('tr');
            // const angkA2 = parseFloat(row.querySelector('input[name="pajak_dpp_1111b1[]"]').value) || 0;
            const angkA2 = $(row.querySelector('[name="pajak_dpp_1111b1[]"]')).val();
            retValangkA2=angkA2 ? parseFloat(angkA2.replace(/,/g, '')) : 0;
            
            const hasilInput = row.querySelector('input[name="pajak_ppn_1111b1[]"]');
            const sum = retValangkA2 * 11/100;
            hasilInput.value = sum;

            var totaldpp = 0
            var totalppn = 0
            var totalppnbm = 0

            $(".subdpp_1111b1").each(function() {
                totaldpp += +$(this).val().replace(/,/g, '');
            });
            $(".subppn_1111b1").each(function() {
                totalppn += +$(this).val().replace(/,/g, '');
            });
            $(".subppnbm_1111b1").each(function() {
                totalppnbm += +$(this).val().replace(/,/g, '');
            });
            
            $('.totaldpp_1111b1').val(totaldpp.toLocaleString());
            $('.totalppn_1111b1').val(totalppn.toLocaleString());
            $('.totalppnbm_1111b1').val(totalppnbm.toLocaleString());
        }
    });
    tablelist_1111b1.addEventListener('click', function(event) {
        if (event.target.classList.contains('btn-remove-1111b1')) {
            const row = event.target.closest('tr');
            row.remove();
        }
    });
    // 1111B1
    // 1111B2
    // const npwp_1111_b2 = document.getElementById('npwp_1111_b2');
    // const errornpwp_1111_b2 = document.getElementById('errornpwp_1111_b2');
    // npwp_1111_b2.addEventListener('input', function() {
    //     const inputValue = npwp_1111_b2.value;

    //     if (inputValue.length > 15) {
    //         npwp_1111_b2.value = inputValue.slice(0, 15);
    //         errornpwp_1111_b2.textContent = 'Maksimal 15 digit';
    //     } else {
    //         errornpwp_1111_b2.textContent = '';
    //     }
    // });
    const tablelist_1111B2 = document.querySelector('#spt1111B2 tbody');
    const addBtnadd_1111B2 = document.querySelector('#btn-sptppn_1111B2');
    addBtnadd_1111B2.addEventListener('click', function() {
        const newRow = `
        <tr>
            <td width="auto" class="text-center">
                <input required autocomplete="off" type="text"
                    name="pajak_nama_penjual_bkp_1111B2[]" id="pajak_nama_penjual_bkp_1111B2[]"
                    class="form-control" />
            </td>
            <td class="text-center">
                <input required autocomplete="off" type="text"
                    name="pajak_no_npwp_1111B2[]" min="0"
                    id="pajak_no_npwp_1111B2[]" class="form-control" />
            </td>
            <td class="text-center">
                <input required autocomplete="off" type="text"
                    name="pajak_kode_dan_no_seri_1111B2[]"
                    id="pajak_kode_dan_no_seri_1111B2[]" min="0"
                    class="form-control"/>
            </td>
            <td class="text-center">
                <input required autocomplete="off" type="date"
                    name="pajak_tanggal_1111B2[]"
                    id="pajak_tanggal_1111B2[]" min="0"
                    class="form-control"/>
            </td>
            <td class="text-center">
                <input onkeyup="this.value=sprator(this.value);" required autocomplete="off" type="text"
                    name="pajak_dpp_1111B2[]"
                    id="pajak_dpp_1111B2[]" min="0"
                    class="form-control subdpp_1111B2" />
            </td>
            <td class="text-center">
                <input required readonly autocomplete="off" type="text"
                onkeyup="this.value=sprator(this.value);"
                    name="pajak_ppn_1111B2[]"
                    id="pajak_ppn_1111B2[]" min="0"
                    class="form-control subppn_1111B2" />
            </td>
            <td class="text-center">
                <input required  autocomplete="off" type="text"
                onkeyup="this.value=sprator(this.value);"
                    name="pajak_ppnBM_1111B2[]"
                    id="pajak_ppnBM_1111B2[]" min="0"
                    class="form-control subppnbm_1111B2" />
            </td>
            <td class="text-center">
                <input required autocomplete="off" type="number"
                    name="pajak_no_seri_1111B2[]"
                    id="pajak_no_seri_1111B2[]" min="0"
                    class="form-control" />
            </td>
            <td><button type="button" class="btn btn-danger btn-remove-1111B2"><i
                class="fa fa-trash"></i>
            </td>
        </tr>
        `;
        tablelist_1111B2.insertAdjacentHTML('beforeend', newRow);
    });
    tablelist_1111B2.addEventListener('input', function(event) {
        const target = event.target;
        if (target.tagName === 'INPUT' && target.name.startsWith('pajak')) {
            const row = target.closest('tr');
            // const angkA2 = parseFloat(row.querySelector('input[name="pajak_dpp_1111B2[]"]').value) || 0;
            const angkA2 = $(row.querySelector('[name="pajak_dpp_1111B2[]"]')).val();
            retValangkA2=angkA2 ? parseFloat(angkA2.replace(/,/g, '')) : 0;

            const hasilInput = row.querySelector('input[name="pajak_ppn_1111B2[]"]');
            const sum = retValangkA2 * 11/100;
            hasilInput.value = sum.toLocaleString();

            var totaldpp = 0
            var totalppn = 0
            var totalppnbm = 0

            $(".subdpp_1111B2").each(function() {
                totaldpp += +$(this).val().replace(/,/g, '');
            });
            $(".subppn_1111B2").each(function() {
                totalppn += +$(this).val().replace(/,/g, '');
            });
            $(".subppnbm_1111B2").each(function() {
                totalppnbm += +$(this).val().replace(/,/g, '');
            });
            
            $('.totaldpp_1111B2').val(totaldpp.toLocaleString());
            $('.totalppn_1111B2').val(totalppn.toLocaleString());
            $('.totalppnbm_1111B2').val(totalppnbm.toLocaleString());
        }
    });
    tablelist_1111B2.addEventListener('click', function(event) {
        if (event.target.classList.contains('btn-remove-1111B2')) {
            const row = event.target.closest('tr');
            row.remove();
        }
    });
    // 1111B2
    // 1111B3
    // const npwp_1111_b3 = document.getElementById('npwp_1111_b3');
    // const errornpwp_1111_b3 = document.getElementById('errornpwp_1111_b3');
    // npwp_1111_b3.addEventListener('input', function() {
    //     const inputValue = npwp_1111_b3.value;

    //     if (inputValue.length > 15) {
    //         npwp_1111_b3.value = inputValue.slice(0, 15);
    //         errornpwp_1111_b3.textContent = 'Maksimal 15 digit';
    //     } else {
    //         errornpwp_1111_b3.textContent = '';
    //     }
    // });

    const tablelist_1111B3 = document.querySelector('#spt1111B3 tbody');
    const addBtnadd_1111B3 = document.querySelector('#btn-sptppn_1111B3');
    addBtnadd_1111B3.addEventListener('click', function() {
        const newRow = `
        <tr>
            <td width="auto" class="text-center">
                <input required autocomplete="off" type="text"
                    name="pajak_nama_penjual_bkp_1111B3[]" id="pajak_nama_penjual_bkp_1111B3[]"
                    class="form-control" />
            </td>
            <td class="text-center">
                <input required autocomplete="off" type="text"
                    name="pajak_no_npwp_1111B3[]" min="0"
                    id="pajak_no_npwp_1111B3[]" class="form-control" />
            </td>
            <td class="text-center">
                <input required autocomplete="off" type="text"
                    name="pajak_kode_dan_no_seri_1111B3[]"
                    id="pajak_kode_dan_no_seri_1111B3[]" min="0"
                    class="form-control"/>
            </td>
            <td class="text-center">
                <input required autocomplete="off" type="date"
                    name="pajak_tanggal_1111B3[]"
                    id="pajak_tanggal_1111B3[]" min="0"
                    class="form-control"/>
            </td>
            <td class="text-center">
                <input required autocomplete="off" type="text" 
                    onkeyup="this.value=sprator(this.value);"
                    name="pajak_dpp_1111B3[]"
                    id="pajak_dpp_1111B3[]" min="0"
                    class="form-control subdpp_1111B3" />
            </td>
            <td class="text-center">
                <input required readonly autocomplete="off" type="text" onkeyup="this.value=sprator(this.value);"
                    name="pajak_ppn_1111B3[]"
                    id="pajak_ppn_1111B3[]" min="0"
                    class="form-control subppn_1111B3" />
            </td>
            <td class="text-center">
                <input required autocomplete="off" type="text" onkeyup="this.value=sprator(this.value);"
                    name="pajak_ppnBM_1111B3[]"
                    id="pajak_ppnBM_1111B3[]" min="0"
                    class="form-control subppnbm_1111B3" />
            </td>
            <td class="text-center">
                <input required autocomplete="off" type="text"
                    name="pajak_no_seri_1111B3[]"
                    id="pajak_no_seri_1111B3[]" min="0"
                    class="form-control" />
            </td>
            <td><button type="button" class="btn btn-danger btn-remove-1111B3"><i
                class="fa fa-trash"></i>
            </td>
        </tr>
        `;
        tablelist_1111B3.insertAdjacentHTML('beforeend', newRow);
    });
    tablelist_1111B3.addEventListener('input', function(event) {
        const target = event.target;
        if (target.tagName === 'INPUT' && target.name.startsWith('pajak')) {
            const row = target.closest('tr');
            // const angkA2 = parseFloat(row.querySelector('input[name="pajak_dpp_1111B3[]"]').value) || 0;
            const angkA2 = $(row.querySelector('[name="pajak_dpp_1111B3[]"]')).val();
            retValangkA2=angkA2 ? parseFloat(angkA2.replace(/,/g, '')) : 0;

            const hasilInput = row.querySelector('input[name="pajak_ppn_1111B3[]"]');
            const sum = retValangkA2 * 11/100;
            hasilInput.value = sum.toLocaleString();

            var totaldpp = 0
            var totalppn = 0
            var totalppnbm = 0

            $(".subdpp_1111B3").each(function() {
                totaldpp += +$(this).val().replace(/,/g, '');
            });
            $(".subppn_1111B3").each(function() {
                totalppn += +$(this).val().replace(/,/g, '');
            });
            $(".subppnbm_1111B3").each(function() {
                totalppnbm += +$(this).val().replace(/,/g, '');
            });
            
            $('.totaldpp_1111B3').val(totaldpp.toLocaleString());
            $('.totalppn_1111B3').val(totalppn.toLocaleString());
            $('.totalppnbm_1111B3').val(totalppnbm.toLocaleString());
        }
    });
    tablelist_1111B3.addEventListener('click', function(event) {
        if (event.target.classList.contains('btn-remove-1111B3')) {
            const row = event.target.closest('tr');
            row.remove();
        }
    });
    // 1111B3
});
function sprator(x) {
    //remove commas
    retVal = x ? parseFloat(x.replace(/,/g, '')) : 0;

    
    const digunggung_dpp_1111_AB = $('#digunggung_dpp_1111_AB').val();
    const resultdigunggung_ppn_1111_AB = document.getElementById('digunggung_ppn_1111_AB');
    retValdgg_1111_AB =digunggung_dpp_1111_AB ? parseFloat(digunggung_dpp_1111_AB.replace(/,/g, '')) : 0;
    const hasildigunggung_dpp_1111_AB = (retValdgg_1111_AB*11)/100;
    resultdigunggung_ppn_1111_AB.value = hasildigunggung_dpp_1111_AB.toLocaleString();

    retVal = x ? parseFloat(x.replace(/,/g, '')) : 0;
    const dipungut_dpp_1111_AB = $('#dipungut_dpp_1111_AB').val();
    const resultdipungut_ppn_1111_AB = document.getElementById('dipungut_ppn_1111_AB');
    retValdpgt_dpp_1111_AB =dipungut_dpp_1111_AB ? parseFloat(dipungut_dpp_1111_AB.replace(/,/g, '')) : 0;
    const hasildipungut_dpp_1111_AB = (retValdpgt_dpp_1111_AB*11)/100;
    resultdipungut_ppn_1111_AB.value = hasildipungut_dpp_1111_AB.toLocaleString();

    const pemungut_dpp_1111_AB = $('#pemungut_dpp_1111_AB').val();
    const resultpemungut_ppn_1111_AB = document.getElementById('pemungut_ppn_1111_AB');
    retValpmgt_dpp_1111_AB =pemungut_dpp_1111_AB ? parseFloat(pemungut_dpp_1111_AB.replace(/,/g, '')) : 0;
    const hasilpemungut_dpp_1111_AB = (retValpmgt_dpp_1111_AB*11)/100;
    resultpemungut_ppn_1111_AB.value = hasilpemungut_dpp_1111_AB.toLocaleString();

    const tidakdipungut_dpp_1111_AB = $('#tidakdipungut_dpp_1111_AB').val();
    const resulttidakdipungut_ppn_1111_AB = document.getElementById('tidakdipungut_ppn_1111_AB');
    retValtdkdpgt_dpp_1111_AB =tidakdipungut_dpp_1111_AB ? parseFloat(tidakdipungut_dpp_1111_AB.replace(/,/g, '')) : 0;
    const hasilretValtidakdipungut_dpp_1111_AB = (retValtdkdpgt_dpp_1111_AB*11)/100;
    resulttidakdipungut_ppn_1111_AB.value = hasilretValtidakdipungut_dpp_1111_AB.toLocaleString();
    
    const bebaspajak_dpp_1111_AB = $('#bebaspajak_dpp_1111_AB').val();
    const resultbebaspajak_ppn_1111_AB = document.getElementById('bebaspajak_ppn_1111_AB');
    retValbbspjk_dpp_1111_AB =bebaspajak_dpp_1111_AB ? parseFloat(bebaspajak_dpp_1111_AB.replace(/,/g, '')) : 0;
    const hasilretValretValbbspjk_dpp_1111_AB = (retValbbspjk_dpp_1111_AB*11)/100;
    resultbebaspajak_ppn_1111_AB.value = hasilretValretValbbspjk_dpp_1111_AB.toLocaleString();
    // console.log(retVal);
    const impor_bkp_1111_AB = $('#impor_bkp_1111_AB').val();
    const impor_bkp_ppn_1111_AB = $('#impor_bkp_ppn_1111_AB').val();
    const impor_bkp_ppnbm_1111_AB = $('#impor_bkp_ppnbm_1111_AB').val();
    retValbkp_1111_AB =impor_bkp_1111_AB ? parseFloat(impor_bkp_1111_AB.replace(/,/g, '')) : 0;
    retValbkp_ppn_1111_AB =impor_bkp_ppn_1111_AB ? parseFloat(impor_bkp_ppn_1111_AB.replace(/,/g, '')) : 0;
    retValbkp_ppnbm_1111_AB =impor_bkp_ppnbm_1111_AB ? parseFloat(impor_bkp_ppnbm_1111_AB.replace(/,/g, '')) : 0;
    
    const perolehan_bkp_1111_AB = $('#perolehan_bkp_1111_AB').val();
    const perolehan_bkp_ppn_1111_AB = $('#perolehan_bkp_ppn_1111_AB').val();
    const perolehan_bkp_ppnbm_1111_AB = $('#perolehan_bkp_ppnbm_1111_AB').val();
    retValdppprolehan =perolehan_bkp_1111_AB ? parseFloat(perolehan_bkp_1111_AB.replace(/,/g, '')) : 0;
    retValppnprolehan =perolehan_bkp_ppn_1111_AB ? parseFloat(perolehan_bkp_ppn_1111_AB.replace(/,/g, '')) : 0;
    retValppnbmprolehan =perolehan_bkp_ppnbm_1111_AB ? parseFloat(perolehan_bkp_ppnbm_1111_AB.replace(/,/g, '')) : 0;
    
    const impor_perolehan_bkp_1111_AB = $('#impor_perolehan_bkp_1111_AB').val();
    const impor_perolehan_bkp_ppn_1111_AB = $('#impor_perolehan_bkp_ppn_1111_AB').val();
    const impor_perolehan_bkp_ppnbm_1111_AB = $('#impor_perolehan_bkp_ppnbm_1111_AB').val();
    retValdppimpor =impor_perolehan_bkp_1111_AB ? parseFloat(impor_perolehan_bkp_1111_AB.replace(/,/g, '')) : 0;
    retValppnimpor =impor_perolehan_bkp_ppn_1111_AB ? parseFloat(impor_perolehan_bkp_ppn_1111_AB.replace(/,/g, '')) : 0;
    retValppnbmimpor =impor_perolehan_bkp_ppnbm_1111_AB ? parseFloat(impor_perolehan_bkp_ppnbm_1111_AB.replace(/,/g, '')) : 0;
    
    const jumlahdpp1111ab =retValbkp_1111_AB+retValdppprolehan+retValdppimpor;
    const jumlahppn1111ab =retValbkp_ppn_1111_AB+retValppnprolehan+retValppnimpor;
    const jumlahppnbm1111ab =retValbkp_ppnbm_1111_AB+retValppnbmprolehan+retValppnbmimpor;
    const jumlahkredit =retValbkp_ppn_1111_AB+retValppnprolehan;

    const resultjumlah_perolehan_1111_AB = document.getElementById('jumlah_perolehan_1111_AB');
    const resultjumlah_perolehan_ppn_1111_AB = document.getElementById('jumlah_perolehan_ppn_1111_AB');
    const resultjumlah_perolehan_ppnbm_1111_AB = document.getElementById('jumlah_perolehan_ppnbm_1111_AB');
    const resultjumlah_pajakmasukan_1111_AB = document.getElementById('jumlah_pajakmasukan_1111_AB');
    
    resultjumlah_perolehan_1111_AB.value = jumlahdpp1111ab.toLocaleString();
    resultjumlah_perolehan_ppn_1111_AB.value = jumlahppn1111ab.toLocaleString();
    resultjumlah_perolehan_ppnbm_1111_AB.value = jumlahppnbm1111ab.toLocaleString();
    resultjumlah_pajakmasukan_1111_AB.value = jumlahkredit.toLocaleString();

    const ppn_masa_pajak_sebelumnya_1111_AB = $('#ppn_masa_pajak_sebelumnya_1111_AB').val();
    const spt_ppn_1111_AB = $('#spt_ppn_1111_AB').val();
    const pajak_masukan_1111_AB = $('#pajak_masukan_1111_AB').val();
    retValppn_masa_pajak_sebelumnya_1111_AB =ppn_masa_pajak_sebelumnya_1111_AB ? parseFloat(ppn_masa_pajak_sebelumnya_1111_AB.replace(/,/g, '')) : 0;
    retValspt_ppn_1111_AB =spt_ppn_1111_AB ? parseFloat(spt_ppn_1111_AB.replace(/,/g, '')) : 0;
    retValpajak_masukan_1111_AB =pajak_masukan_1111_AB ? parseFloat(pajak_masukan_1111_AB.replace(/,/g, '')) : 0;
    const hasilpajakmasukanab = retValppn_masa_pajak_sebelumnya_1111_AB+retValspt_ppn_1111_AB+retValpajak_masukan_1111_AB;

    const resultjumlah_pajak_masukan_1111_AB = document.getElementById('jumlah_pajak_masukan_1111_AB');
    resultjumlah_pajak_masukan_1111_AB.value = hasilpajakmasukanab.toLocaleString();

    const jumlahpajakab = jumlahkredit+hasilpajakmasukanab;
    const resulttotaljumlah_pajak_masukan_1111_AB = document.getElementById('totaljumlah_pajak_masukan_1111_AB');
    resulttotaljumlah_pajak_masukan_1111_AB.value = jumlahpajakab.toLocaleString();

    const ekspor_1111 = $('#ekspor_1111').val();
    retValekspor_1111 =ekspor_1111 ? parseFloat(ekspor_1111.replace(/,/g, '')) : 0;

    const a2_dpp_1111 = $('#a2_dpp_1111').val();
    retVala2_dpp_1111 =a2_dpp_1111 ? parseFloat(a2_dpp_1111.replace(/,/g, '')) : 0;
    const hasila2_dpp_1111 = (retVala2_dpp_1111*11)/100;
    const resulta2_ppn_1111 = document.getElementById('a2_ppn_1111');
    resulta2_ppn_1111.value = hasila2_dpp_1111.toLocaleString();

    const a3_dpp_1111 = $('#a3_dpp_1111').val();
    retVala3_dpp_1111=a3_dpp_1111 ? parseFloat(a3_dpp_1111.replace(/,/g, '')) : 0;
    const hasila3_dpp_1111 = (retVala3_dpp_1111*11)/100;
    const resulta3_ppn_1111 = document.getElementById('a3_ppn_1111');
    resulta3_ppn_1111.value = hasila3_dpp_1111.toLocaleString();
    
    const a4_dpp_1111 = $('#a4_dpp_1111').val();
    retVala4_dpp_1111=a4_dpp_1111 ? parseFloat(a4_dpp_1111.replace(/,/g, '')) : 0;
    const hasila4_dpp_1111 = (retVala4_dpp_1111*11)/100;
    const resulta4_ppn_1111 = document.getElementById('a4_ppn_1111');
    resulta4_ppn_1111.value = hasila4_dpp_1111.toLocaleString();
    
    const a5_dpp_1111 = $('#a5_dpp_1111').val();
    retVala5_dpp_1111=a5_dpp_1111 ? parseFloat(a5_dpp_1111.replace(/,/g, '')) : 0;
    const hasila5_dpp_1111 = (retVala5_dpp_1111*11)/100;
    const resulta5_ppn_1111 = document.getElementById('a5_ppn_1111');
    resulta5_ppn_1111.value = hasila5_dpp_1111.toLocaleString();
    
    const jumlah_dpp1111 = retValekspor_1111+retVala2_dpp_1111+retVala3_dpp_1111+retVala4_dpp_1111+retVala5_dpp_1111;
    const jumlah_ppn1111 = hasila2_dpp_1111+hasila3_dpp_1111+hasila4_dpp_1111+hasila5_dpp_1111;
    const resulta_jumlah_dpp_1111 = document.getElementById('a_jumlah_dpp_1111');
    const resulta_jumlah_ppn_1111 = document.getElementById('a_jumlah_ppn_1111');
    resulta_jumlah_dpp_1111.value = jumlah_dpp1111.toLocaleString();
    resulta_jumlah_ppn_1111.value = jumlah_ppn1111.toLocaleString();
    
    const b_tidak_terutang_dpp_1111 = $('#b_tidak_terutang_dpp_1111').val();
    retValb_tidak_terutang_dpp_1111=b_tidak_terutang_dpp_1111 ? parseFloat(b_tidak_terutang_dpp_1111.replace(/,/g, '')) : 0;
    const jumlahpenyerahan =jumlah_dpp1111+retValb_tidak_terutang_dpp_1111;
    const resultc_jumlahpenyerahan_dpp_1111 = document.getElementById('c_jumlahpenyerahan_dpp_1111');
    resultc_jumlahpenyerahan_dpp_1111.value = jumlahpenyerahan.toLocaleString();
    
    const resultdua_a_pajak_keluaran_ppn_1111 = document.getElementById('dua_a_pajak_keluaran_ppn_1111');
    resultdua_a_pajak_keluaran_ppn_1111.value = hasila2_dpp_1111.toLocaleString();
    
    
    const dua_b_pajak_keluaran_ppn_1111 = $('#dua_b_pajak_keluaran_ppn_1111').val();
    retValdua_b_pajak_keluaran_ppn_1111=dua_b_pajak_keluaran_ppn_1111 ? parseFloat(dua_b_pajak_keluaran_ppn_1111.replace(/,/g, '')) : 0;
    const dua_c_pajak_keluaran_ppn_1111 = $('#dua_c_pajak_keluaran_ppn_1111').val();
    retValdua_c_pajak_keluaran_ppn_1111=dua_c_pajak_keluaran_ppn_1111 ? parseFloat(dua_c_pajak_keluaran_ppn_1111.replace(/,/g, '')) : 0;
    const resultdua_d_pajak_keluaran_ppn_1111 = document.getElementById('dua_d_pajak_keluaran_ppn_1111');
    const hasilIID = hasila2_dpp_1111-retValdua_b_pajak_keluaran_ppn_1111-retValdua_c_pajak_keluaran_ppn_1111;
    if(hasilIID<0){
        resultdua_d_pajak_keluaran_ppn_1111.value = 0;
    }else{
        resultdua_d_pajak_keluaran_ppn_1111.value = hasilIID.toLocaleString();
    }
    const dua_e_pajak_keluaran_ppn_1111 = $('#dua_e_pajak_keluaran_ppn_1111').val();
    retValdua_e_pajak_keluaran_ppn_1111=dua_e_pajak_keluaran_ppn_1111 ? parseFloat(dua_e_pajak_keluaran_ppn_1111.replace(/,/g, '')) : 0;
    const resultdua_f_pajak_keluaran_ppn_1111 = document.getElementById('dua_f_pajak_keluaran_ppn_1111');
    const hasilIIF = hasilIID-retValdua_e_pajak_keluaran_ppn_1111;
    if(hasilIIF<0){
        resultdua_f_pajak_keluaran_ppn_1111.value = 0;
    }else{
        resultdua_f_pajak_keluaran_ppn_1111.value = hasilIIF.toLocaleString();
    }
    
    const resultlima_a_ppn_terutang_1111 = document.getElementById('lima_a_ppn_terutang_1111');
    resultlima_a_ppn_terutang_1111.value = hasila2_dpp_1111.toLocaleString();
    const lima_b_ppn_terutang_1111 = $('#lima_b_ppn_terutang_1111').val();
    retVallima_b_ppn_terutang_1111=lima_b_ppn_terutang_1111 ? parseFloat(lima_b_ppn_terutang_1111.replace(/,/g, '')) : 0;
    const resultlima_c_ppn_terutang_1111 = document.getElementById('lima_c_ppn_terutang_1111');
    const hasilVC = hasila2_dpp_1111-retVallima_b_ppn_terutang_1111;
    if(hasilVC<0){
        resultlima_c_ppn_terutang_1111.value = 0;
    }else{
        resultlima_c_ppn_terutang_1111.value = hasilVC.toLocaleString();
    }
    
    const lima_d_ppn_terutang_1111 = $('#lima_d_ppn_terutang_1111').val();
    retVallima_d_ppn_terutang_1111=lima_d_ppn_terutang_1111 ? parseFloat(lima_d_ppn_terutang_1111.replace(/,/g, '')) : 0;
    const resultlima_e_ppn_terutang_1111 = document.getElementById('lima_e_ppn_terutang_1111');
    const hasilVE = hasilVC-retVallima_d_ppn_terutang_1111;
    if(hasilVE<0){
        resultlima_e_ppn_terutang_1111.value = 0;
    }else{
        resultlima_e_ppn_terutang_1111.value = hasilVE.toLocaleString();
    }

    var hidden_lebih_bayar = document.getElementById("hidden_lebih_bayar");

    if (hasila2_dpp_1111 > retValdua_c_pajak_keluaran_ppn_1111) {
        hidden_lebih_bayar.style.display = 'none';
      
    } else {
        hidden_lebih_bayar.style.display = 'block';
       
    }
    return retVal.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}
$(document).ready(function(){
    $('#nav-1111AB-tab').on('shown.bs.tab',function(e){
        var activeTab = $(e.target).attr('href');
        var inputValue = $(activeTab + ' input ').val();
    })
});

function togglePasal() {
    var dua_h_khusus_1111 = document.getElementById("dua_h_khusus_1111");
    var hidden_h_pasal = document.getElementById("hidden_h_pasal");
    if (dua_h_khusus_1111.value === "0") {
        hidden_h_pasal.style.display = 'none';
    }else{
        hidden_h_pasal.style.display = 'block';
    }
}
function togglediminta() {
    var dua_h_diminta_untuk_1111 = document.getElementById("dua_h_diminta_untuk_1111");
    var hidden_diminta_untuk = document.getElementById("hidden_diminta_untuk");
    if (dua_h_diminta_untuk_1111.value === "2") {
        hidden_diminta_untuk.style.display = 'block';
    }else{
        hidden_diminta_untuk.style.display = 'none';
    }
}
function toggleformulir() {
    var formulir_1111 = document.getElementById("formulir_1111");
    var lima_formulir_1111 = document.getElementById("hidden_formulir");
    if (formulir_1111.value === "7") {
        lima_formulir_1111.style.display = 'block';
    }else if(formulir_1111.value === "8"){
        lima_formulir_1111.style.display = 'block';
    }else{
        lima_formulir_1111.style.display = 'none';
    }
}
