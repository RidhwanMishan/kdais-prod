@extends('sales.index')

@section('title') Dealer Penetration @endsection

@include('includes.sso' , ["reportId" => "e1bde400-41e1-489a-8861-697f5042bbc6", "datasetId" => "fae64c69-9b71-4aaa-8570-fc0b802d9ded", "noIdentity" => true])

@section('frameContent')

<div class="mt-2 embed-responsive md:aspect-ratio-5/3">
    <div id="reportContainer" class="xl:px-4 xxl:px-6 embed-responsive-item" frameborder="0" allowFullScreen="true" style="margin: 0 auto;">
    </div>
</div>

@endsection