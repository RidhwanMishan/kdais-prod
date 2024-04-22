@extends('sales.index')

@section('title') Business Report Sales Cycle Analysis @endsection

@include('includes.sso' , ["reportId" => "ae9b14d5-083e-46df-96f6-523731e0e34b", "datasetId" => "783505e8-e638-488d-9fea-2cdbf1fe34ad"])

@section('frameContent')

<div class="mt-2 embed-responsive md:aspect-ratio-5/3">
    <div id="reportContainer" class="xl:px-4 xxl:px-6 embed-responsive-item" frameborder="0" allowFullScreen="true" style="margin: 0 auto;">
    </div>
</div>

@endsection