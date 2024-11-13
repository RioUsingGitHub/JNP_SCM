@extends('layouts.app')

@section('content')
    <!-- Page Heading -->
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>

        <div class="row">
            <!-- Inventory Card -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Inventory</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $inventoryCount ?? 'N/A' }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-fw fa-box fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Shipments Card -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Shipments</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $shipmentCount ?? 'N/A' }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-truck fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Suppliers Card -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Suppliers</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $supplierCount ?? 'N/A' }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-truck-loading fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Shipments -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Dropped Shipments</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $droppedShipments ?? 'N/A' }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-exclamation-circle fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

