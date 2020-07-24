@extends('layouts.template')
@section('contenido')

<div>
    <button class="button is-info is-rounded buttonHelp"><i class="fas fa-question"></i></button>
    <img src="{{URL::asset('img/leaves.jpg')}}" alt="hojas" class="mainLeaves">
</div>
<div class="modal" id="helpModal">
    <div class="modal-background"></div>
    <div class="modal-card">
        <header class="modal-card-head">
            <p class="modal-card-title">{{__('Help')}}</p>
            <button class="delete" aria-label="close"></button>
        </header>
        <section class="modal-card-body">
            <p>
                {!!__('In <strong>Basic data</strong> you can access to 3 BREAD where you can Browse, Read, Edit, Add and Delete. All of them are made with <strong>datatable</strong> and <strong>yajra/laravel-datatables</strong>.') !!}
            </p>
            <p>
                {!!__('<strong>Reports</strong> are basically an option to get an inform pdf of each <strong>Basic data</strong>')!!}
            </p>
        </section>
    </div>
</div>

<script>
    $(".buttonHelp").click(function(){
        $("#helpModal").addClass("is-active");
    });
    $(".delete").click(function(){
        $("#helpModal").removeClass();
		$("#helpModal").addClass("modal");
    });
</script>
@endsection