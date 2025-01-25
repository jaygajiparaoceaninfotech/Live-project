<?php
include('root/config.php');
$page_nm = "Super Stockiest";
$pageUrl = "superstockiest";
$pageUrlsho = "customer.php";

$imageUrl = "image/customer/";

if ($_GET['mode'] != '') {

    $id = (int) $_REQUEST['id'];

    if (isset($_POST['btn_submit'])) {

        // required details
        $customer_name = $_POST['customer_name'];
        $image = $_POST['image'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone1 = $_POST['phone1'];
        $wp_phone = $_POST['wp_phone'];
        $price_list = $_POST['price_list'];
        $gst = $_POST['gst'];
        $address = $_POST['address'];
        $password = md5($_POST['password']);
        $cm_password = $_POST['password'];
        $country = $_POST['country'];
        $state = $_POST['state'];
        $city = $_POST['city'];
        $route = $_POST['route'];
        $shippingAddress = $_POST['shippingAddress'];
        $billingaddress = $_POST['billingaddress'];
        $zone = $_POST['zone'];
        $pincode = $_POST['pincode'];
        $email1 = $_POST['email1'];
        $ccemail = $_POST['ccemail'];
        $latitude = $_POST['latitude'];
        $longitude = $_POST['longitude'];
        $phone = $_POST['phone'];
        $contact_person = $_POST['contact_person'];
        $company_id = $_POST['company_id'];
        $client_code = $_POST['client_code'];
        $industry = $_POST['industry'];
        $category_id = $_POST['category_id'];
        $subcategory_id = $_POST['subcategory_id'];
        $sales_officer = $_POST['sales_officer'];
        $company_type = $_POST['company_type'];
        $expected_order = $_POST['expected_order'];
        $pan_number = $_POST['pan_number'];
        $cash_discount = $_POST['cash_discount'];
        $additional_discount = $_POST['additional_discount'];
        $birthdate = $_POST['birthdate'];
        $target_assign_type = $_POST['target_assign_type'];
        $bank_name = $_POST['bank_name'];
        $bank_account_no = $_POST['bank_account_no'];
        $bank_ifsc_code = $_POST['bank_ifsc_code'];
        $bank_branch = $_POST['bank_branch'];
        $cheque_1 = $_POST['cheque_1'];
        $cheque_2 = $_POST['cheque_2'];
        $transporter_name = $_POST['transporter_name'];
        $transporter_number = $_POST['transporter_number'];
        $per_kg_rate = $_POST['per_kg_rate'];
        $credit_limit = $_POST['credit_limit'];
        $credit_days = $_POST['credit_days'];
        $remark = $_POST['remark'];
        $business_registration_no = $_POST['business_registration_no'];
        $registration_no = $_POST['registration_no'];
        $billing_contact_person = $_POST['billing_contact_person'];
        $billing_contact_number = $_POST['billing_contact_number'];
        $work_type = $_POST['work_type'];
        $status = "superstockiest";

        $image_path = $ai_core->aiUpload($_FILES['cover_image'], $imageUrl, 'image', $_POST['old_file_name']);


        // Add record
        if ($_POST['id'] == '' && $_POST['mode'] == 'add') {
            // required details
            $query1 = "INSERT INTO customer SET 
                    customer_name='" . $customer_name . "',
                    image='" . $image_path . "',
                    name='" . $name . "',
                    email='" . $email . "',
                    wp_phone='" . $wp_phone . "',
                    price_list='" . $price_list . "',
                    address='" . $address . "',
                    password='" . $password . "',
                    cm_password='" . $cm_password . "',
                    gst='" . $gst . "',
                    country='" . $country . "',
                    state='" . $state . "',
                    city='" . $city . "',
                    route='" . $route . "',
                    shippingAddress='" . $shippingAddress . "',
                    billingaddress='" . $billingaddress . "',
                    zone='" . $zone . "',
                    pincode='" . $pincode . "',
                    email1='" . $email1 . "',
                    ccemail='" . $ccemail . "',
                    latitude='" . $latitude . "',
                    longitude='" . $longitude . "',
                    phone='" . $phone . "',
                    company_id='" . $company_id . "',
                    contact_person='" . $contact_person . "',
                    client_code='" . $client_code . "',
                    industry='" . $industry . "',
                    category_id='" . $category_id . "',
                    subcategory_id='" . $subcategory_id . "',
                    sales_officer='" . $sales_officer . "',
                    company_type='" . $company_type . "',
                    expected_order='" . $expected_order . "',
                    pan_number='" . $pan_number . "',
                    cash_discount='" . $cash_discount . "',
                    additional_discount='" . $additional_discount . "',
                    birthdate='" . $birthdate . "',
                    target_assign_type='" . $target_assign_type . "',
                    bank_name='" . $bank_name . "',
                    bank_account_no='" . $bank_account_no . "',
                    bank_ifsc_code='" . $bank_ifsc_code . "',
                    bank_branch='" . $bank_branch . "',
                    cheque_1='" . $cheque_1 . "',
                    cheque_2='" . $cheque_2 . "',
                    transporter_name='" . $transporter_name . "',
                    transporter_number='" . $transporter_number . "',
                    per_kg_rate='" . $per_kg_rate . "',
                    credit_limit='" . $credit_limit . "',
                    credit_days='" . $credit_days . "',
                    remark='" . $remark . "',
                    business_registration_no='" . $business_registration_no . "',
                    registration_no='" . $registration_no . "',
                    billing_contact_person	='" . $billing_contact_person . "',
                    billing_contact_number='" . $billing_contact_number . "',
                    work_type='" . $work_type . "',
                    status='" . $status . "'";


            $ai_db->aiQuery($query1);
            $ai_core->aiGoPage($pageUrlsho . "?msg=1");
        }



        // Edit record
        if ($_POST['id'] != '' && $_POST['mode'] == 'edit') {
            $upadte =
                "UPDATE customer SET 
                     customer_name='" . $customer_name . "',
                    image='" . $image_path . "',
                    name='" . $name . "',
                    email='" . $email . "',
                    phone='" . $phone . "',
                    wp_phone='" . $wp_phone . "',
                    price_list='" . $price_list . "',
                    address='" . $address . "',
                    password='" . $password . "',
                    cm_password='" . $cm_password . "',                    
                    gst='" . $gst . "',
                    country='" . $country . "',
                    state='" . $state . "',
                    city='" . $city . "',
                    route='" . $route . "',
                    shippingAddress='" . $shippingAddress . "',
                    billingaddress='" . $billingaddress . "',
                    zone='" . $zone . "',
                    pincode='" . $pincode . "',
                    email1='" . $email1 . "',
                    ccemail='" . $ccemail . "',
                    latitude='" . $latitude . "',
                    longitude='" . $longitude . "',
                    phone='" . $phone . "',
                    company_id='" . $company_id . "',
                    contact_person='" . $contact_person . "',
                    client_code='" . $client_code . "',
                    industry='" . $industry . "',
                    category_id='" . $category_id . "',
                    subcategory_id='" . $subcategory_id . "',
                    sales_officer='" . $sales_officer . "',
                    company_type='" . $company_type . "',
                    expected_order='" . $expected_order . "',
                    pan_number='" . $pan_number . "',
                    cash_discount='" . $cash_discount . "',
                    additional_discount='" . $additional_discount . "',
                    birthdate='" . $birthdate . "',
                    target_assign_type='" . $target_assign_type . "',
                    bank_name='" . $bank_name . "',
                    bank_account_no='" . $bank_account_no . "',
                    bank_ifsc_code='" . $bank_ifsc_code . "',
                    bank_branch='" . $bank_branch . "',
                    cheque_1='" . $cheque_1 . "',
                    cheque_2='" . $cheque_2 . "',
                    transporter_name='" . $transporter_name . "',
                    transporter_number='" . $transporter_number . "',
                    per_kg_rate='" . $per_kg_rate . "',
                    credit_limit='" . $credit_limit . "',
                    credit_days='" . $credit_days . "',
                    remark='" . $remark . "',
                    business_registration_no='" . $business_registration_no . "',
                    registration_no='" . $registration_no . "',
                    billing_contact_person	='" . $billing_contact_person . "',
                    billing_contact_number='" . $billing_contact_number . "',
                    work_type='" . $work_type . "' WHERE id=" . $id;
            $ai_db->aiQuery($upadte);
            $ai_core->aiGoPage($pageUrlsho . "?msg=2");
        }
    }

    //delete record
    if ($_GET['mode'] == 'delete' && $id != '') {

        $image_name = $ai_core->aiGetValue("customer", 'image', 'id', $id);
        $ai_core->aiDelete($imageUrl . $image_name);

        $qry_del_su = "DELETE from customer WHERE id=" . $id;
        $ai_db->aiQuery($qry_del_su);

        $ai_core->aiGoPage($pageUrl . "?msg=3");
    }
    //get data for edit
    if ($id != '') {
        $qry = "SELECT * FROM customer WHERE id=" . $id;
        $mc_row = $ai_db->aiGetQueryObj($qry);
        $row = $ai_db->aiGetQueryObj($qry);
    }
} else {
    //select all record
    $qry = "SELECT * FROM customer  ";
    $result = $ai_db->aiGetQueryObj($qry);
}

?>
<!doctype html>
<html lang="en" data-layout="vertical" data-sidebar="dark" data-sidebar-image="img-1" data-sidebar-size="lg"
    data-preloader="disable" data-theme="default" data-topbar="light" data-bs-theme="light" data-theme-color="0">

<head>

    <meta charset="utf-8">
    <title>Ocean | <?php echo $page_nm; ?></title>
    <meta name="" content="width=device-width, initial-scale=1.0">
    <meta content="  " name="">
    <meta content="" name="">
    <!-- App favicon -->
    <link rel="shortcut icon" href="image/ring.png">

    <!-- Fonts css load -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link id="fontsLink"
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&amp;display=swap"
        rel="stylesheet">

    <!-- jsvectormap css -->
    <?php include("include/css.php"); ?>
</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <!-- ========== App Menu ========== -->
        <div class="app-menu navbar-menu">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <?php include("include/logo.php"); ?>
                <button type="button" class="btn btn-sm p-0 fs-3xl header-item float-end btn-vertical-sm-hover"
                    id="vertical-hover">
                    <i class="ri-record-circle-line"></i>
                </button>
                <div class="vertical-menu-btn-wrapper header-item vertical-icon">
                    <button type="button"
                        class="btn btn-sm px-0 fs-xl vertical-menu-btn topnav-hamburger shadow hamburger-icon"
                        id="topnav-hamburger-icon">
                        <i class='bx bx-chevrons-right'></i>
                        <i class='bx bx-chevrons-left'></i>
                    </button>
                </div>
            </div>
            <?php include("include/sidebar.php"); ?>

            <div class="sidebar-background"></div>
        </div>
        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>

        <div class="topbar-wrapper shadow">
            <div class="topbar-wrapper shadow">
                <div class="topbar-wrapper shadow">
                    <header id="page-topbar">
                        <div class="layout-width">
                            <div class="navbar-header">
                                <div class="d-flex">
                                    <!-- LOGO -->
                                    <div class="navbar-brand-box horizontal-logo">
                                        <?php include("include/logo.php"); ?>
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
                                <?php include("include/header.php"); ?>
                            </div>
                        </div>
                    </header>
                </div>
            </div>
            <?php include("include/menu.php"); ?>
        </div>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="customer">Customers</a></li>
                                        <li class="breadcrumb-item active"><?php echo "Add " . $page_nm; ?></li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->


                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-header">
                                    <!-- <h4 class="card-title mb-0">Arrow Nav Steps</h4> -->
                                </div><!-- end card header -->
                                <div class="card-body form-steps">

                                    <form id="validationForm" class="row g-3 needs-validation" novalidate method="POST"
                                        enctype="multipart/form-data">
                                        <input type="hidden" name="mode" id="mode"
                                            value="<?php echo $_REQUEST['mode']; ?>" />
                                        <input type="hidden" name="id" id="id" value="<?php echo $_REQUEST['id']; ?>" />
                                        <div class="step-arrow-nav mb-4">

                                            <ul class="nav nav-pills custom-nav nav-justified" role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link active" id="steparrow-required-info-tab"
                                                        data-bs-toggle="pill" data-bs-target="#steparrow-required-info"
                                                        type="button" role="tab" aria-controls="steparrow-required-info"
                                                        aria-selected="false">Required Details</button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link " id="steparrow-contact-info-tab"
                                                        data-bs-toggle="pill" data-bs-target="#steparrow-contact-info"
                                                        type="button" role="tab" aria-controls="steparrow-contact-info"
                                                        aria-selected="false">Contact Details</button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link" id="steparrow-extra-info-tab"
                                                        data-bs-toggle="pill" data-bs-target="#steparrow-extra-info"
                                                        type="button" role="tab" aria-controls="steparrow-extra-info"
                                                        aria-selected="false">Extra Information</button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link " id="steparrow-bank-info-tab"
                                                        data-bs-toggle="pill" data-bs-target="#steparrow-bank-info"
                                                        type="button" role="tab" aria-controls="steparrow-bank-info"
                                                        aria-selected="false">Bank Details</button>
                                                </li>

                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link " id="steparrow-other-info-tab"
                                                        data-bs-toggle="pill" data-bs-target="#steparrow-other-info"
                                                        type="button" role="tab" aria-controls="steparrow-other-info"
                                                        aria-selected="false">Other Details</button>
                                                </li>

                                            </ul>
                                        </div>

                                        <div class="tab-content">
                                            <!-- required details -->
                                            <div class="tab-pane fade show active" id="steparrow-required-info"
                                                role="tabpanel" aria-labelledby="steparrow-required-info-tab">
                                                <div class="row">
                                                    <!-- Customer Name -->
                                                    <div class="col-md-6">
                                                        <label for="customer_name" class="form-label">Customer
                                                            Name</label>
                                                        <input type="text" class="form-control" id="customer_name"
                                                            name="customer_name" placeholder="Enter Customer Name"
                                                            value="<?php echo isset($row[0]->customer_name) ? $row[0]->customer_name : ''; ?>"
                                                            pattern="[A-Za-z ]+" <?php if ($_REQUEST['mode'] == "view") { ?> disabled <?php } ?> required>
                                                        <div class="invalid-feedback">Please enter a valid name with
                                                            alphabet characters only.</div>
                                                    </div>

                                                    <!-- Contact Person Name -->
                                                    <div class="col-md-6">
                                                        <label for="contact_name" class="form-label">Contact Person
                                                            Name</label>
                                                        <input type="text" class="form-control" id="contact_name"
                                                            name="name" placeholder="Enter Contact Person Name"
                                                            value="<?php echo @$row[0]->name; ?>" pattern="[A-Za-z ]+"
                                                            <?php if ($_REQUEST['mode'] == "view") { ?> disabled <?php } ?> required>
                                                        <div class="invalid-feedback">Please enter a valid name with
                                                            alphabet characters only.</div>
                                                    </div>

                                                    <!-- Mobile Number -->
                                                    <div class="col-md-6">
                                                        <label for="phone" class="form-label">Mobile Number</label>
                                                        <input type="number" class="form-control" id="phone"
                                                            name="phone" placeholder="Enter Mobile Number"
                                                            maxlength="10"
                                                            value="<?php echo isset($row[0]->phone) ? $row[0]->phone : ''; ?>"
                                                            <?php if ($_REQUEST['mode'] == "view") { ?> disabled <?php } ?> required>
                                                        <div class="invalid-feedback">Please enter a valid 10-digit
                                                            mobile number.</div>
                                                    </div>

                                                    <!-- WhatsApp Number -->
                                                    <div class="col-md-6">
                                                        <label for="wp_phone" class="form-label">WhatsApp Number</label>
                                                        <input type="number" class="form-control" id="wp_phone"
                                                            name="wp_phone" placeholder="Enter WhatsApp Number"
                                                            maxlength="10"
                                                            value="<?php echo isset($row[0]->wp_phone) ? $row[0]->wp_phone : ''; ?>"
                                                            <?php if ($_REQUEST['mode'] == "view") { ?> disabled <?php } ?> required>
                                                        <div class="invalid-feedback">Please enter a valid 10-digit
                                                            WhatsApp number.</div>
                                                    </div>

                                                    <!-- Price List -->
                                                    <div class="col-md-6">
                                                        <label for="price_list" class="form-label">Price List</label>
                                                        <select id="price_list" class="form-select w-100"
                                                            name="price_list" style="height: 40px;" <?php echo (isset($_REQUEST['mode']) && $_REQUEST['mode'] === "view") ? 'disabled' : ''; ?> required>
                                                            <option value="" <?php echo (!isset($row[0]->price_list) || $row[0]->price_list == '') ? 'selected' : ''; ?>>Select a
                                                                Price List</option>
                                                            <option value="type1" <?php echo (isset($row[0]->price_list) && $row[0]->price_list == 'type1') ? 'selected' : ''; ?>>
                                                                Type 1</option>
                                                            <option value="type2" <?php echo (isset($row[0]->price_list) && $row[0]->price_list == 'type2') ? 'selected' : ''; ?>>
                                                                Type 2</option>
                                                            <option value="type3" <?php echo (isset($row[0]->price_list) && $row[0]->price_list == 'type3') ? 'selected' : ''; ?>>
                                                                Type 3</option>
                                                            <option value="type4" <?php echo (isset($row[0]->price_list) && $row[0]->price_list == 'type4') ? 'selected' : ''; ?>>
                                                                Type 4</option>
                                                        </select>
                                                    </div>

                                                    <!-- Password -->
                                                    <div class="col-md-6 position-relative">
                                                        <label for="password" class="form-label">Password</label>
                                                        <div class="input-group">
                                                            <input type="password" class="form-control" id="password"
                                                                name="password" placeholder="Enter Password"
                                                                value="<?php echo isset($row[0]->cm_password) ? $row[0]->cm_password : ''; ?>"
                                                                <?php if ($_REQUEST['mode'] == "view") { ?> disabled <?php } ?> required>
                                                            <button class="btn btn-outline-secondary btn-sm"
                                                                type="button" id="password-addon" tabindex="-1"
                                                                aria-label="Toggle password visibility"><i
                                                                    class="ri-eye-fill"></i></button>
                                                        </div>
                                                        <div class="invalid-feedback mt-1">Please enter a password.
                                                        </div>
                                                    </div>


                                                    <!-- GST Number -->
                                                    <div class="col-md-6">
                                                        <label for="gst" class="form-label">GST Number</label>
                                                        <input type="text" class="form-control" id="gst" name="gst"
                                                            placeholder="Enter GST Number"
                                                            value="<?php echo isset($row[0]->gst) ? $row[0]->gst : ''; ?>"
                                                            pattern="[A-Z0-9]{15}" <?php if ($_REQUEST['mode'] == "view") { ?> disabled <?php } ?> required>
                                                        <div class="invalid-feedback">Please enter a valid 15-character
                                                            GST number.</div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label for="cover_image" class="form-label"> Image </label>
                                                        <?php if ($_REQUEST['mode'] == "view") {
                                                        } else { ?>
                                                            <input type="file" name="cover_image" id="cover_image"
                                                                class="form-control" <?php if ($_GET['mode'] == 'add') { ?>
                                                                    required <?php } ?> />
                                                        <?php } ?>
                                                        <?php if ($row[0]->image != '') { ?>
                                                            <img src="<?php echo $imageUrl . $row[0]->image ?>" class="mt-2"
                                                                width="200" />
                                                        <?php } ?>
                                                        <div class="invalid-feedback">Image Not Selacted.</div>
                                                        <input type="hidden" name="old_file_name" id="old_file_name"
                                                            value="<?php echo $row[0]->image ?>" />
                                                    </div>

                                                    <!-- Address -->
                                                    <div class="col-md-6">
                                                        <label for="address" class="form-label">Address</label>
                                                        <textarea class="form-control" id="address" name="address"
                                                            placeholder="Enter Address" <?php if ($_REQUEST['mode'] == "view") { ?> disabled <?php } ?>
                                                            required><?php echo isset($row[0]->address) ? $row[0]->address : ''; ?></textarea>
                                                        <div class="invalid-feedback">Please enter an address.</div>
                                                    </div>
                                                </div>

                                                <div class="d-flex align-items-start gap-3 mt-4">
                                                    <button type="button"
                                                        class="btn btn-success btn-label right ms-auto nexttab nexttab"
                                                        data-nexttab="steparrow-contact-info-tab"><i
                                                            class="ri-arrow-right-line label-icon align-middle fs-lg ms-2"></i>Go
                                                        to more info</button>
                                                </div>
                                            </div>

                                            <!-- end tab pane -->
                                            <!-- contact info -->
                                            <div class="tab-pane fade " id="steparrow-contact-info" role="tabpanel"
                                                aria-labelledby="steparrow-contact-info-tab">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label for="validationCustomCountry" class="form-label">Select
                                                            Country</label>
                                                        <select class="form-control" id="country" name="country"
                                                            data-parsley-required="true" <?php if ($_REQUEST['mode'] == "view") { ?> disabled <?php } ?>
                                                            required>
                                                            <option value="">Select Country</option>
                                                            <?php
                                                            $qrys = "SELECT * FROM " . DB_PREFIX . "country ORDER BY id ASC";
                                                            $rows = $ai_db->aiGetQueryObj($qrys);
                                                            foreach ($rows as $mcrow) {
                                                                ?>
                                                                <option <?php if ($mc_row[0]->country == $mcrow->id) { ?>
                                                                        selected <?php } ?> value="<?php echo $mcrow->id; ?>">
                                                                    <?php echo $mcrow->country_name; ?>
                                                                </option>
                                                            <?php } ?>
                                                        </select>
                                                        <div class="invalid-feedback">Please select a valid country.
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="validationCustomState" class="form-label">Select
                                                            State</label>
                                                        <select class="form-control" id="state" name="state"
                                                            data-parsley-required="true" <?php if ($_REQUEST['mode'] == "view") { ?> disabled <?php } ?>
                                                            required>
                                                            <option value="">Select State</option>
                                                            <?php
                                                            $qrys = "SELECT * FROM " . DB_PREFIX . "state ORDER BY id ASC";
                                                            $rows = $ai_db->aiGetQueryObj($qrys);
                                                            foreach ($rows as $mcrow) {
                                                                ?>
                                                                <option <?php if ($mc_row[0]->state == $mcrow->id) { ?>
                                                                        selected <?php } ?> value="<?php echo $mcrow->id; ?>">
                                                                    <?php echo $mcrow->state_name; ?>
                                                                </option>
                                                            <?php } ?>
                                                        </select>
                                                        <div class="invalid-feedback">Please select a valid state.</div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="validationCustomCity" class="form-label">Select
                                                            City</label>
                                                        <select class="form-control" id="city_id" name="city_id"
                                                            data-parsley-required="true" <?php if ($_REQUEST['mode'] == "view") { ?> disabled <?php } ?>
                                                            required>
                                                            <option value="">Select City</option>
                                                            <?php
                                                            $qrys = "SELECT * FROM " . DB_PREFIX . "city ORDER BY id ASC";
                                                            $rows = $ai_db->aiGetQueryObj($qrys);
                                                            foreach ($rows as $mcrow) {
                                                                ?>
                                                                <option <?php if ($mc_row[0]->city == $mcrow->id) { ?>
                                                                        selected <?php } ?> value="<?php echo $mcrow->id; ?>">
                                                                    <?php echo $mcrow->city_name; ?>
                                                                </option>
                                                            <?php } ?>
                                                        </select>
                                                        <div class="invalid-feedback">Please select a valid city.</div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="validationCustomRoute" class="form-label">Select
                                                            Route</label>
                                                        <select class="form-control" id="route" name="route"
                                                            data-parsley-required="true" <?php if ($_REQUEST['mode'] == "view") { ?> disabled <?php } ?>
                                                            required>
                                                            <option value="">Select Route</option>
                                                            <?php
                                                            $qrys = "SELECT * FROM " . DB_PREFIX . "route ORDER BY id ASC";
                                                            $rows = $ai_db->aiGetQueryObj($qrys);
                                                            foreach ($rows as $mcrow) {
                                                                ?>
                                                                <option <?php if ($mc_row[0]->route == $mcrow->id) { ?>
                                                                        selected <?php } ?> value="<?php echo $mcrow->id; ?>">
                                                                    <?php echo $mcrow->route_name; ?>
                                                                </option>
                                                            <?php } ?>
                                                        </select>
                                                        <div class="invalid-feedback">Please select a valid route.</div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="validationCustomShippingAddress"
                                                            class="form-label">Shipping Address</label>
                                                        <textarea type="text" class="form-control"
                                                            id="validationCustomShippingAddress" name="shippingAddress"
                                                            <?php if ($_REQUEST['mode'] == "view") { ?> disabled <?php } ?>
                                                            required><?php echo isset($row[0]->shippingAddress) ? $row[0]->shippingAddress : ''; ?></textarea>
                                                        <div class="invalid-feedback">Please provide a valid shipping
                                                            address.</div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="validationCustomBillingAddress"
                                                            class="form-label">Billing Address</label>
                                                        <textarea type="text" class="form-control"
                                                            id="validationCustomBillingAddress" name="billingaddress"
                                                            <?php if ($_REQUEST['mode'] == "view") { ?> disabled <?php } ?>
                                                            required><?php echo isset($row[0]->billingaddress) ? $row[0]->billingaddress : ''; ?></textarea>
                                                        <div class="invalid-feedback">Please provide a valid billing
                                                            address.</div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="validationCustomZone" class="form-label">Select
                                                            Zone</label>
                                                        <select class="form-control" id="zone" name="zone"
                                                            data-parsley-required="true" <?php if ($_REQUEST['mode'] == "view") { ?> disabled <?php } ?>
                                                            required>
                                                            <option value="">Select Zone</option>
                                                            <?php
                                                            $qrys = "SELECT * FROM " . DB_PREFIX . "zone ORDER BY id ASC";
                                                            $rows = $ai_db->aiGetQueryObj($qrys);
                                                            foreach ($rows as $mcrow) {
                                                                ?>
                                                                <option <?php if ($mc_row[0]->zone == $mcrow->id) { ?>
                                                                        selected <?php } ?> value="<?php echo $mcrow->id; ?>">
                                                                    <?php echo $mcrow->zone_name; ?>
                                                                </option>
                                                            <?php } ?>
                                                        </select>
                                                        <div class="invalid-feedback">Please select a valid zone.</div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="validationCustomPincode"
                                                            class="form-label">Pincode</label>
                                                        <input type="text" class="form-control"
                                                            id="validationCustomPincode" name="pincode"
                                                            value="<?php echo isset($row[0]->pincode) ? $row[0]->pincode : ''; ?>"
                                                            <?php if ($_REQUEST['mode'] == "view") { ?> disabled <?php } ?> required>
                                                        <div class="invalid-feedback">Please provide a valid pincode.
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="validationCustomEmail"
                                                            class="form-label">Email</label>
                                                        <input type="email" class="form-control"
                                                            id="validationCustomEmail" name="email1"
                                                            value="<?php echo isset($row[0]->email1) ? $row[0]->email1 : ''; ?>"
                                                            <?php if ($_REQUEST['mode'] == "view") { ?> disabled <?php } ?> required>
                                                        <div class="invalid-feedback">Please provide a valid email
                                                            address.</div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="validationCustomCCEmail" class="form-label">CC
                                                            Email</label>
                                                        <input type="email" class="form-control" name="ccemail"
                                                            id="validationCustomCCEmail"
                                                            value="<?php echo isset($row[0]->ccemail) ? $row[0]->ccemail : ''; ?>"
                                                            <?php if ($_REQUEST['mode'] == "view") { ?> disabled <?php } ?> required>
                                                        <div class="valid-feedback">Please provide a valid CC email
                                                            address..</div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="validationCustomLatitude"
                                                            class="form-label">Latitude</label>
                                                        <input type="text" class="form-control"
                                                            id="validationCustomLatitude" name="latitude"
                                                            value="<?php echo isset($row[0]->latitude) ? $row[0]->latitude : ''; ?>"
                                                            <?php if ($_REQUEST['mode'] == "view") { ?> disabled <?php } ?> required>
                                                        <div class="invalid-feedback">Please provide a valid latitude.
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="validationCustomLongitude"
                                                            class="form-label">Longitude</label>
                                                        <input type="text" class="form-control"
                                                            id="validationCustomLongitude" name="longitude"
                                                            value="<?php echo isset($row[0]->longitude) ? $row[0]->longitude : ''; ?>"
                                                            <?php if ($_REQUEST['mode'] == "view") { ?> disabled <?php } ?> required>
                                                        <div class="invalid-feedback">Please provide a valid longitude.
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="validationCustomPhone"
                                                            class="form-label">Phone</label>
                                                        <input type="tel" class="form-control"
                                                            id="validationCustomPhone" name="phone"
                                                            value="<?php echo isset($row[0]->phone) ? $row[0]->phone : ''; ?>"
                                                            <?php if ($_REQUEST['mode'] == "view") { ?> disabled <?php } ?> required>
                                                        <div class="invalid-feedback">Please provide a valid phone
                                                            number.</div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="validationCustomContactPerson"
                                                            class="form-label">Contact Person Name</label>
                                                        <input type="text" class="form-control"
                                                            id="validationCustomContactPerson" name="contact_person"
                                                            value="<?php echo isset($row[0]->contact_person) ? $row[0]->contact_person : ''; ?>"
                                                            <?php if ($_REQUEST['mode'] == "view") { ?> disabled <?php } ?> required>
                                                        <div class="invalid-feedback">Please provide a valid contact
                                                            person name.</div>
                                                    </div>

                                                </div>
                                                <div class="d-flex align-items-start gap-3 mt-4">
                                                    <button type="button" class="btn btn-light btn-label previestab"
                                                        data-previous="steparrow-required-info-tab"><i
                                                            class="ri-arrow-left-line label-icon align-middle fs-lg me-2"></i>
                                                        Back to Reuired Details</button>
                                                    <button type="button"
                                                        class="btn btn-success btn-label right ms-auto nexttab nexttab"
                                                        data-nexttab="steparrow-extra-info-tab"><i
                                                            class="ri-arrow-right-line label-icon align-middle fs-lg ms-2"></i>Go
                                                        To Extra Details</button>
                                                </div>
                                            </div>
                                            <!-- end tab pane -->
                                            <!-- extra details -->
                                            <div class="tab-pane fade" id="steparrow-extra-info" role="tabpanel"
                                                aria-labelledby="steparrow-extra-info-tab">
                                                <div>
                                                    <div class="row">
                                                        <!-- Company (Dropdown) -->
                                                        <div class="col-md-6">
                                                            <label for="company" class="form-label">Select
                                                                Company</label>
                                                            <select class="form-control" id="company_id"
                                                                name="company_id" data-parsley-required="true" <?php if ($_REQUEST['mode'] == "view") { ?> disabled <?php } ?>
                                                                required>
                                                                <option value="">Select Company</option>
                                                                <?php
                                                                if ($_SESSION['c_id']) {
                                                                    $qrys = "SELECT * FROM " . DB_PREFIX . "company where id='" . $_SESSION['c_id'] . "' ORDER BY id ASC";
                                                                } else {
                                                                    $qrys = "SELECT * FROM " . DB_PREFIX . "company ORDER BY id ASC";
                                                                }
                                                                $rows = $ai_db->aiGetQueryObj($qrys);
                                                                foreach ($rows as $mcrow) {
                                                                    ?>
                                                                    <option <?php if ($mc_row[0]->company_id == $mcrow->id) { ?> selected <?php } ?>
                                                                        value="<?php echo $mcrow->id; ?>">
                                                                        <?php echo $mcrow->company_name; ?>
                                                                    </option>
                                                                <?php } ?>
                                                            </select>
                                                            <div class="invalid-feedback">Please select a company.</div>
                                                        </div>

                                                        <!-- Client Code -->
                                                        <div class="col-md-6">
                                                            <label for="client_code" class="form-label">Client
                                                                Code</label>
                                                            <input type="text" class="form-control" id="client_code"
                                                                name="client_code" placeholder="Enter client code"
                                                                value="<?php echo isset($row[0]->client_code) ? $row[0]->client_code : ''; ?>"
                                                                <?php if ($_REQUEST['mode'] == "view") { ?> disabled <?php } ?> required>
                                                            <div class="invalid-feedback">Please enter a client code.
                                                            </div>
                                                        </div>

                                                        <!-- Type of Industry (Dropdown) -->

                                                        <div class="col-md-6">
                                                            <label for="industry" class="form-label">Type of
                                                                Industry</label>
                                                            <select id="industry" class="form-select" name="industry"
                                                                <?php echo (isset($_REQUEST['mode']) && $_REQUEST['mode'] === "view") ? 'disabled' : ''; ?>
                                                                required>
                                                                <option value="" <?php echo (!isset($row[0]->industry) || $row[0]->industry == '') ? 'selected' : ''; ?>>
                                                                    Select Industry</option>
                                                                <option value="industry1" <?php echo (isset($row[0]->industry) && $row[0]->industry == 'industry1') ? 'selected' : ''; ?>>Industry 1</option>
                                                                <option value="industry2" <?php echo (isset($row[0]->industry) && $row[0]->industry == 'industry2') ? 'selected' : ''; ?>>Industry 2</option>


                                                            </select>
                                                            <div class="invalid-feedback">Please select the type of
                                                                industry.</div>
                                                        </div>

                                                        <!-- Product Category (Dropdown) -->
                                                        <div class="col-md-6">
                                                            <label for="product_category" class="form-label">Product
                                                                Category</label>
                                                            <select class="form-control" id="category_id"
                                                                name="category_id" data-parsley-required="true" <?php if ($_REQUEST['mode'] == "view") { ?> disabled <?php } ?>
                                                                required>
                                                                <option value="">Select Product Category</option>
                                                                <?php
                                                                $qrys = "SELECT * FROM " . DB_PREFIX . "product_category ORDER BY id ASC";
                                                                $rows = $ai_db->aiGetQueryObj($qrys);
                                                                foreach ($rows as $mcrow) {
                                                                    ?>
                                                                    <option <?php if ($mc_row[0]->category_id == $mcrow->id) { ?> selected <?php } ?>
                                                                        value="<?php echo $mcrow->id; ?>">
                                                                        <?php echo $mcrow->category_name; ?>
                                                                    </option>
                                                                <?php } ?>
                                                            </select>
                                                            <div class="invalid-feedback">Please select a product
                                                                category.</div>
                                                        </div>

                                                        <!-- Subcategory (Dropdown) -->
                                                        <div class="col-md-6">
                                                            <label for="subcategory"
                                                                class="form-label">Subcategory</label>
                                                            <select class="form-control" id="subcategory_id"
                                                                name="subcategory_id" data-parsley-required="true" <?php if ($_REQUEST['mode'] == "view") { ?> disabled <?php } ?>
                                                                required>
                                                                <option value="">Select Product Subcategory</option>
                                                                <?php
                                                                $qrys = "SELECT * FROM " . DB_PREFIX . "product_subcategory ORDER BY id ASC";
                                                                $rows = $ai_db->aiGetQueryObj($qrys);
                                                                foreach ($rows as $mcrow) {
                                                                    ?>
                                                                    <option <?php if ($mc_row[0]->subcategory_id == $mcrow->id) { ?>
                                                                            selected <?php } ?>
                                                                        value="<?php echo $mcrow->id; ?>">
                                                                        <?php echo $mcrow->subcategory_name; ?>
                                                                    </option>
                                                                <?php } ?>
                                                            </select>
                                                            <div class="invalid-feedback">Please select a subcategory.
                                                            </div>
                                                        </div>

                                                        <!-- Sales Officer (Dropdown) -->

                                                        <div class="col-md-6">
                                                            <label for="sales_officer" class="form-label">Sales
                                                                Officer</label>
                                                            <select id="sales_officer" class="form-select"
                                                                name="sales_officer" <?php echo (isset($_REQUEST['mode']) && $_REQUEST['mode'] === "view") ? 'disabled' : ''; ?> required>
                                                                <option value="" <?php echo (!isset($row[0]->sales_officer) || $row[0]->sales_officer == '') ? 'selected' : ''; ?>>
                                                                    Select Sales Officer</option>
                                                                <option value="officer1" <?php echo (isset($row[0]->sales_officer) && $row[0]->sales_officer == 'officer1') ? 'selected' : ''; ?>>
                                                                    Officer 1</option>
                                                                <option value="officer2" <?php echo (isset($row[0]->sales_officer) && $row[0]->sales_officer == 'officer2') ? 'selected' : ''; ?>>
                                                                    Officer 2</option>
                                                            </select>
                                                            <div class="invalid-feedback">Please select a sales
                                                                officer.
                                                            </div>
                                                        </div>

                                                        <!-- Company Type (Dropdown) -->
                                                        <div class="col-md-6">
                                                            <label for="company_type" class="form-label">Company
                                                                Type</label>
                                                            <select id="company_type" class="form-select"
                                                                name="company_type" <?php echo (isset($_REQUEST['mode']) && $_REQUEST['mode'] === "view") ? 'disabled' : ''; ?>
                                                                required>

                                                                <option value="" <?php echo (!isset($row[0]->company_type) || $row[0]->company_type == '') ? 'selected' : ''; ?>>
                                                                    Select Company Type
                                                                </option>

                                                                <option value="type1" <?php echo (isset($row[0]->company_type) && $row[0]->company_type == 'type1') ? 'selected' : ''; ?>>
                                                                    Type 1
                                                                </option>

                                                                <option value="type2" <?php echo (isset($row[0]->company_type) && $row[0]->company_type == 'type2') ? 'selected' : ''; ?>>
                                                                    Type 2
                                                                </option>

                                                            </select>
                                                            <div class="invalid-feedback">Please select a company type.
                                                            </div>
                                                        </div>

                                                        <!-- Expected Order Value -->
                                                        <div class="col-md-6">
                                                            <label for="expected_order_value"
                                                                class="form-label">Expected Order Value</label>
                                                            <input type="number" class="form-control"
                                                                id="expected_order" name="expected_order"
                                                                placeholder="Enter expected order value"
                                                                value="<?php echo isset($row[0]->expected_order) ? $row[0]->expected_order : ''; ?>"
                                                                <?php if ($_REQUEST['mode'] == "view") { ?> disabled <?php } ?> required>
                                                            <div class="invalid-feedback">Please enter the expected
                                                                order value.</div>
                                                        </div>

                                                        <!-- PAN Number -->
                                                        <div class="col-md-6">
                                                            <label for="pan_number" class="form-label">PAN
                                                                Number</label>
                                                            <input type="text" class="form-control" id="pan_number"
                                                                name="pan_number" placeholder="Enter PAN number"
                                                                value="<?php echo isset($row[0]->pan_number) ? $row[0]->pan_number : ''; ?>"
                                                                <?php if ($_REQUEST['mode'] == "view") { ?> disabled <?php } ?> required>
                                                            <div class="invalid-feedback">Please enter a valid PAN
                                                                number.</div>
                                                        </div>

                                                        <!-- Cash Discount -->
                                                        <div class="col-md-6">
                                                            <label for="cash_discount" class="form-label">Cash Discount
                                                                (%)</label>
                                                            <input type="number" class="form-control" id="cash_discount"
                                                                name="cash_discount" placeholder="Enter cash discount"
                                                                value="<?php echo isset($row[0]->cash_discount) ? $row[0]->cash_discount : ''; ?>"
                                                                <?php if ($_REQUEST['mode'] == "view") { ?> disabled <?php } ?> required>
                                                            <div class="invalid-feedback">Please enter a cash discount
                                                                percentage.</div>
                                                        </div>

                                                        <!-- Additional Discount -->
                                                        <div class="col-md-6">
                                                            <label for="additional_discount"
                                                                class="form-label">Additional Discount (%)</label>
                                                            <input type="number" class="form-control"
                                                                id="additional_discount" name="additional_discount"
                                                                placeholder="Enter additional discount"
                                                                value="<?php echo isset($row[0]->additional_discount) ? $row[0]->additional_discount : ''; ?>"
                                                                <?php if ($_REQUEST['mode'] == "view") { ?> disabled <?php } ?> required>
                                                            <div class="invalid-feedback">Please enter an additional
                                                                discount percentage.</div>
                                                        </div>

                                                        <!-- Birthdate -->
                                                        <div class="col-md-6">
                                                            <label for="birthdate" class="form-label">Birth date</label>
                                                            <input type="date" class="form-control" id="birthdate"
                                                                name="birthdate"
                                                                value="<?php echo isset($row[0]->birthdate) ? $row[0]->birthdate : ''; ?>"
                                                                <?php if ($_REQUEST['mode'] == "view") { ?> disabled <?php } ?> required>
                                                            <div class="invalid-feedback">Please select a birthdate.
                                                            </div>
                                                        </div>

                                                        <!-- Target Assign Type (Dropdown) -->
                                                        <div class="col-md-6">
                                                            <label for="target_assign_type" class="form-label">Target
                                                                Assign Type</label>
                                                            <select id="target_assign_type" class="form-select"
                                                                name="target_assign_type" <?php echo (isset($_REQUEST['mode']) && $_REQUEST['mode'] === "view") ? 'disabled' : ''; ?> required>

                                                                <option value="" <?php echo (!isset($row[0]->target_assign_type) || $row[0]->target_assign_type == '') ? 'selected' : ''; ?>>Select Target Assign Type
                                                                <option value="monthly" <?php echo (isset($row[0]->target_assign_type) && $row[0]->target_assign_type == 'monthly') ? 'selected' : ''; ?>>
                                                                    Monthly</option>
                                                                <option value="quarterly" <?php echo (isset($row[0]->target_assign_type) && $row[0]->target_assign_type == 'quarterly') ? 'selected' : ''; ?>>
                                                                    Quarterly</option>
                                                                <option value="yearly" <?php echo (isset($row[0]->target_assign_type) && $row[0]->target_assign_type == 'yearly') ? 'selected' : ''; ?>>
                                                                    Yearly</option>
                                                            </select>
                                                            <div class="invalid-feedback">Please select a target assign
                                                                type.</div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="d-flex align-items-start gap-3 mt-4">
                                                    <button type="button" class="btn btn-light btn-label previestab"
                                                        data-previous="steparrow-contact-info-tab"><i
                                                            class="ri-arrow-left-line label-icon align-middle fs-lg me-2"></i>
                                                        Back to Contact Details</button>
                                                    <button type="button"
                                                        class="btn btn-success btn-label right ms-auto nexttab nexttab"
                                                        data-nexttab="steparrow-bank-info-tab"><i
                                                            class="ri-arrow-right-line label-icon align-middle fs-lg ms-2"></i>Go
                                                        to Bank Details</button>
                                                </div>
                                            </div>
                                            <!-- end tab pane -->
                                            <!-- bank info -->
                                            <div class="tab-pane fade " id="steparrow-bank-info" role="tabpanel"
                                                aria-labelledby="steparrow-bank-info-tab">
                                                <div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label for="bank_name" class="form-label">Bank Name</label>
                                                            <input type="text" class="form-control" id="bank_name"
                                                                name="bank_name" placeholder="Enter bank name"
                                                                value="<?php echo isset($row[0]->bank_name) ? $row[0]->bank_name : ''; ?>"
                                                                <?php if ($_REQUEST['mode'] == "view") { ?> disabled <?php } ?> required>
                                                            <div class="invalid-feedback">Please enter the bank name.
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label for="bank_account_no" class="form-label">Bank Account
                                                                Number</label>
                                                            <input type="text" class="form-control" id="bank_account_no"
                                                                name="bank_account_no"
                                                                placeholder="Enter bank account number"
                                                                value="<?php echo isset($row[0]->bank_account_no) ? $row[0]->bank_account_no : ''; ?>"
                                                                <?php if ($_REQUEST['mode'] == "view") { ?> disabled <?php } ?> required>
                                                            <div class="invalid-feedback">Please enter the bank account
                                                                number.</div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label for="bank_ifsc_code" class="form-label">Bank IFSC
                                                                Code</label>
                                                            <input type="text" class="form-control" id="bank_ifsc_code"
                                                                name="bank_ifsc_code" placeholder="Enter IFSC code"
                                                                value="<?php echo isset($row[0]->bank_ifsc_code) ? $row[0]->bank_ifsc_code : ''; ?>"
                                                                <?php if ($_REQUEST['mode'] == "view") { ?> disabled <?php } ?> required>
                                                            <div class="invalid-feedback">Please enter the bank IFSC
                                                                code.</div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label for="bank_branch" class="form-label">Bank
                                                                Branch</label>
                                                            <input type="text" class="form-control" id="bank_branch"
                                                                name="bank_branch" placeholder="Enter bank branch"
                                                                value="<?php echo isset($row[0]->bank_branch) ? $row[0]->bank_branch : ''; ?>"
                                                                <?php if ($_REQUEST['mode'] == "view") { ?> disabled <?php } ?> required>
                                                            <div class="invalid-feedback">Please enter the bank branch.
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label for="cheque_1" class="form-label">Cheque 1</label>
                                                            <input type="text" class="form-control" id="cheque_1"
                                                                name="cheque_1" placeholder="Enter cheque 1 details"
                                                                value="<?php echo isset($row[0]->cheque_1) ? $row[0]->cheque_1 : ''; ?>"
                                                                <?php if ($_REQUEST['mode'] == "view") { ?> disabled <?php } ?> required>
                                                            <div class="invalid-feedback">Please enter the details of
                                                                Cheque 1.</div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label for="cheque_2" class="form-label">Cheque 2</label>
                                                            <input type="text" class="form-control" id="cheque_2"
                                                                name="cheque_2" placeholder="Enter cheque 2 details"
                                                                value="<?php echo isset($row[0]->cheque_2) ? $row[0]->cheque_2 : ''; ?>"
                                                                <?php if ($_REQUEST['mode'] == "view") { ?> disabled <?php } ?> required>
                                                            <div class="invalid-feedback">Please enter the details of
                                                                Cheque 2.</div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="d-flex align-items-start gap-3 mt-4">
                                                    <button type="button" class="btn btn-light btn-label previestab"
                                                        data-previous="steparrow-extra-info-tab"><i
                                                            class="ri-arrow-left-line label-icon align-middle fs-lg me-2"></i>
                                                        Back to Extra Details</button>
                                                    <button type="button"
                                                        class="btn btn-success btn-label right ms-auto nexttab nexttab"
                                                        data-nexttab="steparrow-other-info-tab"><i
                                                            class="ri-arrow-right-line label-icon align-middle fs-lg ms-2"></i>Go
                                                        To Other Details</button>
                                                </div>
                                            </div>
                                            <!-- end tab pane -->
                                            <!-- other details -->
                                            <div class="tab-pane fade" id="steparrow-other-info" role="tabpanel"
                                                aria-labelledby="steparrow-other-info-tab">
                                                <div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label for="transporter_name" class="form-label">Transporter
                                                                Name</label>
                                                            <input type="text" class="form-control"
                                                                id="transporter_name" name="transporter_name"
                                                                placeholder="Enter transporter name"
                                                                value="<?php echo isset($row[0]->transporter_name) ? $row[0]->transporter_name : ''; ?>"
                                                                <?php if ($_REQUEST['mode'] == "view") { ?> disabled <?php } ?> required>
                                                            <div class="invalid-feedback">Please enter the transporter
                                                                name.</div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label for="transporter_number"
                                                                class="form-label">Transporter Number</label>
                                                            <input type="text" class="form-control"
                                                                id="transporter_number" name="transporter_number"
                                                                placeholder="Enter transporter number"
                                                                value="<?php echo isset($row[0]->transporter_number) ? $row[0]->transporter_number : ''; ?>"
                                                                <?php if ($_REQUEST['mode'] == "view") { ?> disabled <?php } ?> required>
                                                            <div class="invalid-feedback">Please enter the transporter
                                                                number.</div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label for="per_kg_rate" class="form-label">Per KG
                                                                Rate</label>
                                                            <input type="number" class="form-control" id="per_kg_rate"
                                                                name="per_kg_rate" placeholder="Enter per KG rate"
                                                                step="0.01"
                                                                value="<?php echo isset($row[0]->per_kg_rate) ? $row[0]->per_kg_rate : ''; ?>"
                                                                <?php if ($_REQUEST['mode'] == "view") { ?> disabled <?php } ?> required>
                                                            <div class="invalid-feedback">Please enter the per KG rate.
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label for="credit_limit" class="form-label">Credit
                                                                Limit</label>
                                                            <input type="number" class="form-control" id="credit_limit"
                                                                name="credit_limit" placeholder="Enter credit limit"
                                                                value="<?php echo isset($row[0]->credit_limit) ? $row[0]->credit_limit : ''; ?>"
                                                                <?php if ($_REQUEST['mode'] == "view") { ?> disabled <?php } ?> required>
                                                            <div class="invalid-feedback">Please enter the credit limit.
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label for="credit_days" class="form-label">Credit
                                                                Days</label>
                                                            <input type="number" class="form-control" id="credit_days"
                                                                name="credit_days" placeholder="Enter credit days"
                                                                value="<?php echo isset($row[0]->credit_days) ? $row[0]->credit_days : ''; ?>"
                                                                <?php if ($_REQUEST['mode'] == "view") { ?> disabled <?php } ?> required>
                                                            <div class="invalid-feedback">Please enter the credit days.
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label for="remark" class="form-label">Remark</label>
                                                            <textarea class="form-control" id="remark" name="remark"
                                                                placeholder="Enter remarks" <?php if ($_REQUEST['mode'] == "view") { ?> disabled <?php } ?>><?php echo isset($row[0]->remark) ? $row[0]->remark : ''; ?></textarea>
                                                            <div class="invalid-feedback">Please enter a remark.</div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label for="business_registration_no"
                                                                class="form-label">Business Registration Number</label>
                                                            <input type="text" class="form-control"
                                                                id="business_registration_no"
                                                                name="business_registration_no"
                                                                placeholder="Enter business registration number"
                                                                value="<?php echo isset($row[0]->business_registration_no) ? $row[0]->business_registration_no : ''; ?>"
                                                                <?php if ($_REQUEST['mode'] == "view") { ?> disabled <?php } ?> required>
                                                            <div class="invalid-feedback">Please enter the business
                                                                registration number.</div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label for="registration_no" class="form-label">Registration
                                                                Number</label>
                                                            <input type="text" class="form-control" id="registration_no"
                                                                name="registration_no"
                                                                placeholder="Enter registration number"
                                                                value="<?php echo isset($row[0]->registration_no) ? $row[0]->registration_no : ''; ?>"
                                                                <?php if ($_REQUEST['mode'] == "view") { ?> disabled <?php } ?> required>
                                                            <div class="invalid-feedback">Please enter the registration
                                                                number.</div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label for="billing_contact_person"
                                                                class="form-label">Billing Contact Person</label>
                                                            <input type="text" class="form-control"
                                                                id="billing_contact_person"
                                                                name="billing_contact_person"
                                                                placeholder="Enter billing contact person"
                                                                value="<?php echo isset($row[0]->billing_contact_person) ? $row[0]->billing_contact_person : ''; ?>"
                                                                <?php if ($_REQUEST['mode'] == "view") { ?> disabled <?php } ?> required>
                                                            <div class="invalid-feedback">Please enter the billing
                                                                contact person.</div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label for="billing_contact_number"
                                                                class="form-label">Billing Contact Number</label>
                                                            <input type="tel" class="form-control"
                                                                id="billing_contact_number"
                                                                name="billing_contact_number"
                                                                placeholder="Enter billing contact number"
                                                                pattern="[0-9]{10}"
                                                                value="<?php echo isset($row[0]->billing_contact_number) ? $row[0]->billing_contact_number : ''; ?>"
                                                                <?php if ($_REQUEST['mode'] == "view") { ?> disabled <?php } ?> required>
                                                            <div class="invalid-feedback">Please enter a valid 10-digit
                                                                billing contact number.</div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label for="work_type" class="form-label">Work Type</label>
                                                            <?php
                                                            $selected_work_type = isset($row[0]->work_type) ? $row[0]->work_type : '';
                                                            $view = isset($_REQUEST['mode']) && $_REQUEST['mode'] === "view";
                                                            ?>
                                                            <select id="work_type" class="form-select" name="work_type"
                                                                <?php if ($_REQUEST['mode'] == "view") { ?> disabled <?php } ?> required>
                                                                <option value="" <?php echo ($selected_work_type == '') ? 'selected' : ''; ?>>Select Work Type</option>
                                                                <option value="type1" <?php echo ($selected_work_type == 'type1') ? 'selected' : ''; ?>>Type 1</option>
                                                                <option value="type2" <?php echo ($selected_work_type == 'type2') ? 'selected' : ''; ?>>Type 2</option>
                                                                <option value="type3" <?php echo ($selected_work_type == 'type3') ? 'selected' : ''; ?>>Type 3</option>
                                                            </select>
                                                            <div class="invalid-feedback">Please select a work type.
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="d-flex align-items-start gap-3 mt-4">
                                                        <button type="button" class="btn btn-light btn-label previestab"
                                                            data-previous="steparrow-bank-info-tab"><i
                                                                class="ri-arrow-left-line label-icon align-middle fs-lg me-2"></i>
                                                            Back to Bank Details</button>
                                                        <?php if ($_REQUEST['mode'] == 'view') { ?>
                                                            <a href="<?php echo 'customer'; ?>"
                                                                class="btn btn-success btn-label right ms-auto "><i
                                                                    class="ri-arrow-right-line label-icon align-middle fs-lg ms-2"></i>Go
                                                                to Back</a>
                                                        <?php } else { ?>
                                                            <button type="submit"
                                                                class="btn btn-success btn-label right ms-auto "
                                                                name="btn_submit"><i
                                                                    class="ri-arrow-right-line label-icon align-middle fs-lg ms-2"></i>Go
                                                                to Submit Details</button>
                                                        <?php } ?>

                                                    </div>
                                                </div>
                                                <!-- end tab pane -->
                                            </div>
                                            <!-- end tab content -->
                                    </form>
                                </div>
                                <!-- end card body -->
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- end col -->
                    </div><!-- end row -->
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <?php include("include/footer.php"); ?>
        </div>
        <!-- end main content-->
    </div>
    <!-- JAVASCRIPT -->
    <?php include("include/js.php"); ?>
    <script>
        document.getElementById("password-addon").addEventListener("click", function () {
            var passwordField = document.getElementById("password");
            var fieldType = passwordField.type === "password" ? "text" : "password";
            passwordField.type = fieldType;
        });
    </script>
    <script>
        $(document).ready(function () {
            $('#country').change(function () {
                const country_id = $(this).val();

                if (country_id) {
                    $.ajax({
                        url: 'get_state.php',
                        method: 'GET',
                        data: {
                            country_id: country_id
                        },
                        dataType: 'json',
                        success: function (response) {
                            $('#state').html('<option value="" selected disabled>Select State</option>');

                            // Changed 'response.categories' to 'response.states' to match the PHP output
                            response.states.forEach(state => {
                                $('#state').append(`<option value="${state.id}">${state.name}</option>`);
                            });

                            $('#state').prop('disabled', false);
                        },
                        error: function () {
                            alert('Error fetching states.');
                        }
                    });
                } else {
                    $('#state').html('<option value="" selected disabled>Select State</option>').prop('disabled', true);
                }
            });
        });

        $(document).ready(function () {
            $('#state').change(function () {
                const state_id = $(this).val();

                if (state_id) {
                    $.ajax({
                        url: 'get_city.php',
                        method: 'GET',
                        data: {
                            state_id: state_id
                        },
                        dataType: 'json',
                        success: function (response) {
                            $('#city_id').html('<option value="" selected disabled>Select City</option>');

                            if (response.cities && response.cities.length > 0) {
                                response.cities.forEach(city => {
                                    $('#city_id').append(`<option value="${city.id}">${city.name}</option>`);
                                });
                                $('#city_id').prop('disabled', false);
                            } else {
                                $('#city_id').html('<option value="" selected disabled>No cities available</option>').prop('disabled', true);
                            }
                        },
                        error: function () {
                            alert('Error fetching cities.');
                        }
                    });
                } else {
                    $('#city_id').html('<option value="" selected disabled>Select City</option>').prop('disabled', true);
                }
            });
        });

        $(document).ready(function () {
            $('#city_id').change(function () {
                const city_id = $(this).val();

                if (city_id) {
                    $.ajax({
                        url: 'get_route.php',
                        method: 'GET',
                        data: {
                            city_id: city_id
                        },
                        dataType: 'json',
                        success: function (response) {
                            $('#route').html('<option value="" selected disabled>Select Route</option>');

                            if (response.route && response.route.length > 0) {
                                response.route.forEach(route => {
                                    $('#route').append(`<option value="${route.id}">${route.name}</option>`);
                                });
                                $('#route').prop('disabled', false);
                            } else {
                                $('#route').html('<option value="" selected disabled>No cities available</option>').prop('disabled', true);
                            }
                        },
                        error: function () {
                            alert('Error fetching cities.');
                        }
                    });
                } else {
                    $('#route').html('<option value="" selected disabled>Select City</option>').prop('disabled', true);
                }
            });
        });
    </script>


</body>



</html>