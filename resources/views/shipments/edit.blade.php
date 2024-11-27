<!-- edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Hero Image Section -->
    <div class="w-full h-64 bg-cover bg-center mb-8" style="background-image: url('/img/assets/ship.png')"></div>

    <!-- Form Container -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="bg-blue-600 py-4">
                <h2 class="text-2xl font-bold text-center text-white">Edit Shipment</h2>
            </div>

            <div class="p-6">
                <form action="{{ route('shipments.update', $shipment->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    @include('shipments.form')
                    <!-- Buttons -->
                    <div class="flex justify-end space-x-4 mt-8">
                        <button type="reset"
                            class="px-6 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors">
                            Cancel
                        </button>
                        <button type="submit"
                            class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                            Update Shipment
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection