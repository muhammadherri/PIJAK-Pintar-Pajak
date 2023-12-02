function sprator(x) {
    retVal = x ? parseFloat(x.replace(/,/g, '')) : 0;
    
    const a1_rupiah_1770s = $('#a1_rupiah_1770s').val();
    retVal_a1_rupiah_1770s =a1_rupiah_1770s ? parseFloat(a1_rupiah_1770s.replace(/,/g, '')) : 0;

    const a2_rupiah_1770s = $('#a2_rupiah_1770s').val();
    retVal_a2_rupiah_1770s =a2_rupiah_1770s ? parseFloat(a2_rupiah_1770s.replace(/,/g, '')) : 0;

    const a3_rupiah_1770s = $('#a3_rupiah_1770s').val();
    retVal_a3_rupiah_1770s =a3_rupiah_1770s ? parseFloat(a3_rupiah_1770s.replace(/,/g, '')) : 0;
    
    const result_a4_rupiah_1770s = document.getElementById('a4_rupiah_1770s');
    const a4 = retVal_a1_rupiah_1770s+retVal_a2_rupiah_1770s+retVal_a3_rupiah_1770s;
    result_a4_rupiah_1770s.value = a4.toLocaleString();
    
    const a5_rupiah_1770s = $('#a5_rupiah_1770s').val();
    retVal_a5_rupiah_1770s =a5_rupiah_1770s ? parseFloat(a5_rupiah_1770s.replace(/,/g, '')) : 0;
   
    const result_a6_rupiah_1770s = document.getElementById('a6_rupiah_1770s');
    const a6 = a4-retVal_a5_rupiah_1770s;
    if(a6<0){
        result_a6_rupiah_1770s.value = 0;
    }else{
        result_a6_rupiah_1770s.value = a6.toLocaleString();
    }

    const b7_rupiah_1770s = $('#b7_rupiah_1770s').val();
    retVal_b7_rupiah_1770s =b7_rupiah_1770s ? parseFloat(b7_rupiah_1770s.replace(/,/g, '')) : 0;

    const result_b8_rupiah_1770s = document.getElementById('b8_rupiah_1770s');
    const b8 = a6-retVal_b7_rupiah_1770s;
    if(b8<0){
        result_b8_rupiah_1770s.value = 0;
    }else{
        result_b8_rupiah_1770s.value = b8.toLocaleString();
    }

    const c9_rupiah_1770s = $('#c9_rupiah_1770s').val();
    retVal_c9_rupiah_1770s =c9_rupiah_1770s ? parseFloat(c9_rupiah_1770s.replace(/,/g, '')) : 0;
    const c10_rupiah_1770s = $('#c10_rupiah_1770s').val();
    retVal_c10_rupiah_1770s =c10_rupiah_1770s ? parseFloat(c10_rupiah_1770s.replace(/,/g, '')) : 0;

    const result_c11_rupiah_1770s = document.getElementById('c11_rupiah_1770s');
    const c11 = retVal_c9_rupiah_1770s + retVal_c10_rupiah_1770s;
    if(c11<0){
        result_c11_rupiah_1770s.value = 0;
    }else{
        result_c11_rupiah_1770s.value = c11.toLocaleString();
    }

    const d12_rupiah_1770s = $('#d12_rupiah_1770s').val();
    retVal_d12_rupiah_1770s =d12_rupiah_1770s ? parseFloat(d12_rupiah_1770s.replace(/,/g, '')) : 0;

    const result_d13_jumlah_1770s = document.getElementById('d13_jumlah_1770s');
    const d13 = c11 - retVal_d12_rupiah_1770s;
    if(d13<0){
        result_d13_jumlah_1770s.value = 0;
    }else{
        result_d13_jumlah_1770s.value = d13.toLocaleString();
    }

    const d14a_rupiah_1770s = $('#d14a_rupiah_1770s').val();
    retVal_d14a_rupiah_1770s =d14a_rupiah_1770s ? parseFloat(d14a_rupiah_1770s.replace(/,/g, '')) : 0;
    const d14b_rupiah_1770s = $('#d14b_rupiah_1770s').val();
    retVal_d14b_rupiah_1770s =d14b_rupiah_1770s ? parseFloat(d14b_rupiah_1770s.replace(/,/g, '')) : 0;
    
    const result_d15_rupiah_1770s = document.getElementById('d15_rupiah_1770s');
    const d15 = retVal_d14a_rupiah_1770s + retVal_d14b_rupiah_1770s;
    if(d15<0){
        result_d15_rupiah_1770s.value = 0;
    }else{
        result_d15_rupiah_1770s.value = d15.toLocaleString();
    }

    const result_e16_rupiah_1770s = document.getElementById('e16_rupiah_1770s');
    const d16 = d13 - d15;
    if(d16<0){
        result_e16_rupiah_1770s.value = 0;
    }else{
        result_e16_rupiah_1770s.value = d16.toLocaleString();
    }
    return retVal.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}