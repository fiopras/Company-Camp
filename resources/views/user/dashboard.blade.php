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
            <table class="table">
                <tbody>
                    @foreach ($checkouts as $checkout )
                        <tr class="align-middle">
                            <td width="18%">
                                <img src="{{ asset('images/item_bootcamp.png') }}" height="120" alt="">
                            </td>
                            <td>
                                <p class="mb-2">
                                    <strong>{{ $checkout->camp->title }}</strong>
                                </p>
                                <p>
                                   {{$checkout->created_at->format('M d, Y')}}
                                </p>
                            </td>
                            <td>
                                <strong>${{ $checkout->camp->price }}</strong>
                            </td>
                            <td>
                                @if ($checkout->is_paid)
                                    <strong class="text-success">Payment Success</strong>
                                @else
                                <strong class="text-warning">Waiting Payment</strong>
                                    
                                @endif
                            </td>
                            <td>
                                <a href="https://wa.me/08161306897?text=Hi, Marsya Kurnia Mauraya {{ $checkout->camp->title }}" class="btn btn-primary">
                                    Contact Support
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

@endsection