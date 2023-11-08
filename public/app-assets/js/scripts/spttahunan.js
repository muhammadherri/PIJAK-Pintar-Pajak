
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

    // const tablelist_1771II = document.querySelector('#list_1771II tbody');
    // const addBtnadd1771ii = document.querySelector('#btn-add1771ii');
    // addBtnadd1771ii.addEventListener('click', function() {
    //     const newRow = `
    //     <tr>
    //         <td width="auto" class="text-center" value="">
    //         <select id="angkapembelianbarang[]"name="angkapembelianbarang[]"
    //             class="dropdown-groups">
    //             <option value="PEMBELIAN BAHAN/BARANG DAGANGAN">PEMBELIAN BAHAN/BARANG DAGANGAN</option>
    //             <option value="GAJI, UPAH, BONUS, GRATIFIKASI,HONORARIUM, THR, DSB">GAJI, UPAH, BONUS, GRATIFIKASI,HONORARIUM, THR, DSB</option>
    //             <option value="BIAYA TRANSPORTASI">BIAYA TRANSPORTASI</option>
    //             <option value="BIAYA PENYUSUTAN DAN AMORTISASI">BIAYA PENYUSUTAN DAN AMORTISASI</option>
    //             <option value="BIAYA SEWA">BIAYA SEWA</option>
    //             <option value="BIAYA BUNGA PINJAMAN">BIAYA BUNGA PINJAMAN</option>
    //             <option value="BIAYA SEHUBUNGAN DENGAN JASA">BIAYA SEHUBUNGAN DENGAN JASA</option>
    //             <option value="BIAYA PIUTANG TAK TERTAGIH">BIAYA PIUTANG TAK TERTAGIH</option>
    //             <option value="BIAYA ROYALTI">BIAYA ROYALTI</option>
    //             <option value="BIAYA PEMASARAN/PROMOSI">BIAYA PEMASARAN/PROMOSI</option>
    //             <option value="BIAYA LAINNYA">BIAYA LAINNYA</option>
    //             <option value="PERSEDIAAN AWAL">PERSEDIAAN AWAL</option>
    //             <option value="PERSEDIAAN AKHIR (-/-)">PERSEDIAAN AKHIR (-/-)</option>
    //         </select>
    //         </td>
    //         <td class="text-center">
    //             <input required autocomplete="off"
    //             onkeyup="this.value=sprator(this.value);"
    //             type="text" name="angkaharpok1[]"
    //                 id="angkaharpok1[]" min="0"
    //                 class="form-control sub_harpok" />
    //         </td>
    //         <td class="text-center">
    //             <input required autocomplete="off"
    //                 type="text" name="angkabiaya_usaha1[]"
    //                 onkeyup="this.value=sprator(this.value);"
    //                 id="angkabiaya_usaha1[]" min="0"
    //                 class="form-control sub_biaya_usaha" />
    //         </td>
    //         <td class="text-center">
    //             <input required autocomplete="off"
    //                 type="text" name="angkabiaya_luar1[]"
    //                 onkeyup="this.value=sprator(this.value);"
    //                 id="angkabiaya_luar1[]" min="0"
    //                 class="form-control sub_biaya_luar" />
    //         </td>
    //         <td class="text-center">
    //             <input readonly autocomplete="off"
    //                 type="text" name="subjum1[]"
    //                 id="subjum1[]" min="0"
    //                 class="form-control jumlahtotal" />
    //         </td>
    //         <td><button type="button" class="btn btn-danger btn-remove-1771ii"><i
    //             class="fa fa-trash"></i>
    //         </td>
    //     </tr>
    //     `;
    //     tablelist_1771II.insertAdjacentHTML('beforeend', newRow);
    // });
    // tablelist_1771II.addEventListener('input', function(event) {
    //     const target = event.target;
    //     if (target.tagName === 'INPUT' && target.name.startsWith('angka')) {
    //         const row = target.closest('tr');
    //         // const harpok1 = parseFloat(row.querySelector('input[name="angkaharpok1[]"]').value) || 0;
    //         const harpok1 = $(row.querySelector('[name="angkaharpok1[]"]')).val();
    //         retValharpok1=harpok1 ? parseFloat(harpok1.replace(/,/g, '')) : 0;

    //         // const biaya_usaha1 = parseFloat(row.querySelector('input[name="angkabiaya_usaha1[]"]').value) || 0;
    //         const biaya_usaha1 = $(row.querySelector('[name="angkabiaya_usaha1[]"]')).val();
    //         retValbiaya_usaha1=biaya_usaha1 ? parseFloat(biaya_usaha1.replace(/,/g, '')) : 0;
            
    //         // const biaya_luar1 = parseFloat(row.querySelector('input[name="angkabiaya_luar1[]"]').value) || 0;
    //         const biaya_luar1 = $(row.querySelector('[name="angkabiaya_luar1[]"]')).val();
    //         retValbiaya_luar1=biaya_luar1 ? parseFloat(biaya_luar1.replace(/,/g, '')) : 0;

    //         const hasiljumlah1 = row.querySelector('input[name="subjum1[]"]');
    //         const sum = retValharpok1 + retValbiaya_usaha1 + retValbiaya_luar1;
    //         hasiljumlah1.value = sum.toLocaleString();

    //         var totalharpok = 0
    //         var totalbiaya_usaha = 0
    //         var totalbiaya_luar = 0
    //         var totalsub_jumlah = 0

    //         var pengurangharpok = 0
    //         var pengurangbiaya_usaha = 0
    //         var pengurangbiaya_luar = 0
    //         var pengurangsub_jumlah = 0

    //         $(".sub_harpok").each(function() {
    //             totalharpok += +$(this).val().replace(/,/g, '');
    //         });
    //         $(".sub_biaya_usaha").each(function() {
    //             totalbiaya_usaha += +$(this).val().replace(/,/g, '');
    //         });
    //         $(".sub_biaya_luar").each(function() {
    //             totalbiaya_luar += +$(this).val().replace(/,/g, '');
    //         });
    //         $(".jumlahtotal").each(function() {
    //             totalsub_jumlah += +$(this).val().replace(/,/g, '');
    //         });

    //         $(".pengurangan_harpok").each(function() {
    //             pengurangharpok += +$(this).val().replace(/,/g, '');
    //         });
    //         $(".pengurangan_biayausaha").each(function() {
    //             pengurangbiaya_usaha += +$(this).val().replace(/,/g, '');
    //         });
    //         $(".pengurangan_biayaluar").each(function() {
    //             pengurangbiaya_luar += +$(this).val().replace(/,/g, '');
    //         });
    //         $(".pengurangan_subjum").each(function() {
    //             pengurangsub_jumlah += +$(this).val().replace(/,/g, '');
    //         });

    //         const totalharpoknol = totalharpok-pengurangharpok;
    //         if(totalharpoknol<0){
    //             $('.total_harpok').val(0);
    //         }else{
    //             $('.total_harpok').val(totalharpoknol.toLocaleString());
    //         }
            
    //         const totalbiayausahanol = totalbiaya_usaha-pengurangbiaya_usaha;
    //         if(totalbiayausahanol<0){
    //             $('.total_biayausaha').val(0);
    //         }else{
    //             $('.total_biayausaha').val(totalbiayausahanol.toLocaleString());
    //         }
            
    //         const totalbiayaluarnol = totalbiaya_luar-pengurangbiaya_luar;
    //         if(totalbiayaluarnol<0){
    //             $('.total_biayaluar').val(0);
    //         }else{
    //             $('.total_biayaluar').val(totalbiayaluarnol.toLocaleString());
    //         }
            
    //         const totalnol = totalsub_jumlah-pengurangsub_jumlah;
    //         if(totalnol<0){
    //             $('.total').val(0);
    //         }else{
    //             $('.total').val(totalnol.toLocaleString());
    //         }
    //     }
    // });
    // tablelist_1771II.addEventListener('click', function(event) {
    //     if (event.target.classList.contains('btn-remove-1771ii')) {
    //         const row = event.target.closest('tr');
    //         row.remove();
    //     }
    // });
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
                <input required autocomplete="off" type="text" name="kreditnpwp[]" id="kreditnpwp[]" min="0"
                    class="form-control" />
            </td>
            <td class="text-center">
                <input required autocomplete="off" type="text" name="kredittrx[]" id="kredittrx[]"
                    class="form-control" />
            </td>
            <td class="text-center">
                <input required autocomplete="off"
                    onkeyup="this.value=sprator(this.value);"
                    type="text" name="kreditrp[]"
                    id="kreditrp[]" min="0"
                    class="form-control subrupiah" />
            </td>
            <td class="text-center">
                <input required autocomplete="off"
                    onkeyup="this.value=sprator(this.value);"
                    type="text" name="kreditpajak[]"
                    id="kreditpajak[]" min="0"
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
                totalrupiah += +$(this).val().replace(/,/g, '');
            });
            $(".subpajak").each(function() {
                totalpenghasilan += +$(this).val().replace(/,/g, '');
            });
            
            $('.jumlahrupiah').val(totalrupiah.toLocaleString());
            $('.jumlahpenghasilan').val(totalpenghasilan.toLocaleString());
            
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

