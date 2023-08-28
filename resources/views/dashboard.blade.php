@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-12">
            <h1>Beer List</h1>
        </div>
    </div>

    <div class="row">
        @foreach ($beers as $beer)
            @component('components.beer', ['beer' => $beer])
            @endcomponent
        @endforeach
    </div>


    <div class="grid grid-cols-12">

        <div class="row">
            <div class="col-md-12 text-center">
                <nav aria-label="...">
                    <ul class="pagination justify-content-center">
                        @if($page > 1)
                        <li class="page-item">
                            <a class="page-link" href="/?page={{ $page - 1 }}" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        @else
                        <li class="page-item disabled">
                            <span class="page-link" aria-hidden="true">&laquo;</span>
                        </li>
                        @endif
        
                        @for ($i = max(1, $page - 5); $i <= min($page + 5, $page +25); $i++)
                        <li class="page-item {{ ($i === $page) ? 'active' : '' }}">
                            <a class="page-link" href="/?page={{ $i }}">{{ $i }}</a>
                        </li>
                        @endfor
        
                        @if($page < $page + 25)
                        <li class="page-item">
                            <a class="page-link" href="/?page={{ $page + 1 }}" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                        @else
                        <li class="page-item disabled">
                            <span class="page-link" aria-hidden="true">&raquo;</span>
                        </li>
                        @endif
                    </ul>
                </nav>
            </div>
        </div>
        
</div>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
@endpush
