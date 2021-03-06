
<?php
include '../config.php';

function preproses($teks) {
    $teks = trim($teks);
    $data = explode(' ',$teks); //memecah kalimat menjadi kata-kata berdasarkan spasi
    //print_r($data);

    for($i=0;$i<sizeof($data);$i++){
        if($data[$i]==""){
            unset($data[$i]);
            $temp=array_values($data);
            $data=array_values($temp);
            $i--;
        }
    }
   return $data;
} 

function insert($teks,$tabel){

    for($i=0;$i<sizeof($teks);$i++){
        if(!in_array($teks[$i],array_column($tabel,0))){
            $tabel[sizeof($tabel)][0]=$teks[$i];
        }
    }
    return $tabel;
}

function hitungTF($tabel,$berita){
    for ($i=1;$i<sizeof($tabel);$i++){
        $a=sizeof($tabel[$i]);
        $tabel[$i][$a] = count(array_keys($berita,$tabel[$i][0]));
    }
    return $tabel;
}

function hitungDF($tabel){
    $df = 0;
    for ($i=1;$i<sizeof($tabel);$i++){
        for ($d=1;$d<sizeof($tabel[$i]);$d++){
            if($tabel[$i][$d]!=0){
                $df++;
            }
        }
        $tabel[$i][sizeof($tabel[$i])]=$df;
        $df = 0;
    }
    return $tabel;
}

function hitungIDF($tabel){
    $index = cariAtrib($tabel,"DF");
    $jumlah = $index-1;
    for ($i=1;$i<sizeof($tabel);$i++){
        $tabel[$i][$index+1] = round(log10($jumlah/$tabel[$i][$index]),3);
    }
    return $tabel;
}

function hitungWdt($tabel){
    $idf = cariAtrib($tabel,"IDF");
    $h = 1;
    for ($i=$idf+1;$i<sizeof($tabel[0]);$i++){
        for ($d=1;$d<sizeof($tabel);$d++){
            $tabel[$d][$i] = $tabel[$d][$h] * $tabel[$d][$idf];
        }
        $h++;
    }
    return $tabel;
}


function penamaan($tabel){
    $tabel[0][0]="TERM";
    $tabel[0][sizeof($tabel[1])-1]="DF";
    $tabel[0][sizeof($tabel[1])]="IDF";
    $jumlah = sizeof($tabel[1])-1;
    for ($i=1;$i<$jumlah;$i++){
        $x=$i;
        $tabel[0][$i] = "D$x";
    }
    
    $awal = sizeof($tabel[1])+1;
    $n = 1;
    for ($d=$awal;$d<$jumlah+$awal-1;$d++){
        $tabel[0][$d] = "WD$n";
        $n++;
    }
    return $tabel;
}

function cariAtrib($tabel,$query){
    for ($i=0;$i<sizeof($tabel[0]);$i++){
        if($tabel[0][$i]==$query){
            return $i;
        }
    }
    return "not found";
}

function printTabel($tabel){
    echo "<table border=1 cellpadding=2>";
    for ($d=0;$d<sizeof($tabel);$d++){
        echo "<tr>";
        for ($i=0;$i<sizeof($tabel[$d]);$i++){
            $a = $tabel[$d][$i];
            echo "<th>$a</th>";
        }
        echo "</tr>";
    }
    echo "</table>";
}


$data = mysqli_query($conn,"select * from data_cerita");
while ($c = mysqli_fetch_array($data)) {
    $doc[] = $c['cerita_preprossesing'];
}
    for ($i=0; $i < sizeof($doc); $i++) { 
        $doc[$i] = preproses($doc[$i]);
    }
    
    echo "<br>";
    $tabel[0][0]='';
    for ($i=0; $i < sizeof($doc); $i++) { 
        $tabel = insert($doc[$i],$tabel);
    }

    for ($i=0; $i < sizeof($doc); $i++) { 
        $tabel = hitungTF($tabel,$doc[$i]);
    }

    $tabel   = hitungDF($tabel);
    $tabel   = penamaan($tabel);
    $tabel   = hitungIDF($tabel);
    $tabel   = hitungWdt($tabel);

    print ("<b>Tabel TF IDF</b><hr />");
    echo "<br>Jumlah Data: " . sizeof($doc);
    echo "<br>Jumlah Term: " ;
    printTabel($tabel);



