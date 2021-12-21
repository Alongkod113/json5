<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ร้านRos Dee Kitchen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</head>
<style>
    .br {
        background-color: aquamarine
    }

    .br1 {
        background: rgba(97, 121, 255, 0.822) url("https://htmlcheatsheet.com/images/logo-css.png") no-repeat fixed 0 0;
    }
</style>

<body>

    <body class="br"></body>

    <div class="container">
        <p><img src="https://kasikornresearch.com/SiteCollectionDocuments/analysis/business/food/resturant_Banner2.jpg"
                alt="รูปภาพ" height="450" width="1285" vspace="20" hspace="10">
        <h3 class="br1">Ros Dee Kitchen</h3>

        <form class="row g-3">
            <div class="col-md-6">
                <label for="Shop" class="form-label">ShopName</label>
                <input type="text" class="form-control" id="Shop">
            </div>
            <div class="col-md-6">
                <label for="RowIndex" class="form-label"> </label>
                <input type="hidden" class="form-control" id="RowIndex">
            </div>
            <div class="col-md-6">
                <label for="Id" class="form-label">ID</label>
                <input type="text" class="form-control" id="Id" value="1">
            </div>
            <div class="col-6">
                <label for="Name" class="form-label">Name</label>
                <input type="text" class="form-control" id="Name" placeholder="">
            </div>
            <div class="col-6">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" placeholder=" ">
            </div>
            <div class="col-md-6">
                <label for="link" class="form-label">link</label>
                <input type="text" class="form-control" id="link">
            </div>
            <div class="col-4">
                <button type="button" class="btn btn-success" id='btnadd'>add</button>
            </div>
            <div class="col-4">
                <button type="button" class="btn btn-primary" id='btnupdate' style="display: none;">Update</button>
            </div>
            <div class="col-4">
                <button type="button" class="btn btn-danger" id='btnclear'>delete data</button>
            </div>
        </form>
    </div>
    <!--ฟอม-->
    <table id="tblAll" class="table table-striped" style="margin-top:23px">
        <thead>
            <tr>
                <th>Id</th>
                <th>ShopName</th>
                <th>FootName</th>
                <th>price</th>
                <th>link</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</body>

<script>
    $(function () {
        $('#btnadd').on('click', function () {
            var Shop, name, price, link, Id;
            Shop = $("#Shop").val();
            Id = $("#Id").val();
            Name = $("#Name").val();
            price = $("#price").val();
            link = $("#link").val();

            var edit = "<a class='edit' href='JavaScript:void(0);' >Edit</a>";
            var del = "<a class='delete' href='JavaScript:void(0);'>Delete</a>";

            if (Name == "" || price == "" || Shop == " " || link == " ") {
                alert("กรุณากรอกข้อมูล!");
            } else {
                var table = "<tr><td>" + Id + "</td><td>" + Shop + "</td><td>" + Name + "</td><td>" + price + "</td><td>" + link + "</td><td>" + edit + "</td><td>" + del + "</td></tr>";
                $("#tblAll").append(table);
            }
            Id = $("#Id").val("");
            Shop = $("#Shop").val();
            Name = $("#Name").val("");
            price = $("#price").val("");
            link = $("#link").val();
            Clear();
        });

        $('#btnupdate').on('click', function () {
            var Shop, name, price, link, Id;
            Shop = $("#Shop").val();
            Id = $("#Id").val();
            Name = $("#Name").val();
            price = $("#price").val();
            link = $("#link").val();

            $('#tblAll tbody tr').eq($('#RowIndex').val()).find('td').eq(0).html(Id);
            $('#tblAll tbody tr').eq($('#RowIndex').val()).find('td').eq(1).html(Shop);
            $('#tblAll tbody tr').eq($('#RowIndex').val()).find('td').eq(2).html(Name);
            $('#tblAll tbody tr').eq($('#RowIndex').val()).find('td').eq(3).html(price);
            $('#tblAll tbody tr').eq($('#RowIndex').val()).find('td').eq(3).html(link);

            $('#btnadd').show();
            $('#btnupdate').hide();
            Clear();
        });

        $("#tblAll").on("click", ".delete", function (e) {
            if (confirm("ยืนยันการลบ")) {
                $(this).closest('tr').remove();
            } else {
                e.preventDefault();
            }
        });

        $('#btnclear').on('click', function () {
            clear();
        });

        $("#tblAll").on("click", ".edit", function (e) {
            var row = $(this).closest('tr');
            $('#hfRowIndex').val($(row).index());
            var td = $(row).find("td");
            $('#Shop').val($(td).eq(1).html());
            $('#Id').val($(td).eq(0).html());
            $('#Name').val($(td).eq(2).html());
            $('#price').val($(td).eq(3).html());
            $('#link').val($(td).eq(4).html());
            $('#btnadd').hide();
            $('#btnupdate').show();
        });
    });
    function clear() {
        $("#Shop").val("");
        $("#Id").val("");
        $("#Name").val("");
        $("#price").val("");
        $("#link").val("");
        $("#RowIndex").val("");
    }
</script>

</html>
