<?php
$this->load->view('common/header');
?>
<style>
    body {
        padding-top: 30px;
        padding-bottom: 20px;
        font: normal 14px 'SolaimanLipi';

    }
</style>
<div class="container">
    <div class="row">
        <h3>Bill List</h3>
        <br>
        <table class="table table-hover table-bordered">
            <thead>
            <tr>
                <th>SL</th>
                <th>Description</th>
                <th>Total Taka</th>
                <th>Bank Return Date</th>
                <th>Status</th>
                <th>Submitted_By</th>
                <th>Edit</th>
                <th>View</th>
            </tr>
            </thead>
            <tbody>
            <?php $k=1; for ($i = 0; $i < count($bills); ++$i) {?>
                <tr>
                    <td><?php echo $k?></td>
                    <td><?php echo $bills[$i]->expense_description?></td>
                    <td><?php echo $bills[$i]->total_taka?></td>
                    <td><?php echo $bills[$i]->date?></td>
                    <td><?php echo $bills[$i]->status?></td>
                    <td><?php echo $bills[$i]->submitted_by?></td>
                    <td>
                        <?php
                        if($bills[$i]->status=='Completed'){
                            echo 'Done';
                        }
                        else {
                            echo '<a target="_blank" href="'.base_url().'advance_bill/edit_bill/'.$bills[$i]->id.'">Edit</a>';
                        }
                        ?>
                    </td>
                    <td><a target="_blank" href="<?=base_url();?>advance_bill/view_bill/<?php echo $bills[$i]->id?>">View</a></td>
                </tr>
            <?php $k++;} ?>
            </tbody>
        </table>
    </div>

    <?php
    $this->load->view('common/footer');
    ?>
