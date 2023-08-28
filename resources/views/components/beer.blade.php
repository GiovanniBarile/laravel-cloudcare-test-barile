<!-- resources/views/components/BeerGrid.blade.php -->
<div class="col-md-3 mb-4">
    <div class="card">
        <img src="{{ $beer->image_url }}" class="card-img-top small-img" alt="{{ $beer->name }}">
        <div class="card-body">
            <h5 class="card-title">{{ $beer->name }}</h5>
            <p class="card-text overflow-hidden">{{ $beer->description }}</p>
        </div>
    </div>
</div>

<style>
    .small-img {
        height: 200px;
        object-fit: contain;
    }
.overflow-hidden {
    overflow: hidden; 
    max-height: 100px; 
}
</style>

