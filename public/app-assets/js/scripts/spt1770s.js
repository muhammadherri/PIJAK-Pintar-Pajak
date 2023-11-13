document.addEventListener('DOMContentLoaded', function() {
    // const id_npwp_1770s = document.getElementById('id_npwp_1770s');
    // const errorid_npwp_1770s = document.getElementById('errorid_npwp_1770s');
    // id_npwp_1770s.addEventListener('input', function() {
    //     const inputValue = id_npwp_1770s.value;

    //     if (inputValue.length > 15) {
    //         id_npwp_1770s.value = inputValue.slice(0, 15);
    //         errorid_npwp_1770s.textContent = 'Maksimal 15 digit';
    //     } else {
    //         errorid_npwp_1770s.textContent = '';
    //     }
    // });
    // const pernyataan_npwp_1770s = document.getElementById('pernyataan_npwp_1770s');
    // const errorpernyataan_npwp_1770s = document.getElementById('errorpernyataan_npwp_1770s');
    // pernyataan_npwp_1770s.addEventListener('input', function() {
    //     const inputValue = pernyataan_npwp_1770s.value;

    //     if (inputValue.length > 15) {
    //         pernyataan_npwp_1770s.value = inputValue.slice(0, 15);
    //         errorpernyataan_npwp_1770s.textContent = 'Maksimal 15 digit';
    //     } else {
    //         errorpernyataan_npwp_1770s.textContent = '';
    //     }
    // });

    // const id_npwp_pasangan_1770s = document.getElementById('id_npwp_pasangan_1770s');
    // const errorid_npwp_pasangan_1770s = document.getElementById('errorid_npwp_pasangan_1770s');
    // id_npwp_pasangan_1770s.addEventListener('input', function() {
    //     const inputValue = id_npwp_pasangan_1770s.value;

    //     if (inputValue.length > 15) {
    //         id_npwp_pasangan_1770s.value = inputValue.slice(0, 15);
    //         errorid_npwp_pasangan_1770s.textContent = 'Maksimal 15 digit';
    //     } else {
    //         errorid_npwp_pasangan_1770s.textContent = '';
    //     }
    // });

    const inputa1_rupiah_1770s = document.getElementById('a1_rupiah_1770s');
    const inputa2_rupiah_1770s = document.getElementById('a2_rupiah_1770s');
    const inputa3_rupiah_1770s = document.getElementById('a3_rupiah_1770s');
    const inputa5_rupiah_1770s = document.getElementById('a5_rupiah_1770s');
    const inputb7_rupiah_1770s = document.getElementById('b7_rupiah_1770s');
    const inputc9_rupiah_1770s = document.getElementById('c9_rupiah_1770s');
    const inputc10_rupiah_1770s = document.getElementById('c10_rupiah_1770s');
    const inputd12_rupiah_1770s = document.getElementById('d12_rupiah_1770s');
    const inputd14a_rupiah_1770s = document.getElementById('d14a_rupiah_1770s');
    const inputd14b_rupiah_1770s = document.getElementById('d14b_rupiah_1770s');

    const resulta4_rupiah_1770s = document.getElementById('a4_rupiah_1770s');
    const resulta6_rupiah_1770s = document.getElementById('a6_rupiah_1770s');
    const resultb8_rupiah_1770s = document.getElementById('b8_rupiah_1770s');
    const resultc11_rupiah_1770s = document.getElementById('c11_rupiah_1770s');
    const resultd13_jumlah_1770s = document.getElementById('d13_jumlah_1770s');
    const resultd15_rupiah_1770s = document.getElementById('d15_rupiah_1770s');
    const resulte16_rupiah_1770s = document.getElementById('e16_rupiah_1770s');
    [inputd14b_rupiah_1770s,inputd14a_rupiah_1770s,inputd12_rupiah_1770s,inputc10_rupiah_1770s,inputc9_rupiah_1770s,inputb7_rupiah_1770s,inputa5_rupiah_1770s,inputa1_rupiah_1770s,inputa2_rupiah_1770s,inputa3_rupiah_1770s]
    .forEach(input => {
        input.addEventListener('input', update1111);
    });
    function update1111() {
        const a1_rupiah_1770s = parseFloat(inputa1_rupiah_1770s.value) || 0;
        const a2_rupiah_1770s = parseFloat(inputa2_rupiah_1770s.value) || 0;
        const a3_rupiah_1770s = parseFloat(inputa3_rupiah_1770s.value) || 0;
        const jumlahrupiah4 =a1_rupiah_1770s+a2_rupiah_1770s+a3_rupiah_1770s;
        resulta4_rupiah_1770s.value=jumlahrupiah4;
        
        const a5_rupiah_1770s = parseFloat(inputa5_rupiah_1770s.value) || 0;
        const jumlahrupiah6 =jumlahrupiah4-a5_rupiah_1770s;
        if(jumlahrupiah6<0){
            resulta6_rupiah_1770s.value=0;
        }else{
            resulta6_rupiah_1770s.value=jumlahrupiah6;
        }
        
        const b7_rupiah_1770s = parseFloat(inputb7_rupiah_1770s.value) || 0;
        const jumlahrupiah8 =jumlahrupiah6-b7_rupiah_1770s;
        if(jumlahrupiah8<0){
            resultb8_rupiah_1770s.value=0;
        }else{
            resultb8_rupiah_1770s.value=jumlahrupiah8;
        }
        
        const c9_rupiah_1770s = parseFloat(inputc9_rupiah_1770s.value) || 0;
        const c10_rupiah_1770s = parseFloat(inputc10_rupiah_1770s.value) || 0;
        const jumlahrupiah11 = c9_rupiah_1770s+c10_rupiah_1770s
        resultc11_rupiah_1770s.value=jumlahrupiah11;
        
        const d12_rupiah_1770s = parseFloat(inputd12_rupiah_1770s.value) || 0;
        const jumlahrupiah13 = jumlahrupiah11-d12_rupiah_1770s
        if(jumlahrupiah13<0){
            resultd13_jumlah_1770s.value=0;
        }else{
            resultd13_jumlah_1770s.value=jumlahrupiah13;
        }

        const d14a_rupiah_1770s = parseFloat(inputd14a_rupiah_1770s.value) || 0;
        const d14b_rupiah_1770s = parseFloat(inputd14b_rupiah_1770s.value) || 0;
        const jumlahrupiah15 = d14a_rupiah_1770s+d14b_rupiah_1770s
        resultd15_rupiah_1770s.value=jumlahrupiah15;
        const jumlahrupiah16=jumlahrupiah13-jumlahrupiah15;
        if(jumlahrupiah16<0){
            resulte16_rupiah_1770s.value=0;
        }else{
            resulte16_rupiah_1770s.value=jumlahrupiah16;
        }
    }
});