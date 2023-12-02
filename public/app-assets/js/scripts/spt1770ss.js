function sprator(x) {
    retVal = x ? parseFloat(x.replace(/,/g, '')) : 0;

    const a1_pajak_1770ss = $('#a1_pajak_1770ss').val();
    retVal_a1_pajak_1770ss =a1_pajak_1770ss ? parseFloat(a1_pajak_1770ss.replace(/,/g, '')) : 0;
    const a2_pajak_1770ss = $('#a2_pajak_1770ss').val();
    retVal_a2_pajak_1770ss =a2_pajak_1770ss ? parseFloat(a2_pajak_1770ss.replace(/,/g, '')) : 0;
    const a3_pajak_1770ss = $('#a3_pajak_1770ss').val();
    retVal_a3_pajak_1770ss =a3_pajak_1770ss ? parseFloat(a3_pajak_1770ss.replace(/,/g, '')) : 0;

    const result_a4_pajak_1770ss = document.getElementById('a4_pajak_1770ss');
    const a4 = retVal_a1_pajak_1770ss - retVal_a2_pajak_1770ss - retVal_a3_pajak_1770ss;
    if(a4<0){
        result_a4_pajak_1770ss.value = 0;
    }else{
        result_a4_pajak_1770ss.value = a4.toLocaleString();
    }
    
    const a5_pajak_1770ss = $('#a5_pajak_1770ss').val();
    retVal_a5_pajak_1770ss =a5_pajak_1770ss ? parseFloat(a5_pajak_1770ss.replace(/,/g, '')) : 0;
    const a6_pajak_1770ss = $('#a6_pajak_1770ss').val();
    retVal_a6_pajak_1770ss =a6_pajak_1770ss ? parseFloat(a6_pajak_1770ss.replace(/,/g, '')) : 0;

    const result_a7_pajak_jumlah_1770ss = document.getElementById('a7_pajak_jumlah_1770ss');
    const a7 = retVal_a5_pajak_1770ss - retVal_a6_pajak_1770ss;
    if(a7<0){
        result_a7_pajak_jumlah_1770ss.value = 0;
    }else{
        result_a7_pajak_jumlah_1770ss.value = a7.toLocaleString();
    }

    return retVal.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}