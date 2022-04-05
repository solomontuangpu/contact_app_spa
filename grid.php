<div class="row row-cols-1 row-cols-md-3 g-4">

    <?php 

        require_once "base.php";

        $sql = "SELECT * FROM contact ORDER BY id DESC";
        $query = mysqli_query(con(), $sql);
        while($rows = mysqli_fetch_assoc($query)) {
    ?>
        <div class="col">
            <div class="card contact" id="c-<?php echo $rows['id']; ?>" data-id="<?php echo $rows['id']; ?>">
                <div class="card-body">
                    <div class="text-center">
                        <h4><?php echo $rows['name']; ?></h4>
                        <p>
                            <?php echo $rows['phone']; ?>
                        </p>

                        <button class="btn btn-sm btn-success edit" data-id="<?php echo $rows['id']; ?>">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="btn btn-sm btn-danger del" data-id="<?php echo $rows['id'];?>" >
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
           
    
    <?php } ?>
    </tbody>
</table>


</div>