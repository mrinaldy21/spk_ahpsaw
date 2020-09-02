<?php
/** rel_kriteria */
if (@$_POST['perbandingan']){
    $ID1 = $_POST['id1'];
    $ID2 = $_POST['id2'];
    $nilai = abs($_POST['nilai']);
    
    if($ID1==$ID2 && $nilai<>1)
        print_msg("Kriteria yang sama harus bernilai 1.");
    else{
        mysqli_query($con,"UPDATE bobot_kriteria SET nilai=$nilai WHERE id1='$ID1' AND id2='$ID2'");
        mysqli_query($con,"UPDATE bobot_kriteria SET nilai=1/$nilai WHERE id2='$ID1' AND id1='$ID2'");
        print_msg("Nilai kriteria berhasil diubah.", 'success');
    }
}