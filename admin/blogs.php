<?php
ob_start();
include("includes/db.inc.php");
include("includes/header.php");
include("includes/navbar.php");

include("security.php");
?>



<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <?php
        include("includes/topbar.php")
        ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Data table example  -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"> Blogs
                        <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addproduct">
                            Add Product
                        </button> -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addproduct">
                            <a href="addblog.php" style="color:#fff"> Add Blog</a>
                        </button>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <!-- <span aria-hidden="true">&times;</span> -->
                        </button>
                    </h6>
                </div>
                <div class="card-body">
                    <?php
                    if (isset($_SESSION['success']) && $_SESSION['success'] != '') {
                        echo '<h2> ' . $_SESSION['success'] . '</h2>';
                        unset($_SESSION['success']);
                    }
                    if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
                        echo '<h2 class="text-secondary"> ' . $_SESSION['status'] . '</h2>';
                        unset($_SESSION['status']);
                    }
                    ?>
                    <div class="table-responsive">
                        <?php
                        $query = " SELECT
                        *
                        FROM
                        blogs
                        INNER JOIN
                        blog_detail USING (blog_id )";
                        $query_run = mysqli_query($conn, $query);

                        ?>
                        <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>ID</th>
                                    <th>User ID</th>
                                    <th>Blog Name</th>
                                    <th>Publication Date</th>
                                    <th>Blog Content</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $stt = 1;
                                if (mysqli_num_rows($query_run) > 0) {

                                    while ($row = mysqli_fetch_assoc($query_run)) {
                                ?>
                                        <tr>
                                            <td><?php echo $stt; ?></td>
                                            <td><?php echo $row['blog_id']; ?></td>
                                            <td><?php echo $row['user_id']; ?></td>
                                            <td><?php echo $row['blog_name']; ?></td>
                                            <td><?php echo $row['publication_date']; ?></td>
                                            <td><?php echo $row['blog_content']; ?></td>

                                            <td>
                                                <form action="updateblog.php" method="post">
                                                    <input type="hidden" name="edit_blog_id" value="<?php echo $row['blog_id']; ?>">
                                                    <button type="submit" name="edit_blog_btn" class="btn btn-success"> EDIT</button>

                                                </form>
                                            </td>
                                            <td>
                                                <form action="code.php" method="post" onSubmit="return confirm('Bạn muốn xóa bài vết này?')">
                                                    <input type="hidden" name="delete_blog_id" value="<?php echo $row['blog_id']; ?>">
                                                    <button type="submit" name="delete_blog_btn" class="btn btn-danger">
                                                        DELETE</button>
                                                </form>
                                            </td>

                                        </tr>

                                <?php
                                        $stt = $stt + 1;;
                                    }
                                } else {
                                    echo "No Record Found";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->


    <?php
    include("includes/script.php");
    // include("includes/footer.php");
    ob_end_flush();
    ?>