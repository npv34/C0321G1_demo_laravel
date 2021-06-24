@extends('admin.master')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card p-4">
                    <div class="d-flex">
                        <h6 class="flex-grow-1">{{ $nameCity }}</h6>
                        <div>
                            <form action="" method="get">
                                <select name="city" id="city_select" onchange="this.form.submit()">
                                    <option value="london">London</option>
                                    <option value="Hà Nội">Ha Noi</option>
                                    <option value="Thanh pho Ho Chi Minh">Thanh pho Ho Chi Minh</option>
                                    <option value="Tỉnh Thái Bình">Tỉnh Thái Bình</option>
                                </select>
                            </form>
                        </div>
                        <h6>16:08</h6>
                    </div>
                    <div class="d-flex flex-column temp mt-5 mb-3">
                        <h1 class="mb-0 font-weight-bold" id="heading"> {{ $temp }}° C </h1> <span class="small grey">{{ $weather }}</span>
                    </div>
                    <div class="d-flex">
                        <div class="temp-details flex-grow-1">
                            <p class="my-1"> <i class="fas fa-wind"></i> <span> {{ $windSpeed }} km/h </span> </p>
                            <p class="my-1"> <i class="fa fa-tint mr-2" aria-hidden="true"></i> <span> {{ $humidity }}% </span> </p>
                            <p class="my-1"> <img src="https://i.imgur.com/wGSJ8C5.png" height="17px"> <span> 0.2h </span> </p>
                        </div>
                        <div> <i class="fas fa-cloud-sun"></i> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
