
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Statistics

                </div>
                <div class="card-body">
                    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
                    <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/bootstrap-extended.min.css">
                    <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/fonts/simple-line-icons/style.min.css">
                    <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/colors.min.css">
                    <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/bootstrap.min.css">
                    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">

                    <div class="grey-bg container-fluid">


                        <section id="stats-subtitle">
                            <div class="row">
                                <div class="col-12 mt-3 mb-1">
                                    <h4 class="text-uppercase">Statistics of the site</h4>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xl-6 col-md-12">
                                    <div class="card overflow-hidden">
                                        <div class="card-content">
                                            <div class="card-body cleartfix">
                                                <div class="media align-items-stretch">
                                                    <div class="align-self-center">
                                                        <i class="icon-basket
 primary font-large-2 mr-2"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <h4>Total Orders</h4>
                                                        <span>All orders</span>
                                                    </div>
                                                    <div class="align-self-center">
                                                        <h1>{{$total_orders}}</h1>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-md-12">
                                    <div class="card">
                                        <div class="card-content">
                                            <div class="card-body cleartfix">
                                                <div class="media align-items-stretch">
                                                    <div class="align-self-center">
                                                        <i class="icon-user warning font-large-2 mr-2"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <h4>Total Users</h4>
                                                        <span>Total users in the site</span>
                                                    </div>
                                                    <div class="align-self-center">
                                                        <h1>{{$total_users}}</h1>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xl-6 col-md-12">
                                    <div class="card">
                                        <div class="card-content">
                                            <div class="card-body cleartfix">
                                                <div class="media align-items-stretch">
                                                    <div class="align-self-center">
                                                        <h1 class="mr-2">{{$total_sales}}</h1>
                                                    </div>
                                                    <div class="media-body">
                                                        <h4>Total Sales</h4>
                                                        <span>All Sales Amount</span>
                                                    </div>
                                                    <div class="align-self-center">
                                                        <i class="icon-heart danger font-large-2"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-md-12">
                                    <div class="card">
                                        <div class="card-content">
                                            <div class="card-body cleartfix">
                                                <div class="media align-items-stretch">
                                                    <div class="align-self-center">
                                                        <h1 class="mr-2">{{$total_items}}</h1>
                                                    </div>
                                                    <div class="media-body">
                                                        <h4>Total Items</h4>
                                                        <span>Number of items</span>
                                                    </div>
                                                    <div class="align-self-center">
                                                        <i class="icon-wallet success font-large-2"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


@endsection
