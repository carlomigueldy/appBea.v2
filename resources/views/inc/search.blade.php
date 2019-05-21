<form action="/search" method="POST" role="search">
    {{ csrf_field() }}
    <div class="input-group">
        <input type="text" class="form-control" name="q" placeholder="Search"> 
        <div class="input-group-prepend">
            <input type="submit" value="Submit" class="btn btn-outline-secondary">
        </div> 
    </div>
</form>