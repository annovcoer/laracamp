{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}

@extends('layouts.app')

@section('content')
<section class="dashboard my-5">
    <div class="container">
        <div class="row text-left">
            <div class=" col-lg-12 col-12 header-wrap mt-4">
                <p class="story">
                    DASHBOARD
                </p>
                <h2 class="primary-header ">
                    My Bootcamps
                </h2>
            </div>
        </div>
        <div class="row my-5">
            {{-- {{$checkout}} --}}
            <table class="table">
                <tbody>
                    @forelse ($checkout as $checkout)

                    <tr class="align-middle">
                        <td width="18%">
                            <img src="{{asset('images/item_bootcamp.png')}}" height="120" alt="">
                        </td>
                        <td>
                            <p class="mb-2">
                                <strong>{{$checkout->Camp->title}}</strong>
                            </p>
                            <p>
                                {{$checkout->created_at->format('M d, Y')}}
                            </p>
                        </td>
                        <td>
                            <strong>${{$checkout->Camp->price}}K</strong>
                        </td>
                        <td>
                            @if ($checkout->is_paid)
                            <strong class="text-success">Payment Success</strong>
                            @else
                            <strong>Waiting for Payment</strong>
                            @endif
                        </td>
                        <td>
                            <a href="Https://wa.me/085117157051?text=hi, saya ingin bertanya tentang kelas {{$checkout->Camp->title}}" class="btn btn-primary">
                                Contact Support
                            </a>
                        </td>
                    </tr>

                    @empty
                    <tr>
                        <td colspan="5">
                            <h3>No Data</h3>
                        </td>
                    </tr>

                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</section>

@endsection
