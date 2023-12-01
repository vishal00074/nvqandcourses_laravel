@php

$contact= DB::table('contact_us')->select('*')->first();
$social = DB::table('social_links')->select('*')->first();
@endphp
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-sm-8">
            <div class="header_top_menu_address">
                <div class="header_top_menu_address_inner">
                    <ul>
                        <li><a href="mailto:{{$contact->email ?? ''}}"><i class="fa fa-envelope-o"></i>{{ $contact->email }}</a></li>
                        <li><a href="https://www.google.com/maps/search/?q={{urlencode($contact->address ?? '')}}" target="_blank"><i class="fa fa-map-marker"></i>{{ $contact->address }}</a></li>
                        <li><a href="tel:{{$contact->phone ?? ''}}"><i class="fa fa-phone"></i>{{ $contact->phone ?? '' }}</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-4">
            <div class="header_top_menu_icon">
                <div class="header_top_menu_icon_inner">
                    <ul>
                        <li><a href="{{$social->facebook ?? ''}}"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="{{$social->twitter ?? ''}}"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="{{$social->printerest ?? ''}}"><i class="fa fa-pinterest"></i></a></li>
                        <li><a href="{{$social->linkedin ?? ''}}"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</div>