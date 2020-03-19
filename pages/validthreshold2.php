<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Perhitungan</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="../assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/libs/css/style.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
</head>

<body>
<!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
         <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="../index.php">Perhitungan</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                </div>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <br>
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                    <br>
                    <br>
                
                                <?php
                                $start = microtime(true);
                                include '../config.php';
                                include 'stemming.php';
                                
                                function preproses($cerita) {
                                    //proses case folding	
    								$cerita = strtolower($cerita);	//fungsi untuk mengubah menjadi huruf kecil	
    								$simbol = array('1','2','3','4','5','6','7','8','9','0','-','/','\\',',','.','#',':',';','\'','"','[',']','{','}',')','(','|','`','~','!','@','%','$','^','&','*','=','?','+','–',"'",'_');
    								$cerita = str_replace($simbol, '', $cerita);	//menghapus simbol
    
    								//proses tokenizing
    								$cerita = explode(" ", $cerita);	//memecah string berdasarkan tanda pemisah yang sudah ditentukan (spasi) ke dalam bentuk array
    								
    								//proses filtering
    								$stopwords = file_get_contents("stoplist.txt");
    								$stopwords = preg_split("/[\s]+/", $stopwords);	//memecah string pada dokumen stoplist.txt menjadi array
    								$cerita    = array_diff($cerita, $stopwords);	//membandingkan array cerita dan array stoplist dan menghapus array pada $cerita yang terdapat pada $stopwords

    								//proses stemming
    								foreach ($cerita as $key => $value){
    								    $cerita[$key] = stemming($value);
    								}
    								$cerita = array_filter($cerita);
    								$cerita = array_values($cerita);
    								$cerita = implode(" ", $cerita);
    								$cerita = trim($cerita);
                                    $data = explode(' ',$cerita); //memecah kalimat menjadi kata-kata berdasarkan spasi
                                
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
                                
                                function token($teks) {
                                    $teks = trim($teks);
                                    $data = explode(' ',$teks); //memecah kalimat menjadi kata-kata berdasarkan spasi
                                
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
                                
                                function insertLS($text,$table){
                                    for($i=0;$i<sizeof($text);$i++){
                                        if(!in_array($text[$i],array_column($table,0))){
                                            $table[sizeof($table)][0]=$text[$i];
                                        }
                                    }
                                    return $table;
                                }
                                
                                function hitungTF($tabel,$berita){
                                    for ($i=1;$i<sizeof($tabel);$i++){
                                        $a=sizeof($tabel[$i]);
                                        $tabel[$i][$a] = count(array_keys($berita,$tabel[$i][0]));
                                    }
                                    return $tabel;
                                }
                                
                                function queryTF($table,$cerita){
                                    for ($i=1;$i<sizeof($table);$i++){
                                        $a=sizeof($table[$i]);
                                        $table[$i][$a] = count(array_keys($cerita,$table[$i][0]));
                                    }
                                    return $table;
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
                                
                                function Whumor($tabel){
                                    $df = cariAtrib($tabel,"DF");
                                    $b  = 0;
                                    $c  = 0;
                                    for ($x=135;$x<161;$x++){
                                        for ($i=1;$i<sizeof($tabel);$i++){
                                            $fd = $tabel[$i][$df];
                                            if($fd>=2 and $fd<=10){
                                                $b += $tabel[$i][$x];
                                            }
                                        }
                                        $c += $b;
                                    }
                                    return $c;
                                }
                                
                                function Whoror($tabel){
                                    $df = cariAtrib($tabel,"DF");
                                    $b  = 0;
                                    $c  = 0;
                                    for ($x=161;$x<187;$x++){
                                        for ($i=1;$i<sizeof($tabel);$i++){
                                            $fd = $tabel[$i][$df];
                                            if($fd>=2 and $fd<=10){
                                                $b += $tabel[$i][$x];
                                            }
                                        }
                                        $c += $b;
                                    }
                                    return $c;
                                }
                                
                                function Wroman($tabel){
                                    $df = cariAtrib($tabel,"DF");
                                    $b  = 0;
                                    $c  = 0;
                                    for ($x=187;$x<213;$x++){
                                        for ($i=1;$i<sizeof($tabel);$i++){
                                            $fd = $tabel[$i][$df];
                                            if($fd>=2 and $fd<=10){
                                                $b += $tabel[$i][$x];
                                            }
                                        }
                                        $c += $b;
                                    }
                                    return $c;
                                }
                                
                                function Wmisteri($tabel){
                                    $df = cariAtrib($tabel,"DF");
                                    $b  = 0;
                                    $c  = 0;
                                    for ($x=213;$x<239;$x++){
                                        for ($i=1;$i<sizeof($tabel);$i++){
                                            $fd = $tabel[$i][$df];
                                            if($fd>=2 and $fd<=10){
                                                $b += $tabel[$i][$x];
                                            }
                                        }
                                        $c += $b;
                                    }
                                    return $c;
                                }
                                
                                function Wspiritual($tabel){
                                    $df = cariAtrib($tabel,"DF");
                                    $b  = 0;
                                    $c  = 0;
                                    for ($x=239;$x<265;$x++){
                                        for ($i=1;$i<sizeof($tabel);$i++){
                                            $fd = $tabel[$i][$df];
                                            if($fd>=2 and $fd<=10){
                                                $b += $tabel[$i][$x];
                                            }
                                        }
                                        $c += $b;
                                    }
                                    return $c;
                                }
                                
                                // function Whumor($tabel){
                                //     $b = 0;
                                //     for ($x=135;$x<161;$x++){
                                //         $a = array_sum(array_column($tabel,$x));
                                //         $b += $a;
                                //     }
                                //     return $b;
                                // }
                                
                                // function Whoror($tabel){
                                //     $b = 0;
                                //     for ($x=161;$x<187;$x++){
                                //         $a = array_sum(array_column($tabel,$x));
                                //         $b += $a;
                                //     }
                                //     return $b;
                                // }
                                
                                // function Wroman($tabel){
                                //     $b = 0;
                                //     for ($x=187;$x<213;$x++){
                                //         $a = array_sum(array_column($tabel,$x));
                                //         $b += $a;
                                //     }
                                //     return $b;
                                // }
                                
                                // function Wmisteri($tabel){
                                //     $b = 0;
                                //     for ($x=213;$x<239;$x++){
                                //         $a = array_sum(array_column($tabel,$x));
                                //         $b += $a;
                                //     }
                                //     return $b;
                                // }
                                
                                // function Wspiritual($tabel){
                                //     $b = 0;
                                //     for ($x=239;$x<265;$x++){
                                //         $a = array_sum(array_column($tabel,$x));
                                //         $b += $a;
                                //     }
                                //     return $b;
                                // }
                                
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
                                
                                function WIdf($tabel){
                                    $idf = cariAtrib($tabel,"IDF");
                                    $c   = 0;
                                    for ($i=1;$i<sizeof($tabel);$i++){
                                        $c += $tabel[$i][$idf];
                                    }
                                    $c;
                                    return $c;
                                }
                                
                                
                                function penamaan($tabel){
                                    $tabel[0][0]="TERM";
                                    $tabel[0][1]="Q";
                                    $tabel[0][sizeof($tabel[1])-1]="DF";
                                    $tabel[0][sizeof($tabel[1])]="IDF";
                                    $jumlah = sizeof($tabel[1])-1-cariAtrib($tabel,"Q")-1;
                                    for ($i=2;$i<$jumlah+2;$i++){
                                        $x=$i-1;
                                        $tabel[0][$i] = "D$x";
                                    }
                                    $tabel[0][sizeof($tabel[1])+1]="WDQ";
                                    $awal = sizeof($tabel[1])+2;
                                    $n = 1;
                                    for ($d=$awal;$d<$jumlah+$awal;$d++){
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
                                    $ddf = cariAtrib($tabel, "DF");
                                    echo "<table border=1 cellpadding=2>";
                                    for ($d=0;$d<sizeof($tabel);$d++){
                                        echo "<tr>";
                                        for ($i=0;$i<sizeof($tabel[$d]);$i++){
                                            $a = $tabel[$d][$i];
                                            $df = $tabel[$d][$ddf];
                                            if($d > 0){
                                                if($df >=2 and $df<= 10){
                                                    echo "<th>$a</th>";  
                                                }
                                            }else{
                                                echo "<th>$a</th>"; 
                                            }
                                        }
                                        echo "</tr>";
                                    }
                                    echo "</table>";
                                }
                                
                                
                                function jumlahData($tabel){
                                    $ddf = cariAtrib($tabel, "DF");
                                    $jumlah = 0;
                                    for ($d=0;$d<sizeof($tabel);$d++){
                                        $df = $tabel[$d][$ddf];
                                        if($d > 0){
                                            if($df >=2 and $df<= 10){
                                                $jumlah++;
                                            }
                                        }
                                    }
                                    return $jumlah;
                                }
                                
                                function printTable($tabel){
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
                                
                                function LaplaceSmoothing($table){
                                    $table[0][0] = "Term";
                                    $table[0][1] = "TF";
                                    $table[0][2] = "Humor";
                                    $table[0][3] = "Horor";
                                    $table[0][4] = "Roman";
                                    $table[0][5] = "Misteri";
                                    $table[0][6] = "Spiritual";
                                    return $table;
                                }
                                
                                function LShumor($table,$tabel){
                                    $j = cariAtrib($tabel,"DF");
                                    for ($i=1;$i<sizeof($table);$i++){
                                        $a = 0;
                                        for ($x=135;$x<161;$x++){
                                            $a += $tabel[$i][$x];
                                        }
                                        $table[$i][2] = round(($a + 1)/(WIdf($tabel) + Whumor($tabel)),8);
                                    }
                                    return $table;
                                }
                                
                                function LShoror($table,$tabel){
                                    $j = cariAtrib($tabel,"DF");
                                    for ($i=1;$i<sizeof($table);$i++){
                                        $a = 0;
                                        for ($x=161;$x<187;$x++){
                                            $a += $tabel[$i][$x];
                                        }
                                        $table[$i][3] = round(($a + 1)/(WIdf($tabel) + Whoror($tabel)),8);
                                    }
                                    return $table;
                                }
                                
                                function LSroman($table,$tabel){
                                    $j = cariAtrib($tabel,"DF");
                                    for ($i=1;$i<sizeof($table);$i++){
                                        $a = 0;
                                        for ($x=187;$x<213;$x++){
                                            $a += $tabel[$i][$x];
                                        }
                                        $table[$i][4] = round(($a + 1)/(WIdf($tabel) + Wroman($tabel)),8);
                                    }
                                    return $table;
                                }
                                
                                function LSmisteri($table,$tabel){
                                    $j = cariAtrib($tabel,"DF");
                                    for ($i=1;$i<sizeof($table);$i++){
                                        $a = 0;
                                        for ($x=213;$x<239;$x++){
                                            $a += $tabel[$i][$x];
                                        }
                                        $table[$i][5] = round(($a + 1)/(WIdf($tabel) + Wmisteri($tabel)),8);
                                    }
                                    return $table;
                                }
                                
                                function LSspiritual($table,$tabel){
                                    $j = cariAtrib($tabel,"DF");
                                    for ($i=1;$i<sizeof($table);$i++){
                                        $a = 0;
                                        for ($x=239;$x<265;$x++){
                                            $a += $tabel[$i][$x];
                                        }
                                        $table[$i][6] = round(($a + 1)/(WIdf($tabel) + Wspiritual($tabel)),8);
                                    }
                                    return $table;
                                }
                                
                                function Phumor($table){
                                    $b = 1;
                                    for ($i=1;$i<sizeof($table);$i++){
                                        $b *= $table[$i][2];
                                    }
                                    $b;
                                    return $b;
                                }
                                
                                function Phoror($table){
                                    $b = 1;
                                    for ($i=1;$i<sizeof($table);$i++){
                                        $b *= $table[$i][3];
                                    }
                                    $b;
                                    return $b;
                                }
                                
                                function Proman($table){
                                    $b = 1;
                                    for ($i=1;$i<sizeof($table);$i++){
                                        $b *= $table[$i][4];
                                    }
                                    $b;
                                    return $b;
                                }
                                
                                function Pmisteri($table){
                                    $b = 1;
                                    for ($i=1;$i<sizeof($table);$i++){
                                        $b *= $table[$i][5];
                                    }
                                    $b;
                                    return $b;
                                }
                                
                                function Pspiritual($table){
                                    $b = 1;
                                    for ($i=1;$i<sizeof($table);$i++){
                                        $b *= $table[$i][6];
                                    }
                                    $b;
                                    return $b;
                                }
                            
                                $data = mysqli_query($conn,"SELECT * FROM data_cerita");
                                while ($c = mysqli_fetch_array($data)) {
                                    $doc[] = $c['cerita_preprossesing'];
                                }
                                
                                    $query = $_POST['inputan'];
                                    for ($i=0; $i < sizeof($doc); $i++) { 
                                        $doc[$i] = token($doc[$i]);
                                    }
                                    $queri = preproses($query);
                                    echo "<br>";
                                    $tabel[0][0]='';
                                    $tabel = insert($queri,$tabel);
                                    
                                    for ($i=0; $i < sizeof($doc); $i++) { 
                                        $tabel = insert($doc[$i],$tabel);
                                    }
                                    
                                    $tabel = hitungTF($tabel,$queri);
                                    for ($i=0; $i < sizeof($doc); $i++) { 
                                        $tabel = hitungTF($tabel,$doc[$i]);
                                    }
                                
                                    $tabel   = hitungDF($tabel);
                                    $tabel   = penamaan($tabel);
                                    $tabel   = hitungIDF($tabel);
                                    $tabel   = hitungWdt($tabel);
                                    
                                    
                                    
                                    
                                    
                                ?>
                                <div class="tab-regular">
                                <ul class="nav nav-tabs nav-fill" id="myTab7" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="home-tab-justify" data-toggle="tab" href="#home-justify" role="tab" aria-controls="home" aria-selected="true">Preprossesing</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="profile-tab-justify" data-toggle="tab" href="#profile-justify" role="tab" aria-controls="profile" aria-selected="false">Pembobotan Kata</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="about-tab-justify" data-toggle="tab" href="#about-justify" role="tab" aria-controls="about" aria-selected="false">Klasifikasi</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent7">
                                    <div class="tab-pane fade show active" id="home-justify" role="tabpanel" aria-labelledby="home-tab-justify">
                                        <?php    
                                        print ("<h3><b>Preprossesing</b></h3><hr />");
                                        echo "<br><b><u>Query Sebelum Preprossesing: </u></b>";echo "$query";
                                        
                                        echo "<br><b><u>Query Setelah Preprossesing: </u></b>";echo implode(" ", $queri);echo "<br>";
                                        ?>
                                    </div>
                                    <div class="tab-pane fade" id="profile-justify" role="tabpanel" aria-labelledby="profile-tab-justify">
                                        <?php
                                        echo "<br><br ><b><u>Tabel TF IDF</u></b>";
                                        echo "<br>Jumlah Data: " . sizeof($doc);
                                        echo "<br>Jumlah Term: " . jumlahData($tabel);
                                        printTabel($tabel);
                                        ?>
                                    </div>
                                    <div class="tab-pane fade" id="about-justify" role="tabpanel" aria-labelledby="profile-tab-justify">
                                        <?php
                                        echo "<br>Jumlah W (humor)     = " . Whumor($tabel);
                                        echo "<br>Jumlah W (horor)     = " . Whoror($tabel);
                                        echo "<br>Jumlah W (roman)     = " . Wroman($tabel);
                                        echo "<br>Jumlah W (misteri)   = " . Wmisteri($tabel);
                                        echo "<br>Jumlah W (spiritual) = " . Wspiritual($tabel);
                                        echo "<br>";
                                        echo "<br>Jumlah W idf = " . WIdf($tabel);
                                        echo "<br>";
                                        
                                        echo "<br>Prior Probabilitas P(humor) = " . round(26/130,3);
                                        echo "<br>Prior Probabilitas P(horor) = " . round(26/130,3);
                                        echo "<br>Prior Probabilitas P(roman) = " . round(26/130,3);
                                        echo "<br>Prior Probabilitas P(misteri) = " . round(26/130,3);
                                        echo "<br>Prior Probabilitas P(spiritual) = " . round(26/130,3);
                                        
                                        $table[0][0]='';
                                        echo "<br><br ><b><u>Tabel Laplace Smoothing</u></b>";
                                        $table = LaplaceSmoothing($table);
                                        $table = insertLS($queri,$table);
                                        $table = queryTF($table,$queri);
                                        $table = LShumor($table,$tabel);
                                        $table = LShoror($table,$tabel);
                                        $table = LSroman($table,$tabel);
                                        $table = LSmisteri($table,$tabel);
                                        $table = LSspiritual($table,$tabel);
                                        printTable($table);
                                        
                                        $humor = Phumor($table)*(26/130);
                                        $horor = Phoror($table)*(26/130);
                                        $roman = Proman($table)*(26/130);
                                        $misteri = Pmisteri($table)*(26/130);
                                        $spiritual = Pspiritual($table)*(26/130);
                                        
                                        echo "<br>Probabilitas P(humor) = " . $humor;
                                        echo "<br>Probabilitas P(horor) = " . $horor;
                                        echo "<br>Probabilitas P(roman) = " . $roman;
                                        echo "<br>Probabilitas P(misteri) = " . $misteri;
                                        echo "<br>Probabilitas P(spiritual) = " . $spiritual;
                                        
                                        $max = max($humor,$horor,$roman,$misteri,$spiritual);
                                        // echo "<br><br>" .$max;
                                        echo "<br>";
                                        if ($max == $humor){
                                            echo "<br><h3>HASIL KLASIFIKASI : HUMOR</h3>";
                                        }if ($max == $horor){
                                            echo "<br><h3>HASIL KLASIFIKASI : HOROR</h3>";
                                        }if ($max == $roman){
                                            echo "<br><h3>HASIL KLASIFIKASI : ROMAN</h3>";
                                        }if ($max == $misteri){
                                            echo "<br><h3>HASIL KLASIFIKASI : MISTERI</h3>";
                                        }if ($max == $spiritual){
                                            echo "<br><h3>HASIL KLASIFIKASI : SPIRITUAL</h3>";
                                        }
                                        $end = microtime(true);
                                        $time = $end - $start;
                                        echo "<br><p align='right'><b>Lama Eksekusi : " . round($time,3) . "</b></p>";
                                        ?>
                                    </div>
                                </div>
                            </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        
    <!-- Optional JavaScript -->
    <script src="../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
</body>
 
</html>