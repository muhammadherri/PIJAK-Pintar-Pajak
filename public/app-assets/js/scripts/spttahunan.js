
document.addEventListener('DOMContentLoaded', function() {
    // 1771 I
    const input1a = document.getElementById('a1_penghasilan_netto_1771i');
    const input1b = document.getElementById('b1_penghasilan_netto_1771i');
    const input1c = document.getElementById('c1_penghasilan_netto_1771i');
    const input1e = document.getElementById('e1_penghasilan_netto_1771i');
    const input1f = document.getElementById('f1_penghasilan_netto_1771i');
    const input2 = document.getElementById('penghasilan_netto_luar_negeri_1771i');
    const input4 = document.getElementById('penghasilan_1771i');

    const input5a = document.getElementById('a5_penyesuaian_fiskal_1771i');
    const input5b = document.getElementById('b5_penyesuaian_fiskal_1771i');
    const input5c = document.getElementById('c5_penyesuaian_fiskal_1771i');
    const input5d = document.getElementById('d5_penyesuaian_fiskal_1771i');
    const input5e = document.getElementById('e5_penyesuaian_fiskal_1771i');
    const input5f = document.getElementById('f5_penyesuaian_fiskal_1771i');
    const input5g = document.getElementById('g5_penyesuaian_fiskal_1771i');
    const input5h = document.getElementById('h5_penyesuaian_fiskal_1771i');
    const input5i = document.getElementById('i5_penyesuaian_fiskal_1771i');
    const input5j = document.getElementById('j5_penyesuaian_fiskal_1771i');
    const input5k = document.getElementById('k5_penyesuaian_fiskal_1771i');
    const input5l = document.getElementById('l5_penyesuaian_fiskal_1771i');

    const input6a = document.getElementById('a6_fiskal_negatif_1771i');
    const input6b = document.getElementById('b6_fiskal_negatif_1771i');
    const input6c = document.getElementById('c6_fiskal_negatif_1771i');
    const input6d = document.getElementById('d6_fiskal_negatif_1771i');
    const input7 = document.getElementById('fasilitas_1771i');

    const result1d = document.getElementById('d1_penghasilan_netto_1771i');
    const result1g = document.getElementById('g1_penghasilan_netto_1771i');
    const result1h = document.getElementById('h1_penghasilan_netto_1771i');

    const result3 = document.getElementById('jumlah_1771i');

    const result5m = document.getElementById('m5_penyesuaian_fiskal_1771i');
    const result6e = document.getElementById('e6_fiskal_negatif_1771i');
    const result8 = document.getElementById('netto_fiskal_1771i');

    [input1a,input1b,input1c,input1e,input1f,input2,input4,input5a,input5b,input5c
    ,input5d,input5e,input5f,input5g,input5h,input5i,input5j,input5k
    ,input5l,input6a,input6b,input6c,input6d,input7]
    .forEach(input => {
        input.addEventListener('input', updateResult);
    });

    function updateResult() {
        
        const uraian1a = parseFloat(input1a.value) || 0;
        const uraian1b = parseFloat(input1b.value) || 0;
        const uraian1c = parseFloat(input1c.value) || 0;
        const hasil1d = uraian1a - uraian1b - uraian1c;
        if(hasil1d<0){
            result1d.value=0;
        }else{
            result1d.value=hasil1d;
        }
        const uraian1e = parseFloat(input1e.value) || 0;
        const uraian1f = parseFloat(input1f.value) || 0;
        const hasil1g = uraian1e - uraian1f;
        if(hasil1g<0){
            result1g.value=0;
        }else{
            result1g.value=hasil1g;
        }

        const hasil1h=hasil1d+hasil1g;
        if(hasil1h<0){
            result1h.value=0;
        }else{
            result1h.value=hasil1h;
        }

        const uraian2 = parseFloat(input2.value) || 0;
        const hasil3=hasil1h+uraian2;
        if(hasil3<0){
            result3.value=0;
        }else{
            result3.value=hasil3;
        }

        const uraian5a = parseFloat(input5a.value) || 0;
        const uraian5b = parseFloat(input5b.value) || 0;
        const uraian5c = parseFloat(input5c.value) || 0;
        const uraian5d = parseFloat(input5d.value) || 0;
        const uraian5e = parseFloat(input5e.value) || 0;
        const uraian5f = parseFloat(input5f.value) || 0;
        const uraian5g = parseFloat(input5g.value) || 0;
        const uraian5h = parseFloat(input5h.value) || 0;
        const uraian5i = parseFloat(input5i.value) || 0;
        const uraian5j = parseFloat(input5j.value) || 0;
        const uraian5k = parseFloat(input5k.value) || 0;
        const uraian5l = parseFloat(input5l.value) || 0;
        const hasil5m = uraian5a+uraian5b+uraian5c+uraian5d+uraian5e+uraian5f+uraian5g+uraian5h+uraian5i+uraian5j+uraian5k+uraian5l;           
        result5m.value=hasil5m;
        
        const uraian6a = parseFloat(input6a.value) || 0;
        const uraian6b = parseFloat(input6b.value) || 0;
        const uraian6c = parseFloat(input6c.value) || 0;
        const uraian6d = parseFloat(input6d.value) || 0;
        const hasil6e = uraian6a+uraian6b+uraian6c+uraian6d;           
        result6e.value=hasil6e;
        
        const uraian7 = parseFloat(input7.value) || 0;
        const uraian4 = parseFloat(input4.value) || 0;
        const hasil8 = hasil3-uraian4+hasil5m-hasil6e-uraian7; 
        if(hasil8<0){
            result8.value=0;       
        }else{
            result8.value=hasil8;       
        }
    };    

    const inputElementI = document.getElementById('npwp_1771i');
    const errorTextI = document.getElementById('errorNpwp_1771i');
    inputElementI.addEventListener('input', function() {
        const inputValue = inputElementI.value;

        if (inputValue.length > 15) {
            inputElementI.value = inputValue.slice(0, 15);
            errorTextI.textContent = 'Maksimal 15 digit';
        } else {
            errorTextI.textContent = '';
        }
    });

    const nama_npwpInputI = document.getElementById('nama_npwp_1771i');
    const errornamaNpwpTextI = document.getElementById('errornamaNpwp_1771i');
    nama_npwpInputI.addEventListener('input', function() {
        const inputValue = nama_npwpInputI.value;

        if (inputValue.length > 30) {
            nama_npwpInputI.value = inputValue.slice(0, 30);
            errornamaNpwpTextI.textContent = 'Maksimal 30 digit';
        } else {
            errornamaNpwpTextI.textContent = '';
        }
    });
    // 1771 I
    // 1771 II
    const nama_npwp_1771IIInput = document.getElementById('nama_npwp_1771II');
    const errornamaNpwp_1771IIText = document.getElementById('errornamaNpwp_1771II');
    nama_npwp_1771IIInput.addEventListener('input', function() {
        const inputValue = nama_npwp_1771IIInput.value;

        if (inputValue.length > 30) {
            nama_npwp_1771IIInput.value = inputValue.slice(0, 30);
            errornamaNpwp_1771IIText.textContent = 'Maksimal 30 digit';
        } else {
            errornamaNpwp_1771IIText.textContent = '';
        }
    });
    const npwp_1771IIInput = document.getElementById('npwp_1771II');
    const errornpwp_1771IIText = document.getElementById('errornpwp_1771II');
    npwp_1771IIInput.addEventListener('input', function() {
        const inputValue = npwp_1771IIInput.value;

        if (inputValue.length > 15) {
            npwp_1771IIInput.value = inputValue.slice(0, 15);
            errornpwp_1771IIText.textContent = 'Maksimal 15 digit';
        } else {
            errornpwp_1771IIText.textContent = '';
        }
    });

    const tablelist_1771II = document.querySelector('#list_1771II tbody');
    const addBtnadd1771ii = document.querySelector('#btn-add1771ii');
    addBtnadd1771ii.addEventListener('click', function() {
        const newRow = `
        <tr>
            <td width="auto" class="text-center" value="">
                <input required autocomplete="off"
                    type="text" name="angkapembelianbarang[]"
                    id="angkapembelianbarang[]" min="0"
                    class="form-control" />
            </td>
            <td class="text-center">
                <input required autocomplete="off"
                    type="number" name="angkaharpok1[]"
                    id="angkaharpok1[]" min="0"
                    class="form-control sub_harpok" />
            </td>
            <td class="text-center">
                <input required autocomplete="off"
                    type="number" name="angkabiaya_usaha1[]"
                    id="angkabiaya_usaha1[]" min="0"
                    class="form-control sub_biaya_usaha" />
            </td>
            <td class="text-center">
                <input required autocomplete="off"
                    type="number" name="angkabiaya_luar1[]"
                    id="angkabiaya_luar1[]" min="0"
                    class="form-control sub_biaya_luar" />
            </td>
            <td class="text-center">
                <input readonly autocomplete="off"
                    type="number" name="subjum1[]"
                    id="subjum1[]" min="0"
                    class="form-control jumlahtotal" />
            </td>
            <td><button type="button" class="btn btn-danger btn-remove-1771ii"><i
                class="fa fa-trash"></i>
            </td>
        </tr>
        `;
        tablelist_1771II.insertAdjacentHTML('beforeend', newRow);
    });
    tablelist_1771II.addEventListener('input', function(event) {
        const target = event.target;
        if (target.tagName === 'INPUT' && target.name.startsWith('angka')) {
            const row = target.closest('tr');
            const harpok1 = parseFloat(row.querySelector('input[name="angkaharpok1[]"]').value) || 0;
            const biaya_usaha1 = parseFloat(row.querySelector('input[name="angkabiaya_usaha1[]"]').value) || 0;
            const biaya_luar1 = parseFloat(row.querySelector('input[name="angkabiaya_luar1[]"]').value) || 0;
            const hasiljumlah1 = row.querySelector('input[name="subjum1[]"]');
            const sum = harpok1 + biaya_usaha1 + biaya_luar1;
            hasiljumlah1.value = sum;

            var totalharpok = 0
            var totalbiaya_usaha = 0
            var totalbiaya_luar = 0
            var totalsub_jumlah = 0

            var pengurangharpok = 0
            var pengurangbiaya_usaha = 0
            var pengurangbiaya_luar = 0
            var pengurangsub_jumlah = 0

            $(".sub_harpok").each(function() {
                totalharpok += +$(this).val();
            });
            $(".sub_biaya_usaha").each(function() {
                totalbiaya_usaha += +$(this).val();
            });
            $(".sub_biaya_luar").each(function() {
                totalbiaya_luar += +$(this).val();
            });
            $(".jumlahtotal").each(function() {
                totalsub_jumlah += +$(this).val();
            });

            $(".pengurangan_harpok").each(function() {
                pengurangharpok += +$(this).val();
            });
            $(".pengurangan_biayausaha").each(function() {
                pengurangbiaya_usaha += +$(this).val();
            });
            $(".pengurangan_biayaluar").each(function() {
                pengurangbiaya_luar += +$(this).val();
            });
            $(".pengurangan_subjum").each(function() {
                pengurangsub_jumlah += +$(this).val();
            });

            const totalharpoknol = totalharpok-pengurangharpok;
            if(totalharpoknol<0){
                $('.total_harpok').val(0);
            }else{
                $('.total_harpok').val(totalharpoknol);
            }
            
            const totalbiayausahanol = totalbiaya_usaha-pengurangbiaya_usaha;
            if(totalbiayausahanol<0){
                $('.total_biayausaha').val(0);
            }else{
                $('.total_biayausaha').val(totalbiayausahanol);
            }
            
            const totalbiayaluarnol = totalbiaya_luar-pengurangbiaya_luar;
            if(totalbiayaluarnol<0){
                $('.total_biayaluar').val(0);
            }else{
                $('.total_biayaluar').val(totalbiayaluarnol);
            }
            
            const totalnol = totalsub_jumlah-pengurangsub_jumlah;
            if(totalnol<0){
                $('.total').val(0);
            }else{
                $('.total').val(totalnol);
            }
        }
    });
    tablelist_1771II.addEventListener('click', function(event) {
        if (event.target.classList.contains('btn-remove-1771ii')) {
            const row = event.target.closest('tr');
            row.remove();
        }
    });
// 1771 II
// 1771 III
    const tablekredit = document.querySelector('#list_1771III tbody');
    const addBtnaddkredit = document.querySelector('#btn-addkredit');
    addBtnaddkredit.addEventListener('click', function() {
        const newRow = `
        <tr>
            <td class="text-center">
                <input required autocomplete="off" type="text" name="kreditnama[]" id="kreditnama[]"
                    class="form-control" />
            </td>
            <td class="text-center">
                <input required autocomplete="off" type="number" name="kreditnpwp[]" id="kreditnpwp[]" min="0"
                    class="form-control" />
            </td>
            <td class="text-center">
                <input required autocomplete="off" type="text" name="kredittrx[]" id="kredittrx[]"
                    class="form-control" />
            </td>
            <td class="text-center">
                <input required autocomplete="off" type="number" name="kreditrp[]" id="kreditrp[]" min="0"
                    class="form-control subrupiah" />
            </td>
            <td class="text-center">
                <input required autocomplete="off" type="number" name="kreditpajak[]" id="kreditpajak[]" min="0"
                    class="form-control subpajak" />
            </td>
            <td class="text-center">
                <input required autocomplete="off" type="number" name="kreditnomor[]" id="kreditnomor[]" min="0"
                    class="form-control" />
            </td>
            <td class="text-center">
                <input required autocomplete="off" type="date" name="kredittgl[]" id="kredittgl[]"
                    class="form-control" />
            </td>
            <td><button type="button" class="btn btn-danger btn-remove-kredit"><i
                class="fa fa-trash"></i>
            </td>
        </tr>
        `;
        tablekredit.insertAdjacentHTML('beforeend', newRow);
    });
    tablekredit.addEventListener('input', function(event) {
        const target = event.target;
        if (target.tagName === 'INPUT' && target.name.startsWith('kredit')) {
            var totalrupiah= 0
            var totalpenghasilan= 0

            $(".subrupiah").each(function() {
                totalrupiah += +$(this).val();
            });
            $(".subpajak").each(function() {
                totalpenghasilan += +$(this).val();
            });
            
            $('.jumlahrupiah').val(totalrupiah);
            $('.jumlahpenghasilan').val(totalpenghasilan);
            
        }
    });
    tablekredit.addEventListener('click', function(event) {
        if (event.target.classList.contains('btn-remove-kredit')) {
            const row = event.target.closest('tr');
            row.remove();
        }
    });

    const nama_npwp_1771IIIInput = document.getElementById('nama_npwp_1771III');
    const errornamaNpwp_1771IIIText = document.getElementById('errornamaNpwp_1771III');
    nama_npwp_1771IIIInput.addEventListener('input', function() {
        const inputValue = nama_npwp_1771IIIInput.value;

        if (inputValue.length > 30) {
            nama_npwp_1771IIIInput.value = inputValue.slice(0, 30);
            errornamaNpwp_1771IIIText.textContent = 'Maksimal 30 digit';
        } else {
            errornamaNpwp_1771IIIText.textContent = '';
        }
    });
    const npwp_1771IIIInput = document.getElementById('npwp_1771III');
    const errornpwp_1771IIIText = document.getElementById('errornpwp_1771III');
    npwp_1771IIIInput.addEventListener('input', function() {
        const inputValue = npwp_1771IIIInput.value;

        if (inputValue.length > 15) {
            npwp_1771IIIInput.value = inputValue.slice(0, 15);
            errornpwp_1771IIIText.textContent = 'Maksimal 15 digit';
        } else {
            errornpwp_1771IIIText.textContent = '';
        }
    });
// 1771 III
// 1771 IV
const nama_npwp_1771IVInput = document.getElementById('nama_npwp_1771IV');
const errornamaNpwp_1771IVText = document.getElementById('errornamaNpwp_1771IV');
nama_npwp_1771IVInput.addEventListener('input', function() {
    const inputValue = nama_npwp_1771IVInput.value;

    if (inputValue.length > 30) {
        nama_npwp_1771IVInput.value = inputValue.slice(0, 30);
        errornamaNpwp_1771IVText.textContent = 'Maksimal 30 digit';
    } else {
        errornamaNpwp_1771IVText.textContent = '';
    }
});
const npwp_1771IVInput = document.getElementById('npwp_1771IV');
const errornpwp_1771IVText = document.getElementById('errornpwp_1771IV');
npwp_1771IVInput.addEventListener('input', function() {
    const inputValue = npwp_1771IVInput.value;

    if (inputValue.length > 15) {
        npwp_1771IVInput.value = inputValue.slice(0, 15);
        errornpwp_1771IVText.textContent = 'Maksimal 15 digit';
    } else {
        errornpwp_1771IVText.textContent = '';
    }
});

const tablelist_1771IV = document.querySelector('#list_1771IV tbody');
const addBtnadd1771iva = document.querySelector('#btn-add1771iva');
addBtnadd1771iva.addEventListener('click', function() {
    const newRow = `
    <tr>
        <td width="auto" class="text-center">
            <input required autocomplete="off"
            type="text"
            name="jenispenghasilan[]"
            id="jenispenghasilan[]"
            class="form-control" />
        </td>
        <td class="text-center">
            <input required autocomplete="off"
                type="number"
                name="angka_pengenaan_pajak[]"
                id="angka_pengenaan_pajak[]"
                min="0"
                class="form-control sub_pengenaanpajak" />
        </td>
        <td class="text-center">
            <input required autocomplete="off"
                type="number"
                name="angka_tarif_potongan[]"
                id="angka_tarif_potongan[]"
                min="0"
                class="form-control sub_tarifpotongan" />
        </td>
        <td class="text-center">
            <input readonly autocomplete="off"
                type="number"
                name="angka_pph_terutang[]"
                id="angka_pph_terutang[]" min="0"
                class="form-control sub_terutang" />
        </td>
        <td><button type="button" class="btn btn-danger btn-remove-1771iva"><i
            class="fa fa-trash"></i>
        </td>
    </tr>
    `;
    tablelist_1771IV.insertAdjacentHTML('beforeend', newRow);
});
tablelist_1771IV.addEventListener('input', function(event) {
    const target = event.target;
    if (target.tagName === 'INPUT' && target.name.startsWith('angka')) {
        const row = target.closest('tr');
        const pengenaanpajak = parseFloat(row.querySelector('input[name="angka_pengenaan_pajak[]"]').value) || 0;
        const tarif = parseFloat(row.querySelector('input[name="angka_tarif_potongan[]"]').value) || 0;
        const hasiljumlah1 = row.querySelector('input[name="angka_pph_terutang[]"]');
        const sum = pengenaanpajak * tarif/100;
        hasiljumlah1.value = sum;

        var total_pengenaanpajak = 0
        var total_tarifpotongan = 0
        var totalterutang = 0

        $(".sub_pengenaanpajak").each(function() {
            total_pengenaanpajak += +$(this).val();
        });
        $(".sub_tarifpotongan").each(function() {
            total_tarifpotongan += +$(this).val();
        });
        
        $(".sub_terutang").each(function() {
            totalterutang += +$(this).val();
        });

        $('.total_kena_pajak').val(total_pengenaanpajak);
        $('.total_tarif_potongan').val(total_tarifpotongan);
        $('.total_terutang').val(totalterutang);

    }
});
tablelist_1771IV.addEventListener('click', function(event) {
    if (event.target.classList.contains('btn-remove-1771iva')) {
        const row = event.target.closest('tr');
        row.remove();
    }
});

const tablelist_1771IVB = document.querySelector('#list_1771IVB tbody');
const addBtnadd1771ivb = document.querySelector('#btn-add1771ivb');
addBtnadd1771ivb.addEventListener('click', function() {
    const newRow = `
    <tr>
        <td width="auto" class="text-center">
            <input required autocomplete="off"
                type="text"
                name="jenis_penghasilan[]"
                id="jenis_penghasilan[]"
                class="form-control" />
        </td>
        <td class="text-center">
            <input required autocomplete="off"
                type="number"
                name="angka_penghasilan_bruto[]"
                id="angka_penghasilan_bruto[]"
                min="0"
                class="form-control sub_penghasilan_bruto" />
        </td>
        <td><button type="button" class="btn btn-danger btn-remove-1771ivb"><i
            class="fa fa-trash"></i>
        </td>
    </tr>
    `;
    tablelist_1771IVB.insertAdjacentHTML('beforeend', newRow);
});
tablelist_1771IVB.addEventListener('input', function(event) {
    const target = event.target;
    if (target.tagName === 'INPUT' && target.name.startsWith('angka')) {

        var total_bruto = 0

        $(".sub_penghasilan_bruto").each(function() {
            total_bruto += +$(this).val();
        });
    
        $('.total_bruto').val(total_bruto);

    }
});
tablelist_1771IVB.addEventListener('click', function(event) {
    if (event.target.classList.contains('btn-remove-1771ivb')) {
        const row = event.target.closest('tr');
        row.remove();
    }
});
// 1771 IV
// 1771 V
const nama_npwp_1771VInput = document.getElementById('nama_npwp_1771V');
const errornamaNpwp_1771VText = document.getElementById('errornamaNpwp_1771V');
nama_npwp_1771VInput.addEventListener('input', function() {
    const inputValue = nama_npwp_1771VInput.value;

    if (inputValue.length > 30) {
        nama_npwp_1771VInput.value = inputValue.slice(0, 30);
        errornamaNpwp_1771VText.textContent = 'Maksimal 30 digit';
    } else {
        errornamaNpwp_1771VText.textContent = '';
    }
});
const npwp_1771VInput = document.getElementById('npwp_1771V');
const errornpwp_1771VText = document.getElementById('errornpwp_1771V');
npwp_1771VInput.addEventListener('input', function() {
    const inputValue = npwp_1771VInput.value;

    if (inputValue.length > 15) {
        npwp_1771VInput.value = inputValue.slice(0, 15);
        errornpwp_1771VText.textContent = 'Maksimal 15 digit';
    } else {
        errornpwp_1771VText.textContent = '';
    }
});
const tablelist1771V = document.querySelector('#list_1771V tbody');
const addBtnaddlist1771V = document.querySelector('#btn-add1771V');
addBtnaddlist1771V.addEventListener('click', function() {
    const newRow = `
    <tr>
        <td width="auto" class="text-center">
            <input required autocomplete="off"
                type="text"
                name="pemegangsh_nama_1771V[]"
                id="pemegangsh_nama_1771V[]" min="0"
                class="form-control" />
        </td>
        <td class="text-center">
            <input required autocomplete="off"
                type="text"
                name="pemegangsh_alamat_nama_1771V[]"
                id="pemegangsh_alamat_nama_1771V[]"
                min="0" class="form-control" />
        </td>
        <td class="text-center">
            <input required autocomplete="off"
                type="number"
                name="pemegangsh_npwp_1771V[]"
                id="pemegangsh_npwp_1771V[]" min="0"
                class="form-control" />
        </td>
        <td class="text-center">
            <input required autocomplete="off"
                type="number"
                name="pemegangsh_modalsetor_1771V[]"
                id="pemegangsh_modalsetor_1771V[]"
                min="0"
                class="form-control submodalsetor1771v_a" />
        </td>
        <td class="text-center">
            <input required autocomplete="off"
                type="number"
                name="pemegangsh_persen_1771V[]"
                id="pemegangsh_persen_1771V[]"
                min="0" class="form-control" />
        </td>
        <td class="text-center">
            <input required autocomplete="off"
                type="number"
                name="pemegangsh_dividen_1771V[]"
                id="pemegangsh_dividen_1771V[]"
                min="0" class="form-control subdividen177v_a" />
        </td>
        <td><button type="button" class="btn btn-danger btn-remove-1771V"><i
            class="fa fa-trash"></i>
        </td>
    </tr>
    `;
    tablelist1771V.insertAdjacentHTML('beforeend', newRow);
});
tablelist1771V.addEventListener('input', function(event) {
    const target = event.target;
    if (target.tagName === 'INPUT' && target.name.startsWith('pemegangsh')) {
        const row = target.closest('tr');

        var totalmodalsetor = 0
        $(".submodalsetor1771v_a").each(function() {
            totalmodalsetor += +$(this).val();
        });
        var totaldividen = 0
        $(".subdividen177v_a").each(function() {
            totaldividen += +$(this).val();
        });

        $('.total_modalsetor').val(totalmodalsetor);
        $('.total_dividen').val(totaldividen);
    }
});
tablelist1771V.addEventListener('click', function(event) {
    if (event.target.classList.contains('btn-remove-1771V')) {
        const row = event.target.closest('tr');
        row.remove();
    }
});
const tablelist1771Vb = document.querySelector('#list_1771Vb tbody');
const addBtnaddlist1771Vb = document.querySelector('#btn-add1771Vb');
addBtnaddlist1771Vb.addEventListener('click', function() {
    const newRow = `
    <tr>
        <td width="auto" class="text-center">
            <input required autocomplete="off" type="text"
                name="pemegangshb_nama_1771V[]" id="pemegangshb_nama_1771V[]"
                min="0"
                class="form-control"/>
        </td>
        <td class="text-center">
            <input required autocomplete="off" type="text"
                name="pemegangshb_alamat_nama_1771V[]" id="pemegangshb_alamat_nama_1771V[]"
                min="0"
                class="form-control"/>
        </td>
        <td class="text-center">
            <input required autocomplete="off" type="number"
                name="pemegangshb_npwp_1771V[]"
                id="pemegangsh_npwpb_1771V[]" min="0"
                class="form-control"/>
        </td>
        <td class="text-center">
            <input required autocomplete="off" type="text"
                name="pemegangshb_jabatan_1771V[]"
                id="pemegangshb_jabatan_1771V[]" min="0"
                class="form-control submodalsetor"/>
        </td>
        <td><button type="button" class="btn btn-danger btn-remove-1771Vb"><i
            class="fa fa-trash"></i>
        </td>
    </tr>
    `;
    tablelist1771Vb.insertAdjacentHTML('beforeend', newRow);
});
tablelist1771Vb.addEventListener('input', function(event) {
    const target = event.target;
    if (target.tagName === 'INPUT' && target.name.startsWith('pemegangshb')) {
        const row = target.closest('tr');
        // const pengenaanpajak = parseFloat(row.querySelector('input[name="pemegangsh_modalsetor_1771V[]"]').value) || 0;
        // const tarif = parseFloat(row.querySelector('input[name="pemegangsh_dividen_1771V[]"]').value) || 0;
        // const hasiljumlah1 = row.querySelector('input[name="angka_pph_terutang[]"]');
        // const sum = pengenaanpajak * tarif/100;
        // hasiljumlah1.value = sum;
    }
});
tablelist1771Vb.addEventListener('click', function(event) {
    if (event.target.classList.contains('btn-remove-1771Vb')) {
        const row = event.target.closest('tr');
        row.remove();
    }
});
// 1771 V
// 1771 VI
const nama_npwp_1771VIInput = document.getElementById('nama_npwp_1771VI');
const errornamaNpwp_1771VIText = document.getElementById('errornamaNpwp_1771VI');
nama_npwp_1771VIInput.addEventListener('input', function() {
    const inputValue = nama_npwp_1771VIInput.value;

    if (inputValue.length > 30) {
        nama_npwp_1771VIInput.value = inputValue.slice(0, 30);
        errornamaNpwp_1771VIText.textContent = 'Maksimal 30 digit';
    } else {
        errornamaNpwp_1771VIText.textContent = '';
    }
});
const npwp_1771VIInput = document.getElementById('npwp_1771VI');
const errornpwp_1771VIText = document.getElementById('errornpwp_1771VI');
npwp_1771VIInput.addEventListener('input', function() {
    const inputValue = npwp_1771VIInput.value;

    if (inputValue.length > 15) {
        npwp_1771VIInput.value = inputValue.slice(0, 15);
        errornpwp_1771VIText.textContent = 'Maksimal 15 digit';
    } else {
        errornpwp_1771VIText.textContent = '';
    }
});
const tablelist1771VI = document.querySelector('#list_1771VI tbody');
const addBtnaddlist1771VI = document.querySelector('#btn-add1771VI');
addBtnaddlist1771VI.addEventListener('click', function() {
    const newRow = `
    <tr>
        <td width="auto" class="text-center">
            <input required autocomplete="off" type="text"
                name="penyertaan_nama[]" id="penyertaan_nama[]"
                min="0"
                class="form-control"/>
        </td>
        <td class="text-center">
            <input required autocomplete="off" type="text"
                name="penyertaan_alamat[]" id="penyertaan_alamat[]"
                min="0"
                class="form-control"/>
        </td>
        <td class="text-center">
            <input required autocomplete="off" type="number"
                name="penyertaan_npwp[]"
                id="penyertaan_npwp[]" min="0"
                class="form-control"/>
        </td>
        <td class="text-center">
            <input required autocomplete="off" type="number"
                name="penyertaan_modal[]"
                id="penyertaan_modal[]" min="0"
                class="form-control submodalafiliasi"/>
        </td>
        <td class="text-center">
            <input required autocomplete="off" type="number"
                name="penyertaan_persen[]"
                id="penyertaan_persen[]" min="0"
                class="form-control"/>
        </td>
        <td><button type="button" class="btn btn-danger btn-remove-1771VI"><i
            class="fa fa-trash"></i>
        </td>
    </tr>
    `;
    tablelist1771VI.insertAdjacentHTML('beforeend', newRow);
});
tablelist1771VI.addEventListener('input', function(event) {
    const target = event.target;
    if (target.tagName === 'INPUT' && target.name.startsWith('penyertaan')) {
        const row = target.closest('tr');
        // const pengenaanpajak = parseFloat(row.querySelector('input[name="pemegangsh_modalsetor_1771V[]"]').value) || 0;
        // const tarif = parseFloat(row.querySelector('input[name="pemegangsh_dividen_1771V[]"]').value) || 0;
        // const hasiljumlah1 = row.querySelector('input[name="angka_pph_terutang[]"]');
        // const sum = pengenaanpajak * tarif/100;
        // hasiljumlah1.value = sum;
        var totalmodalafiliasi = 0
        $(".submodalafiliasi").each(function() {
            totalmodalafiliasi += +$(this).val();
        });

        $('.total_modalafiliasi').val(totalmodalafiliasi);
    }
});
tablelist1771VI.addEventListener('click', function(event) {
    if (event.target.classList.contains('btn-remove-1771VI')) {
        const row = event.target.closest('tr');
        row.remove();
    }
});

const tablelist1771VIb = document.querySelector('#list_1771VIb tbody');
const addBtnaddlist1771VIb = document.querySelector('#btn-add1771VIb');
addBtnaddlist1771VIb.addEventListener('click', function() {
    const newRow = `
    <tr>
        <td width="auto" class="text-center">
            <input required autocomplete="off" type="text"
                name="penyertaan_namab[]" id="penyertaan_namab[]"
                min="0"
                class="form-control"/>
        </td>
        <td class="text-center">
            <input required autocomplete="off" type="number"
                name="penyertaan_npwpb[]"
                id="penyertaan_npwpb[]" min="0"
                class="form-control"/>
        </td>
        <td class="text-center">
            <input required autocomplete="off" type="number"
                name="penyertaan_jumlahpinjamanb[]"
                id="penyertaan_jumlahpinjamanb[]" min="0"
                class="form-control"/>
        </td>
        <td class="text-center">
            <input required autocomplete="off" type="date"
                name="penyertaan_thnpinjamanb[]"
                id="penyertaan_thnpinjamanb[]" min="0"
                class="form-control"/>
        </td>
        <td class="text-center">
            <input required autocomplete="off" type="number"
                name="penyertaan_bungapinjamanb[]"
                id="penyertaan_bungapinjamanb[]" min="0"
                class="form-control"/>
        </td>
        <td><button type="button" class="btn btn-danger btn-remove-1771VIb"><i
            class="fa fa-trash"></i>
        </td>
    </tr>
    `;
    tablelist1771VIb.insertAdjacentHTML('beforeend', newRow);
});
tablelist1771VIb.addEventListener('input', function(event) {
    const target = event.target;
    if (target.tagName === 'INPUT' && target.name.startsWith('penyertaan')) {
        const row = target.closest('tr');
        
    }
});
tablelist1771VIb.addEventListener('click', function(event) {
    if (event.target.classList.contains('btn-remove-1771VIb')) {
        const row = event.target.closest('tr');
        row.remove();
    }
});
const tablelist1771VIc = document.querySelector('#list_1771VIc tbody');
const addBtnaddlist1771VIc = document.querySelector('#btn-add1771VIc');
addBtnaddlist1771VIc.addEventListener('click', function() {
    const newRow = `
    <tr>
        <td width="auto" class="text-center">
            <input required autocomplete="off" type="text"
                name="penyertaan_namac[]" id="penyertaan_namac[]"
                min="0"
                class="form-control"/>
        </td>
        <td class="text-center">
            <input required autocomplete="off" type="number"
                name="penyertaan_npwpc[]"
                id="penyertaan_npwpc[]" min="0"
                class="form-control"/>
        </td>
        <td class="text-center">
            <input required autocomplete="off" type="number"
                name="penyertaan_jumlahpinjamanc[]"
                id="penyertaan_jumlahpinjamanc[]" min="0"
                class="form-control"/>
        </td>
        <td class="text-center">
            <input required autocomplete="off" type="date"
                name="penyertaan_thnpinjamanc[]"
                id="penyertaan_thnpinjamanc[]" min="0"
                class="form-control"/>
        </td>
        <td class="text-center">
            <input required autocomplete="off" type="number"
                name="penyertaan_bungapinjamanc[]"
                id="penyertaan_bungapinjamanc[]" min="0"
                class="form-control"/>
        </td>
        <td><button type="button" class="btn btn-danger btn-remove-1771VIc"><i
            class="fa fa-trash"></i>
        </td>
    </tr>
    `;
    tablelist1771VIc.insertAdjacentHTML('beforeend', newRow);
});
tablelist1771VIc.addEventListener('input', function(event) {
    const target = event.target;
    if (target.tagName === 'INPUT' && target.name.startsWith('penyertaan')) {
        const row = target.closest('tr');
        
    }
});
tablelist1771VIc.addEventListener('click', function(event) {
    if (event.target.classList.contains('btn-remove-1771VIc')) {
        const row = event.target.closest('tr');
        row.remove();
    }
});

// 1771 VI

});
function laporankeuangan() {
    var laporan_keuangan = document.getElementById("laporan_keuangan");
    var kantor_akuntan = document.getElementById("kantor_akuntan");
    var npwp_kantor_akuntan = document.getElementById("npwp_kantor_akuntan");
    var akuntan_publik = document.getElementById("akuntan_publik");
    var nama_akuntan_publik = document.getElementById("nama_akuntan_publik");
    var nama_kantor_konsultan_pajak = document.getElementById("nama_kantor_konsultan_pajak");
    var npwp_kantor_konsultan_pajak = document.getElementById("npwp_kantor_konsultan_pajak");
    var nama_konsultan_pajak = document.getElementById("nama_konsultan_pajak");
    var npwp_konsultan_pajak = document.getElementById("npwp_konsultan_pajak");
    console.log(npwp.value);

    if (laporan_keuangan.value === "2") {
        kantor_akuntan.disabled = true;
        kantor_akuntan.value = '';
        npwp_kantor_akuntan.disabled = true;
        npwp_kantor_akuntan.value = '';
        akuntan_publik.disabled = true;
        akuntan_publik.value = '';
        nama_akuntan_publik.disabled = true;
        nama_akuntan_publik.value = '';
        nama_kantor_konsultan_pajak.disabled = true;
        nama_kantor_konsultan_pajak.value = '';
        npwp_kantor_konsultan_pajak.disabled = true;
        npwp_kantor_konsultan_pajak.value = '';
        nama_konsultan_pajak.disabled = true;
        nama_konsultan_pajak.value = '';
        npwp_konsultan_pajak.disabled = true;
        npwp_konsultan_pajak.value = '';
    } else {
        kantor_akuntan.disabled = false;
        npwp_kantor_akuntan.disabled = false;
        akuntan_publik.disabled = false;
        nama_akuntan_publik.disabled = false;
        nama_kantor_konsultan_pajak.disabled = false;
        npwp_kantor_konsultan_pajak.disabled = false;
        nama_konsultan_pajak.disabled = false;
        npwp_konsultan_pajak.disabled = false;
    }
}