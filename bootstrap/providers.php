<?php

use App\Providers\AppServiceProvider;
use App\Providers\FortifyServiceProvider;
use RealRashid\SweetAlert\SweetAlertServiceProvider;


return [
    AppServiceProvider::class,
    FortifyServiceProvider::class,
    RealRashid\SweetAlert\SweetAlertServiceProvider::class,
    //'Alert' => RealRashid\SweetAlert\Facades\Alert::class,


];
