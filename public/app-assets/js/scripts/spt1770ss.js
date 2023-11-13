document.addEventListener('DOMContentLoaded', function() {
    // const id_npwp_1770ss = document.getElementById('id_npwp_1770ss');
    // const errorid_npwp_1770ss = document.getElementById('errorid_npwp_1770ss');
    // id_npwp_1770ss.addEventListener('input', function() {
    //     const inputValue = id_npwp_1770ss.value;

    //     if (inputValue.length > 15) {
    //         id_npwp_1770ss.value = inputValue.slice(0, 15);
    //         errorid_npwp_1770ss.textContent = 'Maksimal 15 digit';
    //     } else {
    //         errorid_npwp_1770ss.textContent = '';
    //     }
    // });
    const inputa1_pajak_1770ss = document.getElementById('a1_pajak_1770ss');
    const inputa2_pajak_1770ss = document.getElementById('a2_pajak_1770ss');
    const inputa3_pajak_1770ss = document.getElementById('a3_pajak_1770ss');
    const inputa5_pajak_1770ss = document.getElementById('a5_pajak_1770ss');
    const inputa6_pajak_1770ss = document.getElementById('a6_pajak_1770ss');

    const resultea4_pajak_1770ss = document.getElementById('a4_pajak_1770ss');
    const resultea7_pajak_jumlah_1770ss = document.getElementById('a7_pajak_jumlah_1770ss');
    [inputa6_pajak_1770ss,inputa5_pajak_1770ss,inputa1_pajak_1770ss,inputa2_pajak_1770ss,inputa3_pajak_1770ss]
    .forEach(input => {
        input.addEventListener('input', update1770ss);
    });
    function update1770ss() {
        const a1_pajak_1770ss = parseFloat(inputa1_pajak_1770ss.value) || 0;
        const a2_pajak_1770ss = parseFloat(inputa2_pajak_1770ss.value) || 0;
        const a3_pajak_1770ss = parseFloat(inputa3_pajak_1770ss.value) || 0;
        const jumlaha4 = a1_pajak_1770ss-a2_pajak_1770ss-a3_pajak_1770ss;

        if(jumlaha4<0){
            resultea4_pajak_1770ss.value=0;
        }else{
            resultea4_pajak_1770ss.value=jumlaha4;
        }
        
        const a5_pajak_1770ss = parseFloat(inputa5_pajak_1770ss.value) || 0;
        const a6_pajak_1770ss = parseFloat(inputa6_pajak_1770ss.value) || 0;
        const jumlaha7 = a5_pajak_1770ss-a6_pajak_1770ss;
        if(jumlaha7<0){
            resultea7_pajak_jumlah_1770ss.value=0;
        }else{
            resultea7_pajak_jumlah_1770ss.value=jumlaha7;
        }

    }
});