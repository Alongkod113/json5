<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ร้านอาหาร</title>
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
    .br1{
        background:rgba(97, 121, 255, 0.822) url("https://htmlcheatsheet.com/images/logo-css.png") no-repeat fixed 0 0;
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
                
                <label for="ShopName" class="form-label"><u>ShopName</u></label>
                <input type="text" class="form-control" id="ShopName">
            </div>
            <div class="col-md-6">
                <label for="hfRowIndex" class="form-label"></label>
                <input type="hidden" class="form-control" id="hfRowIndex">
            </div>
            <div class="col-md-6">
                <label for="Idfood" class="form-label"><u> ID</u></label>
                <input type="text" class="form-control" id="Idfood" value="1">
            </div>
            <div class="col-6">
                <label for="Namefood" class="form-label"><u>Name</u> </label>
                <input type="text" class="form-control" id="Namefood" placeholder="">
            </div>
            <div class="col-6">
                <label for="pricefood" class="form-label"><u> Price</u></label>
                <input type="number" class="form-control" id="pricefood" placeholder=" ">
            </div>
            <div class="col-md-6">
                <label for="link" class="form-label"><u>link</u> </label>
                <input type="text" class="form-control" id="link">
            </div>
            <div class="col-4">
                <button type="button" class="btn btn-success" id='btnAdd'>add</button>
            </div>
            <div class="col-4">
                <button type="button" class="btn btn-primary" id='btnUpdate' style="display: none;">Update</button>
            </div>
            <div class="col-4">
                <button type="button" class="btn btn-danger" id='btnClear'>delete data</button>
            </div>
        </form>
    </div>
    <!--ฟอร์ม-->
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
        $('#btnAdd').on('click', function () {
            var ShopName, namefood, pricefood, link, Idfood;
            ShopName = $("#ShopName").val();
            Idfood = $("#Idfood").val();
            Namefood = $("#Namefood").val();
            pricefood = $("#pricefood").val();
            link = $("#link").val();

            var edit = "<a class='edit' href='JavaScript:void(0);' >Edit</a>";
            var del = "<a class='delete' href='JavaScript:void(0);'>Delete</a>";

            if (Namefood == "" || pricefood == "" || ShopName == " " || link == " ") {
                alert("กรุณากรอกข้อมูล!");
            } else {
                var table = "<tr><td>" + Idfood + "</td><td>" + ShopName + "</td><td>" + Namefood + "</td><td>" + pricefood + "</td><td>" + link + "</td><td>" + edit + "</td><td>" + del + "</td></tr>";
                $("#tblAll").append(table);
            }
            Idfood = $("#Idfood").val("");
            ShopName = $("#ShopName").val();
            Namefood = $("#Namefood").val("");
            pricefood = $("#pricefood").val("");
            link = $("#link").val();
            Clear();
        });

        $('#btnUpdate').on('click', function () {
            var ShopName, namefood, pricefood, link, Idfood;
            ShopName = $("#ShopName").val();
            Idfood = $("#Idfood").val();
            Namefood = $("#Namefood").val();
            pricefood = $("#pricefood").val();
            link = $("#link").val();

            $('#tblAll tbody tr').eq($('#hfRowIndex').val()).find('td').eq(0).html(Idfood);
            $('#tblAll tbody tr').eq($('#hfRowIndex').val()).find('td').eq(1).html(ShopName);
            $('#tblAll tbody tr').eq($('#hfRowIndex').val()).find('td').eq(2).html(Namefood);
            $('#tblAll tbody tr').eq($('#hfRowIndex').val()).find('td').eq(3).html(pricefood);
            $('#tblAll tbody tr').eq($('#hfRowIndex').val()).find('td').eq(3).html(link);

            $('#btnAdd').show();
            $('#btnUpdate').hide();
            Clear();
        });

        $("#tblAll").on("click", ".delete", function (e) {
            if (confirm("ยืนยันการลบ")) {
                $(this).closest('tr').remove();
            } else {
                e.preventDefault();
            }
        });

        $('#btnClear').on('click', function () {
            Clear();
        });

        $("#tblAll").on("click", ".edit", function (e) {
            var row = $(this).closest('tr');
            $('#hfRowIndex').val($(row).index());
            var td = $(row).find("td");
            $('#ShopName').val($(td).eq(1).html());
            $('#Idfood').val($(td).eq(0).html());
            $('#Namefood').val($(td).eq(2).html());
            $('#pricefood').val($(td).eq(3).html());
            $('#link').val($(td).eq(4).html());
            $('#btnAdd').hide();
            $('#btnUpdate').show();
        });
    });
    function Clear() {
        $("#ShopName").val("");
        $("#Idfood").val("");
        $("#Namefood").val("");
        $("#pricefood").val("");
        $("#link").val("");
        $("#hfRowIndex").val("");
    }
</script>

</html>