// const tablelist_1771IV = document.querySelector('#list_1771IV tbody');
// const addBtnadd1771iva = document.querySelector('#btn-add1771iva');
// addBtnadd1771iva.addEventListener('click', function() {
//     const newRow = `
//     <tr>
//         <td width="auto" class="text-center">
//         <select id="jenispenghasilan[]"name="jenispenghasilan[]"
//             class="dropdown-groups">
//             <option value="1. BUNGA DEPOSITO / TABUNGAN, DAN DISKONTO SBI / SBN">1. BUNGA DEPOSITO / TABUNGAN, DAN DISKONTO SBI / SBN</option>
//             <option value="2. BUNGA / DISKONTO OBLIGASI">2. BUNGA / DISKONTO OBLIGASI</option>
//             <option value="3. PENGHASILAN PENJUALAN SAHAM YANG DIPERDAGANGKAN DI BURSA EFEK">3. PENGHASILAN PENJUALAN SAHAM YANG DIPERDAGANGKAN DI BURSA EFEK</option>
//             <option value="4. PENGHASILAN PENJUALAN SAHAM MILIK PERUSAHAAN MODAL VENTURA">4. PENGHASILAN PENJUALAN SAHAM MILIK PERUSAHAAN MODAL VENTURA</option>
//             <option value="5. PENGHASILAN USAHA PENYALUR / DEALER / AGEN PRODUK BBM">5. PENGHASILAN USAHA PENYALUR / DEALER / AGEN PRODUK BBM</option>
//             <option value="6. PENGHASILAN PENGALIHAN HAK ATAS TANAH / BANGUNAN">6. PENGHASILAN PENGALIHAN HAK ATAS TANAH / BANGUNAN</option>
//             <option value="7. PENGHASILAN PERSEWAAN ATAS TANAH / BANGUNAN">7. PENGHASILAN PERSEWAAN ATAS TANAH / BANGUNAN</option>
//             <option value="8A. PELAKSANA KONSTRUKSI">8A. PELAKSANA KONSTRUKSI</option>
//             <option value="8B. PERENCANA KONSTRUKSI">8B. PERENCANA KONSTRUKSI</option>
//             <option value="8C. PENGAWAS KONSTRUKSI">8C. PENGAWAS KONSTRUKSI</option>
//             <option value="9. PERWAKILAN DAGANG ASING">9. PERWAKILAN DAGANG ASING</option>
//             <option value="10. PELAYARAN / PENERBANGAN ASING">10. PELAYARAN / PENERBANGAN ASING</option>
//             <option value="11. PELAYARAN DALAM NEGERI">11. PELAYARAN DALAM NEGERI</option>
//             <option value="12. PENILAIAN KEMBALI AKTIVA TETAP">12. PENILAIAN KEMBALI AKTIVA TETAP</option>
//             <option value="13. TRANSAKSI DERIVATIF YANG DIPERDAGANGKAN DI BURSA">13. TRANSAKSI DERIVATIF YANG DIPERDAGANGKAN DI BURSA</option>
//         </select>
//         </td>
//         <td class="text-center">
//             <input required autocomplete="off"
//                 type="text"
//                 onkeyup="this.value=sprator(this.value);"
//                 name="angka_pengenaan_pajak[]"
//                 id="angka_pengenaan_pajak[]"
//                 min="0"
//                 class="form-control sub_pengenaanpajak" />
//         </td>
//         <td class="text-center">
//             <input required autocomplete="off"
//                 onkeyup="this.value=sprator(this.value);"
//                 type="text"
//                 name="angka_tarif_potongan[]"
//                 id="angka_tarif_potongan[]"
//                 min="0"
//                 class="form-control sub_tarifpotongan" />
//         </td>
//         <td class="text-center">
//             <input readonly autocomplete="off"
//                 type="text"
//                 name="angka_pph_terutang[]"
//                 id="angka_pph_terutang[]" min="0"
//                 class="form-control sub_terutang" />
//         </td>
//         <td><button type="button" class="btn btn-danger btn-remove-1771iva"><i
//             class="fa fa-trash"></i>
//         </td>
//     </tr>
//     `;
//     tablelist_1771IV.insertAdjacentHTML('beforeend', newRow);
// });
// tablelist_1771IV.addEventListener('input', function(event) {
//     const target = event.target;
//     if (target.tagName === 'INPUT' && target.name.startsWith('angka')) {
//         const row = target.closest('tr');
//         // const pengenaanpajak = parseFloat(row.querySelector('input[name="angka_pengenaan_pajak[]"]').value) || 0;
//         const pengenaanpajak = $(row.querySelector('[name="angka_pengenaan_pajak[]"]')).val();
//         retValpengenaanpajak=pengenaanpajak ? parseFloat(pengenaanpajak.replace(/,/g, '')) : 0;

//         // const tarif = parseFloat(row.querySelector('input[name="angka_tarif_potongan[]"]').value) || 0;
//         const tarif = $(row.querySelector('[name="angka_tarif_potongan[]"]')).val();
//         retValtarif=tarif ? parseFloat(tarif.replace(/,/g, '')) : 0;

//         const hasiljumlah1 = row.querySelector('input[name="angka_pph_terutang[]"]');

//         const sum = retValpengenaanpajak * retValtarif/100;
//         hasiljumlah1.value = sum.toLocaleString();

//         var total_pengenaanpajak = 0
//         var total_tarifpotongan = 0
//         var totalterutang = 0

//         $(".sub_pengenaanpajak").each(function() {
//             total_pengenaanpajak += +$(this).val().replace(/,/g, '');
//         });
//         $(".sub_tarifpotongan").each(function() {
//             total_tarifpotongan += +$(this).val().replace(/,/g, '');
//         });
        
//         $(".sub_terutang").each(function() {
//             totalterutang += +$(this).val().replace(/,/g, '');
//         });

//         $('.total_kena_pajak').val(total_pengenaanpajak.toLocaleString());
//         $('.total_tarif_potongan').val(total_tarifpotongan.toLocaleString());
//         $('.total_terutang').val(totalterutang.toLocaleString());

//     }
// });
// tablelist_1771IV.addEventListener('click', function(event) {
//     if (event.target.classList.contains('btn-remove-1771iva')) {
//         const row = event.target.closest('tr');
//         row.remove();
//     }
// });

// const tablelist_1771IVB = document.querySelector('#list_1771IVB tbody');
// const addBtnadd1771ivb = document.querySelector('#btn-add1771ivb');
// addBtnadd1771ivb.addEventListener('click', function() {
//     const newRow = `
//     <tr>
//         <td width="auto" class="text-center">
//         <select id="jenis_penghasilanb[]"name="jenis_penghasilanb[]"
//         class="dropdown-groups">
//         <option value="1. BANTUAN / SUMBANGAN">1. BANTUAN / SUMBANGAN</option>
//         <option value="2. HIBAH">2. HIBAH</option>
//         <option value="3. DIVIDEN / BAGIAN LABA DARI PENYERTAAN MODAL PADA BADAN USAHA DI INDONESIA (Pasal 4 Ayat (3) Huruf f UU PPh)">3. DIVIDEN / BAGIAN LABA DARI PENYERTAAN MODAL PADA BADAN USAHA </option>
//         <option value="4. IURAN DAN PENGHASILAN TERTENTU YANG DITERIMA DANA PENSIUN">4. IURAN DAN PENGHASILAN TERTEN...</option>
//         <option value="5. BAGIAN LABA YANG DITERIMA PERUSAHAAN MODAL VENTURA DARI BADAN PASANGAN USAHA">5. BAGIAN LABA YANG DITERIMA PER...</option>
//         <option value="6. SISA LEBIH YANG DITERIMA ATAU DIPEROLEH BADAN ATAU LEMBAGA 
//         NIRLABA YANG BERGERAK DALAM BIDANG PENDIDIKAN DAN/ATAU 
//         BIDANG PENELITIAN DAN PENGEMBANGAN, YANG TELAH TERDAFTAR 
//         PADA INSTANSI YANG MEMBIDANGINYA, YANG DITANAMKAN KEMBALI 
//         DALAM BENTUK SARANA DAN PRASARANA KEGIATAN PENDIDIKAN DAN/
//         ATAU PENELITIAN DAN PENGEMBANGAN (Pasal 4 Ayat (3) Huruf m UU PPh)">6. SISA LEBIH YANG DITERIMA ATAU...</option>
//     </select>
//         </td>
//         <td class="text-center">
//             <input required autocomplete="off"
//                 onkeyup="this.value=sprator(this.value);"
//                 type="text"
//                 name="angka_penghasilan_brutob[]"
//                 id="angka_penghasilan_brutob[]"
//                 min="0"
//                 class="form-control sub_penghasilan_bruto" />
//         </td>
//         <td><button type="button" class="btn btn-danger btn-remove-1771ivb"><i
//             class="fa fa-trash"></i>
//         </td>
//     </tr>
//     `;
//     tablelist_1771IVB.insertAdjacentHTML('beforeend', newRow);
// });
// tablelist_1771IVB.addEventListener('input', function(event) {
//     const target = event.target;
//     if (target.tagName === 'INPUT' && target.name.startsWith('angka')) {

