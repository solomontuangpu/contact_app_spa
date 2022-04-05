<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>name</th>
            <th>phone</th>
            <th>control</th>
        </tr>
    </thead>
    <tbody>

    <?php 

        require_once "base.php";

        $sql = "SELECT * FROM contact ORDER BY id DESC";
        $query = mysqli_query(con(), $sql);
        while($rows = mysqli_fetch_assoc($query)) {
    ?>
        <tr class="contact" id="c-<?php echo $rows['id']; ?>" data-id="<?php echo $rows['id']; ?>">
            <td><?php echo $rows['id']; ?></td>
            <td><?php echo $rows['name']; ?></td>
            <td><?php echo $rows['phone']; ?></td>
            <td>
                <button class="btn btn-sm btn-success edit" id="edit" data-id="<?php echo $rows['id']; ?>">
                    <i class="fas fa-edit"></i>
                </button>
                <button class="btn btn-sm btn-danger del" data-id="<?php echo $rows['id'];?>" >
                    <i class="fas fa-trash"></i>
                </button>
            </td>
        </tr>
    
    <?php } ?>
    </tbody>
</table>

