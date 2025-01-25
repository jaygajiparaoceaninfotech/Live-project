<?php
include "root/config.php";
$page_nm = "Quotation";
$pageUrl = "quotation.php";
$imageUrl = "image/quotation/";
//error_reporting(E_ALL);

if ($_GET["mode"] != "") {
    $id = (int) $_REQUEST["id"];

    if (isset($_POST["btn_submit"])) {
        $company_name = $_POST["company_name"];
        $customer_name = $_POST["customer_name"];
        $term_condition = $_POST["term_condition"];
        $person_name = $_POST["person_name"];
        $phone = $_POST["phone"];
        $state = $_POST["state"];
        $address = $_POST["address"];
        $gst_no = $_POST["gst_no"];
        $price_list = $_POST["price_list"];
        $ship_address = $_POST["ship_address"];
        $bill_address = $_POST["bill_address"];
        $quotation_date = $_POST["quotation_date"];
        $po_no = $_POST["po_no"];
        $po_date = $_POST["po_date"];
        $transport_by = $_POST["transport_by"];
        $transport_details = $_POST["transport_details"];
        $exp_dispatch_date = $_POST["exp_dispatch_date"];
        $team_person_name = $_POST["team_person_name"];
        $booking_place = $_POST["booking_place"];
        $booking_pincode = $_POST["booking_pincode"];
        $select_item = $_POST["select_item"];
        $term_condition_edit = $_POST["term_condition_edit"];
        $regards = $_POST["regards"];
        $note = $_POST["note"];

        // Add record
        if ($_POST["id"] == "" && $_POST["mode"] == "add") {
            $query1 =
                "INSERT INTO tbl_quotaion  SET 
                company_name = '$company_name',
                customer_name = '$customer_name',
                term_condition = '$term_condition',
                person_name = '$person_name',
                phone = '$phone',
                state = '$state',
                address = '$address',
                gst_no = '$gst_no',
                price_list = '$price_list',
                ship_address = '$ship_address',
                bill_address = '$bill_address',
                quotation_date = '$quotation_date',
                po_no = '$po_no',
                po_date = '$po_date',
                transport_by = '$transport_by',
                transport_details = '$transport_details',
                exp_dispatch_date = '$exp_dispatch_date',
                team_person_name='" .
                $team_person_name .
                "',
                booking_place = '$booking_place',
                booking_pincode = '$booking_pincode',
                select_item = '$select_item',
                term_condition_edit = '$term_condition_edit',
                regards = '$regards',
                note = '$note'";

            $ai_db->aiQuery($query1);
            $ai_core->aiGoPage($pageUrl . "?msg=1");
        }

        // Edit record
        if ($_POST["id"] != "" && $_POST["mode"] == "edit") {
            $upadte =
                "UPDATE tbl_quotaion SET 
                company_name = '$company_name',
                customer_name = '$customer_name',
                term_condition = '$term_condition',
                person_name = '$person_name',
                phone = '$phone',
                state = '$state',
                address = '$address',
                gst_no = '$gst_no',
                price_list = '$price_list',
                ship_address = '$ship_address',
                bill_address = '$bill_address',
                quotation_date = '$quotation_date',
                po_no = '$po_no',
                po_date = '$po_date',
                transport_by = '$transport_by',
                transport_details = '$transport_details',
                exp_dispatch_date = '$exp_dispatch_date',
                team_person_name='" .
                $team_person_name .
                "',
                booking_place = '$booking_place',
                booking_pincode = '$booking_pincode',
                select_item = '$select_item',
                term_condition_edit = '$term_condition_edit',
                regards = '$regards',
                note = '$note' WHERE id=" .
                $id;
            $ai_db->aiQuery($upadte);
            $ai_core->aiGoPage($pageUrl . "?msg=2");
        }
    }

    // if ($_GET['id'] != '' && $_GET['mode'] == 'Active') {
    //     $editqry2 = "UPDATE tbl_raw_data SET
    //             status='Active'
    //             WHERE id=" . $id;

    //     $ai_db->aiQuery($editqry2);
    //     $ai_core->aiGoPage($pageUrl . "?msg=2");
    // }
    // // recored status deactive to active update code
    // if ($_GET['id'] != '' && $_GET['mode'] == 'Deactive') {
    //     $editqry2 = "UPDATE tbl_raw_data SET
    //             status='Deactive'
    //             WHERE id=" . $id;

    //     $ai_db->aiQuery($editqry2);
    //     $ai_core->aiGoPage($pageUrl . "?msg=2");
    // }
    //delete record
    if ($_GET["mode"] == "delete" && $id != "") {
        // $image_name = $ai_core->aiGetValue("tbl_raw_data", 'image_path', 'id', $id);
        // $ai_core->aiDelete($imageUrl . $image_name);

        //record
        $qry_del_su = "DELETE from tbl_quotaion WHERE id=" . $id;
        $ai_db->aiQuery($qry_del_su);

        $ai_core->aiGoPage($delurl . "?msg=3");
    }
    //get data for edit
    if ($id != "") {
        $qry = "SELECT * FROM tbl_quotaion WHERE id=" . $id;
        $row = $ai_db->aiGetQueryObj($qry);
    }
} else {
    //select all record
    $qry = "SELECT * FROM tbl_quotaion ";
    $result = $ai_db->aiGetQueryObj($qry);
}
?>

<!doctype html>
<html lang="en" data-layout="vertical" data-sidebar="dark" data-sidebar-image="img-1" data-sidebar-size="lg"
    data-preloader="disable" data-theme="default" data-topbar="light" data-bs-theme="light" data-theme-color="0">

<head>
    <meta charset="utf-8">
    <title>Ocean | <?php echo $page_nm; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content=" " name="description">
    <meta content="" name="author">
    <!-- App favicon -->
    <link rel="shortcut icon" href="image/ring.png">

    <!-- Fonts css load -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link id="fontsLink"
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&amp;display=swap"
        rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

    <style>
        .btn-group-sm>.btn,
        .btn-sm {
            --tb-btn-padding-y: 0.15rem !important;
        }
    </style>
    <!-- Layout config Js -->
    <?php include "include/css.php"; ?>
</head>

