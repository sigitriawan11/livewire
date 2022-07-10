@extends('partials.main')

@section('content')
<div class="d-flex justify-content-center">
    <div class="card">
        <div class="card-title bg-light border">
            <div class="mx-3 py-2">
                <h4>Dashboard</h4>
            </div>
        </div>
        <div class="card-body">
          <livewire:contact-index></livewire:contact-index>
        </div>
      </div>
</div>
@endsection
