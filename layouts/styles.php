<link href="/kdbd.com/vendor/bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet">
<link href="/kdbd.com/vendor/fontawesome/css/all.min.css" rel="stylesheet">
<!-- https://bootstrapstudio.io/ -->
<style>
    ul.header {
        display: inline;
        margin: 0;
        padding: 0;
    }

    .list-group-item.active {
        background-color: rgb(0, 255, 221);
        color: white;
    }

    /* chọn dòng nào dòng đó đổi màu */

    .clear-fix {
        clear: both;
    }

    body {
        font-size: 0.8rem;
    }

    body * {
        box-sizing: border-box;
        /* Đảm bảo đúng kích thước */
        margin: 0px;
        /* reset hết giá trị mặc định */
        padding: 0px;
        /* reset hết giá trị mặc định */
    }

    .hinh-sanpham {
        width: 120px;
        height: 120px;
        border: 2px solid red;
        /* dashed */
        padding: 3px;
        margin: 10px;
    }

    .hinh-daidien {
        width: 400px;
        height: 400px;
        border: 2px solid red;
        /* dashed */
        padding: 3px;
        /* khoảng cách phía trong */
        margin: 10px;
        /* khoảng cách xung quanh */
    }

    .center-css {
        text-align: center;
        vertical-align: middle;
    }

    .left-css {
        text-align: left;
        margin-left: 5px;
    }

    .right-css {
        text-align: right;
        margin-right: 5px;
    }

    #topbar {
        border-bottom: 1px solid green;
        padding: 19px;
    }

    #topbar-left,
    #topbar-right {
        float: left;
        width: 30%;
    }

    #topbar-middle {
        float: left;
        width: 40%;
    }

    #topbar-middle p {
        text-align: center;
    }

    .topbar-left-list,
    .topbar-right-list {
        margin: 0px;
        padding-left: 2px;

    }

    #topbar-right,
    .topbar-right-list {
        float: right;
    }


    .topbar-left-list li,
    .topbar-right-list li {
        list-style-type: none;
        /* bỏ dấu chấm tròn */
        padding-right: 2px;
    }

    .topbar-right-list li {
        float: right;
        border-left: 1px solid royalblue;
    }


    .topbar-left-list li {
        float: left;
        border-right: 1px solid royalblue;
    }


    .topbar-left-list li a,
    .topbar-right-list li a {
        list-style-type: none;
        /* bỏ dấu chấm tròn */
        float: left;
        text-decoration: none;
        /* bỏ dấu gạch chân */
        padding: 5px;
        color: royalblue;
    }

    .topbar-left-list li:last-child {
        /* background-color: red; test */
        border-right: unset;
        /* không kẻ đường gạch */
    }

    .topbar-right-list li:last-child {
        /* background-color: red; test */
        border-left: unset;
        /* không kẻ đường gạch */
    }

    a.active {
        /* a.active chọn phần tử a có class = active */
        /* a .active chọn phần tử "con của a" có class = active */
        color: white !important;
    }


    /* dghakisdnsad */

        .dropdown:hover .dropdown-menu {
            display: block;
        }

        .dropdown {
            margin-left: 40rem;
            margin-right: 40rem;
        }

        .name {
            text-align: center;
            color: green;
        }

</style>