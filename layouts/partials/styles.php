<link href="/salomon.com/vendor/bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet">
<link href="/salomon.com/vendor/fontawesome/js/all.min.js" type="text/css" rel="stylesheet">

<!-- https://bootstrapstudio.io/ -->

<style>
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
        padding: 0xp;
        /* reset hết giá trị mặc định */
    }

    #topbar {
        border-bottom: 1px solid green;
        padding: 19px;
        height: fit-content;
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


    /* Debug khung */
    /* #topbar div {
        border: 1px solid red;
    } */
</style>