<body>
    <div id="layout-wrapper">
        <!-- ========== App Menu ========== -->
        <div class="app-menu navbar-menu">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <?php include "include/logo.php"; ?>

                <button type="button" class="btn btn-sm p-0 fs-3xl header-item float-end btn-vertical-sm-hover"
                    id="vertical-hover">
                    <i class="ri-record-circle-line"></i>
                </button>
                <div class="vertical-menu-btn-wrapper header-item vertical-icon">
                    <button type="button"
                        class="btn btn-sm px-0 fs-xl vertical-menu-btn topnav-hamburger shadow hamburger-icon"
                        id="topnav-hamburger-icon">
                        <i class="bx bx-chevrons-right"></i>
                        <i class="bx bx-chevrons-left"></i>
                    </button>
                </div>
            </div>

            <?php include "include/sidebar.php"; ?>
            <!-- Sidebar -->
        </div>
    </div>
    <!-- Left Sidebar End -->
    <!-- Vertical Overlay-->
    <div class="vertical-overlay"></div>
    <div class="topbar-wrapper shadow">
        <div class="topbar-wrapper shadow">
            <header id="page-topbar">
                <div class="layout-width">
                    <div class="navbar-header">
                        <div class="d-flex">
                            <!-- LOGO -->
                            <div class="navbar-brand-box horizontal-logo">
                                <?php include "include/logo.php"; ?>
                            </div>
                            <div class="header-item flex-shrink-0 me-3 vertical-btn-wrapper">
                                <button type="button"
                                    class="btn btn-sm px-0 fs-xl vertical-menu-btn topnav-hamburger border hamburger-icon"
                                    id="topnav-hamburger-icon">
                                    <i class='bx bx-chevrons-right arrow-right'></i>
                                    <i class='bx bx-chevrons-left arrow-left'></i>
                                </button>
                            </div>

                            <h4 class="mb-sm-0 header-item page-title lh-base"><?php echo $page_nm; ?></h4>
                        </div>
                        <?php include "include/header.php"; ?>
                    </div>
                </div>
            </header>
        </div>
    </div>
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Sales</li>
                                    <li class="breadcrumb-item active"><?php echo $page_nm; ?></li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <?php if ($_REQUEST["mode"] != "") { ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <form id="validationForm" class="row g-3 needs-validation" novalidate method="POST"
                                enctype="multipart/form-data">
                                <input type="hidden" name="mode" id="mode" value="<?php echo $_REQUEST["mode"]; ?>" />
                                <input type="hidden" name="id" id="id" value="<?php echo $_REQUEST["id"]; ?>" />



                                <!-- Customer Details -->
                                <div class="mb-0 bg-custom d-flex align-items-center justify-content-start"
                                    style="height: 30px;">
                                    <i class="fas fa-user me-2"></i> <b class="d-flex align-items-center">CUSTOMER
                                        DETAILS</b>
                                </div>
                                <div class="card quotation-card" style="margin-top: 0; padding-top: 0;">

                                    <div class="form-steps">
                                        <div class="card-body">
                                            <div class="row g-3 needs-validation">
                                                <div class="col-md-4">
                                                    <label for="owner_name" class="form-label">Select
                                                        Company</label> <span class="text-danger">*</span>
                                                    <select class="form-control" name="company_name" id="company_name" <?php if (
                                                        $_REQUEST["mode"] ==
                                                        "view"
                                                    ) {
                                                        echo "disabled";
                                                    } ?>>
                                                        <option value="">Select Company</option>
                                                        <option value="Test Company 1" <?php if (
                                                            $row[0]
                                                                ->company_name ==
                                                            "Test Company 1"
                                                        ) {
                                                            echo "selected";
                                                        } ?>>Test
                                                            Company 1
                                                        </option>
                                                        <option value="Test Company 1" <?php if (
                                                            $row[0]
                                                                ->company_name ==
                                                            "Test Company 1"
                                                        ) {
                                                            echo "selected";
                                                        } ?>>Test
                                                            Company 2
                                                        </option>
                                                        <option value="Test Company 1" <?php if (
                                                            $row[0]
                                                                ->company_name ==
                                                            "Test Company 1"
                                                        ) {
                                                            echo "selected";
                                                        } ?>>Test
                                                            Company 3
                                                        </option>
                                                    </select>
                                                </div>
                                                <!-- <div class="col-md-4">
                                                    <label for="customer_name" class="form-label">Select
                                                        Customer</label> <span class="text-danger">*</span>
                                                    <select class="form-control" name="customer_name" id="customer_name"
                                                        <?php if (
                                                            $_REQUEST["mode"] ==
                                                            "view"
                                                        ) {
                                                            echo "disabled";
                                                        } ?>>
                                                        <option value="">Select Customer</option>
                                                        <option value="Test Customer 1" <?php if (
                                                            $row[0]
                                                                ->customer_name ==
                                                            "Test Customer 1"
                                                        ) {
                                                            echo "selected";
                                                        } ?>>
                                                            Test Customer
                                                            1
                                                        </option>
                                                        <option value="Test Customer 2" <?php if (
                                                            $row[0]
                                                                ->customer_name ==
                                                            "Test Customer 2"
                                                        ) {
                                                            echo "selected";
                                                        } ?>>
                                                            Test Customer
                                                            2
                                                        </option>
                                                        <option value="Test Customer 3" <?php if (
                                                            $row[0]
                                                                ->customer_name ==
                                                            "Test Customer 3"
                                                        ) {
                                                            echo "selected";
                                                        } ?>>
                                                            Test Company 3
                                                        </option>

                                                    </select>
                                                </div> -->

                                                <div class="col-md-4 d-flex align-items-end">
                                                    <div class="flex-grow-1 me-2">
                                                        <label for="search_customer" class="form-label">Search
                                                            Customer</label>
                                                        <span class="text-danger">*</span>
                                                        <input type="text" class="form-control" id="search_customer"
                                                            name="search_customer" placeholder="Search Customer"
                                                            value="<?php echo isset($row[0]->person_name) ? $row[0]->person_name : ''; ?>"
                                                            <?php if ($_REQUEST['mode'] == "view") { ?> disabled <?php } ?>
                                                            required>
                                                        <div class="invalid-feedback">Please enter customer name.</div>
                                                    </div>
                                                    <!-- Add Prospect_Customer button  -->
                                                    <a href="#" class="btn btn-success align-self-center mt-4"
                                                        title="Add Prospect_Customer">
                                                        +
                                                    </a>
                                                </div>


                                                <div class="col-md-4 d-flex align-items-end">
                                                    <div class="flex-grow-1 me-2">
                                                        <label for="term_condition" class="form-label">Select T&C</label>
                                                        <select class="form-control" name="term_condition"
                                                            id="term_condition" <?php if ($_REQUEST["mode"] == "view") {
                                                                echo "disabled";
                                                            } ?>>
                                                            <option value="">Select Terms & Condition</option>
                                                            <option value="Test T & C 1" <?php if ($row[0]->term_condition == "Test T & C 1") {
                                                                echo "selected";
                                                            } ?>>
                                                                Test T & C 1
                                                            </option>
                                                            <option value="Test T & C 2" <?php if ($row[0]->term_condition == "Test T & C 2") {
                                                                echo "selected";
                                                            } ?>>
                                                                Test T & C 2
                                                            </option>
                                                            <option value="Test T & C 3" <?php if ($row[0]->term_condition == "Test T & C 3") {
                                                                echo "selected";
                                                            } ?>>
                                                                Test T & C 3
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <a href="#" class="btn btn-success align-self-center mt-4"
                                                        title="Add Terms & Conditions">
                                                        +
                                                    </a>
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="company_name" class="form-label">Company
                                                        Name(Person Name)</label>
                                                    <input type="text" class="form-control" id="person_name"
                                                        name="person_name" placeholder="Enter company name" value="<?php echo isset(
                                                            $row[0]
                                                                ->person_name
                                                        )
                                                            ? $row[0]
                                                                ->person_name
                                                            : ""; ?>" <?php if (
                                                              $_REQUEST["mode"] ==
                                                              "view"
                                                          ) { ?>
                                                            disabled <?php } ?> required>
                                                    <div class="invalid-feedback">Please enter a company
                                                        name.</div>
                                                </div>


                                                <div class="col-md-4">
                                                    <label for="email" class="form-label">Phone</label>
                                                    <input type="number" class="form-control" id="phone" name="phone"
                                                        placeholder="Enter Phone Number" value="<?php echo isset(
                                                            $row[0]
                                                                ->phone
                                                        )
                                                            ? $row[0]
                                                                ->phone
                                                            : ""; ?>" <?php if (
                                                              $_REQUEST["mode"] ==
                                                              "view"
                                                          ) { ?>
                                                            disabled <?php } ?> required>
                                                    <div class="invalid-feedback">Please enter a valid email
                                                        address.</div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="validationCustomState" class="form-label">State</label>
                                                    <select class="form-control" id="state" name="state"
                                                        data-parsley-required="true" <?php if (
                                                            $_REQUEST["mode"] ==
                                                            "view"
                                                        ) { ?> disabled <?php } ?> required>
                                                        <option value="">Select State</option>
                                                        <option value="Gujarat" <?php if (
                                                            $row[0]
                                                                ->state ==
                                                            "Gujarat"
                                                        ) {
                                                            echo "selected";
                                                        } ?>>Gujarat

                                                        </option>
                                                        <option value="MP" <?php if (
                                                            $row[0]
                                                                ->state ==
                                                            "MP"
                                                        ) {
                                                            echo "selected";
                                                        } ?>>MP

                                                        </option>
                                                        <option value="UP" <?php if (
                                                            $row[0]
                                                                ->state ==
                                                            "UP"
                                                        ) {
                                                            echo "selected";
                                                        } ?>>UP
                                                        </option>
                                                    </select>
                                                    <div class="invalid-feedback">Please select a
                                                        valid
                                                        state.
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="address" class="form-label">Address</label>
                                                    <textarea class="form-control" id="address" name="address"
                                                        placeholder="Enter address" required <?php if (
                                                            $_REQUEST["mode"] ==
                                                            "view"
                                                        ) { ?> disabled <?php } ?>><?php echo isset(
                                                                $row[0]->address
                                                            )
                                                                ? $row[0]->address
                                                                : ""; ?></textarea>
                                                    <div class="invalid-feedback">Please enter an address.
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="gst_no" class="form-label">GST In</label>
                                                    <input type="text" class="form-control" id="gst_no" name="gst_no"
                                                        placeholder="Enter GST NO" pattern="[0-9]{10}" value="<?php echo isset(
                                                            $row[0]
                                                                ->gst_no
                                                        )
                                                            ? $row[0]
                                                                ->gst_no
                                                            : ""; ?>" <?php if (
                                                              $_REQUEST["mode"] ==
                                                              "view"
                                                          ) { ?>
                                                            disabled <?php } ?> required>
                                                    <div class="invalid-feedback">Please enter a valid
                                                        10-digit mobile number.</div>
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="price_list" class="form-label">Price
                                                        List</label>
                                                    <input type="text" class="form-control" id="price_list"
                                                        name="price_list" placeholder="Enter price List" value="<?php echo isset(
                                                            $row[0]
                                                                ->price_list
                                                        )
                                                            ? $row[0]
                                                                ->price_list
                                                            : ""; ?>" <?php if (
                                                              $_REQUEST["mode"] ==
                                                              "view"
                                                          ) { ?>
                                                            disabled <?php } ?> required>
                                                    <div class="invalid-feedback">Please enter a password.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Address Details -->

                                <div class="mb-0 bg-custom d-flex align-items-center justify-content-start"
                                    style="height: 30px;">
                                    <i class="fas fa-user me-2"></i> <b class="d-flex align-items-center">ADDRESS
                                        DETAILS</b>
                                </div>


                                <div class="card quotation-card" style="margin-top: 0; padding-top: 0;">
                                    <div class="form-steps">
                                        <div class="card-body">
                                            <div class="row g-3 needs-validation">
                                                <div class="col-md-6">
                                                    <label for="address" class="form-label">Shipping
                                                        Address</label>

                                                    <a href="#" class="btn btn-sm btn-success align-self-center"
                                                        title="Add Terms & Conditions">
                                                        <i class="bi bi-pencil-square"></i> Change Shipping
                                                    </a>
                                                    <textarea class="form-control" id="ship_address" name="ship_address"
                                                        placeholder="Enter address" required <?php if (
                                                            $_REQUEST["mode"] ==
                                                            "view"
                                                        ) { ?> disabled <?php } ?>><?php echo isset(
                                                                $row[0]->ship_address
                                                            )
                                                                ? $row[0]->ship_address
                                                                : ""; ?></textarea>
                                                    <div class="invalid-feedback">Please enter an
                                                        address.</div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="address" class="form-label">Billing
                                                        Address</label>
                                                    <textarea class="form-control" id="bill_address" name="bill_address"
                                                        placeholder="Enter address" required <?php if (
                                                            $_REQUEST["mode"] ==
                                                            "view"
                                                        ) { ?> disabled <?php } ?>><?php echo isset(
                                                                $row[0]->bill_address
                                                            )
                                                                ? $row[0]->bill_address
                                                                : ""; ?></textarea>
                                                    <div class="invalid-feedback">Please enter an
                                                        address.</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Quotation Details -->
                                <div class="mb-0 bg-custom d-flex align-items-center justify-content-start"
                                    style="height: 30px;">
                                    <i class="fas fa-user me-2"></i> <b class="d-flex align-items-center">QUOTATION
                                        DETAILS</b>
                                </div>

                                <div class="card quotation-card" style="margin-top: 0; padding-top: 0;">
                                    <div class="form-steps">
                                        <div class="card-body">
                                            <div id="validationForm" class="row g-3 needs-validation" novalidate
                                                method="POST" enctype="multipart/form-data">
                                                <input type="hidden" name="mode" id="mode"
                                                    value="<?php echo $_REQUEST["mode"]; ?>" />
                                                <input type="hidden" name="id" id="id"
                                                    value="<?php echo $_REQUEST["id"]; ?>" />
                                                <div class="col-md-6">
                                                    <label for="quotation_date" class="form-label">Quotation
                                                        Date</label> <span class="text-danger">*</span>
                                                    <input type="date" class="form-control" id="quotation_date"
                                                        name="quotation_date" placeholder="Enter company name" value="<?php echo isset(
                                                            $row[0]
                                                                ->quotation_date
                                                        )
                                                            ? $row[0]
                                                                ->quotation_date
                                                            : ""; ?>" <?php if (
                                                              $_REQUEST["mode"] ==
                                                              "view"
                                                          ) { ?>
                                                            disabled <?php } ?> required>
                                                    <div class="invalid-feedback">Please enter a company
                                                        name.</div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="po_no" class="form-label">PO No.</label>
                                                    <input type="text" class="form-control" id="po_no" name="po_no"
                                                        placeholder="Enter PO Number" value="<?php echo isset(
                                                            $row[0]
                                                                ->po_no
                                                        )
                                                            ? $row[0]
                                                                ->po_no
                                                            : ""; ?>" <?php if (
                                                              $_REQUEST["mode"] ==
                                                              "view"
                                                          ) { ?>
                                                            disabled <?php } ?> required>
                                                    <div class="invalid-feedback">Please enter a valid email
                                                        address.</div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="po_date" class="form-label">PO Date</label> <span
                                                        class="text-danger">*</span>
                                                    <input type="date" class="form-control" id="po_date" name="po_date"
                                                        value="<?php echo isset(
                                                            $row[0]
                                                                ->po_date
                                                        )
                                                            ? $row[0]
                                                                ->po_date
                                                            : ""; ?>" <?php if (
                                                              $_REQUEST["mode"] ==
                                                              "view"
                                                          ) { ?>
                                                            disabled <?php } ?> required>
                                                    <div class="invalid-feedback">Please enter a company
                                                        name.</div>
                                                </div>
                                                <div class="col-md-6 d-flex align-items-end">
                                                    <div class="flex-grow-1 me-2">
                                                        <label for="transport_by" class="form-label">Transport By</label>
                                                        <select class="form-control" name="transport_by" id="transport_by"
                                                            <?php if ($_REQUEST["mode"] == "view") {
                                                                echo "disabled";
                                                            } ?>>
                                                            <option value="">Transport By</option>
                                                            <option value="Road" <?php if ($row[0]->transport_by == "Road") {
                                                                echo "selected";
                                                            } ?>>Road</option>
                                                            <option value="Air" <?php if ($row[0]->transport_by == "Air") {
                                                                echo "selected";
                                                            } ?>>Air</option>
                                                            <option value="Rail" <?php if ($row[0]->transport_by == "Rail") {
                                                                echo "selected";
                                                            } ?>>Rail</option>
                                                        </select>
                                                    </div>
                                                    <a href="#" class="btn btn-success align-self-center mt-4"
                                                        title="Add Transport Method">+</a>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="booking_place" class="form-label">Transport
                                                        Details</label>
                                                    <input type="text" class="form-control" id="transport_details"
                                                        name="transport_details" placeholder="Enter Transport Details"
                                                        value="<?php echo isset(
                                                            $row[0]
                                                                ->transport_details
                                                        )
                                                            ? $row[0]
                                                                ->transport_details
                                                            : ""; ?>" <?php if (
                                                              $_REQUEST["mode"] ==
                                                              "view"
                                                          ) { ?>
                                                            disabled <?php } ?> required>
                                                    <div class="invalid-feedback">Please enter a valid email
                                                        address.</div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="expected_dispatch_date" class="form-label">Expected Dispatch
                                                        Date</label>
                                                    <input type="date" class="form-control" id="exp_dispatch_date"
                                                        name="exp_dispatch_date" value="<?php echo isset(
                                                            $row[0]
                                                                ->exp_dispatch_date
                                                        )
                                                            ? $row[0]
                                                                ->exp_dispatch_date
                                                            : ""; ?>" <?php if (
                                                              $_REQUEST["mode"] ==
                                                              "view"
                                                          ) { ?>
                                                            disabled <?php } ?> required>
                                                    <div class="invalid-feedback">Please enter a company
                                                        name.</div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="team_person_name" class="form-label">Team
                                                        Person Name</label>
                                                    <select class="form-control" name="team_person_name"
                                                        id="team_person_name" <?php if (
                                                            $_REQUEST["mode"] ==
                                                            "view"
                                                        ) {
                                                            echo "disabled";
                                                        } ?>>
                                                        <option value="">Team Person Name</option>
                                                        <option value="Person 1" <?php if (
                                                            $row[0]
                                                                ->team_person_name ==
                                                            "Person 1"
                                                        ) {
                                                            echo "selected";
                                                        } ?>>Person
                                                            1

                                                        </option>
                                                        <option value="Person 2" <?php if (
                                                            $row[0]
                                                                ->team_person_name ==
                                                            "Person 2"
                                                        ) {
                                                            echo "selected";
                                                        } ?>>Person
                                                            2

                                                        </option>
                                                        <option value="Person 3" <?php if (
                                                            $row[0]
                                                                ->team_person_name ==
                                                            "Person 3"
                                                        ) {
                                                            echo "selected";
                                                        } ?>>Person
                                                            3
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="booking_place" class="form-label">Booking
                                                        Place</label>
                                                    <input type="text" class="form-control" id="booking_place"
                                                        name="booking_place" placeholder="Enter Booking Place" value="<?php echo isset(
                                                            $row[0]
                                                                ->booking_place
                                                        )
                                                            ? $row[0]
                                                                ->booking_place
                                                            : ""; ?>" <?php if (
                                                              $_REQUEST["mode"] ==
                                                              "view"
                                                          ) { ?>
                                                            disabled <?php } ?> required>
                                                    <div class="invalid-feedback">Please enter a valid email
                                                        address.</div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="booking_pincode" class="form-label">Booking
                                                        Pincode</label>
                                                    <input type="text" class="form-control" id="booking_pincode"
                                                        name="booking_pincode" placeholder="Enter PO Number" value="<?php echo isset(
                                                            $row[0]
                                                                ->booking_pincode
                                                        )
                                                            ? $row[0]
                                                                ->booking_pincode
                                                            : ""; ?>" <?php if (
                                                              $_REQUEST["mode"] ==
                                                              "view"
                                                          ) { ?>
                                                            disabled <?php } ?> required>
                                                    <div class="invalid-feedback">Please enter a valid email
                                                        address.</div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Quotation Item -->
                                <div class="mb-0 bg-custom d-flex align-items-center justify-content-start"
                                    style="height: 30px;">
                                    <i class="fas fa-user me-2"></i> <b class="d-flex align-items-center">QUOTATION ITEM</b>
                                </div>

                                <div class="card quotation-card" style="margin-top: 0; padding-top: 0;">
                                    <div class="form-steps">
                                        <div class="col-md-4 mt-2">
                                            <label for="select_Item" class="form-label">Select
                                                Item</label> <span class="text-danger">*</span>
                                            <select class="form-control" name="select_item" id="select_item" <?php if (
                                                $_REQUEST["mode"] == "view"
                                            ) {
                                                echo "disabled";
                                            } ?>>
                                                <option value="">Select Item</option>
                                                <option value="Item 1" <?php if (
                                                    $row[0]->select_item == "Item 1"
                                                ) {
                                                    echo "selected";
                                                } ?>>Item 1

                                                </option>
                                                <option value="Item 2" <?php if (
                                                    $row[0]->select_item == "Item 2"
                                                ) {
                                                    echo "selected";
                                                } ?>>Item 2

                                                </option>
                                                <option value="Item 3" <?php if (
                                                    $row[0]->select_item == "Item 3"
                                                ) {
                                                    echo "selected";
                                                } ?>>Item 3
                                                </option>
                                            </select>
                                        </div>
                                        <div class="table-responsive mt-4">
                                            <table class="table table-bordered table-sm table-nowrap align-middle mb-0">
                                                <thead class="table-light text-center">
                                                    <tr>
                                                        <th scope="col">Delete</th>
                                                        <th scope="col">Display Order</th>
                                                        <th scope="col">Top Category Sub Category</th>
                                                        <th scope="col">Product Name</th>
                                                        <th scope="col">Product Description</th>
                                                        <th scope="col">HSN Code</th>
                                                        <th scope="col">Qty NOS</th>
                                                        <th scope="col">Price (in INR)</th>
                                                        <th scope="col">Dis (Flat)</th>
                                                        <th scope="col">Dis (%)</th>
                                                        <th scope="col">Rate (in INR)</th>
                                                        <th scope="col">Amount</th>
                                                        <th scope="col">Taxable Amount</th>
                                                        <th scope="col">GST Amount</th>
                                                        <th scope="col">Sub Total</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <table class="table mt-3">
                                                <tbody>
                                                    <tr>
                                                        <td>Cash Discount (%)</td>
                                                        <td><input type="text" class="form-control form-control-sm"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Additional Discount (%)</td>
                                                        <td><input type="text" class="form-control form-control-sm"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Packing & Forwarding Charge</td>
                                                        <td><input type="text" class="form-control form-control-sm"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Transport</td>
                                                        <td><input type="text" class="form-control form-control-sm"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Total Taxable</td>
                                                        <td><input type="text" class="form-control form-control-sm"
                                                                value="0.0000" readonly>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>GST On Off Switch</td>
                                                        <td><input type="checkbox"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>GST Amount</td>
                                                        <td><input type="text" class="form-control form-control-sm"
                                                                value="0.0000" readonly>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>TCS On Off Switch</td>
                                                        <td><input type="checkbox"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Round Off</td>
                                                        <td><input type="text" class="form-control form-control-sm"
                                                                value="0.0000" readonly>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Grand Total</td>
                                                        <td><input type="text" class="form-control form-control-sm"
                                                                value="0.0000" readonly>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <!--end table-->
                                        </div>
                                    </div>
                                </div>

                                <!-- Remark  -->
                                <div class="mb-0 bg-custom d-flex align-items-center justify-content-start"
                                    style="height: 30px;">
                                    <i class="fas fa-user me-2"></i> <b class="d-flex align-items-center">REMARK</b>
                                </div>

                                <div class="card" style="margin-top: 0; padding-top: 0;">
                                    <div class="form-steps">
                                        <div class="container">
                                            <div class="row mt-2">
                                                <!-- First Terms & Condition Section -->
                                                <div class="col-lg-6">
                                                    <div class="card mb-4">
                                                        <p>Term and Condition</p>
                                                        <textarea name="term_condition_edit" id="term_condition_edit"
                                                            class="ckeditor-classic" <?php if (
                                                                $_REQUEST["mode"] == "view"
                                                            ) { ?>disabled <?php } ?>><?php echo isset(
                                                                   $row[0]->term_condition_edit
                                                               )
                                                                   ? $row[0]->term_condition_edit
                                                                   : ""; ?></textarea>
                                                        <!-- <div id="term_condition_edit" name="term_condition_edit" class="ckeditor-classic">
                                        </div> -->
                                                    </div>
                                                </div>
                                                <!-- Second Terms & Condition Section -->
                                                <div class="col-lg-6">
                                                    <div class="card mb-4">
                                                        <p>Regards <span class="text-danger">*</span></p>
                                                        <textarea name="regards" id="regards" class="ckeditor-classic" <?php if (
                                                            $_REQUEST["mode"] == "view"
                                                        ) { ?>disabled <?php } ?>><?php echo isset(
                                                               $row[0]->regards
                                                           )
                                                               ? $row[0]->regards
                                                               : ""; ?></textarea>
                                                        <!-- <div id="term_condition_edit" name="term_condition_edit" class="ckeditor-classic">
                                        </div> -->
                                                    </div>
                                                </div>
                                                <!-- Third Terms & Condition Section -->
                                                <div class="col-lg-6">
                                                    <div class="card mb-4">
                                                        <p>Note</p>
                                                        <textarea name="note" id="note" class="ckeditor-classic" <?php if (
                                                            $_REQUEST["mode"] == "view"
                                                        ) { ?>disabled <?php } ?>><?php echo isset(
                                                               $row[0]->note
                                                           )
                                                               ? $row[0]->note
                                                               : ""; ?></textarea>
                                                        <!-- <div id="term_condition_edit" name="term_condition_edit" class="ckeditor-classic">
                                        </div> -->
                                                    </div>
                                                </div>
                                                <!-- Action Buttons Section -->
                                                <div class="d-flex align-items-start gap-3 mt-4">
                                                    <button type="submit" class="btn btn-success right"
                                                        name="btn_submit">Submit</button>
                                                    <a href="quotation" class="btn btn-white border">Back</a>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>


                        </div>
                    </div>

                    <!-- navbar code  -->
                    <!-- <div class="card-body form-steps">
                        <form id="validationForm" class="row g-3 needs-validation" novalidate method="POST"
                            enctype="multipart/form-data">
                            <input type="hidden" name="mode" id="mode" value="<?php echo $_REQUEST['mode']; ?>" />
                            <input type="hidden" name="id" id="id" value="<?php echo $_REQUEST['id']; ?>" />
                            <div class="step-arrow-nav mb-4">
                                <ul class="nav nav-pills custom-nav nav-justified" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="steparrow-customer-info-tab"
                                            data-bs-toggle="pill" data-bs-target="#steparrow-customer-info" type="button"
                                            role="tab" aria-controls="steparrow-customer-info" aria-selected="true">Customer
                                            Details</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="steparrow-address-info-tab" data-bs-toggle="pill"
                                            data-bs-target="#steparrow-address-info" type="button" role="tab"
                                            aria-controls="steparrow-address-info" aria-selected="false">Address
                                            Details</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="steparrow-Quot-info-tab" data-bs-toggle="pill"
                                            data-bs-target="#steparrow-Quot-info" type="button" role="tab"
                                            aria-controls="steparrow-Quot-info" aria-selected="false">Quotation
                                            Details</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="steparrow-Quot-item-info-tab" data-bs-toggle="pill"
                                            data-bs-target="#steparrow-Quot-item-info" type="button" role="tab"
                                            aria-controls="steparrow-Quot-item-info" aria-selected="false">Quotation
                                            Item</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="steparrow-remark-info-tab" data-bs-toggle="pill"
                                            data-bs-target="#steparrow-remark-info" type="button" role="tab"
                                            aria-controls="steparrow-remark-info" aria-selected="false">Remarks</button>
                                    </li>

                                </ul>
                            </div>

                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="steparrow-customer-info" role="tabpanel"
                                    aria-labelledby="steparrow-customer-info-tab">
                                    <div>
                                        <div class="card-body">
                                            <div class="row g-3 needs-validation">
                                                <div class="col-md-4">
                                                    <label for="owner_name" class="form-label">Select
                                                        Company</label>
                                                    <select class="form-control" name="company_name" id="company_name" <?php if ($_REQUEST['mode'] == "view") {
                                                        echo 'disabled';
                                                    } ?>>
                                                        <option value="">Select Company</option>
                                                        <option value="Test Company 1" <?php if ($row[0]->company_name == 'Test Company 1') {
                                                            echo "selected";
                                                        } ?>>Test Company 1
                                                        </option>
                                                        <option value="Test Company 1" <?php if ($row[0]->company_name == 'Test Company 1') {
                                                            echo "selected";
                                                        } ?>>Test Company 2
                                                        </option>
                                                        <option value="Test Company 1" <?php if ($row[0]->company_name == 'Test Company 1') {
                                                            echo "selected";
                                                        } ?>>Test Company 3
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="customer_name" class="form-label">Select
                                                        Customer</label>
                                                    <select class="form-control" name="customer_name" id="customer_name"
                                                        <?php if ($_REQUEST['mode'] == "view") {
                                                            echo 'disabled';
                                                        } ?>>
                                                        <option value="">Select Customer</option>
                                                        <option value="Test Customer 1" <?php if ($row[0]->customer_name == 'Test Customer 1') {
                                                            echo "selected";
                                                        } ?>>Test Customer
                                                            1
                                                        </option>
                                                        <option value="Test Customer 2" <?php if ($row[0]->customer_name == 'Test Customer 2') {
                                                            echo "selected";
                                                        } ?>>Test Customer
                                                            2
                                                        </option>
                                                        <option value="Test Customer 3" <?php if ($row[0]->customer_name == 'Test Customer 3') {
                                                            echo "selected";
                                                        } ?>>Test Company 3
                                                        </option>

                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="select_cutomer" class="form-label">Select
                                                        T&C</label>

                                                    <select class="form-control" name="term_condition" id="term_condition"
                                                        <?php if ($_REQUEST['mode'] == "view") {
                                                            echo 'disabled';
                                                        } ?>>
                                                        <option value="">Select Terms & Condition</option>
                                                        <option value="Test T & C 1" <?php if ($row[0]->term_condition == 'Test Customer 1') {
                                                            echo "selected";
                                                        } ?>>Test T & C
                                                            1
                                                        </option>
                                                        <option value="Test T & C 2" <?php if ($row[0]->term_condition == 'Test T & C 2') {
                                                            echo "selected";
                                                        } ?>>Test T & C
                                                            2
                                                        </option>
                                                        <option value="Test T & C 3" <?php if ($row[0]->term_condition == 'Test T & C 3') {
                                                            echo "selected";
                                                        } ?>>Test T & C 3
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="company_name" class="form-label">Company
                                                        Name(Person Name)</label>
                                                    <input type="text" class="form-control" id="person_name"
                                                        name="person_name" placeholder="Enter company name"
                                                        value="<?php echo isset($row[0]->person_name) ? $row[0]->person_name : ''; ?>"
                                                        <?php if ($_REQUEST['mode'] == "view") { ?> disabled <?php } ?>
                                                        required>
                                                    <div class="invalid-feedback">Please enter a company
                                                        name.</div>
                                                </div>


                                                <div class="col-md-4">
                                                    <label for="email" class="form-label">Phone</label>
                                                    <input type="number" class="form-control" id="phone" name="phone"
                                                        placeholder="Enter Phone Number"
                                                        value="<?php echo isset($row[0]->phone) ? $row[0]->phone : ''; ?>"
                                                        <?php if ($_REQUEST['mode'] == "view") { ?> disabled <?php } ?>
                                                        required>
                                                    <div class="invalid-feedback">Please enter a valid email
                                                        address.</div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="validationCustomState" class="form-label">State</label>
                                                    <select class="form-control" id="state" name="state"
                                                        data-parsley-required="true" <?php if ($_REQUEST['mode'] == "view") { ?> disabled <?php } ?> required>
                                                        <option value="">Select State</option>
                                                        <option value="Gujarat" <?php if ($row[0]->state == 'Gujarat') {
                                                            echo "selected";
                                                        } ?>>Gujarat

                                                        </option>
                                                        <option value="MP" <?php if ($row[0]->state == 'MP') {
                                                            echo "selected";
                                                        } ?>>MP

                                                        </option>
                                                        <option value="UP" <?php if ($row[0]->state == 'UP') {
                                                            echo "selected";
                                                        } ?>>UP
                                                        </option>
                                                    </select>
                                                    <div class="invalid-feedback">Please select a
                                                        valid
                                                        state.
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="address" class="form-label">Address</label>
                                                    <textarea class="form-control" id="address" name="address"
                                                        placeholder="Enter address" required <?php if ($_REQUEST['mode'] == "view") { ?> disabled <?php } ?>><?php echo isset($row[0]->address) ? $row[0]->address : ''; ?></textarea>
                                                    <div class="invalid-feedback">Please enter an address.
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="gst_no" class="form-label">GST In</label>
                                                    <input type="text" class="form-control" id="gst_no" name="gst_no"
                                                        placeholder="Enter GST NO" pattern="[0-9]{10}"
                                                        value="<?php echo isset($row[0]->gst_no) ? $row[0]->gst_no : ''; ?>"
                                                        <?php if ($_REQUEST['mode'] == "view") { ?> disabled <?php } ?>
                                                        required>
                                                    <div class="invalid-feedback">Please enter a valid
                                                        10-digit mobile number.</div>
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="price_list" class="form-label">Price
                                                        List</label>
                                                    <input type="text" class="form-control" id="price_list"
                                                        name="price_list" placeholder="Enter price List"
                                                        value="<?php echo isset($row[0]->price_list) ? $row[0]->price_list : ''; ?>"
                                                        <?php if ($_REQUEST['mode'] == "view") { ?> disabled <?php } ?>
                                                        required>
                                                    <div class="invalid-feedback">Please enter a password.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-start gap-3 mt-4">
                                        <button type="button"
                                            class="btn btn-success btn-label right ms-auto nexttab nexttab"
                                            data-nexttab="steparrow-address-info-tab"><i
                                                class="ri-arrow-right-line label-icon align-middle fs-lg ms-2"></i>Go
                                            to Address
                                            Details</button>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="steparrow-address-info" role="tabpanel"
                                    aria-labelledby="steparrow-address-info-tab">
                                    <div>
                                        <div class="col-lg-12">
                                            <div>

                                                <div class="card-body">
                                                    <div class="row g-3 needs-validation">
                                                        <div class="col-md-6">
                                                            <label for="address" class="form-label">Shipping
                                                                Address</label>
                                                            <textarea class="form-control" id="ship_address"
                                                                name="ship_address" placeholder="Enter address" required
                                                                <?php if ($_REQUEST['mode'] == "view") { ?> disabled <?php } ?>><?php echo isset($row[0]->ship_address) ? $row[0]->ship_address : ''; ?></textarea>
                                                            <div class="invalid-feedback">Please enter an
                                                                address.</div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="address" class="form-label">Billing
                                                                Address</label>
                                                            <textarea class="form-control" id="bill_address"
                                                                name="bill_address" placeholder="Enter address" required
                                                                <?php if ($_REQUEST['mode'] == "view") { ?> disabled <?php } ?>><?php echo isset($row[0]->bill_address) ? $row[0]->bill_address : ''; ?></textarea>
                                                            <div class="invalid-feedback">Please enter an
                                                                address.</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-start gap-3 mt-4">
                                            <button type="button" class="btn btn-light btn-label previestab"
                                                data-previous="steparrow-customer-info-tab"><i
                                                    class="ri-arrow-left-line label-icon align-middle fs-lg me-2"></i>
                                                Back to
                                                Customer Detail</button>
                                            <button type="button"
                                                class="btn btn-success btn-label right ms-auto nexttab nexttab"
                                                data-nexttab="steparrow-Quot-info-tab"><i
                                                    class="ri-arrow-right-line label-icon align-middle fs-lg ms-2"></i>Go
                                                to
                                                Quotaion
                                                Details
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="steparrow-Quot-info" role="tabpanel"
                                    aria-labelledby="steparrow-Quot-info-tab">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="card-body">
                                                <div id="validationForm" class="row g-3 needs-validation" novalidate
                                                    method="POST" enctype="multipart/form-data">
                                                    <input type="hidden" name="mode" id="mode"
                                                        value="<?php echo $_REQUEST['mode']; ?>" />
                                                    <input type="hidden" name="id" id="id"
                                                        value="<?php echo $_REQUEST['id']; ?>" />
                                                    <div class="col-md-6">
                                                        <label for="quotation_date" class="form-label">Quotation
                                                            Date</label>
                                                        <input type="date" class="form-control" id="quotation_date"
                                                            name="quotation_date" placeholder="Enter company name"
                                                            value="<?php echo isset($row[0]->quotation_date) ? $row[0]->quotation_date : ''; ?>"
                                                            <?php if ($_REQUEST['mode'] == "view") { ?> disabled <?php } ?>
                                                            required>
                                                        <div class="invalid-feedback">Please enter a company
                                                            name.</div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="po_no" class="form-label">PO No.</label>
                                                        <input type="text" class="form-control" id="po_no" name="po_no"
                                                            placeholder="Enter PO Number"
                                                            value="<?php echo isset($row[0]->po_no) ? $row[0]->po_no : ''; ?>"
                                                            <?php if ($_REQUEST['mode'] == "view") { ?> disabled <?php } ?>
                                                            required>
                                                        <div class="invalid-feedback">Please enter a valid email
                                                            address.</div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="po_date" class="form-label">PO Date</label>
                                                        <input type="date" class="form-control" id="po_date" name="po_date"
                                                            value="<?php echo isset($row[0]->po_date) ? $row[0]->po_date : ''; ?>"
                                                            <?php if ($_REQUEST['mode'] == "view") { ?> disabled <?php } ?>
                                                            required>
                                                        <div class="invalid-feedback">Please enter a company
                                                            name.</div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="transport_by" class="form-label">Transport
                                                            By</label>

                                                        <select class="form-control" name="transport_by" id="transport_by"
                                                            <?php if ($_REQUEST['mode'] == "view") {
                                                                echo 'disabled';
                                                            } ?>>
                                                            <option value="">Transport By</option>
                                                            <option value="Road" <?php if ($row[0]->transport_by == 'Road') {
                                                                echo "selected";
                                                            } ?>>Road

                                                            </option>
                                                            <option value="Air" <?php if ($row[0]->transport_by == 'Air') {
                                                                echo "selected";
                                                            } ?>>Air

                                                            </option>
                                                            <option value="Rail" <?php if ($row[0]->transport_by == 'Rail') {
                                                                echo "selected";
                                                            } ?>>Rail
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label for="booking_place" class="form-label">Transport
                                                            Details</label>
                                                        <input type="text" class="form-control" id="transport_details"
                                                            name="transport_details" placeholder="Enter Transport Details"
                                                            value="<?php echo isset($row[0]->transport_details) ? $row[0]->transport_details : ''; ?>"
                                                            <?php if ($_REQUEST['mode'] == "view") { ?> disabled <?php } ?>
                                                            required>
                                                        <div class="invalid-feedback">Please enter a valid email
                                                            address.</div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="expected_dispatch_date" class="form-label">Expected
                                                            Dispatch
                                                            Date</label>
                                                        <input type="date" class="form-control" id="exp_dispatch_date"
                                                            name="exp_dispatch_date"
                                                            value="<?php echo isset($row[0]->exp_dispatch_date) ? $row[0]->exp_dispatch_date : ''; ?>"
                                                            <?php if ($_REQUEST['mode'] == "view") { ?> disabled <?php } ?>
                                                            required>
                                                        <div class="invalid-feedback">Please enter a company
                                                            name.</div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="team_person_name" class="form-label">Team
                                                            Person Name</label>
                                                        <select class="form-control" name="team_person_name"
                                                            id="team_person_name" <?php if ($_REQUEST['mode'] == "view") {
                                                                echo 'disabled';
                                                            } ?>>
                                                            <option value="">Team Person Name</option>
                                                            <option value="Person 1" <?php if ($row[0]->team_person_name == 'Person 1') {
                                                                echo "selected";
                                                            } ?>>Person 1

                                                            </option>
                                                            <option value="Person 2" <?php if ($row[0]->team_person_name == 'Person 2') {
                                                                echo "selected";
                                                            } ?>>Person 2

                                                            </option>
                                                            <option value="Person 3" <?php if ($row[0]->team_person_name == 'Person 3') {
                                                                echo "selected";
                                                            } ?>>Person 3
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="booking_place" class="form-label">Booking
                                                            Place</label>
                                                        <input type="text" class="form-control" id="booking_place"
                                                            name="booking_place" placeholder="Enter Booking Place"
                                                            value="<?php echo isset($row[0]->booking_place) ? $row[0]->booking_place : ''; ?>"
                                                            <?php if ($_REQUEST['mode'] == "view") { ?> disabled <?php } ?>
                                                            required>
                                                        <div class="invalid-feedback">Please enter a valid email
                                                            address.</div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="booking_pincode" class="form-label">Booking
                                                            Pincode</label>
                                                        <input type="text" class="form-control" id="booking_pincode"
                                                            name="booking_pincode" placeholder="Enter PO Number"
                                                            value="<?php echo isset($row[0]->booking_pincode) ? $row[0]->booking_pincode : ''; ?>"
                                                            <?php if ($_REQUEST['mode'] == "view") { ?> disabled <?php } ?>
                                                            required>
                                                        <div class="invalid-feedback">Please enter a valid email
                                                            address.</div>
                                                    </div>

                                                </div>
                                                <div class="d-flex align-items-start gap-3 mt-4">
                                                    <button type="button" class="btn btn-light btn-label previestab"
                                                        data-previous="steparrow-address-info-tab"><i
                                                            class="ri-arrow-left-line label-icon align-middle fs-lg me-2"></i>
                                                        Back
                                                        to
                                                        Address Detail</button>
                                                    <button type="button"
                                                        class="btn btn-success btn-label right ms-auto nexttab nexttab"
                                                        data-nexttab="steparrow-Quot-item-info-tab"><i
                                                            class="ri-arrow-right-line label-icon align-middle fs-lg ms-2"></i>Go
                                                        to
                                                        Quotation Item
                                                        info</button>
                                                </div>
                        </form>
                    </div> -->

                    <!-- en d tab content -->
                    </form>
                </div>
                <!-- end card body -->
            </div>
        </div>
        </div>
        <!-- </div> -->
    <?php } else { ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="mt-1 ">
                            <h1 class="card-title mb-6 fw-bold" style="font-size: 25px;">Quotation Details</h1>
                            <?php if (@$_REQUEST["mode"] != "add") { ?>
                                <div class="d-flex justify-content-end">
                                    <a href="<?php echo "quotation.php?mode=add"; ?>" class="btn btn-success" title="Add New">
                                        <i class="mdi mdi-account-plus"></i> Add/Edit Quotation </a>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="scroll-vertical"
                            class="table table-bordered dt-responsive nowrap align-middle mdl-data-table w-100">
                            <thead>
                                <tr>
                                    <th>Sr no.</th>
                                    <th>Quotation No.</th>
                                    <th>Quotation Date</th>
                                    <th>Status</th>
                                    <th>Type of Company</th>
                                    <th>Company Name</th>
                                    <th>Team Person Name</th>
                                    <th>Customer Type</th>
                                    <th>Quotation Amount</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $counter = 1;
                                if (COUNT($result) > 0) {
                                    foreach ($result as $row) { ?>

                                        <td><?php echo $counter++; ?></td>
                                        <td><?php echo $row->po_no; ?></td>
                                        <td><?php echo $row->quotation_date; ?></td>
                                        <td><?php echo $row->quotation_date; ?></td>
                                        <td><?php echo $row->company_name; ?></td>
                                        <td><?php echo $row->company_name; ?></td>
                                        <td><?php echo $row->team_person_name; ?></td>
                                        <td><?php echo $row->customer_name; ?></td>
                                        <td><?php echo $row->price_list; ?></td>

                                        <td>
                                            <div class="dropdown d-inline-block">
                                                <button class="btn btn-subtle-secondary btn-sm dropdown" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="ri-more-fill align-middle"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li>
                                                        <a href="<?php echo $pageurl .
                                                            "?mode=view&id=" .
                                                            $row->id; ?>" class="dropdown-item text-warning">
                                                            <i class="ri-eye-fill align-bottom me-2 text-warning"></i>
                                                            View
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="<?php echo $pageurl .
                                                            "?mode=edit&id=" .
                                                            $row->id; ?>"
                                                            class="dropdown-item text-info edit-item-btn">
                                                            <i class="ri-pencil-fill align-bottom me-2 text-info"></i>
                                                            Edit
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="<?php echo $pageurl .
                                                            "?mode=delete&id=" .
                                                            $row->id; ?>"
                                                            class="dropdown-item text-danger remove-item-btn">
                                                            <i class="ri-delete-bin-fill align-bottom me-2 text-danger"></i>
                                                            Delete
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                        </tr>
                                    <?php }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    </div>
    </div>
    </div>

    <!-- Footer Start -->
    <?php include "include/footer.php"; ?>
    <!-- end Footer -->
    </div>
    <!-- end main content-->

    <!-- Right Sidebar -->
    <div class="rightbar-overlay"></div>
    <!-- Vendor js -->
    <?php include "include/js.php"; ?>

    <script src="assets/js/pages/form-wizard.init.js"></script>
    <script src="assets/js/pages/invoice-create.init.js"></script>
    <script>
        // Initialize each editor by selecting its unique ID
        ClassicEditor.create(document.querySelector('#term_condition_edit'))
            .catch(error => console.error('Editor 1 Error:', error));

        ClassicEditor.create(document.querySelector('#regards'))
            .catch(error => console.error('Editor 2 Error:', error));

        ClassicEditor.create(document.querySelector('#note'))
            .catch(error => console.error('Editor 3 Error:', error));
    </script>

</body>

</html>