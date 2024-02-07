<div class="card shadow bg-white mt-3">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped" id="tables">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nim</th>
                        <th>Nama</th>
                        <th>status</th>
                        <th>level</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = $con->query("SELECT * FROM mahasiswa");
                    while ($row = $sql->fetch()) {
                        echo "<tr>
                    <td> $row[id_mahasiswa]</td>
                    <td> $row[nim] </td>
                    <td> $row[nama] </td>
                    <td>$row[status] </td>
                    <td>$row[level] </td>
                
                </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>