@if(auth()->check() && !in_array(request()->route()->getName(), ['welcome', 'page.pricing', 'page.lock','online_form','fees.confirmation','fees.rejoin-fees','fees.re-payment','pay.success-repayment-request','pay.success-rejoin-request','pay.success']))
    @include('layouts.navbars.navs.auth')
@endif
    
@if(!auth()->check() || in_array(request()->route()->getName(), ['welcome', 'page.pricing', 'page.lock','online_form','fees.confirmation','fees.rejoin-fees','fees.re-payment','pay.success-repayment-request','pay.success-rejoin-request','pay.success']))
    @include('layouts.navbars.navs.guest')
@endif