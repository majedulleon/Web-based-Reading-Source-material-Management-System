<?php
session_start();
if (!isset($_SESSION["librarian"]))
{
    ?>
    <script type="text/javascript">
        window.location="login.php";
    </script>
    <?php
}
include "header.php";
include "Connection.php";
?>
    <!-- page content area main -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3> Add Book Information </h3>
                </div>

                <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>
            <div class="row" style="min-height:500px">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2></h2>

                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">

                            <form name="form1" action="" method="post" class="col-lg-6" enctype="multipart/form-data">

                            <table class="table table-bordered">
                                <tr>
                                    <td>
                                        <input type="text" class="form-control" placeholder="Book Name" name="booksname" required="">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Select Image of Book
                                        <input type="file" name="f1" required="">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="text" class="form-control" placeholder="Author Name" name="bauthorname" required="">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="text" class="form-control" placeholder="Publication Name" name="pname" required="">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="text" class="form-control" placeholder="Date of Purchase" name="bpurchasedt" required="">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="text" class="form-control" placeholder="Price of Book" name="bprice" required="">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="text" class="form-control" placeholder="Books Quantity" name="bqty" required="">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="text" class="form-control" placeholder="Available Quantity" name="aqty" required="">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="submit" name="submit1" class="btn btn-default submit" value="Submit Data" style="background-color: blue;color:whitesmoke;" >
                                    </td>
                                </tr>

                            </table>
                            </form>




                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->

<?php
if (isset($_POST["submit1"]))
{
    $tm=md5(time());
    $fnm=$_FILES["f1"]["name"];
    $dst="./books_image/".$tm.$fnm;
    $dst1="books_image/".$tm.$fnm;

    move_uploaded_file($_FILES["f1"]["tmp_name"],$dst);

    mysqli_query($link,"insert into add_books values ('','$_POST[booksname]','$dst1','$_POST[bauthorname]','$_POST[pname]','$_POST[bpurchasedt]','$_POST[bprice]','$_POST[bqty]','$_POST[aqty]','$_SESSION[librarian]')");

?>
    <script type="text/javascript">
        alert("Book Inserted Succesfully");
    </script>
    <?php
}
?>

<?php
include "footer.php";
?>