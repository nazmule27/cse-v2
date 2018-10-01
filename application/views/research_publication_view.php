<?php
$this->load->view('common/header');
$this->load->view('common/navbar');
?>

<div class="container padding-top-120">
    <h3 class="header-bg">Publications:</h3>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <p>Since 1997 the number of publications in international conferences and journals of the department <b>exceeds over 200</b>. It includes research on graph theory, parallel processing, image processing and pattern recognition, database management system and information management system, expert system design, networking, computer aided teaching etc.</p>
            <p>The teachers and students of the department have publications in various reputed international journals like <b>Journal of Algorithms</b>, Journal of Graph Algorithms and Applications, Journal of Heuristics, Theoretical Computer Science, Computational Geometry: Theory and Applications, <b>IEEE Transactions on Neural Networks</b>, Information Processing Letters, Studia Informatica Universalis, Telecommunication Systems, IEICE Transactions on Information and Systems, Applied Mathematics E-Notes etc.</p>
            <p>Faculty members present their research works in reputed international conferences like <b>ISAAC</b> (International Symposium on Algorithms and Computation), <b>COCOON</b> (International Conference on Computing and Combinatorics), <b>GD</b> (Symposium on Graph Drawing), <b>WG</b> (Workshop on Graph-Theoretic Concepts in Computer Science), <b>ICCIT</b> (International Conference on Computer and Information Technology), <b>IEEE</b> International Symposium on Intelligent Signal, Processing and Communications Systems, IEEE International Performance Computing and Communications Conference, IEEE International Conference on Communications etc.</p>
            <h4 class="half-width"><b>Publications List:</b></h4>
            <div class="form-inline form-group pull-right">
                <label for="year">Select Year</label>
                <?php
                $options=$pub_year;
                $options = array('all' => 'All') + $options;
                echo form_dropdown('year', $options, '', 'class="form-control" onchange="showYear(this.value)"');
                ?>
            </div>
            <div id="txtPub">
                <table class="table publication">
                    <tbody>
                    <?php $k=1; for ($i = 0; $i < count($research_pub); ++$i) {?>
                        <tr>
                            <td><?php echo $k.'.';?></td>
                            <td> <?php echo $research_pub[$i]->authors.', <b>'.$research_pub[$i]->title.'</b>, <i>'.$research_pub[$i]->c_j_name.'</i>, '.$research_pub[$i]->vol.', '.$research_pub[$i]->page.', '.$research_pub[$i]->year;?>. <?php if ($research_pub[$i]->doi) echo '<a href="https://doi.org/'.$research_pub[$i]->doi.'"> [paper link]</a>';?></td>
                        </tr>
                        <?php $k++;} ?>
                    </tbody>
                </table>
            </div>
        </div>
        <script>
            function showYear(str) {
                if (str == "") {
                    document.getElementById("txtPub").innerHTML = "";
                    return;
                } else {
                    if (window.XMLHttpRequest) {
                        xmlhttp = new XMLHttpRequest();
                    } else {
                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                    }
                    xmlhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            document.getElementById("txtPub").innerHTML = this.responseText;
                        }
                    };
                    xmlhttp.open("GET","<?=base_url();?>researches/publication_ajax/"+str,true);
                    xmlhttp.send();
                }
            }
        </script>
    </div> <!--row end-->
    <?php
    $this->load->view('common/footer');
    ?>

 