//         var total_bruto = 0

//         $(".sub_penghasilan_bruto").each(function() {
//             total_bruto += +$(this).val().replace(/,/g, '');
//         });
    
//         $('.total_bruto').val(total_bruto.toLocaleString());

//     }
// });
// tablelist_1771IVB.addEventListener('click', function(event) {
//     if (event.target.classList.contains('btn-remove-1771ivb')) {
//         const row = event.target.closest('tr');
//         row.remove();
//     }
// });
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
                type="text"
                name="pemegangsh_npwp_1771V[]"
                id="pemegangsh_npwp_1771V[]" min="0"
                class="form-control" />
        </td>
        <td class="text-center">
            <input required autocomplete="off"
                type="text"
                onkeyup="this.value=sprator(this.value);"
                name="pemegangsh_modalsetor_1771V[]"
                id="pemegangsh_modalsetor_1771V[]"
                min="0"
                class="form-control submodalsetor1771v_a" />
        </td>
        <td class="text-center">
            <input required autocomplete="off"
                onkeyup="this.value=sprator(this.value);"
                type="text"
                name="pemegangsh_persen_1771V[]"
                id="pemegangsh_persen_1771V[]"
                min="0" class="form-control" />
        </td>
        <td class="text-center">
            <input required autocomplete="off"
                onkeyup="this.value=sprator(this.value);"
                type="text"
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
            totalmodalsetor += +$(this).val().replace(/,/g, '');
        });
        var totaldividen = 0
        $(".subdividen177v_a").each(function() {
            totaldividen += +$(this).val().replace(/,/g, '');
        });

        $('.total_modalsetor').val(totalmodalsetor.toLocaleString());
        $('.total_dividen').val(totaldividen.toLocaleString());
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
            <input required autocomplete="off" type="text"
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
            <input required autocomplete="off"
                type="text" name="penyertaan_npwp[]"
                id="penyertaan_npwp[]" min="0"
                class="form-control" />
        </td>
        <td class="text-center">
            <input required autocomplete="off"
                type="text" name="penyertaan_modal[]"
                onkeyup="this.value=sprator(this.value);"
                id="penyertaan_modal[]" min="0"
                class="form-control submodalafiliasi" />
        </td>
        <td class="text-center">
            <input required autocomplete="off"
                onkeyup="this.value=sprator(this.value);"
                type="text" name="penyertaan_persen[]"
                id="penyertaan_persen[]" min="0"
                class="form-control" />
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
            totalmodalafiliasi += +$(this).val().replace(/,/g, '');
        });

        $('.total_modalafiliasi').val(totalmodalafiliasi.toLocaleString());
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
            <input required autocomplete="off" type="text"
                name="penyertaan_npwpb[]"
                id="penyertaan_npwpb[]" min="0"
                class="form-control"/>
        </td>
        <td class="text-center">
            <input required autocomplete="off" type="text"
                onkeyup="this.value=sprator(this.value);"
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
            <input required autocomplete="off" type="text"
                onkeyup="this.value=sprator(this.value);"
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
            <input required autocomplete="off" type="text"
                name="penyertaan_npwpc[]"
                id="penyertaan_npwpc[]" min="0"
                class="form-control"/>
        </td>
        <td class="text-center">
            <input required autocomplete="off" type="text"
            onkeyup="this.value=sprator(this.value);"
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
            <input required autocomplete="off" type="text"
            onkeyup="this.value=sprator(this.value);"
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
function sprator(x) {
    //remove commas
    retVal = x ? parseFloat(x.replace(/,/g, '')) : 0;
    const a1_kena_pajak = $('#a1_kena_pajak').val();
    const a2_kena_pajak = $('#a2_kena_pajak').val();
    retVala1_kena_pajak=a1_kena_pajak ? parseFloat(a1_kena_pajak.replace(/,/g, '')) : 0;
    retVala2_kena_pajak=a2_kena_pajak ? parseFloat(a2_kena_pajak.replace(/,/g, '')) : 0;
    const hasilkenapajak = retVala1_kena_pajak+retVala2_kena_pajak;
    const resulta3_kena_pajak = document.getElementById('a3_kena_pajak');
    resulta3_kena_pajak.value = hasilkenapajak.toLocaleString();
    
    const hasilpphterutang = hasilkenapajak*22/100;
    const resultb4_pph_terutang = document.getElementById('b4_pph_terutang');
    resultb4_pph_terutang.value = hasilpphterutang.toLocaleString();

    const b5_pph_terutang = $('#b5_pph_terutang').val();
    retValb5_pph_terutang=b5_pph_terutang ? parseFloat(b5_pph_terutang.replace(/,/g, '')) : 0;
    const jumlahpphterutang =hasilpphterutang+retValb5_pph_terutang;
    console.log(jumlahpphterutang);
    const resultb6_pph_terutang = document.getElementById('b6_pph_terutang');
    resultb6_pph_terutang.value = jumlahpphterutang.toLocaleString();

    const c8a_kredit_pajak = $('#c8a_kredit_pajak').val();
    const c8b_kredit_pajak = $('#c8b_kredit_pajak').val();
    retValc8a_kredit_pajak=c8a_kredit_pajak ? parseFloat(c8a_kredit_pajak.replace(/,/g, '')) : 0;
    retValc8b_kredit_pajak=c8b_kredit_pajak ? parseFloat(c8b_kredit_pajak.replace(/,/g, '')) : 0;
    const jumlahkreditpjk = retValc8a_kredit_pajak+retValc8b_kredit_pajak;
    const resultc8c_kredit_pajak = document.getElementById('c8c_kredit_pajak');
    resultc8c_kredit_pajak.value = jumlahkreditpjk.toLocaleString();

    const c7_kredit_pajak = $('#c7_kredit_pajak').val();
    retValc7_kredit_pajak=c7_kredit_pajak ? parseFloat(c7_kredit_pajak.replace(/,/g, '')) : 0;
    const resultc9_kredit_pajak = document.getElementById('c9_kredit_pajak');
    const jumlah9 = jumlahpphterutang-retValc7_kredit_pajak-jumlahkreditpjk;
    if(jumlah9<0){
        resultc9_kredit_pajak.value = 0;
    }else{
        resultc9_kredit_pajak.value = jumlah9.toLocaleString();
    }
    
    const c10a_kredit_pajak = $('#c10a_kredit_pajak').val();
    const c10b_kredit_pajak = $('#c10b_kredit_pajak').val();
    retValc10a_kredit_pajak=c10a_kredit_pajak ? parseFloat(c10a_kredit_pajak.replace(/,/g, '')) : 0;
    retValc10b_kredit_pajak=c10b_kredit_pajak ? parseFloat(c10b_kredit_pajak.replace(/,/g, '')) : 0;
    const jumlah10 = retValc10a_kredit_pajak+retValc10b_kredit_pajak;
    const resultc10c_kredit_pajak = document.getElementById('c10c_kredit_pajak');
    resultc10c_kredit_pajak.value = jumlah10.toLocaleString();

    const jumlah11 = jumlah9-jumlah10;
    const resultd11_pph_kurang = document.getElementById('d11_pph_kurang');
    if(jumlah11<0){
        resultd11_pph_kurang.value = 0;
    }else{
        resultd11_pph_kurang.value = jumlah11.toLocaleString();
    }

    const e14a_angsuran_pph = $('#e14a_angsuran_pph').val();
    const e14b_angsuran_pph = $('#e14b_angsuran_pph').val();
    retVale14a_angsuran_pph=e14a_angsuran_pph ? parseFloat(e14a_angsuran_pph.replace(/,/g, '')) : 0;
    retVale14b_angsuran_pph=e14b_angsuran_pph ? parseFloat(e14b_angsuran_pph.replace(/,/g, '')) : 0;
    const jumlah14 = retVale14a_angsuran_pph-retVale14b_angsuran_pph;
    const resulte14c_angsuran_pph = document.getElementById('e14c_angsuran_pph');
    if(jumlah14<0){
        resulte14c_angsuran_pph.value = 0;
    }else{
        resulte14c_angsuran_pph.value = jumlah14.toLocaleString();
    }
    const jumlah14d = retVale14a_angsuran_pph*22/100;
    const resulte14d_angsuran_pph = document.getElementById('e14d_angsuran_pph');
    resulte14d_angsuran_pph.value = jumlah14d.toLocaleString();

    const e14e_angsuran_pph = $('#e14e_angsuran_pph').val();
    retVale14e_angsuran_pph=e14e_angsuran_pph ? parseFloat(e14e_angsuran_pph.replace(/,/g, '')) : 0;
    const jumlah14f = jumlah14d-retVale14e_angsuran_pph;
    const resulte14f_angsuran_pph = document.getElementById('e14f_angsuran_pph');
    if(jumlah14f<0){
        resulte14f_angsuran_pph.value = 0;
    }else{
        resulte14f_angsuran_pph.value = jumlah14f.toLocaleString();
    }
    const jumlah14g = jumlah14f/12;
    const resulte14g_angsuran_pph = document.getElementById('e14g_angsuran_pph');
    if(jumlah14g<0){
        resulte14g_angsuran_pph.value = 0;
    }else{
        resulte14g_angsuran_pph.value = jumlah14g.toLocaleString();
    }
    
    const a1_penghasilan_netto_1771i = $('#a1_penghasilan_netto_1771i').val();
    const b1_penghasilan_netto_1771i = $('#b1_penghasilan_netto_1771i').val();
    const c1_penghasilan_netto_1771i = $('#c1_penghasilan_netto_1771i').val();
    retVala1_penghasilan_netto_1771i=a1_penghasilan_netto_1771i ? parseFloat(a1_penghasilan_netto_1771i.replace(/,/g, '')) : 0;
    retValb1_penghasilan_netto_1771i=b1_penghasilan_netto_1771i ? parseFloat(b1_penghasilan_netto_1771i.replace(/,/g, '')) : 0;
    retValc1_penghasilan_netto_1771i=c1_penghasilan_netto_1771i ? parseFloat(c1_penghasilan_netto_1771i.replace(/,/g, '')) : 0;
    const jumlah1d =retVala1_penghasilan_netto_1771i-retValb1_penghasilan_netto_1771i-retValc1_penghasilan_netto_1771i;
    const resultd1_penghasilan_netto_1771i= document.getElementById('d1_penghasilan_netto_1771i');
    if(jumlah1d<0){
        resultd1_penghasilan_netto_1771i.value = 0;
    }else{
        resultd1_penghasilan_netto_1771i.value = jumlah1d.toLocaleString();
    }

    const e1_penghasilan_netto_1771i = $('#e1_penghasilan_netto_1771i').val();
    const f1_penghasilan_netto_1771i = $('#f1_penghasilan_netto_1771i').val();
    retVale1_penghasilan_netto_1771i=e1_penghasilan_netto_1771i ? parseFloat(e1_penghasilan_netto_1771i.replace(/,/g, '')) : 0;
    retValf1_penghasilan_netto_1771i=f1_penghasilan_netto_1771i ? parseFloat(f1_penghasilan_netto_1771i.replace(/,/g, '')) : 0;
    const jumlah1g =retVale1_penghasilan_netto_1771i-retValf1_penghasilan_netto_1771i;
    const resultg1_penghasilan_netto_1771i= document.getElementById('g1_penghasilan_netto_1771i');
    if(jumlah1g<0){
        resultg1_penghasilan_netto_1771i.value = 0;
    }else{
        resultg1_penghasilan_netto_1771i.value = jumlah1g.toLocaleString();
    }

    const jumlah1h =jumlah1d+jumlah1g;
    const resulth1_penghasilan_netto_1771i= document.getElementById('h1_penghasilan_netto_1771i');
    resulth1_penghasilan_netto_1771i.value = jumlah1h.toLocaleString();

    const penghasilan_netto_luar_negeri_1771i = $('#penghasilan_netto_luar_negeri_1771i').val();
    retValpenghasilan_netto_luar_negeri_1771i=penghasilan_netto_luar_negeri_1771i ? parseFloat(penghasilan_netto_luar_negeri_1771i.replace(/,/g, '')) : 0;
    const jumlah3 =jumlah1h+retValpenghasilan_netto_luar_negeri_1771i;
    const resultjumlah_1771i= document.getElementById('jumlah_1771i');
    resultjumlah_1771i.value = jumlah3.toLocaleString();

    const a5_penyesuaian_fiskal_1771i = $('#a5_penyesuaian_fiskal_1771i').val();
    const b5_penyesuaian_fiskal_1771i = $('#b5_penyesuaian_fiskal_1771i').val();
    const c5_penyesuaian_fiskal_1771i = $('#c5_penyesuaian_fiskal_1771i').val();
    const d5_penyesuaian_fiskal_1771i = $('#d5_penyesuaian_fiskal_1771i').val();
    const e5_penyesuaian_fiskal_1771i = $('#e5_penyesuaian_fiskal_1771i').val();
    const f5_penyesuaian_fiskal_1771i = $('#f5_penyesuaian_fiskal_1771i').val();
    const g5_penyesuaian_fiskal_1771i = $('#g5_penyesuaian_fiskal_1771i').val();
    const h5_penyesuaian_fiskal_1771i = $('#h5_penyesuaian_fiskal_1771i').val();
    const i5_penyesuaian_fiskal_1771i = $('#i5_penyesuaian_fiskal_1771i').val();
    const j5_penyesuaian_fiskal_1771i = $('#j5_penyesuaian_fiskal_1771i').val();
    const k5_penyesuaian_fiskal_1771i = $('#k5_penyesuaian_fiskal_1771i').val();
    const l5_penyesuaian_fiskal_1771i = $('#l5_penyesuaian_fiskal_1771i').val();
    retVala5_penyesuaian_fiskal_1771i=a5_penyesuaian_fiskal_1771i ? parseFloat(a5_penyesuaian_fiskal_1771i.replace(/,/g, '')) : 0;
    retValb5_penyesuaian_fiskal_1771i=b5_penyesuaian_fiskal_1771i ? parseFloat(b5_penyesuaian_fiskal_1771i.replace(/,/g, '')) : 0;
    retValc5_penyesuaian_fiskal_1771i=c5_penyesuaian_fiskal_1771i ? parseFloat(c5_penyesuaian_fiskal_1771i.replace(/,/g, '')) : 0;
    retVald5_penyesuaian_fiskal_1771i=d5_penyesuaian_fiskal_1771i ? parseFloat(d5_penyesuaian_fiskal_1771i.replace(/,/g, '')) : 0;
    retVale5_penyesuaian_fiskal_1771i=e5_penyesuaian_fiskal_1771i ? parseFloat(e5_penyesuaian_fiskal_1771i.replace(/,/g, '')) : 0;
    retValf5_penyesuaian_fiskal_1771i=f5_penyesuaian_fiskal_1771i ? parseFloat(f5_penyesuaian_fiskal_1771i.replace(/,/g, '')) : 0;
    retValg5_penyesuaian_fiskal_1771i=g5_penyesuaian_fiskal_1771i ? parseFloat(g5_penyesuaian_fiskal_1771i.replace(/,/g, '')) : 0;
    retValh5_penyesuaian_fiskal_1771i=h5_penyesuaian_fiskal_1771i ? parseFloat(h5_penyesuaian_fiskal_1771i.replace(/,/g, '')) : 0;
    retVali5_penyesuaian_fiskal_1771i=i5_penyesuaian_fiskal_1771i ? parseFloat(i5_penyesuaian_fiskal_1771i.replace(/,/g, '')) : 0;
    retValj5_penyesuaian_fiskal_1771i=j5_penyesuaian_fiskal_1771i ? parseFloat(j5_penyesuaian_fiskal_1771i.replace(/,/g, '')) : 0;
    retValk5_penyesuaian_fiskal_1771i=k5_penyesuaian_fiskal_1771i ? parseFloat(k5_penyesuaian_fiskal_1771i.replace(/,/g, '')) : 0;
    retVall5_penyesuaian_fiskal_1771i=l5_penyesuaian_fiskal_1771i ? parseFloat(l5_penyesuaian_fiskal_1771i.replace(/,/g, '')) : 0;

    const jumlah5m=retVall5_penyesuaian_fiskal_1771i+retValk5_penyesuaian_fiskal_1771i+retValj5_penyesuaian_fiskal_1771i+retVali5_penyesuaian_fiskal_1771i+retVala5_penyesuaian_fiskal_1771i+retValb5_penyesuaian_fiskal_1771i+retValc5_penyesuaian_fiskal_1771i+retVald5_penyesuaian_fiskal_1771i+retVale5_penyesuaian_fiskal_1771i+retValf5_penyesuaian_fiskal_1771i+retValg5_penyesuaian_fiskal_1771i+retValh5_penyesuaian_fiskal_1771i;
    const resultm5_penyesuaian_fiskal_1771i= document.getElementById('m5_penyesuaian_fiskal_1771i');
    resultm5_penyesuaian_fiskal_1771i.value = jumlah5m.toLocaleString();
    
    const a6_fiskal_negatif_1771i = $('#a6_fiskal_negatif_1771i').val();
    const b6_fiskal_negatif_1771i = $('#b6_fiskal_negatif_1771i').val();
    const c6_fiskal_negatif_1771i = $('#c6_fiskal_negatif_1771i').val();
    const d6_fiskal_negatif_1771i = $('#d6_fiskal_negatif_1771i').val();
    retVala6_fiskal_negatif_1771i=a6_fiskal_negatif_1771i ? parseFloat(a6_fiskal_negatif_1771i.replace(/,/g, '')) : 0;
    retValb6_fiskal_negatif_1771i=b6_fiskal_negatif_1771i ? parseFloat(b6_fiskal_negatif_1771i.replace(/,/g, '')) : 0;
    retValc6_fiskal_negatif_1771i=c6_fiskal_negatif_1771i ? parseFloat(c6_fiskal_negatif_1771i.replace(/,/g, '')) : 0;
    retVald6_fiskal_negatif_1771i=d6_fiskal_negatif_1771i ? parseFloat(d6_fiskal_negatif_1771i.replace(/,/g, '')) : 0;

    const jumlah6e=retVala6_fiskal_negatif_1771i+retValb6_fiskal_negatif_1771i+retValc6_fiskal_negatif_1771i+retVald6_fiskal_negatif_1771i;
    const resulte6_fiskal_negatif_1771i= document.getElementById('e6_fiskal_negatif_1771i');
    resulte6_fiskal_negatif_1771i.value = jumlah6e.toLocaleString();

    const penghasilan_1771i = $('#penghasilan_1771i').val();
    jumlah4=penghasilan_1771i ? parseFloat(penghasilan_1771i.replace(/,/g, '')) : 0;
    const fasilitas_1771i = $('#fasilitas_1771i').val();
    jumlah7=fasilitas_1771i ? parseFloat(fasilitas_1771i.replace(/,/g, '')) : 0;
    const resultnetto_fiskal_1771i= document.getElementById('netto_fiskal_1771i');

    const jumlah8 = jumlah3-jumlah4+jumlah5m-jumlah6e-jumlah7;
    if(jumlah8<0){
        resultnetto_fiskal_1771i.value = 0;
    }else{
        resultnetto_fiskal_1771i.value = jumlah8.toLocaleString();
    }

    const hpp1_1771ii = $('#hpp1_1771ii').val();
    const biayausaha1_1771ii = $('#biayausaha1_1771ii').val();
    const biayaluarusaha1_1771ii = $('#biayaluarusaha1_1771ii').val();
    retVal_hpp1_1771ii=hpp1_1771ii ? parseFloat(hpp1_1771ii.replace(/,/g, '')) : 0;
    retVal_biayausaha1_1771ii=biayausaha1_1771ii ? parseFloat(biayausaha1_1771ii.replace(/,/g, '')) : 0;
    retVal_biayaluarusaha1_1771ii=biayaluarusaha1_1771ii ? parseFloat(biayaluarusaha1_1771ii.replace(/,/g, '')) : 0;
    const jumlah1_1771ii = retVal_hpp1_1771ii+retVal_biayausaha1_1771ii+retVal_biayaluarusaha1_1771ii;
    const result_jumlah1_1771ii= document.getElementById('jumlah1_1771ii');
    result_jumlah1_1771ii.value = jumlah1_1771ii.toLocaleString();

    const hpp2_1771ii = $('#hpp2_1771ii').val();
    const biayausaha2_1771ii = $('#biayausaha2_1771ii').val();
    const biayaluarusaha2_1771ii = $('#biayaluarusaha2_1771ii').val();
    retVal_hpp2_1771ii=hpp2_1771ii ? parseFloat(hpp2_1771ii.replace(/,/g, '')) : 0;
    retVal_biayausaha2_1771ii=biayausaha2_1771ii ? parseFloat(biayausaha2_1771ii.replace(/,/g, '')) : 0;
    retVal_biayaluarusaha2_1771ii=biayaluarusaha2_1771ii ? parseFloat(biayaluarusaha2_1771ii.replace(/,/g, '')) : 0;
    const jumlah2_1771ii = retVal_hpp2_1771ii+retVal_biayausaha2_1771ii+retVal_biayaluarusaha2_1771ii;
    const result_jumlah2_1771ii= document.getElementById('jumlah2_1771ii');
    result_jumlah2_1771ii.value = jumlah2_1771ii.toLocaleString();

    const hpp3_1771ii = $('#hpp3_1771ii').val();
    const biayausaha3_1771ii = $('#biayausaha3_1771ii').val();
    const biayaluarusaha3_1771ii = $('#biayaluarusaha3_1771ii').val();
    retVal_hpp3_1771ii=hpp3_1771ii ? parseFloat(hpp3_1771ii.replace(/,/g, '')) : 0;
    retVal_biayausaha3_1771ii=biayausaha3_1771ii ? parseFloat(biayausaha3_1771ii.replace(/,/g, '')) : 0;
    retVal_biayaluarusaha3_1771ii=biayaluarusaha3_1771ii ? parseFloat(biayaluarusaha3_1771ii.replace(/,/g, '')) : 0;
    const jumlah3_1771ii = retVal_hpp3_1771ii+retVal_biayausaha3_1771ii+retVal_biayaluarusaha3_1771ii;
    const result_jumlah3_1771ii= document.getElementById('jumlah3_1771ii');
    result_jumlah3_1771ii.value = jumlah3_1771ii.toLocaleString();

    const hpp4_1771ii = $('#hpp4_1771ii').val();
    const biayausaha4_1771ii = $('#biayausaha4_1771ii').val();
    const biayaluarusaha4_1771ii = $('#biayaluarusaha4_1771ii').val();
    retVal_hpp4_1771ii=hpp4_1771ii ? parseFloat(hpp4_1771ii.replace(/,/g, '')) : 0;
    retVal_biayausaha4_1771ii=biayausaha4_1771ii ? parseFloat(biayausaha4_1771ii.replace(/,/g, '')) : 0;
    retVal_biayaluarusaha4_1771ii=biayaluarusaha4_1771ii ? parseFloat(biayaluarusaha4_1771ii.replace(/,/g, '')) : 0;
    const jumlah4_1771ii = retVal_hpp4_1771ii+retVal_biayausaha4_1771ii+retVal_biayaluarusaha4_1771ii;
    const result_jumlah4_1771ii= document.getElementById('jumlah4_1771ii');
    result_jumlah4_1771ii.value = jumlah4_1771ii.toLocaleString();

    const hpp5_1771ii = $('#hpp5_1771ii').val();
    const biayausaha5_1771ii = $('#biayausaha5_1771ii').val();
    const biayaluarusaha5_1771ii = $('#biayaluarusaha5_1771ii').val();
    retVal_hpp5_1771ii=hpp5_1771ii ? parseFloat(hpp5_1771ii.replace(/,/g, '')) : 0;
    retVal_biayausaha5_1771ii=biayausaha5_1771ii ? parseFloat(biayausaha5_1771ii.replace(/,/g, '')) : 0;
    retVal_biayaluarusaha5_1771ii=biayaluarusaha5_1771ii ? parseFloat(biayaluarusaha5_1771ii.replace(/,/g, '')) : 0;
    const jumlah5_1771ii = retVal_hpp5_1771ii+retVal_biayausaha5_1771ii+retVal_biayaluarusaha5_1771ii;
    const result_jumlah5_1771ii= document.getElementById('jumlah5_1771ii');
    result_jumlah5_1771ii.value = jumlah5_1771ii.toLocaleString();

    const hpp6_1771ii = $('#hpp6_1771ii').val();
    const biayausaha6_1771ii = $('#biayausaha6_1771ii').val();
    const biayaluarusaha6_1771ii = $('#biayaluarusaha6_1771ii').val();
    retVal_hpp6_1771ii=hpp6_1771ii ? parseFloat(hpp6_1771ii.replace(/,/g, '')) : 0;
    retVal_biayausaha6_1771ii=biayausaha6_1771ii ? parseFloat(biayausaha6_1771ii.replace(/,/g, '')) : 0;
    retVal_biayaluarusaha6_1771ii=biayaluarusaha6_1771ii ? parseFloat(biayaluarusaha6_1771ii.replace(/,/g, '')) : 0;
    const jumlah6_1771ii = retVal_hpp6_1771ii+retVal_biayausaha6_1771ii+retVal_biayaluarusaha6_1771ii;
    const result_jumlah6_1771ii= document.getElementById('jumlah6_1771ii');
    result_jumlah6_1771ii.value = jumlah6_1771ii.toLocaleString();

    const hpp7_1771ii = $('#hpp7_1771ii').val();
    const biayausaha7_1771ii = $('#biayausaha7_1771ii').val();
    const biayaluarusaha7_1771ii = $('#biayaluarusaha7_1771ii').val();
    retVal_hpp7_1771ii=hpp7_1771ii ? parseFloat(hpp7_1771ii.replace(/,/g, '')) : 0;
    retVal_biayausaha7_1771ii=biayausaha7_1771ii ? parseFloat(biayausaha7_1771ii.replace(/,/g, '')) : 0;
    retVal_biayaluarusaha7_1771ii=biayaluarusaha7_1771ii ? parseFloat(biayaluarusaha7_1771ii.replace(/,/g, '')) : 0;
    const jumlah7_1771ii = retVal_hpp7_1771ii+retVal_biayausaha7_1771ii+retVal_biayaluarusaha7_1771ii;
    const result_jumlah7_1771ii= document.getElementById('jumlah7_1771ii');
    result_jumlah7_1771ii.value = jumlah7_1771ii.toLocaleString();

    const hpp8_1771ii = $('#hpp8_1771ii').val();
    const biayausaha8_1771ii = $('#biayausaha8_1771ii').val();
    const biayaluarusaha8_1771ii = $('#biayaluarusaha8_1771ii').val();
    retVal_hpp8_1771ii=hpp8_1771ii ? parseFloat(hpp8_1771ii.replace(/,/g, '')) : 0;
    retVal_biayausaha8_1771ii=biayausaha8_1771ii ? parseFloat(biayausaha8_1771ii.replace(/,/g, '')) : 0;
    retVal_biayaluarusaha8_1771ii=biayaluarusaha8_1771ii ? parseFloat(biayaluarusaha8_1771ii.replace(/,/g, '')) : 0;
    const jumlah8_1771ii = retVal_hpp8_1771ii+retVal_biayausaha8_1771ii+retVal_biayaluarusaha8_1771ii;
    const result_jumlah8_1771ii= document.getElementById('jumlah8_1771ii');
    result_jumlah8_1771ii.value = jumlah8_1771ii.toLocaleString();

    const hpp9_1771ii = $('#hpp9_1771ii').val();
    const biayausaha9_1771ii = $('#biayausaha9_1771ii').val();
    const biayaluarusaha9_1771ii = $('#biayaluarusaha9_1771ii').val();
    retVal_hpp9_1771ii=hpp9_1771ii ? parseFloat(hpp9_1771ii.replace(/,/g, '')) : 0;
    retVal_biayausaha9_1771ii=biayausaha9_1771ii ? parseFloat(biayausaha9_1771ii.replace(/,/g, '')) : 0;
    retVal_biayaluarusaha9_1771ii=biayaluarusaha9_1771ii ? parseFloat(biayaluarusaha9_1771ii.replace(/,/g, '')) : 0;
    const jumlah9_1771ii = retVal_hpp9_1771ii+retVal_biayausaha9_1771ii+retVal_biayaluarusaha9_1771ii;
    const result_jumlah9_1771ii= document.getElementById('jumlah9_1771ii');
    result_jumlah9_1771ii.value = jumlah9_1771ii.toLocaleString();

    const hpp10_1771ii = $('#hpp10_1771ii').val();
    const biayausaha10_1771ii = $('#biayausaha10_1771ii').val();
    const biayaluarusaha10_1771ii = $('#biayaluarusaha10_1771ii').val();
    retVal_hpp10_1771ii=hpp10_1771ii ? parseFloat(hpp10_1771ii.replace(/,/g, '')) : 0;
    retVal_biayausaha10_1771ii=biayausaha10_1771ii ? parseFloat(biayausaha10_1771ii.replace(/,/g, '')) : 0;
    retVal_biayaluarusaha10_1771ii=biayaluarusaha10_1771ii ? parseFloat(biayaluarusaha10_1771ii.replace(/,/g, '')) : 0;
    const jumlah10_1771ii = retVal_hpp10_1771ii+retVal_biayausaha10_1771ii+retVal_biayaluarusaha10_1771ii;
    const result_jumlah10_1771ii= document.getElementById('jumlah10_1771ii');
    result_jumlah10_1771ii.value = jumlah10_1771ii.toLocaleString();

    const hpp11_1771ii = $('#hpp11_1771ii').val();
    const biayausaha11_1771ii = $('#biayausaha11_1771ii').val();
    const biayaluarusaha11_1771ii = $('#biayaluarusaha11_1771ii').val();
    retVal_hpp11_1771ii=hpp11_1771ii ? parseFloat(hpp11_1771ii.replace(/,/g, '')) : 0;
    retVal_biayausaha11_1771ii=biayausaha11_1771ii ? parseFloat(biayausaha11_1771ii.replace(/,/g, '')) : 0;
    retVal_biayaluarusaha11_1771ii=biayaluarusaha11_1771ii ? parseFloat(biayaluarusaha11_1771ii.replace(/,/g, '')) : 0;
    const jumlah11_1771ii = retVal_hpp11_1771ii+retVal_biayausaha11_1771ii+retVal_biayaluarusaha11_1771ii;
    const result_jumlah11_1771ii= document.getElementById('jumlah11_1771ii');
    result_jumlah11_1771ii.value = jumlah11_1771ii.toLocaleString();

    const hpp12_1771ii = $('#hpp12_1771ii').val();
    const biayausaha12_1771ii = $('#biayausaha12_1771ii').val();
    const biayaluarusaha12_1771ii = $('#biayaluarusaha12_1771ii').val();
    retVal_hpp12_1771ii=hpp12_1771ii ? parseFloat(hpp12_1771ii.replace(/,/g, '')) : 0;
    retVal_biayausaha12_1771ii=biayausaha12_1771ii ? parseFloat(biayausaha12_1771ii.replace(/,/g, '')) : 0;
    retVal_biayaluarusaha12_1771ii=biayaluarusaha12_1771ii ? parseFloat(biayaluarusaha12_1771ii.replace(/,/g, '')) : 0;
    const jumlah12_1771ii = retVal_hpp12_1771ii+retVal_biayausaha12_1771ii+retVal_biayaluarusaha12_1771ii;
    const result_jumlah12_1771ii= document.getElementById('jumlah12_1771ii');
    result_jumlah12_1771ii.value = jumlah12_1771ii.toLocaleString();

    const hpp13_1771ii = $('#hpp13_1771ii').val();
    const biayausaha13_1771ii = $('#biayausaha13_1771ii').val();
    const biayaluarusaha13_1771ii = $('#biayaluarusaha13_1771ii').val();
    retVal_hpp13_1771ii=hpp13_1771ii ? parseFloat(hpp13_1771ii.replace(/,/g, '')) : 0;
    retVal_biayausaha13_1771ii=biayausaha13_1771ii ? parseFloat(biayausaha13_1771ii.replace(/,/g, '')) : 0;
    retVal_biayaluarusaha13_1771ii=biayaluarusaha13_1771ii ? parseFloat(biayaluarusaha13_1771ii.replace(/,/g, '')) : 0;
    const jumlah13_1771ii = retVal_hpp13_1771ii+retVal_biayausaha13_1771ii+retVal_biayaluarusaha13_1771ii;
    const result_jumlah13_1771ii= document.getElementById('jumlah13_1771ii');
    result_jumlah13_1771ii.value = jumlah13_1771ii.toLocaleString();

    const jumlahhpp14_1771ii=retVal_hpp1_1771ii+retVal_hpp2_1771ii+retVal_hpp3_1771ii+retVal_hpp4_1771ii+retVal_hpp5_1771ii+retVal_hpp6_1771ii+retVal_hpp7_1771ii+retVal_hpp8_1771ii+retVal_hpp9_1771ii+retVal_hpp10_1771ii+retVal_hpp11_1771ii+retVal_hpp12_1771ii-retVal_hpp13_1771ii;
    const result_hpp14_1771ii= document.getElementById('hpp14_1771ii');
    result_hpp14_1771ii.value = jumlahhpp14_1771ii.toLocaleString();
    
    const jumlahbiayausaha14_1771ii=retVal_biayausaha1_1771ii+retVal_biayausaha2_1771ii+retVal_biayausaha3_1771ii+retVal_biayausaha4_1771ii+retVal_biayausaha5_1771ii+retVal_biayausaha6_1771ii+retVal_biayausaha7_1771ii+retVal_biayausaha8_1771ii+retVal_biayausaha9_1771ii+retVal_biayausaha10_1771ii+retVal_biayausaha11_1771ii+retVal_biayausaha12_1771ii-retVal_biayausaha13_1771ii;
    const result_biayausaha14_1771ii= document.getElementById('biayausaha14_1771ii');
    result_biayausaha14_1771ii.value = jumlahbiayausaha14_1771ii.toLocaleString();

    const jumlahbiayaluarusaha14_1771ii=retVal_biayaluarusaha1_1771ii+retVal_biayaluarusaha2_1771ii+retVal_biayaluarusaha3_1771ii+retVal_biayaluarusaha4_1771ii+retVal_biayaluarusaha5_1771ii+retVal_biayaluarusaha6_1771ii+retVal_biayaluarusaha7_1771ii+retVal_biayaluarusaha8_1771ii+retVal_biayaluarusaha9_1771ii+retVal_biayaluarusaha10_1771ii+retVal_biayaluarusaha11_1771ii+retVal_biayaluarusaha12_1771ii-retVal_biayaluarusaha13_1771ii;
    const result_biayaluarusaha14_1771ii= document.getElementById('biayaluarusaha14_1771ii');
    result_biayaluarusaha14_1771ii.value = jumlahbiayaluarusaha14_1771ii.toLocaleString();

    const jumlah14_1771ii = jumlah1_1771ii+jumlah2_1771ii+jumlah3_1771ii+jumlah4_1771ii+jumlah5_1771ii+jumlah6_1771ii+jumlah7_1771ii+jumlah8_1771ii+jumlah9_1771ii+jumlah10_1771ii+jumlah11_1771ii+jumlah12_1771ii-jumlah13_1771ii;
    const result_jumlah14_1771ii= document.getElementById('jumlah14_1771ii');
    if(jumlah14_1771ii<0){
        result_jumlah14_1771ii.value = 0;
    }else{
        result_jumlah14_1771ii.value = jumlah14_1771ii.toLocaleString();
    }

    
    const dpp1_1771iv = $('#dpp1_1771iv').val();
    const tarif1_1771ii = $('#tarif1_1771ii').val();
    retVal_dpp1_1771iv=dpp1_1771iv ? parseFloat(dpp1_1771iv.replace(/,/g, '')) : 0;
    retVal_tarif1_1771ii=tarif1_1771ii ? parseFloat(tarif1_1771ii.replace(/,/g, '')) : 0;
    const jumlahPPh1_1771ii = retVal_dpp1_1771iv*retVal_tarif1_1771ii/100;
    const result_pph1_1771ii= document.getElementById('pph1_1771ii');
    result_pph1_1771ii.value = jumlahPPh1_1771ii.toLocaleString();
    
    const dpp2_1771iv = $('#dpp2_1771iv').val();
    const tarif2_1771ii = $('#tarif2_1771ii').val();
    retVal_dpp2_1771iv=dpp2_1771iv ? parseFloat(dpp2_1771iv.replace(/,/g, '')) : 0;
    retVal_tarif2_1771ii=tarif2_1771ii ? parseFloat(tarif2_1771ii.replace(/,/g, '')) : 0;
    const jumlahPPh2_1771ii = retVal_dpp2_1771iv*retVal_tarif2_1771ii/100;
    const result_pph2_1771ii= document.getElementById('pph2_1771ii');
    result_pph2_1771ii.value = jumlahPPh2_1771ii.toLocaleString();
    
    const dpp3_1771iv = $('#dpp3_1771iv').val();
    const tarif3_1771ii = $('#tarif3_1771ii').val();
    retVal_dpp3_1771iv=dpp3_1771iv ? parseFloat(dpp3_1771iv.replace(/,/g, '')) : 0;
    retVal_tarif3_1771ii=tarif3_1771ii ? parseFloat(tarif3_1771ii.replace(/,/g, '')) : 0;
    const jumlahPPh3_1771ii = retVal_dpp3_1771iv*retVal_tarif3_1771ii/100;
    const result_pph3_1771ii= document.getElementById('pph3_1771ii');
    result_pph3_1771ii.value = jumlahPPh3_1771ii.toLocaleString();

    const dpp4_1771iv = $('#dpp4_1771iv').val();
    const tarif4_1771ii = $('#tarif4_1771ii').val();
    retVal_dpp4_1771iv=dpp4_1771iv ? parseFloat(dpp4_1771iv.replace(/,/g, '')) : 0;
    retVal_tarif4_1771ii=tarif4_1771ii ? parseFloat(tarif4_1771ii.replace(/,/g, '')) : 0;
    const jumlahPPh4_1771ii = retVal_dpp4_1771iv*retVal_tarif4_1771ii/100;
    const result_pph4_1771ii= document.getElementById('pph4_1771ii');
    result_pph4_1771ii.value = jumlahPPh4_1771ii.toLocaleString();
    
    const dpp5_1771iv = $('#dpp5_1771iv').val();
    const tarif5_1771ii = $('#tarif5_1771ii').val();
    retVal_dpp5_1771iv=dpp5_1771iv ? parseFloat(dpp5_1771iv.replace(/,/g, '')) : 0;
    retVal_tarif5_1771ii=tarif5_1771ii ? parseFloat(tarif5_1771ii.replace(/,/g, '')) : 0;
    const jumlahPPh5_1771ii = retVal_dpp5_1771iv*retVal_tarif5_1771ii/100;
    const result_pph5_1771ii= document.getElementById('pph5_1771ii');
    result_pph5_1771ii.value = jumlahPPh5_1771ii.toLocaleString();

    const dpp6_1771iv = $('#dpp6_1771iv').val();
    const tarif6_1771ii = $('#tarif6_1771ii').val();
    retVal_dpp6_1771iv=dpp6_1771iv ? parseFloat(dpp6_1771iv.replace(/,/g, '')) : 0;
    retVal_tarif6_1771ii=tarif6_1771ii ? parseFloat(tarif6_1771ii.replace(/,/g, '')) : 0;
    const jumlahPPh6_1771ii = retVal_dpp6_1771iv*retVal_tarif6_1771ii/100;
    const result_pph6_1771ii= document.getElementById('pph6_1771ii');
    result_pph6_1771ii.value = jumlahPPh6_1771ii.toLocaleString();

    const dpp7_1771iv = $('#dpp7_1771iv').val();
    const tarif7_1771ii = $('#tarif7_1771ii').val();
    retVal_dpp7_1771iv=dpp7_1771iv ? parseFloat(dpp7_1771iv.replace(/,/g, '')) : 0;
    retVal_tarif7_1771ii=tarif7_1771ii ? parseFloat(tarif7_1771ii.replace(/,/g, '')) : 0;
    const jumlahPPh7_1771ii = retVal_dpp7_1771iv*retVal_tarif7_1771ii/100;
    const result_pph7_1771ii= document.getElementById('pph7_1771ii');
    result_pph7_1771ii.value = jumlahPPh7_1771ii.toLocaleString();

    const dpp8a_1771iv = $('#dpp8a_1771iv').val();
    const tarif8a_1771ii = $('#tarif8a_1771ii').val();
    retVal_dpp8a_1771iv=dpp8a_1771iv ? parseFloat(dpp8a_1771iv.replace(/,/g, '')) : 0;
    retVal_tarif8a_1771ii=tarif8a_1771ii ? parseFloat(tarif8a_1771ii.replace(/,/g, '')) : 0;
    const jumlahPPh8a_1771ii = retVal_dpp8a_1771iv*retVal_tarif8a_1771ii/100;
    const result_pph8a_1771ii= document.getElementById('pph8a_1771ii');
    result_pph8a_1771ii.value = jumlahPPh8a_1771ii.toLocaleString();

    const dpp8b_1771iv = $('#dpp8b_1771iv').val();
    const tarif8b_1771ii = $('#tarif8b_1771ii').val();
    retVal_dpp8b_1771iv=dpp8b_1771iv ? parseFloat(dpp8b_1771iv.replace(/,/g, '')) : 0;
    retVal_tarif8b_1771ii=tarif8b_1771ii ? parseFloat(tarif8b_1771ii.replace(/,/g, '')) : 0;
    const jumlahPPh8b_1771ii = retVal_dpp8b_1771iv*retVal_tarif8b_1771ii/100;
    const result_pph8b_1771ii= document.getElementById('pph8b_1771ii');
    result_pph8b_1771ii.value = jumlahPPh8b_1771ii.toLocaleString();

    const dpp8c_1771iv = $('#dpp8c_1771iv').val();
    const tarif8c_1771ii = $('#tarif8c_1771ii').val();
    retVal_dpp8c_1771iv=dpp8c_1771iv ? parseFloat(dpp8c_1771iv.replace(/,/g, '')) : 0;
    retVal_tarif8c_1771ii=tarif8c_1771ii ? parseFloat(tarif8c_1771ii.replace(/,/g, '')) : 0;
    const jumlahPPh8c_1771ii = retVal_dpp8c_1771iv*retVal_tarif8c_1771ii/100;
    const result_pph8c_1771ii= document.getElementById('pph8c_1771ii');
    result_pph8c_1771ii.value = jumlahPPh8c_1771ii.toLocaleString();

    const dpp9_1771iv = $('#dpp9_1771iv').val();
    const tarif9_1771ii = $('#tarif9_1771ii').val();
    retVal_dpp9_1771iv=dpp9_1771iv ? parseFloat(dpp9_1771iv.replace(/,/g, '')) : 0;
    retVal_tarif9_1771ii=tarif9_1771ii ? parseFloat(tarif9_1771ii.replace(/,/g, '')) : 0;
    const jumlahPPh9_1771ii = retVal_dpp9_1771iv*retVal_tarif9_1771ii/100;
    const result_pph9_1771ii= document.getElementById('pph9_1771ii');
    result_pph9_1771ii.value = jumlahPPh9_1771ii.toLocaleString();

    const dpp10_1771iv = $('#dpp10_1771iv').val();
    const tarif10_1771ii = $('#tarif10_1771ii').val();
    retVal_dpp10_1771iv=dpp10_1771iv ? parseFloat(dpp10_1771iv.replace(/,/g, '')) : 0;
    retVal_tarif10_1771ii=tarif10_1771ii ? parseFloat(tarif10_1771ii.replace(/,/g, '')) : 0;
    const jumlahPPh10_1771ii = retVal_dpp10_1771iv*retVal_tarif10_1771ii/100;
    const result_pph10_1771ii= document.getElementById('pph10_1771ii');
    result_pph10_1771ii.value = jumlahPPh10_1771ii.toLocaleString();

    const dpp11_1771iv = $('#dpp11_1771iv').val();
    const tarif11_1771ii = $('#tarif11_1771ii').val();
    retVal_dpp11_1771iv=dpp11_1771iv ? parseFloat(dpp11_1771iv.replace(/,/g, '')) : 0;
    retVal_tarif11_1771ii=tarif11_1771ii ? parseFloat(tarif11_1771ii.replace(/,/g, '')) : 0;
    const jumlahPPh11_1771ii = retVal_dpp11_1771iv*retVal_tarif11_1771ii/100;
    const result_pph11_1771ii= document.getElementById('pph11_1771ii');
    result_pph11_1771ii.value = jumlahPPh11_1771ii.toLocaleString();

    const dpp12_1771iv = $('#dpp12_1771iv').val();
    const tarif12_1771ii = $('#tarif12_1771ii').val();
    retVal_dpp12_1771iv=dpp12_1771iv ? parseFloat(dpp12_1771iv.replace(/,/g, '')) : 0;
    retVal_tarif12_1771ii=tarif12_1771ii ? parseFloat(tarif12_1771ii.replace(/,/g, '')) : 0;
    const jumlahPPh12_1771ii = retVal_dpp12_1771iv*retVal_tarif12_1771ii/100;
    const result_pph12_1771ii= document.getElementById('pph12_1771ii');
    result_pph12_1771ii.value = jumlahPPh12_1771ii.toLocaleString();

    const dpp13_1771iv = $('#dpp13_1771iv').val();
    const tarif13_1771ii = $('#tarif13_1771ii').val();
    retVal_dpp13_1771iv=dpp13_1771iv ? parseFloat(dpp13_1771iv.replace(/,/g, '')) : 0;
    retVal_tarif13_1771ii=tarif13_1771ii ? parseFloat(tarif13_1771ii.replace(/,/g, '')) : 0;
    const jumlahPPh13_1771ii = retVal_dpp13_1771iv*retVal_tarif13_1771ii/100;
    const result_pph13_1771ii= document.getElementById('pph13_1771ii');
    result_pph13_1771ii.value = jumlahPPh13_1771ii.toLocaleString();

    const dpp14_1771iv = $('#dpp14_1771iv').val();
    const tarif14_1771ii = $('#tarif14_1771ii').val();
    retVal_dpp14_1771iv=dpp14_1771iv ? parseFloat(dpp14_1771iv.replace(/,/g, '')) : 0;
    retVal_tarif14_1771ii=tarif14_1771ii ? parseFloat(tarif14_1771ii.replace(/,/g, '')) : 0;
    const jumlahPPh14_1771ii = retVal_dpp14_1771iv*retVal_tarif14_1771ii/100;
    const result_pph14_1771ii= document.getElementById('pph14_1771ii');
    result_pph14_1771ii.value = jumlahPPh14_1771ii.toLocaleString();

    const jumlahdpp_1771iv = retVal_dpp1_1771iv+retVal_dpp2_1771iv+retVal_dpp3_1771iv+retVal_dpp4_1771iv+retVal_dpp5_1771iv+retVal_dpp6_1771iv+retVal_dpp7_1771iv+retVal_dpp8a_1771iv+retVal_dpp8b_1771iv+retVal_dpp8c_1771iv+retVal_dpp9_1771iv+retVal_dpp10_1771iv+retVal_dpp11_1771iv+retVal_dpp12_1771iv+retVal_dpp13_1771iv+retVal_dpp14_1771iv;
    const jumlahrupiah_1771iv = jumlahPPh1_1771ii+jumlahPPh2_1771ii+jumlahPPh3_1771ii+jumlahPPh4_1771ii+jumlahPPh5_1771ii+jumlahPPh6_1771ii+jumlahPPh7_1771ii+jumlahPPh8a_1771ii+jumlahPPh8b_1771ii+jumlahPPh8c_1771ii+jumlahPPh9_1771ii+jumlahPPh10_1771ii+jumlahPPh11_1771ii+jumlahPPh12_1771ii+jumlahPPh13_1771ii+jumlahPPh14_1771ii;
    const result_jumlahdpp14_1771iv= document.getElementById('jumlahdpp14_1771iv');
    result_jumlahdpp14_1771iv.value = jumlahdpp_1771iv.toLocaleString();
    const result_jumlahpph14_1771ii= document.getElementById('jumlahpph14_1771ii');
    result_jumlahpph14_1771ii.value = jumlahrupiah_1771iv.toLocaleString();

    const bruto1_1771iv = $('#bruto1_1771iv').val();
    const bruto2_1771iv = $('#bruto2_1771iv').val();
    const bruto3_1771iv = $('#bruto3_1771iv').val();
    const bruto4_1771iv = $('#bruto4_1771iv').val();
    const bruto5_1771iv = $('#bruto5_1771iv').val();
    const bruto6_1771iv = $('#bruto6_1771iv').val();
    const bruto7_1771iv = $('#bruto7_1771iv').val();
    retVal_bruto1_1771iv=bruto1_1771iv ? parseFloat(bruto1_1771iv.replace(/,/g, '')) : 0;
    retVal_bruto2_1771iv=bruto2_1771iv ? parseFloat(bruto2_1771iv.replace(/,/g, '')) : 0;
    retVal_bruto3_1771iv=bruto3_1771iv ? parseFloat(bruto3_1771iv.replace(/,/g, '')) : 0;
    retVal_bruto4_1771iv=bruto4_1771iv ? parseFloat(bruto4_1771iv.replace(/,/g, '')) : 0;
    retVal_bruto5_1771iv=bruto5_1771iv ? parseFloat(bruto5_1771iv.replace(/,/g, '')) : 0;
    retVal_bruto6_1771iv=bruto6_1771iv ? parseFloat(bruto6_1771iv.replace(/,/g, '')) : 0;
    retVal_bruto7_1771iv=bruto7_1771iv ? parseFloat(bruto7_1771iv.replace(/,/g, '')) : 0;
    const jumlahbruto_1771iv=retVal_bruto1_1771iv+retVal_bruto2_1771iv+retVal_bruto3_1771iv+retVal_bruto4_1771iv+retVal_bruto5_1771iv+retVal_bruto6_1771iv+retVal_bruto7_1771iv;
    const result_jumlahbruto_1771iv= document.getElementById('jumlahbruto_1771iv');
    result_jumlahbruto_1771iv.value = jumlahbruto_1771iv.toLocaleString();
    return retVal.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}