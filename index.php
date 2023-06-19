<?php include $_SERVER["DOCUMENT_ROOT"] . "/head.php"; ?>

    <div class="container">
        <h1 class="text-center">Список користувачів</h1>
        <table class="table">
            <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>email</th>
                <th>phone</th>
                <th>image</th>
            </tr>
            </thead>
            <tbody>
            <?php
            include $_SERVER["DOCUMENT_ROOT"] . "/connection_database.php";
            if(isset($dbh)) {
                $stm = $dbh->query("SELECT id, name, email, phone, image FROM users");
                foreach($stm as $row) {
                    echo"
                    <tr>
                        <td>$row[0]</td>
                        <td>$row[1]</td>
                        <td>$row[2]</td>
                        <td>$row[3]</td>
                        <td>$row[4]</td>
                        <td>
                            <a href='/delete.php?id=$row[0]' class='text-danger' data-delete>
                                <i class='bi bi-x'></i>
                            </a>
                        </td>
                    </tr>
                    ";
                }
            }
            ?>
            </tbody>
        </table>
    </div>

<?php include $_SERVER["DOCUMENT_ROOT"] . "/modals/deleteModal.php"; ?>

<script src="/js/bootstrap.bundle.min.js"></script>

    <script>
        window.addEventListener("load", function() {
            const btns = document.querySelectorAll("[data-delete]");
            const deleteModal = new bootstrap.Modal(document.getElementById("deleteModal"));
            for (i=0; i<btns.length; i++) {
                btns[i].onclick=function(e) {
                    e.preventDefault();
                    console.log("Ви нажали хрест");
                    deleteModal.show();
                }
            }
        });
    </script>

<?php include $_SERVER["DOCUMENT_ROOT"] . "/footer.php"; ?>